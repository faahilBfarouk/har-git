<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function User_authenticate($param) {

        $where = array(
            'employe_table_employe_id' => $param['emp_id'],
            'employe_table_employe_status' => 1,
            'employe_table_employe_id is NOT NULL'
        );

        $this->db->where($where);

        $data = $this->db->get('employe_table');

        if ($data->num_rows() === 1) {

            return $data->result();
        }
    }
    function list_emp($list_type) {
        $this->db->order_by("employe_table_employe_name", "asc");
        return $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => $list_type))
                        ->result_array();
    }
    function salesAchievementsView($field, $from, $to) {
        $user_data = $this->session->userdata();

        $empId = $user_data['user_employee_id'];
        $arrEmp = array();
        switch ($field) {
            case 6:
                $empList = $this->genTLGrp($empId);
                $data['Me'] = $this->generate_rep_each_emp($empId, $from, $to, $field);
                $data['dse'] = array();
                $data['tl'] = array();
                $data['asm'] = array();
                foreach ($empList as $k => $val) {
                    if ($val['employe_table_employe_hierarchy'] == 7) {
                        array_push($data['dse'], $this->generate_rep_each_emp($val['employe_table_employe_id'], $from, $to, 7));
                    }
                }
                break;
            case 5:
                $empList = $this->genASMGrp($empId);
                $data['Me'] = $this->generate_rep_each_emp($empId, $from, $to, $field);
                $data['dse'] = array();
                $data['tl'] = array();
                $data['asm'] = array();
                foreach ($empList as $k => $val) {
                    if ($val['employe_table_employe_hierarchy'] == 7) {
                        array_push($data['dse'], $this->generate_rep_each_emp($val['employe_table_employe_id'], $from, $to, 7));
                    }
                    if ($val['employe_table_employe_hierarchy'] == 6) {
                        array_push($data['tl'], $this->generate_rep_each_emp($val['employe_table_employe_id'], $from, $to, 6));
                    }
                }

                break;
            case 4:
                $empList = $this->genSMGrp($empId);
                $data['Me'] = $this->generate_rep_each_emp($empId, $from, $to, $field);
                $data['dse'] = array();
                $data['tl'] = array();
                $data['asm'] = array();
                foreach ($empList as $k => $val) {
                    if ($val['employe_table_employe_hierarchy'] == 7) {
                        array_push($data['dse'], $this->generate_rep_each_emp($val['employe_table_employe_id'], $from, $to, 7));
                    }
                    if ($val['employe_table_employe_hierarchy'] == 6) {
                        array_push($data['tl'], $this->generate_rep_each_emp($val['employe_table_employe_id'], $from, $to, 6));
                    } if ($val['employe_table_employe_hierarchy'] == 5) {
                        $mid = $this->generate_rep_each_emp($val['employe_table_employe_id'], $from, $to, 5);
                        array_push($data['asm'], $mid);
                    }
                }
                break;
        }
        return $data;
    }

    function genTLGrp($empId) {
        $select = ['employe_table_employe_id', 'employe_table_employe_name', 'employe_table_employe_hierarchy'];
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');

        $empInfo = $this->db->get_where('employe_table', array('under_TL_EmpId' => $empId))->result_array();
        foreach ($empInfo as $value) {
            $empArr[$value['employe_table_employe_name']] = $value;
        }
        return $empArr;
    }

    function genASMGrp($empId) {
        $select = ['employe_table_employe_id', 'employe_table_employe_name', 'employe_table_employe_hierarchy'];
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');

        $empInfo = $this->db->get_where('employe_table', array('under_ASM_EmpId' => $empId))->result_array();
        foreach ($empInfo as $value) {
            $empArr[$value['employe_table_employe_name']] = $value;
        }
        return $empInfo;
    }

    function genSMGrp($empId) {
        $select = ['employe_table_employe_id', 'employe_table_employe_name', 'employe_table_employe_hierarchy'];
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');

        $empInfo = $this->db->get_where('employe_table', array('under_SM_EmpId' => $empId))->result_array();
        foreach ($empInfo as $value) {
            $empArr[$value['employe_table_employe_name']] = $value;
        }
        return $empInfo;
    }

    function list() {
        $select = array(
            'Stock_Product_ID',
            'Stock_Chassis',
            'Stock_product_Status_ID',
            'Status',
            'stock.remarks',
        );
        $this->db->select($select);
        $this->db->from('stock');
        $this->db->join('status', 'status.Status_ID = stock.Stock_product_Status_ID');
        return $this->db->get()->result();
    }

    function get_values() {
        $select = array(
            'employe_table_id',
            'employe_table_employe_id',
            'employe_table_employe_name',
            'employe_table_employe_group_id'
        );
        $this->db->select($select);
        $data = array();
        $list = array();
        $tl_list = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => 6, 'employe_table_employe_status' => 1))->result_array();
        foreach ($tl_list as $value) {
         
            $where = array(
                'employe_group_table_leader_employee_id' => $value['employe_table_id']
            );
            $this->db->where($where);
            $this->db->join('employe_group_table', 'employe_group_table.employe_group_table_id = employe_table_employe_group_id');
            $emp_list[] = $this->db->get('employe_table')->result_array();
        }


        $data['tl_list'] = $tl_list;
        $data['emp_list'] = $emp_list;


        return $data;
    }

    function jsoniser($fromDate, $toDate, $model, $table) {

        $countArr2 = array();
        $start_date = $fromDate;
        $end_date = $toDate;
        $colModel = '';
        $colVar = '';

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

        $this->db->where($where);
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

    function get_report($fromDate, $toDate) {


        $model_list = array();
        $countArr2 = array();
        $start_date = $fromDate;
        $end_date = $toDate;
        $rep = array('enquiry_daily_rep', 'booking_daily_rep', 'rtl_daily_rep', 'delivered_daily_rep', 'cancelled_daily_rep');

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
                $where = ("enquiry_date BETWEEN '$start_date' AND '$end_date'");
            }
            if ($table == 'booking_daily_rep') {
                $where = ("order_date BETWEEN '$start_date' AND '$end_date'");
            }
            if ($table == 'rtl_daily_rep') {
                $where = $where = ("Inv_Dt BETWEEN '$start_date' AND '$end_date'");
            }
            if ($table == 'delivered_daily_rep') {
                $where = $where = ("Del_Date BETWEEN '$start_date' AND '$end_date'");
            }
            if ($table == 'cancelled_daily_rep') {
                $where = ("can_date BETWEEN '$start_date' AND '$end_date'");
            }

            $this->db->distinct();
            $this->db->select($colModel);
            $this->db->order_by($colModel, 'ASC');
            $model_list = $this->db->get_where($table, $where)->result_array();


            foreach ($model_list as $l) {


                $model = $l[$colModel];
                $this->db->where($colModel, $model);
                $this->db->from($table);
                $count = $this->db->count_all_results();


                $select = array(
                    $colVar
                );

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

    function get_models() {
        $select = array(
            'DISTINCT(model_name)',
        );
        $this->db->select($select);
        $this->db->order_by('model_name', 'ASC');
        $model_list = $this->db->get('inventory_table')->result_array();
        return $model_list;
    }

    function get_data($value) {
        $select = array(
            'employe_table_id',
            'employe_table_employe_id',
            'employe_table_employe_name'
        );
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');
        $data['tl'] = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => 6))->result_array();
        $data['dse'] = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => 7))->result_array();
        $data['asm'] = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => 5))->result_array();
        return $data;
    }

    function insert($table, $data) {
        $respose = false;
        if ($this->db->insert($table, $data)) {
            $respose = true;
        }
        return $respose;
    }

    function get_reportDate($filter, $fromDate, $toDate) {
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

        $tl_list = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => $role, 'employe_table_employe_status' => 1))->result_array();
        $start_date = $fromDate;
        $end_date = $toDate;
        if ($filter == '5') {
            $AgentEnq = 'ASM';
            $AgentBkg = 'ASM_SM';
            $AgentRtl = 'ASM_SM';
            $AgentDel = 'ASM';
            $AgentCan = 'TL'; //ASM AND SM DATA NOT AVAILABLE
        } elseif ($filter == '4') {
            $AgentEnq = 'SM';
            $AgentBkg = 'SM_ASM';
            $AgentRtl = 'SM_ASM';
            $AgentDel = 'SM';
            $AgentCan = 'TL';
        }

        foreach ($tl_list as $tl) {
            $employe_table_employe_id = $tl['employe_table_employe_id'];
            $EmpNamewhere = ("Enquiry_Date BETWEEN '$start_date' AND '$end_date' AND $AgentEnq = $employe_table_employe_id");
            $countBkgWhere = ("ORDER_DATE BETWEEN '$start_date' AND '$end_date' AND $AgentBkg = $employe_table_employe_id");
            $countRtlWhere = ("Inv_Dt BETWEEN '$start_date' AND '$end_date' AND $AgentRtl = $employe_table_employe_id");
            $countDelWhere = ("Inv_Dt BETWEEN '$start_date' AND '$end_date' AND $AgentDel = $employe_table_employe_id");
            $countCanWhere = ("CAN_DATE BETWEEN '$start_date' AND '$end_date' AND $AgentCan = $employe_table_employe_id");
            $countEnq[] = array(
                'emp name' => $tl['employe_table_employe_name'],
                'countEnq' => $this->db->get_where('enquiry_daily_rep', $EmpNamewhere)->num_rows(),
                'countBkg' => $this->db->get_where('booking_daily_rep', $countBkgWhere)->num_rows(),
                'countRtl' => $this->db->get_where('rtl_daily_rep', $countRtlWhere)->num_rows(),
                'countDel' => $this->db->get_where('delivered_daily_rep', $countDelWhere)->num_rows(),
                'countCan' => $this->db->get_where('cancelled_daily_rep', $countCanWhere)->num_rows()
            );
        }
        $data['tllist'] = $tl_list;
        $data['rep'] = $countEnq;

        return $data;
    }

    function get_target($from) {
        $select = array(
            'target_table_id',
            'target_table_emp_id',
            'employe_table_employe_name',
            'target_table_product',
            'target_table_product_qty',
            'target_table_exp_date'
        );
        $col = 'target_table_target_level';
        $tlRtlWhere = ("DATE (target_table_create) >= '$from' AND $col = 6");
        $dseRtlWhere = ("DATE (target_table_create) >= '$from' AND $col = 7");
        $asmRtlWhere = ("DATE (target_table_create) >= '$from' AND $col = 5");


        $this->db->order_by('employe_table_employe_name', 'ASC');

        $data['tl'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $tlRtlWhere)
                ->result_array();
        $data['dse'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $dseRtlWhere)
                ->result_array();
        $data['asm'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $asmRtlWhere)
                ->result_array();

        $countArr = array();
        $countArr2 = array();


// TO GET TOTAL IF TOTAL TARGET  IS SET OR NOT

        foreach ($data['tl'] as $k => $d) {
            $id = $d['employe_table_employe_name'];
            $countVar = 0;


            foreach ($data['tl'] as $k => $var) {
                if ($id == $var['employe_table_employe_name']) {
                    if ($var['target_table_product'] != 'Total_Target') {
                        $countVar = $countVar + $var['target_table_product_qty'];
                    }
                }
                $countArr[(string) $d['employe_table_employe_name']] = $countVar;
            }



            $countArr['id'] = $d['target_table_emp_id'];
            $countArr2['tl'][$id] = $countArr;

            $countArr = null;
        }


        foreach ($data['dse'] as $d) {
            $id = $d['employe_table_employe_name'];
            if ($d['target_table_product'] == 'Total_Target') {
                $countArr['total'] = $d['target_table_product_qty'];
            }

            $countVar = 0;
            foreach ($data['dse'] as $var) {
                if ($id == $var['employe_table_employe_name']) {
                    if ($var['target_table_product'] != 'Total_Target')
                        $countVar = $countVar + $var['target_table_product_qty'];
                }
                $countArr[(string) $d['employe_table_employe_name']] = $countVar;
            }
            $countArr['id'] = $d['target_table_emp_id'];

            $countArr2['dse'][$id] = $countArr;
            $countArr = null;
        }



        foreach ($data['asm'] as $d) {
            $id = $d['employe_table_employe_name'];


            $countVar = 0;
            foreach ($data['asm'] as $var) {
                if ($id == $var['employe_table_employe_name']) {
                    if ($var['target_table_product'] != 'Total_Target')
                        $countVar = $countVar + $var['target_table_product_qty'];
                }
                $countArr[(string) $d['employe_table_employe_name']] = $countVar;
            }
            $countArr['id'] = $d['target_table_emp_id'];
            $countArr2['asm'][$id] = $countArr;
            $countArr = null;
        }

// TO GET TOTAL TARGET
        foreach ($data['tl'] as $key => $value) {
            $theID = $value['target_table_emp_id'];
            $arr = $this->db->get_where('target_table', array('target_table_product' => 'Total_Target', 'target_table_emp_id' => $theID))
                    ->result_array();

            if (!empty($arr)) {
                end($arr);         // move the internal pointer to the end of the array
                $key = $last = key($arr);

                $countArr2['tl'][$value['employe_table_employe_name']]['total'] = $arr[$last]['target_table_product_qty'];
            }
        }

        foreach ($data['dse'] as $key => $value) {
            $theID = $value['target_table_emp_id'];
            $arr = $this->db->get_where('target_table', array('target_table_product' => 'Total_Target', 'target_table_emp_id' => $theID))
                    ->result_array();

            if (!empty($arr)) {
                end($arr);         // move the internal pointer to the end of the array
                $key = $last = key($arr);

                $countArr2['dse'][$value['employe_table_employe_name']]['total'] = $arr[$last]['target_table_product_qty'];
            }
        }

        foreach ($data['asm'] as $key => $value) {
            $theID = $value['target_table_emp_id'];
            $arr = $this->db->get_where('target_table', array('target_table_product' => 'Total_Target', 'target_table_emp_id' => $theID))
                    ->result_array();

            if (!empty($arr)) {
                end($arr);         // move the internal pointer to the end of the array
                $key = $last = key($arr);

                $countArr2['asm'][$value['employe_table_employe_name']]['total'] = $arr[$last]['target_table_product_qty'];
            }
        }

// TO GET ACHIEVED

        foreach ($data['tl'] as $tl) {
            $this->db->where('Inv_Dt >=', $from);
            $data['target_achived_by_tl'] = $this->db->from("rtl_daily_rep")
                    ->where(array('Team_Lead' => $tl['target_table_emp_id']))
                    ->count_all_results();

            $countArr2['tl'][$tl['employe_table_employe_name']]['achieved'] = $data['target_achived_by_tl'];
        }
        foreach ($data['dse'] as $dse) {
            $this->db->where('Inv_Dt >=', $from);
            $data['target_achived_by_dse'] = $this->db->from("rtl_daily_rep")
                    ->where(array('DSE' => $dse['target_table_emp_id']))
                    ->count_all_results();
            $countArr2['dse'][$dse['employe_table_employe_name']]['achieved'] = $data['target_achived_by_dse'];
        }
        foreach ($data['asm'] as $asm) {
            $this->db->where('Inv_Dt >=', $from);
            $data['target_achived_by_asm'] = $this->db->from("rtl_daily_rep")
                    ->where(array('ASM_SM' => $asm['target_table_emp_id']))
                    ->count_all_results();
            $countArr2['asm'][$asm['employe_table_employe_name']]['achieved'] = $data['target_achived_by_asm'];
        }

        return $countArr2;
    }

    function get_model_report($id, $field, $from) { // This gets JSON report
        switch ($field) {
            case 'tl':
                $fieldName = 'Team_Lead';
                break;
            case 'dse':
                $fieldName = 'DSE';
                break;
            case 'asm':
                $fieldName = 'ASM_SM';
                break;
        }
        $empID = $id;
        $this->db->where('Inv_Dt >=', $from);
        
        $data = $this->db->get_where('rtl_daily_rep', array($fieldName => $id))->result_array();
        $countArr = array();

        foreach ($data as $k => $d) {
            if ($d['Model'] != 'Total_Target') {
                $id = $d['Model'];
                $countVar = 0;
                foreach ($data as $key => $var) {
                    if ($id == $var['Model']) {
                        $countVar++;
                    }

                    $countArr[strtoupper((string) $d['Model'])]['achieved'] = $countVar;
                    $countArr[strtoupper((string) $d['Model'])]['target'] = 0;
                }
            }
        }

        $select = array(
            'target_table_id',
            'target_table_emp_id',
            'employe_table_employe_name',
            'target_table_product',
            'target_table_product_qty',
            'target_table_exp_date'
        );
        $col = 'target_table_target_level';
        $tlRtlWhere = ("DATE (target_table_create) >= '$from' AND $col = 6");
        $dseRtlWhere = ("DATE (target_table_create) >= '$from' AND $col = 7");
        $asmRtlWhere = ("DATE (target_table_create) >= '$from' AND $col = 5");

        $data['tl'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $tlRtlWhere)
                ->result_array();
        $data['dse'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $dseRtlWhere)
                ->result_array();
        $data['asm'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $asmRtlWhere)
                ->result_array();


        switch ($field) {
            case 'tl':
                foreach ($data['tl'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = 0;
                    }
                }
                foreach ($data['tl'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = $countArr[(string) $d['target_table_product']]['target'] + $d['target_table_product_qty'];
                        if (!array_key_exists('achieved', $countArr[$d['target_table_product']])) {
                            $countArr[(string) $d['target_table_product']]['achieved'] = 0;
                        }
                    }
                }


                break;
            case 'dse':
                foreach ($data['dse'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = 0;
                    }
                }
                foreach ($data['dse'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = $countArr[(string) $d['target_table_product']]['target'] + $d['target_table_product_qty'];
                        if (!array_key_exists('achieved', $countArr[$d['target_table_product']])) {
                            $countArr[(string) $d['target_table_product']]['achieved'] = 0;
                        }
                    }
                }

                break;
            case 'asm':
                foreach ($data['asm'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = 0;
                    }
                }
                foreach ($data['asm'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = $countArr[(string) $d['target_table_product']]['target'] + $d['target_table_product_qty'];
                        if (!array_key_exists('achieved', $countArr[$d['target_table_product']])) {
                            $countArr[(string) $d['target_table_product']]['achieved'] = 0;
                        }
                    }
                }

                break;
        }



        return $countArr;
    }

    function generate_report_modelwise($id, $field, $from, $to) { 
        switch ($field) {
            case 'tl':
                $fieldName = 'Team_Lead';
                break;
            case 'dse':
                $fieldName = 'DSE';
                break;
            case 'asm':
                $fieldName = 'ASM_SM';
                break;
            case '6':
                $fieldName = 'Team_Lead';
                break;
            case '7':
                $fieldName = 'DSE';
                break;
            case '5':
                $fieldName = 'ASM_SM';
                break;
        }
        $empID = $id;
        $this->db->where('Inv_Dt >=', $from);
        $data = $this->db->get_where('rtl_daily_rep', array($fieldName => $id))->result_array();
        $countArr = array();

        foreach ($data as $k => $d) {
            if ($d['Model'] != 'Total_Target') {
                $id = $d['Model'];
                $countVar = 0;
                foreach ($data as $key => $var) {
                    if ($id == $var['Model']) {
                        $countVar++;
                    }

                    $countArr[strtoupper((string) $d['Model'])]['achieved'] = $countVar;
                    $countArr[strtoupper((string) $d['Model'])]['target'] = 0;
                }
            }
        }

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

        $data['tl'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $Where)
                ->result_array();


        switch ($field) {
            case 'tl':
                foreach ($data['tl'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = 0;
                    }
                }
                foreach ($data['tl'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = $countArr[(string) $d['target_table_product']]['target'] + $d['target_table_product_qty'];
                        if (!array_key_exists('achieved', $countArr[$d['target_table_product']])) {
                            $countArr[(string) $d['target_table_product']]['achieved'] = 0;
                        }
                    }
                }


                break;
            case 'dse':
                foreach ($data['dse'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = 0;
                    }
                }
                foreach ($data['dse'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = $countArr[(string) $d['target_table_product']]['target'] + $d['target_table_product_qty'];
                        if (!array_key_exists('achieved', $countArr[$d['target_table_product']])) {
                            $countArr[(string) $d['target_table_product']]['achieved'] = 0;
                        }
                    }
                }

                break;
            case 'asm':
                foreach ($data['asm'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = 0;
                    }
                }
                foreach ($data['asm'] as $k => $d) {
                    if ($d['target_table_emp_id'] == $empID && $d['target_table_product'] != 'Total_Target') {
                        $countArr[(string) $d['target_table_product']]['target'] = $countArr[(string) $d['target_table_product']]['target'] + $d['target_table_product_qty'];
                        if (!array_key_exists('achieved', $countArr[$d['target_table_product']])) {
                            $countArr[(string) $d['target_table_product']]['achieved'] = 0;
                        }
                    }
                }

                break;
        }



        return $countArr;
    }

    function generate_rep_each_emp($empID, $from, $to, $field) {
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

    function generate_rep($empList, $from, $to, $field) {
        foreach ($empList as $val) {
            $Arr[$val]['split'] = $this->generate_report_modelwise($val, $field, $from, $to);
        }
        $select = array(
            'DISTINCT(model_name)'
        );
        $final = array();
        $this->db->select($select);
        $this->db->order_by('model_name', 'ASC');
        $modelList = $this->db->get('inventory_table')->result_array();

        foreach ($modelList as $val) {
            $model[$val['model_name']]['target'] = 0;
            $model[$val['model_name']]['achieved'] = 0;
        }

        foreach ($Arr as $k => $v) {
            //$keys = array_keys($v['split']);
            $final[$k] = array_merge($model, $Arr[$k]['split']);
        }
        foreach ($empList as $val) {
            $Arr[$val]['Total'] = $this->generate_rep_each_emp($val, $from, $to, $field);
            $final[$val]['Total'] = $Arr[$val]['Total'];
        }



        return $final;
    }

}
