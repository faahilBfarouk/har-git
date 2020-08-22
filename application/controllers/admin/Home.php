<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Home_Model', 'Home_model');
        $this->load->library('pagination');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        if (userLogedIn()) {
            redirect(ADMINURL . 'AdminArea/welcome_page');
        } else {
            $this->load->view('admin/login');
        }
    }

    public function logIn() {
        if (userLogedIn()) {
            redirect(ADMINURL . 'home');
        } else {
            $this->load->view('admin/login');
        }
    }

    function authenticate() {
        $response = array();
        $param['emp_id'] = $this->input->post('emp_id');
        //$param['emp_password'] = $this->input->post('password');
        $param['emp_password'] = sha1($this->input->post('password'));
        $data = $this->Home_model->User_authenticate($param);
        if ($data) {
            if ($data[0]->employe_table_employe_pass === $param['emp_password']) {
                $response['success'] = true;
                $response['message'] = 'Successfully logedin';
                $forSession = array(
                    'user_id' => $data[0]->employe_table_id,
                    'user_name' => $data[0]->employe_table_employe_name,
                    'user_employee_id' => $data[0]->employe_table_employe_id,
                    'employee_hierarchy' => $data[0]->employe_table_employe_hierarchy,
                    'employee_access_level' => $data[0]->employe_table_access_level,
                    'ses_id' =>$this->session->userdata()['__ci_last_regenerate']
                );
                $this->session->sess_expiration = 0;
                $this->session->set_userdata($forSession);
                $this->session->userdata('user_employee_id');
                $logInData = $this->session->userdata();
                $ins = array(
                    'login_emp_incr_id' => $logInData['user_id'],
                    'login_session_id' => $logInData['__ci_last_regenerate'],
                    'login_emp_id' => $logInData['user_employee_id']
                );
                $this->Home_model->insert('login_data', $ins);
                // print_r($logInData);
                redirect(ADMINURL . 'home');
            } else {
                $response['success'] = false;
                $response['message'] = 'Incorrect credentials please try again !!!';
                $this->load->view('admin/login', $response);
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'No user Found !!!';
            $this->load->view('admin/login', $response);
        }
    }

    public function logout() {

        $logInData = $this->session->userdata();
        $id = $logInData['__ci_last_regenerate'];
        $timestamp = date("Y-m-d H:i:s");
        $ins = array(
            'logout_time' => $timestamp,
            'login_session_is_set' => 0,
        );
        $this->Home_model->updateTable($ins, 'login_data', $id, 'login_session_id');
        //$user_data = $this->session->userdata();
//            foreach ($user_data as $key => $value) {
//                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
//                    $this->session->unset_userdata($key);
//                }
//            }

        $this->session->sess_destroy();
        redirect(ADMINURL);
    }

//    public function listStock() {
//        if (userLogedIn()) {
//            $data = $this->Home_model->list();
//            if (!empty($data)) {
//                foreach ($data as $row) {
//                    $Id = $row->Stock_Product_ID;
//                    $Chassis = $row->Stock_Chassis;
//                    $status = $row->Status;
//                    if ($row->Status == 'Marked') {
//                        $status = '<p class="text-warning">' . $row->Status . '</p>';
//                    } elseif ($row->Status == 'Demanded') {
//                        $status = '<p class="text-danger">' . $row->Status . '</p>';
//                    } else {
//                        $status = '<p class="text-success">' . $row->Status . '</p>';
//                    }
//                    $remarks = $row->remarks;
//                    $select = '
//                    <div class="col-sm-10">
//                        <div><label> <input type="checkbox" value=""> </label></div>
//                    </div>
//                  ';
//                    $output['data'][] = array($Id, $Chassis, $status, $remarks, $select);
//                }
//            } else {
//                $output['data'][] = array('', 'Database empty!!', '', '', '');
//            }
//            echo json_encode($output);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//    public function dailyRep() {
//        if (userLogedIn()) {
//            $filter = 6;
//            $fromDate = date("m/d/Y", strtotime("yesterday"));
//            $toDate = date("m/d/Y");
//            if (isset($_POST['filter'])) {
//                $filter = $this->input->post('filter');
//                $fromDate = $this->input->post('start');
//                $toDate = $this->input->post('end');
//            }
//            $result['fromDate'] = $fromDate;
//            $result['toDate'] = $toDate;
//            $fromDate = date("Y/m/d", strtotime($fromDate));
//            $toDate = date("Y/m/d", strtotime($toDate));
//
//
//
//            // $us_date = "01/01/2012";
//            $parts = explode("/", $fromDate, 3);
//            $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
//            $fromDate = $uk_date;
//            $parts = explode("/", $toDate, 3);
//            $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
//            $toDate = $uk_date;
//            $result['data'] = $this->Home_model->get_reportDate($filter, $fromDate, $toDate);
//
//            $this->load->view("admin/daily_report", $result);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//    public function uploadDailyRep() {
//        if (userLogedIn()) {
//            $this->load->view("admin/upload_daily_rep");
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//    public function booking() {
//        if (userLogedIn()) {
//            $this->load->view("admin/booking_page");
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function modelRep($fromDate, $toDate) {
//        if (userLogedIn()) {
//            $result['data'] = $this->Home_model->get_report($fromDate, $toDate);
//            $fromDate = date("Y-m-d", strtotime($fromDate));
//            $toDate = date("Y-m-d", strtotime($toDate));
//
//
//
//            // $us_date = "01/01/2012";
//            $parts = explode("-", $fromDate, 3);
//            $uk_date = $parts[1] . "/" . $parts[2] . "/" . $parts[0];
//            $fromDate = $uk_date;
//            $parts = explode("-", $toDate, 3);
//            $uk_date = $parts[1] . "/" . $parts[2] . "/" . $parts[0];
//
//            $toDate = $uk_date;
//
//            $result['fromDate'] = $fromDate;
//            $result['toDate'] = $toDate;
//            return $result;
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function jsoniser() {
//        if (userLogedIn()) {
//            //  $data = $this->input->post('from');
//            $fromDate = $this->input->post('from');
//            $toDate = $this->input->post('to');
//            $model = $this->input->post('model');
//            $table = $this->input->post('table');
//
//
//
//            $data = $this->Home_model->jsoniser($fromDate, $toDate, $model, $table);
//
//            echo json_encode($data);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function modelRepView() {
//        if (userLogedIn()) {
//            $fromDate = date("Y-m-d", strtotime("yesterday"));
//            $toDate = date("Y-m-d");
//
//            if (isset($_POST['fromDate'])) {
//                $fromDate = $this->input->post('fromDate');
//                $toDate = $this->input->post('toDate');
//            }
//            $result['data'] = $this->modelRep($fromDate, $toDate);
//
//            $this->load->view("admin/model_report", $result);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function get_data() {
//        if (userLogedIn()) {
//            $result = $this->Home_model->get_data($this->input->post('value'));
//            echo json_encode($result);
//            //$this->load->view("admin/target", $result);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function get_models() {
//        if (userLogedIn()) {
//            $result = $this->Home_model->get_models();
//            echo json_encode($result);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function target() {
//        if (userLogedIn()) {
//            $fromDate = date("Y-m-d", strtotime("first day of this month"));
//            if (isset($_POST['fromDate'])) {
//                $date = explode('/', $this->input->post('repDate'));
//                $day = $date[1];
//                $month = $date[0];
//                $year = $date[2];
//                $fromDate = $year . '-' . $month . '-' . $day;
//            }
//            $data['get_target'] = $this->Home_model->get_target($fromDate);
//
//            $date = explode('-', $fromDate);
//            $day = $date[2];
//            $month = $date[1];
//            $year = $date[0];
//            $fromDate = $month . '/' . $day . '/' . $year;
//            $data['fromDate'] = $fromDate;
//            $this->load->view("admin/target", $data);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function setTarget() {
//        if (userLogedIn()) {
//            $resp['success'] = 'danger';
//            $resp['message'] = 'Error Occered';
//            $data = array(
//                'target_table_emp_id' => $this->input->post('name_val'),
//                'target_table_product' => $this->input->post('model'),
//                'target_table_product_qty' => $this->input->post('target'),
//                'target_table_target_level' => $this->input->post('level'),
//                'target_table_exp_date' => $this->input->post('exdate')
//            );
//            if (!empty($data)) {
//
//                $response = $this->Home_model->insert('target_table', $data);
//                if ($response === true) {
//                    $resp['success'] = 'success';
//                    $resp['message'] = 'Target Saved';
//                }
//            }
//
//            echo json_encode($resp);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function get_model_report() { //used when MORE btn is clicked in target pages JSON
//        if (userLogedIn()) {
//            $id = $this->input->post('id');
//            $fromDate = $this->input->post('SfromDate');
//            $field = $this->input->post('field');
//            $data = $this->Home_model->get_model_report($id, $field, $fromDate);
//            if (!empty($data)) {
//                //$bal[$i]= $value['target'] - $value['achieved'];
//                foreach ($data as $key => $value) {
//                    $result[] = array(
//                        'varient' => $key,
//                        'target' => $value['target'],
//                        'achived' => $value['achieved'],
//                        'differnce' => $value['target'] - $value['achieved'],
//                    );
//                }
//
//                echo json_encode($result);
//            } else {
//                echo json_encode('No Record Found');
//            }
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function genRep() {
//        if (userLogedIn()) {
//            $empList = $this->input->post('empID'); // static given for TL list THIS POST
//            $from = $this->input->post('data_report_from');
//            $to = $this->input->post('data_report_to');
//            $field = $this->input->post('emp_type');
//            $data['result'] = $this->Home_model->generate_rep($empList, $from, $to, $field);
//
//            foreach ($data['result'] as $key => $value) {
//                $arrKeys = array_keys($value);
//            }
//
//            $tot = array_pop($arrKeys);
//            array_unshift($arrKeys, $tot);
//            $data['header'] = $arrKeys;
////        echo "<pre>";
////        print_r($arrKeys);
////        echo "</pre>";
//            $this->load->view("admin/demo_view", $data);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function list_emp() {
//        if (userLogedIn()) {
//            $list_type = $this->input->post('emp_type');
//            $data = $this->Home_model->list_emp($list_type);
//            echo json_encode($data);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//    public function set_target() {
//        if (userLogedIn()) {
//            $response = array();
//            $result = $this->Home_model->insert_target();
//
//            if ($result) {
//                $response['response'] = true;
//                $response['class'] = 'success';
//                $response['message'] = 'Target Set Successfully';
//            } else {
//                $response['response'] = false;
//                $response['class'] = 'danger';
//                $response['message'] = 'Error Occered';
//            }
//            echo json_encode($response);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//
//        public function achievementsReport() { // Used to set date and everything for target.php
//        if (userLogedIn()) {
//            $fromDate = date("Y-m-d", strtotime("first day of this month"));
//            if (isset($_POST['fromDate'])) {
//                $date = explode('/', $this->input->post('repDate'));
//                $day = $date[1];
//                $month = $date[0];
//                $year = $date[2];
//                $fromDate = $year . '-' . $month . '-' . $day;
//            }
//            $data['get_target'] = $this->Home_model->get_target($fromDate);
//
//            $date = explode('-', $fromDate);
//            $day = $date[2];
//            $month = $date[1];
//            $year = $date[0];
//            $fromDate = $month . '/' . $day . '/' . $year;
//            $data['fromDate'] = $fromDate;
//
//            $this->load->view("admin/achievementsReport", $data);
//        } else {
//            $this->load->view('admin/login');
//        }
//    }
//    public function salesAchievementsView() {
//        
//        $user_data = $this->session->userdata();
//
//        $empId = $user_data['user_employee_id'];
//        $empName = $user_data['user_name'];
//        $l = $user_data['employee_access_level'];
//        if($l>0){
//            $this->achievementsReport();
//        }
//        $f = $user_data['employee_hierarchy']; 
//        
//         $fromDate = date("Y-m-d", strtotime("first day of this month"));
//        if (isset($_POST['fromDate'])) {
//            $date = explode('/', $this->input->post('repDate'));
//            $day = $date[1];
//            $month = $date[0];
//            $year = $date[2];
//            $fromDate = $year . '-' . $month . '-' . $day;
//        }
//        $toDate = date("Y-m-d", strtotime("last day of this month"));
//        $data['get_target'] = $this->Home_model->salesAchievementsView($f,$fromDate,$toDate);;
//
//        $date = explode('-', $fromDate);
//        $day = $date[2];
//        $month = $date[1];
//        $year = $date[0];
//        $fromDate = $month . '/' . $day . '/' . $year;
//        $data['fromDate'] = $fromDate;
//       
//          $this->load->view("admin/restrictedAchievement", $data);
//
//        
//    }
}
