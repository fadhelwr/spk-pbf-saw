<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model {

  var $tabeluser = 'tb_user';
  var $tabelsupp = 'tb_supplier';
  var $tabelbrg = 'tb_barang';
  var $tabelsrt = 'tb_pembelian_tmp';
  var $tabelsrtpre = 'tb_pembelian_tmp_prekursor';
  var $tabeldetail = 'tb_pembelian_detail';
  var $tabeldetailpre = 'tb_pembelian_detail_pre';

  function __construct(){

    parent::__construct();
  }

  function get_supp(){
      $this->db->from($this->tabelsupp);
      $this->db->order_by('nama','ASC');
      $query = $this->db->get();
      return $query->result();
  }

  function get_obat(){
      $this->db->select('*');
      $this->db->from('tb_barang, tb_satuan');
      $this->db->order_by('nama_barang','ASC');
      $this->db->where('tb_barang.satuan=tb_satuan.id_satuan');
      $this->db->where('tb_barang.kategori','umum');
      return $this->db->get()->result();
  }

  function get_obat_prekursor(){
      $this->db->select('*');
      $this->db->from('tb_barang, tb_satuan');
      $this->db->order_by('nama_barang','ASC');
      $this->db->where('tb_barang.satuan=tb_satuan.id_satuan');
      $this->db->where('tb_barang.kategori','prekursor');
      return $this->db->get()->result();
  }

  function get_user(){
      $this->db->from($this->tabeluser);
      $query = $this->db->get();
      return $query->result();
  }

  function tampil(){
      $this->db->select('tb_pembelian_tmp.kode_trx, tgl_surat, nama');
      $this->db->distinct('tb_pembelian_detail.kode_trx');
      $this->db->from('tb_pembelian_tmp');
      $this->db->join('tb_pembelian_detail', 'tb_pembelian_detail.kode_trx = tb_pembelian_tmp.kode_trx');
      $this->db->join('tb_supplier', 'tb_supplier.kode_supplier = tb_pembelian_tmp.id_supplier');
      $this->db->join('tb_barang', 'tb_barang.kode_barcode = tb_pembelian_detail.kode_barcode');
      return $this->db->get()->result();
  }

  function tampil_prekursor(){
      $this->db->select('tb_pembelian_tmp_prekursor.kode_trx, tgl_surat, nama');
      $this->db->distinct('tb_pembelian_detail_pre.kode_trx');
      $this->db->from('tb_pembelian_tmp_prekursor');
      $this->db->join('tb_pembelian_detail_pre', 'tb_pembelian_detail_pre.kode_trx = tb_pembelian_tmp_prekursor.kode_trx');
      $this->db->join('tb_supplier', 'tb_supplier.kode_supplier = tb_pembelian_tmp_prekursor.id_supplier');
      $this->db->join('tb_barang', 'tb_barang.kode_barcode = tb_pembelian_detail_pre.kode_barcode');
      return $this->db->get()->result();
  }

  function save($data,$tabeldetail){
      $insert  = $this->db->insert($tabeldetail,$data);
      return $insert;
  }

  function saveprekursor($data,$tabeldetailpre){
      $insert  = $this->db->insert($tabeldetailpre,$data);
      return $insert;
  }

  function save_detail($datad,$tabelsrt){
      $insert  = $this->db->insert($tabelsrt,$datad);
      return $insert;
  }

  function save_detailpre($datad,$tabelsrtpre){
      $insert  = $this->db->insert($tabelsrtpre,$datad);
      return $insert;
  }

  function get_bydata($where){
      $this->db->select('*');
      $this->db->from('tb_pembelian_detail');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_detail.kode_barcode');
      $this->db->join('tb_satuan','tb_satuan.id_satuan=tb_pembelian_detail.id_satuan');
      $this->db->where($where);

      $query = $this->db->get();
      return $query->result();
  }

  function get_data_cetak($where){
      $this->db->select('tb_pembelian_tmp.kode_trx, tgl_surat, nama');
      $this->db->from('tb_pembelian_tmp');
      $this->db->join('tb_supplier','tb_supplier.kode_supplier=tb_pembelian_tmp.id_supplier');
      $this->db->where($where);

      $query = $this->db->get();
      if ($query->num_rows() == 1) {
      return $query->row();
    }
  }

  function get_data_cetak_obat($where){
      $this->db->select('*');
      $this->db->from('tb_pembelian_detail');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_detail.kode_barcode');
      $this->db->join('tb_satuan','tb_satuan.id_satuan=tb_pembelian_detail.id_satuan');
      $this->db->where($where);

      $query = $this->db->get();
      return $query->result();
  }


  function get_data_cetak_pre($where){
      $this->db->select('tb_pembelian_tmp_prekursor.kode_trx, tgl_surat, nama, alamat, telepon');
      $this->db->from('tb_pembelian_tmp_prekursor');
      $this->db->join('tb_supplier','tb_supplier.kode_supplier=tb_pembelian_tmp_prekursor.id_supplier');
      $this->db->where($where);

      $query = $this->db->get();
      if ($query->num_rows() == 1) {
      return $query->row();
    }
  }

  function get_data_cetak_obat_pre($where){
      $this->db->select('*');
      $this->db->from('tb_pembelian_detail_pre');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_detail_pre.kode_barcode');
      $this->db->join('tb_satuan','tb_satuan.id_satuan=tb_pembelian_detail_pre.id_satuan');
      $this->db->join('tb_bentuk_sedia','tb_bentuk_sedia.id_satuan=tb_pembelian_detail_pre.satuan_sedia');
      $this->db->where($where);

      $query = $this->db->get();
      return $query->result();
  }

  function get_bydataprekursor($where){
      $this->db->select('*');
      $this->db->from('tb_pembelian_detail_pre');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_detail_pre.kode_barcode');
      $this->db->join('tb_satuan','tb_satuan.id_satuan=tb_pembelian_detail_pre.id_satuan');
      $this->db->join('tb_bentuk_sedia','tb_bentuk_sedia.id_satuan=tb_pembelian_detail_pre.satuan_sedia');
      $this->db->where($where);

      $query = $this->db->get();
      return $query->result();
  }

  function get_bydatasukses($wheree){
      $this->db->select('*');
      $this->db->from('tb_pembelian_detail');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_detail.kode_barcode');
      $this->db->join('tb_satuan','tb_satuan.id_satuan=tb_pembelian_detail.id_satuan');
      $this->db->where($wheree);

      $query = $this->db->get();
      return $query->result();
  }

  function get_bydatasuksespre($wheree){
      $this->db->select('*');
      $this->db->from('tb_pembelian_tmp_prekursor');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_tmp_prekursor.kode_barcode');
      $this->db->join('tb_satuan','tb_satuan.id_satuan=tb_pembelian_tmp_prekursor.id_satuan');
      $this->db->where($wheree);

      $query = $this->db->get();
      return $query->result();
  }

  function update_tgl($wtgl,$where){
      $this->db->where($where);
      $this->db->update($this->tabeldetail, $wtgl);
      return TRUE;
  }

  function update_tglpre($wtgl,$where){
      $this->db->where($where);
      $this->db->update($this->tabelsrtpre, $wtgl);
      return TRUE;
  }

  function get_bydatasupp($where) 
  {
      $this->db->select('*');
      $this->db->from('tb_pembelian_detail');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_detail.kode_barcode');
      $this->db->join('tb_supplier','tb_supplier.kode_supplier=tb_pembelian_detail.id_supplier');
      $this->db->limit(1);
      $this->db->where($where);

      $query = $this->db->get();
      return $query->result();
  }

  function get_bydatasupp_pre($where) {
      $this->db->select('*');
      $this->db->from('tb_pembelian_tmp_prekursor');
      $this->db->join('tb_barang','tb_barang.kode_barcode=tb_pembelian_tmp_prekursor.kode_barcode');
      $this->db->join('tb_supplier','tb_supplier.kode_supplier=tb_pembelian_tmp_prekursor.id_supplier');
      $this->db->limit(1);
      $this->db->where($where);

      $query = $this->db->get();
      return $query->result();
  }

//tambah qty
  function update_qtypre($data,$id){
      $this->db->where($id);
      $this->db->update($this->tabelsrtpre, $data);
      return TRUE;
  }
//validasi qty
  function update_qtyv($dataq,$id){
      $this->db->where($id);
      $this->db->update($this->tabeldetail, $dataq);
      return TRUE;
  }
//tambah qty
  function update_supp($data,$id){
      $this->db->where($id);
      $this->db->update($this->tabeldetail, $data);
      return TRUE;
  }

  function update_supp_pre($data,$id){
      $this->db->where($id);
      $this->db->update($this->tabelsrtpre, $data);
      return TRUE;
  }

  function hapus_list($id){
      $this->db->where('id', $id);
      $berhasil = $this->db->delete($this->tabeldetail);
  }

  function hapus_listpre($id){
      $this->db->where('id', $id);
      $berhasil = $this->db->delete($this->tabeldetailpre);
  }

        //validasi brg
  function updatestok($stok,$brg){
      $this->db->where($brg);
      $this->db->update($this->tabelbrg, $stok);
      return TRUE;
  }

        //validasi brg
  function validasibrg($datah,$id){
      $this->db->where($id);
      $this->db->update($this->tabeldetail, $datah);
      return TRUE;
  }

        //validasi brgpre
  function validasibrgpre($datah,$id){
      $this->db->where($id);
      $this->db->update($this->tabeldetailpre, $datah);
      return TRUE;
  }

        //validasi trx
  function validasitrx($data,$id){
      $this->db->where($id);
      $this->db->update($this->tabelsrt, $data);
      return TRUE;
  }

  function validasitrxpre($data,$id){
      $this->db->where($id);
      $this->db->update($this->tabeldetailpre, $data);
      return TRUE;
  }

        //validasi brg
  function validasisukses($data,$id){
      $this->db->where($id);
      $this->db->update($this->tabeldetail, $data);
      return TRUE;
  }

  function getkodeunik(){ 
      $q = $this->db->query("SELECT MAX(RIGHT(kode_trx,5)) AS idmax FROM tb_pembelian_detail");
      $kd = ""; //kode awal
    	
      if($q->num_rows()>0){ //jika data ada
          foreach($q->result() as $k){
    	        $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
    	        $kd = sprintf("%05s", $tmp); //kode ambil 4 karakter terakhir
          }
    	}else{ //jika data kosong diset ke kode awal
          $kd = "1";
      }
    	$kar = "SP"; //karakter depan kodenya
    	return $kar.$kd;
  }

  function getkodeunikpre(){ 
      $q = $this->db->query("SELECT MAX(RIGHT(kode_trx,5)) AS idmax FROM tb_pembelian_tmp_prekursor");

      $kd = ""; //kode awal
          if($q->num_rows()>0){ //jika data ada
              foreach($q->result() as $k){
                  $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                  $kd = sprintf("%05s", $tmp); //kode ambil 4 karakter terakhir
              }
          }else{ //jika data kosong diset ke kode awal
              $kd = "1";
          }
          $kar = "PR"; //karakter depan kodenya
            //gabungkan string dengan kode yang telah dibuat tadi
          return $kar.$kd;
  }

  function hapus_surat($kode_trx){
      $this->db->where('kode_trx', $kode_trx);
      $berhasil = $this->db->delete($this->tabelsrt);

      if ($berhasil) {
          $this->db->where('kode_trx', $kode_trx);
          $done = $this->db->delete($this->tabeldetail);
              
          if ($done) {
              $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil hapus surat!!</div></div>");
              redirect('suratpesanan');
          }
      }
  }

  function hapus_suratpre($kode_trx){
      $this->db->where('kode_trx', $kode_trx);
      $berhasil = $this->db->delete($this->tabelsrtpre);

      if ($berhasil) {
          $this->db->where('kode_trx', $kode_trx);
          $done = $this->db->delete($this->tabeldetailpre);
              
          if ($done) {
              $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil hapus surat!!</div></div>");
              redirect('suratpesanan/prekursor');
          }
      }
  }
}