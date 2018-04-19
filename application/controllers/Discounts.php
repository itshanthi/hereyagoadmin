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

class Discounts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Discounts_Model', 'discounts_model', TRUE);
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

    public function index() {
        if ($this->input->get('p') != '') {
            if ($this->input->get('p') == '') {
                $this->session->set_flashdata('msg', ' Oops, something went wrong. Please enter value of p ');
                redirect(base_url() . 'timeOut');
            } else {
                if (!is_numeric($this->input->get('p'))) {
                    $this->session->set_flashdata('msg', ' Oops, something went wrong. p value should be only numeric');
                    redirect(base_url() . 'timeOut');
                }
                if (strlen($this->input->get('p')) != 7) {
                    $this->session->set_flashdata('msg', ' Oops, something went wrong. p value should be exact 7 numbers');
                    redirect(base_url() . 'timeOut');
                }
            }
            if ($this->input->get('qcode') == '') {
                $this->session->set_flashdata('msg', ' Oops, something went wrong. Please enter value of qcode');
                redirect(base_url() . 'timeOut');
            } else {
                if (!is_numeric($this->input->get('qcode'))) {
                    $this->session->set_flashdata('msg', ' Oops, something went wrong. qcode value should be only numeric');
                    redirect(base_url() . 'timeOut');
                }
                if (strlen($this->input->get('qcode')) != 12) {
                    $this->session->set_flashdata('msg', ' Oops, something went wrong. qcode value should be exact 12 numbers');
                    redirect(base_url() . 'timeOut');
                }
                $month = substr($this->input->get('qcode'), 0, 2);
                $year = substr($this->input->get('qcode'), 2, 4);
                $date = substr($this->input->get('qcode'), 6, 2);
                $hour = substr($this->input->get('qcode'), 8, 2);
                $minute = substr($this->input->get('qcode'), 10, 2);
                $given_date = $year . '-' . $month . '-' . $date . ' ' . $hour . ':' . $minute . ':00'; //given date coming from link
                $res_date_given = date($given_date);
                date_default_timezone_set('America/New_York');
                $gm_date = date('Y-m-d H:i:s');
                if ($res_date_given <= $gm_date) {
                    $dateFromDatabase = strtotime($res_date_given);
                    $dateTwelveHoursAgo = strtotime("-48 hours");
                    if ($dateFromDatabase >= $dateTwelveHoursAgo) {
                        $data['coupouns'] = $this->discounts_model->alldiscounts(); //echo "1<pre>";print_r($data['coupouns']);exit;
                        $advtcoups = array();
                        $catcoups = array();
                        foreach ($data['coupouns'] as $row) {
                            array_push($advtcoups, $row['advtName']);
                            array_push($catcoups, $row['catName']);
                        }
                        $data['stores'] = array_unique($advtcoups); //stores
                        $data['categories'] = array_unique($catcoups); //categories                      
                        $this->load->view('home', $data);
                    } else {
                        $this->session->set_flashdata('msg', ' Oops, Your time has been crossed out');
                        redirect(base_url() . 'timeOut');
                    }
                } else { //echo "2";exit;
                    $this->session->set_flashdata('msg', ' Oops, qcode should be less than or equal to current date ');
                    redirect(base_url() . 'timeOut');
                }
            }
        } else {
            $this->session->set_flashdata('msg', ' Sorry, link you have provided is invalid');
            redirect(base_url() . 'timeOut');
        }
    }

