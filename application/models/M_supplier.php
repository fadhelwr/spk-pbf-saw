<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

    var $tabel = 'tb_supplier';
    var $tbc1 = 'tb_diskon';
    var $tbc2 = 'tb_tempobayar';
    var $tbc3 = 'tb_waktukirim';
    var $tbc4 = 'tb_kemasan';
    var $tbc5 = 'tb_expired_date';
    var $tbc6 = 'tb_harga';
    var $tbc7 = 'tb_ketersediaan';
    var $tbc8 = 'tb_ketepatan_pesanan';
    var $tbc9 = 'tb_kemudahan_pelayanan';
    var $tbc10= 'tb_legalitas';
    var $tb_nilai = 'tb_nilai_supplier';

    function __construct(){

        parent::__construct();
    }

    function tampil(){
        $this->db->from($this->tabel);
        $query = $this->db->get();
        return $query->result();
    }

    function save($data,$tabel){
       $insert  = $this->db->insert($tabel,$data);
       return $insert;
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

    function hapus($kode_supplier){
        $this->db->where('kode_supplier', $kode_supplier);
        $berhasil = $this->db->delete($this->tabel);

        if ($berhasil) {
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-warning\" id=\"alert\">Berhasil hapus !!</div></div>");
            redirect('supplier');
        }
    }
    /**
    SISTEM PENDUKUNG KEPUTUSAN
    **/
    function spk_laporan(){
        $this->db->select('*');
        $this->db->from('tb_kesimpulan');
        $this->db->join('tb_supplier','tb_supplier.kode_supplier=tb_kesimpulan.kode_supplier');
        return $this->db->get()->result();
    }

    function saran_supplier($bln,$thn){
        $this->db->select('*');
        $this->db->from('tb_kesimpulan');
        $this->db->join('tb_supplier','tb_supplier.kode_supplier=tb_kesimpulan.kode_supplier');
        $this->db->where('month(periode)', $bln);
        $this->db->where('year(periode)', $thn);
        $query = $this->db->get();

            //cek apakah ada data
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }

    function spk_bytime($vtahun){
        $vbulan = date("m",strtotime($vtahun));
        $this->db->select('*');
        $this->db->from('tb_nilai_supplier');
        $this->db->join('tb_supplier','tb_supplier.kode_supplier = tb_nilai_supplier.id_supplier');
        $this->db->join('tb_diskon','tb_diskon.id_kriteria = tb_nilai_supplier.C1');
        $this->db->join('tb_tempobayar','tb_tempobayar.id_c2 = tb_nilai_supplier.C2');
        $this->db->join('tb_waktukirim','tb_waktukirim.id_c3 = tb_nilai_supplier.C3');
        $this->db->join('tb_kemasan','tb_kemasan.id_c4 = tb_nilai_supplier.C4');
        $this->db->join('tb_expired_date','tb_expired_date.id_c5 = tb_nilai_supplier.C5');
        $this->db->join('tb_harga','tb_harga.id_c6 = tb_nilai_supplier.C6');
        $this->db->join('tb_ketersediaan','tb_ketersediaan.id_c7 = tb_nilai_supplier.C7');
        $this->db->join('tb_ketepatan_pesanan','tb_ketepatan_pesanan.id_c8 = tb_nilai_supplier.C8');
        $this->db->join('tb_kemudahan_pelayanan','tb_kemudahan_pelayanan.id_c9 = tb_nilai_supplier.C9');
        $this->db->join('tb_legalitas','tb_legalitas.id_c10 = tb_nilai_supplier.C10');
        $this->db->where('month(tgl_nilai)', $vbulan);
        $this->db->where('year(tgl_nilai)', $vtahun);
        $query = $this->db->get();
        return $query;
    }

    function max_xij($vtahun){
        $vbulan = date("m",strtotime($vtahun));
        $this->db->select('MAX(bobot_kriteria) as satu, min(bobot_c2) as dua, max(bobot_c3) as tiga, max(bobot_c4) as empat, max(bobot_c5) as lima, min(bobot_c6) as enam,  max(bobot_c7) as tujuh, max(bobot_c8) as delapan, max(bobot_c9) as sembilan, max(bobot_c10) as sepuluh');
        $this->db->from('tb_nilai_supplier');
        $this->db->join('tb_diskon','tb_diskon.id_kriteria = tb_nilai_supplier.C1');
        $this->db->join('tb_tempobayar','tb_tempobayar.id_c2 = tb_nilai_supplier.C2');
        $this->db->join('tb_waktukirim','tb_waktukirim.id_c3 = tb_nilai_supplier.C3');
        $this->db->join('tb_kemasan','tb_kemasan.id_c4 = tb_nilai_supplier.C4');
        $this->db->join('tb_expired_date','tb_expired_date.id_c5 = tb_nilai_supplier.C5');
        $this->db->join('tb_harga','tb_harga.id_c6 = tb_nilai_supplier.C6');
        $this->db->join('tb_ketersediaan','tb_ketersediaan.id_c7 = tb_nilai_supplier.C7');
        $this->db->join('tb_ketepatan_pesanan','tb_ketepatan_pesanan.id_c8 = tb_nilai_supplier.C8');
        $this->db->join('tb_kemudahan_pelayanan','tb_kemudahan_pelayanan.id_c9 = tb_nilai_supplier.C9');
        $this->db->join('tb_legalitas','tb_legalitas.id_c10 = tb_nilai_supplier.C10');
        $this->db->where('month(tgl_nilai)', $vbulan);
        $this->db->where('year(tgl_nilai)', $vtahun);
        $query = $this->db->get();
        return $query;
    }

    function maks_xij($where){
        $this->db->select('MAX(bobot_kriteria) as satu, min(bobot_c2) as dua, max(bobot_c3) as tiga, max(bobot_c4) as empat, max(bobot_c5) as lima, min(bobot_c6) as enam,  max(bobot_c7) as tujuh, max(bobot_c8) as delapan, max(bobot_c9) as sembilan, max(bobot_c10) as sepuluh');
        $this->db->from('tb_nilai_supplier');
        $this->db->join('tb_diskon','tb_diskon.id_kriteria = tb_nilai_supplier.C1');
        $this->db->join('tb_tempobayar','tb_tempobayar.id_c2 = tb_nilai_supplier.C2');
        $this->db->join('tb_waktukirim','tb_waktukirim.id_c3 = tb_nilai_supplier.C3');
        $this->db->join('tb_kemasan','tb_kemasan.id_c4 = tb_nilai_supplier.C4');
        $this->db->join('tb_expired_date','tb_expired_date.id_c5 = tb_nilai_supplier.C5');
        $this->db->join('tb_harga','tb_harga.id_c6 = tb_nilai_supplier.C6');
        $this->db->join('tb_ketersediaan','tb_ketersediaan.id_c7 = tb_nilai_supplier.C7');
        $this->db->join('tb_ketepatan_pesanan','tb_ketepatan_pesanan.id_c8 = tb_nilai_supplier.C8');
        $this->db->join('tb_kemudahan_pelayanan','tb_kemudahan_pelayanan.id_c9 = tb_nilai_supplier.C9');
        $this->db->join('tb_legalitas','tb_legalitas.id_c10 = tb_nilai_supplier.C10');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    function tampil_c1(){
        $this->db->from($this->tbc1);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c2(){
        $this->db->from($this->tbc2);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c3(){
        $this->db->from($this->tbc3);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c4(){
        $this->db->from($this->tbc4);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c5(){
        $this->db->from($this->tbc5);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c6(){
        $this->db->from($this->tbc6);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c7(){
        $this->db->from($this->tbc7);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c8(){
        $this->db->from($this->tbc8);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c9(){
        $this->db->from($this->tbc9);
        $query = $this->db->get();
        return $query->result();
    }

    function tampil_c10(){
        $this->db->from($this->tbc10);
        $query = $this->db->get();
        return $query->result();
    }

    function spk_tampil_nilai(){
        $this->db->select('*');
        $this->db->from('tb_nilai_supplier');
        $this->db->join('tb_supplier','tb_supplier.kode_supplier = tb_nilai_supplier.id_supplier');
        $this->db->join('tb_diskon','tb_diskon.id_kriteria = tb_nilai_supplier.C1');
        $this->db->join('tb_tempobayar','tb_tempobayar.id_c2 = tb_nilai_supplier.C2');
        $this->db->join('tb_waktukirim','tb_waktukirim.id_c3 = tb_nilai_supplier.C3');
        $this->db->join('tb_kemasan','tb_kemasan.id_c4 = tb_nilai_supplier.C4');
        $this->db->join('tb_expired_date','tb_expired_date.id_c5 = tb_nilai_supplier.C5');
        $this->db->join('tb_harga','tb_harga.id_c6 = tb_nilai_supplier.C6');
        $this->db->join('tb_ketersediaan','tb_ketersediaan.id_c7 = tb_nilai_supplier.C7');
        $this->db->join('tb_ketepatan_pesanan','tb_ketepatan_pesanan.id_c8 = tb_nilai_supplier.C8');
        $this->db->join('tb_kemudahan_pelayanan','tb_kemudahan_pelayanan.id_c9 = tb_nilai_supplier.C9');
        $this->db->join('tb_legalitas','tb_legalitas.id_c10 = tb_nilai_supplier.C10');
        return $this->db->get()->result();
    }

    function getkodenilai(){ 
      $q = $this->db->query("SELECT MAX(RIGHT(kode_nilai,5)) AS idmax FROM tb_nilai_supplier");

        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                    $kd = sprintf("%05s", $tmp); //kode ambil 4 karakter terakhir
                }
        }else{ //jika data kosong diset ke kode awal
            $kd = "1";
        }
        $kar = "SPK"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
    }

    function simpan_nilai($data,$tb_nilai){
       $insert  = $this->db->insert($tb_nilai,$data);
       return $insert;
    }

    function simpan_kesimpulan($datad,$tabeldetail){
       $insert  = $this->db->insert($tabeldetail,$datad);
       return $insert;
    }

    function get_bydatanilai($where){
        $this->db->select('*');
        $this->db->from('tb_nilai_supplier');
        $this->db->join('tb_supplier','tb_supplier.kode_supplier = tb_nilai_supplier.id_supplier');
        $this->db->join('tb_diskon','tb_diskon.id_kriteria = tb_nilai_supplier.C1');
        $this->db->join('tb_tempobayar','tb_tempobayar.id_c2 = tb_nilai_supplier.C2');
        $this->db->join('tb_waktukirim','tb_waktukirim.id_c3 = tb_nilai_supplier.C3');
        $this->db->join('tb_kemasan','tb_kemasan.id_c4 = tb_nilai_supplier.C4');
        $this->db->join('tb_expired_date','tb_expired_date.id_c5 = tb_nilai_supplier.C5');
        $this->db->join('tb_harga','tb_harga.id_c6 = tb_nilai_supplier.C6');
        $this->db->join('tb_ketersediaan','tb_ketersediaan.id_c7 = tb_nilai_supplier.C7');
        $this->db->join('tb_ketepatan_pesanan','tb_ketepatan_pesanan.id_c8 = tb_nilai_supplier.C8');
        $this->db->join('tb_kemudahan_pelayanan','tb_kemudahan_pelayanan.id_c9 = tb_nilai_supplier.C9');
        $this->db->join('tb_legalitas','tb_legalitas.id_c10 = tb_nilai_supplier.C10');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}

/*
    SELECT max(bobot_kriteria), max(bobot_c2), max(bobot_c3), max(bobot_c4), max(bobot_c5) FROM tb_nilai_supplier 
    JOIN tb_diskon ON tb_diskon.id_kriteria=tb_nilai_supplier.c1
    JOIN tb_tempobayar ON tb_tempobayar.id_c2=tb_nilai_supplier.C2
    JOIN tb_waktukirim ON tb_waktukirim.id_c3=tb_nilai_supplier.C3
    JOIN tb_kemasan ON tb_kemasan.id_c4=tb_nilai_supplier.C4
    JOIN tb_expired_date ON tb_expired_date.id_c5=tb_nilai_supplier.C5
    WHERE month(tgl_nilai) = 12

    bobot_kriteria, bobot_c2, bobot_c3, bobot_c4, bobot_c5, max(bobot_kriteria), max(bobot_c2), max(bobot_c3), max(bobot_c4), max(bobot_c5)

    select * from tb_nilai_supplier where month(tgl_nilai)='12' and year(tgl_nilai) = '2018'
    
    function maxC1($vtahun){
        $vbulan = date("m",strtotime($vtahun));
        $this->db->select('MAX(bobot_kriteria) AS satu');
        $this->db->from('tb_nilai_supplier');
        $this->db->join('tb_diskon','tb_diskon.id_kriteria = tb_nilai_supplier.C1');
        $this->db->where('month(tgl_nilai)', $vbulan);
        $this->db->where('year(tgl_nilai)', $vtahun);
        $query = $this->db->get();
        return $query->result();
    }

    function maksc1(){

        $this->db->select('MAX(bobot_kriteria) AS satu');
        $this->db->from($this->tbc1);
        $this->db->where('pilihan_kriteria','Sangat Banyak');
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }
    */