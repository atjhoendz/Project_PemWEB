<?php
    class Homepage extends CI_Controller{

        function __construct(){
            parent ::__construct();
            $this->load->model('home_model');
            $this->load->model('Finance_model');
            $this->load->model('task_model');
        }
        
        public function index(){
            if($this->session->logged_in){
                $data['housemate'] = $this->home_model->getHousemate_Model();
                $data['finance'] = $this->Finance_model->getFinance_Model();
                $data['expenses'] = $this->Finance_model->getExpenses();
                $data['income'] = $this->Finance_model->getIncome();
                $data['jmlincome'] = $this->Finance_model->getjmlIncome();
                $data['jmlexpenses'] = $this->Finance_model->getjmlExpenses();
                $data['balance'] = $this->Finance_model->getBalance();
                $data['task'] = $this->task_model->getTask_model();
                $this->load->view('homepage', $data);
            }else{
                redirect(site_url());
            }
        }

        function getBalanceJSON(){
            echo json_encode($this->Finance_model->getBalance());
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

        function addFinance(){
            $id_rumah = $this->session->idRumah;
            $detail = $this->input->post('detailTrans');
            $jml = $this->input->post('jmlTrans');
            $tgl = $this->input->post('tglTrans');
            $status = $this->input->post('statusTrans');

            $data_finance = array(
                'id_rumah' => $id_rumah,
                'detail_transaksi' => $detail,
                'jumlah' => $jml,
                'flag' => $status,
                'tanggal' => $tgl
            );
            
            if($this->Finance_model->addFinance_model($data_finance)){
                echo 'Success';
            }else{
                echo 'Gagal Menambahkan Data';
            }
        }

        function deleteFinance(){
            $idTransaksi = $this->input->post('id_Transaksi');
            $id = array(
                'id_transaksi' => $idTransaksi
            );

            if($this->Finance_model->deleteFinance_model($id)){
                echo 'Success';
            }else{
                echo 'Gagal Menghapus Data';
            }
        }

        function getTask(){
            echo json_encode($this->task_model->getTask_model());
        }

        function addTask(){
            $id_task = substr($this->input->post('taskDetail'), 0, 3) . random_int(0, 99);
            $id_rumah = $this->session->idRumah;
            $id_anggota = $this->input->post('idAnggota');
            $taskDetail = $this->input->post('taskDetail');
            $nama_anggota = $this->input->post('namaAnggota');
            $deadline = $this->input->post('deadlineTask');

            $data_task = array(
                'id_task' => $id_task,
                'id_anggota' => $id_anggota,
                'id_rumah' => $id_rumah,
                'nama_task' => $taskDetail,
                'nama_anggota' => $nama_anggota,
                'tgl_task' => $deadline
            );

            if($this->task_model->addTask_model($data_task)){
                echo 'Success';
            }else{
                echo 'Gagal Menambahkan Data';
            }
        }

        function updateTask(){
            $id_task = $this->input->post('idTask');
            $id_rumah = $this->session->idRumah;
            $id_anggota = $this->input->post('idAnggota');
            $taskDetail = $this->input->post('taskDetail');
            $nama_anggota = $this->input->post('namaAnggota');
            $deadline = $this->input->post('deadlineTask');

            $data_task = array(
                'id_task' => $id_task,
                'id_anggota' => $id_anggota,
                'id_rumah' => $id_rumah,
                'nama_task' => $taskDetail,
                'nama_anggota' => $nama_anggota,
                'tgl_task' => $deadline
            );

            if($this->task_model->updateTask_model($data_task)){
                echo 'Success';
            }else{
                echo 'Gagal Memperbarui Data';
            }
        }

        function deleteTask(){
            $id_task = $this->input->post('idTask');
            $data_task = array(
                'id_task' => $id_task
            );

            if($this->task_model->deleteTask_model($data_task)){
                echo 'Success';
            }else{
                echo 'Gagal Menghapus Data';
            }
        }

        function logout(){
            $this->session->sess_destroy();
            redirect(site_url());
        }
    }
?>