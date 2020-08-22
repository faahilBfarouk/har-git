<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PhpspreadsheetController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $helper = array('form', 'inflector', 'date');
        $this->load->helper($helper);
        $this->load->model('admin/Import_model', 'import');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index() {
        $this->load->view("admin/upload_daily_rep");
    }

    public function load_data() {
        $table_name = array(
            'booking daily rep',
            'delivered daily rep',
            'enquiry daily rep',
            'rtl daily rep',
            'cancelled_daily_rep'
        );
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['upload_file']['name']);
            $extension = end($arr_file);
            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                $sheetName = $spreadsheet->getSheetNames();
                $data = array($table_name, $sheetName);
                echo json_encode($data);
            }
        }
    }

    public function list_data() {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['upload_file']['name']);
            $extension = end($arr_file);
            $table = underscore($this->input->post('repName'));
            $sheet = $this->input->post('sheetName');
            $headerOpt = $this->input->post('headerOpt');
            $start_row = $this->input->post('starting_row');
            if ($headerOpt == 1) {
                $start_row++;
            }
            $highestRow = $this->input->post('ending_row');
            $totalRows = $highestRow - $start_row;
            if ($highestRow < $start_row || $totalRows > 50) {
                $response['message'] = 'Row conflict';
                $response['class'] = 'danger';
                $this->load->view('admin/loader', $response);
            } else {
                $path = $_FILES['upload_file']["tmp_name"];
                $object = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $object->load($_FILES['upload_file']['tmp_name']);
                $worksheet = $spreadsheet->getSheetByName($sheet);
                $highestColumn = $worksheet->getHighestColumn();
                switch ($table) {
                    case 'booking_daily_rep':
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                            $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $e = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $f = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $g = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $h = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $i = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $j = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $k = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $l = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $m = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $n = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                            $o = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                            $p = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                            $q = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                            $r = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                            $s = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                            $data['data'][] = array(
                                'ORDER_NUM' => $b,
                                'ORDER_DATE' => date('Y/m/d', $c),
                                'CUST_CD' => $d,
                                'CUSTOMER_NAME' => $e,
                                'PHONE1' => $f,
                                'MODEL_DESC' => strtoupper(underscore($g)),
                                'FUEL_DESC' => $h,
                                'VARIANT_DESC' => $i,
                                'COLOR_DESC' => $j,
                                'TEAM_LEAD_NAME' => $k,
                                'EMP_NAME' => $l,
                                'BUYER_TYPE' => $m,
                                'RECEIVED_AMOUNT' => $n,
                                'ENQUIRY_NO' => $o,
                                'ENQUIRY_SOURCE' => $p,
                                'ASM_SM' => $q,
                                'SM_ASM' => $r,
                                'OBF_NO' => $s,
                                'sheet_name' => $sheet
                            );
                        }
                        $this->load->view('admin/bookingDailyRep', $data);
                        break;
                    case 'enquiry_daily_rep':
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                            $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $e = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $f = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $g = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $h = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $i = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $j = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $k = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $l = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $m = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $n = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                            $o = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                            $data['data'][] = array(
                                'Enquiry_No' => $b,
                                'Enquiry_Date' => date('Y/m/d', $c),
                                'Team_Lead_Name' => $d,
                                'DSE_Name' => $e,
                                'Prospect_Name' => $f,
                                'Mobile_Number' => $g,
                                'Model_Name' => strtoupper(underscore($h)),
                                'Fuel_Type' => $i,
                                'Variant_Name' => $j,
                                'Enquiry_Status' => $k,
                                'Source' => $l,
                                'Buyer_Type' => $m,
                                'ASM' => $n,
                                'SM' => $o,
                                'sheet_name' => $sheet
                            );
                        }
                        $this->load->view('admin/enqDailyRep', $data);
                        break;
                    case 'rtl_daily_rep' :
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                            $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $e = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $f = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $g = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $h = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $i = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $j = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(9, $row)->getValue());
                            $k = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $l = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $m = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $n = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                            $o = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                            $p = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                            $q = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                            $r = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                            $s = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(18, $row)->getValue());
                            $t = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                            $u = $worksheet->getCellByColumnAndRow(20, $row)->getValue();

                            $data['data'][] = array(
                                'Inv_No' => $b,
                                'Inv_Dt' => date('Y/m/d', $c),
                                'Model' => strtoupper(underscore($d)),
                                'Fuel_Type' => $e,
                                'Clr_DESC' => $f,
                                'Variant_DESC' => $g,
                                'Chassis' => $h,
                                'Engine' => $i,
                                'Mul_Inv_Dt' => date('Y/m/d', $j),
                                'Customer_Name' => $k,
                                'Team_Lead' => $l,
                                'DSE' => $m,
                                'Mobile_NO' => $n,
                                'Enquiry_No' => $o,
                                'Enquiry_source' => $p,
                                'Buyer_Type' => $q,
                                'order_number' => $r,
                                'order_date' => date('Y/m/d', $s),
                                'ASM_SM' => $t,
                                'SM_ASM' => $u,
                                'sheet_name' => $sheet
                            );
                        }
                        $this->load->view('admin/rtlDailyRepUpload', $data);
                        break;

                    case 'delivered_daily_rep':
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $d = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                            $e = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                            $f = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $g = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $h = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $i = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $j = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $k = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $l = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $m = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $n = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                            $o = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                            $p = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                            $q = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                            $r = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                            $s = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                            $t = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                            $u = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                            $v = $worksheet->getCellByColumnAndRow(21, $row)->getValue();

                            $data['data'][] = array(
                                'SL_NO_' => $b,
                                'Inv_No' => $c,
                                'Inv_Dt' => date('Y/m/d', $d),
                                'Del_Date' => date('Y/m/d', $e),
                                'Model' => strtoupper(underscore($f)),
                                'Fuel_Type' => $g,
                                'Variant_DESC' => $h,
                                'Clr_DESC' => $i,
                                'Chassis' => $j,
                                'Engine' => $k,
                                'Customer_Name' => $l,
                                'Team_Lead' => $m,
                                'DSE' => $n,
                                'Mobile_NO' => $o,
                                'Finance' => $p,
                                'INSU' => $q,
                                'EW' => $r,
                                'TV' => $s,
                                'FAS_TAG' => $t,
                                'ASM' => $u,
                                'SM' => $v,
                                'sheet_name' => $sheet
                            );
                        }
                        $this->load->view('admin/delivered_daily_rep', $data);
                        break;
                    case 'cancelled_daily_rep':
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                            $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $e = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                            $f = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $g = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $h = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $i = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $j = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $k = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $l = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $m = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $data['data'][] = array(
                                'SL_NO' => $b,
                                'CAN_DATE' => date('Y/m/d', $c),
                                'INV_NUM_' => $d,
                                '_INV_DATE_' => date('Y/m/d', $e),
                                '_CUST_NAME_' => $f,
                                'TL' => $g,
                                'DSE_NAME' => $h,
                                'MODEL_DESC' => strtoupper(underscore($i)),
                                'VARIANT_DESC' => $j,
                                'CONTACT_NO' => $k,
                                'CHASIS_NO' => $l,
                                'REMARKS' => $m,
                                'sheet_name' => $sheet
                            );
                        }
                        $this->load->view('admin/cancelled_daily_rep', $data);
                        break;
                    case 'inventory_table':
                        $data = array();
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $data['data'][] = array(
                                'product_code' => $b,
                                'model_name' => $c,
                                'variant' => $d,
                            );
                        }
                        $this->load->view('admin/inventoryTableUpload', $data);
                        break;
                    case'model_color_matrix':
                        $data = array();
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $data['data'][] = array(
                                'product_code' => $b,
                                'color_code' => $c,
                                'color' => $d,
                            );
                        }
                        $this->load->view('admin/model_color_matrix', $data);
                        break;
                    case 'stock':
                        $data = array();
                        for ($row = $start_row; $row <= $highestRow; $row++) {
                            $a = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp((int) $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                            $b = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $c = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $d = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $e = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            $f = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                            $g = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                            $h = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $i = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                            $j = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                            $k = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                            $l = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                            $m = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                            $n = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                            $o = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                            $p = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                            $data['data'][] = array(
                                'MUL_INV_DATE' => $b,
                                'MODEL' => $c,
                                'Variant' => $d,
                                'MODEL_CODE' => $e,
                                'COLOR' => $f,
                                'COLOR_CODE' => $g,
                                'MODEL_YEAR' => $h,
                                'CHASSIS_NO' => $i,
                                'ENGINE_NO' => $j,
                                'CHASSIS_CODE' => $k,
                                'STOCK_LOCATION' => $l,
                                'STATUS' => $m,
                                'Transaction_Num' => $n,
                                'INVOICE_NUM' => $o,
                                'REMARKS' => $p,
                            );
                        }
                        $this->load->view('admin/stock_upload', $data);
                        break;
                    default:
                        $this->load->view('admin/forbidden');
                }
            }
        }
    }

    public function upload() {
        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'model_name');
        $sm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 4);
        $asm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 5);
        $teamLeader = $this->import->get_emp('employe_table', 'employe_table_employe_id', 6);
        $dse = $this->import->get_emp('employe_table', 'employe_table_employe_id', 7);
        foreach ($model as $key => $var) {
            $models[] = $var['model_name'];
        }
        foreach ($sm as $key => $emp) {
            $smgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($asm as $key => $emp) {
            $asmgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($teamLeader as $key => $emp) {
            $teamlead[] = $emp['employe_table_employe_id'];
        }
        foreach ($dse as $key => $emp) {
            $dsegroup[] = $emp['employe_table_employe_id'];
        }
        $config = array(
            array(
                'field' => 'Enquiry_No[]',
                'label' => 'Enquiry number',
                'rules' => 'trim|required|is_unique[enquiry_daily_rep.Enquiry_No]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s. already exist',
                ),
            ),
            array(
                'field' => 'Enquiry_Date[]',
                'label' => 'Enquiry Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'preg_match' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => 'Team_Lead_Name[]',
                'label' => 'Team Lead Name',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $teamlead) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'DSE_Name[]',
                'label' => 'Dse Name',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $dsegroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'Prospect_Name[]',
                'label' => 'Prospect Name',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'MobileNumber[]',
                'label' => 'Mobile Number',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[13]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'numeric' => 'You must provide numeric value in %s.',
                    'min_length' => 'You must min 9 digits value in %s.',
                    'max_length' => 'You must max 13 digits value in %s.'
                )
            ),
            array(
                'field' => 'Model_Name[]',
                'label' => 'Model Name',
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
            array(
                'field' => 'Fuel_Type[]',
                'label' => 'Fuel type',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Variant_Name[]',
                'label' => 'Variant Name',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Enquiry_Status[]',
                'label' => 'Enquiry Status',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Source[]',
                'label' => 'Source',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Buyer_Type[]',
                'label' => 'Buyer Type',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'ASM[]',
                'label' => 'ASM Id',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $asmgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'SM[]',
                'label' => 'SM Id',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $smgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
        );
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['response'] = false;
            $data['message'] = validation_errors();
            echo json_encode($data);
        } else {
            for ($i = 0; $i < count($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'Enquiry_No' => $this->input->post('Enquiry_No')[$i],
                    'Enquiry_Date' => $this->input->post('Enquiry_Date')[$i],
                    'Team_Lead_Name' => $this->input->post('Team_Lead_Name')[$i],
                    'DSE_Name' => $this->input->post('DSE_Name')[$i],
                    'Prospect_Name' => $this->input->post('Prospect_Name')[$i],
                    'Mobile_Number' => $this->input->post('MobileNumber')[$i],
                    'Model_Name' => $this->input->post('Model_Name')[$i],
                    'Fuel_Type' => $this->input->post('Fuel_Type')[$i],
                    'Variant_Name' => $this->input->post('Variant_Name')[$i],
                    'Enquiry_Status' => $this->input->post('Enquiry_Status')[$i],
                    'Source' => $this->input->post('Source')[$i],
                    'Buyer_Type' => $this->input->post('Buyer_Type')[$i],
                    'ASM' => $this->input->post('ASM')[$i],
                    'SM' => $this->input->post('SM')[$i],
                    'sheet_name' => $this->input->post('sheet_name')[$i],
                );
            }
            $result = $this->import->insert('enquiry_daily_rep', $dataImport);
            if ($result) {
                $data['response'] = true;
                $data['messsage'] = $result;
            } else {
                $data['response'] = false;
                $data['message'] = 'error occered';
            }
            echo json_encode($data);
        }
    }

    function checkDateFormat($date) {

        if (preg_match("/^[0-9]{4}\/(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            if ($date > 2000 - 01 - 01) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function regex_check($str) {
        if (preg_match("/^(?:'[A-Za-z](([\._\-][A-Za-z0-9])|[A-Za-z0-9])*[a-z0-9_]*')$/", $str)) {
            $this->form_validation->set_message('regex_check', 'The %s field is not valid!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function dataValidate() {
        $model = $this->import->get_details('inventory_table', 'model_name');
        $sm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 4);
        $asm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 5);
        $teamLeader = $this->import->get_emp('employe_table', 'employe_table_employe_id', 6);
        $dse = $this->import->get_emp('employe_table', 'employe_table_employe_id', 7);
        foreach ($model as $key => $var) {
            $models[] = $var['model_name'];
        }
        foreach ($sm as $key => $emp) {
            $smgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($asm as $key => $emp) {
            $asmgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($teamLeader as $key => $emp) {
            $teamlead[] = $emp['employe_table_employe_id'];
        }
        foreach ($dse as $key => $emp) {
            $dsegroup[] = $emp['employe_table_employe_id'];
        }
        $data['model'] = $models;
        $data['sm'] = $smgroup;
        $data['asm'] = $asmgroup;
        $data['dse'] = $dsegroup;
        $data['team'] = $teamlead;


        echo json_encode($data);
    }

    public function validate() {
        $model = $this->input->post('model');
        echo json_encode($model);
    }

    public function get_enq() {
        if (isset($_POST['Enquiry_No'])) {
            $count = 0;
            $field = $this->input->post('field');
            foreach ($_POST['Enquiry_No'] as $key => $Enquiry_No) {

                $enq[$key] = $Enquiry_No;
                $data[] = $this->import->checkEnqUniq($enq[$key], $field[$key], 'enquiry_daily_rep');
            }
            foreach ($data as $row) {
                if ($row['response'] == 1) {
                    $count++;
                }
            }
            if ($count > 0) {
                $result['response'] = 0;
                $result['message'] = $data;
            } else {
                $result['response'] = true;
                $result['message'] = 'ready';
            }
        }
        echo json_encode($result);
    }

    public function get_Booking_enq() {
        if (isset($_POST['ENQUIRY_NO'])) {
            $count = 0;
            $field = $this->input->post('field');
            $ORDER_NUM = $this->input->post('ORDER_NUM');
            $orderId = $this->input->post('orderId');
            foreach ($_POST['ENQUIRY_NO'] as $key => $Enquiry_No) {
                $enq[$key] = $Enquiry_No;
                $data[] = $this->import->checkEnqUniqforOrder($enq[$key], $field[$key], 'enquiry_daily_rep'); //if value exist 
                $order[] = $this->import->checkOdrUniq($ORDER_NUM[$key], $orderId[$key], 'booking_daily_rep'); //if duplicate entry in tabel
                $enqInBooking[] = $this->import->enqInBooking($enq[$key], $field[$key], 'booking_daily_rep', 'ENQUIRY_NO'); //if duplicate entry in tabel
            }
            foreach ($enqInBooking as $row) {
                if ($row['response'] == 1) {
                    $count++;
                }
            }
            if ($count > 0) {
                $result['enqInBookingresp'] = 0;
                $result['enqInBookingdata'] = $data;
            } else {
                $result['enqInBookingresp'] = 1;
                $result['enqInBookingdata'] = 'ready';
            }
            foreach ($data as $row) {
                if ($row['response'] == 1) {
                    $count++;
                }
            }
            if ($count > 0) {
                $result['enqresp'] = 0;
                $result['enqdata'] = $data;
            } else {
                $result['enqresp'] = 1;
                $result['enqdata'] = $data;
            }


            foreach ($order as $row) {
                if ($row['response'] == 1) {
                    $count++;
                }
            }
            if ($count > 0) {
                $result['ordresponse'] = 0;
                $result['order'] = $order;
            } else {
                $result['ordresponse'] = true;
                $result['order'] = 'ready';
            }
            echo json_encode($result);
        }
    }

    public function upload_booking_table() {
        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'model_name');
        $sm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 4);
        $asm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 5);
        $teamLeader = $this->import->get_emp('employe_table', 'employe_table_employe_id', 6);
        $dse = $this->import->get_emp('employe_table', 'employe_table_employe_id', 7);

        foreach ($model as $key => $var) {
            $models[] = $var['model_name'];
        }
        foreach ($sm as $key => $emp) {
            $smgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($asm as $key => $emp) {
            $asmgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($teamLeader as $key => $emp) {
            $teamlead[] = $emp['employe_table_employe_id'];
        }
        foreach ($dse as $key => $emp) {
            $dsegroup[] = $emp['employe_table_employe_id'];
        }

        $config = array(
            array(
                'field' => 'ORDER_NUM[]',
                'label' => 'Order Number',
                'rules' => 'trim|required|callback_regex_check|is_unique[booking_daily_rep.ORDER_NUM]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s already exist',
                    'callback_regex_check' => 'Invalid fields in %s'
                ),
            ),
            array(
                'field' => 'ORDER_DATE[]',
                'label' => 'Order Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'preg_match' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => 'CUST_CD[]',
                'label' => 'Cusomer Id',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'CUSTOMER_NAME[]',
                'label' => 'Cusomer name',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'PHONE1[]',
                'label' => 'Cusomer Phone',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[13]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'numeric' => 'You must provide numeric value in %s.',
                    'min_length' => 'You must min 9 digits value in %s.',
                    'max_length' => 'You must max 13 digits value in %s.'
                )
            ),
            array(
                'field' => 'MODEL_DESC[]',
                'label' => 'Model',
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
            array(
                'field' => 'FUEL_DESC[]',
                'label' => 'Fuel Type',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'VARIANT_DESC[]',
                'label' => 'Varient',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'VARIANT_DESC[]',
                'label' => 'Varient',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'COLOR_DESC[]',
                'label' => 'Colour',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'TEAM_LEAD_NAME[]',
                'label' => 'Team Leader',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $teamlead) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s Not Found'
                ),
            ),
            array(
                'field' => 'EMP_NAME[]',
                'label' => 'Employee Id',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $dsegroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'BUYER_TYPE[]',
                'label' => 'Buyer Type',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'RECEIVED_AMOUNT[]',
                'label' => 'Recieved Amount',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'ENQUIRY_NO[]',
                'label' => 'Enquiry number',
                'rules' => 'trim|required|is_unique[booking_daily_rep.ENQUIRY_NO]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s. already exist',
                ),
            ),
            array(
                'field' => 'ENQUIRY_SOURCE[]',
                'label' => 'Enquiry source',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'ASM_SM[]',
                'label' => 'Asm sm',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $asmgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'SM_ASM[]',
                'label' => 'Sm Asm',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $smgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'OBF_NO[]',
                'label' => 'OBF_NO',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
        );
        $data = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['response'] = false;
            $data['message'] = validation_errors();
            echo json_encode($data);
        } else {
            for ($i = 0; $i < sizeof($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'ORDER_NUM' => $this->input->post('ORDER_NUM')[$i],
                    'ORDER_DATE' => $this->input->post('ORDER_DATE')[$i],
                    'CUST_CD' => $this->input->post('CUST_CD')[$i],
                    'CUSTOMER_NAME' => $this->input->post('CUSTOMER_NAME')[$i],
                    'PHONE1' => $this->input->post('PHONE1')[$i],
                    'MODEL_DESC' => $this->input->post('MODEL_DESC')[$i],
                    'FUEL_DESC' => $this->input->post('FUEL_DESC')[$i],
                    'VARIANT_DESC' => $this->input->post('VARIANT_DESC')[$i],
                    'COLOR_DESC' => $this->input->post('COLOR_DESC')[$i],
                    'TEAM_LEAD_NAME' => $this->input->post('TEAM_LEAD_NAME')[$i],
                    'EMP_NAME' => $this->input->post('EMP_NAME')[$i],
                    'BUYER_TYPE' => $this->input->post('BUYER_TYPE')[$i],
                    'RECEIVED_AMOUNT' => $this->input->post('RECEIVED_AMOUNT')[$i],
                    'ENQUIRY_NO' => $this->input->post('ENQUIRY_NO')[$i],
                    'ENQUIRY_SOURCE' => $this->input->post('ENQUIRY_SOURCE')[$i],
                    'ASM_SM' => $this->input->post('ASM_SM')[$i],
                    'SM_ASM' => $this->input->post('SM_ASM')[$i],
                    'OBF_NO' => $this->input->post('OBF_NO')[$i],
                    'sheet_name' => $this->input->post('sheet_name')[$i],
                );
            }
            $result = $this->import->insert('booking_daily_rep', $dataImport);
            if ($result) {
                $data['response'] = true;
                $data['messsage'] = 'Successfully Imported';
            } else {
                $data['response'] = false;
                $data['message'] = 'error occered';
            }
            echo json_encode($data);
            //echo json_encode(count($this->input->post('sheet_name')));
        }
    }

    public function get_retail_enq() {
        if (isset($_POST['Enquiry_No'])) {
            $count = 0;
            $order_number = $this->input->post('order_number');
            $orderId = $this->input->post('orderId');
            $Inv_No = $this->input->post('Inv_No');
            $InvNoId = $this->input->post('InvNoId');
            $field = $this->input->post('field');
            foreach ($_POST['Enquiry_No'] as $key => $Enquiry_No) {

                $value[$key] = $Enquiry_No;
                $enquiryData[] = $this->import->isUnique('Enquiry_No', $value[$key], 'enquiry_daily_rep', $field[$key]);
                $orderNumber[] = $this->import->isUnique('ORDER_NUM', $order_number[$key], 'booking_daily_rep', $orderId[$key]);
                $enqInThisTable[] = $this->import->isUnique('Enquiry_No', $value[$key], 'rtl_daily_rep', $field[$key]);
                $orderInThisTable[] = $this->import->isUnique('order_number', $order_number[$key], 'rtl_daily_rep', $orderId[$key]);
                $invoiceInThisTable[] = $this->import->isUnique('Inv_No', $Inv_No[$key], 'rtl_daily_rep', $InvNoId[$key]);
                //if enquiry exitst in enquiry table
                foreach ($enquiryData as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['enqInEnqResp'] = 1;
                    $result['enqInEnqTabledata'] = $enquiryData;
                } else {
                    $result['enqInEnqResp'] = 0;
                    $result['enqInEnqTabledata'] = 'enq no not found';
                }
                //if order exitst in order table
                foreach ($orderNumber as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['orderResp'] = 1;
                    $result['orderInOrderData'] = $orderNumber;
                } else {
                    $result['orderResp'] = 0;
                    $result['orderInOrderData'] = 'order no not found';
                }
                //if enquiry duplicate in current table
                foreach ($enqInThisTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['enqInThisTableResp'] = 1;
                    $result['enqInThisTabledata'] = $enqInThisTable;
                } else {
                    $result['enqInThisTableResp'] = 0;
                    $result['enqInThisTabledata'] = 'no duplicate enquiry for enq';
                }
                //if order duplicate in current table
                foreach ($orderInThisTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['orderInThisTableResp'] = 1;
                    $result['orderInThisTabledata'] = $orderInThisTable;
                } else {
                    $result['orderInThisTableResp'] = 0;
                    $result['orderInThisTabledata'] = 'no duplicate enquiry for order';
                }
                //if invoice number duplicate in current table
                foreach ($invoiceInThisTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['invoiceInThisTableResp'] = 1;
                    $result['invoiceInThisTabledata'] = $invoiceInThisTable;
                } else {
                    $result['invoiceInThisTableResp'] = 0;
                    $result['invoiceInThisTabledata'] = 'no duplicate enquiry for order';
                }
            }
            echo json_encode($result);
        }
    }

    public function upload_ret_table() {
        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'model_name');
        $sm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 4);
        $asm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 5);
        $teamLeader = $this->import->get_emp('employe_table', 'employe_table_employe_id', 6);
        $dse = $this->import->get_emp('employe_table', 'employe_table_employe_id', 7);

        foreach ($model as $key => $var) {
            $models[] = $var['model_name'];
        }
        foreach ($sm as $key => $emp) {
            $smgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($asm as $key => $emp) {
            $asmgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($teamLeader as $key => $emp) {
            $teamlead[] = $emp['employe_table_employe_id'];
        }
        foreach ($dse as $key => $emp) {
            $dsegroup[] = $emp['employe_table_employe_id'];
        }

        $config = array(
            array(
                'field' => 'Inv_No[]',
                'label' => 'Inv No',
                'rules' => 'trim|required|is_unique[rtl_daily_rep.Inv_No]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s. already exist',
                ),
            ),
            array(
                'field' => 'Inv_Dt[]',
                'label' => 'Inv Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'preg_match' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => 'Model[]',
                'label' => 'Model',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $models) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s. not found'
                ),
            ),
            array(
                'field' => 'Fuel_Type[]',
                'label' => 'Fuel Type',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Clr_DESC[]',
                'label' => 'Colour Desc',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Variant_DESC[]',
                'label' => 'Variant Desc',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Engine[]',
                'label' => 'Engine no',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Chassis[]',
                'label' => 'Chassis no',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Mul_Inv_Dt[]',
                'label' => 'Mul Inv Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'callback_checkDateFormat' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => 'Customer_Name[]',
                'label' => 'Customer Name',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Team_Lead[]',
                'label' => 'Team Lead Id',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $teamlead) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'DSE[]',
                'label' => 'DSE Id',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $dsegroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'Mobile_NO[]',
                'label' => 'Cusomer Phone',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[13]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'numeric' => 'You must provide numeric value in %s.',
                    'min_length' => 'You must min 9 digits value in %s.',
                    'max_length' => 'You must max 13 digits value in %s.'
                )
            ),
            array(
                'field' => 'Enquiry_No[]',
                'label' => 'Enquiry Number',
                'rules' => 'trim|required|callback_regex_check|is_unique[rtl_daily_rep.Enquiry_No]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s already exist',
                    'callback_regex_check' => '%s Invalid Characters',
                ),
            ),
            array(
                'field' => 'Enquiry_source[]',
                'label' => 'Enquiry source',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Buyer_Type[]',
                'label' => 'Buyer Type',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'order_number[]',
                'label' => 'Order Number',
                'rules' => 'trim|required|callback_regex_check|is_unique[rtl_daily_rep.order_number]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s already exist',
                    'callback_regex_check' => 'Invalid values in %s'
                ),
            ),
            array(
                'field' => 'order_date[]',
                'label' => 'Order Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'callback_checkDateFormat' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => 'ASM_SM[]',
                'label' => 'ASM SM Id',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $asmgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'SM_ASM[]',
                'label' => 'SM ASM Id',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $smgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['response'] = false;
            $data['messsage'] = validation_errors();
            echo json_encode($data);
        } else {
            for ($i = 0; $i < count($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'Inv_No' => $this->input->post('Inv_No')[$i],
                    'Inv_Dt' => $this->input->post('Inv_Dt')[$i],
                    'Model' => $this->input->post('Model')[$i],
                    'Fuel_Type' => $this->input->post('Fuel_Type')[$i],
                    'Clr_DESC' => $this->input->post('Clr_DESC')[$i],
                    'Variant_DESC' => $this->input->post('Variant_DESC')[$i],
                    'Chassis' => $this->input->post('Chassis')[$i],
                    'Engine' => $this->input->post('Engine')[$i],
                    'Mul_Inv_Dt' => $this->input->post('Mul_Inv_Dt')[$i],
                    'Customer_Name' => $this->input->post('Customer_Name')[$i],
                    'Team_Lead' => $this->input->post('Team_Lead')[$i],
                    'DSE' => $this->input->post('DSE')[$i],
                    'Mobile_NO' => $this->input->post('Mobile_NO')[$i],
                    'Enquiry_No' => $this->input->post('Enquiry_No')[$i],
                    'Enquiry_source' => $this->input->post('Enquiry_source')[$i],
                    'Buyer_Type' => $this->input->post('Buyer_Type')[$i],
                    'order_number' => $this->input->post('order_number')[$i],
                    'order_date' => $this->input->post('order_date')[$i],
                    'ASM_SM' => $this->input->post('ASM_SM')[$i],
                    'SM_ASM' => $this->input->post('SM_ASM')[$i],
                    'sheet_name' => $this->input->post('sheet_name')[$i],
                );
            }
            $result = $this->import->insert('rtl_daily_rep', $dataImport);
            if ($result) {
                $data['response'] = true;
                $data['messsage'] = 'Successfully Imported';
            } else {
                $data['response'] = false;
                $data['message'] = 'error occered';
            }

            echo json_encode($data);
        }
    }

    public function get_delevery_enq() {
        if (isset($_POST['Inv_No'])) {
            $count = 0;
            $fast_tag = $this->input->post('FAS_TAG');
            $fastTagId = $this->input->post('fastTagId');
            $InvNoId = $this->input->post('InvNoId');
            foreach ($_POST['Inv_No'] as $key => $Inv_No) {
                $value[$key] = $Inv_No;
                $invoiceInThisTable[] = $this->import->isUnique('Inv_No', $value[$key], 'delivered_daily_rep', $InvNoId[$key]);
                $fastTagInThisTable[] = $this->import->isUnique('FAS_TAG', $fastTagId[$key], 'delivered_daily_rep', $fastTagId[$key]);

                //if invoice exitst in enquiry table
                foreach ($invoiceInThisTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['invoiceInThisTableResp'] = 1;
                    $result['invoiceInThisTabledata'] = $invoiceInThisTable;
                } else {
                    $result['invoiceInThisTableResp'] = 0;
                    $result['invoiceInThisTabledata'] = $invoiceInThisTable;
                }
                //if fast tag exitst in order table
                foreach ($fastTagInThisTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['fastTagInThisTableResp'] = 1;
                    $result['fastTagInThisTableData'] = $fastTagInThisTable;
                } else {
                    $result['fastTagInThisTableResp'] = 0;
                    $result['fastTagInThisTableData'] = $fastTagInThisTable;
                    ;
                }
            }
            echo json_encode($result);
        }
    }

    public function upload_delevery_report() {
        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'model_name');
        $sm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 4);
        $asm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 5);
        $teamLeader = $this->import->get_emp('employe_table', 'employe_table_employe_id', 6);
        $dse = $this->import->get_emp('employe_table', 'employe_table_employe_id', 7);

        foreach ($model as $key => $var) {
            $models[] = $var['model_name'];
        }
        foreach ($sm as $key => $emp) {
            $smgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($asm as $key => $emp) {
            $asmgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($teamLeader as $key => $emp) {
            $teamlead[] = $emp['employe_table_employe_id'];
        }
        foreach ($dse as $key => $emp) {
            $dsegroup[] = $emp['employe_table_employe_id'];
        }
        $config = array(
            array(
                'field' => 'Inv_No[]',
                'label' => 'Inv No',
                'rules' => 'trim|required|is_unique[delivered_daily_rep.Inv_No]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s. already exist',
                ),
            ),
            array(
                'field' => 'Inv_Dt[]',
                'label' => 'Inv Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'callback_checkDateFormat' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => 'Del_Date[]',
                'label' => 'Del Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'callback_checkDateFormat' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => 'Model[]',
                'label' => 'Model',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $models) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s. not found'
                ),
            ),
            array(
                'field' => 'Fuel_Type[]',
                'label' => 'Fuel Type',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Variant_DESC[]',
                'label' => 'Variant DESC',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Clr_DESC[]',
                'label' => 'Clr DESC',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Chassis[]',
                'label' => 'Chassis No',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Engine[]',
                'label' => 'Engine No',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Customer_Name[]',
                'label' => 'Customer Name',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'Team_Lead[]',
                'label' => 'Team Leader',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $teamlead) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s Not Found'
                ),
            ),
            array(
                'field' => 'DSE[]',
                'label' => 'DSE Leader',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $dsegroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s Not Found'
                ),
            ),
            array(
                'field' => 'Mobile_NO[]',
                'label' => 'Mobile Number',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[13]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'numeric' => 'You must provide numeric value in %s.',
                    'min_length' => 'You must min 9 digits value in %s.',
                    'max_length' => 'You must max 13 digits value in %s.'
                )
            ),
            array(
                'field' => 'Finance[]',
                'label' => 'Finance',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'INSU[]',
                'label' => 'Insurance',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'EW[]',
                'label' => 'EW',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'TV[]',
                'label' => 'TV',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'FAS_TAG[]',
                'label' => 'FAS_TAG',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'ASM[]',
                'label' => 'Asm',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $asmgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'SM[]',
                'label' => 'Sm',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $smgroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['response'] = false;
            $data['messsage'] = validation_errors();
            echo json_encode($data);
        } else {
            for ($i = 0; $i < count($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'Inv_No' => $this->input->post('Inv_No')[$i],
                    'Inv_Dt' => $this->input->post('Inv_Dt')[$i],
                    'Del_Date' => $this->input->post('Del_Date')[$i],
                    'Model' => $this->input->post('Model')[$i],
                    'Fuel_Type' => $this->input->post('Fuel_Type')[$i],
                    'Variant_DESC' => $this->input->post('Variant_DESC')[$i],
                    'Clr_DESC' => $this->input->post('Clr_DESC')[$i],
                    'Chassis' => $this->input->post('Chassis')[$i],
                    'Engine' => $this->input->post('Engine')[$i],
                    'Customer_Name' => $this->input->post('Customer_Name')[$i],
                    'Team_Lead' => $this->input->post('Team_Lead')[$i],
                    'DSE' => $this->input->post('DSE')[$i],
                    'Mobile_NO' => $this->input->post('Mobile_NO')[$i],
                    'Finance' => $this->input->post('Finance')[$i],
                    'INSU' => $this->input->post('INSU')[$i],
                    'EW' => $this->input->post('EW')[$i],
                    'TV' => $this->input->post('TV')[$i],
                    'FAS_TAG' => $this->input->post('FAS_TAG')[$i],
                    'ASM' => $this->input->post('ASM')[$i],
                    'SM' => $this->input->post('SM')[$i],
                    'sheet_name' => $this->input->post('sheet_name')[$i],
                );
            }

            $result = $this->import->insert('delivered_daily_rep', $dataImport);
            if ($result) {
                $data['response'] = true;
                $data['messsage'] = 'Successfully Imported';
            } else {
                $data['response'] = false;
                $data['message'] = 'error occered';
            }
            echo json_encode($data);
        }
    }

    public function get_canceled_rep() {
        if (isset($_POST['INV_NUM_'])) {
            $count = 0;

            $InvNoId = $this->input->post('InvNoId');
            foreach ($_POST['INV_NUM_'] as $key => $Inv_No) {
                $value[$key] = $Inv_No;
                $invoiceInInvTable[] = $this->import->isUnique('Inv_No', $value[$key], 'delivered_daily_rep', $InvNoId[$key]);
                $invoiceInThisTable[] = $this->import->isUnique('INV_NUM_', $value[$key], 'cancelled_daily_rep', $InvNoId[$key]);

                //if invoice exitst in delever table
                foreach ($invoiceInInvTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['invoiceInInvTableResp'] = 1;
                    $result['invoiceInInvTabledata'] = $invoiceInInvTable;
                } else {
                    $result['invoiceInInvTableResp'] = 0;
                    $result['invoiceInInvTabledata'] = $invoiceInInvTable;
                }
                //if fast tag exitst in order table
                foreach ($invoiceInThisTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['invoiceInThisTableResp'] = 1;
                    $result['invoiceInThisTableData'] = $invoiceInThisTable;
                } else {
                    $result['invoiceInThisTableResp'] = 0;
                    $result['invoiceInThisTableData'] = $invoiceInThisTable;
                    ;
                }
            }
            echo json_encode($result);
        }
    }

    public function upload_cancel_report() {
        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'model_name');
        $sm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 4);
        $asm = $this->import->get_emp('employe_table', 'employe_table_employe_id', 5);
        $teamLeader = $this->import->get_emp('employe_table', 'employe_table_employe_id', 6);
        $dse = $this->import->get_emp('employe_table', 'employe_table_employe_id', 7);

        foreach ($model as $key => $var) {
            $models[] = $var['model_name'];
        }
        foreach ($sm as $key => $emp) {
            $smgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($asm as $key => $emp) {
            $asmgroup[] = $emp['employe_table_employe_id'];
        }
        foreach ($teamLeader as $key => $emp) {
            $teamlead[] = $emp['employe_table_employe_id'];
        }
        foreach ($dse as $key => $emp) {
            $dsegroup[] = $emp['employe_table_employe_id'];
        }
        $config = array(
            array(
                'field' => 'INV_NUM_[]',
                'label' => 'Inv No',
                'rules' => 'trim|required|is_unique[cancelled_daily_rep.INV_NUM_]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s. already exist',
                ),
            ),
            array(
                'field' => '_INV_DATE_[]',
                'label' => 'Inv Date',
                'rules' => 'trim|required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'callback_checkDateFormat' => 'Invalid Date Format  in %s.',
                ),
            ),
            array(
                'field' => '_CUST_NAME_[]',
                'label' => 'Customer Name',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'TL[]',
                'label' => 'Team Lead',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $teamlead) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'DSE_NAME[]',
                'label' => 'DSE NAME',
                'rules' => array(
                    'trim',
                    'required',
                    'in_list[' . implode(",", $dsegroup) . ']'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found'
                ),
            ),
            array(
                'field' => 'MODEL_DESC[]',
                'label' => 'Model',
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
            array(
                'field' => 'VARIANT_DESC[]',
                'label' => 'Variant Desc',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'CONTACT_NO[]',
                'label' => 'Cusomer Phone',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[13]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'numeric' => 'You must provide numeric value in %s.',
                    'min_length' => 'You must min 9 digits value in %s.',
                    'max_length' => 'You must max 13 digits value in %s.'
                )
            ),
            array(
                'field' => 'CHASIS_NO[]',
                'label' => 'CHASIS NO',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
            array(
                'field' => 'REMARKS[]',
                'label' => 'REMARKS',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                )
            ),
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            $this->load->view('admin/uploadErrorPage', $data);
            $data['response'] = false;
            $data['messsage'] = validation_errors();
        } else {
            for ($i = 0; $i < count($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'CAN_DATE' => $this->input->post('CAN_DATE')[$i],
                    'INV_NUM_' => $this->input->post('INV_NUM_')[$i],
                    '_INV_DATE_' => $this->input->post('_INV_DATE_')[$i],
                    '_CUST_NAME_' => $this->input->post('_CUST_NAME_')[$i],
                    'TL' => $this->input->post('TL')[$i],
                    'DSE_NAME' => $this->input->post('DSE_NAME')[$i],
                    'MODEL_DESC' => $this->input->post('MODEL_DESC')[$i],
                    '_VARIANT_DESC' => $this->input->post('VARIANT_DESC')[$i],
                    'CONTACT_NO' => $this->input->post('CONTACT_NO')[$i],
                    'CHASIS_NO' => $this->input->post('CHASIS_NO')[$i],
                    'REMARKS' => $this->input->post('REMARKS')[$i],
                    'sheet_name' => $this->input->post('sheet_name')[$i],
                );
            }
            $result = $this->import->insert('cancelled_daily_rep', $dataImport);

            if ($result) {
                $data['response'] = true;
                $data['messsage'] = 'Import Successfull';
            } else {
                $data['response'] = false;
                $data['message'] = 'error occered';
            }
            echo json_encode($data);
        }
    }

    //inventory upload function model check
    public function get_inv_rep() {
        if (isset($_POST['product_code'])) {
            $count = 0;

            $prodCodeId = $this->input->post('prodCodeId');
            foreach ($_POST['product_code'] as $key => $Inv_No) {
                $value[$key] = $Inv_No;
                $invInInvTable[] = $this->import->isUnique('product_code', $value[$key], 'inventory_table', $prodCodeId[$key]);

                //if invcode exitst in inv table table
                foreach ($invInInvTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['invInInvTableResp'] = 1;
                    $result['invInInvTabledata'] = $invInInvTable;
                } else {
                    $result['invInInvTableResp'] = 0;
                    $result['invInInvTabledata'] = $invInInvTable;
                }
            }
            echo json_encode($result);
        }
    }

    public function upload_inv_exell() {
        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'product_code');

        foreach ($model as $key => $var) {
            $models[] = $var['product_code'];
        }

        $config = array(
            array(
                'field' => 'product_code[]',
                'label' => 'Product Code',
                'rules' => 'trim|required|is_unique[inventory_table.product_code]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s. already exist',
                    'regex_match' => 'only undersocre allowed in %s'
                ),
            ),
            array(
                'field' => 'model_name[]',
                'label' => 'Model Name',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'regex_match' => 'only undersocre allowed in %s'
                )
            ),
            array(
                'field' => 'variant[]',
                'label' => 'variant Name',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'sheet_name[]',
                'label' => 'sheet Name',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['response'] = false;
            $data['messsage'] = validation_errors();
            echo json_encode($data);
        } else {
            for ($i = 0; $i < count($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'product_code' => strtoupper(underscore($this->input->post('product_code')[$i])),
                    'model_name' => strtoupper(underscore($this->input->post('model_name')[$i])),
                    'variant' => $this->input->post('variant')[$i],
                );
            }
            $result = $this->import->insert('inventory_table', $dataImport);

            if ($result) {
                $data['response'] = true;
                $data['messsage'] = 'Import Successfull';
            } else {
                $data['response'] = false;
                $data['message'] = 'error occered';
            }
            echo json_encode($data);
        }
    }

    //get_col_rep to validate product code in table
    public function get_col_rep() {
        if (isset($_POST['product_code'])) {
            $count = 0;

            $prodCodeId = $this->input->post('prodCodeId');
            foreach ($_POST['product_code'] as $key => $Inv_No) {
                $value[$key] = $Inv_No;
                $invInInvTable[] = $this->import->isUnique('product_code', $value[$key], 'inventory_table', $prodCodeId[$key]);

                //if invcode exitst in inv table table
                foreach ($invInInvTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['invInInvTableResp'] = 1;
                    $result['invInInvTabledata'] = $invInInvTable;
                } else {
                    $result['invInInvTableResp'] = 0;
                    $result['invInInvTabledata'] = $invInInvTable;
                }
            }
            echo json_encode($result);
        }
    }

    //ulpad upload_color_exell
    public function upload_color_exell() {

        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'product_code');

        foreach ($model as $key => $var) {
            $models[] = $var['product_code'];
        }

        $config = array(
            array(
                'field' => 'product_code[]',
                'label' => 'product code',
                'rules' => 'trim|required',
                'in_list[' . implode(",", $models) . ']|callback_validateRegex',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found in product table.',
                    'regex_match' => 'only underscore allowd in  %s  .'
                )
            ),
            array(
                'field' => 'color_code[]',
                'label' => 'Color Code',
                'rules' => array(
                    'trim',
                    'required',
                    'callback_validateRegex'
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'regex_match' => 'only underscore allowd in  %s  .'
                ),
            ),
            array(
                'field' => 'color[]',
                'label' => 'Color',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'sheet_name[]',
                'label' => 'sheet Name',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['response'] = false;
            $data['messsage'] = validation_errors();
            echo json_encode($data);
        } else {
            for ($i = 0; $i < count($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'prod_code' => strtoupper(underscore($this->input->post('product_code')[$i])),
                    'color_code' => strtoupper(underscore($this->input->post('color_code')[$i])),
                    'color' => $this->input->post('color')[$i],
                );
            }
            $result = $this->import->insert('model_color_matrix', $dataImport);

            if ($result) {
                $data['response'] = true;
                $data['messsage'] = 'Import Successfull';
            } else {
                $data['response'] = false;
                $data['message'] = 'error occered';
            }
            echo json_encode($data);
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

    public function get_stock_rep() {
        if (isset($_POST['model_name'])) {
            $count = 0;
            $MODEL_CODE_id = $this->input->post('MODEL_CODE_id');
            $COLOR = $this->input->post('COLOR');
            $COLOR_id = $this->input->post('COLOR_id');
            $COLORCODE = $this->input->post('COLORCODE');
            $COLORCODE_id = $this->input->post('COLORCODE_id');
            $CHASSISNO = $this->input->post('CHASSISNO');
            $CHASSISNO_id = $this->input->post('CHASSISNO_id');

            foreach ($_POST['MODEL_CODE'] as $key => $Inv_No) {
                $value[$key] = $Inv_No;
                $modelInTable[] = $this->import->isUnique('product_code', $value[$key], 'inventory_table', $MODEL_CODE_id[$key]);
                $colorInTable[] = $this->import->isUnique('color', $COLOR[$key], 'model_color_matrix', $COLOR_id[$key]);
                $colorCodeInTable[] = $this->import->isUnique('color_code', $COLORCODE[$key], 'model_color_matrix', $COLORCODE_id[$key]);
                $chasisInTable[] = $this->import->isUnique('Chassis_No', $CHASSISNO[$key], 'stock', $CHASSISNO_id[$key]);

                //if Model exitst in inv table table
                foreach ($modelInTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['modelInTableResp'] = 1;
                    $result['modelInTabledata'] = $modelInTable;
                } else {
                    $result['modelInTableResp'] = 0;
                    $result['modelInTabledata'] = $modelInTable;
                }
                //if Color exitst in inv Color table
                foreach ($colorInTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['colorInTableResp'] = 1;
                    $result['colorInTabledata'] = $colorInTable;
                } else {
                    $result['colorInTableResp'] = 0;
                    $result['colorInTabledata'] = $colorInTable;
                }
                //if Color code exitst in inv Color table
                foreach ($colorCodeInTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['colorCodeInTableResp'] = 1;
                    $result['colorCodeInTabledata'] = $colorCodeInTable;
                } else {
                    $result['colorCodeInTableResp'] = 0;
                    $result['colorCodeInTabledata'] = $colorCodeInTable;
                }
                //if Chasis number exitst in inv stock table
                foreach ($chasisInTable as $row) {
                    if ($row['response'] == 1) {
                        $count++;
                    }
                }
                if ($count > 0) {
                    $result['chasisInTableResp'] = 1;
                    $result['chasisInTabledata'] = $chasisInTable;
                } else {
                    $result['chasisInTableResp'] = 0;
                    $result['chasisInTabledata'] = $chasisInTable;
                }
            }
            echo json_encode($result);
        }
    }

    public function upload_stock_exell() {
        $result = array();
        $sheetName[] = $this->input->post('sheet_name');
        $model = $this->import->get_details('inventory_table', 'product_code');

        foreach ($model as $key => $var) {
            $models[] = $var['product_code'];
        }

        $config = array(
            array(
                'field' => 'MUL_INV_DATE[]',
                'label' => 'MUL INV DATE',
                'rules' => 'trim|required',
                'required|callback_checkDateFormat',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'in_list' => '%s not found in product table.',
                    'checkDateFormat' => 'Not valid Date in  %s  .'
                )
            ),
            array(
                'field' => 'variant[]',
                'label' => 'variant name',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'MODEL_CODE[]',
                'label' => 'model Code',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'COLOR[]',
                'label' => 'Color',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'COLORCODE[]',
                'label' => 'Color',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'MODELYEAR[]',
                'label' => 'MODEL YEAR',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'CHASSISNO[]',
                'label' => 'CHASSIS NO ',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'ENGINE_NO[]',
                'label' => 'ENGINE NO ',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'CHASSIS_CODE[]',
                'label' => 'CHASSIS CODE',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'STOCK_LOCATION[]',
                'label' => 'STOCK LOCATION ',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'STATUS[]',
                'label' => 'STATUS',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'INVOICE_NUM[]',
                'label' => 'INVOICE NUM',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'REMARKS[]',
                'label' => 'REMARKS',
                'rules' => array(
                    'trim',
                ),
            ),
            array(
                'field' => 'sheet_name[]',
                'label' => 'sheet Name',
                'rules' => array(
                    'trim',
                    'required',
                ),
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['response'] = false;
            $data['messsage'] = validation_errors();
            echo json_encode($data);
        } else {
            for ($i = 0; $i < count($this->input->post('sheet_name')); $i++) {
                $dataImport[] = array(
                    'Mul_inv_date' => $this->input->post('MUL_INV_DATE')[$i],
                    'Model' => strtoupper(underscore($this->input->post('model_name')[$i])),
                    'Variant' => $this->input->post('variant')[$i],
                    'Model_Code' => $this->input->post('MODEL_CODE')[$i],
                    'Colour' => $this->input->post('COLOR')[$i],
                    'Colour_Code' => strtoupper(underscore($this->input->post('COLORCODE')[$i])),
                    'Model_Year' => $this->input->post('MODELYEAR')[$i],
                    'Chassis_No' => $this->input->post('CHASSISNO')[$i],
                    'Engine_No' => $this->input->post('ENGINE_NO')[$i],
                    'Chassis_Code' => $this->input->post('CHASSIS_CODE')[$i],
                    'stock_location' => $this->input->post('STOCK_LOCATION')[$i],
                    'stock_status' => $this->input->post('STATUS')[$i],
                    'txn_no' => $this->input->post('Transaction_Num')[$i],
                    'stock_invoice_num' => $this->input->post('INVOICE_NUM')[$i],
                    'remarks' => $this->input->post('REMARKS')[$i],
                );
                $result = $this->import->insert('stock', $dataImport);
                
                if ($result) {
                    $data['response'] = true;
                    $data['messsage'] = 'Import Successfull';
                } else {
                    $data['response'] = false;
                    $data['message'] = 'error occered';
                }
            }
            echo json_encode($data);
        }
    }

}
