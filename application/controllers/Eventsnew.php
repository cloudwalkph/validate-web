<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventsnew extends CI_Controller {

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
    }

    public function index()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }else{
            $this->db->order_by('_id', 'DESC');
            $query = $this->db->get('tblevents');
            $data['results'] = $query->result();
            $this->load->view('eventsnew', $data);
        }
    }

    public function addevents(){
        $this->form_validation->set_rules('e_name', 'Event Name', 'required');
        $this->form_validation->set_rules('e_jo', 'JO Number', 'required');
        $this->form_validation->set_rules('e_area', 'Area', 'required');
        $this->form_validation->set_error_delimiters('<script>toastr.error("', '");</script>');
        if ($this->form_validation->run() == FALSE){
            $this->db->order_by('_id', 'DESC');
            $query = $this->db->get('tblemployee');
            $data['results'] = $query->result();
            $this->load->view('addevents', $data);
        }else{
            $insert_data = array(
                'e_name'	=>	$this->input->post('e_name'),
                'e_jo'	    =>	$this->input->post('e_jo'),
                'e_area'	=>	$this->input->post('e_area'),
                'e_date'	=>	$this->input->post('e_date'),
                'p_date'	=>	$this->input->post('p_date'),
                'pe_date'	=>	$this->input->post('pe_date'),
                'evaluator'	=>	json_encode($this->input->post("evaluator")),
                'tls'	    =>	json_encode($this->input->post("tls")),
                'nego'	    =>	json_encode($this->input->post("nego")),
                'datecreated'	=>	time()
            );
            // print_r($insert_data);
            // print_r($this->session->userdata("empids"));
            $this->db->insert('tblevents',$insert_data);
            $this->syncdata->updatesync();
            $this->session->unset_userdata("empids");
            $this->session->unset_userdata("tlsids");
            $this->session->unset_userdata("nego");
            redirect('events');
        }
    }

    public function evaluator_check($str){
        $count = $this->input->post('evaluator');
        if ($count == 0){
            $this->form_validation->set_message('evaluator_check', 'The Evaluator is required.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function editevents($eid=null){
        $this->form_validation->set_rules('e_name', 'Event Name', 'required');
        $this->form_validation->set_rules('e_jo', 'JO Number', 'required');
        $this->form_validation->set_rules('e_area', 'Area', 'required');
        $this->form_validation->set_rules('evaluator', 'Evaluator', 'callback_evaluator_check');
        $this->form_validation->set_error_delimiters('<script>toastr.error("', '");</script>');
        if ($this->form_validation->run() == FALSE){
            $data['eid'] = $eid;
            $this->db->order_by('_id', 'DESC');
            $query = $this->db->get('tblemployee');
            $data['results'] = $query->result();
            $this->db->where('_id',$eid);
            $queryEvents = $this->db->get('tblevents');
            $data['result_event'] = $queryEvents->row();
            $query = $this->db->get('tblteamleader');
            $data['results_tls'] = $query->result();
            $query = $this->db->get('tblnegotiator');
            $data['results_nego'] = $query->result();
            $this->load->view('editevents', $data);
        }else{
            $update_data = array(
                'e_name'	=>	$this->input->post('e_name'),
                'e_jo'	=>	$this->input->post('e_jo'),
                'e_date'	=>	$this->input->post('e_date'),				'p_date'	=>	$this->input->post('p_date'),				'pe_date'	=>	$this->input->post('pe_date'),
                'evaluator'	=>	json_encode($this->input->post('evaluator')),
                'tls'	=>	json_encode($this->input->post('tls')),
                'nego'	=>	json_encode($this->input->post('nego'))
            );
//			 print_r($update_data);
            $this->db->where('_id',$eid);
            $this->db->update('tblevents',$update_data);
            $this->syncdata->updatesync();
            $this->session->unset_userdata("empids");
            $this->session->unset_userdata("tlsids");
            $this->session->unset_userdata("nego");
            redirect('events');
        }
    }

    public function addquestion(){
        $dept = $this->input->post('dept');
        $qid = $this->input->post('qid');

        $insert_data = array(
            'dept'	=>	$dept,
            'qnum'	=>	$qid
        );
        $this->db->insert('tblasignquestion',$insert_data);
        $this->syncdata->updatesync();
    }

    public function delevents(){
        $this->db->where('_id',$this->input->post('delid'));
        $this->db->delete('tblevents');
        $this->syncdata->updatesync();
        redirect('events');
    }

    public function results($type=null,$eid=null){
        switch($type){
            case 'event':
                $this->db->where('_id',$eid);
                $queryEvents = $this->db->get('tblevents');
                $data['result_event'] = $queryEvents->row();
                $data['eid'] = $eid;
                $data['type'] = 'events';
                $this->load->view('results', $data);
                break;
            case 'evaluator':

                break;
        }

    }

    public function resultsdp($type=null,$cat=null,$dept=null,$eid=null){
        switch($type){
            case 'event':
                $this->db->where('_id',$eid);
                $queryEvents = $this->db->get('tblevents');
                $data['result_event'] = $queryEvents->row();
                $data['cat'] = $cat;
                $data['dept'] = $dept;
                $data['eid'] = $eid;
                $data['type'] = 'events';
                /* Chart for Pre Event */
                $chartPreKeys = '';
                $chartPreEvent = array(
                    'Accounts'	=>	$this->rating->department(1,$eid,'pre'),
                    'Operations'	=>	$this->rating->department(2,$eid,'pre'),
                    'NegotiatorsAssesment'	=>	$this->rating->department(3,$eid,'pre'),
                    'ProjectManager'	=>	$this->rating->department(4,$eid,'pre'),
                    'TeamLeadersRating'	=>	$this->rating->department(5,$eid,'pre'),
                    'Setup'	=>	$this->rating->department(6,$eid,'pre'),
                    'SetupLeaderAssesment'	=>	$this->rating->department(7,$eid,'pre'),
                    'Production'	=>	$this->rating->department(8,$eid,'pre'),
                    'Inventory'	=>	$this->rating->department(9,$eid,'pre'),
                    'HumanResources'	=>	$this->rating->department(10,$eid,'pre')
                );
                $i = 1;
                foreach($chartPreEvent as $key=>$val){
                    $chartPreKeys .= "'".$key."'";
                    if($i != count($chartPreEvent)){
                        $chartPreKeys .= ",";
                    }
                    $i++;
                }

                /* Chart for Event Proper */
                $chartEPropKeys = '';
                $chartEProp = array(
                    'Accounts'	=>	$this->rating->department(1,$eid,'eprop'),
                    'Operations'	=>	$this->rating->department(2,$eid,'eprop'),
                    'Setup'	=>	$this->rating->department(6,$eid,'eprop'),
                    'Production'	=>	$this->rating->department(8,$eid,'eprop'),
                    'Inventory'	=>	$this->rating->department(9,$eid,'eprop'),
                    'HumanResources'	=>	$this->rating->department(10,$eid,'eprop')
                );
                $i = 1;
                foreach($chartEProp as $key=>$val){
                    $chartEPropKeys .= "'".$key."'";
                    if($i != count($chartEProp)){
                        $chartEPropKeys .= ",";
                    }
                    $i++;
                }

                /* Chart for Post Event */
                $chartPEventKeys = '';
                $chartPEvent = array(
                    'Accounts'	=>	$this->rating->department(1,$eid,'post'),
                    'Operations'	=>	$this->rating->department(2,$eid,'post'),
                    'Setup'	=>	$this->rating->department(6,$eid,'post'),
                    'Production'	=>	$this->rating->department(8,$eid,'post'),
                    'Inventory'	=>	$this->rating->department(9,$eid,'post'),
                    'HumanResources'	=>	$this->rating->department(10,$eid,'post')
                );
                $i = 1;
                foreach($chartPEvent as $key=>$val){
                    $chartPEventKeys .= "'".$key."'";
                    if($i != count($chartPEvent)){
                        $chartPEventKeys .= ",";
                    }
                    $i++;
                }
                $data['chartPEventKeys'] = $chartPEventKeys;
                $data['chartPEvent'] = $chartPEvent;
                $data['chartEPropKeys'] = $chartEPropKeys;
                $data['chartEProp'] = $chartEProp;
                $data['chartPreKeys'] = $chartPreKeys;
                $data['chartPreEvent'] = $chartPreEvent;
                $this->load->view('result_dp', $data);
                break;
            case 'evaluator':

                break;
        }

    }

    public function answer($ques=null){
        $this->form_validation->set_rules('ans', 'Answer', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->db->like('qname',urldecode($ques));
            $query = $this->db->get('tblquestions');
            $data['results'] = $query->result();
            $data['ques'] = $ques;
            $this->load->view('answer', $data);
        }else{
            $insert_data = array(
                'aneme'	=>	$this->input->post('ans'),
                'qnum'	=>	$this->input->post('question')
            );
            // print_r($this->input->post());
            $this->db->insert('tblanswer',$insert_data);
            $this->syncdata->updatesync();
            redirect('events/answer/'.$ques);
        }
    }

    public function addtlsquery(){
        $eid = $this->input->post('empid');
        $empids = array();
        if($this->session->userdata("tlsids")){
            $empids = $this->session->userdata("tlsids");
            // foreach($this->session->userdata("empids") as $row){
            array_push($empids,$eid);
            // }
            $this->session->unset_userdata("tlsids");
            $this->session->set_userdata("tlsids",$empids);
        }else{
            array_push($empids,$eid);
            $this->session->set_userdata("tlsids",$empids);
        }
    }

    public function removelistitemtls(){
        $eid = $this->input->post('empid');
        $newempids = array();
        if($this->session->userdata("tlsids")){
            $empids = $this->session->userdata("tlsids");
            foreach($empids as $key=>$val){
                if($val != $eid){
                    array_push($newempids,$val);
                }
            }
            $this->session->unset_userdata("tlsids");
            $this->session->set_userdata("tlsids",$newempids);
        }
    }

    public function getteamleaders(){
        $this->db->like('tfname',$this->input->post('emp'));
        $this->db->or_like('tlname',$this->input->post('emp'));
        $query = $this->db->get('tblteamleader');
        $res = $query->result();
        foreach($res as $row){
            if($this->session->userdata("tlsids")){
                if(!in_array($row->_id,$this->session->userdata("tlsids"))){
                    $data['empid'] = $row->_id;
                    $data['empname'] = $row->tfname.' '.$row->tlname;
                    $data['position'] = $row->temail;
                    $this->load->view('emplist',$data);
                }
            }else{
                $data['empid'] = $row->_id;
                $data['empname'] = $row->tfname.' '.$row->tlname;
                $data['position'] = $row->temail;
                $this->load->view('emplist',$data);
            }
        }
    }

    public function addnegoquery(){
        $eid = $this->input->post('empid');
        $empids = array();
        if($this->session->userdata("nego")){
            $empids = $this->session->userdata("nego");
            // foreach($this->session->userdata("empids") as $row){
            array_push($empids,$eid);
            // }
            $this->session->unset_userdata("nego");
            $this->session->set_userdata("nego",$empids);
        }else{
            array_push($empids,$eid);
            $this->session->set_userdata("nego",$empids);
        }
    }

    public function removelistitemnego(){
        $eid = $this->input->post('empid');
        $newempids = array();
        if($this->session->userdata("nego")){
            $empids = $this->session->userdata("nego");
            foreach($empids as $key=>$val){
                if($val != $eid){
                    array_push($newempids,$val);
                }
            }
            $this->session->unset_userdata("nego");
            $this->session->set_userdata("nego",$newempids);
        }
    }

    public function getnegotiators(){
        $this->db->like('nfname',$this->input->post('emp'));
        $this->db->or_like('nlname',$this->input->post('emp'));
        $query = $this->db->get('tblnegotiator');
        $res = $query->result();
        foreach($res as $row){
            if($this->session->userdata("nego")){
                if(!in_array($row->_id,$this->session->userdata("nego"))){
                    $data['empid'] = $row->_id;
                    $data['empname'] = $row->nfname.' '.$row->nlname;
                    $data['position'] = $row->nemail;
                    $this->load->view('emplist',$data);
                }
            }else{
                $data['empid'] = $row->_id;
                $data['empname'] = $row->nfname.' '.$row->nlname;
                $data['position'] = $row->nemail;
                $this->load->view('emplist',$data);
            }
        }
    }

    public function getemployee(){
        $this->db->like('emp_fname',$this->input->post('emp'));
        $this->db->or_like('emp_lname',$this->input->post('emp'));
        $query = $this->db->get('tblemployee');
        $res = $query->result();
        foreach($res as $row){
            if($this->session->userdata("empids")){
                if(!in_array($row->_id,$this->session->userdata("empids"))){
                    $data['empid'] = $row->_id;
                    $data['empname'] = $row->emp_fname.' '.$row->emp_lname;
                    $data['position'] = $row->emp_position.' - '.$row->emp_dept;
                    $this->load->view('emplist',$data);
                }
            }else{
                $data['empid'] = $row->_id;
                $data['empname'] = $row->emp_fname.' '.$row->emp_lname;
                $data['position'] = $row->emp_position.' - '.$row->emp_dept;
                $this->load->view('emplist',$data);
            }
        }

    }

    public function addevalquery(){
        $eid = $this->input->post('empid');
        $empids = array();
        if($this->session->userdata("empids")){
            $empids = $this->session->userdata("empids");
            // foreach($this->session->userdata("empids") as $row){
            array_push($empids,$eid);
            // }
            $this->session->unset_userdata("empids");
            $this->session->set_userdata("empids",$empids);
        }else{
            array_push($empids,$eid);
            $this->session->set_userdata("empids",$empids);
        }
    }

    public function removelist(){
        $this->session->unset_userdata("empids");
        $this->session->unset_userdata("tlsids");
        $this->session->unset_userdata("nego");
    }

    public function removelistitem(){
        $eid = $this->input->post('empid');
        $newempids = array();
        if($this->session->userdata("empids")){
            $empids = $this->session->userdata("empids");
            foreach($empids as $key=>$val){
                if($val != $eid){
                    array_push($newempids,$val);
                }
            }
            $this->session->unset_userdata("empids");
            $this->session->set_userdata("empids",$newempids);
        }
    }

    function getnegotls(){
        $deptid = $this->input->post('deptid');
        $deptcat = $this->input->post('deptcat');
        $eid = $this->input->post('eid');
        $value = $this->input->post('value');

        $this->db->where('_id',$eid);
        $evaluators = $this->db->get("tblevents");
        $eres = $evaluators->row();
        $data['tls'] = json_decode($eres->tls);
        $data['nego'] = json_decode($eres->nego);
        $data['evaluators'] = json_decode($eres->evaluator);

        $this->db->where('qdept',$deptid);
        $this->db->where('qcat',$deptcat);
        $getqs = $this->db->get("tblquestions");
        $resqs = $getqs->result();
        $data['eid'] = $eid;
        $data['resqs'] = $resqs;
        $this->load->view('qrecord', $data);
    }

    public function getquestion(){
        $deptid = $this->input->post('deptid');
        $deptcat = $this->input->post('deptcat');
        $data['deptid'] = $deptid;
        $eid = $this->input->post('eid');
        $this->db->where('qdept',$deptid);
        $this->db->where('qcat',$deptcat);
        $getqs = $this->db->get("tblquestions");
        $resqs = $getqs->result();
        $data['resqs'] = $resqs;
        $data['eid'] = $eid;
        $this->db->select('_id');
        $this->db->where('emp_dept','Account Executive');
        $queryAcounts = $this->db->get('tblemployee');
        $data['totalAccounts'] = $queryAcounts->result();
        $this->db->where('_id',$eid);
        $evaluators = $this->db->get("tblevents");
        $eres = $evaluators->row();
        $data['tls'] = json_decode($eres->tls);
        $data['nego'] = json_decode($eres->nego);
        $data['evaluators'] = json_decode($eres->evaluator);
        $this->load->view('questions',$data);
    }

    public function setquestiontype(){
        $qid = $this->input->post('qid');
        $setting = $this->input->post('setting');

        $update_data = array(
            qtype => $setting
        );

        $this->db->where('_id',$qid);
        $this->db->update('tblquestions',$update_data);
        $this->syncdata->updatesync();
    }

    public function getevents($eid=null){
        $events = array();
        $getevents = $this->db->get('tblevents');
        $result = $getevents->result();
        foreach($result as $row){
            $json = json_decode($row->evaluator);
            if(in_array($eid,$json)){
                $event_info = array(
                    '_id'	=>	$row->_id,
                    'name'	=>	$row->e_name,
                    'jo'	=>	$row->e_jo,
                    'date'	=>	$row->e_date,
                    'time'	=>	$row->e_time
                );
                array_push($events,$event_info);
            }
        }
        echo json_encode($events);
        // echo '{"id":"5","name":"Creamsilk","jo":"jo3333","date":"04\/06\/2016","time":"12:15 AM"}';
    }

    function eventDetails(){
        echo $this->grab->getEventDetails($this->input->post('eventId'));
    }
}
