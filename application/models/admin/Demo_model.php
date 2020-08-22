<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Demo_model extends CI_Model {

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
    function checkuser() {
        $this->session->userdata()['__ci_last_regenerate'];
        $this->db->where('login_session_id', $this->session->userdata()['__ci_last_regenerate']);
        return $user = $this->db->get(' login_data')->result_array();
    }
    
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
    
}
