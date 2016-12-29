<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rating extends CI_Model {
    
	function __construct() {
		//Call the model constructor
		parent::__construct();	
	}

	function answer($ansid=null,$eventid=null,$evaluators=null){
		$count = 0;
		$totalevaluators = count($evaluators);
		$evaluate = array();
		$this->db->where('qans',$ansid);
		$this->db->where('qevent',$eventid);
		$this->db->order_by('_id','desc');
		$get = $this->db->get('tblrecords');
		if($totalevaluators > 0) {
			if($get->num_rows()){
				$result = $get->result();
				foreach($result as $rows){
					if(in_array($rows->eid, $evaluators)){
						if(!in_array($rows->eid,$evaluate)){
							$count++;
							array_push($evaluate,$rows->eid);
						}
					}
				}
			}
			$count = floor(($count/$totalevaluators)*100);
		}

		return $count;
	}

	function getsinglerating($position=null,$items=null){
		$half = round($items/2);// =2
		$count = 0;
		if($position >= $half){
			if($position == $items){
				$count = 100;
			}else{
				$count = 50;
			}
		}

		return $count;
	}
	
	function department($dept=null,$eventid=null,$qcat=null){
		$deptscore = 0;
		$this->db->where('qdept',$dept);
		$this->db->where('qcat',$qcat);
		$query = $this->db->get('tblquestions');
		if($query->num_rows() > 0){
			$ques_array = array();
			foreach($query->result() as $row){
				$this->db->where('qnum',$row->_id);
				$getans = $this->db->get("tblanswer");
				if($getans->num_rows() > 0){
					$ans_array = array();
					foreach($getans->result() as $rowans){
						$getemp = $this->db->get("tblemployee");
						$emp_array = array();
						if($getemp->num_rows() > 0){
							$ares = $getemp->result();
							foreach($ares as $row){
								array_push($emp_array,$row->_id);
							}
						}
						$ansscore = $this->rating->answer($rowans->_id,$eventid,$emp_array);
						array_push($ans_array,$ansscore);
					}
					$totalans = count($ans_array)*100;
					$count = array_sum($ans_array);
					$count = floor(($count/$totalans)*100);
					array_push($ques_array,$count);
				}
			}
			if(count($ques_array) > 0){
				$totalques = count($ques_array)*100;
				$deptscore = array_sum($ques_array);
				$deptscore = floor(($deptscore/$totalques)*100);
			}
		}
		
		return $deptscore;
	}
	
	function category($eventid=null,$cat=null){
		$catscore = 0;
		$cat_array = array();
		if($cat == 'pre'){
			$cat_array = array(
				'Accounts'	=>	$this->department(1,$eventid,'pre'),
				'Operations'	=>	$this->department(2,$eventid,'pre'),
				'NegotiatorsAssesment'	=>	$this->department(3,$eventid,'pre'),
				'ProjectManager'	=>	$this->department(4,$eventid,'pre'),
				'TeamLeadersRating'	=>	$this->department(5,$eventid,'pre'),
				'Setup'	=>	$this->department(6,$eventid,'pre'),
				'SetupLeaderAssesment'	=>	$this->department(7,$eventid,'pre'),
				'Production'	=>	$this->department(8,$eventid,'pre'),
				'Inventory'	=>	$this->department(9,$eventid,'pre'),
				'HumanResources'	=>	$this->department(10,$eventid,'pre')
			);
		}else{
			$cat_array = array(
				'Accounts'	=>	$this->department(1,$eventid,$cat),
				'Operations'	=>	$this->department(2,$eventid,$cat),
				'Setup'	=>	$this->department(6,$eventid,$cat),
				'Production'	=>	$this->department(8,$eventid,$cat),
				'Inventory'	=>	$this->department(9,$eventid,$cat),
				'HumanResources'	=>	$this->department(10,$eventid,$cat)
			);
		}
		
		if(count($cat_array) > 0){
			$totalques = count($cat_array)*100;
			$catscore = array_sum($cat_array);
			$catscore = ($catscore/$totalques)*100;
		}
		
		return $catscore;
	}
}
?>