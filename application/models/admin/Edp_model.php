<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Edp_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function allDataFrom($table, $param, $from, $to) {
        
        $toNxt = new DateTime($to);
        $toNxt->modify('+1 day');
        $to = date_format($toNxt,"Y-m-d");
        $where = ("$param BETWEEN '$from' AND '$to'");
        return $this->db->get_where($table, $where)->result_array();
    }

    public function allData($table) {
        if ($table == 'employe_table') {
            $s = array('employe_table_employe_id', 'employe_table_employe_name', 'employe_table_employe_pass', 'employe_table_employe_mobile', 'employe_table_employe_SIM_given', 'employe_table_employe_email', 'employe_table_employe_address', 'employe_table_employe_created_on', 'employe_table_employe_group_id', 'employe_table_employe_status');
            $this->db->select($s);
            $data = $this->db->get($table)->result_array();

            return $data;
        }
        return $this->db->get($table)->result_array();
    }

    public function allDataParamFrom($table, $param, $from, $to, $idParam, $id) {
           $toNxt = new DateTime($to);
        $toNxt->modify('+1 day');
        $to = date_format($toNxt,"Y-m-d");
        $where = ("$param BETWEEN '$from' AND '$to' AND $idParam=$id");
        return $this->db->get_where($table, $where)->result_array();
    }

    public function allDataParamWhere($table, $param, $id) {
        return $this->db->get_where($table, array($param => $id))->result_array();
    }

    public function selectAppenderAll($col, $table) {
        $this->db->distinct();
        $this->db->order_by($col);
        $this->db->select($col);
        return $this->db->get($table)->result_array();
    }

    public function selectAppenderWithID($col, $table, $idCol) {
        $select = array($idCol, $col);
        $this->db->select($select);
        return $this->db->get($table)->result_array();
    }

    public function selectAppenderWithIDWhere($col, $table, $idCol, $whParam, $wh) {
        if ($table == 'employe_table')
            $this->db->where('employe_table_employe_status', 1);
        if ($table == 'employe_group_table')
            $this->db->where('employe_group_status', 1);
        $select = array($idCol, $col);
        $this->db->where($whParam, $wh);
        $this->db->select($select);
        return $this->db->get($table)->result_array();
    }

    public function deleter($id, $table, $param) {
        $this->db->where($param, $id);
        $flag = false;
        if ($table == 'employe_table') {
            $s = array('employe_table_id', 'employe_table_employe_hierarchy');
            $this->db->select($s);
            $this->db->where('employe_table_employe_id', $id);
            $incmentID = $this->db->get('employe_table')->result_array();
            if ($incmentID[0]['employe_table_employe_hierarchy'] != 7) {
                $this->db->select('employe_group_table_id');
                $this->db->where('employe_group_table_leader_employee_id', $incmentID[0]['employe_table_id']);
                $grpID = $this->db->get('employe_group_table')->result_array();
                $this->db->where('employe_table_employe_group_id', $grpID[0]['employe_group_table_id']);
                $this->db->from('employe_table');
                $cnt = $this->db->count_all_results();
                if ($cnt == 0)
                    $flag = true;
            } else
                $flag = true;
            if ($flag == true) {
                $this->db->where($param, $id);
                $this->db->update('employe_table', array('employe_table_employe_status' => 0));
            } else
                return 0;
        } elseif ($table == 'employe_group_table') {
            $this->db->get('employe_group_table');
            // $this->db->select('employe_table_employe_group_id');
            $this->db->where('employe_table_employe_group_id', $id);
            $this->db->from('employe_table');
            $cnt = $this->db->count_all_results();
            if ($cnt == 0)
                $flag = true;
            if ($flag == true) {
                $this->db->where($param, $id);
                $this->db->update('employe_group_table', array('employe_group_status' => 0));
                return 1;
            } else
                return 0;
        } else {
            $this->db->delete($table);
        }
        return 1;
    }

    public function updateTable($updateArr, $table, $id, $param) {
        $this->db->where($param, $id);
        $this->db->update($table, $updateArr);

        return $param;
    }

    function addTable($table, $data) {
        $respose = false;
        if ($this->db->insert($table, $data)) {
            $respose = true;
        }
        return $respose;
    }

    public function whereJsoniser($id, $table, $param) {

        $this->db->where($param, $id);
        $data = $this->db->get($table)->result_array();

        $this->db->select('access_name');
        $this->db->where('access_controllers_value', $data[0]['employe_table_access_level']);
        $data[0]['employe_table_access_level_ID'] = $data[0]['employe_table_access_level'];
        $data[0]['employe_table_access_level'] = $this->db->get('access_control_list')->result_array()[0]['access_name'];

        $this->db->select('employe_group_table_name');
        $this->db->where('employe_group_table_id', $data[0]['employe_table_employe_group_id']);
        $data[0]['employe_table_employe_group_id_ID'] = $data[0]['employe_table_employe_group_id'];
        $data[0]['employe_table_employe_group_id'] = $this->db->get('employe_group_table')->result_array()[0]['employe_group_table_name'];

        $this->db->select('h_name');
        $this->db->where('h_ID', $data[0]['employe_table_employe_hierarchy']);
        $data[0]['employe_table_employe_hierarchy_ID'] = $data[0]['employe_table_employe_hierarchy'];
        $data[0]['employe_table_employe_hierarchy'] = $this->db->get(' hierarchy')->result_array()[0]['h_name'];

        $this->db->select('services_name');
        $this->db->where('services_id', $data[0]['employe_table_employe_service_id']);
        $data[0]['employe_table_employe_service_id_ID'] = $data[0]['employe_table_employe_service_id'];
        $data[0]['employe_table_employe_service_id'] = $this->db->get('services')->result_array()[0]['services_name'];

        if ($data[0]['under_ASM_EmpId'] != 0) {
            $this->db->select('employe_table_employe_name');
            $this->db->where('employe_table_employe_id', $data[0]['under_ASM_EmpId']);
            $data[0]['under_ASM_EmpId_ID'] = $data[0]['under_ASM_EmpId'];
            $data[0]['under_ASM_EmpId'] = $this->db->get('employe_table')->result_array()[0]['employe_table_employe_name'];
        } else {
            $data[0]['under_ASM_EmpId'] = 'Not Given';
            $data[0]['under_ASM_EmpId_ID'] = 0;
        }
        if ($data[0]['under_SM_EmpId'] != 0) {
            $this->db->select('employe_table_employe_name');
            $this->db->where('employe_table_employe_id', $data[0]['under_SM_EmpId']);
            $data[0]['under_SM_EmpId_ID'] = $data[0]['under_SM_EmpId'];
            $data[0]['under_SM_EmpId'] = $this->db->get('employe_table')->result_array()[0]['employe_table_employe_name'];
        } else {
            $data[0]['under_SM_EmpId'] = 'Not Given';
            $data[0]['under_SM_EmpId_ID'] = 0;
        }
        if ($data[0]['under_RM_EmpId'] != 0) {
            $this->db->select('employe_table_employe_name');
            $this->db->where('employe_table_employe_id', $data[0]['under_RM_EmpId']);
            $data[0]['under_RM_EmpId_ID'] = $data[0]['under_RM_EmpId'];
            $data[0]['under_RM_EmpId'] = $this->db->get('employe_table')->result_array()[0]['employe_table_employe_name'];
        } else {
            $data[0]['under_RM_EmpId'] = 'Not Given';
            $data[0]['under_RM_EmpId_ID'] = 0;
        }
        if ($data[0]['under_TL_EmpId'] != 0) {
            $this->db->select('employe_table_employe_name');
            $this->db->where('employe_table_employe_id', $data[0]['under_TL_EmpId']);
            $data[0]['under_TL_EmpId_ID'] = $data[0]['under_TL_EmpId'];
            $data[0]['under_TL_EmpId'] = $this->db->get('employe_table')->result_array()[0]['employe_table_employe_name'];
        } else {
            $data[0]['under_TL_EmpId'] = 'Not Given';
            $data[0]['under_TL_EmpId_ID'] = 0;
        }
        return $data;
    }

    public function whereGrpJsoniser($id, $table, $param) {



        $this->db->where($param, $id);

        $data = $this->db->get($table)->result_array();
        $this->db->select('employe_table_employe_id');
        $this->db->where('employe_table_id', $data[0]['employe_group_table_leader_employee_id']);
        $data[0]['employe_group_table_leader_employee_id_ID'] = $data[0]['employe_group_table_leader_employee_id'];
        $data[0]['employe_group_table_leader_employee_id'] = $this->db->get('employe_table')->result_array()[0]['employe_table_employe_id'];

        $this->db->select('employe_group_table_name');
        $this->db->where('employe_group_table_id', $data[0]['parent']);
        $data[0]['parent_ID'] = $data[0]['parent'];
        $data[0]['parent'] = $this->db->get('employe_group_table')->result_array()[0]['employe_group_table_name'];
        return $data;
    }

    public function help() {

        return 0;
    }

    public function simpleWhereJsoniser($id, $table, $param) {
        $select = array('extra_desc', 'steps');
        $this->db->select($select);
        $this->db->where($param, $id);
        $data = $this->db->get($table)->result_array();
        return $data;
    }

    public function accessJsoniser($id, $table, $param) {
        $select = array('access_controller', 'access_method', 'menu_name');
        $this->db->select($select);
        $this->db->where($param, $id);
        $data = $this->db->get($table)->result_array();
        return $data;
    }

    public function insertAccess($arr, $accName) {
        $this->db->select('MAX(access_list_id) as linkId');
        $this->db->from('access_control_list');
        $linkID = $this->db->get()->result_array()[0]['linkId'];
        $linkID = (int) $linkID + 1; //TO get next higher value since its auto incremental
        $ins = array(
            'access_name' => $accName,
            'access_controllers_value' => $linkID
        );

        $this->db->insert('access_control_list', $ins); // insert the name to set the name of access and link it
        foreach ($arr as $value) {
            $info = $this->db->get_where('access_full_list', array('access_id' => $value))->result_array();

            $ctrl = $info[0]['controller'];
            $meth = $info[0]['method'];
            $icon = $info[0]['icon'];
            $name = $info[0]['name'];
            $ins = array(
                'access_link_ID' => $linkID,
                'access_controller' => $ctrl,
                'access_method' => $meth,
                'fonts' => $icon,
                'menu_name' => $name
            );
            $this->db->insert('access_controls', $ins);
        }
        return $linkID;
    }

    function changePassword($emp_id, $pass) {
        $empL = $this->db->get_where('employe_table',array('employe_table_employe_id'=>$emp_id));
       if( !$empL->num_rows() > 0) return false;


        if (!empty($pass)) {
            $update = array('employe_table_employe_pass' => sha1($pass));
            $where = array(
                'employe_table_employe_id' => $emp_id
            );
            $this->db->where($where);
            $emp = $this->db->update('employe_table', $update);
            $this->db->where('login_emp_id', $emp_id);
            $this->db->update('login_data', array('login_session_is_set' => 0));
            return true;
        } else {
            return false;
        }
    }

    function checkuser() {
        $this->session->userdata()['__ci_last_regenerate'];
        $this->db->where('login_session_id', $this->session->userdata()['__ci_last_regenerate']);
        return $user = $this->db->get(' login_data')->result_array();
    }

    public function inventoryJsoniser($id, $table, $param) {
        return $this->db->get_where($table, array($param => $id))->result_array();
    }

    function get_details($table, $field) {
        $this->db->distinct($field);
        $this->db->select($field);
        return $this->db->get($table)->result_array();
    }

    function get_details_validation($table, $field) {
        $this->db->distinct($field);
        $this->db->select($field);
        return $this->db->get($table)->result_array();
    }

}
