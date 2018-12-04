<?php
    class Home_model extends CI_MODEL{
        public function getHousemate_Model(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('id_rumah', $idRumah);
            $query = $this->db->get('anggota');
            return $query->result();
        }

        function addHousemate_model($data_anggota){
            return $this->db->insert('anggota', $data_anggota);
        }

        function updateHousemate_model($data_anggota){
            return $this->db->replace('anggota', $data_anggota);
        }

        function deleteHousemate_model($id_anggota){
            return $this->db->delete('anggota', $id_anggota);
        }
    }
?>