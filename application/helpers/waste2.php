<?php

function get_category() {
    $ci = get_instance();
    $category = $ci->db->get_where('category', array('category_status' => 1))->result_array();
    $service = $ci->db->get_where('services', array('services_status' => 1))->result_array();
    return $result = array($category, $service);
}

function get_sliders($slider_area_id) {
    $where = array(
        'slider_images_area_id' => $slider_area_id,
        'slider_images_status' => 1
    );
    $ci = get_instance();
    $slider = $ci->db->get_where('slider_images', $where)->result_array();
    return $slider;
}

function get_Contact() {
    $ci = get_instance();
    $where = array(
        'Br_Status' => 2
    );
    $branches = $ci->db->get_where('branches', $where)->result_array();
    return $branches;
}

function list_cars($table, $field) {
    $ci = get_instance();
    return $ci->db->get_where($table, array($field . '!=' => 0))->result_array();
}

function get_Best_Insurance_Agent() {
    $ci = get_instance();
    $ci->db->join('performance', 'performance.perf_eid = emp.Emp_Eid');
    $where = array(
        'performance.perf_in_service_ID' => 3,
        'performance.perf_rank' => 1,
    );
    $ci->db->where($where);
    return $ci->db->get('emp')->result_array();
}

function get_All_Services() {
    $ci = get_instance();
    $where = array(
        'services_status' => 1);
    $ci->db->where($where);
    return $ci->db->get('services')->result_array();
}

function select_dropdown($table, $table_filed, $id, $status) {
    $ci = get_instance();
    //$table = 'services';
    //$table_filed = 'services_id';
    //$id = 1;

    $where = array(
        $status => 1,
        $table_filed => $id
    );
    $ci->db->where($where);
    return $ci->db->get($table)->result_array();
}

function populate_dropdown($table, $status) {
    $ci = get_instance();


    $where = array(
        $status => 1,
    );
    $ci->db->where($where);
    return $ci->db->get($table)->result_array();
}

function get_cars() {
    $ci = get_instance();
    $where = array(
        'inventory_status' => 1,
    );
    $ci->db->where($where);
    $ci->db->order_by('rand()');
    return $ci->db->get('inventory', 6)->result_array();
}

function setFlashData($class, $message, $url) {
    $ci = get_instance();
    $ci->load->library('session');
    $ci->session->set_flashdata($class, $message);
    redirect($url);
}

function responseFlash($class, $message) {
    $ci = get_instance();
    $ci->session->set_flashdata($class, $message);
    return $message;

    //  redirect($url);
}

function userLogedIn() {
    $ci = get_instance();
    $ci->load->library('session');
    if ($ci->session->userdata('user_employee_id')) {
        return true;
    } else {
        return false;
    }
}

function user_access($key) {
    if (userLogedIn()) {
        $ci = get_instance();
        if (empty($key)) {
            $key = $ci->router->fetch_method();
        }
        $where = array(
            'user_controler' => $ci->router->fetch_class(),
            'user_method' => $key,
            'user_access_user_id', $_SESSION['user_id']
        );
        $ci->db->join('user_roles', 'user_roles.user_role_id = user_access.user_access_user_role_id');
        $ci->db->where($where);
        $access = $ci->db->get('user_access')->result();
        if (!empty($access)) {
            return true;
        } else {
            return false;
        }
    } else {
        setFlashData('error', 'Please login', ADMINURL . 'Home/LogIn');
    }
}

function checklog() {
    $ci = get_instance();
    $sess_id = $this->session->userdata()['__ci_last_regenerate'];
    return $sess_id;
}
