<?php
	$deptscore = 0;
	$this->db->where('qdept',1);
	$this->db->where('qcat','pre');
	$query = $this->db->get('tblquestions');
	if($query->num_rows() > 0){
		$ques_array = array();
		foreach($query->result() as $row){
			$this->db->where('qnum',$row->id);
			$getans = $this->db->get("tblanswer");
			$ans_array = array();
			foreach($getans->result() as $rowans){				
				$getemp = $this->db->get("tblemployee");
				$emp_array = array();
				if($getemp->num_rows() > 0){
					$ares = $getemp->result();
					foreach($ares as $row){
						array_push($emp_array,$row->id);
					}
				}
				$ansscore = $this->rating->answer($rowans->id,5,$emp_array);
				array_push($ans_array,$ansscore);
			}
			$totalans = count($ans_array)*100;
			$count = array_sum($ans_array);
			$count = floor(($count/$totalans)*100);
			array_push($ques_array,$count);
		}
		$totalques = count($ques_array)*100;
		$deptscore = array_sum($ques_array);
		$deptscore = floor(($deptscore/$totalques)*100);
		echo $deptscore.'<br/>';
		print_r($ques_array);
	}
?>

<?php echo form_open('events/answer/'.$ques); ?>

<select name="question">
	<?php
		foreach($results as $row){
	?>
			<option value="<?php echo $row->_id ?>"><?php echo $row->_id.' - '.$row->qname.' - '.$row->qcat.' - '.$row->qdept; ?></option>
	<?php
		}
	?>
</select>
<input type="text" name="ans" />
<button type="submit">Submit</button>
</form>