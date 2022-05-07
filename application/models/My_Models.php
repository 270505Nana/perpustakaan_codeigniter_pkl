<?php

class My_Models extends CI_Model{

    public function Cek_login($user,$pass){
    // menerima 2 parameter
    return $this->db->get_where('admin', array(
        'username' => $user,
        'password' => $pass
    ))->result_array();

    }

    public function Ambil_Buku(){

        return $this->db->get('buku')->result_array();
    }

    public function do_tambah(){

        $data = [
            "judul"     => $this->input->post("judul"),
            "pengarang" => $this->input->post("pengarang"),
            "isbn"      => $this->input->post("isbn"),
            "penerbit"  => $this->input->post("penerbit"),
            // "foto"      => $this->upload->data("file_name")
        ];

        $this->db->insert("buku", $data);
        // Pakai query builder
    }

    public function show_buku_nana($id){
        return $this->db->get_where('buku', array(
            "id_buku" => $id
        ))->row_array();
    }

    public function do_edit(){
        $data = [
            "judul"     => $this->input->post("judul"),
            "pengarang" => $this->input->post("pengarang"),
            "isbn"      => $this->input->post("isbn"),
            "penerbit"  => $this->input->post("penerbit"),
        ];

        $this->db->where('id_buku',$this->input->post('id'));
        $this->db->update('buku',$data);
    }

    public function lihat_data_nana($id){

        return $this->db->get_where('buku', array(
            'id_buku' => $id
        ))->row_array();
        // Karena memanggil datanyya sedikit jadi pakai row
        // Kalau banyak pakai result_array();
    }

    public function do_hapus_nana($id){
          
        $this->db->where('id_buku', $id);
        return $this->db->delete('buku');
    }

    public function Ambil_Anggota_Nana(){

        return $this->db->get('anggota')->result_array();

    }

    public function do_tambah_anggota(){

        // untuk menampung data
        $data = [
            "nama"    => $this->input->post('nama'),
            "kelas"   => $this->input->post('kelas'),
            "alamat"  => $this->input->post('alamat'),
            "email"   => $this->input->post('email')
        ];

        $this->db->insert("anggota", $data);
        // ada dua parameter yang 
        // 1. nama tabel
        // 2.data yang mau kita kirim(array)
    }

    public function lihat_anggota($id){

        // id_anggota = id yang kita kirim
        $this->db->where('id_anggota', $id);
        return $this->db->get('anggota')->row_array();
    }

    public function do_edit_nana(){

        $data = [
            "nama"    => $this->input->post('nama'),
            "kelas"   => $this->input->post('kelas'),
            "alamat"  => $this->input->post('alamat'),
            "email"   => $this->input->post('email')
        ];

        $this->db->where('id_anggota',$this->input->post('id'));
        $this->db->update('anggota',$data);
         
    }

    public function delete_anggota_nana($id){

        $this->db->where('id_anggota',$id);
        $this->db->delete('anggota');
    }

    public function tambah_peminjaman_nana(){

        $data = [
            'id_anggota'     => $this->input->post('anggota'),
            'id_buku'        => $this->input->post('buku'),
            'tanggal_pinjam' => $this->input->post('tanggal_masuk'),
            'tanggal_kembali'=> $this->input->post('tanggal')
        ];

        $this->db->insert('peminjaman',$data);

    }

    public function get_data_peminjaman(){

        $this->db->select("*");
        $this->db->from('peminjaman');
        $this->db->join('anggota','anggota.id_anggota = peminjaman.id_anggota');
        $this->db->join('buku','buku.id_buku = peminjaman.id_buku');
        return $this->db->get()->result_array();

    
    }
    public function get_id_peminjaman($id){


        $this->db->select("*");
        $this->db->from('peminjaman');
        $this->db->join('anggota','anggota.id_anggota = peminjaman.id_anggota');
        $this->db->join('buku','buku.id_buku = peminjaman.id_buku');
        $this->db->where('id_peminjaman',$id);
        return $this->db->get()->row_array();
    }

    public function delete_peminjaman_nana($id){
        
        $this->db->where('id_peminjaman',$id);
        $this->db->delete('peminjaman');
    }
    public function edit_setting_nana(){
        $data = [
            'password' => $this->input->post('pass')
            // artinya column password kita isi dengan input pass
        ];

        $this->db->where('username',$this->session->userdata('user'));
        //artinya usernamenya harus sama dengan session dimana kita masuk
        //example : aku masuk pakai usernama nana, maka data yang diubah akan disesuaikan dengan username yang aku masukkan di session userdata
        //Ketika sama baru nanti aku ubah
        $this->db->update('admin',$data);
    }
    
    public function total_buku(){

        return $this->db->get('buku')->num_rows();
    }

    public function total_peminjaman(){

        // $this->db->where('status', 'Baru');
        return $this->db->get('peminjaman')->num_rows();
    }

    public function total_anggota(){

        return $this->db->get('anggota')->num_rows();
    }
    
}

?>