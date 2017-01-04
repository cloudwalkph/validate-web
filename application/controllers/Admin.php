<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			redirect('employee');
		}
	}

	public function insertRecord(){
		$this->db->order_by('_id','DESC');

		$query = $this->db->get('newrec');
		$row = $query->row();
		$count = 0;
		$jsondata = json_decode($row->recordarray);
		foreach($jsondata as $key=>$value){
			$array_data = json_decode(json_encode($value), True);
			$this->db->where('_id',$array_data['_id']);
			$checkrecord = $this->db->get('tblrecords');
			if($checkrecord->num_rows() > 0){

			}else{
				$insert_data = array(
					'eid'	=>	$array_data['eid'],
					'qcat'	=>	$array_data['qcat'],
					'qevent'	=>	$array_data['qevent'],
					'qid'	=>	$array_data['qid'],
					'qans'	=>	$array_data['qans'],
					'tlid'	=>	$array_data['tlid'],
					'negoid'	=>	$array_data['negoid']
				);

				$this->db->insert('tblrecords',$insert_data);
			}
			$count++;
		}
		$this->db->truncate("newrec");
//		echo '<pre>';
//		print_r(json_decode($row->recordarray));
//		echo '</pre>';
	}

	//gettting all records
	public function getAllEmployee(){
        $r_arr = array();
		$query = $this->db->get('tblemployee');
//		$result = $query->result_array();
        if($query->num_rows() > 0) {
            foreach ($query->result() as $key=>$value) {
                $qfname_str = '';
                $qlname_str = '';
                $r_arr[$key]['_id'] = $value->_id;

                $qfname_str = strtolower($value->emp_fname);
                $qfname_str_uc = ucwords($qfname_str);
                $r_arr[$key]['emp_fname'] = $qfname_str_uc;

                $r_arr[$key]['emp_dept'] = $value->emp_dept;
                $r_arr[$key]['emp_email'] = $value->emp_email;
                $r_arr[$key]['emp_pass'] = $value->emp_pass;
                $r_arr[$key]['datecreated'] = $value->datecreated;
                $r_arr[$key]['emp_position'] = $value->emp_position;
                $r_arr[$key]['emp_stat'] = $value->emp_stat;

                $qlname_str = strtolower($value->emp_lname);
                $qlname_str_uc = ucfirst($qlname_str);
                $r_arr[$key]['emp_lname'] = $qlname_str_uc;

                $qmname_str = strtolower($value->emp_mname);
                $qmname_str_uc = ucfirst($qmname_str);
                $r_arr[$key]['emp_mname'] = $qmname_str_uc;
            }
        }
		print_r(json_encode($r_arr));
	}

	public function unSyncData(){
		$query = $this->db->get('tblsync');
		$result = $query->result_array();
		if($query->num_rows() > 0){
			echo 'yes';
		}else{
			echo 'no';
		}
	}

	public function getAllTls(){
        $r_arr = array();
		$query = $this->db->get('tblteamleader');
//		$result = $query->result_array();
        if($query->num_rows() > 0) {
            foreach ($query->result() as $key=>$value) {
                $qname_str = '';
                $r_arr[$key]['_id'] = $value->_id;

                $qname_str = strtolower($value->tfname);
                $qname_str_uc = ucwords($qname_str);
                $r_arr[$key]['tfname'] = $qname_str_uc;

                $qlame_str = strtolower($value->tlname);
                $qlame_str_uc = ucfirst($qlame_str);
                $r_arr[$key]['tlname'] = $qlame_str_uc;

                $r_arr[$key]['dateadded'] = $value->dateadded;
                $r_arr[$key]['temail'] = $value->temail;
                $r_arr[$key]['tevent'] = $value->tevent;
            }
        }
//        echo '<pre>';
//        print_r($r_arr);
		print_r(json_encode($r_arr));
	}

	public function getAllNego(){
		$query = $this->db->get('tblnegotiator');
		$result = $query->result_array();
//		$result = $query->result_array();
        if($query->num_rows() > 0) {
//            foreach ($query->result() as $row) {
            foreach ($query->result() as $key=>$value) {
                $qname_str = '';
                $r_arr[$key]['_id'] = $value->_id;

                $qname_str = strtolower($value->nfname);
                $qname_str_uc = ucwords($qname_str);
                $r_arr[$key]['nfname'] = $qname_str_uc;

                $qlame_str = strtolower($value->nlname);
                $qlame_str_uc = ucfirst($qlame_str);
                $r_arr[$key]['nlname'] = $qlame_str_uc;

                $r_arr[$key]['dateadded'] = $value->dateadded;
                $r_arr[$key]['nemail'] = $value->nemail;
            }
        }
//        echo '<pre>';
//        print_r($r_arr);
        print_r(json_encode($r_arr));
	}

	public function getAllQuestion(){
        $r_arr = array();
		$query = $this->db->get('tblquestions');
        if($query->num_rows() > 0) {
            foreach ($query->result() as $key=>$value) {
                $qname_str = '';
                $r_arr[$key]['_id'] = $value->_id;

                $qname_str = strtolower($value->qname);
                $qname_str_uc = ucfirst($qname_str);

                $r_arr[$key]['qname'] = $qname_str_uc;
                $r_arr[$key]['qdept'] = $value->qdept;
                $r_arr[$key]['qcat'] = $value->qcat;
                $r_arr[$key]['qtype'] = $value->qtype;
                $r_arr[$key]['qsub'] = $value->qsub;
                $r_arr[$key]['assigned_events'] = $value->qsub;
            }
        }
		print_r(json_encode($r_arr));
	}

	public function getAllEvents(){
		$query = $this->db->get('tblevents');
		$result = $query->result_array();
		print_r(json_encode($result));
	}

	public function getAllAsignQuestion(){
		$query = $this->db->get('tblasignquestion');
		$result = $query->result_array();
		print_r(json_encode($result));
	}

	public function saveRecord(){
	    echo $_POST['record'];
	    return false;
		$data = $_POST['record'];
		$insert_data = array(
			'recordarray'	=>	$data
		);

		$this->db->insert('newrec',$insert_data);
		$this->insertRecord();
	}

	public function updateSyncTable(){
		$this->db->truncate("tblsync");
	}
}
