<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminArea extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_area_model', 'admin_model');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        redirect(ADMINURL . "adminArea/DailyRep");
    }
    
    public function myGrp(){
         if (userLogedIn()) {
            if(check_access('myGrp')){
        $emp_list['list'] = $this->admin_model->list_team();
        $this->load->view('admin/myGrp',$emp_list);
         }
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'AdminArea/forbidden');
        }
        }else {
            $this->load->view('admin/login');
        }
    }

    //Hoslistic Report Function
    public function dailyRep() { //fn for daily holistic report to take from 5 sheets from MSI
        if (userLogedIn()) {
            if(check_access('dailyRep')){
                {
            $filter = 6;
            $fromDate = date("m/d/Y", strtotime("yesterday"));
            $toDate = date("m/d/Y");
            if (isset($_POST['filter'])) {
                $filter = $this->input->post('filter');
                $fromDate = $this->input->post('start');
                $toDate = $this->input->post('end');
            }
            $result['fromDate'] = $fromDate;
            $result['toDate'] = $toDate;
            $fromDate = date("Y/m/d", strtotime($fromDate));
            $toDate = date("Y/m/d", strtotime($toDate));
            // $us_date = "01/01/2012";
            $parts = explode("/", $fromDate, 3);
            $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
            $fromDate = $uk_date;
            $parts = explode("/", $toDate, 3);
            $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
            $toDate = $uk_date;
            $result['data'] = $this->admin_model->get_reportDate($filter, $fromDate, $toDate);

            $this->load->view("admin/daily_report", $result);
        }
            }
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'AdminArea/forbidden');
        }
        }else {
            $this->load->view('admin/login');
        }
    }

    //modelwise report please comment in detail
    public function modelRep($fromDate, $toDate) { // Sub fn called from modelRepView() it generates modelwise reprt
        if (userLogedIn()) {
           if(check_access('')){
            $result['data'] = $this->admin_model->get_report($fromDate, $toDate);
            $fromDate = date("Y-m-d", strtotime($fromDate));
            $toDate = date("Y-m-d", strtotime($toDate));
// date conversion from Y-M-d to m/d/y for date
            // $us_date = "01/01/2012";
            $parts = explode("-", $fromDate, 3);
            $uk_date = $parts[1] . "/" . $parts[2] . "/" . $parts[0];
            $fromDate = $uk_date;
            $parts = explode("-", $toDate, 3);
            $uk_date = $parts[1] . "/" . $parts[2] . "/" . $parts[0];

            $toDate = $uk_date;

            $result['fromDate'] = $fromDate;
            $result['toDate'] = $toDate;
            return $result;
         }
   
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'home/login');
        }
    
        } else {
            $this->load->view('admin/login');
        }
    }
