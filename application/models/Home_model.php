<?php
    class Home_model extends CI_MODEL{
        public function getHousemate_Model(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('id_rumah', $idRumah);
            $query = $this->db->get('anggota');
            return $query->result();
        }

        function addHousemate_model($data_anggota){
            if($this->db->insert('anggota', $data_anggota)){
                return true;
            }else{
                return false;
            }
        }

        function updateHousemate_model($data_anggota){
            if($this->db->replace('anggota', $data_anggota)){
                return true;
            }else{
                return false;
            }
        }
    }
?>