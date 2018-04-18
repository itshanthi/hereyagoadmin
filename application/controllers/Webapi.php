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
 * Modified Reason : xxxx xxxxxxlocalhost:8888/hereyagoadmin/StoreImage?type=Profile&Imageurl=1524035921-hPfxVXGFSOCiQ5uWK2Ty_banner.png.jpg
 * *************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

class Webapi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Discounts_Model', 'discounts_model', TRUE); //loaded discounts model      
        ini_set('max_execution_time', 300);
        // $this->load->library('FirebaseLib.php'); //loaded admin model
    }

    //curl method to retrieve all data from firebase
    private function curl($url) {
        $ch = curl_init();
        //verify key   userMobileNumber: 
//"8600227438"
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

    //curl method to retrieve all data from firebase
    private function curlcoupouns($url, $key) {
        //ECHO $key;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . $key)); // send development key
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch);
        $result = json_decode(json_encode((array) simplexml_load_string($response)), 1);
        // Closing
        curl_close($ch);

        return $result;
    }

    public function index() {
        $email_given = $this->uri->segment(2);
        //checking given email id is valid or not
        if (isset($email_given) && $email_given != '' && !filter_var($email_given, FILTER_VALIDATE_EMAIL)) {
            $error['status'] = 'Invalid email format';
            print json_encode($error);
            exit;
        }
        $url = URL . 'User_Profiles.json?auth=' . AUTHKEY . '&orderBy="userEmail"&equalTo="' . $email_given . '"';
        $data1 = $this->curl($url);
        $email = json_decode($data1);
        //checking the given email exists or not
        if (empty(get_object_vars($email))) {
            $error['status'] = $email_given . ' does not exists with our database';
            print json_encode($error);
            exit;
        }
        //if email exists send a mail to the user regarding activation link
        if (get_object_vars($email)) {
            $emaildata = array();
            foreach ($email as $row) {
                array_push($emaildata, $row);
            }
            $to = $email_given;
            $subject = 'Activation Mail of Hereyago';
            $message = 'Hi,<br /><br />You had registered with us. <br />Please click below link to activate with us.<br /><br />'
                    . '<a target="_blank" href="http://localhost/heryagoadmin/activeUser/' . base64_encode($emaildata[0]->id) . '+%' . base64_encode($emaildata[0]->userEmail) . '">Click Here</a>';
            $headers = 'From: u.v.sri82@gmail.com' . "\r\n" .
                    'Reply-To: no reply' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            //echo $message;
            //exit;
            @$send_mail = mail($to, $subject, $message, $headers);
            if (!$send_mail) {
                $error['status'] = 'Error in sending a mail';
                print json_encode($error);
                exit;
            }
            if ($send_mail) {
                $error['status'] = 'Mail send successfully';
                print json_encode($error);
                exit;
            }
        }
    }

    public function sendSms() {
        //echo "<pre>";print_r($this->input->get());exit;
        if ($this->input->get('emailid') != '') {
            $email_given = $this->input->get('emailid');
            if (empty($email_given)) {
                $error = array("status" => "msg", "errmsg" => "Emailid should not be empty");
                print json_encode($error);
                exit;
            }
            if (!filter_var($email_given, FILTER_VALIDATE_EMAIL)) {
                $error = array("status" => "msg", "errmsg" => "Invalid email id");
                print json_encode($error);
                exit;
            }
            if ($this->input->get('code') != '') {
                $code = $this->input->get('code');
                if (empty($code)) {
                    $error = array("status" => "msg", "errmsg" => "Code should not be empty");
                    print json_encode($error);
                    exit;
                }
                if (!is_numeric($code)) {
                    $error = array("status" => "msg", "errmsg" => "Code should be only numeric");
                    print json_encode($error);
                    exit;
                }
                if (strlen($code) != 4) {
                    $error = array("status" => "msg", "errmsg" => "Code should to 4 digit number");
                    print json_encode($error);
                    exit;
                }
            }
            if ($this->input->get('mobile') != '') {
                $mobile_given = $this->input->get('mobile');
                if (!is_numeric($mobile_given)) {
                    $error = array("status" => "msg", "errmsg" => "Mobile Number should be only numeric");
                    print json_encode($error);
                    exit;
                }
                if (strlen($mobile_given) < 10) {
                    $error = array("status" => "msg", "errmsg" => "Mobile Number should to 10 digit number");
                    print json_encode($error);
                    exit;
                }
                if (strlen($mobile_given) > 11) {
                    $error = array("status" => "msg", "errmsg" => "Mobile Number should be between 10 0r 11 didgit numbersss");
                    print json_encode($error);
                    exit;
                }
                if (strlen($mobile_given) == 11) {
                    $chek = substr($mobile_given, 0, 1);
                    if ($chek != 1) {
                        $error = array("status" => "msg", "errmsg" => "If mobile number is 11 digit it should start with 1");
                        print json_encode($error);
                        exit;
                    }
                }
            }
            if ($this->input->get('code') != '') {
                $exists_code = $this->input->get('code');
            } else {
                define('URL1', 'https://hereyago-1493661831888.firebaseio.com/');
                define('AUTHKEY1', 'a0C47Z66jBVqiVSeM9wpEo5wXcLIF0B9cNw5Ii5f');
                $url = URL1 . 'Android/User_Profiles.json?auth=' . AUTHKEY1 . '&orderBy="userEmail"&equalTo="' . $email_given . '"';
                $data1 = $this->curl($url);
                $userdata = json_decode($data1); //echo "<pre>";print_r($userdata); exit;
                $emaildata = array();
                foreach ($userdata as $row) {
                    array_push($emaildata, $row);
                }
                $exists_code = $emaildata[0]->otp;
                $exists_mobile = $emaildata[0]->userMobileNumber;
            }
            if (isset($mobile_given) && $mobile_given != '') {
                // Your Account Sid and Auth Token from twilio.com/user/account
                $this->load->library('twilio');
                $sms_sender = "+17604472245";
                $sms_reciever = $mobile_given;
                $sms_message = str_replace('<br>', '', "Hi,<br><br>You had registered with us. <br>Here is the otp to activate with us.<br>otp:&nbsp;" . $exists_code);
                $from = '+' . $sms_sender; //trial account twilio number  $response->ErrorMessage
                $to = '+' . $sms_reciever; //sms recipient number
                $response = $this->twilio->sms($from, $to, $sms_message); //echo "<pre>";print_r($response);exit;

                if ($response->IsError) {
                    $error = array("status" => "msg", "errmsg" => $response->ErrorMessage);
                    print json_encode($error);
                    exit;
                } else {
                    $error = array("status" => "msg", "successmsg" => "Sms send successfully to " . $to);
                    print json_encode($error);
                    exit;
                }
            }
            $to = $email_given;
            $subject = 'Activation Mail from Hereyago';
            $message = strip_tags('Hi,<br /><br />You had registered with us. <br />Here is the otp to activate with us.<br />'
                    . 'otp:&nbsp;' . $exists_code);
            $headers = 'From: u.v.sri82@gmail.com' . "\r\n" .
                    'Reply-To: no reply' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion() . "\r\n" .
                    "Content-Type: text/html; charset=utf-8";
            @$send_mail = mail($to, $subject, $message, $headers);
            if (!$send_mail) {
                $error = array("status" => "msg", "errmsg" => "Error in sending a mail");
                print json_encode($error);
                exit;
            }
            if ($send_mail) {
                $error = array("status" => "msg", "successmsg" => "Mail send successfully");
                print json_encode($error);
                exit;
            }
        } else {
            $error = array("status" => "msg", "errmsg" => "Please give emailid in your query string");
            print json_encode($error);
            exit;
        }
    }

    public function store_image() {//echo "<pre>";print_r($this->input->get());exit;
        if ($this->input->get('type') != '') {
            $type = $this->input->get('type');
            if (empty($type)) {
                $error = array("status" => "msg", "errmsg" => "Type should not be empty");
                print json_encode($error);
                exit;
            }
            if ($this->input->get('Imageurl') != '') {
                $Imageurl = $this->input->get('Imageurl');
                if (empty($Imageurl)) {
                    $error = array("status" => "msg", "errmsg" => "ImageUrl should not be empty");
                    print json_encode($error);
                    exit;
                }
                $image = @file_get_contents($Imageurl);
                $split_image = pathinfo($Imageurl);
                $filename = time() . '-' . $split_image['filename'] . '.' . $split_image['extension'];
                if (file_exists(SITEPATH . 'assets/uploads/' . $type)) {//echo $type."11";exit;
                    $destination = file_put_contents(SITEPATH . 'assets/uploads/' . $type . '/' . $filename, $image);
                } else {//echo "21";exit;
                    mkdir(SITEPATH . 'assets/uploads/' . $type, 0777, true);
                    $destination = file_put_contents(SITEPATH . 'assets/uploads/' . $type . '/' . $filename, $image);
                }
                if ($destination == '0') {
                    $error = array("status" => "successmsg", "foldername" => SITEPATH . 'assets/uploads/' . $type, "filename" => $filename);
                    print json_encode($error);
                    exit;
                }
            } else {
                $error = array("status" => "msg", "errmsg" => "Please give Imageurl in your query string");
                print json_encode($error);
                exit;
            }
        } else {
            $error = array("status" => "msg", "errmsg" => "Please give Type in your query string");
            print json_encode($error);
            exit;
        }
    }

    public function activeLink() {
        $string = $this->uri->segment(2);
        if (strpos($string, '+%') === false) {
            $error['status'] = 'Sorry! You are not our registered user';
            print json_encode($error);
            exit;
        }
        $lastdata = explode("+%", $this->uri->segment(2));
        $id = base64_decode($lastdata[0]);
        $email = base64_decode($lastdata[1]); //echo $id."<br />".$email;
        $url = URL . 'User_Profiles.json?auth=' . AUTHKEY . '&orderBy="userEmail"&equalTo="' . $email . '"';
        $data1 = $this->curl($url);
        $existing_data = json_decode($data1);
        //checking the given email exists or not
        if (empty(get_object_vars($existing_data))) {
            $error['status'] = 'Sorry! You are not our registered user';
            print json_encode($error);
            exit;
        }
        if (get_object_vars($existing_data)) {
            $exists = array();
            foreach ($existing_data as $row) {
                array_push($exists, $row);
            }
            if ($id != $exists[0]->id) {
                $error['status'] = 'Sorry! You are not our registered user';
                print json_encode($error);
                exit;
            }
            if ($id == $exists[0]->id) {
                if ($exists[0]->status == 'A') {
                    $error['status'] = 'Sorry! You had already activated your account';
                    print json_encode($error);
                    exit;
                }
                $url1 = 'https://hereyago-d6632.firebaseio.com/User_Profiles/' . $id . '.json?auth=' . AUTHKEY;
                $fields = array(
                    'status' => 'A'
                );
                $fields = json_encode($fields);
                $data = $this->curl_update($url1, $fields);
                $error['status'] = 'Your account has been activated successfully';
                print json_encode($error);
                exit;
            }
        }
    }

