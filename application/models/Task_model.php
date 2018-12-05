<?php
    class Task_model extends CI_Model{
        public function getTask_model(){
            $idRumah = $this->session->idRumah;
            $this->db->select('*')->where('id_rumah', $idRumah);
            $query = $this->db->get('task');
            return $query->result();
        }

        public function addTask_model($data_task){
            return $this->db->insert('task', $data_task);
        }

        public function updateTask_model($data_task){
            return $this->db->replace('task', $data_task);
        }

        public function deleteTask_model($id_task){
            return $this->db->delete('task', $id_task);
        }
    }
?>