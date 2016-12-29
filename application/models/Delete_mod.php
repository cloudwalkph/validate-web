<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_mod extends CI_Model
{

    function __construct()
    {
        //Call the model constructor
        parent::__construct();
    }

    function del_quest($quest_id = null){
        $this->db->delete('tblasignquestion', array('_id' => $quest_id));
        if( $this->db->affected_rows() > 0 ){
            return 'assignrow'.$quest_id;
        }
    }
}