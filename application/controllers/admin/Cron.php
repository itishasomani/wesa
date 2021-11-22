<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	public function add_year_total_leave(){
        $row = $this->db->get('emp_tbl')->result_array();
        foreach($row as $value){
            $ids[] = $value['id'];
        }
        
        $start_date = date('Y').'-01-01';
        $end_date = date('Y').'-12-31';
        
        $this->db->select('leave_manage_tbl.*, SUM(days) AS days', FALSE);
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where_in('name',$ids);
        $this->db->group_by("name");
        $row = $this->db->get('leave_manage_tbl')->result_array();
        foreach($row as $val){
            $data[] = array(
                'userid'=>$val['name'],
                'total_leave'=>$val['days'],
                'year'=>date('Y'),
                'date'=>date('Y-m-d')
            );
        }
        $this->db->insert_batch('year_leave_maintante_tbl',$data);
    }
}
