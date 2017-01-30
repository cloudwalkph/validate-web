<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jolist extends CI_Controller {

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
//    public function index()
//    {
//        $this->load->view('dashboard');
//    }
//
//}
public function __construct()
    {
        parent::__construct();
        $this->load->model('Get', 'fetch');
    }


    public function index()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }else{
            $data['results'] = $this->fetch->jolist();
            $this->load->view('dashboard', $data);
        }
    }
}