//     public function add_mycoupouns() {
//        if ($this->session->userdata('isLoggedIn') == FALSE) {
//            redirect(base_url() . 'admin');
//        } else {
//            $seg = $this->uri->segment(2);
//            /*             * ******cj live extracting coupouns****** */
//            $websiteid = "8202913";
//            // register for your developer's key here: http://webservices.cj.com/ (input dev key below)
//            $CJ_DevKey = "00810517ac9a945959626e9e590d22b91035f05369006ac135164afb0e15e81986b5541535ec7e106429d9947437f9308311f02ecbfcd89a039f7d28926d91d59b/077590e9d4c210ec5f0980342bd33f19d5d4802e08ed23207b9a782b574ee4f2d4430a4a980f7376cc4f539af100bbb531419e789fc176846ce0a17098e11d41";
//            $linktype = "banner";
//            $advs = "joined"; // results from (joined), (CIDs), (Empty String), (notjoined)
//            $maxresults = 100;
//            $promotion = "coupon";
//            $promotionSdate = "";
//            $promotionEdate = "";
//            // begin building the URL and GETting variables passed  product https://product-search.api.cj.com/v2/product-search
//            $targeturl = "https://link-search.api.cj.com/v2/link-search?";
//
//            // if (isset($_POST["keyword"]) && $_POST["keyword"] != '') {
//            if (isset($seg) && $seg != '') {
//                $keywords = $seg;
//            } else {
//                $keywords = '';
//            }
//            // $targeturl .= "keywords=$keywords";
//            //SS }
//            $targeturl .= "&records-per-page=" . $maxresults;
//            $targeturl .= "&website-id=$websiteid";
//            $targeturl .= "&advertiser-ids=$advs";
//            $targeturl .= "&link-type=$linktype";
//            $targeturl .= "&promotion-type=$promotion";
//            $targeturl .= "&promotion-start-date=$promotionSdate";
//            $targeturl .= "&promotion-end-date=$promotionEdate";
//            // $targeturl .= "&page-number=1"; //echo $targeturl;exit;
//            $cjdata = $this->curlcoupouns($targeturl, $CJ_DevKey);  //echo "<pre>"; print_r($cjdata);exit;
//            $dataarray['giftCoupons'] = array();
//            //retrieving the gift coupons
//            $url1 = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
//            $coupons_exists = $this->curl($url1);
//            $exists = json_decode($coupons_exists);  //echo "<pre>";print_r(count((array) $exists));exit;
//            if (isset($cjdata['links']['link']) && $cjdata['links']['link'] != '') {
//                if (isset($exists) && $exists != '') {//echo "1<pre>";print_r($exists);exit;                   
//                    $exists_name = array();
//                    foreach ($exists as $row1) {
//                        array_push($exists_name, $row1->name);
//                    }
//                    if (isset($exists_name) && $exists_name != '') {//echo "1";exit;
//                        foreach ($cjdata['links']['link'] as $row) {
//                            $imageanchor = $row['link-code-html']; //echo $imageanchor;exit;
//                            preg_match_all('/src=[\'"]?([^\s\>\'"]*)[\'"\>]/', $imageanchor, $matches);
//                            $hrefs = ($matches[1] ? $matches[1] : false); //echo "<pre>";print_r($hrefs[0]);exit;
//                            
////                             $ext = end(explode('.',$hrefs['0']));//echo $ext.br(2);
////                            $image  =time().'.'.$ext;//echo $image;exit;
//                            
////                            $img = SITEPATH.'assets/img/coupouns/';
////                            file_put_contents($img, file_get_contents($hrefs['0']));
//
//                            if (!in_array($row['link-name'], $exists_name)) {
//                                $url = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
//                                $fields = array(
//                                    'catName' => $row['category'],
//                                    'width' => $row['creative-width'],
//                                    'height' => $row['creative-height'],
//                                    'advtName' => $row['advertiser-name'],
//                                    'linksjs' => $row['link-code-javascript'],
//                                    'name' => $row['link-name'],
//                                    'desc' => $row['description'],
//                                    'startDate' => $row['promotion-start-date'],
//                                    'endDate' => $row['promotion-end-date'],
//                                    'salecomission' => $row['sale-commission'],
//                                    'coupcode' => $row['coupon-code'],
//                                    'status' => 'A',
//                                    'imageUrl' => $hrefs[0],
//                                    'clickUrl' => $row['clickUrl']
//                                );
//                                $data1 = $this->curl($url);
//                                $fields = json_encode($fields); //echo "<pre>";print_r(count(giftCoupons));
//                                $data = $this->curl_insert($url, $fields); //inserting the data
//                            }
//                        }
//                    }
//                } else {//echo "2";exit;
//                    foreach ($cjdata['links']['link'] as $row) {
//                        $imageanchor = $row['link-code-html']; //echo $imageanchor;exit;
//                        preg_match_all('/src=[\'"]?([^\s\>\'"]*)[\'"\>]/', $imageanchor, $matches);
//                        $hrefs = ($matches[1] ? $matches[1] : false);
//                        $url = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
//                        $fields = array(
//                            'catName' => $row['category'],
//                            'width' => $row['creative-width'],
//                            'height' => $row['creative-height'],
//                            'advtName' => $row['advertiser-name'],
//                            'linksjs' => $row['link-code-javascript'],
//                            'name' => $row['link-name'],
//                            'desc' => $row['description'],
//                            'startDate' => $row['promotion-start-date'],
//                            'endDate' => $row['promotion-end-date'],
//                            'salecomission' => $row['sale-commission'],
//                            'coupcode' => $row['coupon-code'],
//                            'status' => 'A',
//                            'imageUrl' => $hrefs[0],
//                            'clickUrl' => $row['clickUrl']
//                        );
//                        $data1 = $this->curl($url);
//                        $fields = json_encode($fields); //echo "<pre>";print_r(count($fields));
//                        $data = $this->curl_insert($url, $fields); //inserting the data
//                    }
//                }
//            } 
//            $url34 = URL . 'GiftCoupons.json?auth=' . AUTHKEY . '&orderBy="status"&equalTo="A"';
//            // $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
//            $data34 = $this->curl($url34);
//            $dataarray['giftCoupons'] = json_decode($data34);   //  echo "2<pre>" ;print_r( $dataarray['giftCoupons']);exit;
//            // echo "3<pre>" ;print_r( $dataarray['giftCoupons']);exit;
//            $this->load->view('includes/header');
//            $this->load->view('coupons/list', $dataarray);
//            $this->load->view('includes/footer');
//        }
//    }

    public function add_mycoupouns() {

        /*         * ******cj live extracting coupouns****** */
        $websiteid = "8202913";
        // register for your developer's key here: http://webservices.cj.com/ (input dev key below)
        $CJ_DevKey = "00810517ac9a945959626e9e590d22b91035f05369006ac135164afb0e15e81986b5541535ec7e106429d9947437f9308311f02ecbfcd89a039f7d28926d91d59b/077590e9d4c210ec5f0980342bd33f19d5d4802e08ed23207b9a782b574ee4f2d4430a4a980f7376cc4f539af100bbb531419e789fc176846ce0a17098e11d41";
        $linktype = "banner";
        $advs = "joined"; // results from (joined), (CIDs), (Empty String), (notjoined)
        $maxresults = 100;
        $promotion = "coupon";
        $promotionSdate = "";
        $promotionEdate = "";
        // begin building the URL and GETting variables passed  product https://product-search.api.cj.com/v2/product-search
        $targeturl = "https://link-search.api.cj.com/v2/link-search?";

        // if (isset($_POST["keyword"]) && $_POST["keyword"] != '') {
        if (isset($seg) && $seg != '') {
            $keywords = $seg;
        } else {
            $keywords = '';
        }
        // $targeturl .= "keywords=$keywords";
        //SS }
        $targeturl .= "&records-per-page=" . $maxresults;
        $targeturl .= "&website-id=$websiteid";
        $targeturl .= "&advertiser-ids=$advs";
        $targeturl .= "&link-type=$linktype";
        $targeturl .= "&promotion-type=$promotion";
        $targeturl .= "&promotion-start-date=$promotionSdate";
        $targeturl .= "&promotion-end-date=$promotionEdate";
        // $targeturl .= "&page-number=1"; //echo $targeturl;exit;
        $cjdata = $this->curlcoupouns($targeturl, $CJ_DevKey);  //echo "<pre>"; print_r($cjdata['links']['link']);exit;  
        $datavalues = array();
        foreach ($cjdata['links']['link'] as $row) {
            $exists = $this->discounts_model->get_discounts($row['link-name']);  //echo "12<pre>"; print_r($exists);exit;
            if (!$exists) {
                $imageanchor = $row['link-code-html']; //echo $imageanchor;exit;
                preg_match_all('/src=[\'"]?([^\s\>\'"]*)[\'"\>]/', $imageanchor, $matches);
                $hrefs = ($matches[1] ? $matches[1] : false);
                if (!empty($row['coupon-code']) != '') {
                    $fields= array(
                        'catName' => $row['category'],
                        'advtName' => $row['advertiser-name'],
                        'linkjs' => $row['link-code-javascript'],
                        'name' => $row['link-name'],
                        'desc' => $row['description'],
                        'startDate' => $row['promotion-start-date'],
                        'endDate' => $row['promotion-end-date'],
                        'salecomission' => $row['sale-commission'],
                        'coupcode' => $row['coupon-code'],
                        'imageUrl' => $hrefs[0],
                        'clickUrl' => $row['clickUrl'],
                        'width' => $row['creative-width'],
                        'height' => $row['creative-height']
                    );
                     $this->discounts_model->insertrow($fields);
                }
            }
        }
//        foreach ($fields as $row) {
//           
//        }
        $this->load->view('includes/header');
        $this->load->view('coupons/list');
        $this->load->view('includes/footer');
    }

