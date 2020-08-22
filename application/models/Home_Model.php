<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_category() {
        $category = $this->db->get_where('category', array('category_status' => 1))->result_array();
        $service = $this->db->get_where('services', array('services_status' => 1))->result_array();
        return $result = array($category, $service);
    }

    function get_Category_Pages($category) {
        $category_filter = array(
            'category_status' => 1,
            'category_name' => $category
        );
        $category = $this->db->get_where('category', $category_filter)->result_array();
        if (!empty($category)) {
            $category_id = $category[0]['category_id'];
            $where = array(
                'inventory_status' => 1,
                'inventory_category_id' => $category_id
            );
            $products = $this->db->get_where('inventory', $where)->result_array();
            if (count($products) > 0) {
                return $products;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function get_Finance() {
        $where = array(
            'finance_status' => 1
        );
        $products = $this->db->get_where('company_finance', $where)->result_array();
        return $products;
    }

//demo work
    public function record_count($category) {
        $category = str_replace('%20', '_', $category);
        if ($category == 'all') {
            return $this->db->count_all("inventory");
        } else {
            $category_filter = array(
                'category_status' => 1,
                'category_name' => $category
            );
            $category = $this->db->get_where('category', $category_filter)->result_array();
            $category_id = $category[0]['category_id'];
            $where = array(
                'inventory_status' => 1,
                'inventory_category_id' => $category_id
            );
            $this->db->where($where);
            $result = $this->db->get("inventory")->result_array();
            return sizeof($result);
        }
    }

    public function fetch_categories($limit, $start, $category) {
        $category = str_replace('%20', '_', $category);
        if ($category == 'all') {
            $this->db->limit($limit, $start);
            $query = $this->db->get("inventory");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        } else {
            $category_filter = array(
                'category_status' => 1,
                'category_name' => $category
            );
            $category = $this->db->get_where('category', $category_filter)->result_array();
            $category_id = $category[0]['category_id'];
            $where = array(
                'inventory_status' => 1,
                'inventory_category_id' => $category_id
            );
            $this->db->limit($limit, $start);
            $this->db->where($where);
            $query = $this->db->get("inventory");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
    }

    function get_Service_Pages($category) {
        
    }

}
