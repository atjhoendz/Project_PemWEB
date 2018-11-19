<?php
    class Login_model extends CI_Model{
        public function cek_login($table, $uname, $pwd){
            return $this->db->select('*')->from($table)->where('username', $uname)->where('password', $pwd)->get();
        }

        public function getRumahID($uname){
            $this->db->select('id_rumah')->from('user')->where('username', $uname);
            return $this->db->get()->result();
        }
    }
?>