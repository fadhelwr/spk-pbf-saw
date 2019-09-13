<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratpesanan extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('m_surat'); 
        $this->load->model('m_barang');
        $this->load->model('m_supplier');
        $this->load->helper(array('url'));

        if($this->session->userdata('status') != "login"){
        	redirect('login');
        }
    }

    function index(){
        $data['title'] = 'List Surat Pesanan';
        $data['query'] = $this->m_surat->tampil(); 
		$this->template->load('static','pesanan/listsurat', $data);
    }

	function prekursor(){
		$data['title'] = 'List Surat Pesanan Prekursor';
		$data['query'] = $this->m_surat->tampil_prekursor(); 

        $this->template->load('static','pesanan/listsuratprekursor', $data);
    }

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

    function edit(){
        $data['title'] = 'Edit Obat';
        $kode_supplier = $this->input->get('kode_supplier');
        $where         = array('kode_supplier' => $kode_supplier);
        $data['row']   = $this->m_supplier->get_bydata($where);
            
        $this->template->load('static','supplier/editsupplier',$data);
        }

    /***
    START SURAT UMUM
    **/
    function tambah(){
        $data['title'] = 'Tambah Surat';
        $tanggal       = date('Y-m-d');
        $Pecah         = explode( "-", $tanggal );

        for ( $i = 0; $i < count( $Pecah ); $i++ ){
            $Pecah[$i];
            $thn = $Pecah[0];
            $bln = $Pecah[1];
            $tgl = $Pecah[2];
        }

        $data['saran']    = $this->m_supplier->saran_supplier($bln,$thn);

		$data['kodeunik'] = $this->m_surat->getkodeunik();
		$data['dataobat'] = $this->m_surat->get_obat();
		$data['datasupp'] = $this->m_surat->get_supp();
		$data['query']    = $this->m_barang->tampil_satuan();

		$where            = array(
						    'kode_trx' => $this->m_surat->getkodeunik());

        $data['datas']    = $this->m_surat->get_bydata($where);
        $data['row']      = $this->m_supplier->spk_tampil_nilai();
        $this->template->load('static','pesanan/tambahsurat', $data);

    }

    function simpansurat(){
    	$kode_trx  = $this->input->post('kode');
    	$kode_brg  = $this->input->post('kode_brg');
    	$qty	   = $this->input->post('qty');
    	$satuan	   = $this->input->post('satuan');
        $status     = 'ORDER';

    	$data 		= array(
            		'kode_trx' 	    => $kode_trx,
            		'kode_barcode'  => $kode_brg,
            		'jumlah'	    => $qty,
            		'id_satuan'	    => $satuan,
            		'status' 	    => $status);

    	$this->m_surat->save($data,'tb_pembelian_detail');

        $data['kodeunik'] = $kode_trx;
        $data['title']    = 'Tambah Surat';
		$data['dataobat'] = $this->m_surat->get_obat();
		$data['datasupp'] = $this->m_surat->get_supp();
		$data['query']    = $this->m_barang->tampil_satuan();

		$where            = array(
						    'kode_trx' => $kode_trx);

        $data['datas']    = $this->m_surat->get_bydata($where);

        $data['row']      = $this->m_supplier->spk_tampil_nilai();

        $tanggal          = date('Y-m-d');
        $Pecah            = explode( "-", $tanggal );

        for ( $i = 0; $i < count( $Pecah ); $i++ ){
            $Pecah[$i];
            $thn = $Pecah[0];
            $bln = $Pecah[1];
            $tgl = $Pecah[2];
        }

        $data['saran']   = $this->m_supplier->saran_supplier($bln,$thn);

        $this->template->load('static','pesanan/tambahsurat', $data);
    }

    function del_list(){
    	$id   = $this->uri->segment(3);

    	$this->m_surat->hapus_list($id);

    	$kode_trx	      = $this->uri->segment(4);
		$data['kodeunik'] = $kode_trx;
		$data['title']    = 'Tambah Surat';
		$data['dataobat'] = $this->m_surat->get_obat();
		$data['datasupp'] = $this->m_surat->get_supp();
		$data['query']    = $this->m_barang->tampil_satuan();

		$where            = array('kode_trx' => $kode_trx);

        $data['datas']    = $this->m_surat->get_bydata($where);
        $data['row']      = $this->m_supplier->spk_tampil_nilai();

        $tanggal          = date('Y-m-d');
        $Pecah            = explode( "-", $tanggal );

        for ( $i = 0; $i < count( $Pecah ); $i++ ) {
            $Pecah[$i];
            $thn = $Pecah[0];
            $bln = $Pecah[1];
            $tgl = $Pecah[2];
        }

        $data['saran']    = $this->m_supplier->saran_supplier($bln,$thn);

        $this->template->load('static','pesanan/tambahsurat', $data);
    }

    function update_supp(){
    	$kode_trx	          = $this->input->get('kode');
    	$supplier 	          = $this->input->post('supplier');
        $tgl_beli             = $this->input->post('tgl_pemesanan');

        if ($tgl_beli == NULL) {
            $tgl_beli = date('Y-m-d');
        }

    	$datad 		          = array(
                    		    'kode_trx'    => $kode_trx,
                                'id_supplier' => $supplier,
                                'tgl_surat'   => $tgl_beli);

    	$cek                  = $this->m_surat->save_detail($datad,'tb_pembelian_tmp');

    	if ($cek >= 1){

	        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Berhasil simpan !!</div></div>");
	        redirect('suratpesanan/cetak/?kode='.$kode_trx);
	    }

	    else{
	    	echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
	    }
	}

	function edit_status(){
		$kode_trx	      = $this->uri->segment(3);

		$data['title']    = 'Validasi Barang';

		$where            = array(
						    'kode_trx' => $kode_trx); 

        $data['datas']    = $this->m_surat->get_bydata($where);

        $this->template->load('static','pesanan/validasibarang', $data);
    }

    function validasistatus(){
        //id/kode_trx/kode_barcode/stok/jumlah/
    	$kode_trx	      = $this->uri->segment(4);
    	$kd	              = $this->uri->segment(3);

    	$id               = array('id' => $kd);
    	$datah            = array('status' => 'SUCCESS');

    	$cek = $this->m_surat->validasibrg($datah,$id);

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Validasi Sukses !!</div></div>");

            redirect('suratpesanan/edit-status/'.$kode_trx);
        }
    }

    function cetak(){
        $kode_trx          = $this->input->get('kode');
        $kode_brg          = $this->input->post('kode_brg');

        $data['title']     = 'Cetak Surat';
        $data['kodeunik']  = $kode_trx; 

        $where             = array('kode_trx' => $kode_trx);

        $data['datas']     = $this->m_surat->get_data_cetak($where);   
        $data['obat']      = $this->m_surat->get_data_cetak_obat($where);
        //$data['user']      = $this->m_surat->get_user();


        $this->template->load('static','pesanan/cetak', $data);
    }

    

    function hapus(){
        $kode_trx   = $this->uri->segment(3);
        
        $cek        = $this->m_surat->hapus_surat($kode_trx);

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil hapus !!</div></div>");
            redirect('suratpesanan');
        }

        if ($cek < 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL!!</div></div>");
            redirect('suratpesanan');
        }
    }
	/*
		=========== END SURAT UMUM ====================== END SURAT UMUM ====================== END SURAT UMUM ====================== END SURAT UMUM ===========
	*/


	/*
		=========== START SURAT PREKURSOR ====================== START SURAT PREKURSOR ====================== START SURAT PREKURSOR ===========
	*/
     function tambah_prekursor(){      
        $data['title']    = 'Tambah Surat';
		$data['kodeunik'] = $this->m_surat->getkodeunikpre(); 
		$data['dataobat'] = $this->m_surat->get_obat_prekursor(); 
		$data['datasupp'] = $this->m_surat->get_supp();
		$data['query']    = $this->m_barang->tampil_satuan();
		$data['querys']   = $this->m_barang->tampil_satuan_sedia();

		$where            = array('kode_trx' => $this->m_surat->getkodeunikpre());

        $data['datas']    = $this->m_surat->get_bydataprekursor($where);

        $tanggal          = date('Y-m-d');
        $Pecah            = explode( "-", $tanggal );

        for ( $i = 0; $i < count( $Pecah ); $i++ ) {
            $Pecah[$i];
            $thn = $Pecah[0];
            $bln = $Pecah[1];
            $tgl = $Pecah[2];
        }

        $data['saran']    = $this->m_supplier->saran_supplier($bln,$thn);

        $this->template->load('static','pesanan/tambahsuratprekursor', $data);
    }

    function simpansuratpre(){
    	$kode_trx	      = $this->input->post('kode');
    	$kode_brg	      = $this->input->post('kode_brg');
    	$qty		      = $this->input->post('qty');
    	$satuan	          = $this->input->post('satuan');
    	$satuan_sedia     = $this->input->post('satuan_sedia');
    	$status           = 'ORDER';

    	$data 		      = array(
                		    'kode_trx' 	  => $kode_trx,
                		    'kode_barcode'=> $kode_brg,
                		    'satuan_sedia'=> $satuan_sedia,
                		    'jumlah'	  => $qty,
                		    'id_satuan'	  => $satuan,
                		    'status' 	  => $status);

    	$this->m_surat->saveprekursor($data,'tb_pembelian_detail_pre');

        $data['kodeunik'] = $kode_trx;
        $data['title']    = 'Tambah Surat Prekursor';
		$data['dataobat'] = $this->m_surat->get_obat_prekursor();
		$data['datasupp'] = $this->m_surat->get_supp();
		$data['query']    = $this->m_barang->tampil_satuan();
		$data['querys']   = $this->m_barang->tampil_satuan_sedia();

		$where            = array('kode_trx' => $kode_trx); 

        $data['datas']    = $this->m_surat->get_bydataprekursor($where);
        
        $tanggal          = date('Y-m-d');
        $Pecah            = explode( "-", $tanggal );

        for ( $i = 0; $i < count( $Pecah ); $i++ ) {
            $Pecah[$i];
            $thn = $Pecah[0];
            $bln = $Pecah[1];
            $tgl = $Pecah[2];
        }

        $data['saran']    = $this->m_supplier->saran_supplier($bln,$thn);

        $this->template->load('static','pesanan/tambahsuratprekursor', $data);
    }

    function del_listpre(){
    	$id               = $this->uri->segment(3);

    	$this->m_surat->hapus_listpre($id);

    	$kode_trx	      = $this->uri->segment(4);

		$data['kodeunik'] = $kode_trx;
		$data['title']    = 'Tambah Surat Prekursor';
		$data['dataobat'] = $this->m_surat->get_obat_prekursor(); 
		$data['datasupp'] = $this->m_surat->get_supp(); 
		$data['query']    = $this->m_barang->tampil_satuan();
		$data['querys']   = $this->m_barang->tampil_satuan_sedia();

		$where            = array('kode_trx' => $kode_trx);

        $data['datas']    = $this->m_surat->get_bydataprekursor($where);

        $tanggal          = date('Y-m-d');
        $Pecah            = explode( "-", $tanggal );

        for ($i = 0; $i < count( $Pecah ); $i++ ) {
            $Pecah[$i];
            $thn = $Pecah[0];
            $bln = $Pecah[1];
            $tgl = $Pecah[2];
        }

        $data['saran']    = $this->m_supplier->saran_supplier($bln,$thn);

        $this->template->load('static','pesanan/tambahsuratprekursor', $data);
    }

    function update_supp_pre(){
    	$kode_trx	           = $this->input->get('kode');
    	$supplier 	           = $this->input->post('supplier');
        $tgl_beli              = $this->input->post('tgl_pemesanan');

        if ($tgl_beli == NULL) {
            $tgl_beli = date('Y-m-d');
        }

        $datad                 = array(
                                 'kode_trx'     => $kode_trx,
                                 'id_supplier'  => $supplier,
                                 'tgl_surat'    => $tgl_beli);

    	$cek                   = $this->m_surat->save_detailpre($datad,'tb_pembelian_tmp_prekursor');

		//JIKA BERHASIL, MENUJU KE CETAK SURAT
    	if ($cek >= 1){

	        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Berhasil simpan !!</div></div>");
	        redirect('suratpesanan/cetakprekursor/?kode='.$kode_trx);
	    }

	    else{
	    	echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
	    }
	}

	function edit_statuspre(){
		$kode_trx       = $this->uri->segment(3);

        $data['title']    = 'Validasi Barang';

		$where            = array(
						    'kode_trx' => $kode_trx);

        $data['datas']    = $this->m_surat->get_bydataprekursor($where);

        $this->template->load('static','pesanan/validasibarangprekursor', $data);
    }

    function validasistatuspre(){
    	$kode_trx         = $this->uri->segment(4);

    	$kd               = $this->uri->segment(3);
    	$id               = array('id' => $kd);
    	$datah            = array('status' => 'SUCCESS');

    	$cek = $this->m_surat->validasibrgpre($datah,$id);

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Validasi Sukses !!</div></div>");
            redirect('suratpesanan/edit-statuspre/'.$kode_trx);
        }
    }

    function cetakprekursor(){
        $kode_trx          = $this->input->get('kode');
        $kode_brg          = $this->input->post('kode_brg');

        $data['title']     = 'Cetak Surat Prekursor';
        $data['kodeunik']  = $kode_trx;

        $where             = array('kode_trx' => $kode_trx);

        $data['datas']     = $this->m_surat->get_data_cetak_pre($where);
        $data['obat']  = $this->m_surat->get_data_cetak_obat_pre($where);
        //$data['user']      = $this->m_surat->get_user();

        $this->template->load('static','pesanan/cetakprekursor', $data);
    }

    function hapuspre(){
        $kode_trx   = $this->uri->segment(3);
        $cek        = $this->m_surat->hapus_suratpre($kode_trx);

        if ($cek >= 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil hapus !!</div></div>");
            redirect('suratpesanan/prekursor');
        }

        if ($cek < 1){
            $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL!!</div></div>");
            redirect('suratpesanan/prekursor');
        }
    }

	/*
		=========== END SURAT PREKURSOR ====================== END SURAT PREKURSOR ====================== END SURAT PREKURSOR ====================== 
	*/    
}
