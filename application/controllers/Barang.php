<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('m_barang'); //load model m_artikel yang berada di folder model
        $this->load->helper(array('url')); //load helper url

        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

    function index(){
        $data['login'] = 'Halaman Login';
        $data['title'] = 'Data Obat';
        $data['query'] = $this->m_barang->tampil();
        $this->template->load('static','barang/databarang', $data);
    }

    function umum(){
        $data['login'] = 'Halaman Login';
        $data['title'] = 'Data Obat Umum';
        $data['query'] = $this->m_barang->tampil_umum();
        $this->template->load('static','barang/databarang', $data);
    }

    function prekursor(){
        $data['login'] = 'Halaman Login';
        $data['title'] = 'Data Obat Prekursor';
        $data['query'] = $this->m_barang->tampil_prekursor();
        $this->template->load('static','barang/databarang', $data);
    }

	//fungsi untuk edit gambar berdasarkan id
    function edit(){
        $data['title'] = 'Edit Obat';
        $kode_barcode  = $this->input->get('kode_barcode'); //

        $where         = array('kode_barcode'=>$kode_barcode); //

        $data['row']   = $this->m_barang->get_bydata($where);   //
        $data['query'] = $this->m_barang->tampil_satuan(); //query dari model

        //utk form edit nya, saya tambahkan sebuah view bernama feupload.php
        $this->template->load('static','barang/editbarang',$data);
        }

    function tambah(){
        $data['title'] = 'Tambah Obat';
        $data['query'] = $this->m_barang->tampil_satuan(); //query dari model
        $this->template->load('static','barang/tambahbarang', $data);
    }

    function simpan_baru(){
        $kode_brg   = $this->input->post('kode');
        $nama_brg   = $this->input->post('namabarang');
        $stok       = $this->input->post('stok');
        $satuan     = $this->input->post('satuan');
        $hrg_jual   = $this->input->post('hrg_jual');
        $hrg_beli   = $this->input->post('hrg_beli');
        $profit     = $this->input->post('profit');
        $kandungan  = $this->input->post('kandungan');
        $kategori   = $this->input->post('kategori');

        $data       = array(
            'kode_barcode' => $kode_brg,
            'nama_barang'  => $nama_brg,
            'stok'         => $stok,
            'satuan'       => $satuan,
            'harga_jual'   => $hrg_jual,
            'harga_beli'   => $hrg_beli,
            'profit'       => $profit,
            'kandungan'    => $kandungan,
            'kategori'     => $kategori);
        $cek        = $this->m_barang->save($data,'tb_barang'); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil simpan !!</div></div>");
            redirect('barang');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
        redirect('barang');
    }

    function simpan_update($where){
        $kode_brg   = $this->input->post('kode');
        $nama_brg   = $this->input->post('namabarang');
        $stok       = $this->input->post('stok');
        $satuan     = $this->input->post('satuan');
        $hrg_jual   = $this->input->post('hrg_jual');
        $hrg_beli   = $this->input->post('hrg_beli');
        $profit     = $this->input->post('profit');
        $kandungan  = $this->input->post('kandungan');
        $kategori   = $this->input->post('kategori');

        $data       = array(
            'kode_barcode' => $kode_brg,
            'nama_barang'  => $nama_brg,
            'stok'         => $stok,
            'satuan'       => $satuan,
            'harga_jual'   => $hrg_jual,
            'harga_beli'   => $hrg_beli,
            'profit'       => $profit,
            'kandungan'    => $kandungan,
            'kategori'     => $kategori);

        $where      = array('kode_barcode' => $kode_brg); 

        $cek        = $this->m_barang->update($data,$where); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil update !!</div></div>");
            redirect('barang');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
        redirect('barang');
    }

    function hapus(){
        $kode_brg   = $this->uri->segment(3);
        
        $cek        = $this->m_barang->hapus($kode_brg);

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil hapus !!</div></div>");
            redirect('barang');
        }

        if ($cek < 1){
           $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL! DATA TERPAKAI!</div></div>");
           redirect('barang');
       }
       redirect('barang');
    }

    /*
    SATUAN OBAT
    */
    function tampil_satuan(){
        $data['login'] = 'Halaman Login';
        $data['title'] = 'Kelola Satuan';
        $data['query'] = $this->m_barang->tampil_satuan();
        $this->template->load('static','barang/satuan/satuan', $data);
    }

    function tambah_satuan(){
        $data['title'] = 'Tambah Satuan';
        $this->template->load('static','barang/satuan/tambahsatuan', $data);
    }

    function simpan_satuan(){

        $namasatuan   = $this->input->post('namasatuan');
        $keterangan   = $this->input->post('keterangan');

        $data         = array(
                        'nama_satuan' => $namasatuan,
                        'keterangan'  => $keterangan);
        $cek          = $this->m_barang->save_satuan($data,'tb_satuan'); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil simpan !!</div></div>");
            redirect('barang/tampil_satuan');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
    }

    function edit_satuan(){
        $data['title'] = 'Edit Satuan';
        $kode_satuan   = $this->input->get('id'); //
        $where         = array('id_satuan'=>$kode_satuan); //
        $data['row']  = $this->m_barang->get_bydatasatuan($where);   //
            //$data['query'] = $this->m_barang->tampil_satuan(); //query dari model
        $this->template->load('static','barang/satuan/editsatuan', $data);
    }

    function updatesatuan(){
        $id           = $this->input->get('id');
        $nama_satuan  = $this->input->post('namasatuan');
        $keterangan   = $this->input->post('keterangan');

        $data         = array(
                         'nama_satuan'   => $nama_satuan,
                         'keterangan'  => $keterangan);

        $where        = array('id_satuan' => $id); 

        $cek          = $this->m_barang->updatesatuan($data,$where); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil update !!</div></div>");
            redirect('barang/tampil_satuan');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
    }

    /*
    SATUAN BENTUK SEDIA OBAT
    */
    function tampil_bentuk_sedia(){
        $data['login'] = 'Halaman Login';
        $data['title'] = 'Kelola Satuan Sedia';
        $data['query'] = $this->m_barang->tampil_satuan_sedia();
        $this->template->load('static','barang/satuan/satuansedia', $data);
    }

    function tambah_satuan_sedia(){
        $data['title'] = 'Tambah Satuan Sedia';
        $this->template->load('static','barang/satuan/tambahsatuansedia', $data);
    }

    function simpan_satuan_sedia(){

        $namasatuan   = $this->input->post('namasatuan');
        $keterangan   = $this->input->post('keterangan');

        $data         = array(
                        'nama_satuan_sedia'   => $namasatuan,
                        'keterangan'  => $keterangan);

        $cek          = $this->m_barang->save_satuan_sedia($data,'tb_bentuk_sedia'); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil simpan !!</div></div>");
            redirect('barang/tampil_bentuk_sedia');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
    }

    function edit_satuan_sedia(){
        $data['title'] = 'Edit Satuan Sedia';
        $kode_satuan    = $this->input->get('id');

        $where        = array(
                        'id_satuan'=>$kode_satuan);

        $data['row']  = $this->m_barang->get_bydatasatuansedia($where);
        $this->template->load('static','barang/satuan/editsatuansedia', $data);
    }

    function updatesatuansedia(){
        $id          = $this->input->get('id');
        $nama_satuan = $this->input->post('namasatuan');
        $keterangan  = $this->input->post('keterangan');

        $data        = array(
                        'nama_satuan_sedia'   => $nama_satuan,
                        'keterangan'  => $keterangan);

        $where      = array('id_satuan' => $id); 

        $cek        = $this->m_barang->updatesatuansedia($data,$where); //akses model untuk menyimpan ke database

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil update !!</div></div>");
            redirect('barang/tampil_bentuk_sedia');
        }

        else{
            echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
        }
    }


    function spk_kriteria(){
        $data['login'] = 'Halaman Login';
        $data['title'] = 'Daftar Kriteria';

        $data['dstok'] = $this->m_barang->spk_tampil_c1();
        $data['dhrg'] = $this->m_barang->spk_tampil_c2();

        $this->template->load('static','barang/spk/kriteria', $data);
    }

    function spk_penilaian_kriteria(){
        $data['login'] = 'Halaman Login';
        $data['title'] = 'Penilaian Kriteria';
        $data['dnilai'] = $this->m_barang->spk_tampil_nilai();
        $data['dstok'] = $this->m_barang->spk_tampil_c1();
        $data['dhrg'] = $this->m_barang->spk_tampil_c2();
        $data['query'] = $this->m_barang->tampil();
        
        $this->template->load('static','barang/spk/tampilspk', $data);
    }

    function edit_penilaian(){
        $data['title'] = 'Edit Penilaian';
        $id    = $this->input->get('id'); //
        $where        = array(
                            'id_nilai'=>$id); //
        $data['row']  = $this->m_barang->get_bydataspknilai($where);   //
        $data['query'] = $this->m_barang->tampil();
        $data['dstok'] = $this->m_barang->spk_tampil_c1();
        //$data['query'] = $this->m_barang->tampil_satuan(); 
        
        $this->template->load('static','barang/spk/edit_penilaian',$data);
    }
}
