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

class Index extends CI_Controller {

    function __construct() {//echo "hi";exit;
        parent::__construct();
        //eini_set('max_execution_time', 300);
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

    //curl method to retrieve all data from firebase
    private function curlcoupouns($url, $key) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . $key)); // send development key
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch); //echo "<pre>";print_r($response);exit;
        $result = json_decode(json_encode((array) simplexml_load_string($response)), 1);
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

    /**
     * Name: index
     * Params: $this->input->post('username') and $this->input->post('password') are post values
     * Return Type: After login it redirects to dashboard page
     * Description:  here checks for admin user exists in firebase or not
     */
    public function index() {
        if ($this->session->userdata('isLoggedIn') == TRUE) {
            redirect(base_url() . 'dashboard');
        } else {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('email_id', 'Email Id', 'required|xss_clean|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
                // validation has been passed then insert data into database table
                if ($this->form_validation->run() == TRUE) {
                    $url = URL . 'admin.json?auth=' . AUTHKEY;
                    $data = $this->curl($url);
                    $senddata = json_decode($data);
                    $admindata = array();
                    foreach ($senddata as $row) {
                        array_push($admindata, $row);
                    }
                    if ($admindata[0]->username != $this->input->post('email_id')) {
                        $this->session->set_flashdata('failmsg', 'Please enter valid username');
                        redirect(base_url());
                    }
                    if ($admindata[0]->password != md5($this->input->post('password'))) {
                        $this->session->set_flashdata('failmsg', 'Please enter valid password');
                        redirect(base_url());
                    }
                    if ($admindata[0]->status != 'A') {
                        $this->session->set_flashdata('failmsg', 'Given credentials are not active');
                        redirect(base_url());
                    }
                    if ($admindata[0]->status == 'A') {
                        //setting session variables
                        $this->session->set_userdata(array(
                            'name' => $admindata[0]->username,
                            'status' => $admindata[0]->status,
                            'isLoggedIn' => true
                                )
                        );
                        redirect(base_url() . 'dashboard');
                    }
                }
            }
            $this->load->view('includes/header');
            $this->load->view('login');
            $this->load->view('includes/footer');
        }        //Ensure values exist for email and pass, and validate the user's credentials
    }

    public function logoff() {
        $sessiondata = array('isLoggedIn' => '',
            'name' => '',
            'status' => ''
        );
        $this->session->unset_userdata('isLoggedIn', $sessiondata);
        redirect(base_url());
    }

    //dashboard
    public function dashboard() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $url1 = URL . 'Shipping/' . $this->input->post('shipid') . '.json?auth=' . AUTHKEY;
                $fields = array(
                    'status' => 'Take Delivery'
                );
                $fields = json_encode($fields);
                $data = $this->curl_update($url1, $fields);
                redirect(base_url() . 'dashboard');
            }
            $url = URL . 'Shipping.json?auth=' . AUTHKEY;
            $data1 = $this->curl($url);
            $data['inbox'] = json_decode($data1); //echo "<pre>";print_r($data['inbox']);exit;
            $data['totalInbox'] = count((array) $data['inbox']); //total count of inbox of shiping details
            //Total number of users count
            $url1 = URL . 'Android/User_Profiles.json?auth=' . AUTHKEY;
            $data2 = $this->curl($url1);
            $data['totalUsers'] = count((array) json_decode($data2)); //ssssecho "<pre>";print_r($data['totalUsers']);exit;
            $this->load->view('includes/header');
            $this->load->view('dashboard', $data);
            $this->load->view('includes/footer');
        }
    }

    //users
    public function users() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            $url = URL . 'Android/User_Profiles.json?auth=' . AUTHKEY;
            $data1 = $this->curl($url);
            $senddata = json_decode($data1);
            $data['users'] = array();
            foreach ($senddata as $row) {
                array_push($data['users'], $row);
            }
            //echo "<pre>" ;print_r($data['users']);exit;
            $this->load->view('includes/header');
            $this->load->view('users/list', $data);
            $this->load->view('includes/footer');
        }
    }

    //view particular user
    public function view_users() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            $url = URL . 'Android/User_Profiles.json?orderBy="bId"&equalTo=' . $this->uri->segment(2) . '';
            //$url = "https://hereyago-754d7.firebaseio.com/products.json?orderBy='proId'&equalTo=2";
            //$url = 'https://hereyago-754d7.firebaseio.com/products.json?orderBy="userId"&equalTo=2';
            $data1 = $this->curl($url);
            $bigdata = json_decode($data1); //echo $url."<pre>" ;print_r($bigdata);exit;
            $senddata = array();
            foreach ($bigdata as $row) {
                array_push($senddata, $row);
            }
            $big['pict'] = $senddata[0]; //echo "<pre>" ;print_r($big['pict']);exit;
            $this->load->view('includes/header');
            $this->load->view('bigPicture/view', $big);
            $this->load->view('includes/footer');
        }
    }

    //add bigpicture
    public function addBigPict() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
                $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');
                // validation has been passed then insert data into firebase database table
                if ($this->form_validation->run() == TRUE) {
                    $url = URL.'BigPicture.json';
                    $fields = array(
                        'bId' => $this->input->post('id'),
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'imageurl' => $this->input->post('imageurl')
                    );
                    $fields = json_encode($fields);
                    $data = $this->curl_insert($url, $fields); //inserting the data
                }
            }
            $url1 = URL.'BigPicture.json';
            $data1 = $this->curl($url1);
            $bigdata = json_decode($data1); //echo "<pre>" ;print_r($bigdata);//exit;
            if (isset($bigdata) && $bigdata != '') {   //  echo "<pre>" ;print_r(count((array)$bigdata));exit;   
                $id['id'] = count((array) $bigdata) + 1;
            } else {
                $id['id'] = '1';
            }
            $this->load->view('includes/header');
            $this->load->view('bigPicture/add');
            $this->load->view('includes/footer');
        }
    }

    //bigpicture
    public function bigPict() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            $url = URL . 'BigPicture.json?auth=' . AUTHKEY;
            $data1 = $this->curl($url);
            $data['bigpict'] = json_decode($data1);
            $this->load->view('includes/header');
            $this->load->view('bigPicture/list', $data);
            $this->load->view('includes/footer');
        }
    }

    //view bigpicture
    public function view_bigPict() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            $id = $this->uri->segment(2);
            $url = URL . 'BigPicture/' . $id . '.json?auth=' . AUTHKEY; //echo $url;exit;
            $data = $this->curl($url);
            $data1['viewBig'] = json_decode($data); //echo "<pre>" ;print_r($senddata);exit;
            $this->load->view('includes/header');
            $this->load->view('bigPicture/view', $data1);
            $this->load->view('includes/footer');
        }
    }

    //editbig
    public function edit_bigPict() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            $id = $this->uri->segment(2);
            $url = URL . 'BigPicture/' . $id . '.json?auth=' . AUTHKEY; //echo $url;exit;
            $data = $this->curl($url);
            $data1['viewBig'] = json_decode($data);
            $this->load->view('includes/header');
            $this->load->view('bigPicture/add', $data1);
            $this->load->view('includes/footer');
        }
    }
    
    public function coupounscj() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url());
        } else {
            $this->load->view('includes/header');
            $this->load->view('coupons/list');
            $this->load->view('includes/footer');
        }
    }

    public function getClientCoupouns() {
        $url34 = URL . 'GiftCoupons.json?auth=' . AUTHKEY . '&orderBy="status"&equalTo="A"';
        // $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
        $data34 = $this->curl($url34);
        $giftCoupons = json_decode($data34);
        $exists_name = array();
        foreach ($giftCoupons as $row1) {
            array_push($exists_name, $row1);
        }//echo "2<pre>" ;print_r($exists_name);exit;
        echo json_encode($exists_name);exit;
        //echo json_encode($this->angularjs_model->getClientsList()); // to get all clients list and convert into json data
    }

}

?>