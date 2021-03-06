<?php

function check_access($key) {
    if (userLogedIn()) {
        $ci = get_instance();
         $user_data = $ci->session->userdata();
         $access = $user_data['employee_access_level'];
        if (empty($key)) {
            $key = $ci->router->fetch_method();
        }
        $where = array(
            'access_controller' => $ci->router->fetch_class(),
            'access_method' => $key,
            'access_link_ID'=>$access
        );
        $ci->db->where($where);
        $access = $ci->db->get('access_controls')->result();
        if (!empty($access)) {
            return true;
        } else {
            return false;
        }
    } else {
        setFlashData('error', 'Please login', ADMINURL . 'Home/LogIn');
    }
}

function myLoader($msg,$url){
    $ci = get_instance();
      $divert['url'] = $url;
        $divert['message'] = $msg;
        $ci->load->view('sales/loader', $divert);
}

function get_nav_bar($id,$access){
    $ci = get_instance();
   $ci->db->where('access_link_ID',$access);
     $data = $ci->db->get('access_controls')->result_array();

  return $data;
    
}
function checklog() {
    $ci = get_instance();
    $sess_id = $ci->session->userdata()['__ci_last_regenerate'];
    return $sess_id;
}
?>