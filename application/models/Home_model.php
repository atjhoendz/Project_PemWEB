<?php
    class Home_model extends CI_MODEL{
        public function getHousemate_Model(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('id_rumah', $idRumah);
            $query = $this->db->get('anggota');
            return $query->result();
        }

        function addHousemate_model($data_anggota){
            $this->db->insert('anggota', $data_anggota);
        }
    }
?>