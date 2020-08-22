

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Sales_model', 'model');
        $this->load->model('admin/Sales_model', 'sales');
        $this->load->library('form_validation');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        
    }
    public function demandViewOnly(){
        $this->load->view("sales/demandViewOnly");
    }

    public function readAllMsgs() {
        $user_data = $this->session->userdata();
        $empId = $user_data['user_employee_id']; // if SM then only his children will be seen
        $field = $user_data['employee_hierarchy'];
        if (check_access('demandViewOnly')) {
            $this->demandViewOnly();
        } else if ($field == 7) {
            $this->myBookings();
        } else {
            myLoader('Niether DSE Nor Access Granted', 'home/login');
        }
    }

    public function addStock() {

        if (userLogedIn()) {
            if (check_access('addStock')) {
                $this->load->view('sales/addStock');
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function editStock() {

        if (userLogedIn()) {
            if (check_access('viewStock')) {
                $this->load->view('sales/editStock');
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    //to get details for add stock view on load
    public function onloadDetails() {
        $data = $this->details();
        echo json_encode($data);
    }

    protected function details() {
        $txnNo = $this->model->get_txn_no();
        $models = $this->model->get_details('inventory_table');
        $status = $this->model->get_status('stock_location');
        $stockStatus = $this->model->get_status('status');
        foreach ($status as $stat) {
            $allstatus[] = array(
                'id' => $stat['Status_ID'],
                'text' => $stat['Status']
            );
        }
        foreach ($models as $model) {
            $allModels[] = array(
                'id' => $model['model_name'],
                'text' => $model['model_name']
            );
        }
        foreach ($stockStatus as $stStaus) {
            $allStatusTable[] = array(
                'id' => $stStaus['status_id'],
                'text' => $stStaus['status']
            );
        }
        $data['txnNo'] = $txnNo;
        $data['statusTable'] = $allStatusTable;
        $data['status'] = $allstatus;
        $data['models'] = $allModels;

        return $data;
    }

    public function varient() {
        $model = $this->input->post('data');
        $varients = $this->model->get_selected_details($model, 'inventory_table');
        foreach ($varients as $varient) {
            $allModels[] = array(
                'id' => $varient['variant'],
                'text' => $varient['variant'],
                'code' => $varient['product_code']
            );
        }
        echo json_encode($allModels);
    }

    public function model() {
        if (isset($_POST['model']) && isset($_POST['varient'])) {
            $model = $this->input->post('model');
            $varient = $this->input->post('varient');
            $data = $this->model->getmodelcode($model, $varient);
            echo json_encode($data);
        }
    }

    public function colors() {
        if (isset($_POST['model'])) {
            $colors = $this->model->get_colors('model_color_matrix', $_POST['model']);
            foreach ($colors as $color) {
                $all_colors[] = array(
                    'id' => $color['color_code'],
                    'text' => $color['color'],
                );
            }
            echo json_encode($all_colors);
        }
    }

    public function insertStock() {
        $data = array();

        $config = array(
            array(
                'field' => 'chasisNo[]',
                'label' => 'Chassis Number',
                'rules' => 'trim|required|is_unique[stock.Chassis_No]|callback_chklist',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s already exist',
                    'chklist' => 'chassis duplicate in form'
                ),
            ),
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['insert'] = false;
            $data['message'] = validation_errors();
        } else {

            if (isset($_POST['selectVariant'])) {
                $response = $this->model->addStock();
                if ($response) {
                    $data['insert'] = true;
                    $data['message'] = 'success';
                } else {
                    $data['insert'] = false;
                    $data['message'] = 'ERROR IN INSERTION';
                }
            }
        }

        echo json_encode($data);
    }

    function chklist($str) {
        $string = explode(',', $str); //code to convert string to array
        $r = $this->input->post('chasisNo[]');
        if (count($r) === count(array_flip($r))) {
            return true;
        } else {
            return false;
        }
    }

    public function responce() {
        $responce['url'] = 'sales/addStock';
        $responce['message'] = 'Stock added Successfully!';
        $this->load->view('sales/loader.php', $responce);
    }

    public function freeStock() {

        if (userLogedIn()) {
            if (check_access('freeStock')) {
                $this->load->view('sales/freeStock');
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

//free stock status
    public function get_status() {
        $data['status'] = $this->model->get_status('status');
        echo json_encode($data);
    }

//free stock summary on page load
    public function get_stock_sum() {
        $filter = 1;

        if (isset($_POST['filter'])) {
            $filter = $this->input->post('filter');
        }
        $data = $this->model->get_stock_sum($filter);
        echo json_encode($data);
    }

    public function loadVarients() {
        $filter = 1;

        if (isset($_POST['id'])) {
            $model = $this->input->post('id');
        }
        if (isset($_POST['filter'])) {
            $filter = $this->input->post('filter');
            $model = $this->input->post('id');
        }
        $data = $this->model->stockVariantSplitUp($model, $filter);
        echo json_encode($data);
    }

    public function loadcolor() {
        $filter = 1;

        if (isset($_POST['id'])) {
            $model = $this->input->post('id');
        }
        if (isset($_POST['filter'])) {
            $filter = $this->input->post('filter');
            $model = $this->input->post('id');
        }
        $data = $this->model->stockColourSplitUp($model, $filter);
        echo json_encode($data);
    }

    public function loadlocation() {
        $filter = 1;

        if (isset($_POST['id'])) {
            $model = $this->input->post('id');
        }
        if (isset($_POST['filter'])) {
            $filter = $this->input->post('filter');
            $model = $this->input->post('id');
        }
        $data = $this->model->stockLocationSplitUp($model, $filter);
        echo json_encode($data);
    }

    public function viewstock() {
        if (userLogedIn()) {
            if (check_access('viewstock')) {
                $this->load->view('sales/viewAndEditStock');
                //$this->load->view('sales/demo1');
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function listStock() {

        if (userLogedIn()) {
            if (check_access('viewstock')) {
                $date = date("Y-m-d", strtotime("first day of this month"));

                if (isset($_POST['date'])) {
                    $date1 = explode('/', $this->input->post('date'));
                    $date = $date1[2] . '-' . $date1[0] . '-' . $date1[1];
                }
                $date = (string) $date;
                $result = $this->model->listStock($date);
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $stockId = $value['Stock_ID'];
                        $date = $value['Mul_inv_date'];
                        $model = $value['Model'];
                        $variend = $value['Variant'];
                        $modelCode = $value['Model_Code'];
                        $color = $value['Colour'];
                        $colorCode = $value['Colour_Code'];
                        $modelYear = $value['Model_Year'];
                        $chasisNo = $value['Chassis_No'];
                        $engineNo = $value['Engine_No'];
                        $chasisCode = $value['Chassis_Code'];
                        $ageing = $value['Ageing'];
                        $stockLocation = $value['Status'];
                        $status = $value['status'];
                        $txnNo = $value['txn_no'];
                        $invNo = $value['stock_invoice_num'];
                        $remarks = $value['remarks'];
                        $StockAddedTime = $value['stock_time'];
                        $stockupdatedTime = $value['stock_update_time'];
                        
                        //$button1 = '<button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal5" onclick="editstock(' . $value['Stock_ID'] . ')"><i class="fa fa-pencil"></i></i></button>';
                        $button = '<div class="btn-group">
                                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal5" onclick="editstock(' . $value['Stock_ID'] . ')">Edit</button>
                                <button class="btn btn-danger delete" data-id="'.$stockId.'" data-chaseisNo ="'.$chasisNo.'" type="button"  onclick="deleteStock()">Delete</button>    
                                </div>';
                        $output['data'][] = array($stockId, $date, $model, $variend, $modelCode, $color, $colorCode, $modelYear, $chasisNo, $engineNo, $chasisCode, $ageing, $stockLocation, $status, $txnNo, $invNo, $remarks, $StockAddedTime, $stockupdatedTime, $button);
                    }
                } else {
                    $output['data'][] = array('', '', '', '', '', 'N', 'O', '', 'D', 'A', 'T', 'A', 'F', 'O', 'U', 'N', 'D', '', '', '');
                }
                echo json_encode($output);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }
    //Delete Stock
    public function stockDelete() {
        $data = $this->model->stockDelete();
        echo json_encode($data);
    }
    public function getStockDetails() {

        if (isset($_POST['id'])) {
            $id = $this->input->post('id');
            $stock = $this->model->getStockDetails($id);
            $data['stock'] = $stock;
            echo json_encode($data);
        }
    }

    public function updateStock() {
        $stockId = $this->input->post('stockId');
        $data = $this->model->updateStock($stockId);
        echo json_encode($data);
    }

    public function booking() {

        if (userLogedIn()) {
            if (check_access('booking')) {
                $userData['userData'] = $this->session->userdata['user_employee_id'];
                $this->load->view('sales/createDemand', $userData);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function loadStock() {

        $data['models'] = $this->model->loadStock();
        echo json_encode($data);
    }

    public function loadVarient() {
        $data['varient'] = $this->model->loadVarient();
        echo json_encode($data);
    }

    public function loadChasisNo() {
        $data['chassisNo'] = $this->model->loadChasisNo();
//        $prod = 'ANR4ASA00';//$this->input->post('Prod_Code');
//        $col =  '26U';$this->input->post('Color_Code');
//        $filter = 1;$this->input->post('filter');
        $prod = $this->input->post('Prod_Code');
        $col = $this->input->post('Color_Code');
        $filter = $this->input->post('filter');
        $data['avail'] = $this->model->loadChasisNoDiffFilters($prod, $col, 1);
        $data['mark'] = $this->model->loadChasisNoDiffFilters($prod, $col, 2);
        $data['pdi'] = $this->model->loadChasisNoDiffFilters($prod, $col, 5);
        echo json_encode($data);
    }

    public function createBooking() {
        if (isset($_POST['chassisPopulate'])) {
            $data = array(
                'selectModel' => $this->input->post('selectModel'),
                'selectVarient' => $this->input->post('selectVarient'),
                'productCode' => $this->input->post('productCode'),
                'Colour' => $this->input->post('colorName'),
                'colorCode' => $this->input->post('colorCode'),
                'statusFilter' => $this->input->post('statusFilter'),
                'chassisPopulate' => $this->input->post('chassisPopulate'),
                'filterText' => $this->input->post('filterText'),
                'filter' => $this->input->post('statusFilter'),
                'dseId' => $this->input->post('dseId'),
            );
            $status = $this->model->loadorderStatus();
            $data['status'] = $status['status'];
            if (!empty($_POST['chassisPopulate'] && $_POST['statusFilter'] != 2)) {
                $this->load->view('sales/bookingDetails', $data);
            } else {
                $this->load->view('sales/stockDemand', $data);
            }
        }
    }

    public function insert_booking() {
        if (isset($_POST['statusFilter'])) {

            $config = array(
                array(
                    'field' => 'sobNum',
                    'label' => 'SOB Num',
                    'rules' => 'trim|required|is_unique[bookings_table.order_no]',
                    'errors' => array(
                        'required' => 'You must provide a %s.',
                        'is_unique' => 'Order number already exists'
                    ),
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                myLoader(validation_errors(), $url) ;
                //echo validation_errors();
            } else {
                $filter = $this->input->post('statusFilter');
                switch ($filter) {
                    case 2:
                        $if_marked_date = date('Y-m-d H:i:s');
                        $if_alloted_Date = "";
                        $if_invoiced_Date = "";
                        $if_billed_date = "";
                        $if_delivered_date = "";
                        break;
                    case 4:
                        $if_marked_date = "";
                        $if_alloted_Date = date('Y-m-d H:i:s');
                        $if_invoiced_Date = "";
                        $if_billed_date = "";
                        $if_delivered_date = "";
                        break;
                    case 6:
                        $if_marked_date = "";
                        $if_alloted_Date = "";
                        $if_invoiced_Date = date('Y-m-d H:i:s');
                        $if_billed_date = "";
                        $if_delivered_date = "";
                        break;
                    case 7:
                        $if_marked_date = "";
                        $if_alloted_Date = "";
                        $if_invoiced_Date = "";
                        $if_billed_date = date('Y-m-d H:i:s');
                        $if_delivered_date = "";
                        break;
                    case 8:
                        $if_marked_date = "";
                        $if_alloted_Date = "";
                        $if_invoiced_Date = "";
                        $if_billed_date = "";
                        $if_delivered_date = date('Y-m-d H:i:s');
                        break;
                }
                $prod_code = $this->input->post('bookingProdCode');
                $chassis_no = $this->input->post('ChassisNumber');
                $stockId = $this->model->get_stock_id($prod_code, $chassis_no);
                $data = array(
                    'product_stock_id' => $stockId[0]['Stock_ID'],
                    'prod_code' => $prod_code,
                    'booked_colour' => $this->input->post('bookingCol'),
                    'booked_colour_code' => $this->input->post('bookingColCode'),
                    'chassis_no' => $chassis_no,
                    'cash_paid' => $this->input->post('CashPaid'),
                    'dse_id' => $this->input->post('dseId'),
                    'order_no' => $this->input->post('sobNum'),
                    'customer_name' => $this->input->post('custName'),
                    'customer_number' => $this->input->post('customer_number'),
                    'booking_remarks' => $this->input->post('bookingRemarks'),
                    'if_marked_date' => $if_marked_date,
                    'if_alloted_Date' => $if_alloted_Date,
                    'if_invoiced_Date' => $if_invoiced_Date,
                    'if_billed_date' => $if_billed_date,
                    'if_delivered_date' => $if_delivered_date,
                );
                $data = $this->model->insert_order('bookings_table', $data, $filter);
                $result = array();
                if ($data) {
                    $result['message'] = 'Booking Successfull';
                    $result['url'] = 'sales/booking';
                } else {
                    $result['message'] = 'Error Occered';
                    $result['url'] = 'sales/booking';
                }
                $this->load->view('sales/loader', $result);
            }
        }
    }

    public function insertDemand() {
        $config = array(
            array(
                'field' => 'sobNum',
                'label' => 'SOB Num',
                'rules' => 'trim|required|is_unique[bookings_table.order_no]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => 'Order number already exists'
                ),
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            // myLoader(validation_errors(), $url) ;
            $data['error'] = validation_errors();
            $this->load->view('admin/uploadErrorPage', $data);
        } else {
            $filter = $this->input->post('statusFilter');

            $data = array(
                'stock_demand_prod_code' => $this->input->post('bookingProdCode'),
                'stock_demand_booked_colour' => $this->input->post('bookingCol'),
                'stock_demand_booked_colour_code' => $this->input->post('bookingColCode'),
                'stock_demand_cash_paid' => $this->input->post('CashPaid'),
                'stock_demand_dse_id' => $this->session->userdata['user_employee_id'],
                'stock_demand_order_no' => $this->input->post('sobNum'),
                'stock_demand_customer_name' => $this->input->post('custName'),
                'stock_demand_remarks' => $this->input->post('bookingRemarks'),
                'stock_demand_demand_date' => date('Y-m-d H:i:s'),
                'stock_demand_exp_date' => date('Y-m-d H:i:s', time() + 86400),
            );
            $data = $this->model->insertDemand('stock_demand_dable', $data, $filter);
            $result = array();
            if ($data) {
                $this->send_mail($data);
            } else {
                $result['message'] = 'Error Occered';
                $result['url'] = 'sales/booking';
                $this->load->view('sales/loader', $result);
            }
        }
    }

    public function demandmessage() {

        $data = $this->model->demandmessage();
        $count = $this->model->count_message();
        if (!empty($data)) {
            $result['total'] = $count;
            $result['values'] = $data;
        } else {
            $result['total'] = 0;
            $result['values'] = 0;
        }

        echo json_encode($result);
    }

    public function viewDemand() {

        if (userLogedIn()) {
            if (check_access('viewDemand')) {
                $this->load->view("sales/demandView");
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }
    
    public function onlyViewDemand() {

        if (userLogedIn()) {
            if (check_access('viewDemand')) {
                $this->load->view("sales/demandViewOnly");
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function loadDemand() {
        $data = $this->model->loadDemand();
        if (!empty($data)) {
            foreach ($data as $val) {
                $i = 1;
                $stock_demand_id = $val['stock_demand_id'];
                $product_code = $val['stock_demand_prod_code'];
                $color_code = $val['stock_demand_booked_colour_code'];
                $color = $val['stock_demand_booked_colour'];
                $cashPaid = $val['stock_demand_cash_paid'];
                $sobNo = $val['stock_demand_order_no'];
                $custName = $val['stock_demand_customer_name'];
                $remarks = $val['stock_demand_remarks'];
                $date = $val['stock_demand_demand_date'];
                $expDate = $val['stock_demand_exp_date'];
                $dse = $val['stock_demand_dse_id'];
                $convert = '<a href="' . ADMINURL . 'sales/ListDemand/' . $stock_demand_id . '" class="btn btn-info" role="button">Convert</a>';
                $distroy = '<a href="' . ADMINURL . 'sales/destroydemand/' . $stock_demand_id . '" class="btn btn-danger" role="button">Delete</a>';
                $output['data'][] = array($product_code, $color_code, $color, $cashPaid, $sobNo, $custName, $remarks, $date, $expDate, $dse, $convert, $distroy);
                $i++;
            }
        } else {
            $output['data'][] = array('', '', 'No', 'Data', 'Found', '', '', '', '', '', '', '');
        }

        echo json_encode($output);
    }
public function loadDemandViewOnly() {
        $data = $this->model->loadDemand();
        if (!empty($data)) {
            foreach ($data as $val) {
                $i = 1;
                $stock_demand_id = $val['stock_demand_id'];
                $product_code = $val['stock_demand_prod_code'];
                $color_code = $val['stock_demand_booked_colour_code'];
                $color = $val['stock_demand_booked_colour'];
                $cashPaid = $val['stock_demand_cash_paid'];
                $sobNo = $val['stock_demand_order_no'];
                $custName = $val['stock_demand_customer_name'];
                $remarks = $val['stock_demand_remarks'];
                $date = $val['stock_demand_demand_date'];
                $expDate = $val['stock_demand_exp_date'];
                $dse = $val['stock_demand_dse_id'];
                 $output['data'][] = array($product_code, $color_code, $color, $cashPaid, $sobNo, $custName, $remarks, $date, $expDate, $dse);
                $i++;
            }
        } else {
            $output['data'][] = array('', '', 'No', 'Data', 'Found', '', '', '', '', '', '', '');
        }

        echo json_encode($output);
    }
    public function ListDemand($id = null) {
        $data['details'] = $this->model->ListDemand($id);
        $this->load->view('sales/listDemand', $data);
    }

    public function convertDemand() {
        if (isset($_POST['chassisPopulate'])) {
            $data = array(
                'demandId' => $this->input->post('demandId'),
                'selectModel' => $this->input->post('selectModel'),
                'selectVarient' => $this->input->post('selectVarient'),
                'productCode' => $this->input->post('productCode'),
                'Colour' => $this->input->post('colorName'),
                'colorCode' => $this->input->post('colorCode'),
                'statusFilter' => $this->input->post('statusFilter'),
                'chassisPopulate' => $this->input->post('chassisPopulate'),
                'filterText' => $this->input->post('filterText'),
                'filter' => $this->input->post('statusFilter'),
                'dseId' => $this->input->post('dseId'),
            );
            $status = $this->model->loadorderStatus();
            //  $data['data'] = $data;
            $data['status'] = $status['status'];
            $data['custDetails'] = $this->model->get_cust_details($this->input->post('demandId'));

            if (!empty($_POST['chassisPopulate'] && $_POST['statusFilter'] != 2)) {
                $this->load->view('sales/convertDemand', $data);
            } else {
                myLoader('Cannot Re-Create A Demand When You Convert', 'sales/viewDemand');
            }
        }
    }

    public function demandToBooking() {
        if (isset($_POST['statusFilter'])) {

            $config = array(
                array(
                    'field' => 'sobNum',
                    'label' => 'SOB Num',
                    'rules' => 'trim|required|is_unique[bookings_table.order_no]',
                    'errors' => array(
                        'required' => 'You must provide a %s.',
                        'is_unique' => 'Order number already exists'
                    ),
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                // myLoader(validation_errors(), $url) ;
                echo validation_errors();
            } else {
                $filter = $this->input->post('statusFilter');
                switch ($filter) {
                    case 2:
                        $if_marked_date = date('Y-m-d H:i:s');
                        $if_alloted_Date = "";
                        $if_invoiced_Date = "";
                        $if_billed_date = "";
                        $if_delivered_date = "";
                        break;
                    case 4:
                        $if_marked_date = "";
                        $if_alloted_Date = date('Y-m-d H:i:s');
                        $if_invoiced_Date = "";
                        $if_billed_date = "";
                        $if_delivered_date = "";
                        break;
                    case 6:
                        $if_marked_date = "";
                        $if_alloted_Date = "";
                        $if_invoiced_Date = date('Y-m-d H:i:s');
                        $if_billed_date = "";
                        $if_delivered_date = "";
                        break;
                    case 7:
                        $if_marked_date = "";
                        $if_alloted_Date = "";
                        $if_invoiced_Date = "";
                        $if_billed_date = date('Y-m-d H:i:s');
                        $if_delivered_date = "";
                        break;
                    case 8:
                        $if_marked_date = "";
                        $if_alloted_Date = "";
                        $if_invoiced_Date = "";
                        $if_billed_date = "";
                        $if_delivered_date = date('Y-m-d H:i:s');
                        break;
                }

                $data = array(
                    'prod_code' => $this->input->post('bookingProdCode'),
                    'booked_colour' => $this->input->post('bookingCol'),
                    'booked_colour_code' => $this->input->post('bookingColCode'),
                    'chassis_no' => $this->input->post('ChassisNumber'),
                    'cash_paid' => $this->input->post('CashPaid'),
                    'dse_id' => $this->input->post('dseId'),
                    'order_no' => $this->input->post('sobNum'),
                    'customer_name' => $this->input->post('custName'),
                    'booking_remarks' => $this->input->post('bookingRemarks'),
                    'customer_number' => $this->input->post('contactNum'),
                    'if_marked_date' => $if_marked_date,
                    'if_alloted_Date' => $if_alloted_Date,
                    'if_invoiced_Date' => $if_invoiced_Date,
                    'if_billed_date' => $if_billed_date,
                    'if_delivered_date' => $if_delivered_date,
                );
                $stockId = $this->model->get_stock_id($this->input->post('bookingProdCode'), $this->input->post('ChassisNumber'));
                $data['product_stock_id'] = $stockId[0]['Stock_ID'];
                $data = $this->model->demandToBooking('bookings_table', $data, $filter);

                $result = array();
                if ($data) {
                    $result['message'] = 'Booking Successfull';
                    $result['url'] = 'sales/booking';
                } else {
                    $result['message'] = 'Error Occered';
                    $result['url'] = 'sales/booking';
                }
                $this->load->view('sales/loader', $result);
            }
        }
    }

    public function salesDaily() {
        if (userLogedIn()) {
            $user_data = $this->session->userdata();
            $empId = $user_data['user_employee_id'];

            if (check_access('salesDaily') && $user_data['employee_hierarchy'] == 7) {
                $filter = 7;
                $fromDate = date("m/d/Y", strtotime("yesterday"));
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
                $user_data = $this->session->userdata();
                $empId = $user_data['user_employee_id'];
                $result['data']['me'] = $this->sales->recursiveDaily($empId, $filter, $fromDate, $toDate);

                $this->load->view('sales/salesDailyRep', $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function salesModelRepView() { //fn to display modelwise reprt restricted
        if (userLogedIn()) {
            $user_data = $this->session->userdata();
            $empId = $user_data['user_employee_id'];
            if (check_access('salesModelRepView') && $user_data['employee_hierarchy'] == 7) {
                $fromDate = date("Y-m-d", strtotime("yesterday"));
                $toDate = date("Y-m-d");

                if (isset($_POST['fromDate'])) {
                    $fromDate = $this->input->post('fromDate');
                    $toDate = $this->input->post('toDate');
                }
                $fromDate = date("Y-m-d", strtotime($fromDate));
                $toDate = date("Y-m-d", strtotime($toDate));

                $filter = 7;
                $user_data = $this->session->userdata();
                $empId = $user_data['user_employee_id'];

                $data['data'] = $this->sales->recursiveModelReport($fromDate, $toDate, $filter, $empId);

                $parts = explode("-", $fromDate, 3);
                $uk_date = $parts[1] . "/" . $parts[2] . "/" . $parts[0];
                $fromDate = $uk_date;
                $parts = explode("-", $toDate, 3);
                $uk_date = $parts[1] . "/" . $parts[2] . "/" . $parts[0];

                $toDate = $uk_date;

                $data['fromDate'] = $fromDate;
                $data['toDate'] = $toDate;
                $result['data'] = $data;

                $this->load->view("sales/salesModelRepView", $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function salesJsoniser() { // sub fn called when MORE btn clicked in the model_reprt.php
        $fromDate = $this->input->post('from');
        $toDate = $this->input->post('to');
        $model = $this->input->post('model');
        $table = $this->input->post('table');


        $user_data = $this->session->userdata();
        $empId = $user_data['user_employee_id'];

        $data = $this->sales->salesJsoniser($fromDate, $toDate, $model, $table);

        echo json_encode($data);
    }

    public function salesTarget() {
        if (userLogedIn()) {
            $user_data = $this->session->userdata();
            $empId = $user_data['user_employee_id'];
            if (check_access('salesTarget') && $user_data['employee_hierarchy'] == 7) {
                $user_data = $this->session->userdata();

                $empID = $user_data['user_employee_id'];
                $empName = $user_data['user_name'];
                $f = $user_data['employee_hierarchy'];

                $fromDate = date("Y-m-d", strtotime("first day of this month"));
                if (isset($_POST['fromDate'])) {
                    $date = explode('/', $this->input->post('repDate'));
                    $day = $date[1];
                    $month = $date[0];
                    $year = $date[2];
                    $fromDate = $year . '-' . $month . '-' . $day;
                }
                $field = 7;
                $toDate = date("Y-m-d", strtotime("last day of this month"));
                $data['get_target']['dse'] = $this->sales->sales_generate_rep_each_emp($empID, $fromDate, $toDate, $field);
                $date = explode('-', $fromDate);
                $day = $date[2];
                $month = $date[1];
                $year = $date[0];
                $fromDate = $month . '/' . $day . '/' . $year;
                $data['fromDate'] = $fromDate;
                $this->load->view("sales/salesTarget", $data);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function myBookings() { // for sales exec to book and create demand
        if (userLogedIn()) {
            $user_data = $this->session->userdata();
            $empId = $user_data['user_employee_id'];
            if (check_access('myBookings') && $user_data['employee_hierarchy'] == 7) {

                // $result['demandedcars'] = $this->sales->get_demandedcars($empId);
                $result['data'] = $this->sales->get_dse_bookings($empId);
                $this->load->view("sales/execHome", $result);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function destroydemand($id = null) {
        $data['details'] = $this->model->ListDemand($id);
        $data['id'] = $id;
        $this->load->view('sales/destroydemand', $data);
    }

    public function deleteDemand() {
        $message = array();
        $id = $this->input->post('id');
        $data = $this->model->deleteDemand($id);
        if ($data) {
            $message['response'] = true;
            $message['message'] = 'Demand Deleted Successtully';
        } else {
            $message['response'] = false;
            $message['message'] = 'error Occered';
        }
        echo json_encode($data);
    }

    public function viewOrder() {

        if (userLogedIn()) {
            if (check_access('viewOrder')) {
                $this->load->view('sales/viewAndEditOrder');
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }
  
    public function ListOrder() {
        if (userLogedIn()) {
            if (check_access('viewOrder')) {
                $date = date("Y-m-d", strtotime("first day of this month"));
                if (isset($_POST['date'])) {
                    $date1 = explode('/', $this->input->post('date'));
                    $date = $date1[2] . '-' . $date1[0] . '-' . $date1[1];
                }
                $result = $this->model->ListOrder($date);
               
                if (!empty($result)) {
                   
                    foreach ($result as $value) {
                        $boooking_id = $value['boooking_id'];
                        $prod_code = $value['prod_code'];
                        $chassis_no = $value['chassis_no'];
                        $booked_colour = $value['booked_colour'];
                        $booked_colour_code = $value['booked_colour_code'];
                        $order_no = $value['order_no'];
                        $if_marked_date = $value['if_marked_date'];
                        $if_alloted_Date = $value['if_alloted_Date'];
                        $if_invoiced_Date = $value['if_invoiced_Date'];
                        $if_billed_date = $value['if_billed_date'];
                        $if_delivered_date = $value['if_delivered_date'];
                        $customer_name = $value['customer_name'];
                        $cash_paid = $value['cash_paid'];
                        $dse_id = $value['dse_id'];
                        $stock_status = $value['status'];
                        $remarks = $value['booking_remarks'];
                        $button = '<div class="btn-group">
                                
                                <a href="' . ADMINURL . 'sales/editOrder/' . $boooking_id . '" class="btn btn-info" role="button">Edit/Convert</a>
                                <a href="' . ADMINURL . 'sales/DeleteOrder/' . $boooking_id . '" class="btn btn-danger" role="button">Delete</a>
                                </div>';
                        $output['data'][] = array($boooking_id, $prod_code, $chassis_no, $booked_colour, $booked_colour_code, $order_no, $if_marked_date, $if_alloted_Date, $if_invoiced_Date, $if_billed_date, $if_delivered_date, $customer_name, $cash_paid, $dse_id,$stock_status, $remarks, $button);
                    }
                } else {
                    $output['data'][] = array('', '', '', '', '', 'N', 'O', '', 'D', 'A', 'T', 'A', 'F', 'O', 'U', 'N', 'D', '', '', '');
                }
                echo json_encode($output);
            } else {
                myLoader('No Access', 'home/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function editOrder($id = null) {
        $data = $this->model->editOrder($id);
        $data['status'] = $this->model->getStatus();
        $result['status'] = $data['status'];

        $result['result'] = array(
            'boooking_id' => $data[0]['boooking_id'],
            'selectModel' => $data[0]['Model'],
            'selectVarient' => $data[0]['Variant'],
            'productCode' => $data[0]['prod_code'],
            'Colour' => $data[0]['booked_colour'],
            'colorCode' => $data[0]['booked_colour_code'],
            'dseId' => $data[0]['dse_id'],
            'chassisPopulate' => $data[0]['chassis_no'],
            'cash_paid' => $data[0]['cash_paid'],
            'order_no' => $data[0]['order_no'],
            'customer_name' => $data[0]['customer_name'],
            'customer_number' => $data[0]['customer_number'],
            'remarks' => $data[0]['booking_remarks'],
            'Stock_ID' => $data[0]['Stock_ID']
        );

        $this->load->view('sales/editOrder', $result);
    }

    public function update_booking($id = null) {
        $booking_id = $id;
        $filter = $this->input->post('statusFilter');
        $curdate = new DateTime();
        $date = $curdate->format('Y-m-d H:i:s');
        switch ($filter) {
            case 2:
                $update_date = 'if_marked_date';

                break;
            case 4:
                $update_date = 'if_alloted_Date';

                break;
            case 6:
                $update_date = 'if_invoiced_Date';

                break;
            case 7:
                $update_date = 'if_billed_date';

                break;
            case 8:
                $update_date = 'if_delivered_date';

                break;
        }
        $data = array(
            'boooking_id' => $id,
            'product_stock_id' => $this->input->post('product_stock_id'),
            'prod_code' => $this->input->post('bookingProdCode'),
            'chassis_no' => $this->input->post('ChassisNumber'),
            'booked_colour' => $this->input->post('bookingCol'),
            'booked_colour_code' => $this->input->post('bookingColCode'),
            'order_no' => $this->input->post('sobNum'),
            'customer_name' => $this->input->post('custName'),
            'cash_paid' => $this->input->post('CashPaid'),
            'customer_number' => $this->input->post('customer_number'),
            'dse_id' => $this->input->post('dseId'),
            'booking_remarks' => $this->input->post('bookingRemarks'),
            $update_date => $date
        );
        $resp = array();
        $response = $this->model->update_order($data, $booking_id, $filter);
        if ($response) {
            $resp['url'] = 'sales/viewOrder';
            $resp['message'] = 'Order Update Successfully';
            $this->load->view('sales/loader', $resp);
        } else {
            $resp['url'] = ADMINURL . 'sales/viewbooking';
            $resp['message'] = 'Error Occered ';
            return false;
        }
    }

    public function DeleteOrder($id = null) {
        $data = $this->model->editOrder($id);
        $data['status'] = $this->model->getStatus();
        $result['status'] = $data['status'];

        $result['result'] = array(
            'boooking_id' => $data[0]['boooking_id'],
            'selectModel' => $data[0]['Model'],
            'selectVarient' => $data[0]['Variant'],
            'productCode' => $data[0]['prod_code'],
            'Colour' => $data[0]['booked_colour'],
            'colorCode' => $data[0]['booked_colour_code'],
            'dseId' => $data[0]['dse_id'],
            'chassisPopulate' => $data[0]['chassis_no'],
            'cash_paid' => $data[0]['cash_paid'],
            'order_no' => $data[0]['order_no'],
            'customer_name' => $data[0]['customer_name'],
            'customer_number' => $data[0]['customer_number'],
            'remarks' => $data[0]['booking_remarks'],
            'Stock_ID' => $data[0]['Stock_ID']
        );

        $this->load->view('sales/destroyOrder', $result);
    }

    function deleteBooking() {
        $message = array();
        $id = $this->input->post('id');
        $data = $this->model->deleteBooking($id);
        if ($data) {
            $message['respose'] = 'success';
            $message['message'] = 'Deleted Successfully';
        } else {
            $message['respose'] = 'error';
            $message['message'] = 'Error Occered';
        }
        echo json_encode($message);
    }

//send mail
    public function send_mail($data) {
        $result = array();
        $result['message'] = 'Demand Created Successfull';
        $result['url'] = 'sales/booking';
        $product = $this->model->get_details_of_product($data);
        $table = 'employe_table';
        $field = 'employe_table_employe_email';
        $where = array(
            'employe_table_employe_status' => 1
        );
        $email_address = $this->model->get_details_for_email($table, $field, $where);

        if (!empty($email_address)) {
            $model = $product['model'][0]['model_name'];
            $vairent = $product['model'][0]['variant'];
            $color = $product['model'][0]['color'];
            $demand_exp = $product['demand'][0]['stock_demand_exp_date'];
            $demand_created_by = $product['demand'][0]['stock_demand_dse_id'];
            $subject = 'Demand Created For :' . $model . " " . $vairent;
            $bodyText = 'Please note that demand has been '
                    . 'created For ' . $model . ' ' . $vairent . ' ' . $color . ' by ' . $demand_created_by . ' and will expire on  ' . $demand_exp;
            $mail_from = 'sabah@codingmagic.net';
            $config = array(
                'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                'smtp_host' => 'mail.codingmagic.net',
                'smtp_port' => 465,
                'smtp_user' => 'sabah@codingmagic.net',
                'smtp_pass' => 'Sabah10178$',
                'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                'mailtype' => 'html', //plaintext 'text' mails or 'html'
                'smtp_timeout' => '4', //in seconds
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            foreach ($email_address as $email) {
                $this->email->set_newline("\r\n");
                $this->email->from($mail_from);
                $this->email->to($email['employe_table_employe_email']);
                $this->email->subject($subject);
                $this->email->message($bodyText);
//                if ($this->email->send()) {
//                    $result['message'] = 'Demand Created Successfull';
//                    $result['url'] = 'sales/booking';
//                } else {
//                    $result['message'] = 'Demand Created Successfull But Email Not Send';
//                }
            }
        } else {
            $result['message'] = 'Demand Created Successfull But no mail send ';
            $result['url'] = 'sales/booking';
        }
        $this->load->view('sales/loader', $result);
    }

}
