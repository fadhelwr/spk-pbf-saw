<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  	function __construct(){
        parent::__construct();
        $this->load->model('m_user'); //load model m_artikel yang berada di folder model
        $this->load->helper(array('url')); //load helper url

        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

    function index(){
        $data['title'] = 'Data User';
  			$data['query'] = $this->m_user->tampil(); //query dari model
  			$this->template->load('static','user/datauser', $data);    
    }

    function tambah(){         
        $data['title'] = 'Tambah User';
        $this->template->load('static','user/tambahuser', $data);
    }

    function simpan(){
        $data['title'] = 'Tambah User';

        $this->load->library('upload');
        $nmfile                   = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path']    = './assets/uploads/'; //path folder
        $config['allowed_types']  = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']       = '1024'; //maksimum besar file 3M
        $config['max_width']      = '5000'; //lebar maksimum 5000 px
        $config['max_height']     = '5000'; //tinggi maksimu 5000 px
        $config['file_name']      = $nmfile; //nama yang terupload nantinya

        //menampung data konfigurasi gambar
        $this->upload->initialize($config);
          
        //jika upload file yang variabelnya bernama filefoto
        if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto')){
                $gbr  = $this->upload->data(); //tampung perintah upload
                $data = array(
                        'username'    =>$this->input->post('username'), //pemberian nama variable untuk post judul
                        'nama'        =>$this->input->post('nama'),
                        'password'    =>$this->input->post('password'), //pemberian nama variable untuk post penulis
                        'level'       =>$this->input->post('level'),
                        'foto'        =>$gbr['file_name'], //pemberian nama variable untuk post gambar
                        'sia'    	  =>$this->input->post('sia'),
                        'sipa'	      =>$this->input->post('sipa'));

                //memanggil fungsi simpan yang ada pada model m_artikel yaitu get_insert()
                $this->m_user->save($data);

                //konfigurasi ke-2 untuk resize gambar
                $config2['image_library']  = 'gd2'; 
                $config2['source_image']   = $this->upload->upload_path.$this->upload->file_name; //sumber file gambar
                $config2['new_image']      = './assets/images/users/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width']          = 100; //lebar setelah resize menjadi 100 px
                $config2['height']         = 100; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                    $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
                }
                  //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Berhasil simpan !!</div></div>");
                redirect('user'); //jika berhasil maka akan ditampilkan view upload
            }

            else{
                  //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Gagal simpan !!</div></div>");
                  redirect('user/tambah'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

	  //fungsi untuk edit gambar berdasarkan id
    function lihatprofil(){
        $data['title'] = 'Lihat Profil';
        $id_user        = $this->input->get('id'); //mengambil variabel get idartikel dari url
        $where        = array('id'=>$id_user); //array where query untuk menampilkan gambar per id
        $data['row']  = $this->m_user->get_bydata($where);   //query dari model ambil per id
        
        $this->template->load('static','user/lihatprofil',$data);
    }

    function update_user(){
        $id           = $this->input->get('id');
        $namalengkap  = $this->input->post('nama');
        $username     = $this->input->post('username');
        $pass         = $this->input->post('password');
        $sia          = $this->input->post('sia');
        $sipa         = $this->input->post('sipa');
        $tentang      = $this->input->post('tentang');

        $data         = array(
                        'nama'     => $namalengkap,
                        'username' => $username,
                        'password' => $pass,
                        'sia'      => $sia,
                        'sipa'     => $sipa,
                        'tentang'  => $tentang);

        $where        = array('id' => $id);

        $cek          = $this->m_user->update($data,$where);

        if ($cek >= 1){
              $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berhasil update !!</div></div>");
          }

          else{
              echo "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">GAGAL !!</div></div>";
          }
          redirect('user');
    }

    function hapus(){
        $kode_brg   = $this->uri->segment(3);
        
        $this->m_barang->hapus($kode_brg);
    }
}
