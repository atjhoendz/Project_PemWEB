<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url("assets/image/ehome-solid.png");?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/bootstrap.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
    <!-- Popper JS -->
    <script src="<?php echo base_url('assets/js/popper.js'); ?>"></script>   
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <!-- Homepage JS -->
    <script src="<?php echo base_url('assets/js/homepage.js');?>"></script>
    <script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>

</head>
<body>
    <div class="wrapper">
        <!-- Side Bar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <button id="btnHome" class="btn-home">
                    <i class="fas fa-home"></i>
                    <span>E-Home</span>
                </button>
                <input type="hidden" id="baseUrl" value="<?php echo site_url('homepage'); ?>">
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a id="homeBtn">
                        <i class="fas fa-home menu-icon"></i>
                        Home
                    </a>
                </li>
                <li>
                    <div class="a-group">
                        <a id="housemateBtn" class="a-left">
                            <i class="fas fa-users menu-icon"></i>
                            Housemate
                         </a>
                        <a href="#HousemateSubmenu" id="get_housemate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle a-right">
                            <span class="sr-only">Toggle</span>
                        </a>
                    </div>
                    <ul class="collapse list-unstyled" id="HousemateSubmenu">
                        <?php if(isset($housemate) || !empty($housemate)){
                            $i=1;
                            foreach ($housemate as $row) :?>
                                <li>
                                    <a href="<?php echo 'anggota/'.($i++);?>">
                                        <i class="fas fa-user"></i>
                                        <?php echo $row->nama_anggota;?>
                                    </a>
                                </li>   
                            <?php endforeach; ?>
                        <?php }else{ ?>
                            <li>
                                <a href="#">
                                    <i class="fas fa-user"></i>
                                    No Housemate yet
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <div class="a-group">
                        <a id="financeBtn" class="a-left">
                            <i class="fas fa-dollar-sign menu-icon"></i>
                            Finance
                        </a>
                        <a href="#FinanceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle a-right">
                            <span class="sr-only">Toggle</span>
                        </a>
                    </div>
                    <ul class="collapse list-unstyled" id="FinanceSubmenu">
                        <li>
                            <a href="#">
                                <i class="fas fa-chevron-circle-down"></i>
                                Income
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chevron-circle-up"></i>
                                Expenses
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a id="btnTask">
                        <i class="fas fa-tasks menu-icon"></i>
                        Task
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled components sidebar-footer bayangan-atas dropup">
                <li>
                    <ul class="collapse list-unstyled" id="MenuOptions">
                        <li>
                            <a href="<?php echo site_url('homepage/logout');?>">
                                <i class="fas fa-unlock"></i>
                                Logout
                            </a>
                        </li>
                        <li>
                            <a id="btnAbout">
                                <i class="fas fa-info-circle"></i>
                                About
                            </a>
                        </li>
                    </ul>
                    <a href="#MenuOptions" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-cogs menu-icon"></i>
                        <span>Options</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <div id="content">
            <!-- Header -->
            <nav class="navbar navbar-expand bg-light bayangan-bawah">
                <div class="container">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <span id="nameHome"><?php echo $this->session->username; ?></span>
                </div>
            </nav>
            <!-- Main -->
            <div id="main">
                <div class="container">
                    <div id="mainContainer">
                        <div class="row">
                            <div id="date-circle" class="column">
                                <div class="card-body-circle">
                                    <span id="txt-tanggal"></span>
                                    <span id="txt-jam"></span>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card pointer" id="homeFinance">
                                    <div class="card-head">
                                        Finance
                                    </div>
                                    <div class="card-body">
                                        <p id="income">Pemasukan : Rp 10.000,-</p>
                                        <p id="expenses">Pengeluaran : Rp 150.000,-</p>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card pointer" id="homeTask">
                                    <div class="card-head">
                                        Upcoming Task
                                    </div>
                                    <div class="card-body">
                                        20 Nov 2018 : Bayar Wifi
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="column">
                                <div class="card pointer" id="homeHousemate">
                                    <div class="card-head">Housemate</div>
                                    <div class="card-body">
                                        <?php if(isset($housemate) || !empty($housemate)){
                                            $i=1;
                                            foreach ($housemate as $row) : ?>
                                                <p><?php echo $i++ .". ". $row->nama_anggota ?></p>
                                            <?php endforeach ?>
                                        <?php }else{ ?>
                                            <p>No Housemate Yet</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="column">
                                <div class="card pointer menu" id="homeAddHousemate">
                                    <div class="card-head"></div>
                                    <div class="card-body">
                                        <i class="Menuicon fas fa-plus-circle"></i>
                                        <p>
                                            Add New Housemate
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card pointer menu" id="homeUpdateHousemate">
                                    <div class="card-head"></div>
                                    <div class="card-body">
                                        <i class="Menuicon fas fa-user-edit"></i>
                                        <p>
                                            Update Housemate
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card pointer menu" id="homeAddFinance">
                                    <div class="card-head"></div>
                                    <div class="card-body">
                                        <i class="Menuicon fas fa-plus-circle"></i>
                                        <p>
                                            Add Finance
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card pointer menu" id="homeAddTask">
                                    <div class="card-head"></div>
                                    <div class="card-body">
                                        <i class="Menuicon fas fa-plus-circle"></i>
                                        <p>
                                            Add New Task
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="housemateContainer" class="hide">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn" id="addHousemate">
                                    <i class="fas fa-plus-circle"></i>
                                    Add Housemate
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn" id="editHousemate">
                                    <i class="fas fa-user-edit"></i>
                                    Edit Housemate
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <?php if(isset($housemate) || !empty($housemate)){
                                foreach($housemate as $row) : ?>
                                    <div class="column pointer">
                                        <div class="card">
                                            <div class="card-head">
                                                <?php echo $row->nama_anggota; ?>
                                            </div>
                                            <div class="card-body">
                                                <img src="<?php echo $row->url_fotoanggota; ?>" alt="Url Foto" class="img_anggota">
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php }else{ ?>
                                <div class="column">
                                        <div class="card">
                                            <div class="card-head">
                                                Housemate
                                            </div>
                                            <div class="card-body">No Housemate yet</div>
                                        </div>
                                    </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div id="financeContainer" class="hide">
                        <div class="card">
                            <div class="card-head">
                                <div class="headFinance">
                                    <span class="txtLeft" id="txtBalance">Rp</span>
                                    <span id="addFinance" class="btnOpsi fas fa-plus-circle"></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover pointer">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Detail Transaksi</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($finance) || !empty($finance)){
                                                $number = 1;
                                                foreach($finance as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $number++; ?></td>
                                                        <td nowrap><?php echo $row->detail_transaksi; ?></td>
                                                        <?php if ($row->flag==1) {
                                                            echo "<td class='txtIncome'>Rp".$row->jumlah."</td>";
                                                        } else {
                                                            echo "<td class='txtExpenses'>Rp".$row->jumlah."</td>";
                                                        } ?>
                                                        <td nowrap><?php echo $row->tanggal; ?></td>
                                                        <td><button class="btn-danger">Delete</button></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } else { ?>
                                                <tr><td colspan="4">No records yet!</td></tr>
                                            <?php } ?>
                                        </tbody>
                                        <span class="small right">Note : <span class="txtIncome">Income</span>|<span class="txtExpenses">Expenses</span></span>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="taskContainer" class="hide">
                        <div class="card">
                            <div class="card-head">
                                <span id="addTask" class="btnOpsi fas fa-plus-circle"></span>
                                TASK
                            </div>
                            <div class="card-body">
                                <small class="right">*Click on task list to get more options.</small>
                                <div class="table-responsive">
                                    <table class="table table-hover pointer">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th nowrap>Task Detail</th>
                                                <th>Deadline</th>
                                                <th>Housemate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($task) || !empty($task)){
                                                $i = 1;
                                                foreach($task as $t) : ?>
                                                    <tr class="centerVertical">
                                                        <td><?php echo $i++ ?></td>
                                                        <td nowrap><?php echo $t->nama_task ?></td>
                                                        <td nowrap><?php echo $t->tgl_task ?></td>
                                                        <td class="userPic fas fa-user-circle" nowrap><?php echo $t->nama_anggota ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php }else{ ?>
                                                <tr>
                                                    <td colspan="3">No record yet!</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modalPopUp" class="hide">
                        <div class="modalAdd-header" id="modalHeader">
                            <span id="closePopUp" class="close">&times;</span>
                            <span id="modal-title">Title</span>
                        </div>
                        <div class="modalAdd-content" id="modalContent">
                            Content
                        </div>
                        <div class="modalAbout-footer hide" id="modalFooter">Footer</div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div id="footer" class="footer bayangan-atas">
                <span>&copy Project Pemrograman Web 2018 | E-Work Corp.</span>
            </div>
        </div>
    </div>
</body>
</html>