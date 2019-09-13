<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	function index(){
		$this->load->view('login');
	}

	//CEK LOGIN DISINI
	function do_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where 	  = array(
					'username' => $username,
					'password' => $password);

		$cek = $this->m_login->cek_login("tb_user",$where)->num_rows();
		$row = $this->m_login->cek_login("tb_user",$where)->row();

		if($cek > 0){
			$data_session = array(
							'id' 		  => $row->id,
							'nama' 		  => $username,
							'namalengkap' => $row->nama,
							'foto' 		  => $row->foto,
							'level' 	  => $row->level,
							'sia' 		  => $row->sia,
							'sipa' 		  => $row->sipa,
							'status' 	  => "login");
			
			$this->session->set_userdata($data_session);
			
			redirect('indexc');
		} 

		else{
			$this->session->set_flashdata('gagallogin','Maaf, data yang anda masukkan salah!');
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
