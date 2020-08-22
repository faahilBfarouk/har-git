<?php

defined('BASEPATH')OR exit('No direct script access allowed');

class Import_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($table, $dataImport) {

        if ($this->db->insert_batch($table, $dataImport)) {
            return true;
        } else {
            return false;
        }
    }

    function checkEnqUniq($enq, $field, $table) {
        $data = array();
        $this->db->select('Enquiry_No');
        $this->db->where('Enquiry_No ', $enq);
        $result = $this->db->get($table)->result_array();
        if (!empty($result)) {
            foreach ($result as $row) {
                $data = array(
                    'response' => 1,
                    'field' => $field,
                    'Enquiry_No' => $row['Enquiry_No']
                );
            }
            return $data;
        } else {
            $data = array(
                'response' => 0,
                'field' => $field,
                'Enquiry_No' => 0
            );
        }
        return $data;
    }

    function enqInBooking($enq, $field, $table,$TableField) {
        // table = 'booking_daily_rep',TableField 'ENQUIRY_NO'
        $data = array();
        $this->db->select($TableField);
        $this->db->where($TableField, $enq);
        $result = $this->db->get('booking_daily_rep')->result_array();
        if (!empty($result)) {
            foreach ($result as $row) {
                $data = array(
                    'response' => 1,
                    'field' => $field,
                    $TableField => $row[$TableField]
                );
            }
            return $data;
        } else {
            $data = array(
                'response' => 0,
                'field' => $field,
                $TableField => 0
            );
        }
        return $data;
    }

    function checkEnqUniqforOrder($enq, $field, $table) {
        $data = array();
        $this->db->select('Enquiry_No');
        $this->db->where('Enquiry_No ', $enq);
        $result = $this->db->get($table)->result_array();
        if (!empty($result)) {
            foreach ($result as $row) {
                $data = array(
                    'response' => 1,
                    'field' => $field,
                    'Enquiry_No' => $row['Enquiry_No']
                );
            }
            return $data;
        } else {
            $data = array(
                'response' => 0,
                'field' => $field,
                'Enquiry_No' => 0
            );
        }
        return $data;
    }

    function checkOdrUniq($ORDER_NUM, $orderId, $table) {
        $data = array();
        $this->db->select('ORDER_NUM');
        $this->db->where('ORDER_NUM ', $ORDER_NUM);
        $result = $this->db->get($table)->result_array();
        if (!empty($result)) {
            foreach ($result as $row) {
                $data = array(
                    'response' => 1,
                    'orderField' => $orderId,
                    'ORDER_NUM' => $row['ORDER_NUM']
                );
            }
            return $data;
        } else {
            $data = array(
                'response' => 0,
                'field' => $orderId,
                'Enquiry_No' => 0
            );
        }
        return $data;
    }

    function get_details($table, $field) {
        $this->db->distinct($field);
        $this->db->select($field);
        return $this->db->get($table)->result_array();
    }

    function get_emp($table, $field, $filter) {
        $this->db->distinct($field);
        $this->db->select($field);
        $this->db->where(array('employe_table_employe_hierarchy' => $filter, 'employe_table_employe_status' => 1));
        return $this->db->get($table)->result_array();
    }
    //checq unique values no  in table
    public function isUnique($SelectField,$value,$table,$fieldId){
        $data = array();
        $this->db->select($SelectField);
        $this->db->where($SelectField, $value);
        $result = $this->db->get($table)->result_array();
        if (!empty($result)) {
            foreach ($result as $row) {
                $data = array(
                    'response' => 1,
                    'field' => $fieldId,
                    $SelectField => $row[$SelectField]
                );
            }
            return $data;
        } else {
            $data = array(
                'response' => 0,
                'field' => $fieldId,
                $SelectField => 0
            );
        }
        return $data;
    }

}
