<?php
    class Finance_model extends CI_Model{
        public function getFinance_Model(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('id_rumah', $idRumah);
            $query = $this->db->get('keuangan');
            return $query->result();
        }

        public function getIncome(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('flag', 1)->where('id_rumah', $idRumah);
            $query = $this->db->get('keuangan');
            return $query->result();
        }

        public function getExpenses(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('flag', 0)->where('id_rumah', $idRumah);
            $query = $this->db->get('keuangan');
            return $query->result();
        }

        public function getBalance(){
            $idRumah = $this->session->idRumah;
            $query = $this->db->query("SELECT (
                (SELECT SUM(jumlah) FROM keuangan WHERE flag=1 AND id_rumah='".$idRumah."')
                - (SELECT SUM(jumlah) FROM keuangan WHERE flag=0 AND id_rumah='".$idRumah."')) AS balance FROM keuangan LIMIT 1;");
            return $query->result();
        }

        public function addFinance_model($data_finance){
            return $this->db->insert('keuangan', $data_finance);
        }

        public function deleteFinance_model($idTransaksi){
            return $this->db->delete('keuangan', $idTransaksi);
        }
    }
?>