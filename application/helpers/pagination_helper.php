<?php
/* * ***************************************************************************************************************
 * File Name : Pagination helper
 * File Description : this helper is used for pagination
 * Author: Shanthi.
 * Create Date : 21/2/2013 (DD/MM/YYYY)
 * Revision:
 * Last Modified by : xxxxxx
 * Last Modified Date : (DD/MM/YYYY)
 * Modified Reason : xxxx xxxxxx
 * **************************************************************************************************************** */
function get_pagination($url,$total,$limit,$cur_page,$uri_segment=2)
{ //echo $cur_page.br(1);exit;//$uri_segment=3
    $CI =& get_instance();
    //$config['suffix'] = '?'.http_build_query($sortby, '', "&");
    $config['site_url'] = $url; 
    $config['total_rows'] = $total;
    $config['per_page'] = $limit; 
   
    $config['cur_page'] = (int)$cur_page;
    $config['uri_segment'] = $uri_segment;

    //parse_str($_SERVER['QUERY_STRING'], $_GET);  
   // $config['uri_protocol'] = "PATH_INFO";
  //  $config['enable_query_strings'] = TRUE;
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '&nbsp;</li>';
    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li>&nbsp;';
    $config['prev_tag_close'] = '&nbsp;</li>';
    $config['cur_tag_open'] = '<li class="active">&nbsp;';
    $config['cur_tag_close'] = '&nbsp;</li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '&nbsp;</li>';// echo "<pre>";print_r($config);exit;
    //$config['suffix'] = '?'.http_build_query($_GET, '', "&");
    $CI->pagination->initialize($config);   
    return $CI->pagination->create_links();
}
?>