<?php
class Register extends CI_Controller{
    public function index(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('register');
        } else {
            $this->load->model('Register_model');
            $this->Register_model->register_akun();
            $this->load->view('loginpage');
        }
    }
}
?>