//    public function index() {how to implement sms in my site using twilio in php
//    https://www.twilio.com/docs/guides/how-to-send-sms-messages-in-php#send-an-sms-message-in-php-via-the-rest-api
//    https://www.twilio.com/docs/libraries/php
//    https://www.twilio.com/blog/2014/04/add-sms-to-your-web-app-in-4-lines-of-code.html
//        if (isset($_REQUEST['p']) && $_REQUEST['qcode']) {
//            if ($_REQUEST['p'] == '') {
//                $this->session->set_flashdata('msg', ' Oops, something went wrong. Please enter value of p ');
//                redirect(base_url() . 'timeOut');
//            } else {
//                if (!is_numeric($_REQUEST['p'])) {
//                    $this->session->set_flashdata('msg', ' Oops, something went wrong. p value should be only numeric');
//                    redirect(base_url() . 'timeOut');
//                }
//                if (strlen($_REQUEST['p']) != 7) {
//                    $this->session->set_flashdata('msg', ' Oops, something went wrong. p value should be exact 7 numbers');
//                    redirect(base_url() . 'timeOut');
//                }
//            }
//            if ($_REQUEST['qcode'] == '') {
//                $this->session->set_flashdata('msg', ' Oops, something went wrong. Please enter value of qcode');
//                redirect(base_url() . 'timeOut');
//            } else {
//                if (!is_numeric($_REQUEST['qcode'])) {
//                    $this->session->set_flashdata('msg', ' Oops, something went wrong. qcode value should be only numeric');
//                    redirect(base_url() . 'timeOut');
//                }
//                if (strlen($_REQUEST['qcode']) != 12) {
//                    $this->session->set_flashdata('msg', ' Oops, something went wrong. qcode value should be exact 12 numbers');
//                    redirect(base_url() . 'timeOut');
//                }
//                $month = substr($_REQUEST['qcode'], 0,2);
//                $year = substr($_REQUEST['qcode'], 2,4);
//                $date = substr($_REQUEST['qcode'], 6,2);
//                $hour = substr($_REQUEST['qcode'], 8,2);
//                $minute = substr($_REQUEST['qcode'], 10,2);
//                $given_date = $year.$month.$date.$hour.$minute;//echo "This is foramt givn here: ".$given_date;exit;
//                if (strtotime($given_date) >= strtotime("-30 hours")){//echo "123445This is foramt givn here: ".$given_date;exit;
//                     $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
//                    $data34 = $this->curl($url34);
//                    $coup = json_decode($data34);//echo "<pre>";print_r($coup);exit;
//                    $data['coupouns'] = $coup;
//                    $advtcoups = array();
//                    $catcoups = array();
//                    foreach ($coup as $row) {
//                        array_push($advtcoups, $row->advtName);
//                        array_push($catcoups, $row->catName);
//                    }
//                    $data['stores'] = array_unique($advtcoups);
//                    $data['categories'] = array_unique($catcoups);
//                    $this->load->view('home', $data);
//                } else {//echo "This is foramt givn here: ".$given_date;exit;
//                    $this->session->set_flashdata('msg', ' Oops, Your time has been crossed out');
//                     redirect(base_url() . 'timeOut');
//                }
//            }            
//        } else {           
//            $this->session->set_flashdata('msg', ' Sorry, link you have provided is invalid');
//            redirect(base_url() . 'timeOut');
//        }
//    }

    public function search() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data['coupouns'] = $this->discounts_model->get_discounts_serach(str_replace('-', ' ', $this->input->post('keyword')));
        }
        $this->load->view('search_results', $data);
    }

    public function simillarsearch() {
        $keyword = str_replace('-', ' ', $this->uri->segment(2)); //echo $keyword;exit;
        $data['coupouns'] = $this->discounts_model->get_advt($keyword); //echo "<pre>";print_r($data['coupouns']);exit;
        $coup = $this->discounts_model->alldiscounts();
        $advtcoups = array();
        $catcoups = array();
        foreach ($coup as $row) {
            array_push($advtcoups, $row['advtName']);
            array_push($catcoups, $row['catName']);
        }
        $data['stores'] = array_unique($advtcoups);
        $data['categories'] = array_unique($catcoups);
        $this->load->view('simillar', $data);
    }

    public function viewMore() {//echo "<pre>";print_r($this->input->get());exit;
        $id = $this->uri->segment(2); //echo $id;exit;
        $data1['viewmore'] = $this->discounts_model->view_details($id);
        $coup = $this->discounts_model->alldiscounts();
        $advtcoups = array();
        $catcoups = array();
        foreach ($coup as $row) {
            array_push($advtcoups, $row['advtName']);
            array_push($catcoups, $row['catName']);
        }
        $data1['stores'] = array_unique($advtcoups);
        $data1['categories'] = array_unique($catcoups);
        $this->load->view('viewmore', $data1);
    }

    public function category() {
        $keyword = $this->uri->segment(2);
        $url34 = URL . 'GiftCoupons.json?orderBy="advtName"&equalTo="' . $keyword . '"';
        $data34 = $this->curl($url34);
        $data['coupouns'] = json_decode($data34);
        $this->load->view('simillar', $data);
    }

    public function expired() {
        $this->load->view('timeout');
    }

}

?>
