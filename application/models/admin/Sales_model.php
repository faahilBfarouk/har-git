<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_area_model', 'admin_model');
    }

    function get_txn_no() {
        $result = $this->db->select_max('txn_no')
                        ->get('stock')->result_array();
        $num_rows = $this->db->count_all_results('stock');

        if ($num_rows > 0) {
            $txnId = (int) $result[0]['txn_no'] + 1;
        } else {
            $txnId = 1000;
        }
        return $txnId;
    }

    function get_details($table) {
        $this->db->distinct('model_name');
        $select = array(
            'model_name'
        );
        $this->db->select($select);
        $this->db->order_by('model_name');
        return $this->db->get($table)->result_array();
    }

    function get_status($table) {
        return $this->db->get($table)->result_array();
    }

    function get_colors($table, $model) {
        $this->db->where(array('prod_code' => $model));
        return $this->db->get($table)->result_array();
    }

    function get_selected_details($model, $table) {
        $select = array(
            'variant',
            'product_code'
        );
        $this->db->select($select);
        return $this->db->get_where($table, array('model_name' => $model))
                        ->result_array();
    }

    function getmodelcode($model, $varient) {
        $where = array(
            'model_name' => $model,
            'variant' => $varient
        );
        $this->db->where($where);
        return $this->db->get('inventory_table')->result_array();
    }

    function addStock() {
        for ($i = 0; $i < count($this->input->post('selectModel')); $i++) {
            $Mul_inv_date = (string) $this->input->post('invDate');
            $Model = $this->input->post('selectModel')[$i];
            $varient = $this->input->post('selectVariant')[$i];
            $Model_Code = $this->input->post('modelCode')[$i];
            $Colour = $this->input->post('colorName')[$i];
            $Colour_Code = $this->input->post('colorCode')[$i];
            $Model_Year = $this->input->post('model')[$i];
            $Chassis_No = $this->input->post('chasisNo')[$i];
            $Engine_No = $this->input->post('engineNo')[$i];
            $Chassis_Code = $this->input->post('chasisCode')[$i];
            $Ageing = $this->input->post('ageing')[$i];
            $stock_location = $this->input->post('location')[$i];
            $Status = $this->input->post('status')[$i];
            $txn_no = $this->input->post('txnNo');
            $ENUINV = $this->input->post('ENUINV')[$i];
            $remarks = $this->input->post('remarks')[$i];
            $data[] = array(
                'Mul_inv_date' => $Mul_inv_date,
                'Model' => $Model,
                'Variant' => $varient,
                'Model_Code' => $Model_Code,
                'Colour' => $Colour,
                'Colour_Code' => $Colour_Code,
                'Model_Year' => $Model_Year,
                'Chassis_No' => $Chassis_No,
                'Engine_No' => $Engine_No,
                'Chassis_Code' => $Chassis_Code,
                'Ageing' => $Ageing,
                'stock_Status' => $Status,
                'stock_location' => $stock_location,
                'stock_invoice_num' => $ENUINV,
                'txn_no' => $txn_no,
                'remarks' => $remarks,
            );
        }

        if ($this->db->insert_batch('stock', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_stock_sum($filter) {
        $select = array('Model');
        $this->db->where('stock_Status', $filter);
        $table = 'stock';
        $this->db->select($select);
        $data = $this->db->get($table)->result_array();
        $countArr = array();
        foreach ($data as $d) {
            $id = $d['Model'];
            $countVar = 0;
            foreach ($data as $var) {
                if ($id == $var['Model']) {
                    $countVar++;
                }
                $countArr[(string) $d['Model']] = $countVar;
            }
        }

        return $countArr;
    }

    function stockVariantSplitUp($model, $filter) {
        $select = array('Variant');
        $this->db->where('stock_Status', $filter);
        $this->db->where('Model', $model);
        $table = 'stock';
        $this->db->select($select);
        $data = $this->db->get($table)->result_array();
        $countArr = array();
        foreach ($data as $d) {
            $id = $d['Variant'];
            $countVar = 0;
            foreach ($data as $var) {
                if ($id == $var['Variant']) {
                    $countVar++;
                }
                $countArr[(string) $d['Variant']] = $countVar;
            }
        }

        return $countArr;
    }

    function stockColourSplitUp($model, $filter) {
        $select = array('Colour');
        $this->db->where('stock_Status', $filter);
        $this->db->where('Model', $model);
        $table = 'stock';
        $this->db->select($select);
        $data = $this->db->get($table)->result_array();
        $countArr = array();
        foreach ($data as $d) {
            $id = $d['Colour'];
            $countVar = 0;
            foreach ($data as $var) {
                if ($id == $var['Colour']) {
                    $countVar++;
                }
                $countArr[(string) $d['Colour']] = $countVar;
            }
        }

        return $countArr;
    }

    function stockLocationSplitUp($model, $filter) {
        $select = array('stock_location', 'stock_location.Status');
        $this->db->where('stock_Status', $filter);
        $this->db->where('Model', $model);
        $table = 'stock';
        $this->db->join('stock_location', 'stock_location.Status_ID = stock.stock_location');
        $this->db->select($select);
        $data = $this->db->get($table)->result_array();
        $countArr = array();
        foreach ($data as $d) {
            $id = $d['Status'];
            $countVar = 0;
            foreach ($data as $var) {
                if ($id == $var['Status']) {
                    $countVar++;
                }
                $countArr[(string) $d['Status']] = $countVar;
            }
        }

        return $countArr;
    }

    function listStock($date) {
        if (isset($_POST['date']))
            $date = $this->input->post('date');
        $this->db->join('stock_location', 'stock_location.Status_ID = stock.stock_location');
        $this->db->join('status', 'status.status_id = stock.stock_status');
        $this->db->where('Mul_inv_date >=', $date);
        return $this->db->get('stock')->result_array();
    }

    function getStockDetails($id) {
        $this->db->join('stock_location', 'stock_location.Status_ID = stock.stock_location');
        $this->db->join('status', 'status.status_id = stock.stock_status');
        return $this->db->where('Stock_ID', $id)->get('stock')->result_array();
    }

    function updateStock($stockId) {
        $data = array(
            'Engine_No' => $this->input->post('engineNo'),
            'Chassis_Code' => $this->input->post('chasisCode'),
            'Ageing' => $this->input->post('ageing'),
            'stock_Status' => $this->input->post('Stockstatus'),
            'stock_location' => $this->input->post('location'),
            'remarks' => $this->input->post('remarks'),
        );

        $this->db->where('Stock_ID', $stockId);

        if ($this->db->update('stock', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function loadStock() {
        $data['stock'] = $this->get_details('inventory_table');
        $where = array(
            'status_type ' => 1
        );
        $this->db->where($where);
        $data['status'] = $this->db->get('status')->result_array();
        return $data;
    }

    function loadVarient() {
        $model = $this->input->post('model');
        return $this->db->where(array('model_name' => $model))->get('inventory_table')
                        ->result_array();
    }

    function loadChasisNo() {
        $where = array(
            'Model_Code' => $this->input->post('Prod_Code'),
            'Colour_Code' => $this->input->post('Color_Code'),
            'stock_status' => $this->input->post('filter'),
        );
        $this->db->where($where);
        return $this->db->get('stock')->result_array();
    }

    function loadChasisNoDiffFilters($prod, $col, $filter) {
        $where = array(
            'Model_Code' => $prod,
            'Colour_Code' => $col,
            'stock_status' => $filter
        );
        $this->db->where($where);
        return $this->db->get('stock')->result_array();
    }

    function loadStocks() {
        $filter = $this->input->post('filter');
        $this->db->where('Model_Code', $this->input->post('Prod_Code'));
        $this->db->where('Colour_Code', $this->input->post('Color_Code'));
        $this->db->where("stock_status!=", 2);
        $this->db->where("stock_status!=", 4);
        $this->db->where("stock_status!=", 6);
        $this->db->where("stock_status!=", 7);

        return $this->db->get('stock')->result_array();
    }

    function loadorderStatus() {
        $where = array(
            'create_demand_status ' => 1
        );
        $this->db->where($where);
        $data['status'] = $this->db->get('status')->result_array();
        return $data;
    }

    function get_stock_id($prod_code, $chassis_no) {
        $where = array(
            'Model_Code' => $prod_code,
            'Chassis_No' => $chassis_no
        );
        $this->db->select('Stock_ID');
        $this->db->where($where);
        return $this->db->get('stock')->result_array();
    }

    function insert_order($table, $data, $filter) {
        $update_filter = array('stock_status' => $filter);
        $where = array(
            'Model_Code' => $data['prod_code'],
            'Chassis_No' => $data['chassis_no']
        );
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 
        $this->db->insert($table, $data);
        $this->db->where($where);
        $this->db->update('stock', $update_filter);
        $this->db->trans_complete(); # Completing transaction
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function insertDemand($table, $data, $filter) {
        $update_filter = array('stock_status' => $filter);
        $update = array(
            'Model_Code' => $data['stock_demand_prod_code'],
            'Colour_Code' => $data['stock_demand_booked_colour_code']
        );

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        $demand_message = array(
            'demand_message_emp_d' => $this->session->userdata['user_employee_id'],
            'demand_message_demand_id' => $insert_id
        );
        $this->db->insert('demand_message', $demand_message);

        $this->db->where($update);
        $this->db->update('stock', $update_filter);
        $this->db->trans_complete(); # Completing transaction
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $insert_id;
        }
    }

    function demandmessage() {
        $result = [];
        $select = array(
            'stock_demand_prod_code',
            'stock_demand_booked_colour_code',
            'stock_demand_booked_colour',
            'demand_message_id',
            'demand_message_emp_d',
            'demand_message_emp_d',
            'stock_demand_demand_date',
            'stock_demand_exp_date'
        );
        $this->db->select($select);
        $this->db->join('demand_message', 'demand_message_demand_id = stock_demand_dable.stock_demand_id', 'inner');
        $this->db->order_by('stock_demand_id', 'DESC');
        $this->db->limit(5);
        $stkDmd = $this->db->get_where('stock_demand_dable', array('stock_demand_status' => 1))->result_array();
        foreach ($stkDmd as $key => $value) {
            $data[$value['demand_message_id']]['demand_date'] = $value['stock_demand_demand_date'];
            $data[$value['demand_message_id']]['exp_date'] = $value['stock_demand_exp_date'];
            $data[$value['demand_message_id']]['stock_demand_booked_colour'] = $value['stock_demand_booked_colour'];
            $data[$value['demand_message_id']]['stock_demand_prod_code'] = $value['stock_demand_prod_code'];
            $data[$value['demand_message_id']]['stock_demand_prod_name'] = $this->db->get_where('inventory_table', array('product_code' => $value["stock_demand_prod_code"]))->result_array()[0]['model_name'];
            $data[$value['demand_message_id']]['stock_demand_prod_varinet'] = $this->db->get_where('inventory_table', array('product_code' => $value["stock_demand_prod_code"]))->result_array()[0]['variant'];
            $data[$value['demand_message_id']]['img'] = $this->db->get_where('model_color_matrix', array('prod_code' => $value["stock_demand_prod_code"], 'color_code' => $value["stock_demand_booked_colour_code"]))->result_array()[0]['model_img_url'];
            $data[$value['demand_message_id']]['emp'] = $this->db->get_where('employe_table', array('employe_table_employe_id' => $value["demand_message_emp_d"]))->result_array()[0]['employe_table_employe_name'];
            $data[$value['demand_message_id']]['emp_id'] = $this->db->get_where('employe_table', array('employe_table_employe_id' => $value["demand_message_emp_d"]))->result_array()[0]['employe_table_employe_id'];
            $result[] = array(
                'demand_date' => $data[$value['demand_message_id']]['demand_date'],
                'exp_date' => $data[$value['demand_message_id']]['exp_date'],
                'stock_demand_booked_colour' => $data[$value['demand_message_id']]['stock_demand_booked_colour'],
                'stock_demand_prod_code' => $data[$value['demand_message_id']]['stock_demand_prod_code'],
                'stock_demand_prod_name' => $data[$value['demand_message_id']]['stock_demand_prod_name'],
                'stock_demand_prod_varinet' => $data[$value['demand_message_id']]['stock_demand_prod_varinet'],
                'img' => $data[$value['demand_message_id']]['img'],
                'emp' => $data[$value['demand_message_id']]['emp'],
                'user_emp_id' => $this->session->userdata['user_employee_id'],
                'user_emp_name' => $this->session->userdata['user_name']
            );
        }

        return $result;
    }

    function count_message() {
        $this->db->select('stock_demand_id');
        $this->db->from('stock_demand_dable');
        $this->db->where('stock_demand_status = 1');
        return $num_results = $this->db->count_all_results();
    }

    function loadDemand() {
        $this->db->where('stock_demand_status = 1');
        return $this->db->get('stock_demand_dable')->result_array();
    }

    function ListDemand($id) {
        $stock = $this->db->get_where('stock_demand_dable', array('stock_demand_id' => $id))->result_array();
        $where = array(
            'product_code' => $stock[0]['stock_demand_prod_code'],
                //     'Colour_Code' => $stock[0]['stock_demand_booked_colour_code']
        );
        $this->db->where($where);
        $details = $this->db->get('inventory_table')->result_array();

        $data['demand'] = $stock;
        $data['details'] = $details;
        $where = array(
            'status_type ' => 1
        );
        $this->db->where($where);
        $data['status'] = $this->db->get('status')->result_array();
        return $data;
        // return $data;
    }

    function demandToBooking($table, $data, $filter) {
        $update_filter = array('stock_status' => $filter);
        $convert_filter = array('stock_status' => 2);
        $update_demand_filter = array('stock_demand_status' => 0); //disable demand
        $update_demand_id = array('stock_demand_id' => $this->input->post('demandId'));




        $where = array(
            'Model_Code' => $data['prod_code'],
            'Chassis_No' => $data['chassis_no']
        );
        $converWhere = array(
            'Model_Code' => $data['prod_code'],
            'Colour_Code' => $data['booked_colour_code'],
            'stock_status' => 3
        );
        $demandWhere = array(
            'stock_demand_prod_code' => $data['prod_code'],
            'stock_demand_booked_colour_code' => $data['booked_colour_code'],
            'stock_demand_status' => 1
        );

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 
        $this->db->insert($table, $data); //insert in order table;

        $this->db->where($update_demand_id); //set demand to 0
        $this->db->update('stock_demand_dable', $update_demand_filter);

        $this->db->where($where); //change demand status in stock table
        $this->db->update('stock', $update_filter);

        $this->db->select('stock_demand_id'); //check if demand exist
        $this->db->from('stock_demand_dable');
        $this->db->where($demandWhere);
        $num_results = $this->db->count_all_results();
        if ($num_results < 1) {
            $this->db->where($converWhere); //if not exist change to marked
            $this->db->update('stock', $convert_filter);
        }
        $this->db->trans_complete(); # Completing transaction
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function recursiveDaily($empID, $filter, $fromDate, $toDate) {



        $select = array(
            'employe_table_id',
            'employe_table_employe_id',
            'employe_table_employe_name',
            'employe_table_employe_group_id'
        );
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');

        $role = $filter;
        $data = array();
        $AgentEnq = 'Team_Lead_Name';
        $AgentBkg = 'TEAM_LEAD_NAME';
        $AgentRtl = 'Team_Lead';
        $AgentDel = 'Team_Lead';
        $AgentCan = 'TL';

        $emp = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => $role, 'employe_table_employe_id' => $empID, 'employe_table_employe_status' => 1))->result_array();
        $start_date = $fromDate;
        $end_date = $toDate;
        if ($filter == '5') {
            $AgentEnq = 'ASM';
            $AgentBkg = 'ASM_SM';
            $AgentRtl = 'ASM_SM';
            $AgentDel = 'ASM';
            $AgentCan = 'TL'; //ASM AND SM DATA NOT AVAILABLE
        } elseif ($filter == '7') {
            $AgentEnq = 'DSE_Name';
            $AgentBkg = 'EMP_NAME';
            $AgentRtl = 'DSE';
            $AgentDel = 'DSE';
            $AgentCan = 'DSE_NAME';
        } elseif ($filter == '4') {
            $AgentEnq = 'SM';
            $AgentBkg = 'SM_ASM';
            $AgentRtl = 'SM_ASM';
            $AgentDel = 'SM';
            $AgentCan = 'TL';
        }


        $employe_table_employe_id = $emp[0]['employe_table_employe_id'];
        $EmpNamewhere = ("Enquiry_Date BETWEEN '$start_date' AND '$end_date' AND $AgentEnq = $employe_table_employe_id");
        $countBkgWhere = ("ORDER_DATE BETWEEN '$start_date' AND '$end_date' AND $AgentBkg = $employe_table_employe_id");
        $countRtlWhere = ("Inv_Dt BETWEEN '$start_date' AND '$end_date' AND $AgentRtl = $employe_table_employe_id");
        $countDelWhere = ("Del_Date BETWEEN '$start_date' AND '$end_date' AND $AgentDel = $employe_table_employe_id");
        $countCanWhere = ("CAN_DATE BETWEEN '$start_date' AND '$end_date' AND $AgentCan = $employe_table_employe_id");
        $countEnq[] = array(
            'emp name' => $emp[0]['employe_table_employe_name'],
            'countEnq' => $this->db->get_where('enquiry_daily_rep', $EmpNamewhere)->num_rows(),
            'countBkg' => $this->db->get_where('booking_daily_rep', $countBkgWhere)->num_rows(),
            'countRtl' => $this->db->get_where('rtl_daily_rep', $countRtlWhere)->num_rows(),
            'countDel' => $this->db->get_where('delivered_daily_rep', $countDelWhere)->num_rows(),
            'countCan' => $this->db->get_where('cancelled_daily_rep', $countCanWhere)->num_rows()
        );

        $data['tllist'] = $emp;
        $data['rep'] = $countEnq;

        return $data;
    }

    function recursiveModelReport($fromDate, $toDate, $filter, $empID) {


        $model_list = array();
        $countArr2 = array();
        $start_date = $fromDate;
        $end_date = $toDate;
        $rep = array('enquiry_daily_rep', 'booking_daily_rep', 'rtl_daily_rep', 'delivered_daily_rep', 'cancelled_daily_rep');


        $AgentEnq = 'DSE_Name';
        $AgentBkg = 'EMP_NAME';
        $AgentRtl = 'DSE';
        $AgentDel = 'DSE';
        $AgentCan = 'DSE_NAME';

        foreach ($rep as $table) {
            if ($table == 'enquiry_daily_rep') {
                $colModel = 'Model_Name';
                $colVar = 'Variant_name';
            }
            if ($table == 'booking_daily_rep') {
                $colModel = 'MODEL_desc';
                $colVar = 'Variant_desc';
            }
            if ($table == 'rtl_daily_rep') {
                $colModel = 'Model';
                $colVar = 'Variant_desc';
            }
            if ($table == 'delivered_daily_rep') {
                $colModel = 'Model';
                $colVar = 'Variant_desc';
            }
            if ($table == 'cancelled_daily_rep') {
                $colModel = 'MODEL_desc';
                $colVar = 'Variant_desc';
            }

            if ($table == 'enquiry_daily_rep') {
                $where = ("enquiry_date BETWEEN '$start_date' AND '$end_date' AND $AgentEnq =$empID ");
            }
            if ($table == 'booking_daily_rep') {
                $where = ("order_date BETWEEN '$start_date' AND '$end_date' AND $AgentBkg = $empID");
            }
            if ($table == 'rtl_daily_rep') {
                $where = $where = ("Inv_Dt BETWEEN '$start_date' AND '$end_date' AND $AgentRtl = $empID ");
            }
            if ($table == 'delivered_daily_rep') {
                $where = $where = ("Del_Date BETWEEN '$start_date' AND '$end_date' AND $AgentDel = $empID");
            }
            if ($table == 'cancelled_daily_rep') {
                $where = ("can_date BETWEEN '$start_date' AND '$end_date' AND $AgentCan = $empID");
            }

            $this->db->distinct();
            $this->db->select($colModel);
            $this->db->order_by($colModel, 'ASC');
            $model_list = $this->db->get_where($table, $where)->result_array();


            foreach ($model_list as $l) {


                $model = $l[$colModel];
                $this->db->where($colModel, $model);
                if ($table == 'enquiry_daily_rep') {
                    $this->db->where("$AgentEnq", "$empID");
                }
                if ($table == 'booking_daily_rep') {
                    $this->db->where("$AgentBkg", "$empID");
                }
                if ($table == 'rtl_daily_rep') {
                    $this->db->where("$AgentRtl", "$empID");
                }
                if ($table == 'delivered_daily_rep') {
                    $this->db->where("$AgentDel", "$empID");
                }
                if ($table == 'cancelled_daily_rep') {
                    $this->db->where("$AgentCan", "$empID");
                }
                $this->db->from($table);
                $count = $this->db->count_all_results();


                $select = array(
                    $colVar
                );

                if ($table == 'enquiry_daily_rep') {
                    $where = ("enquiry_date BETWEEN '$start_date' AND '$end_date' and $colModel = '$model' AND $AgentEnq = $empID");
                }
                if ($table == 'booking_daily_rep') {
                    $where = ("order_date BETWEEN '$start_date' AND '$end_date' and $colModel = '$model' AND $AgentBkg = $empID");
                }
                if ($table == 'rtl_daily_rep') {
                    $where = ("inv_dt BETWEEN '$start_date' AND '$end_date' and $colModel = '$model' AND $AgentRtl = $empID");
                }
                if ($table == 'delivered_daily_rep') {
                    $where = ("del_date BETWEEN '$start_date' AND '$end_date'and $colModel = '$model' AND $AgentDel = $empID");
                }
                if ($table == 'cancelled_daily_rep') {
                    $where = ("can_date BETWEEN '$start_date' AND '$end_date'and $colModel = '$model' AND $AgentCan = $empID");
                }

                $this->db->select($select);
                $this->db->order_by($colVar, 'ASC');
                $datas = $this->db->get_where($table, $where)
                        ->result_array();

                $countArr = array();


                foreach ($datas as $d) {
                    $id = $d[$colVar];
                    $countVar = 0;
                    foreach ($datas as $var) {
                        if ($id == $var[$colVar]) {
                            $countVar++;
                        }
                        $countArr[(string) $d[$colVar]] = $countVar;
                    }
                }



                $countArr2[] = array(
                    'table' => $table,
                    'values' => array(
                        'model' => $model,
                        'count' => $count,
                        'var' => $countArr,
                    )
                );
            }
        }
        $data['rep'] = $countArr2;


        return $data;
    }

    function salesJsoniser($fromDate, $toDate, $model, $table) {

        $countArr2 = array();
        $start_date = $fromDate;
        $end_date = $toDate;
        $colModel = '';
        $colVar = '';
        $user_data = $this->session->userdata();
        $empID = $user_data['user_employee_id'];
        $filter = $user_data['employee_hierarchy'];


        if ($table == 'enquiry_daily_rep') {
            $colModel = 'Model_Name';
            $colVar = 'Variant_name';
        }
        if ($table == 'booking_daily_rep') {
            $colModel = 'MODEL_desc';
            $colVar = 'Variant_desc';
        }
        if ($table == 'rtl_daily_rep') {
            $colModel = 'Model';
            $colVar = 'Variant_desc';
        }
        if ($table == 'delivered_daily_rep') {
            $colModel = 'Model';
            $colVar = 'Variant_desc';
        }
        if ($table == 'cancelled_daily_rep') {
            $colModel = 'MODEL_desc';
            $colVar = 'Variant_desc';
        }
        $select = array(
            $colModel, $colVar
        );
        $this->db->order_by($colModel, 'ASC');
        if ($table == 'enquiry_daily_rep') {
            $where = ("enquiry_date BETWEEN '$start_date' AND '$end_date' and $colModel = '$model'");
        }
        if ($table == 'booking_daily_rep') {
            $where = ("order_date BETWEEN '$start_date' AND '$end_date' and $colModel = '$model'");
        }
        if ($table == 'rtl_daily_rep') {
            $where = ("inv_dt BETWEEN '$start_date' AND '$end_date' and $colModel = '$model'");
        }
        if ($table == 'delivered_daily_rep') {
            $where = ("del_date BETWEEN '$start_date' AND '$end_date'and $colModel = '$model'");
        }
        if ($table == 'cancelled_daily_rep') {
            $where = ("can_date BETWEEN '$start_date' AND '$end_date'and $colModel = '$model'");
        }

        if ($filter == '5') {
            $AgentEnq = 'ASM';
            $AgentBkg = 'ASM_SM';
            $AgentRtl = 'ASM_SM';
            $AgentDel = 'ASM';
            $AgentCan = 'TL'; //ASM AND SM DATA NOT AVAILABLE
        } elseif ($filter == '6') {
            $AgentEnq = 'Team_Lead_Name';
            $AgentBkg = 'TEAM_LEAD_NAME';
            $AgentRtl = 'Team_Lead';
            $AgentDel = 'Team_Lead';
            $AgentCan = 'TL';
        } elseif ($filter == '7') {
            $AgentEnq = 'DSE_Name';
            $AgentBkg = 'EMP_NAME';
            $AgentRtl = 'DSE';
            $AgentDel = 'DSE';
            $AgentCan = 'DSE_NAME';
        } elseif ($filter == '4') {
            $AgentEnq = 'SM';
            $AgentBkg = 'SM_ASM';
            $AgentRtl = 'SM_ASM';
            $AgentDel = 'SM';
            $AgentCan = 'TL';
        }


        $this->db->where($where);
        if ($table == 'enquiry_daily_rep') {
            $this->db->where("$AgentEnq", "$empID ");
        }
        if ($table == 'booking_daily_rep') {
            $this->db->where("$AgentBkg", "$empID");
        }
        if ($table == 'rtl_daily_rep') {
            $this->db->where("$AgentRtl", "$empID");
        }
        if ($table == 'delivered_daily_rep') {
            $this->db->where("$AgentDel", "$empID");
        }
        if ($table == 'cancelled_daily_rep') {
            $this->db->where("$AgentCan", "$empID");
        }
        $this->db->select($select);
        //$this->db->group_by($colModel);

        $datas = $this->db->get($table)->result_array();
        $countArr = array();


        foreach ($datas as $d) {
            $id = $d[$colVar];
            $countVar = 0;

            if ($d[$colModel] == $model) {
                foreach ($datas as $var) {
                    if ($id == $var[$colVar]) {
                        $countVar++;
                    }
                    $countArr[(string) $d[$colVar]] = $countVar;
                }
            }
        }


        return $countArr;
    }

    function sales_generate_rep_each_emp($empID, $from, $to, $field) {
        $select = array(
            'target_table_id',
            'target_table_emp_id',
            'employe_table_employe_name',
            'target_table_product',
            'target_table_product_qty',
            'target_table_exp_date'
        );
        $col = 'target_table_emp_id';
        $Where = ("DATE (target_table_create) BETWEEN '$from' AND '$to'  AND $col = $empID");
        $data = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $Where)
                ->result_array();
        $countArr = array();
        $countArr2 = array();

// TO GET TOTAL IF TOTAL TARGET  IS SET OR NOT

        foreach ($data as $k => $d) {
            $id = $d['employe_table_employe_name'];
            $countVar = 0;


            foreach ($data as $k => $var) {
                if ($id == $var['employe_table_employe_name']) {
                    if ($var['target_table_product'] != 'Total_Target') {
                        $countVar = $countVar + $var['target_table_product_qty'];
                    }
                }
                $countArr[(string) $d['employe_table_employe_name']] = $countVar;
            }



            $countArr['id'] = $d['target_table_emp_id'];
            $countArr2[$id] = $countArr;

            $countArr = null;
        }




// TO GET TOTAL TARGET
        foreach ($data as $key => $value) {
            $theID = $value['target_table_emp_id'];
            $arr = $this->db->get_where('target_table', array('target_table_product' => 'Total_Target', 'target_table_emp_id' => $theID))
                    ->result_array();

            if (!empty($arr)) {
                end($arr);         // move the internal pointer to the end of the array
                $key = $last = key($arr);

                $countArr2[$value['employe_table_employe_name']]['total'] = $arr[$last]['target_table_product_qty'];
            }
        }
// TO GET ACHIEVED

        switch ($field) {
            case 5:
                $col = 'ASM_SM';
                break;
            case 6:
                $col = 'Team_Lead';
                break;
            case 7:
                $col = 'DSE';
                break;
            case 'asm':
                $col = 'ASM_SM';
                break;
            case 'tl':
                $col = 'Team_Lead';
                break;
            case 'dse':
                $col = 'DSE';
                break;
            case 4:
                $col = 'SM_ASM';
                break;
        }
        foreach ($data as $tl) {
            $this->db->where('Inv_Dt >=', $from);
            $data['target_achived'] = $this->db->from("rtl_daily_rep")
                    ->where(array($col => $tl['target_table_emp_id']))
                    ->count_all_results();

            $countArr2[$tl['employe_table_employe_name']]['achieved'] = $data['target_achived'];
        }

        return $countArr2;
    }

    public function get_dse_bookings($dseID) {
        $select = array('dse_id', 'booked_colour_code', 'order_no', 'if_alloted_Date', 'customer_name', 'prod_code', 'chassis_no', 'booking_remarks', 'customer_number');

        $this->db->select($select);
        $this->db->where('dse_id', $dseID);
        $this->db->where('oeder_status', 1);
        $data = $this->db->get('bookings_table')->result_array();
        $select = array(
            'Model', 'Variant', 'Colour', 'stock_location', 'stock_status'
        );

        foreach ($data as $key => $value) {
            $prod = $value['prod_code'];
            $chass = $value['chassis_no'];
            $this->db->where("(stock_status=2 OR stock_status=3 OR stock_status=4 OR stock_status=5 OR stock_status=6)");
            $this->db->where('Model_Code', $prod);
            $this->db->where('chassis_no', $chass);
            $this->db->select($select);
            $v = $this->db->get('stock')->result_array();
            if ($v[0]['stock_status'] == 3) {
                $this->db->where('stock_demand_prod_code', $prod);
                $this->db->where('stock_demand_booked_colour_code', $value['booked_colour_code']);
                $this->db->order_by('stock_demand_exp_date', 'DESC');
                $this->db->limit(1);
                $demandData = $this->db->get('stock_demand_dable')->result_array();
                $v[0]['demandedExipry'] = $demandData[0]['stock_demand_exp_date'];
            }
            if (!empty($v)) {
                $stk = $v[0]['stock_status'];
                $v[0]['stock_status'] = $this->db->get_where('status', array('status_id' => $stk))->result_array()[0]['status'];
                $stkLoc = $v[0]['stock_location'];
                $v[0]['stock_location'] = $this->db->get_where('stock_location', array('status_id' => $stkLoc))->result_array()[0]['Status'];
            }
            $data[$key]['stock'] = $v;
        }

        return $data;
    }

    function deleteDemand($id) {
        $update_demand_filter = array('stock_demand_status' => 0);
        $this->db->where(array('stock_demand_id' => $id)); //set demand to 0
        $this->db->update('stock_demand_dable', $update_demand_filter);
        return true;
    }
    function listorder1($date){
        $this->db->join('stock','stock.Stock_ID = product_stock_id');
        $this->db->join('status','status.status_id = stock.stock_status');
        return $this->db->get('bookings_table')->result_array();
    }
    
    
    
    
    function ListOrder($date) {
        $where = array(
            'create_tme >=' => $date,
            'oeder_status' => 1
        );
        //$this->db->join('stock_location', 'stock_location.Status_ID = bookings_table.stock_location');
         $this->db->join('stock','stock.Stock_ID = product_stock_id');
        $this->db->join('status','status.status_id = stock.stock_status');
        return $this->db->get('bookings_table')->result_array();
    }

    function editOrder($id) {

        $this->db->join('stock', 'stock.Stock_ID = bookings_table.product_stock_id');
        return $this->db->get_where('bookings_table', array('boooking_id' => $id))->result_array();
    }

    function getStatus() {
        return $this->db->get_where('status', array('create_demand_status' => 1))->result_array();
    }

    function update_order($data, $booking_id, $filter) {
        $update_filter = array('stock_status' => $filter);
        $product_stock_id = $data['product_stock_id'];
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 

        $this->db->where('boooking_id', $booking_id);
        $this->db->update('bookings_table', $data);

        $this->db->where('Stock_ID', $product_stock_id);
        $this->db->update('stock', $update_filter);
        if ($this->db->trans_complete()) {
            return true;
        } else {
            return false;
        }
    }

    function deleteBooking($id) {
        $booking_filter = array('oeder_status' => 0);
        $stock_filter = array('stock_status' => 1);
        $this->db->where('boooking_id', $id);
        $this->db->select('product_stock_id');
        $data = $this->db->get('bookings_table')->result_array();
        $stock_id = $data[0]['product_stock_id'];

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 

        $this->db->where('boooking_id', $id);
        $this->db->update('bookings_table', $booking_filter);

        $this->db->where('Stock_ID', $stock_id);
        $this->db->update('stock', $stock_filter);
        if ($this->db->trans_complete()) {
            return true;
        } else {
            return false;
        } # Completing transaction
    }

    function get_details_validation($table, $field) {
        $this->db->distinct($field);
        $this->db->select($field);
        return $this->db->get($table)->result_array();
    }

    function get_cust_details($dmdID) {
        return $this->db->get_where('stock_demand_dable', array('stock_demand_id' => $dmdID))->result_array();
        ;
    }

    function get_details_for_email($table, $field, $where) {
        $this->db->select($field);
        $this->db->where($where);
        return $this->db->get($table)->result_array();
    }

    function get_details_of_product($data) {

        $this->db->where(array('stock_demand_id' => $data));
        $result['demand'] = $this->db->get('stock_demand_dable')->result_array();
        $where = array(
            'product_code' => $result['demand'][0]['stock_demand_prod_code'],
            'color_code' => $result['demand'][0]['stock_demand_booked_colour_code'],
        );

        $this->db->limit(1);
        $this->db->join('model_color_matrix', 'model_color_matrix.prod_code = inventory_table.product_code');
        $result['model'] = $this->db->get('inventory_table')->result_array();
        return $result;
    }

    //delete stock
    function stockDelete() {
        $response = array();
        $chasisNo = $this->input->post('chasisNo');
        $stock_id = $this->input->post('stock_id');
        $this->db->select('chassis_no');
        $this->db->from('bookings_table');
        $this->db->where(array('chassis_no' => $chasisNo));
        $count = $this->db->count_all_results();
        if ($count == 0) {
            $this->db->where(array('Stock_ID' => $stock_id));
            $this->db->delete('stock');
            if ($this->db->affected_rows() > 0) {
                $response['success'] = true;
                $response['message'] = 'Deleted';
            } else {
                $response['success'] = false;
                $response['message'] = 'Error Occered Contact Admin';
            }
        } else {
            $response['success'] = false;
            $response['message'] = $chasisNo . ' chassis number in use';
        }
        return $response;
    }

}
