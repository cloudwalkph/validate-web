<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update_mod extends CI_Model
{

    function __construct()
    {
        //Call the model constructor
        parent::__construct();
    }

    function up_quest($val = null){
        $arr_ret = array();
        $data = array(
            'qname'         => $val['e_question']
        );
        $this->db->where( '_id', $val['e_id'] );
        $this->db->update( 'tblquestions', $data );

        if( $this->db->affected_rows() > 0 ){
            $query = $this->db->get_where('tblquestions', array('_id' => $val['e_id']));
            if ($query->num_rows() > 0)
            {
                $quest = $query->row();

                $str_quest = strtolower($quest->qname);

                $arr_ret['content'] = '
                <tr id="mtable'.$quest->_id.'">
                    <td>'.$quest->_id.'</td>
                    <td>
                        '.ucfirst($str_quest).'
                    </td>
                    <td>
                        <button type="button" class="btn_EditQuestion btn btn-info btn-rounded" data-toggle="modal" alt="'.$quest->_id.'">
                            Edit
                        </button>
                    </td>
                    <td><a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#defaultModal" alt="'.$quest->_id.'">Delete</a></td>
                </tr>
                ';
                $arr_ret['content_id'] = $val['e_id'];
            }
        }

        return json_encode($arr_ret);
    }

    function updateProject( $postValues ){
        $returnArray = [];
        $returnString = '';

        $data = array(
            'e_name'         => $postValues['projectName'],
            'p_date'         => $postValues['newPreEvent'],
            'e_date'         => $postValues['newEventProper'],
            'pe_date'        => $postValues['newPostEvent']
        );
        $this->db->where( '_id', $postValues['projectId'] );
        $this->db->update( 'tblevents', $data );

        if( $this->db->affected_rows() > 0 ){
            $returnString = '
                <tr id="eventRow'.$postValues['projectId'].'">
                    <td>'.$postValues['projectName'].'</td>
                    <td>'.$postValues['jobId'].'</td>
                    <td>'.$postValues['newPreEvent'].'</td>
                    <td>'.$postValues['newEventProper'].'</td>
                    <td>'.$postValues['newPostEvent'].'</td>
                    <td>
                        <a href="'.base_url('events/results/event/'.$postValues['projectId']).'" class="btn btn-success btn-rounded btn-ripple"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-warning btn-rounded btn-ripple editButtonEvent" alt="'.$postValues['projectId'].'" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
            ';
        }
        $returnArray['affected_rows'] = $this->db->affected_rows();
        $returnArray['content'] = $returnString;
        return json_encode($returnArray);
    }
}