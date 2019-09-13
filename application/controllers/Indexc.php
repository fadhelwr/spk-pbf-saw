<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexc extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_login'); //load model m_artikel yang berada di folder model
        $this->load->model('m_barang');
        $this->load->model('m_supplier');
        $this->load->model('m_user');
        $this->load->model('m_surat');
        $this->load->helper(array('url')); //load helper url

        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

    function index(){
        $data['title'] = 'Dashboard';
        $this->template->load('static','home/dashboard',$data);
    }
}
