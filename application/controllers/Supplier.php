<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_supplier'); 

        if($this->session->userdata('status') != "login"){
           redirect('login');
        }
    }

    function index(){
        $data['title'] = 'Data Supplier';
		$data['query'] = $this->m_supplier->tampil(); //query dari model
        $kode_supplier = $this->input->get('kode_supplier'); //mengambil variabel get idartikel dari url
        
        $where         = array('kode_supplier'=>$kode_supplier); //array where query untuk menampilkan gambar per id
        
        $data['row']   = $this->m_supplier->get_bydata($where);   //query dari model ambil per id
            
        $this->template->load('static','supplier/datasupplier', $data);
    }

	//fungsi untuk edit gambar berdasarkan id
    function edit(){
        $data['title'] = 'Edit Obat';
        $kode_supplier = $this->input->get('kode_supplier'); //mengambil variabel get idartikel dari ur

        $where         = array('kode_supplier'=>$kode_supplier); //array where query untuk menampilkan gambar per id

        $data['row']   = $this->m_supplier->get_bydata($where);   //query dari model ambil per id
            
        $this->template->load('static','supplier/editsupplier',$data);
    }

    function tambah(){      
        $data['title'] = 'Tambah Obat';
        $this->template->load('static','supplier/tambahsupplier', $data);
    }

    function simpan_baru(){
        $namasupplier = $this->input->post('namasupplier');
        $alamat		  = $this->input->post('alamat');
        $telepon      = $this->input->post('telepon');
        $email	      = $this->input->post('email');

        $data         = array(
                        'nama'   => $namasupplier,
                        'alamat' => $alamat,
                        'telepon'=> $telepon,
                        'email'  => $email);
        $cek          = $this->m_supplier->save($data,'tb_supplier'); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil simpan !!</div></div>");
            redirect('supplier');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
        redirect('supplier');
    }

    function simpan_update(){

    	$kode_supplier 	= $this->input->get('kode');
        $namasupplier   = $this->input->post('namasupplier');
        $alamat		   	= $this->input->post('alamat');
        $telepon       	= $this->input->post('telepon');
        $email	     	= $this->input->post('email');

        $data           = array(
                         'nama'   => $namasupplier,
                         'alamat' => $alamat,
                         'telepon'=> $telepon,
                         'email'  => $email);

        $where          = array('kode_supplier' => $kode_supplier); 

        $cek            = $this->m_supplier->update($data,$where); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil update !!</div></div>");
            redirect('supplier');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
        redirect('supplier');
    }

    function hapus(){
        $kode_supplier  = $this->uri->segment(3);
        
        $cek            = $this->m_supplier->hapus($kode_supplier);

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil hapus !!</div></div>");
            redirect('supplier');
        }

        if ($cek < 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL! DATA TERPAKAI!</div></div>");
            redirect('supplier');
        }
        redirect('supplier');
    }


   /***
    SISTEM PENDUKUNG KEPUTUSAN
   **/

    public static function format($date){
        $str = explode('-', $date);

        $bulan = array(
                 '01' => 'Januari',
                 '02' => 'Februari',
                 '03' => 'Maret',
                 '04' => 'April',
                 '05' => 'Mei',
                 '06' => 'Juni',
                 '07' => 'Juli',
                 '08' => 'Agustus',
                 '09' => 'September',
                 '10' => 'Oktober',
                 '11' => 'November',
                 '12' => 'Desember');

        return $str['2'] . " " . $bulan[$str[1]] . " " .$str[0];
    }

    function daftar_kriteria(){
        $data['title']  = 'Daftar Kriteria';
        $data['c1']     = $this->m_supplier->tampil_c1();
        $data['c2']     = $this->m_supplier->tampil_c2();
        $data['c3']     = $this->m_supplier->tampil_c3();
        $data['c4']     = $this->m_supplier->tampil_c4();
        $data['c5']     = $this->m_supplier->tampil_c5();
        $data['c6']     = $this->m_supplier->tampil_c6();
        $data['c7']     = $this->m_supplier->tampil_c7();
        $data['c8']     = $this->m_supplier->tampil_c8();
        $data['c9']     = $this->m_supplier->tampil_c9();
        $data['c10']     = $this->m_supplier->tampil_c10();

        $this->template->load('static','supplier/spk/daftar_kriteria', $data);
    }


    function spk_penilaian_kriteria(){
        $data['title'] = 'Sistem Pendukung Keputusan';
        //$data['row']   = $this->m_supplier->spk_tampil_nilai();
        $this->template->load('static','supplier/spk/tampilspk', $data);
    }

    function tampil_transaksi(){
        $vtahun           = $this->input->post('vtahun');

        $data['row']      = $this->m_supplier->spk_bytime($vtahun)->result();

        $data['maxnilai'] = $this->m_supplier->max_xij($vtahun)->row();

        $this->load->view('supplier/spk/databytime', $data);
    }
    
    function laporan_nilai(){
        $data['title']   = 'Laporan SPK';

        $data['laporan'] = $this->m_supplier->spk_laporan();
        $this->template->load('static','supplier/spk/supplierterbaik', $data);
    }

    function evaluasi_supplier(){
        $data['title']     = 'Evaluasi Supplier';
        $data['kodenilai'] = $this->m_supplier->getkodenilai();
        $data['query']     = $this->m_supplier->tampil(); //query dari model
        $data['c1']        = $this->m_supplier->tampil_c1();
        $data['c2']        = $this->m_supplier->tampil_c2();
        $data['c3']        = $this->m_supplier->tampil_c3();
        $data['c4']        = $this->m_supplier->tampil_c4();
        $data['c5']        = $this->m_supplier->tampil_c5();
        $data['c6']     = $this->m_supplier->tampil_c6();
        $data['c7']     = $this->m_supplier->tampil_c7();
        $data['c8']     = $this->m_supplier->tampil_c8();
        $data['c9']     = $this->m_supplier->tampil_c9();
        $data['c10']     = $this->m_supplier->tampil_c10();
        $this->template->load('static','supplier/spk/evaluasi', $data);
    }

    function simpan_evaluasi(){
        $kode_nilai     = $this->input->post('kode');
        $kode_supplier  = $this->input->post('kode_supplier');
        $c1             = $this->input->post('id_c1');
        $c2             = $this->input->post('id_c2');
        $c3             = $this->input->post('id_c3');
        $c4             = $this->input->post('id_c4');
        $c5             = $this->input->post('id_c5');
        $c6             = $this->input->post('id_c6');
        $c7             = $this->input->post('id_c7');
        $c8             = $this->input->post('id_c8');
        $c9             = $this->input->post('id_c9');
        $c10            = $this->input->post('id_c10');
        $tgl_nilai      = date('Y-m-d');

        $data           = array(
                          'kode_nilai'   => $kode_nilai,
                          'id_supplier'  => $kode_supplier,
                          'c1'           => $c1,
                          'c2'           => $c2,
                          'c3'           => $c3,
                          'c4'           => $c4,
                          'c5'           => $c5,
                          'c6'           => $c6,
                          'c7'           => $c7,
                          'c8'           => $c8,
                          'c9'           => $c9,
                          'c10'           => $c10,
                          'tgl_nilai'    => $tgl_nilai);

        $this->m_supplier->simpan_nilai($data,'tb_nilai_supplier');
    }

    function simpan_kesimpulan(){
        $kode_nilai     = $this->input->get('kode');
        $kode_supplier  = $this->input->get('supp');
        $nilai          = $this->input->get('nilai');
        $periode        = date('Y-m-d');

        $data           = array(
                          'kode_nilai'    => $kode_nilai,
                          'kode_supplier' => $kode_supplier,
                          'nilai'         => $nilai,         
                          'periode'       => $periode);

        $cek            = $this->m_supplier->simpan_kesimpulan($data,'tb_kesimpulan');

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil simpan !!</div></div>");
            redirect('supplier/evaluasi-supplier');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
    }

    function tampilnilai(){
        $data['nilai']      = $this->input->get('kode');
        $kdn                = $this->input->get('kode');

        $where              = array('kode_nilai' => $kdn); //query dari model); //array where query untuk menampilkan gambar per id
        
        $data['datas']      = $this->m_supplier->get_bydatanilai($where);
        $data['maxnilai']   = $this->m_supplier->maks_xij($where)->row();

        $this->load->view('supplier/spk/tampil_evaluasi', $data);
    }
}
