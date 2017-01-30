<?php
/**
 * Created by PhpStorm.
 * User: ROEL
 * Date: 1/28/2017
 * Time: 4:47 PM
 */

class Get extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    function clients( $client_id ){
        $this->db->select('contact_person');
        $this->db->where( 'client_id', $client_id );
        $this->db->limit(1);
        $clientQuery = $this->db->get('clients')->result();
        if( isset($clientQuery[0]) ){
//            print_r($clientQuery[0]);
            return $clientQuery[0]->contact_person;
        }
    }

    function projectStatus ( $statusCode ){
        if($statusCode == 1){
            return 'Done';
        }else{
            return 'Pending';
        }

    }

    function jolist(){
        $results = array();
        $this->db->order_by('jo_id', 'DESC');
        $this->db->select('jo_id, jo_number, project_name, project_type, client_company_name, brand, execution');
        $query = $this->db->get('job_order_list')->result_array();
        foreach ( $query as $row ){

            $partialData = array(
                'jobID' => $row['jo_id'],
                'jobNumber' => $row['jo_number'],
                'projectName' => $row['project_name'],
                'projectTypes' => $row['project_type'],
                'clientsName' => $this->clients( $row['client_company_name'] ),
                'brands' => $row['brand'],
                'status' => $this->projectStatus($row['execution'])
            );

            array_push($results, $partialData);
        }
        return json_encode($results);
    }
    
    function joDetails($jonumber){
        $this->db->select('jo_id, jo_number, project_name, date_created,');
        $this->db->where('jo_id',$jonumber);
        $query = $this->db->get('job_order_list')->result_array();
        return json_encode($query);
    }

    function joSummary($josummary){
        $this->db->select('jo_id, project_name, jo_number,');
        $this->db->where('jo_id',$josummary);
        $query = $this->db->get('job_order_list')->result_array();
        return json_encode($query);
    }
}