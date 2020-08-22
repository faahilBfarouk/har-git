<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_area_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 function list_team() {
        $session = $this->session->userdata();
        $user_employee_id = 50   ;//$session['user_employee_id'];
        $employee_hierarchy = 3;    //$session['employee_hierarchy'];
        $where = array();
        $select = array(
            'employe_table_employe_id',
            'employe_table_employe_name',
            'employe_table_employe_mobile',
            'h_name',
            'employe_table_employe_email'
        
        );
        switch ($employee_hierarchy) {
            case 3:
                $where = array('under_RM_EmpId' => $user_employee_id);
                break;
            case 4:
                $where = array('under_SM_EmpId' => $user_employee_id);
                break;
            case 5:
                $where = array('under_ASM_EmpId' => $user_employee_id);
                break;
            case 6:
                $where = array('under_TL_EmpId' => $user_employee_id);
                break;
        }
        $this->db->select($select);
        $this->db->where($where);
        $this->db->join('hierarchy','hierarchy.h_ID = employe_table.employe_table_employe_hierarchy');
        $this->db->order_by('employe_table_employe_name');
        return $emp_list = $this->db->get('employe_table')->result_array();
    }
    //Hoslistic Report Function
    function get_reportDate($filter, $fromDate, $toDate) {
        $user_data = $this->session->userdata();
        $countEnq=array();
        $tl_list=array();
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

        $tl_list = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => $role, 'employe_table_employe_status' => 1,'employe_table_employe_group_id>'=>6))->result_array();
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
$toNxt = new DateTime($end_date);
        $toNxt->modify('+1 day');
        $end_date = date_format($toNxt,"Y-m-d");
        foreach ($tl_list as $tl) {
            $employe_table_employe_id = $tl['employe_table_employe_id'];
            $EmpNamewhere = ("Enquiry_Date BETWEEN '$start_date' AND '$end_date' AND $AgentEnq = $employe_table_employe_id");
            $countBkgWhere = ("ORDER_DATE BETWEEN '$start_date' AND '$end_date' AND $AgentBkg = $employe_table_employe_id");
            $countRtlWhere = ("Inv_Dt BETWEEN '$start_date' AND '$end_date' AND $AgentRtl = $employe_table_employe_id");
            $countDelWhere = ("del_date BETWEEN '$start_date' AND '$end_date' AND $AgentDel = $employe_table_employe_id");
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

    //above is completed area   
    function list_emp($list_type) { //List emp for getting list of emplyee for what, NO idea
        $this->db->order_by("employe_table_employe_name", "asc");
        return $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => $list_type, 'employe_table_employe_status'=>1))
                        ->result_array();
    }
    
     function list_emp_filterHigherEmp($list_type) { //List emp for getting list of emplyee for what, NO idea
        $this->db->order_by("employe_table_employe_name", "asc");
        if($list_type==7)
        {  return $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => $list_type, 'employe_table_employe_status'=>1,'employe_table_employe_group_id>'=>6))
                        ->result_array(); // HEre we gave Group ID < 7 so that VP's name does not come in the Target List and Daily Rep. They can take booking but their reports wont be seen.
        }else {
           return $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => $list_type, 'employe_table_employe_status'=>1))
                        ->result_array();
        }
        
     }

    function salesAchievementsView($field, $from, $to) { //restricted access to SM adn below
        $user_data = $this->session->userdata();

        $empId = $user_data['user_employee_id'];
        $arrEmp = array();
        $data =array();
        switch ($field) { //Create loops as many as required to get further below members
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
        //generate employees below it and put in a array
        return $data;
    }

    function genTLGrp($empId) { //generate grp below given TL
        $select = ['employe_table_employe_id', 'employe_table_employe_name', 'employe_table_employe_hierarchy'];
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');

        $empInfo = $this->db->get_where('employe_table', array('under_TL_EmpId' => $empId))->result_array();
        foreach ($empInfo as $value) {
            $empArr[$value['employe_table_employe_name']] = $value;
        }
        return $empArr;
    }

    function genASMGrp($empId) {//generate grp below given ASM
        $select = ['employe_table_employe_id', 'employe_table_employe_name', 'employe_table_employe_hierarchy'];
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');

        $empInfo = $this->db->get_where('employe_table', array('under_ASM_EmpId' => $empId))->result_array();
        foreach ($empInfo as $value) {
            $empArr[$value['employe_table_employe_name']] = $value;
        }
        return $empInfo;
    }

    function genSMGrp($empId) {//generate grp below given SM
        $select = ['employe_table_employe_id', 'employe_table_employe_name', 'employe_table_employe_hierarchy'];
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');

        $empInfo = $this->db->get_where('employe_table', array('under_SM_EmpId' => $empId))->result_array();
        foreach ($empInfo as $value) {
            $empArr[$value['employe_table_employe_name']] = $value;
        }
        return $empInfo;
    }

    function get_values() { // get values for WHat, No idea
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
        $toNxt = new DateTime($end_date);
        $toNxt->modify('+1 day');
        $end_date = date_format($toNxt,"Y-m-d");
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

    function get_report($fromDate, $toDate) {

        $user_data = $this->session->userdata();
        $empId = $user_data['user_employee_id']; // if SM then only his children will be seen
        $access = $user_data['employee_access_level'];

        if ($access == 0) {
            $data = $this->get_restrictedModelReport($fromDate, $toDate);
        } else {
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
     $toNxt = new DateTime($end_date);
        $toNxt->modify('+1 day');
        $end_date = date_format($toNxt,"Y-m-d");
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
        }
        return $data;
    }

    function get_models() { // get unique models 
        $select = array(
            'DISTINCT(model_name)',
        );
        $this->db->select($select);
        $this->db->order_by('model_name', 'ASC');
        $model_list = $this->db->get('inventory_table')->result_array();
        return $model_list;
    }

    function get_data($value) { // get list of employees
        $select = array(
            'employe_table_id',
            'employe_table_employe_id',
            'employe_table_employe_name'
        );
        $this->db->select($select);
        $this->db->order_by('employe_table_employe_name', 'ASC');
        $this->db->where('employe_table_employe_status',1);
        $data['tl'] = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => 6))->result_array();
        $data['dse'] = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => 7))->result_array();
        $data['asm'] = $this->db->get_where('employe_table', array('employe_table_employe_hierarchy' => 5))->result_array();
        return $data;
    }

    function insert_target() { //to insert target NO idea
        for ($i = 0; $i < count($this->input->post('targetQty')); $i++) {
            $target_table_emp_id = $this->input->post('empID')[$i];
            $target_table_product = $this->input->post('model');
            $target_table_product_qty = $this->input->post('targetQty')[$i];
            $target_table_exp_date = $this->input->post('date');
            $target_table_target_level = $this->input->post('emp_type');
            $data[] = array(
                'target_table_emp_id' => $target_table_emp_id,
                'target_table_product' => $target_table_product,
                'target_table_product_qty' => $target_table_product_qty,
                'target_table_exp_date' => $target_table_exp_date,
                'target_table_target_level' => $target_table_target_level,
            );
        }
        if ($this->db->insert_batch('target_table', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function insert($table, $data) { //insert into any table
        $respose = false;
        if ($this->db->insert($table, $data)) {
            $respose = true;
        }
        return $respose;
    }

    function get_target($from) { // usesd to get target from given date
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

    function get_model_report($id, $field, $from) { // This gets JSON report for Achievement page
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
            case 'sm':
                $fieldName = 'SM_ASM';
                break;
            case 6:
                $fieldName = 'Team_Lead';
                break;
            case 7:
                $fieldName = 'DSE';
                break;
            case 5:
                $fieldName = 'ASM_SM';
                break;
            case 4:
                $fieldName = 'SM_ASM';
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
            case 6:
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
            case 7:
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
            case 5:
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
    

    function generate_report_modelwise($id, $field, $from, $to) { // to generate modelwise report of cars sold by employee and target for each car
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
             $toNxt = new DateTime($to);
        $toNxt->modify('+1 day');
        $to = date_format($toNxt,"Y-m-d");
        $col = 'target_table_emp_id';
        $Where = ("DATE (target_table_create) BETWEEN '$from' AND '$to'  AND $col = $empID");
        $this->db->where('target_table_target_level',$field);
        if($field == 6)
        $data['tl'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $Where)
                ->result_array();
        if($field == 7)
        $data['dse'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
                ->select($select)
                ->get_where('target_table', $Where)
                ->result_array();
        if($field == 5)
        $data['asm'] = $this->db->join('employe_table', 'employe_table.employe_table_employe_id = target_table_emp_id')
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
                case 6:
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
            case 7:
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
            case 5:
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

    function generate_rep_each_emp($empID, $from, $to, $field) { //generate report for each employee on their target and acheivement 
        $select = array(
            'target_table_id',
            'target_table_emp_id',
            'employe_table_employe_name',
            'target_table_product',
            'target_table_product_qty',
            'target_table_exp_date'
        );
             $toNxt = new DateTime($to);
        $toNxt->modify('+1 day');
        $to = date_format($toNxt,"Y-m-d");
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

    function generate_rep($empList, $from, $to, $field) { // generate report inistial main fn
        foreach ($empList as $val) {
            $Arr[$val]['split'] = $this->generate_report_modelwise($val, $field, $from, $to);
        }
        $select = array(
            'model_name'
        );
        $final = array();
        $this->db->distinct();
        $this->db->select($select);
        $this->db->order_by('model_name', 'ASC');
        $modelList = $this->db->get('inventory_table')->result_array();

        foreach ($modelList as $val) {
            $model[$val['model_name']]['target'] = 0;
            $model[$val['model_name']]['achieved'] = 0;
        }
        foreach ($Arr as $k => $v) {
            $final[$k] = array_merge($model, $Arr[$k]['split']);
        }
        foreach ($empList as $val) {
            $Arr[$val]['Total'] = $this->generate_rep_each_emp($val, $from, $to, $field);
            foreach ($Arr[$val]['Total'] as $key => $value) {
                $final[$val]['Total'] = $value;
            }
        }
        foreach ($empList as $emp) {
            $this->db->select('employe_table_employe_name');
            $inter = $this->db->get_where("employe_table", array('employe_table_employe_id' => $emp))->result_array();
            $empName[$emp] = $inter[0];
        }

        foreach ($empName as $key => $pair) {
            $final[$empName[$key]['employe_table_employe_name']] = $final[$key];
            unset($final[$key]);
        }
        $this->db->order_by('model_name', 'ASC');

        foreach ($modelList as $k => $m)
            foreach ($m as $key => $value) { {
                    $final['Dealership'][$value]['achieved'] = 0;
                    $final['Dealership'][$value]['target'] = 'Not Applicable ';
                }
            }

        $final['Dealership']['Total']['target'] = 'Not Applicable ';
        $final['Dealership']['Total']['achieved'] = $this->db->from("rtl_daily_rep")->where('Inv_Dt >=', $from)->where('Inv_Dt <=', $to)
                ->count_all_results();
        foreach ($modelList as $k => $m) {
            foreach ($m as $key => $value) {
                $final['Dealership'][$value]['achieved'] = $this->db->from("rtl_daily_rep")->where('Inv_Dt >=', $from)->where('Inv_Dt <=', $to)
                        ->where(array('Model' => $value))
                        ->count_all_results();
            }
        }



        return $final;
    }

    function get_restrictedDailyReport($filter, $fromDate, $toDate) {
        $user_data = $this->session->userdata();
        $empId = $user_data['user_employee_id']; // if SM then only his children will be seen
        $field = $user_data['employee_hierarchy'];


        $interList = array();
        switch ($field) {
            case 6:
                $empList = $this->genTLGrp($empId);
                $data['me'] = $this->recursiveDaily($empId, $field, $fromDate, $toDate);
                foreach ($empList as $k => $val) {
                    if ($val['employe_table_employe_hierarchy'] == 7 && $filter == 7) {
                        array_push($interList, $this->recursiveDaily($val['employe_table_employe_id'], 7, $fromDate, $toDate));
                    }
                }
                break;
            case 5:
                $empList = $this->genASMGrp($empId);
                $data['me'] = $this->recursiveDaily($empId, $field, $fromDate, $toDate);
                foreach ($empList as $k => $val) {
                    if ($val['employe_table_employe_hierarchy'] == 7 && $filter == 7) {
                        array_push($interList, $this->recursiveDaily($val['employe_table_employe_id'], 7, $fromDate, $toDate));
                    }
                    if ($val['employe_table_employe_hierarchy'] == 6 && $filter == 6) {
                        array_push($interList, $this->recursiveDaily($val['employe_table_employe_id'], 6, $fromDate, $toDate));
                    }
                }
                break;
            case 4:
                $empList = $this->genSMGrp($empId);

                $data['me'] = $this->recursiveDaily($empId, $field, $fromDate, $toDate);
                foreach ($empList as $k => $val) {
                    if ($val['employe_table_employe_hierarchy'] == 7 && $filter == 7) {
                        array_push($interList, $this->recursiveDaily($val['employe_table_employe_id'], 7, $fromDate, $toDate));
                    }
                    if ($val['employe_table_employe_hierarchy'] == 6 && $filter == 6) {
                        array_push($interList, $this->recursiveDaily($val['employe_table_employe_id'], 6, $fromDate, $toDate));
                    }
                    if ($val['employe_table_employe_hierarchy'] == 5 && $filter == 5) {
                        array_push($interList, $this->recursiveDaily($val['employe_table_employe_id'], 5, $fromDate, $toDate));
                    }
                }
                break;
        }


        $data['child'] = $interList;
        return $data;
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

 $toNxt = new DateTime($end_date);
        $toNxt->modify('+1 day');
        $end_date = date_format($toNxt,"Y-m-d");
        $employe_table_employe_id = $emp[0]['employe_table_employe_id'];
        $EmpNamewhere = ("Enquiry_Date BETWEEN '$start_date' AND '$end_date' AND $AgentEnq = $employe_table_employe_id");
        $countBkgWhere = ("ORDER_DATE BETWEEN '$start_date' AND '$end_date' AND $AgentBkg = $employe_table_employe_id");
        $countRtlWhere = ("Inv_Dt BETWEEN '$start_date' AND '$end_date' AND $AgentRtl = $employe_table_employe_id");
        $countDelWhere = ("del_date BETWEEN '$start_date' AND '$end_date' AND $AgentDel = $employe_table_employe_id");
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

    function get_restrictedModelReport($fromDate, $toDate) {
        $user_data = $this->session->userdata();
        $empId = $user_data['user_employee_id']; // if SM then only his children will be seen
        $field = $user_data['employee_hierarchy'];


        $interList = $this->recursiveModelReport($fromDate, $toDate, $field, $empId);

        $data = $interList;
        return $data;
    }

    function recursiveModelReport($fromDate, $toDate, $filter, $empID) {


        $model_list = array();
        $countArr2 = array();
        $start_date = $fromDate;
        $end_date = $toDate;
        $rep = array('enquiry_daily_rep', 'booking_daily_rep', 'rtl_daily_rep', 'delivered_daily_rep', 'cancelled_daily_rep');
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
 $toNxt = new DateTime($end_date);
        $toNxt->modify('+1 day');
        $end_date = date_format($toNxt,"Y-m-d");
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
    function jsoniserFull($fromDate, $toDate, $model, $table) {
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
         $toNxt = new DateTime($end_date);
        $toNxt->modify('+1 day');
        $end_date = date_format($toNxt,"Y-m-d");
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

     function get_marked(){
        $select = array(
            'Model','Variant','Model_Code','Colour','Chassis_No','stock_location'
        );
        $this->db->select($select);
        $this->db->where('stock_status',2);
        $data = $this->db->get('stock')->result_array();
        $res = array();
         $select = array('dse_id','order_no','if_marked_date','customer_name','booking_remarks');
         
        foreach ($data as $key=>$value) {
        $prod = $value['Model_Code'];
        $chass = $value['Chassis_No']; 
        $this->db->where('prod_code',$prod);
        $this->db->where('chassis_no',$chass);
        $this->db->select($select);
        $v = $this->db->get('bookings_table')->result_array();
       $data[$key]['book'] =$v ;
        }
        
      

        return $data;
                
    }
    function get_alloted(){
        $select = array(
            'Model','Variant','Model_Code','Colour','Chassis_No','stock_location'
        );
        $this->db->select($select);
        $this->db->where('stock_status',4);
        $data = $this->db->get('stock')->result_array();
        $res = array();
         $select = array('dse_id','order_no','if_alloted_Date','customer_name','booking_remarks');
         
        foreach ($data as $key=>$value) {
        $prod = $value['Model_Code'];
        $chass = $value['Chassis_No']; 
        $this->db->where('prod_code',$prod);
        $this->db->where('chassis_no',$chass);
        $this->db->select($select);
        $v = $this->db->get('bookings_table')->result_array();
       $data[$key]['book'] =$v ;
        }

        return $data;
                
    }
    
    function demandJsoniser($fromDate, $toDate, $model, $top){
           $top = (int) $top;
              $select = array(
            'Variant_Name', 'COUNT(Variant_Name)'
        );
       
      $this->db->where('model_name',$model);
       $this->db->select($select);
       $this->db->group_by('Variant_Name');
       $this->db->order_by('COUNT(Variant_Name)', 'DESC');
        $toNxt = new DateTime($toDate);
        $toNxt->modify('+1 day');
        $toDate = date_format($toNxt,"Y-m-d");
         $where = ("enquiry_date BETWEEN '$fromDate' AND '$toDate'");
         $this->db->limit($top);
        $varList = $this->db->get_where('enquiry_daily_rep',$where)->result_array();
        $res = array();
        foreach ($varList as $value) {
           $res[(string)$value['Variant_Name']] = $value['COUNT(Variant_Name)'];
        }
        return $res;
    }
    function get_adminHome($top,$fromDate, $toDate) {
        $top = (int) $top;
              $select = array(
            'model_name', 'COUNT(*)'
        );
       $this->db->select($select);
       $this->db->group_by('model_name');
       $this->db->order_by('COUNT(*)', 'DESC');
               $toNxt = new DateTime($toDate);
        $toNxt->modify('+1 day');
        $toDate = date_format($toNxt,"Y-m-d");
         $where = ("enquiry_date BETWEEN '$fromDate' AND '$toDate'");
         $this->db->limit($top);
        $modelList = $this->db->get_where('enquiry_daily_rep',$where)->result_array();
   
        return $modelList;
    }
    
    
}
