<?php

/* * **************************************************************
 * File Name : Index controller
 * File Description : here we check admin credentials, add, manage, view, edit and delete, 
 *                    timesheet management according to month and monthly view of consulatnt based on month
 * Author: Sushma.
 * Create Date : 18/07/2016 (DD/MM/YYYY)
 * Revision:
 * Last Modified by : Shanthi
 * Last Modified Date : (21/9/2016)
 * Modified Reason : xxxx xxxxxx
 * *************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

class Runner extends CI_Controller {

    function __construct() {
        parent::__construct();
        ini_set('max_execution_time', 300);
        // $this->load->library('FirebaseLib.php'); //loaded admin model
    }

    //curl method to retrieve all data from firebase
    private function curl($url) {
        $ch = curl_init();
        //verify key
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:  AIzaSyBIVWasZ4AEs56TdYVip_wEXYzXbOwVOUo')); // send development key
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);
        // Execute
        $result = curl_exec($ch);
        // Closing
        curl_close($ch);

        return $result;
    }

    //curl method to insert data into firebase
    private function curl_insert($url, $fields) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($fields)
                )
        );
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    //curl method to update data into firebase
    private function curl_update($url, $fields) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($fields))
        );
        $result = curl_exec($ch);

        curl_close($ch); //echo "<pre>";print_r($result);exit;
        return $result;
    }

    public function index() {
        $url = 'http://services.groupkt.com/state/get/USA/all';
        $usstates = $this->curl($url);
        $usstates = json_decode($usstates);
        $data['us_states'] = $usstates->RestResponse->result;
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $url = URL . 'Runner.json'; //echo "<pre>";print_r($this->input->post('checkr_candidate'));exit;
            $dob = $this->input->post('checkr_candidate')['date_of_birth'][0] . "/" . $this->input->post('checkr_candidate')['date_of_birth'][1] . "/" . $this->input->post('checkr_candidate')['date_of_birth'][2];
            $dob = date($dob);
            $fields = array(
                'fName' => $this->input->post('checkr_candidate')['first_name'],
                'mName' => $this->input->post('checkr_candidate')['no_middle_name'],
                'lName' => $this->input->post('checkr_candidate')['last_name'],
                'emailId' => $this->input->post('checkr_candidate')['email'],
                'phone' => $this->input->post('checkr_candidate')['phone'],
                "dob" => $dob,
                'sociSecurity' => $this->input->post('checkr_candidate')['social_security'],
                'zipcode' => $this->input->post('checkr_candidate')['current_zip_code'],
                'driverLicenseState' => $this->input->post('checkr_candidate')['driver_license_state'],
                'driverLicenseNo' => $this->input->post('checkr_candidate')['driver_license_number'],
                "step1" => "1"
            ); //echo "<pre>";print_r($fields);exit;
            $fields = json_encode($fields);
            $data = $this->curl_insert($url, $fields); //inserting the data
            $this->session->set_flashdata('emailId', $this->input->post('checkr_candidate')['email']);
            redirect(base_url() . "nextstep1");
        }
        $this->load->view('runner/index', $data);
    }

    public function next1() {///echo  "11".$this->session->flashdata('emailId') ;exit;
        if ($this->session->flashdata('emailId') != '') {
            $data['emailId'] = $this->session->flashdata('emailId');
        } else {
            $data['emailId'] = "";
        }
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            echo "2<pre>";
            print_r($this->input->post(''));
            exit;
        }
        $this->load->view('runner/nextstep1', $data);
    }

    public function next2() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            echo "1<pre>";
            print_r($this->input->post(''));
            exit;
        }
        $this->load->view('runner/nextstep2');
    }

    public function manage() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url() . 'admin');
        } else {
            $url = URL . 'Runner.json?auth=' . AUTHKEY;
            $data1 = $this->curl($url);
            $senddata = json_decode($data1);
            $data['runnerusers'] = array();
            foreach ($senddata as $row) {
                array_push($data['runnerusers'], $row);
            }
            //echo "<pre>" ;print_r($data['users']);exit;
            $this->load->view('includes/header');
            $this->load->view('runner/list', $data);
            $this->load->view('includes/footer');
        }
    }

}

?>
