<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_model extends CI_Model
{

    function __construct()
    {
        //Call the model constructor
        parent::__construct();
    }

    function get_data_question($qid = null) {
        $arr_data = array();
        $query = $this->db->get_where('tblquestions', array('_id' => $qid));
//        return json_encode($query->result());
        foreach ( $query->result() as $row ){
            $str_dept = '';

            $arr_data['rqid'] = $row->_id;
            $arr_data['question'] = $row->qname;

            $this->db->group_by('dept');
            $query_assign = $this->db->get_where('tblasignquestion', array('qnum' => $qid));
            foreach ( $query_assign->result() as $row_assign ){
                $str_dept .= '
                            <tr id="assignrow'. $row_assign->_id .'">
                                <td style="width: 100%">'.$row_assign->dept.'</td>
                                <td><a href="#" style="margin-top:10px;" class="btn btn-danger btn-rounded fullwidth btn_del_dept" alt="'. $row_assign->_id .'">Delete</a></td>
                            </tr>
                            ';
            }

            $arr_data['depts'] = $str_dept;
        }
        return json_encode($arr_data);
    }

    function get_events( $a ){
        $str_events = '<option value="select">Select Event</option>';
        $this->db->order_by('_id', 'DESC');
        $query = $this->db->get('tblevents');
//        return json_encode($query->result());
        foreach ( $query->result() as $row ){
            $date = '';
            if( $a == 'pre_event' ){
                $date = strtotime($row->e_date);
            }elseif( $a == 'event_proper' ){
                $date = strtotime($row->p_date);
            }elseif( $a == 'post_event' ){
                $date = strtotime($row->pe_date);
            }

            $remaining = $date - time();
            $days_remaining = floor($remaining / 86400);

            if( $days_remaining > 0){
                $str_events .= '
                <option value="'.$row->_id.'">'.$row->e_name.' - '.$days_remaining.' days</option>
                ';
            }

        }
        return $str_events;
    }

    function loadEmployee( $a ){
        $str = '';
        if($a['departmentValue']=='Team Leader'){
            $query = $this->db->get('tblteamleader');
            foreach ( $query->result() as $row ){
                $str .= '
            <option value="'.$row->_id.'">'.$row->tfname.', '.$row->tlname.'</option> 
            ';
            }
        }else if($a['departmentValue']=='Negotiator'){
            $query = $this->db->get('tblnegotiator');
            foreach ( $query->result() as $row ) {
                $str .= '
            <option value="' . $row->_id . '">' . $row->nfname . ', ' . $row->nlname . '</option> 
            ';
            }
        }else{
            $query = $this->db->get_where('tblemployee', array('emp_dept' => $a['departmentValue']));
            foreach ( $query->result() as $row ){
                $str .= '
            <option value="'.$row->_id.'">'.$row->emp_lname.', '.$row->emp_fname.' '.$row->emp_mname.'</option> 
            ';
            }
        }
        return $str;
    }

    function grabEmployeeById( $a ){
        $str = '';
        $query = $this->db->get_where('tblemployee', array('_id' => $a));
        if( $query->num_rows() > 0){
            foreach ( $query->result() as $row ){
                $str .= '
                    <label class="assignedAccounts">'.$row->emp_lname.', '.$row->emp_fname.' '.$row->emp_mname.'</label> <br>
                ';
            }
        }else{
            $queryTls = $this->db->get_where('tblteamleader', array('_id' => $a));
            if( $queryTls->num_rows() > 0){
                foreach ( $queryTls->result() as $rowTls ){
                    $str .= '
                    <label class="assignedTls">'.$rowTls->tfname.' '.$rowTls->tlname.'</label> <br>
                ';
                }
            }else{
                $queryNegos = $this->db->get_where('tblteamleader', array('_id' => $a));
                foreach ( $queryNegos->result() as $rowNegos ){
                    $str .= '
                    <label class="assignedNegos">'.$rowNegos->nfname.' '.$rowNegos->nlname.'</label> <br>
                ';
                }
            }
        }
        return $str;
    }

    function grabRaterAndRateeById( $a ){
        $arrEventType = array();

        $str = '<div class="row">';
        $queryRater = $this->db->get_where('tblemployee',array('_id'=>$a['rater']));
        $arrRater = $queryRater->result_array();

        if(isset($arrRater[0])){
//            print_r($arrRater[0]['emp_lname']);return false;
            $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrRater[0]['emp_lname'].', '.$arrRater[0]['emp_fname'].'</label>
                    </div>
                ';

            $queryRatee = $this->db->get_where('tblemployee',array('_id'=>$a['ratee']));
            $arrRatee = $queryRatee->result_array();

            if( $queryRatee->num_rows() > 0 ){
                $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrRatee[0]['emp_lname'].', '.$arrRatee[0]['emp_fname'].' '.$arrRatee[0]['emp_mname'].'</label>
                    </div>
                ';
            }else{
                $queryTls = $this->db->get_where('tblteamleader',array('_id'=>$a['ratee']));
                $arrTls = $queryTls->result_array();
                if( $queryTls->num_rows() > 0 ){
                    $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrTls[0]['tfname'].' '.$arrTls[0]['tlname'].'</label>
                    </div>
                ';
                }else{
                    $queryNegos = $this->db->get_where('tblnegotiator',array('_id'=>$a['ratee']));
                    $arrNegos = $queryNegos->result_array();
                    $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrNegos[0]['nfname'].' '.$arrNegos[0]['nlname'].'</label>
                    </div>
                ';
                }
            }
        }else{
            /*if TL is rater*/

            $queryTls = $this->db->get_where('tblteamleader',array('_id'=>$a['rater']));
            $arrTls = $queryTls->result_array();

            if(isset($arrTls[0])){
//            print_r($arrRater[0]['emp_lname']);return false;
                $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrTls[0]['tfname'].' '.$arrTls[0]['tlname'].'</label>
                        
                    </div>
                ';

                $queryRatee = $this->db->get_where('tblemployee',array('_id'=>$a['ratee']));
                $arrRatee = $queryRatee->result_array();

                if( $queryRatee->num_rows() > 0 ){
                    $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrRatee[0]['emp_lname'].', '.$arrRatee[0]['emp_fname'].'</label>
                    </div>
                ';
                }else{
                    $queryRater = $this->db->get_where('tblemployee',array('_id'=>$a['ratee']));
                    $arrRater = $queryRater->result_array();
                    if( $arrRater->num_rows() > 0 ){
                        $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrRater[0]['emp_lname'].', '.$arrRater[0]['emp_fname'].'</label>
                    </div>
                ';
                    }else{
                        $queryNegos = $this->db->get_where('tblnegotiator',array('_id'=>$a['ratee']));
                        $arrNegos = $queryNegos->result_array();
                        $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrNegos[0]['nfname'].' '.$arrNegos[0]['nlname'].'</label>
                    </div>
                ';
                    }
                }
            }else{
                /*Nego*/
                $queryNegos = $this->db->get_where('tblnegotiator',array('_id'=>$a['ratee']));
                $arrNegos = $queryNegos->result_array();

                if(isset($arrTls[0])){
                    $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrNegos[0]['nfname'].' '.$arrNegos[0]['nlname'].'</label>
                    </div>
                ';

                    $queryRatee = $this->db->get_where('tblemployee',array('_id'=>$a['ratee']));
                    $arrRatee = $queryRatee->result_array();

                    if( $queryRatee->num_rows() > 0 ){
                        $str .= '
                    <div class="col-sm-6">
                        <label>'.$arrRatee[0]['emp_lname'].', '.$arrRatee[0]['emp_fname'].'</label>
                    </div>
                ';
                    }else{
                        $queryRater = $this->db->get_where('tblemployee',array('_id'=>$a['ratee']));
                        $arrRater = $queryRater->result_array();
                        if( $arrRater->num_rows() > 0 ){
                            $str .= '
                                <div class="col-sm-6">
                                    <label>'.$arrRater[0]['emp_lname'].', '.$arrRater[0]['emp_fname'].'</label>
                                </div>
                            ';
                        }else{
                            $queryTls = $this->db->get_where('tblteamleader',array('_id'=>$a['rater']));
                            $arrTls = $queryTls->result_array();

                            $str .= '
                                <div class="col-sm-6">
                                    <label>'.$arrTls[0]['tfname'].' '.$arrTls[0]['tlname'].'</label>
                                </div>
                            ';
                        }
                    }
                }
            }
        }
        $str .= '</div>';

        $arrEventType['valStr'] = $str;
        $arrEventType['tmpStorageForRaterAndRatee'] = $a['rater'].$a['ratee'].$a['typeOfEvent'];
        $arrEventType['typeOfEvent'] = $a['typeOfEvent'];
        return json_encode($arrEventType);
    }

    function getQuestionInfo( $a ){
        $query = $this->db->get_where('tblevents', array('_id' => $a));
        return json_encode($query->result_array());
    }

    function QuestionsByEvent( $a, $b ){
        $str_event = '<option value="select">Select Questions</option>';
        $query = $this->db->get_where('tblquestions', array('qcat' => $a, 'qtype' => $b));
//        return json_encode($query->result_array());
        foreach ($query->result() as $rowQuestions){
            $str_event .= '<option value="'.$rowQuestions->qname.'***'.$rowQuestions->_id.'" alt="'.$rowQuestions->_id.'">'.$rowQuestions->qname.'</option>';
        }
        return $str_event;
    }

    function QuestionsByDepartment( $filterValues ){
        $arrReturned = [];
        $arrStorage = [];
        $str_event = '';
        $queryDept = $this->db->get_where('tbldepartments', array('department_name' => $filterValues['selRatee']));
        $arrDept = $queryDept->result_array();

        if(isset($arrDept[0])){
            $query = $this->db->get_where('tblquestions', array('qcat' => $filterValues['eventType'], 'qtype' => $filterValues['questionTypes'], 'qdept' => $arrDept[0]['_id']));
            foreach ($query->result() as $rowQuestions){
                $str_event .= '<option value="'.$rowQuestions->_id.'">'.$rowQuestions->qname.'</option>';
                array_push($arrStorage, $filterValues['eventType'].'*'.$filterValues['selRaterEmp'].'*'.$filterValues['selRateeEmp'].'*'.$rowQuestions->_id );
            }
        }

//        return json_encode($query->result_array());

        $arrReturned['optionString'] = $str_event;
        $arrReturned['storageValue'] = json_encode($arrStorage);
        return json_encode($arrReturned);
    }

    function getEventDetails($eventId){
        $arrData = array();
        $this->db->where( '_id', $eventId );
        $query = $this->db->get('tblevents');
        $arrData = $query->result();
        return json_encode($arrData);
    }
}