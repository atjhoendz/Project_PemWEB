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
        $homename = $this->input->post('homename');
        $pass = $this->input->post('password');
        $repass = $this->input->post('confirmpwd');

        $home = array('nama_rumah' => $homename);
        $user = array('password' => $pass);

        function alert($errorname){
            if($errorname == "pwdnotsame"){
                echo "Kedua Password tidak cocok Silahkan input kembali";
            }else if($errorname == "akunsalah"){
                echo "Homename atau password yang dimasukan belum terdaftar Silahkan Register terlebih dahulu";
            }else if($errorname == "kosong"){
                echo "Field tidak boleh kosong";
            }
        }

        if($homename != NULL && $pass != NULL){
            if($pass == $repass){
                if($this->login_model->cek_login('rumah', $home)->num_rows() > 0){
                    if($this->login_model->cek_login('user', $user)->num_rows() > 0){
                        redirect(site_url('homepage'));
                    }else{
                        alert("akunsalah");
                    }
                }else{
                    alert("akunsalah");
                }
            }else{
                alert("pwdnotsame");
            }
        }else{
            alert("kosong");
        }
    }
}
?>