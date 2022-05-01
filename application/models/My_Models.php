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
}

?>