public function jsoniserFull() { // sub fn called when MORE btn clicked in the model_reprt.php
        if (userLogedIn()) {
                $fromDate = $this->input->post('from');
                $toDate = $this->input->post('to');
                $model = $this->input->post('model');
                $table = $this->input->post('table');

                 $user_data = $this->session->userdata();
                $acc = $user_data['employee_access_level'];
                // I NEED TO PERFORM CHK HERE... SINCE ONLY ONE VIEW.
                 $data = $this->admin_model->jsoniserFull($fromDate, $toDate, $model, $table);
               
                echo json_encode($data);
            }
         
   
       
    
         else {
            $this->load->view('admin/login');
        }
    }
    public function jsoniser() { // sub fn called when MORE btn clicked in the model_reprt.php
        if (userLogedIn()) {
                $fromDate = $this->input->post('from');
                $toDate = $this->input->post('to');
                $model = $this->input->post('model');
                $table = $this->input->post('table');

                 $user_data = $this->session->userdata();
                $acc = $user_data['employee_access_level'];
                // I NEED TO PERFORM CHK HERE... SINCE ONLY ONE VIEW.
              
                $data = $this->admin_model->jsoniser($fromDate, $toDate, $model, $table);
        
                echo json_encode($data);
            }
         
   
       
    
         else {
            $this->load->view('admin/login');
        }
    }

    public function modelRepView() { //fn to display modelwise reprt
        if (userLogedIn()) {
        if(check_access('modelRepView')){
                $fromDate = date("Y-m-d", strtotime("yesterday"));
                $toDate = date("Y-m-d");
    
                if (isset($_POST['fromDate'])) {
                    $fromDate = $this->input->post('fromDate');
                    $toDate = $this->input->post('toDate');
                }
                $result['data'] = $this->modelRep($fromDate, $toDate);
    
                $this->load->view("admin/model_report", $result);
            }
         
   
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'home/login');
        }
        } 
        else {
            $this->load->view('admin/login');
        }
    }

    public function get_data() { //Used to populate the target.php
        if (userLogedIn()) {
                $result = $this->admin_model->get_data($this->input->post('value'));
                echo json_encode($result);
                //$this->load->view("admin/target", $result);
        
        } else {
            $this->load->view('admin/login');
        }
    }

    public function get_models() { //Used to populate the target.php with models including TOtal Target
        if (userLogedIn()) {
                $result = $this->admin_model->get_models();
                echo json_encode($result);
         
        } else {
            $this->load->view('admin/login');
        }
    }

    public function target() { // Used to set date and everything for target.php
        if (userLogedIn()) {
                 if(check_access('target')){
                $fromDate = date("Y-m-d", strtotime("first day of this month"));
                if (isset($_POST['fromDate'])) {
                    $date = explode('/', $this->input->post('repDate'));
                    $day = $date[1];
                    $month = $date[0];
                    $year = $date[2];
                    $fromDate = $year . '-' . $month . '-' . $day;
                }
                $data['get_target'] = $this->admin_model->get_target($fromDate);
    
                $date = explode('-', $fromDate);
                $day = $date[2];
                $month = $date[1];
                $year = $date[0];
                $fromDate = $month . '/' . $day . '/' . $year;
                $data['fromDate'] = $fromDate;
                $this->load->view("admin/target", $data);
            }
         
   
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'home/login');
        }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function setTarget() { //setting target Maybe duplicate of set_target()
        if (userLogedIn()) {
            $resp['success'] = 'danger';
            $resp['message'] = 'Error Occered';
            $data = array(
                'target_table_emp_id' => $this->input->post('name_val'),
                'target_table_product' => $this->input->post('model'),
                'target_table_product_qty' => $this->input->post('target'),
                'target_table_target_level' => $this->input->post('level'),
                'target_table_exp_date' => $this->input->post('exdate')
            );
            if (!empty($data)) {

                $response = $this->admin_model->insert('target_table', $data);
                if ($response === true) {
                    $resp['success'] = 'success';
                    $resp['message'] = 'Target Saved';
                }
            }

            echo json_encode($resp);
        } else {
            $this->load->view('admin/login');
        }
    }

    public function get_model_report() { //used when MORE btn is clicked in target pages JSON
        if (userLogedIn()) {
            $id = $this->input->post('id');
            $fromDate = $this->input->post('SfromDate');
            $field = $this->input->post('field');
            $data = $this->admin_model->get_model_report($id, $field, $fromDate);
            if (!empty($data)) {
                //$bal[$i]= $value['target'] - $value['achieved'];
                foreach ($data as $key => $value) {
                    $result[] = array(
                        'varient' => $key,
                        'target' => $value['target'],
                        'achived' => $value['achieved'],
                        'differnce' => $value['target'] - $value['achieved'],
                    );
                }

                echo json_encode($result);
            } else {
                echo json_encode('No Record Found');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function genRep() { //Generate final report
if (userLogedIn()) {
      if(check_access('achievementsReport')){
                $empList = $this->input->post('empID'); // static given for TL list THIS POST
                $from = $this->input->post('data_report_from');
                $to = $this->input->post('data_report_to');
                $field = $this->input->post('emp_type');
                
                $data['result'] = $this->admin_model->generate_rep($empList, $from, $to, $field);
      
                foreach ($data['result'] as $key => $value) {
                    $arrKeys = array_keys($value);
                }
        
                $data['header'] = $arrKeys;
                $this->load->view("admin/genRep", $data);
           
            }
         
   
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'home/login');
        }
        } else {
            $this->load->view('admin/login');
        }
        
    }

    public function list_emp() { //used to list emp for target
        if (userLogedIn()) {
            $list_type = $this->input->post('emp_type');
            $data = $this->admin_model->list_emp($list_type);
            echo json_encode($data);
        } else {
            $this->load->view('admin/login');
        }
    }
       public function list_emp_filterHigherEmp() { //No idea
        if (userLogedIn()) {
            $list_type = $this->input->post('emp_type');
            $data = $this->admin_model->list_emp_filterHigherEmp($list_type);
            echo json_encode($data);
        } else {
            $this->load->view('admin/login');
        }
    }

    public function set_target() { //setting target Maybe duplicate of setTarget()
        if (userLogedIn()) {
            $response = array();
            $result = $this->admin_model->insert_target();

            if ($result) {
                $response['response'] = true;
                $response['class'] = 'success';
                $response['message'] = 'Target Set Successfully';
            } else {
                $response['response'] = false;
                $response['class'] = 'danger';
                $response['message'] = 'Error Occered';
            }
            echo json_encode($response);
        } else {
            $this->load->view('admin/login');
        }
    }

    public function achievementsReport() { //to view achivements unreastricted for RM and UPwards
        if (userLogedIn()) {
            if(check_access('achievementsReport')){
                $fromDate = date("Y-m-d", strtotime("first day of this month"));
                if (isset($_POST['fromDate'])) {
                    $date = explode('/', $this->input->post('repDate'));
                    $day = $date[1];
                    $month = $date[0];
                    $year = $date[2];
                    $fromDate = $year . '-' . $month . '-' . $day;
                }
                $data['get_target'] = $this->admin_model->get_target($fromDate);
    
                $date = explode('-', $fromDate);
                $day = $date[2];
                $month = $date[1];
                $year = $date[0];
                $fromDate = $month . '/' . $day . '/' . $year;
                $data['fromDate'] = $fromDate;
    
                $this->load->view("admin/achievementsReport", $data);
           
            }
         
   
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'home/login');
        }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function salesAchievementsView() { //restricted view of achievement for SM and below
        if (userLogedIn()) {
              if(check_access('salesAchievementsView')){
                $user_data = $this->session->userdata();

                $empId = $user_data['user_employee_id'];
                $empName = $user_data['user_name'];
                $l = $user_data['employee_access_level'];
             
                
                $f = $user_data['employee_hierarchy'];
    
                $fromDate = date("Y-m-d", strtotime("first day of this month"));
                if (isset($_POST['fromDate'])) {
                    $date = explode('/', $this->input->post('repDate'));
                    $day = $date[1];
                    $month = $date[0];
                    $year = $date[2];
                    $fromDate = $year . '-' . $month . '-' . $day;
                }
                $toDate = date("Y-m-d", strtotime("last day of this month"));
                $data['get_target'] = $this->admin_model->salesAchievementsView($f, $fromDate, $toDate);
                
    
                $date = explode('-', $fromDate);
                $day = $date[2];
                $month = $date[1];
                $year = $date[0];
                $fromDate = $month . '/' . $day . '/' . $year;
                $data['fromDate'] = $fromDate;
    
                $this->load->view("admin/restrictedAchievement", $data);
           
            }
         
   
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'home/login');
        }
        } else {
            $this->load->view('admin/login');
        }
    }
    public function restrictedDailyRep() { //fn for daily holistic report to take from 5 sheets from MSI
if (userLogedIn()) {
                if(check_access('restrictedDailyRep')){
                $user_data = $this->session->userdata();
                $empId = $user_data['user_employee_id'];
                $empName = $user_data['user_name'];
                $l = $user_data['employee_access_level'];
                $filter = 7;
                $fromDate = date("m/d/Y", strtotime("yesterday"));
                $toDate = date("m/d/Y");
                if (isset($_POST['filter'])) {
                    $filter = $this->input->post('filter');
                    $fromDate = $this->input->post('start');
                    $toDate = $this->input->post('end');
                }
        
                $result['fromDate'] = $fromDate;
                $result['toDate'] = $toDate;
                $fromDate = date("Y/m/d", strtotime($fromDate));
                $toDate = date("Y/m/d", strtotime($toDate));
        
                $parts = explode("/", $fromDate, 3);
                $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
                $fromDate = $uk_date;
                $parts = explode("/", $toDate, 3);
                $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
                $toDate = $uk_date;
                $result['data'] = $this->admin_model->get_restrictedDailyReport($filter, $fromDate, $toDate);
               
                $this->load->view('admin/restrictedDaily',$result);       
            }
         
   
        else{
            $url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
          //  echo $url;
            myLoader('No Access', 'home/login');
        }
         } else {
            $this->load->view('admin/login');
        }
    }

 public function restrictedModelRepView() { //fn to display modelwise reprt restricted
       if (userLogedIn()) {
    if(check_access('restrictedModelRepView')){
        $fromDate = date("Y-m-d", strtotime("yesterday"));
        $toDate = date("Y-m-d");
        if (isset($_POST['fromDate'])) {
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');
        }
        $result['data'] = $this->modelRep($fromDate, $toDate);
        $this->load->view("admin/model_report_restricted", $result);     
}


else{
$url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
//  echo $url;
myLoader('No Access', 'home/login');
}
} else {
$this->load->view('admin/login');
}
    }

    public function adminHome() {
if (userLogedIn()) {
    if(check_access('adminHome')){
        $fromDate = date("m/d/Y", strtotime("yesterday"));
        $toDate = date("m/d/Y");
        $top = 5;
        $varCount = 3;
        if (isset($_POST['start'])) {
            $top = $this->input->post('top');
            $fromDate = $this->input->post('start');
            $toDate = $this->input->post('end');
            $varCount = $this->input->post('varCount');
        }
        $result['fromDate'] = $fromDate;
        $result['toDate'] = $toDate;
        $result['top'] = $top;
        $result['varCount'] = $varCount;
        $fromDate = date("Y/m/d", strtotime($fromDate));
        $toDate = date("Y/m/d", strtotime($toDate));
        $parts = explode("/", $fromDate, 3);
        $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
        $fromDate = $uk_date;
        $parts = explode("/", $toDate, 3);
        $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
        $toDate = $uk_date;
        $result['data']['D'] = $this->admin_model->get_adminHome($top, $fromDate, $toDate);
        $result['data']['M'] = $this->admin_model->get_marked();
        $result['data']['A'] = $this->admin_model->get_alloted();
        $this->load->view('admin/adminHome', $result);
}


else{
$url=$this->router->fetch_class().'/'.$this->router->fetch_method(); 
//  echo $url;
myLoader('No Access', 'home/login');
}
} else {
$this->load->view('admin/login');
}
    }
    
    public function demandJsoniser(){
          $fromDate = $this->input->post('from');
        $toDate = $this->input->post('to');
        $model = $this->input->post('model');
        $top = (int)$this->input->post('varCount');
//        $fromDate = '2020-05-30';
//        $toDate = '2020-06-30';
        
        $fromDate = date("Y/m/d", strtotime($fromDate));
        $toDate = date("Y/m/d", strtotime($toDate));



        // $us_date = "01/01/2012";
        $parts = explode("/", $fromDate, 3);
        $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
        $fromDate = $uk_date;
        $parts = explode("/", $toDate, 3);
        $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
        $toDate = $uk_date;
        
//        $fromDate = '2020-05-30';
//   $toDate = '2020-06-30';
//   $model = 'ALTO 800';
//   $top=3;
        
        $data = $this->admin_model->demandJsoniser($fromDate, $toDate, $model, $top);
        echo json_encode($data);
    }
    
     public function forbidden(){
           if (userLogedIn()) {
            $this->load->view('admin/forbidden');
        } else {
            $this->load->view('admin/login');
        }
        
    }
    public function welcome_page(){
          if (userLogedIn()) {
            $this->load->view('admin/welcome_page');
        } else {
            $this->load->view('admin/login');
        }
       
    }
    public function uploadError(){
          if (userLogedIn()) {
             $this->load->view('admin/uploadErrorPage');
        } else {
            $this->load->view('admin/login');
        }
      
    }

}
