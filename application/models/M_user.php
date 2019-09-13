<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	var $tabel = 'tb_user';

	function __construct(){

		parent::__construct();
	}

	function tampil(){
		$this->db->from($this->tabel);
		$query = $this->db->get();
		return $query->result();
	}

		//fungsi insert ke database
	function save($data){
		$this->db->insert($this->tabel, $data);
		return TRUE;
	}

	function update($data,$where){
		$this->db->where($where);
		$this->db->update($this->tabel, $data);
		return TRUE;
	}

	function get_bydata($where){
		$this->db->from($this->tabel);
		$this->db->where($where);
		$query = $this->db->get();
		
	        //cek apakah ada data
		if ($query->num_rows() == 1) {
			return $query->row();
		}
	}

	function count(){
		$this->db->from($this->tabel);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function hapus($kode_brg){
		$this->db->where('kode_barcode', $kode_brg);
		$berhasil = $this->db->delete($this->tabel);

		if ($berhasil) {
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil update !!</div></div>");
			redirect('barang');
		}
	}
}