<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
	}
	public function index()
	{	
		$data['active'] = 'project';
        $data['projects'] = $this->common_model->get_project();
        $data['name'] = $this->common_model->get_task_name();
		$this->load->view('admin/project/index',$data);
	}
    public function add_project()
	{	
		$data['active'] = 'project';
        $data['employee'] = $this->common_model->get_employee();
		$this->load->view('admin/project/add_project',$data);
	}
    public function save_project(){
        $this->common_model->task_name = $this->input->post('task_name');
        $this->common_model->address_1 = $this->input->post('address_1');
        $this->common_model->address_2 = $this->input->post('address_2');
        $this->common_model->address_3 = $this->input->post('address_3');
        // $this->common_model->emp_name = $this->input->post('emp_name');
        $return_data = $this->common_model->add_project();
		redirect($return_data['return_url']);
    }
    public function edit_project($id){
        $data['active'] = 'edit_project';
        $data['employee'] = $this->common_model->get_employee();
        $data['project'] = $this->common_model->get_project_by_id($id);
		$this->load->view('admin/project/edit_project',$data);
    }
    public function project_edit(){
        $this->common_model->id = $this->input->post('id');
        $this->common_model->task_name = $this->input->post('task_name');
        $this->common_model->address_1 = $this->input->post('address_1');
        $this->common_model->address_2 = $this->input->post('address_2');
        $this->common_model->address_3 = $this->input->post('address_3');
        // $this->common_model->emp_name = $this->input->post('emp_name');
        $return_data = $this->common_model->edit_project();
		// $this->message->set_message($return_data['response_msg'],$return_data['response_status']);
		redirect($return_data['return_url']);
    }
    public function delete_project($id){
        $row = $this->common_model->get_project_by_id($id);		
		$this->db->where('id',$id);
		$this->db->delete('project');
        redirect(base_url('admin/project'));
    }
    public function filter(){
    $projects = $this->db->get('project')->result_array();
        $i = 1;
        foreach($projects as $project): ?>
            <tr class="odd">
                <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                <td><?php echo $project['task_name'];?></td>
                <td><?php echo $project['address_1'];?></td>
                <td><?php echo $project['address_2'];?></td>
                <td><?php echo $project['address_3'];?></td>
                <!--<td><?php echo $project['emp_name'];?></td>-->
                <td>
                    <a href="<?php echo base_url('admin/project/edit_project/'.$project['id'])?>" class="btn btn-success">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="<?php echo base_url('admin/project/delete_project/'.$project['id'])?>" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?><?php
	}

    public function task_filter(){
    $task = $_GET['task_name'];
    $projects = $this->db->get_where('project',['task_name'=>$task])->result_array();
        $i = 1;
        foreach($projects as $project): ?>
            <tr class="odd">
                <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                <td><?php echo $project['task_name'];?></td>
                <td><?php echo $project['address_1'];?></td>
                <td><?php echo $project['address_2'];?></td>
                <td><?php echo $project['address_3'];?></td>
                <!--<td><?php echo $project['emp_name'];?></td>-->
                <td>
                    <a href="<?php echo base_url('admin/project/edit_project/'.$project['id'])?>" class="btn btn-success">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="<?php echo base_url('admin/project/delete_project/'.$project['id'])?>" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?><?php
	}

	public function employee_filter(){
    $task = $_GET['emp_name'];
    $projects = $this->db->get_where('project',['emp_name'=>$task])->result_array();
        $i = 1;
        foreach($projects as $project): ?>
            <tr class="odd">
                <td class="dtr-control" tabindex="0"><?php echo $i++;?></td>
                <td><?php echo $project['task_name'];?></td>
                <td><?php echo $project['address_1'];?></td>
                <td><?php echo $project['address_2'];?></td>
                <td><?php echo $project['address_3'];?></td>
                <!--<td><?php echo get_emp_by_id($project['emp_name'])['name'];?> <?php echo get_emp_by_id($project['emp_name'])['surname'];?></td>-->
                <td>
                    <a href="<?php echo base_url('admin/project/edit_project/'.$project['id'])?>" class="btn btn-success">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="<?php echo base_url('admin/project/delete_project/'.$project['id'])?>" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?><?php
   
	}
	public function task($id){
	    $return_data = $this->common_model->get_task($id);
	    redirect(base_url('admin/project'));
	}
}
?>