<?php
    class Homepage extends CI_Controller{

        function __construct(){
            parent ::__construct();
            $this->load->model('home_model');
            $this->load->model('Finance_model');
        }
        
        public function index(){
            if($this->session->logged_in){
                $data['housemate'] = $this->home_model->getHousemate_Model();
                $data['finance'] = $this->Finance_model->getFinance_Model();
                $data['expenses'] = $this->Finance_model->getExpenses();
                $data['income'] = $this->Finance_model->getIncome();
                $data['balance'] = $this->Finance_model->getBalance();
                $this->load->view('homepage', $data);
            }else{
                redirect(site_url());
            }
        }

        function getHousemate(){
            echo json_encode($this->home_model->getHousemate_Model());
        }

        function addHousemate(){
            $id_anggota = substr($this->input->post('nama_anggota'), 0, 3) . random_int(0, 99);
            $url_foto = $this->input->post('url_foto');
            $nama_anggota = $this->input->post('nama_anggota');
            $id_rumah = $this->session->idRumah;

            $data_anggota = array(
                'id_anggota' => $id_anggota,
                'id_rumah' => $id_rumah,
                'nama_anggota' => $nama_anggota,
                'url_fotoanggota' => $url_foto
            );

            if($this->home_model->addHousemate_model($data_anggota)){
                echo 'Success';
            }else{
                echo 'Failed';
            }
        }

        function updateHousemate(){
            $id_anggota = $this->input->post('id_anggota');
            $id_rumah = $this->session->idRumah;
            $url_foto = $this->input->post('url_foto');
            $nama_anggota = $this->input->post('nama_anggota');
            $data_anggota = array(
                'id_anggota' => $id_anggota,
                'id_rumah' => $id_rumah,
                'nama_anggota' => $nama_anggota,
                'url_fotoanggota' => $url_foto
            );

            if($this->home_model->updateHousemate_model($data_anggota)){
                echo 'Success';
            }else{
                echo 'Failed';
            }
        }

        function deleteHousemate(){
            $id = $this->input->post('id_anggota');
            $id_anggota = array(
                'id_anggota' => $id
            );
            if($this->home_model->deleteHousemate_model($id_anggota)){
                echo 'Success';
            }else{
                echo 'Failed';
            }
        }

        function logout(){
            $this->session->sess_destroy();
            redirect(site_url());
        }
    }
?>