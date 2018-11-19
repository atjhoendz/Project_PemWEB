<?php
    class Homepage extends CI_Controller{

        function __construct(){
            parent ::__construct();
            $this->load->model('home_model');
        }
        
        public function index(){
            if($this->session->logged_in){
                $data['housemate'] = $this->home_model->getHousemate_Model();
                $this->load->view('homepage', $data);
            }else{
                redirect(site_url());
            }
        }

        function getHousemate(){
            echo json_encode($this->home_model->getHousemate_Model());
        }

        function logout(){
            $this->session->sess_destroy();
            redirect(site_url());
        }
    }
?>