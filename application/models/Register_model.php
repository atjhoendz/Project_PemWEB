<?php
    class Register_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function register_akun(){
            $id = substr($this->input->post('username'), 0, 3) . random_int(0, 99);

            $data_rumah = array(
                'id_rumah'   => $id,
                'nama_rumah' => '',
                'alamat'     => '',
                'url_foto'   => ''
            );

            $this->db->insert('rumah', $data_rumah);

            $data = array(
                'id_rumah' => $id,
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email'    => $this->input->post('email'),
                'kontak'   => $this->input->post('nomor')
            );

            return $this->db->insert('user', $data);
        }


    }
?>