//    public function add_mycoupouns() {
//        if ($this->session->userdata('isLoggedIn') == FALSE) {
//            redirect(base_url() . 'admin');
//        } else {
//            $seg = $this->uri->segment(2);
//            /*             * ******cj live extracting coupouns****** */
//            $websiteid = "8202913";
//            // register for your developer's key here: http://webservices.cj.com/ (input dev key below)
//            $CJ_DevKey = "00810517ac9a945959626e9e590d22b91035f05369006ac135164afb0e15e81986b5541535ec7e106429d9947437f9308311f02ecbfcd89a039f7d28926d91d59b/077590e9d4c210ec5f0980342bd33f19d5d4802e08ed23207b9a782b574ee4f2d4430a4a980f7376cc4f539af100bbb531419e789fc176846ce0a17098e11d41";
//            $linktype = "banner";
//            $advs = "joined"; // results from (joined), (CIDs), (Empty String), (notjoined)
//            $maxresults = 100;
//            $promotion = "coupon";
//            $promotionSdate = "";
//            $promotionEdate = "";
//            // begin building the URL and GETting variables passed  product https://product-search.api.cj.com/v2/product-search
//            $targeturl = "https://link-search.api.cj.com/v2/link-search?";
//
//            // if (isset($_POST["keyword"]) && $_POST["keyword"] != '') {
//            if (isset($seg) && $seg != '') {
//                $keywords = $seg;
//            } else {
//                $keywords = '';
//            }
//            // $targeturl .= "keywords=$keywords";
//            //SS }
//            $targeturl .= "&records-per-page=" . $maxresults;
//            $targeturl .= "&website-id=$websiteid";
//            $targeturl .= "&advertiser-ids=$advs";
//            $targeturl .= "&link-type=$linktype";
//            $targeturl .= "&promotion-type=$promotion";
//            $targeturl .= "&promotion-start-date=$promotionSdate";
//            $targeturl .= "&promotion-end-date=$promotionEdate";
//            // $targeturl .= "&page-number=1"; //echo $targeturl;exit;
//            $cjdata = $this->curlcoupouns($targeturl, $CJ_DevKey);  //echo "<pre>"; print_r($cjdata);exit;
//            $dataarray['giftCoupons'] = array();
//            //retrieving the gift coupons
//            $url1 = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
//            $coupons_exists = $this->curl($url1);
//            $exists = json_decode($coupons_exists);  //echo "<pre>";print_r(count((array) $exists));exit;
//            if (isset($cjdata['links']['link']) && $cjdata['links']['link'] != '') {
//                if (isset($exists) && $exists != '') {//echo "1<pre>";print_r($exists);exit;                   
//                    $exists_name = array();
//                    foreach ($exists as $row1) {
//                        array_push($exists_name, $row1->name);
//                    }
//                    if (isset($exists_name) && $exists_name != '') {//echo "1";exit;
//                        foreach ($cjdata['links']['link'] as $row) {
//                            $imageanchor = $row['link-code-html']; //echo $imageanchor;exit;
//                            preg_match_all('/src=[\'"]?([^\s\>\'"]*)[\'"\>]/', $imageanchor, $matches);
//                            $hrefs = ($matches[1] ? $matches[1] : false); //echo "<pre>";print_r($hrefs[0]);exit;
//                            if (!in_array($row['link-name'], $exists_name)) {
//                                $url = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
//                                $fields = array(
//                                    'catName' => $row['category'],
//                                    'width' => $row['creative-width'],
//                                    'height' => $row['creative-height'],
//                                    'advtName' => $row['advertiser-name'],
//                                    'linksjs' => $row['link-code-javascript'],
//                                    'name' => $row['link-name'],
//                                    'desc' => $row['description'],
//                                    'startDate' => $row['promotion-start-date'],
//                                    'endDate' => $row['promotion-end-date'],
//                                    'salecomission' => $row['sale-commission'],
//                                    'coupcode' => $row['coupon-code'],
//                                    'status' => 'A',
//                                    'imageUrl' => $hrefs[0],
//                                    'clickUrl' => $row['clickUrl']
//                                );
//                                $data1 = $this->curl($url);
//                                $fields = json_encode($fields); //echo "<pre>";print_r(count(giftCoupons));
//                                $data = $this->curl_insert($url, $fields); //inserting the data
//                            }
//                        }
//                    }
//                } else {//echo "2";exit;
//                    foreach ($cjdata['links']['link'] as $row) {
//                        $imageanchor = $row['link-code-html']; //echo $imageanchor;exit;
//                        preg_match_all('/src=[\'"]?([^\s\>\'"]*)[\'"\>]/', $imageanchor, $matches);
//                        $hrefs = ($matches[1] ? $matches[1] : false);
//                        $url = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
//                        $fields = array(
//                            'catName' => $row['category'],
//                            'width' => $row['creative-width'],
//                            'height' => $row['creative-height'],
//                            'advtName' => $row['advertiser-name'],
//                            'linksjs' => $row['link-code-javascript'],
//                            'name' => $row['link-name'],
//                            'desc' => $row['description'],
//                            'startDate' => $row['promotion-start-date'],
//                            'endDate' => $row['promotion-end-date'],
//                            'salecomission' => $row['sale-commission'],
//                            'coupcode' => $row['coupon-code'],
//                            'status' => 'A',
//                            'imageUrl' => $hrefs[0],
//                            'clickUrl' => $row['clickUrl']
//                        );
//                        $data1 = $this->curl($url);
//                        $fields = json_encode($fields); //echo "<pre>";print_r(count($fields));
//                        $data = $this->curl_insert($url, $fields); //inserting the data
//                    }
//                }
//            }
////            foreach ($exists as $key => $row1) {
////                $today = date("Y-m-d h:i:s");
////                $enddate = $row1->endDate;
////                if ($row1->status != 'D') {
////                    if (strtotime($today) > strtotime($enddate)) {//echo $key;exit;
////                        $urlup = URL . 'GiftCoupons/' . $key . '.json?auth=' . AUTHKEY;
////                        $fields2 = array(
////                            'status' => 'D'
////                        );
////                        $fieldsqw = json_encode($fields2);
////                        $data = $this->curl_update($urlup, $fieldsqw);
////                    }
////                } 
////            }   
//            $url34 = URL . 'GiftCoupons.json?auth=' . AUTHKEY . '&orderBy="status"&equalTo="A"';
//            // $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
//            $data34 = $this->curl($url34);
//            $dataarray['giftCoupons'] = json_decode($data34);   //  echo "2<pre>" ;print_r( $dataarray['giftCoupons']);exit;
//            // echo "3<pre>" ;print_r( $dataarray['giftCoupons']);exit;
//            $this->load->view('includes/header');
//            $this->load->view('coupons/list', $dataarray);
//            $this->load->view('includes/footer');
//        }
//    }
//delete coupons
    public function del_mycoupouns() {
        //echo "1";exit;
        $url34 = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
        // $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
        $data34 = $this->curl($url34);
        $exists = json_decode($data34);     //echo "2<pre>" ;print_r($exists);exit;
        foreach ($exists as $key => $row1) {//echo "2<pre>" ;print_r($row1);exit;
            if (isset($row1->endDate) && $row1->endDate != '') {
                $today = date("Y-m-d h:i:s");
                $enddate = $row1->endDate; //echo $today."1<br/>".$enddate;exit;
                if ($row1->status != 'D') {//echo $today."2<br/>".$enddate;exit;
                    if (strtotime($today) > strtotime($enddate)) {//echo $key;exit;
                        $urlup = URL . 'GiftCoupons/' . $key . '.json?auth=' . AUTHKEY;
                        $ch = curl_init($urlup);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'Content-Type: application/json'
                                )
                        );
                        $result = curl_exec($ch);
                        echo "<pre>";
                        print_r($result);
                        exit;
                        curl_close($ch);
                    }
                }
            }
        }
    }

