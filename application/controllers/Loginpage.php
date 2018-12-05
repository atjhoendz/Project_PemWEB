<?php
class Loginpage extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index(){
        if($this->session->logged_in){
            redirect(site_url('homepage'));
        }else{
            $this->load->view('loginpage');
        }
    }
    
    public function login(){
        $uname = $this->input->post('username');
        $pwd = $this->input->post('password');

        if($uname != NULL && $pwd != NULL){
            $data = $this->login_model->cek_login('user', $uname, $pwd)->num_rows();
            if($data == 1){
                $idRumah = $this->login_model->getRumahID($uname);
                foreach ($idRumah as $row) {
                    $id = $row->id_rumah;
                }
                echo "Login Berhasil...";
                $newdata = array(
                    'username' => $uname,
                    'idRumah' => $id,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
            }else{
                echo "Username or Password is INVALID...";
            }
        }
    }
}
?>