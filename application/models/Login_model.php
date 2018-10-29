<?php
    class Login_model extends CI_Model{
        public function cek_login($table, $where){
            return $this->db->get_where($table, $where);
        }
    }
?>