//    public function del_mycoupouns() {
//        if ($this->session->userdata('isLoggedIn') == FALSE) {
//            redirect(base_url() . 'admin');
//        } else {
//            $url34 = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
//            // $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
//            $data34 = $this->curl($url34);
//            $exists = json_decode($data34);   //  echo "2<pre>" ;print_r( $dataarray['giftCoupons']);exit;
//            foreach ($exists as $key => $row1) {
//                $today = date("Y-m-d h:i:s"); //echo $today;exit;
//                $enddate = $row1->endDate;
//                if ($row1->status != 'D') {
//                    if (strtotime($today) > strtotime($enddate)) {//echo $key;exit;
//                        $urlup = URL . 'GiftCoupons/' . $key . '.json?auth=' . AUTHKEY;
//                        $fields2 = array(
//                            'status' => 'D'
//                        );
//                        $fieldsqw = json_encode($fields2);
//                        $data = $this->curl_update($urlup, $fieldsqw);
//                    }
//                }
//            }
//        }
//    }


    public function add_linkcoupouns() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url() . 'admin');
        } else {
            $seg = $this->uri->segment(2);
            /*             * ******cj live extracting coupouns****** */
            $websiteid = "3382316";
            // register for your developer's key here: http://webservices.cj.com/ (input dev key below)
            $CJ_DevKey = "5e237ddf20255e1b6c3e43256d4e1c7f4607f035810e5865e2a30d284f7c1480";
            // begin building the URL and GETting variables passed  product https://product-search.api.cj.com/v2/product-search
            //$targeturl = "https://api.rakutenmarketing.com/coupon/1.0?network=1";
            //$targeturl = "http://feed.linksynergy.com/coupon?token=" . $CJ_DevKey . "&network=1&mid=" . $websiteid;   
            // $targeturl = "http://couponfeed.linksynergy.com/coupon?token=".$CJ_DevKey."&category=43217&promotiontype=21&network=1&pagenumber=2";
            $targeturl = "http://couponfeed.linksynergy.com/coupon?token=" . $CJ_DevKey . "&type=banner";
            $cjdata = $this->curlcoupouns($targeturl, $CJ_DevKey);
            echo "<pre>";
            print_r($cjdata);
            exit;
            //echo $targeturl;exit;         
            //retrieving the gift coupons
            $url1 = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
            $coupons_exists = $this->curl($url1);
            $exists = json_decode($coupons_exists); // echo "<pre>";print_r($exists);exit;
            if (isset($cjdata['link']) && $cjdata['link'] != '') {//echo "1";exit;
                //echo "<pre>";print_r($cjdata['link']);exit;
            }
            $url34 = URL . 'GiftCoupons.json?auth=' . AUTHKEY . '&orderBy="status"&equalTo="A"';
            // $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
            $data34 = $this->curl($url34);
            $dataarray['giftCoupons'] = json_decode($data34);   //  echo "2<pre>" ;print_r( $dataarray['giftCoupons']);exit;
            // echo "3<pre>" ;print_r( $dataarray['giftCoupons']);exit;
            $this->load->view('includes/header');
            $this->load->view('coupons/list', $dataarray);
            $this->load->view('includes/footer');
        }
    }

    public function add_flexofferscoupouns() {
        if ($this->session->userdata('isLoggedIn') == FALSE) {
            redirect(base_url() . 'admin');
        } else {
            $seg = $this->uri->segment(2);
            /*             * ******cj live extracting coupouns****** */
            $websiteid = "1098247";
            // register for your developer's key here: http://webservices.cj.com/ (input dev key below)
            $CJ_DevKey = "0a70dfbe-96ca-42a1-97d3-59932d4d1b0c";
            // begin building the URL and GETting variables passed  product https://product-search.api.cj.com/v2/product-search
            //$targeturl = "https://api.rakutenmarketing.com/coupon/1.0?network=1";
            //$targeturl = "http://feed.linksynergy.com/coupon?token=" . $CJ_DevKey . "&network=1&mid=" . $websiteid;   
            // $targeturl = "http://couponfeed.linksynergy.com/coupon?token=".$CJ_DevKey."&category=43217&promotiontype=21&network=1&pagenumber=2";
            $targeturl = "https:///api.flexoffers.com/links/banner?page=2&pageSize=500";
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $targeturl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('application-id: 1098247', 'secret-key: 0a70dfbe-96ca-42a1-97d3-59932d4d1b0c', 'Content-Type: application/json', 'application-type: REST')); // -H
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $data = curl_exec($ch);
            echo "<pre>";
            print_r($data);
            exit;
            curl_close($ch);
            return $data;
            //$cjdata = $this->curlcoupouns($targeturl, $CJ_DevKey); // echo "<pre>"; print_r($cjdata);exit;
            //echo $targeturl;exit;         
            //retrieving the gift coupons
            $url1 = URL . 'GiftCoupons.json?auth=' . AUTHKEY;
            $coupons_exists = $this->curl($url1);
            $exists = json_decode($coupons_exists); // echo "<pre>";print_r($exists);exit;
            if (isset($cjdata['link']) && $cjdata['link'] != '') {//echo "1";exit;
                //echo "<pre>";print_r($cjdata['link']);exit;
            }
            $url34 = URL . 'GiftCoupons.json?auth=' . AUTHKEY . '&orderBy="status"&equalTo="A"';
            // $url34 = URL . 'GiftCoupons.json?orderBy="status"&equalTo="A"';
            $data34 = $this->curl($url34);
            $dataarray['giftCoupons'] = json_decode($data34);   //  echo "2<pre>" ;print_r( $dataarray['giftCoupons']);exit;
            // echo "3<pre>" ;print_r( $dataarray['giftCoupons']);exit;
            $this->load->view('includes/header');
            $this->load->view('coupons/list', $dataarray);
            $this->load->view('includes/footer');
        }
    }

}

?>
