<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Edp extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load your model here
        $helper = array('form', 'inflector', 'date');
        $this->load->model('admin/Edp_model', 'model');
        $this->load->library('form_validation');

        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        
    }
    
    public function changePasswd(){
        $this->load->view("edp/changePassword");
    }

    public function bookingConsolidatedRep() {
        if (userLogedIn()) {
            if (check_access('bookingConsolidatedRep')) {
                $fromDate = date("m/d/Y", strtotime("first day of this month"));
                $toDate = date("m/d/Y");
                if (isset($_POST['start'])) {
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
//        $fromDate = '2020-05-30';
//        $toDate = '2020-06-30';
                $result['data'] = $this->model->allDataFrom('booking_daily_rep', 'ORDER_DATE', $fromDate, $toDate);
                if (!empty($result['data'])) {

                    $result['headers'] = array_keys($result['data'][0]);
                }
                $this->load->view('edp/bookingConsolidatedRep', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function enquiryConsolidatedRep() {
        if (userLogedIn()) {
            if (check_access('enquiryConsolidatedRep')) {
                $fromDate = date("m/d/Y", strtotime("first day of this month"));
                $toDate = date("m/d/Y");
                if (isset($_POST['start'])) {
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
//        $fromDate = '2020-05-30';
//        $toDate = '2020-06-30';
                $result['data'] = $this->model->allDataFrom('enquiry_daily_rep', 'Enquiry_Date', $fromDate, $toDate);
                if (!empty($result['data'])) {

                    $result['headers'] = array_keys($result['data'][0]);
                }
                $this->load->view('edp/enquiryConsolidatedRep', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function cancelledConsolidatedRep() {
        if (userLogedIn()) {
            if (check_access('cancelledConsolidatedRep')) {
                $fromDate = date("m/d/Y", strtotime("first day of this month"));
                $toDate = date("m/d/Y");
                if (isset($_POST['start'])) {
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
//        $fromDate = '2020-05-30';
//        $toDate = '2020-06-30';
                $result['data'] = $this->model->allDataFrom('cancelled_daily_rep', 'CAN_DATE', $fromDate, $toDate);
                if (!empty($result['data'])) {

                    $result['headers'] = array_keys($result['data'][0]);
                }
                $this->load->view('edp/cancelledConsolidatedRep', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function deliveredConsolidatedRep() {
        if (userLogedIn()) {
            if (check_access('deliveredConsolidatedRep')) {
                $fromDate = date("m/d/Y", strtotime("first day of this month"));
                $toDate = date("m/d/Y");
                if (isset($_POST['start'])) {
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
//        $fromDate = '2020-05-30';
//        $toDate = '2020-06-30';
                $result['data'] = $this->model->allDataFrom('delivered_daily_rep', 'Del_Date', $fromDate, $toDate);
                if (!empty($result['data'])) {

                    $result['headers'] = array_keys($result['data'][0]);
                }
                $this->load->view('edp/deliveredConsolidatedRep', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function rtlConsolidatedRep() {
        if (userLogedIn()) {
            if (check_access('rtlConsolidatedRep')) {
                $fromDate = date("m/d/Y", strtotime("first day of this month"));
                $toDate = date("m/d/Y");
                if (isset($_POST['start'])) {
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
//        $fromDate = '2020-05-30';
//        $toDate = '2020-06-30';
                $result['data'] = $this->model->allDataFrom('rtl_daily_rep', 'Inv_Dt', $fromDate, $toDate);
                if (!empty($result['data'])) {

                    $result['headers'] = array_keys($result['data'][0]);
                }
                $this->load->view('edp/rtlConsolidatedRep', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function employees() {

        if (userLogedIn()) {
            if (check_access('employees')) {
                $result['data']['E'] = $this->model->allData('employe_table');
                if (!empty($result['data']['E'])) {

                    $result['headers']['E'] = array_keys($result['data']['E'][0]);
                }
                $result['data']['G'] = $this->model->allData('employe_group_table');
                if (!empty($result['data']['G'])) {

                    $result['headers']['G'] = array_keys($result['data']['G'][0]);
                }
                $this->load->view('edp/employee_hub', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function viewTarget() {
        if (userLogedIn()) {
            if (check_access('viewTarget')) {
                $fromDate = date("m/d/Y", strtotime("first day of this month"));
                $toDate = date("m/d/Y");
                if (isset($_POST['start'])) {
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
//        $fromDate = '2020-05-30';
//        $toDate = '2020-06-30';

                $result['data'] = $this->model->allDataFrom('target_table', 'target_table_create', $fromDate, $toDate);
                if (!empty($result['data'])) {

                    $result['headers'] = array_keys($result['data'][0]);
                }

                $this->load->view('edp/viewTargetRep', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function accessAndHierarchy() {
        if (userLogedIn()) {
            if (check_access('accessAndHierarchy')) {

                $result['data']['h'] = $this->model->allData('hierarchy');
                if (!empty($result['data']['h'])) {

                    $result['headers']['h'] = array_keys($result['data']['h'][0]);
                }
                $result['data']['A'] = $this->model->allData('access_control_list');
                if (!empty($result['data']['A'])) {

                    $result['headers']['A'] = array_keys($result['data']['A'][0]);
                }
                $result['data']['access_full_list'] = $this->model->allData('access_full_list');

                $this->load->view('edp/accessAndHierarchy', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function stockMiscInfo() {

        if (userLogedIn()) {
            if (check_access('stockMiscInfo')) {
                $result['data']['L'] = $this->model->allData('stock_location');
                $result['data']['S'] = $this->model->allData('status');

                if (!empty($result['data']['S'])) {

                    $result['headers']['S'] = array_keys($result['data']['S'][0]);
                }
                if (!empty($result['data']['L'])) {

                    $result['headers']['L'] = array_keys($result['data']['L'][0]);
                }

                $this->load->view('edp/stockMiscInfo', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function inventoryInfo() {

        if (userLogedIn()) {
            if (check_access('inventoryInfo')) {
                $result['data']['I'] = $this->model->allData('inventory_table');
                $result['data']['C'] = $this->model->allData('model_color_matrix');

                if (!empty($result['data']['I'])) {

                    $result['headers']['I'] = array_keys($result['data']['I'][0]);
                }
                if (!empty($result['data']['C'])) {

                    $result['headers']['C'] = array_keys($result['data']['C'][0]);
                }

                $this->load->view('edp/inventoryInfo', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function reportJsoniser() {
        $fromDate = $this->input->post('from');
        $toDate = $this->input->post('to');
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $idParam = $this->input->post('idParam');
        $dateParam = $this->input->post('dateParam');
        $fromDate = date("Y/m/d", strtotime($fromDate));
        $toDate = date("Y/m/d", strtotime($toDate));
        // $us_date = "01/01/2012";
        $parts = explode("/", $fromDate, 3);
        $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
        $fromDate = $uk_date;
        $parts = explode("/", $toDate, 3);
        $uk_date = $parts[0] . "-" . $parts[1] . "-" . $parts[2];
        $toDate = $uk_date;

        $data = $this->model->allDataParamFrom($table, $dateParam, $fromDate, $toDate, $idParam, $id);
        echo json_encode($data);
    }

    public function addRep() {
        $model = $this->model->get_details('inventory_table', 'product_code');
        foreach ($model as $key => $var) {
            $models[] = $var['product_code'];
        }

        $table = $this->input->post('table');
        $addArr = array();
        switch ($table):
            case 'model_color_matrix':
                $config = array(
                    array(
                        'field' => 'clourProdCodeEnter',
                        'label' => 'Color Code',
                        'rules' => array(
                            'trim',
                            'required',
                            'in_list[' . implode(",", $models) . ']|callback_validateRegex'
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'in_list' => '%s Not Found',
                            'validateRegex'=> '%s invalid char found',
                        ),
                    ),
                );
                break;
            case 'inventory_table':
                $config = array(
                    array(
                        'field' => 'prodCodeEnter',
                        'label' => 'Product code',
                        'rules' => 'trim|required|is_unique[inventory_table.product_code]|callback_validateRegex',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist',
                            'validateRegex'=> '%s invalid char found',
                        ),
                    ),
                    array(
                        'field' => 'modelNameEnter',
                        'label' => 'Product name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                );
                break;
            case 'stock_location':
                $config = array(
                    array(
                        'field' => 'newLoc',
                        'label' => 'Location Name',
                        'rules' => 'trim|required|is_unique[stock_location.Status]',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                );
                break;
            case 'status':
                $config = array(
                    array(
                        'field' => 'newStatus',
                        'label' => 'Status Name',
                        'rules' => 'trim|required|is_unique[stock_location.Status]',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                );
                $addArr = ['status' => (string) $this->input->post('newStatus')];
                break;
            case 'hierarchy':

                $config = array(
                    array(
                        'field' => 'H',
                        'label' => 'Hierarchy Name',
                        'rules' => 'trim|required|is_unique[hierarchy.h_name]',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                );
                break;
            case 'employe_table':

                $config = array(
                    array(
                        'field' => 'empId',
                        'label' => 'Employee ID',
                        'rules' => 'trim|required|is_unique[employe_table.employe_table_employe_id]',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                    array(
                        'field' => 'empMob',
                        'label' => 'Employee Mobile Number',
                        'rules' => 'trim|required|numeric|min_length[9]|max_length[13]',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    )
                );


                break;
            case 'employe_group_table':
                $config = array(
                    array(
                        'field' => 'grpName',
                        'label' => 'Group Name',
                        'rules' => 'trim|required|is_unique[employe_group_table.employe_group_table_name]',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                );
                break;

        endswitch;
        // echo json_encode($addArr);
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            $this->load->view('admin/uploadErrorPage', $data);
        } else {
            $this->load->helper('inflector');
            switch ($table):
                case 'model_color_matrix':
                    $addArr = [
                        'prod_code' => (string) $this->input->post('clourProdCodeEnter'),
                        'color_code' => (string) $this->input->post('colourCodeEnter'),
                        'color' => (string) $this->input->post('colorEnter'),
                        'model_img_url' => (string) $this->input->post('image'),
                    ];
                    break;
                case 'inventory_table':
                    $addArr = [
                        'product_code' => (string) $this->input->post('prodCodeEnter'),
                        'model_name' => strtoupper(underscore($this->input->post('modelNameEnter'))),
                        'variant' => (string) $this->input->post('variantEnter'),
                    ];
                    break;
                case 'stock_location':
                    $addArr = ['status' => (string) $this->input->post('newLoc')];
                    break;
                case 'status':
                    $addArr = ['status' => (string) $this->input->post('newStatus')];
                    break;
                case 'hierarchy':
                    $addArr = ['h_name' => (string) $this->input->post('H')];
                    break;
                case 'employe_table':

                    $addArr = [
                        'employe_table_employe_id' => $this->input->post('empId'),
                        'employe_table_employe_name' => $this->input->post('empName'),
                        'employe_table_employe_pass' => sha1($this->input->post('empConf')),
                        'employe_table_employe_mobile' => $this->input->post('empMob'),
                        'employe_table_employe_SIM_given' => $this->input->post('empSim'),
                        'employe_table_employe_email' => $this->input->post('empEmail'),
                        'employe_table_employe_hierarchy' => $this->input->post('hierarchy'),
                        'employe_table_employe_service_id' => $this->input->post('service'),
                        'employe_table_employe_address' => $this->input->post('fullAddr'),
                        'employe_table_employe_group_id' => $this->input->post('grp'),
                        'under_TL_EmpId' => $this->input->post('underTL'),
                        'under_ASM_EmpId' => $this->input->post('underASM'),
                        'under_SM_EmpId' => $this->input->post('underSM'),
                        'under_RM_EmpId' => $this->input->post('underRM'),
                        'employe_table_access_level' => $this->input->post('access')
                    ];
                    break;
                case 'employe_group_table':

                    $addArr = [
                        'employe_group_table_name' => $this->input->post('grpName'),
                        'employe_group_table_leader_employee_id' => $this->input->post('grpLeader'),
                        'parent' => $this->input->post('parentGrpAdd')
                    ];
                    break;

            endswitch;
            // echo json_encode($addArr);
            $data = $this->model->addTable($table, $addArr);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function validateRegex($input) {
        $patt = '/^([a-z0-9\s\-?\_?)]+)+$/i';
        //echo preg_match($patt, $input);
        if (preg_match($patt, $input) == 1) {
            return true; // it matched, return true or false if you want opposite
        } else {
            return false;
        }
    }

    public function editRep() {
        $model = $this->model->get_details('inventory_table', 'product_code');
        foreach ($model as $key => $var) {
            $models[] = $var['product_code'];
        }
        $id = $this->input->post('ID');
        $table = $this->input->post('table');
        $updateArr = array();
        switch ($table) {
            case 'model_color_matrix':
                $config = array(
                    array(
                        'field' => 'prodCodeColour',
                        'label' => 'Prod Code',
                        'rules' => array(
                            'trim',
                            'required',
                            'in_list[' . implode(",", $models) . ']'
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'in_list' => '%s Not Found'
                        ),
                    ),
                );
                break;
            case 'inventory_table':
                $config = array(
                    array(
                        'field' => 'prodCOde',
                        'label' => 'Prod Code',
                        'rules' => array(
                            'trim',
                            'required'
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                    array(
                        'field' => 'modelName',
                        'label' => 'Model name',
                        'rules' => array(
                            'trim',
                            'required'
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                );
                break;
            case 'employe_group_table':
                $teamLeader = $this->model->get_details_validation('employe_table', 'employe_table_employe_id');

                foreach ($teamLeader as $key => $emp) {
                    $teamlead[] = $emp['employe_table_employe_id'];
                }
                $config = array(
                    array(
                        'field' => 'grpLeaderEdit',
                        'label' => 'Group Leader',
                        'rules' => array(
                            'trim',
                            'required',
                            'in_list[' . implode(",", $teamlead) . ']'
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                );

                break;
            case 'employe_table':
                $config = array(
                    array(
                        'field' => 'empIdEdit',
                        'label' => 'ID',
                        'rules' => array(
                            'trim',
                            'required',
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                );

                $updateArr = array(
                    'employe_table_employe_id' => $this->input->post('empIdEdit'),
                    'employe_table_employe_name' => $this->input->post('empNameEdit'),
                    'employe_table_employe_mobile' => $this->input->post('empMobEdit'),
                    'employe_table_employe_SIM_given' => $this->input->post('empSimEdit'),
                    'employe_table_employe_email' => $this->input->post('empEmailEdit'),
                    'employe_table_employe_address' => $this->input->post('fullAddrEdit'),
                    'employe_table_access_level' => $this->input->post('accessEdit'),
                    'under_SM_EmpId' => $this->input->post('underSMEdit'),
                    'under_ASM_EmpId' => $this->input->post('underASMEdit'),
                    'under_TL_EmpId' => $this->input->post('underTLEdit'),
                    'under_RM_EmpId' => $this->input->post('underRMEdit'),
                    'employe_table_employe_group_id' => $this->input->post('grpEdit'),
                    'employe_table_employe_service_id' => $this->input->post('serviceEdit'),
                    'employe_table_employe_hierarchy' => $this->input->post('hierarchyEdit'),
                );
                $id = $this->input->post('empIdEdit');
                $param = 'employe_table_employe_id';
                break;
            case 'status':
                $config = array(
                    array(
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => array(
                            'trim',
                            'required',
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                );
                $updateArr = array('status' => $this->input->post('status'));
                $param = 'status_id';
                break;
            case 'stock_location':
                $config = array(
                    array(
                        'field' => 'location',
                        'label' => 'location',
                        'rules' => array(
                            'trim',
                            'required',
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                );
                $updateArr = array('Status' => $this->input->post('location'));
                $param = 'Status_ID';
                break;
            case 'target_table':
                $config = array(
                    array(
                        'field' => 'empID',
                        'label' => 'ID',
                        'rules' => array(
                            'trim',
                            'required',
                        ),
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                );
                $updateArr = array(
                    'target_table_emp_id' => $this->input->post('empID'),
                    'target_table_exp_date' => $this->input->post('expDate'),
                    'target_table_product_qty' => $this->input->post('qty'),
                    'target_table_product' => $this->input->post('selectProd'),
                );
                $param = 'target_table_id';
                break;
            case 'rtl_daily_rep':
                $config = array(
                    array(
                        'field' => 'invDate',
                        'label' => 'Invoice Date',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'MUL_INV_date',
                        'label' => 'MUL Invoice Date',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'orderDate',
                        'label' => 'Order Invoice Date',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'chasisNum',
                        'label' => 'Chassis Num',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'custName',
                        'label' => 'Customer Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                    array(
                        'field' => 'selectModel',
                        'label' => 'Model Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    )
                );


                $param = 'rtl_rep_id';
                break;
            case 'enquiry_daily_rep':
                $config = array(
                    array(
                        'field' => 'enqDate',
                        'label' => 'Enquiry Date',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'custName',
                        'label' => 'Customer Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'selectModel',
                        'label' => 'Model Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    )
                );

                $param = 'enquiry_report_id';
                break;
            case 'booking_daily_rep':
                $config = array(
                    array(
                        'field' => 'orderDate',
                        'label' => 'Order Date',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'custName',
                        'label' => 'Customer Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    ),
                    array(
                        'field' => 'selectModel',
                        'label' => 'Model Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                        ),
                    )
                );
                $updateArr = array(
                    'ORDER_NUM' => $this->input->post('orderNum'),
                    'ORDER_DATE' => $this->input->post('orderDate'),
                    'CUST_CD' => $this->input->post('custCD'),
                    'CUSTOMER_NAME' => $this->input->post('custName'),
                    'PHONE1' => $this->input->post('custPh'),
                    'FUEL_DESC' => $this->input->post('fuelDesc'),
                    'VARIANT_DESC' => $this->input->post('variantDesc'),
                    'COLOR_DESC' => $this->input->post('colourDesc'),
                    'TEAM_LEAD_NAME' => $this->input->post('TL'),
                    'EMP_NAME' => $this->input->post('DSE'),
                    'BUYER_TYPE' => $this->input->post('buyer'),
                    'RECEIVED_AMOUNT' => $this->input->post('amt'),
                    'ENQUIRY_NO' => $this->input->post('enqNo'),
                    'ENQUIRY_SOURCE' => $this->input->post('enqSrc'),
                    'ASM_SM' => $this->input->post('ASM'),
                    'SM_ASM' => $this->input->post('SM'),
                    'OBF_NO' => $this->input->post('obf'),
                    'MODEL_DESC' => $this->input->post('selectModel')
                );
                $param = 'booking_rep_id';
                break;
            case 'delivered_daily_rep':
                $config = array(
                    array(
                        'field' => 'invDate',
                        'label' => 'Invoice Date',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                    array(
                        'field' => 'custName',
                        'label' => 'Customer Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                    array(
                        'field' => 'selectModel',
                        'label' => 'Model Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    )
                );
                $updateArr = array(
                    'Inv_No' => $this->input->post('invNum'),
                    'Inv_Dt' => $this->input->post('invDate'),
                    'Fuel_Type' => $this->input->post('fuelDesc'),
                    'Variant_DESC' => $this->input->post('variantDesc'),
                    'Clr_DESC' => $this->input->post('colourDesc'),
                    'Team_Lead' => $this->input->post('TL'),
                    'DSE' => $this->input->post('DSE'),
                    'Chassis' => $this->input->post('chasisNum'),
                    'Engine' => $this->input->post('engineNum'),
                    'Del_Date' => $this->input->post('delDate'),
                    'ASM' => $this->input->post('ASM'),
                    'SM' => $this->input->post('SM'),
                    'Customer_Name' => $this->input->post('custName'),
                    'Mobile_NO' => $this->input->post('custPh'),
                    'Finance' => $this->input->post('finance'),
                    'INSU' => $this->input->post('insu'),
                    'EW' => $this->input->post('ew'),
                    'TV' => $this->input->post('tv'),
                    'FAS_TAG' => $this->input->post('fastTag'),
                    'Model_Name' => $this->input->post('selectModel')
                );
                $param = 'delivered_rep_id';
                break;
            case 'cancelled_daily_rep':
                $config = array(
                    array(
                        'field' => 'canDate',
                        'label' => 'Cancel Date',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                    array(
                        'field' => 'custName',
                        'label' => 'Customer Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    ),
                    array(
                        'field' => 'selectModel',
                        'label' => 'Model Name',
                        'rules' => 'trim|required',
                        'errors' => array(
                            'required' => 'You must provide a %s.',
                            'is_unique' => '%s already exist'
                        ),
                    )
                );
                $updateArr = array(
                    'CAN_DATE' => $this->input->post('canDate'),
                    'INV_NUM_' => $this->input->post('invNum'),
                    '_INV_DATE_' => $this->input->post('invDate'),
                    '_CUST_NAME_' => $this->input->post('custName'),
                    'CONTACT_NO' => $this->input->post('custPh'),
                    'CHASIS_NO' => $this->input->post('chassisNum'),
                    'REMARKS' => $this->input->post('remarks'),
                    '_VARIANT_DESC' => $this->input->post('variantDesc'),
                    'COLOR_DESC' => $this->input->post('colourDesc'),
                    'TL' => $this->input->post('TL'),
                    'MODEL_DESC' => $this->input->post('selectModel')
                );
                $param = 'cancelled_rep_id';
                break;
        }
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            $this->load->view('admin/uploadErrorPage', $data);
        } else {
            switch ($table) {
                case 'model_color_matrix':
                    $updateArr = array(
                        'prod_code' => $this->input->post('prodCodeColour'),
                        'color_code' => $this->input->post('colourName'),
                        'color' => $this->input->post('colourCode')
                    );
                    $param = 'model_color_id';
                    break;
                case 'inventory_table':
                    $this->load->helper('inflector');
                    $updateArr = array(
                        'product_code' => $this->input->post('prodCOde'),
                        'model_name' => strtoupper(underscore($this->input->post('modelName'))),
                        'variant' => $this->input->post('variantName')
                    );
                    $param = 'inventory_id';
                    break;
                case 'employe_group_table':
                    $id = $this->input->post('grpEditHiddenID');
                    $grpLeaderEmpID = $this->input->post('grpLeaderEdit');
                    $info = $this->model->allDataParamWhere('employe_table', 'employe_table_employe_id', $grpLeaderEmpID);
                    $empLeaderIncrID = $info[0]['employe_table_id'];
                    $updateArr = array(
                        'employe_group_table_name' => $this->input->post('grpNameEdit'),
                        'employe_group_table_leader_employee_id' => $empLeaderIncrID,
                        'parent' => $this->input->post('parentGrp')
                    );
                    $param = 'employe_group_table_id';
                    break;
                case 'employe_table':
                    $updateArr = array(
                        'employe_table_employe_id' => $this->input->post('empIdEdit'),
                        'employe_table_employe_name' => $this->input->post('empNameEdit'),
                        'employe_table_employe_mobile' => $this->input->post('empMobEdit'),
                        'employe_table_employe_SIM_given' => $this->input->post('empSimEdit'),
                        'employe_table_employe_email' => $this->input->post('empEmailEdit'),
                        'employe_table_employe_address' => $this->input->post('fullAddrEdit'),
                        'employe_table_access_level' => $this->input->post('accessEdit'),
                        'under_SM_EmpId' => $this->input->post('underSMEdit'),
                        'under_ASM_EmpId' => $this->input->post('underASMEdit'),
                        'under_TL_EmpId' => $this->input->post('underTLEdit'),
                        'under_RM_EmpId' => $this->input->post('underRMEdit'),
                        'employe_table_employe_group_id' => $this->input->post('grpEdit'),
                        'employe_table_employe_service_id' => $this->input->post('serviceEdit'),
                        'employe_table_employe_hierarchy' => $this->input->post('hierarchyEdit'),
                    );
                    $id = $this->input->post('empIdEdit');
                    $param = 'employe_table_employe_id';
                    break;
                case 'status':
                    $updateArr = array('status' => $this->input->post('status'));
                    $param = 'status_id';
                    break;
                case 'stock_location':
                    $updateArr = array('Status' => $this->input->post('location'));
                    $param = 'Status_ID';
                    break;
                case 'target_table':
                    $updateArr = array(
                        'target_table_emp_id' => $this->input->post('empID'),
                        'target_table_exp_date' => $this->input->post('expDate'),
                        'target_table_product_qty' => $this->input->post('qty'),
                        'target_table_product' => $this->input->post('selectProd'),
                    );
                    $param = 'target_table_id';
                    break;
                case 'rtl_daily_rep':
                    $updateArr = array(
                        'Enquiry_No' => $this->input->post('enqNo'),
                        'Enquiry_source' => $this->input->post('enqSrc'),
                        'Inv_No' => $this->input->post('invNum'),
                        'Inv_Dt' => $this->input->post('invDate'),
                        'Fuel_Type' => $this->input->post('fuelDesc'),
                        'Variant_DESC' => $this->input->post('variantDesc'),
                        'Clr_DESC' => $this->input->post('colourDesc'),
                        'Team_Lead' => $this->input->post('TL'),
                        'DSE' => $this->input->post('DSE'),
                        'Buyer_Type' => $this->input->post('buyer'),
                        'Chassis' => $this->input->post('chasisNum'),
                        'Engine' => $this->input->post('engineNum'),
                        'Mul_inv_dt' => $this->input->post('MUL_INV_date'),
                        'ASM_SM' => $this->input->post('ASM'),
                        'SM_ASM' => $this->input->post('SM'),
                        'Customer_Name' => $this->input->post('custName'),
                        'Mobile_NO' => $this->input->post('custPh'),
                        'order_date' => $this->input->post('orderDate'),
                        'order_number' => $this->input->post('orderNum'),
                        'Model' => $this->input->post('selectModel')
                    );
                    $param = 'rtl_rep_id';
                    break;
                case 'enquiry_daily_rep':
                    $updateArr = array(
                        'Enquiry_No' => $this->input->post('enqNo'),
                        'Enquiry_Date' => $this->input->post('enqDate'),
                        'Prospect_Name' => $this->input->post('custName'),
                        'Mobile_Number' => $this->input->post('custPh'),
                        'Fuel_Type' => $this->input->post('fuelDesc'),
                        'Variant_Name' => $this->input->post('variantDesc'),
                        'Buyer_Type' => $this->input->post('buyer'),
                        'Team_Lead_Name' => $this->input->post('TL'),
                        'DSE_Name' => $this->input->post('DSE'),
                        'Enquiry_Status' => $this->input->post('enqStat'),
                        'Source' => $this->input->post('enqSrc'),
                        'ASM' => $this->input->post('ASM'),
                        'SM' => $this->input->post('SM'),
                        'Model_Name' => $this->input->post('selectModel')
                    );
                    $param = 'enquiry_report_id';
                    break;
                case 'booking_daily_rep':
                    $updateArr = array(
                        'ORDER_NUM' => $this->input->post('orderNum'),
                        'ORDER_DATE' => $this->input->post('orderDate'),
                        'CUST_CD' => $this->input->post('custCD'),
                        'CUSTOMER_NAME' => $this->input->post('custName'),
                        'PHONE1' => $this->input->post('custPh'),
                        'FUEL_DESC' => $this->input->post('fuelDesc'),
                        'VARIANT_DESC' => $this->input->post('variantDesc'),
                        'COLOR_DESC' => $this->input->post('colourDesc'),
                        'TEAM_LEAD_NAME' => $this->input->post('TL'),
                        'EMP_NAME' => $this->input->post('DSE'),
                        'BUYER_TYPE' => $this->input->post('buyer'),
                        'RECEIVED_AMOUNT' => $this->input->post('amt'),
                        'ENQUIRY_NO' => $this->input->post('enqNo'),
                        'ENQUIRY_SOURCE' => $this->input->post('enqSrc'),
                        'ASM_SM' => $this->input->post('ASM'),
                        'SM_ASM' => $this->input->post('SM'),
                        'OBF_NO' => $this->input->post('obf'),
                        'MODEL_DESC' => $this->input->post('selectModel')
                    );
                    $param = 'booking_rep_id';
                    break;
                case 'delivered_daily_rep':
                    $updateArr = array(
                        'Inv_No' => $this->input->post('invNum'),
                        'Inv_Dt' => $this->input->post('invDate'),
                        'Fuel_Type' => $this->input->post('fuelDesc'),
                        'Variant_DESC' => $this->input->post('variantDesc'),
                        'Clr_DESC' => $this->input->post('colourDesc'),
                        'Team_Lead' => $this->input->post('TL'),
                        'DSE' => $this->input->post('DSE'),
                        'Chassis' => $this->input->post('chasisNum'),
                        'Engine' => $this->input->post('engineNum'),
                        'Del_Date' => $this->input->post('delDate'),
                        'ASM' => $this->input->post('ASM'),
                        'SM' => $this->input->post('SM'),
                        'Customer_Name' => $this->input->post('custName'),
                        'Mobile_NO' => $this->input->post('custPh'),
                        'Finance' => $this->input->post('finance'),
                        'INSU' => $this->input->post('insu'),
                        'EW' => $this->input->post('ew'),
                        'TV' => $this->input->post('tv'),
                        'FAS_TAG' => $this->input->post('fastTag'),
                        'Model_Name' => $this->input->post('selectModel')
                    );
                    $param = 'delivered_rep_id';
                    break;
                case 'cancelled_daily_rep':
                    $updateArr = array(
                        'CAN_DATE' => $this->input->post('canDate'),
                        'INV_NUM_' => $this->input->post('invNum'),
                        '_INV_DATE_' => $this->input->post('invDate'),
                        '_CUST_NAME_' => $this->input->post('custName'),
                        'CONTACT_NO' => $this->input->post('custPh'),
                        'CHASIS_NO' => $this->input->post('chassisNum'),
                        'REMARKS' => $this->input->post('remarks'),
                        '_VARIANT_DESC' => $this->input->post('variantDesc'),
                        'COLOR_DESC' => $this->input->post('colourDesc'),
                        'TL' => $this->input->post('TL'),
                        'MODEL_DESC' => $this->input->post('selectModel')
                    );
                    $param = 'cancelled_rep_id';
                    break;
            }
            $data = $this->model->updateTable($updateArr, $table, $id, $param);
            redirect($_SERVER['HTTP_REFERER']);
//            echo json_encode($updateArr);
//            echo json_encode($table);
//            echo json_encode($id);
//            echo json_encode('asdfdsf');
//            echo json_encode($param);
            //  echo json_encode($data);
        }
        // echo json_encode($table);
    }

    public function selectAppenderAll() {
        $col = $this->input->post('distinctCol');
        $table = $this->input->post('table');
        $data = $this->model->selectAppenderAll($col, $table);
        echo json_encode($data);
    }

    public function selectAppenderWithID() {
        $col = $this->input->post('col');
        $idCol = $this->input->post('idCol');
        $table = $this->input->post('table');
        $data = $this->model->selectAppenderWithID($col, $table, $idCol);
        echo json_encode($data);
    }

    public function selectAppenderWithIDWhere() {
        $col = $this->input->post('col');
        $idCol = $this->input->post('idCol');
        $table = $this->input->post('table');
        $whParam = $this->input->post('whereParam');
        $wh = $this->input->post('where');
        $data = $this->model->selectAppenderWithIDWhere($col, $table, $idCol, $whParam, $wh);
        echo json_encode($data);
    }

    public function tableValueDeleter() {
        //$id =  1019;// $this->input->post('toDelID');
//        $table ='employe_table';//  $this->input->post('table');
//        $param =  'employe_table_employe_id';//$this->input->post('param');
        $id = $this->input->post('toDelID');
        $table = $this->input->post('table');
        $param = $this->input->post('param');
        $data = $this->model->deleter($id, $table, $param);

        echo json_encode($data);
    }

    public function tableValueReEnabler() {
        //$id =  1019;// $this->input->post('toDelID');
//        $table ='employe_table';//  $this->input->post('table');
//        $param =  'employe_table_employe_id';//$this->input->post('param');
        $id = $this->input->post('toDelID');
        $table = $this->input->post('table');
        $param = $this->input->post('param');
        switch ($table) {
            case 'employe_table':
                $updateArr = array(
                    'employe_table_employe_status' => 1
                );
                break;
            case 'employe_group_table':
                $updateArr = array(
                    'employe_group_status' => 1
                );
        }
        $data = $this->model->updateTable($updateArr, $table, $id, $param);

        echo json_encode($data);
    }

    public function whereJsoniser() {
//        $id = 1000;//$this->input->post('id');
//        $table = 'employe_table';//$this->input->post('table');
//        $param = 'employe_table_employe_id';//$this->input->post('idParam');

        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $param = $this->input->post('idParam');
        $data = $this->model->whereJsoniser($id, $table, $param);
        echo json_encode($data);
    }

    public function whereGrpJsoniser() {
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $param = $this->input->post('idParam');
        $data = $this->model->whereGrpJsoniser($id, $table, $param);
        echo json_encode($data);
    }

    public function help() {

        if (userLogedIn()) {
            if (check_access('help')) {
                $result['data'] = $this->model->allData('help');

                if (!empty($result['data'])) {

                    $result['headers'] = array_keys($result['data'][0]);
                }

                $this->load->view('edp/help', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function simpleWhereJsoniser() {
//        $id = 1;//$this->input->post('id');
//        $table = 'how_to';//$this->input->post('table');
//        $param = 'help_linked_ID';//$this->input->post('idParam');

        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $param = $this->input->post('param');

        $data = $this->model->simpleWhereJsoniser($id, $table, $param);

        echo json_encode($data);
    }

    public function accessJsoniser() {
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $param = $this->input->post('param');

        $data = $this->model->accessJsoniser($id, $table, $param);

        echo json_encode($data);
    }

    public function insertAccess() {
        $arr = $this->input->post('arr');
        $accName = $this->input->post('accName');
        $resp = $this->model->insertAccess($arr, $accName);
        echo json_encode($resp);
    }

    public function changePassword() {
        $message = array();
        $emp_id = $this->input->post('emp_id');
        $pass = $this->input->post('pass');
//        $emp_id = 20;
//        $pass = 'gmHarCar';

        $data = $this->model->changePassword($emp_id, $pass);
        if ($data) {
            $message['success'] = true;
            $message['message'] = 'Password changed successfully!!';
        } else {
            $message['success'] = false;
            $message['message'] = 'Error occered!!';
        }
        echo json_encode($message);
    }

    public function inventoryJsoniser() {
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $param = $this->input->post('param');
        $data = $this->model->inventoryJsoniser($id, $table, $param);
        echo json_encode($data);
    }

}
