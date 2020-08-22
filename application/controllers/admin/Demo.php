<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Demo_model', 'model');
        $this->load->library('pagination');
    }

    public function index() {
        $emp_list['list'] = $this->model->list_team();
        $this->load->view('admin/demo_view',$emp_list);
        
    }
    
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
            $result['data'] = $this->model->get_reportDate($filter, $fromDate, $toDate);

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

}
