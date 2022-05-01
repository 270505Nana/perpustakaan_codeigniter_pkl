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
}

?>