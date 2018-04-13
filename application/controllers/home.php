<?php

/* * **************************************************************
 * File Name : Home controller
 * File Description : here we disay coupons existing in our firebse 
 *                    database
 * Author: Shanthi.
 * Create Date : 18/09/2017 (DD/MM/YYYY)
 * Revision:
 * Last Modified by : Shanthi
 * Last Modified Date : xxxx xxxxxx
 * Modified Reason : xxxx xxxxxx
 * *************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
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
        $result = curl_exec($ch); //echo "<pre>";print_r($result);exit;
        // Closing
        curl_close($ch);

        return $result;
    }

    //curl method to retrieve all data from firebase
    private function curlsearchcoupouns($url, $data) {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . '=' . $value . '&';
        }
        rtrim($fields, '&');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch); //echo "<pre>";print_r($response);exit;
        // Closing
        curl_close($ch);

        return $result;
    }

    /**
     * Name: index
     * Params: $this->input->post('username') and $this->input->post('password') are post values
     * Return Type: After login it redirects to dashboard page
     * Description:  here checks for admin user exists in firebase or not
     */
//    public function index() {
//        $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
//        $data34 = $this->curl($url34);
//        $coup = json_decode($data34); //echo "<pre>";print_r($coup);exit;
//        $total = count((array) $coup);
//        $per_column = floor($total / 2);
//        $rest = $total % 2;
//
//
////        $split = array();
////        foreach ($coup as $key=>$item) {
////            $split[$item->name[0]][$key] = $item;
////        }echo "<pre>";print_r($split);exit;
//        // $data['coupouns_first'] = array_chunk($coup,ceil(count($total) / 2));echo "<pre>";print_r($data['coupouns_first']);exit;
//
//        $data['coupouns_first'] = $this->partition($coup, 2);
//        echo "<pre>";
//        print_r($data['coupouns_first']);
//        exit;
//        // $total = count((array)$coup);//echo $total/50;exit;
//        // $data['coupouns_first'] = array_slice($coup,0, 5); // echo "<pre>";print_r(  array_slice($coup,0, $total / 2));exit;
//        //  $data['coupouns_second'] = array_slice(json_decode($data34), $total / 2);  
//        $this->load->view('home', $data);
//    }

    public function index() {
        $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
        $data34 = $this->curl($url34);
        $coup = json_decode($data34);
        $total = count((array) $coup);
        $limit = floor($total / 2);
        $url = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"&limitToFirst=' . $limit;
        $data4 = $this->curl($url);
        $data['coupouns_first'] = json_decode($data4);
        $urllast = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"&limitToLast=' . $limit;
        $datalast = $this->curl($urllast);
        $data['coupouns_second'] = json_decode($datalast);
        $this->load->view('home', $data);
    }

    private function in_object($val, $obj) {
        if ($val == "") {
            trigger_error("in_object expects parameter 1 must not empty", E_USER_WARNING);
            return false;
        }
        if (!is_object($obj)) {
            return (object) $obj;
        }
    }

    public function search() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
            $data34 = $this->curl($url34);
            $coup = json_decode($data34);
            $exists_name = array();
            foreach ($coup as $key => $row1) {
                if (preg_match('/(' . $this->input->post('keyword') . ')/i', $row1->name) === 1) {
                    array_push($exists_name, $row1);
                }
//                if (preg_match('(' . $this->input->post('keyword') . ')', $row1->desc) === 1) {
//                    array_push($exists_name, $row1);
//                }
            }
            $data['coupouns'] = array_filter($exists_name); //echo "<pre>";print_r($data['coupouns']);exit;    
              //$data['coupouns'] = array_map("unserialize", array_unique(array_map("serialize", $exists_name)));; //echo "<pre>";print_r($data['coupouns']);exit;   
        }
        $this->load->view('search_results',$data);
    }

}

?>