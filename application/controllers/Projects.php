<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

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

    function __construct()
    {
        //Call the model constructor
        parent::__construct();
        $this->load->model('Get_model','getq');
        $this->load->model('Insert_mod','ins');
        $this->load->model('Update_mod','ups');
        $this->load->model('Delete_mod','del');
    }

    public function index()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }else{
            $this->db->order_by('_id', 'ASC');
            $query = $this->db->get('tblquestions');
            $data['results'] = $query->result();
//            $this->load->view('questions_all', $data);
            $this->load->view('event_size', $data);
        }
//        $this->load->view('questions_all');
    }

    function inputprojects(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }else{
            $this->db->order_by('_id', 'ASC');
            $query = $this->db->get_where('tblquestions', array('qtype'=> $this->input->get('e')));
            $data['results'] = $query->result();
//            $this->load->view('questions_all', $data);
            $this->load->view('questions_all_v2', $data);
        }
    }

    function get_question(){
        echo $this->getq->get_data_question($this->input->post('quest_id'));
    }

    function update_question(){
//        print_r($this->input->post());
        echo $this->ups->up_quest($this->input->post());
        $this->syncdata->updatesync();
    }

    function assign_dept(){
//        print_r($this->input->post());
        echo $this->ins->ins_quest($this->input->post());
        $this->syncdata->updatesync();
    }

    function del_question(){
//        print_r($this->input->post());
        echo $this->del->del_quest($this->input->post('quest_id'));
        $this->syncdata->updatesync();
    }

    function del_quest(){
        $this->db->where('_id',$this->input->post('delid'));
        $this->db->delete('tblquestions');
        $this->syncdata->updatesync();
        redirect('questions');
    }

    function AssignToEvent(){
        echo $this->ins->AssignToQuestion($this->input->post());
    }

    function EventsByType(){
        echo $this->getq->get_events( $this->input->post('event_type') );
    }

    function summary(){
        $data['getQuestionInfo'] = $this->getq->getQuestionInfo( $this->input->get('a') );
        $this->load->view('summary', $data);
    }
}
