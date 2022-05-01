<?php

class Login extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('My_Models');
    }

    public function index(){
        $this->load->view('halaman_login');
    }

    public function do_login(){
        // memasukkan nama dari form yang di input
        $user = $this->input->post('uname');
        $pass = $this->input->post('password');

        // var login untuk mengakses ke model
        // parameter dta yang dikirim $user dan $pass
        $login = $this->My_Models->Cek_login($user,$pass);

        // ketika ada datanya (>0) maka akan menampilkan berhasil
        // kalau ga ada akan muncul gagal, ex: username dan password terdaftar jadi ada datanya, tapi kalau belum terdaftar akan gagal.

        // jika datanya ada akan di arahkan ke halaman admin
        if(count($login) > 0 ){
           
         redirect('login/admin');

        }else{
            $this->session->set_flashdata('login','Periksa Username dan Password Anda');
            redirect('login/index');
        }

    }

    public function admin(){
        $this->load->view('template/header');
        $this->load->view('admin/admin');
        $this->load->view('template/footer');
    }

    public function buku(){

        $data_nana['buku_nana'] = $this->My_Models->Ambil_Buku();
        $this->load->view('template/header');
        $this->load->view('admin/buku', $data_nana);
        $this->load->view('template/footer');
    }

    public function anggota(){

        $this->load->view('template/header');
        $this->load->view('admin/anggota');
        $this->load->view('template/footer');

    }

    public function peminjaman(){

        $this->load->view('template/header');
        $this->load->view('admin/peminjaman');
        $this->load->view('template/footer');
    }

    public function setting(){

        $this->load->view('template/header');
        $this->load->view('admin/setting');
        $this->load->view('template/footer');
    }

    public function tambah_buku(){

        $this->load->view('template/header');
        $this->load->view('admin/tambah_buku');
        $this->load->view('template/footer');
    }

    public function do_tambah(){
       
       
        $this->My_Models->do_tambah();
        $this->session->set_flashdata('tambah','Data Berhasil di Tambah');
        redirect('login/buku');

        // $foto       = $_FILES['foto'] ['name']   ;
        // // foto : diambil dari name form ketika tambah foto
        // if($foto=''){
        //     echo "Tidak ada Gambar";
        // }else{
        //     $config['allowed types'] = 'jpg|img|png|gif';
        //     $config['upload_path'] = "./assets/foto";
        //     $this->load->library('upload', $config);
        //     if(!$this->upload->do_upload('foto')){
        //         echo "gagal";
        //     }else{
        //    $this->My_Models->do_tambah();
        //     }
        // }
    
    }


}
?>