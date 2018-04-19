<?php

/* * **************************************************************
 * File Name : Client Model
 * Description : here we insert,update, view and delete the clients
 * Author: Sushama
 * Create Date : 18/07/2016 (DD/MM/YYYY)
 * Revision:
 * Last Modified by : Shanthi
 * Last Modified Date : (DD/MM/YYYY)
 * Modified Reason : xxxx xxxxxx
 * *************************************************************** */

class discounts_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * get all the coupouns from discounts table based on name
     */

    public function get_discounts($data_to_find) {
        $this->db->select('*');
        $this->db->where("name",$data_to_find);
        $query=$this->db->get("discounts");
        return $query->result_array();	
    }
    /*
     * inserting coupouns
     */

    public function insertrow($data_to_store) {  
        return $this->db->insert("discounts",$data_to_store);
    }
    
    /***
     * To get all discounts of 
     */
    public function alldiscounts() {
        $this->db->select('*'); 
        $query=$this->db->get("discounts");
        return $query->result_array();	
    }
    
    /*
     * Delete the record based on end date
     */
    public function deleterecord($id){
        return $this->db->delete('discounts',array('id'=>$id)); 
    }

}

//end of file client_model.php
?>