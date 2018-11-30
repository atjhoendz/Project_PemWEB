<?php
    class Finance_model extends CI_Model{
        public function getFinance_Model(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('id_rumah', $idRumah);
            $query = $this->db->get('keuangan');
            return $query->result();
        }
    }
?>