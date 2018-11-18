<?php
class Loginpage extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index(){
        $this->load->view('loginpage');
    }
    
    public function login(){
        $uname = $this->input->post('username');
        $pwd = $this->input->post('password');

        if($uname != NULL && $pwd != NULL){
            $data = $this->login_model->cek_login('user', $uname, $pwd)->num_rows();
            if($data == 1){
                echo "Login Berhasil...";
            }else{
                echo "Username or Password is Wrong...";
            }
        }
    }
}
?>