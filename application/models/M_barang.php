<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {
	var $tabel 		 = 'tb_barang';
	var $tabelsat 	 = 'tb_satuan';
	var $tabelsatsed = 'tb_bentuk_sedia';

	function __construct(){

		parent::__construct();
	}

	function tampil(){
		$this->db->select('tb_satuan.nama_satuan, kode_barcode, nama_barang, stok, harga_beli, kandungan, kategori, profit');
		$this->db->from('tb_barang, tb_satuan');
		$this->db->where('tb_barang.satuan=tb_satuan.id_satuan');
		return $this->db->get()->result();
	}

	function tampil_umum(){
		$this->db->select('tb_satuan.nama_satuan, kode_barcode, nama_barang, stok, harga_beli, kandungan, kategori, profit');
		$this->db->from('tb_barang, tb_satuan');
		$this->db->where('tb_barang.satuan=tb_satuan.id_satuan');
		$this->db->where('tb_barang.kategori','umum');
		return $this->db->get()->result();
	}

	function tampil_prekursor(){
		$this->db->select('tb_satuan.nama_satuan, kode_barcode, nama_barang, stok, harga_beli, kandungan, kategori, profit');
		$this->db->from('tb_barang, tb_satuan');
		$this->db->where('tb_barang.satuan=tb_satuan.id_satuan');
		$this->db->where('tb_barang.kategori','prekursor');
		return $this->db->get()->result();
	}

	function tampil_satuan(){
		$this->db->from($this->tabelsat);
		$query = $this->db->get();
		return $query->result();
	}

	function save_satuan($data,$tabelsat){
		$insert	= $this->db->insert($tabelsat,$data);
		return $insert;
	}

	function updatesatuan($data,$where){
		$this->db->where($where);
		$this->db->update($this->tabelsat, $data);
		return TRUE;
	}

	function get_bydatasatuan($where){
		$this->db->select('*');
		$this->db->from('tb_satuan');
		$this->db->where($where);
		$query = $this->db->get();
		
	        //cek apakah ada data
		if ($query->num_rows() == 1) {
			return $query->row();
		}
	}

	function tampil_satuan_sedia(){
		$this->db->from($this->tabelsatsed);
		$query = $this->db->get();
		return $query->result();
	}


	function save_satuan_sedia($data,$tabelsatsed){
		$insert	= $this->db->insert($tabelsatsed,$data);
		return $insert;
	}

	function updatesatuansedia($data,$where){
		$this->db->where($where);
		$this->db->update($this->tabelsatsed, $data);
		return TRUE;
	}

	function get_bydatasatuansedia($where){
		$this->db->select('*');
		$this->db->from('tb_bentuk_sedia');
		$this->db->where($where);
		$query = $this->db->get();
		
	    //cek apakah ada data
		if ($query->num_rows() == 1){
			return $query->row();
		}
	}

	function save($data,$tabel){
		$insert	= $this->db->insert($tabel,$data);
		return $insert;
	}

	function update($data,$where){
		$this->db->where($where);
		$this->db->update($this->tabel, $data);
		return TRUE;
	}

	function get_bydata($where){
		$this->db->select('tb_satuan.nama_satuan, tb_satuan.id_satuan, kode_barcode, nama_barang, stok, harga_jual, harga_beli, kandungan, kategori, profit');
		$this->db->from('tb_barang, tb_satuan');
		$this->db->where($where);
		$this->db->where('tb_barang.satuan=tb_satuan.id_satuan');
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
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil dihapus !!</div></div>");
			redirect('barang');
		}
	}	
}