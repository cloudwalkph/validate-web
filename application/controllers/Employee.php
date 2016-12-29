<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct ();
        $this->load->model('get_model', 'grab');
//        $this->load->library('pagination');
//        $this->load->library('table');
    }

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}else{			
			$this->db->order_by('_id', 'DESC');
			$query = $this->db->get('tblemployee');
			$data['results'] = $query->result();
			$this->load->view('employee', $data);
		}
	}
	
	public function addemployee(){
		$this->form_validation->set_rules('emp_dept', 'Department', 'required');
		$this->form_validation->set_rules('emp_lname', 'Lastname', 'required');
		$this->form_validation->set_rules('emp_fname', 'Firstname', 'required');
		$this->form_validation->set_rules('emp_email', 'Email', 'required|is_unique[tblemployee.emp_email]');
		$this->form_validation->set_rules('emp_pos', 'Position', 'required');
		$this->form_validation->set_error_delimiters('<script>toastr.error("', '");</script>');
		if ($this->form_validation->run() == FALSE){
				$this->load->view('addemployee');
		}else{
			$insert_data = array(
				'emp_fname'	=>	$this->input->post('emp_fname'),
				'emp_mname'	=>	$this->input->post('emp_mname'),
				'emp_lname'	=>	$this->input->post('emp_lname'),
				'emp_position'	=>	$this->input->post('emp_pos'),
				'emp_pass'	=>	'12345',
				'emp_email'	=>	$this->input->post('emp_email'),
				'emp_dept'	=>	$this->input->post('emp_dept'),
				'datecreated'	=>	time()
			);
			
			$this->db->insert('tblemployee',$insert_data);
			$this->syncdata->updatesync();
			redirect('employee');
		}
	}
	
	public function editemployee($edit_id=null){
		$this->form_validation->set_rules('emp_dept', 'Department', 'required');
		$this->form_validation->set_rules('emp_lname', 'Lastname', 'required');
		$this->form_validation->set_rules('emp_fname', 'Firstname', 'required');
		$this->form_validation->set_rules('emp_email', 'Email', 'required');
		$this->form_validation->set_rules('emp_pass', 'Password', 'required');
		$this->form_validation->set_rules('emp_pos', 'Position', 'required');
		$this->form_validation->set_error_delimiters('<script>toastr.error("', '");</script>');
		if ($this->form_validation->run() == FALSE){
				$data['eid'] = $edit_id;
				$this->db->where('_id',$edit_id);
				$query = $this->db->get('tblemployee');
				$data['results'] = $query->row();
				$this->load->view('editemployee',$data);
		}else{
			$update_data = array(
				'emp_fname'	=>	$this->input->post('emp_fname'),
				'emp_mname'	=>	$this->input->post('emp_mname'),
				'emp_lname'	=>	$this->input->post('emp_lname'),
				'emp_position'	=>	$this->input->post('emp_pos'),
				'emp_email'	=>	$this->input->post('emp_email'),
				'emp_pass'	=>	$this->input->post('emp_pass'),
				'emp_dept'	=>	$this->input->post('emp_dept')
			);
			$this->db->where('_id',$edit_id);
			$this->db->update('tblemployee',$update_data);
			$this->syncdata->updatesync();
			redirect('employee');
		}
	}
	
	public function delemployee(){
		$this->db->where('_id',$this->input->post('delid'));
		$this->db->delete('tblemployee');
		$this->syncdata->updatesync();
		redirect('employee');
	}

	public function getEmployees(){
        echo $this->grab->loadEmployee($this->input->post());
	}

	public function getEmployee(){
        echo $this->grab->grabEmployeeById($this->input->post('tmpo'));
	}

	public function getRaterAndRatee(){
        echo $this->grab->grabRaterAndRateeById($this->input->post());
	}
	
	public function syncdata($meid=null,$mqcat=null,$mqevent=null,$mqid=null,$mqans=null){
		$meid = urldecode($meid);
		$mqcat = urldecode($mqcat);
		$mqevent = urldecode($mqevent);
		$mqid = urldecode($mqid);
		$mqans = urldecode($mqans);
		//print_r($data);
		$insert_array = array(
			"eid" => $meid,
			"qcat" => $mqcat,
			"qevent" => $mqevent,
			"qid" => $mqid,
			"qans" => $mqans,
			"dateadded" => time()
		);
		$this->db->insert('tblrecords',$insert_array);
		$jsondata = array(
			"query_result" => "SUCCESS",
			"record"	=>	$meid.'-'.$mqcat.'-'.$mqevent.'-'.$mqid.'-'.$mqans
		);
		//echo '{"query_result":"SUCCESS"}';
		print_r(json_encode($jsondata));
	}
}
