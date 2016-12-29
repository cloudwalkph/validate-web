<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
			$this->form_validation->set_rules('pword', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<script>toastr.error("', '");</script>');
			if ($this->form_validation->run() == FALSE){
					$this->load->view('login');
			}else{
				$this->session->set_userdata('logged_in',true);
				redirect('admin');
			}
		}else{			
			$this->session->sess_destroy();
			echo 'login';			
		}
	}
	
	public function username_check($str){
		if ($str != 'admin'){
			$this->form_validation->set_message('username_check', 'The Username or Password is incorrect.');
			return FALSE;		
		}else{
			if($this->input->post('pword') != 'admin'){
				$this->form_validation->set_message('username_check', 'The Username or Password is incorrect.');
				return FALSE;				
			}else{
				return TRUE;
			}	
		}
	}
	
	public function evaluator($email=null,$pass=null){
		$mail = urldecode($email);
		$pword = urldecode($pass);
		
		$this->db->where('emp_email',$mail);
		$this->db->where('emp_pass',$pword);
		$query = $this->db->get('tblemployee');
		$res = $query->row();		
		
		if($query->num_rows() > 0){
			echo '{"query_result":"SUCCESS","department":"'.$res->emp_dept.'","empid":"'.$res->_id.'"}';
		}else{
			echo '{"query_result":"FAILURE"}';
		}
	}
}
