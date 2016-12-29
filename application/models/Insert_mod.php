<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert_mod extends CI_Model
{

    function __construct()
    {
        //Call the model constructor
        parent::__construct();
    }

    function ins_quest($a){

        $query = $this->db->get_where('tblasignquestion', array('qnum' => $a['e_id'],'dept' => ucfirst($a['e_dept'])));
        if ($query->num_rows() == 0)
        {
            $data = array(
                'dept'   => ucfirst($a['e_dept']),
                'qnum'   => $a['e_id']
            );

            $this->db->insert( 'tblasignquestion', $data );

            $insid = $this->db->insert_id();

            $arr_data = array();

            $query = $this->db->get_where('tblasignquestion', array('_id' => $insid));
            if ($query->num_rows() > 0)
            {
                $quest = $query->row();

                $arr_data['depts'] = '
                        <tr id="assignrow'. $quest->_id .'">
                            <td style="width: 100%">'.$quest->dept.'</td>
                            <td><a href="#" style="margin-top:10px;" class="btn btn-danger btn-rounded fullwidth btn_del_dept" alt="'. $quest->_id .'">Delete</a></td>
                        </tr>
                        ';
            }
        }else{
            $arr_data['emsg'] = ucfirst($a['e_dept']).' department already exists in this question.';
        }

        return json_encode($arr_data);
    }

    function AssignToQuestion($a){
        $query = $this->db->get_where('tblasignquestion', array('qnum' => $a['e_id'],'dept' => ucfirst($a['e_dept']),'qevent' => $a['event_assignment']));
        if ($query->num_rows() == 0)
        {
            $data = array(
                'dept'   => ucfirst($a['e_dept']),
                'qevent'   => $a['event_assignment'],
                'qnum'   => $a['e_id']
            );

            $this->db->insert( 'tblasignquestion', $data );

            $insid = $this->db->insert_id();

            $arr_data = array();

            $query = $this->db->get_where('tblasignquestion', array('_id' => $insid));
            if ($query->num_rows() > 0)
            {
                $quest = $query->row();

                $arr_data['depts'] = '
                <tr id="assignrow'. $quest->_id .'">
                    <td style="width: 100%">'.$quest->dept.'</td>
                    <td><a href="#" style="margin-top:10px;" class="btn btn-danger btn-rounded fullwidth btn_del_dept" alt="'. $quest->_id .'">Delete</a></td>
                </tr>
                ';
            }
        }else{
            $arr_data['emsg'] = ucfirst($a['e_dept']).' department already exists in this question.';
        }

        return json_encode($arr_data);
    }

    function set_event(){
        $arrLocalStorage = json_decode($this->input->post('localFormData'));
        $ins_id = 0;

        $queryEventCount = $this->db->get_where('tblevents', array( 'e_name' => $arrLocalStorage->pname, 'e_jo' => $arrLocalStorage->joname))->num_rows();
        if( $queryEventCount > 0 ){
            $arrEvent = $queryEventCount->result_array();
            if(isset($arrEvent)){
                $ins_id = $arrEvent['_id'];
            }

        }

        if(!empty($arrLocalStorage)){
            $insert_data = array(
                'e_name'	        =>	$arrLocalStorage->pname,
                'e_jo'	            =>	$arrLocalStorage->joname,
                'evaluator'	        =>	$arrLocalStorage->rater, // evaluator to rater
                'tls'	            =>	$arrLocalStorage->ratee,// tls to ratee
                'e_time'	        =>	$arrLocalStorage->etype,// time to event type
                'p_date'	        =>	$this->input->post('preEventDeadline'),
                'e_date'	        =>	$this->input->post('epropEventDeadline'),
                'pe_date'	        =>	$this->input->post('postEventDeadline'),
                'activationsDate'	=>	$arrLocalStorage->actidate,
                'endDate'	        =>	$arrLocalStorage->edate,
                'inputDate'	        =>	$arrLocalStorage->idate,
                'datecreated'	    =>	time()
            );
            $this->db->insert('tblevents',$insert_data);

            $ins_id = $this->db->insert_id();
        }

        if( $ins_id > 0){
            $questionIDs = json_decode($this->input->post('QuestionsIDs'));

            foreach ($questionIDs as $value){
                $arrQuestionValues = explode('*', $value);
                $this->setEventToQuestion( $arrQuestionValues[1], $arrQuestionValues[2], $arrQuestionValues[3], $ins_id, $arrLocalStorage->etype );
            }

        }

        $this->syncdata->updatesync();

        return $ins_id;
    }

    function setEventToQuestion( $rater,$ratee,$qid,$eid,$cat){
//        $arr = array();
//        $arr = json_decode($qid);

        if( isset($qid) ){
//            foreach ( $arr as $val){
                $insert_data = array(
                    'rater'	    =>	$rater,
                    'ratee'	    =>	$ratee,
                    'qnum'	    =>	$qid,
                    'qevent'	=>	$eid,
                    'qcat'	    =>	$cat
                );
                $this->db->insert('tblasignquestion',$insert_data);

                return $this->db->insert_id();
//            }
//            return 'Have';
        }else{
            return 'empty';
        }
    }
}