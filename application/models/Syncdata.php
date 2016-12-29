<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syncdata extends CI_Model {

    function __construct() {
        //Call the model constructor
        parent::__construct();
    }


    public function updateSync(){
        $insert_info = array(
            'havenew' => 'yes',
            'status' => 'no'
        );
        $this->db->insert('tblsync',$insert_info);
    }
}
?>