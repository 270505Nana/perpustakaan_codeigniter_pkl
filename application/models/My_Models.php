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
}

?>