<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leader extends CI_Controller {

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
            redirect('login');
        }else{
            $this->db->order_by('_id', 'DESC');
            $query = $this->db->get('tblteamleader');
            $data['results'] = $query->result();
            $this->load->view('leader', $data);
        }
    }

    public function addleader(){
        $this->form_validation->set_rules('emp_lname', 'Lastname', 'required');
        $this->form_validation->set_rules('emp_fname', 'Firstname', 'required');
        $this->form_validation->set_rules('emp_event_type', 'Event', 'required');
        $this->form_validation->set_rules('emp_email', 'Email', 'required|is_unique[tblteamleader.temail]');
        $this->form_validation->set_error_delimiters('<script>toastr.error("', '");</script>');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('addleader');
        }else{
            $insert_data = array(
                'tfname'	=>	$this->input->post('emp_fname'),
                'tlname'	=>	$this->input->post('emp_lname'),
                'temail'	=>	$this->input->post('emp_email'),
                'tevent'	=>	$this->input->post('emp_event_type'),
                'dateadded'	=>	time()
            );

            $this->db->insert('tblteamleader',$insert_data);
            $this->syncdata->updatesync();
            redirect('leader');
        }
    }

    public function editleader($edit_id=null){
        $this->form_validation->set_rules('emp_lname', 'Lastname', 'required');
        $this->form_validation->set_rules('emp_fname', 'Firstname', 'required');
        $this->form_validation->set_rules('emp_email', 'Email', 'required');
        $this->form_validation->set_error_delimiters('<script>toastr.error("', '");</script>');
        if ($this->form_validation->run() == FALSE){
            $data['eid'] = $edit_id;
            $this->db->where('_id',$edit_id);
            $query = $this->db->get('tblteamleader');
            $data['results'] = $query->row();
            $this->load->view('editleader',$data);
        }else{
            $update_data = array(
                'tfname'	=>	$this->input->post('emp_fname'),
                'tlname'	=>	$this->input->post('emp_lname'),
                'temail'	=>	$this->input->post('emp_email')
            );
            $this->db->where('_id',$edit_id);
            $this->db->update('tblteamleader',$update_data);
            $this->syncdata->updatesync();
            redirect('leader');
        }
    }

    public function delleader(){
        $this->db->where('_id',$this->input->post('delid'));
        $this->db->delete('tblteamleader');
        $this->syncdata->updatesync();
        redirect('leader');
    }
}
