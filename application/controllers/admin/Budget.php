<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Budget extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login_admin();
		$this->load->model('common_model');
	}
    public function index()
	{	
		$data['active'] = 'budget';
		$task = $this->input->post('task');
		if($this->input->post('submit')){
	        $this->common_model->task = $task;
	        $data['budgets'] = $this->common_model->get_budget_filter();
		}
		else{
		    $data['budgets'] = $this->common_model->get_budget();
		}
		$this->load->view('admin/budget/index',$data);
	}
    public function add_budget(){
        $data['active'] = 'budget';
        $data['tasks'] = $this->common_model->get_project();
        $data['employee'] = $this->common_model->get_employee();
        $data['directors'] = $this->common_model->get_employee_by_director();
        $data['managers'] = $this->common_model->project();
        $this->load->view('admin/budget/add_budget',$data);
    } 
    public function save_budget(){
        $this->common_model->task = $this->input->post('task');
        $this->common_model->category = $this->input->post('category');
        $this->common_model->sub_category = $this->input->post('sub_category');
        $this->common_model->amount = $this->input->post('amount');
        $this->common_model->upload_by = $this->input->post('upload_by');
		$this->common_model->template = $_FILES['template']['name'];
        $return_data = $this->common_model->add_budget();
        redirect($return_data['return_url']);
    }
    public function add_comment(){
        $this->common_model->comment = $this->input->post('comment');
        $this->common_model->task_id = $this->input->post('task_id');
        $return_data = $this->common_model->save_comment();
        redirect(base_url('admin/approve_budget'));
    }
    public function show_budget($id){
        $data['active'] = 'budget';
		$data['details'] = $this->common_model->get_budget_by_id($id);
		$this->load->view('admin/budget/show_budget',$data);
    }
    public function approve_budget(){
        $data['active'] = 'show_budget';
		$data['budgets'] = $this->common_model->get_budget();
		$this->load->view('admin/budget/approve_budget',$data);
    }
    
    public function download_csv(){
        // file name
        $filename = 'budget-'.date('d-m-Y').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
 
        // file creation
        $file = fopen('php://output', 'w');
 
        $header = array("Category","Sub-category","Item","Forecasted Budget");
        fputcsv($file, $header);
        $body = array(
            ['Budceden Kenar','Budceden Kenar','',''],
            ['Dizayn (Muhendislik)','cizgiler','',''],
            ['Dizayn (Muhendislik)','cizgiler','',''],
            ['Dizayn (Muhendislik)','Hesabatlar','',''],
            ['Dizayn (Muhendislik)','Xarici menbeden xidmet','',''],
            ['Dizayn (Muhendislik)','Xarici menbeden xidmet','',''],
            ['Dizayn (Muhendislik)','Program (lisenziya)','',''],
            ['Dizayn (Muhendislik)','Resmi Rusumlar','',''],
            ['Texnika','Aletler','',''],
            ['Texnika','Aletler','',''],
            ['Texnika','Aletler','',''],
            ['Texnika','Avadanliqlar','',''],
            ['Texnika','Avadanliqlar','',''],
            ['Texnika','Avadanliqlar','',''],
            ['Texnika','Kran','',''],
            ['Texnika','Kran','',''],
            ['Texnika','Ayaqalti','',''],
            ['Texnika','Ayaqalti','',''],
            ['Temir','Aletlerin Sertifikasiyasi','',''],
            ['Temir','Aletlerin kalibrasiyasi','',''],
            ['Temir','Aletlerin Temiri','',''],
            ['Iscilik','Ayaqalti Qurulmasi','',''],
            ['Iscilik','Isci gunluk','',''],
            ['Iscilik','Isci gunluk','',''],
            ['Iscilik','Isci gunluk','',''],
            ['Iscilik','Aluminium Profil Sexi','',''],
            ['Iscilik','Hazir mehsullarin Montaji','',''],
            ['Iscilik','Hazir mehsullarin Montaji','',''],
            ['Iscilik','Hazir mehsullarin MontajiInzibati Xercler','',''],
            ['Iscilik','Beton','',''],
            ['Inzibati Xercler','Telimler','',''],
            ['Inzibati Xercler','Telimler','',''],
            ['Inzibati Xercler','FMV (PPE)','',''],
            ['Inzibati Xercler','gida','',''],
            ['Inzibati Xercler','gida','',''],
            ['Inzibati Xercler','Ofis','',''],
            ['Inzibati Xercler','Ofis','',''],
            ['Inzibati Xercler','Ofis','',''],
            ['Inzibati Xercler','Ofis','',''],
            ['Inzibati Xercler','Ofis','',''],
            ['Inzibati Xercler','Isci Yerlesdirme','',''],
            ['Inzibati Xercler','Isci Yerlesdirme','',''],
            ['Inzibati Xercler','Yol','',''],
            ['Inzibati Xercler','Yol','',''],
            ['Inzibati Xercler','Ezamiyyet','',''],
            ['Inzibati Xercler','Ezamiyyet','',''],
            ['Inzibati Xercler','Ezamiyyet','',''],
            ['Material','Aluminium Profil','',''],
            ['Material','Aluminium Profil','',''],
            ['Material','Polad Profil','',''],
            ['Material','Panel','',''],
            ['Material','Panel','',''],
            ['Material','Aksesuar','',''],
            ['Material','suse','',''],
            ['Material','Izolyasiya','',''],
            ['Material','Izolyasiya','',''],
            ['Material','Izolyasiya','',''],
            ['Material','Izolyasiya','',''],
            ['Material','Izolyasiya','',''],
            ['Material','Aletlerin Tukenen hisseleri','',''],
            ['Material','Taxta','',''],
            ['Material','Sac','',''],
            ['Material','Sac','',''],
            ['Material','Sac','',''],
            ['Material','Beton','',''],
            ['Material','Beton','',''],
            ['Material','Beton','',''],
            ['Material','Xirdavat','',''],
            ['Material','Xirdavat','',''],
            ['Material','Xirdavat','',''],
            ['Material','Xirdavat','',''],
            ['Material','Xirdavat','',''],
            ['Material','Boya','',''],
            ['Hazir Mehsullar','Qapilar','',''],
            ['Hazir Mehsullar','Qapilar','',''],
            ['Hazir Mehsullar','Qapilar','',''],
            ['Hazir Mehsullar','Konteyner','',''],
            );
        foreach ($body as $fields) {
            fputcsv($file, $fields);
        }
 
        fclose($file);
        exit;
    }
    
    public function import_csv(){
        $data = array();
        $budData = array();
        $this->load->library('form_validation');
        $task = $this->input->post('task');
        $row = $this->common_model->get_employee_by_id($this->input->post('director'));
        $managerEmail = $this->common_model->get_employee_by_id($this->input->post('manager'))['email'];
        $requester = $this->common_model->get_employee_by_id($_SESSION['id'])['name'];
        // $item = $this->input->post('item');
        $directorEmail = $row['email'];
        $director = $row['name'];
        // If import request is submitted
        if($this->input->post('importSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                $insertCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                    // print_r($csvData);
                    // exit;
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        
                        $this->db->where('task',$task);
                        $this->db->delete('budget_tbl');
                        
                        $totalAmount = 0;
                        foreach($csvData as $row){ $rowCount++;
                            if(!empty($row['Forecasted Budget'])){
                                $totalAmount += $row['Forecasted Budget'];   
                            }
                            // $totalAmount += (int)$row['Total amount'];
                            // Prepare data for DB insertion
                            $budData = array(
                                'task' => $task,
                                'category' => $row['Category'],
                                'sub_category' => $row['Sub-category'],
                                'amount' => $row['Forecasted Budget'],
                                'total_amount' => $totalAmount,
                                // 'item' =>$item,
                                'upload_by' => $this->session->userdata('id'),
                                'director' => $this->input->post('director'),
                                'manager' => $this->input->post('manager'),
                                'free_text' => $row['Item'],
                                'date' => date('Y-m-d'),
                            );
                            $insert = $this->common_model->insert_csv($budData);
                            if($insert){
                                $insertCount++;
                            }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount));
                        // $this->message->set_message('Budget imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Not Inserted ('.$notAddCount.')',1);
                        
                        $emailcontent['director'] = $director;
                        $emailcontent['requester'] = $requester;
                        $mailBodyContent = $this->load->view('mailTemplates/upload-budget',$emailcontent,true);
                        $res = $this->cemail->do_mail("$directorEmail",null,null,'Upload Budget',$mailBodyContent);
                        if($res > 0){
                             $this->cemail->do_mail("$managerEmail",null,null,'Upload Budget',$mailBodyContent);
                        }
                    }
                }else{
                    $this->message->set_message('error on file upload, please try again.',0);
                }
            }else{
                $this->message->set_message('Invalid file, please select only CSV file.',0);
            }
        }
        redirect(base_url('admin/budget'));
    }
    
    public function file_check($str){
        $this->load->helper('file');
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function delete($id){
        $this->db->where('task',$id);
        $res = $this->db->delete('budget_tbl');
        // if($res > 0){
        //     $this->db->where('ID',$id);
        //     $this->db->delete('project');
        // }
        // $this->message->set_message('Project has been delete',1);
        redirect(base_url('admin/budget'));
    }
    public function approve($id){
	   $return_data = $this->common_model->get_approver_budget($id);
	   redirect(base_url('admin/approve_budget'));
	}
	public function reject($id){
	    $return_data = $this->common_model->get_reject_budget($id);
	    redirect(base_url('admin/approve_budget'));
	}
	public function download($id){
	    $filename = 'budget.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   /* get data */
		$usersData = $this->common_model->getbudget_byid($id);
		/* file creation */
		 $file = fopen('php://output', 'w');
		$header = array("Task Name","Category","Sub-category","Forecasted Budget"); 
		fputcsv($file, $header);
		foreach ($usersData as $data){ 
			fputcsv($file,array($data['task'],$data['category'],$data['sub_category'],$data['amount'])); 
		}
		fclose($file); 
		exit; 
	}
}
?>