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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>   
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <!-- Homepage JS -->
    <script src="<?php echo base_url('assets/js/homepage.js');?>"></script>
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
                <input type="hidden" id="baseUrl" value="<?php echo base_url('homepage'); ?>">
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
                    <a href="#HousemateSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle a-right">
                        <span class="sr-only">Toggle</span>
                    </a>
                    </div>
                    <ul class="collapse list-unstyled" id="HousemateSubmenu">
                        <li>
                            <a href="#">
                                <i class="fas fa-user"></i>
                                Housemate 1
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-user"></i>
                                Housemate 2
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-user"></i>
                                Housemate 3
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-user"></i>
                                Housemate 4
                            </a>
                        </li>    
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
                    <a id="btnTask" style="bakground:">
                        <i class="fas fa-tasks menu-icon"></i>
                        Task
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled components sidebar-footer bayangan-atas dropup">
                <li>
                    <ul class="collapse list-unstyled" id="MenuOptions">
                        <li>
                            <a href="<?php echo site_url();?>">
                                <i class="fas fa-unlock"></i>
                                Logout
                            </a>
                        </li>
                        <li>
                            <a href="#">
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
                    <span id="nameHome">User Home Name</span>
                </div>
            </nav>
            <!-- Main -->
            <div id="main">
                <div class="container">
                    <div id="mainContainer">
                        <div class="row">
                            <div class="column">
                                <div class="card">
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
                                <div class="card">
                                    <div class="card-head">
                                        Upcoming Task
                                    </div>
                                    <div class="card-body">
                                        20 Nov 2018 : Bayar Wifi
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="column">
                                <div class="card">
                                    <div class="card-head">Finance</div>
                                    <div class="card-body">blablab</div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card">
                                    <div class="card-head">Finance</div>
                                    <div class="card-body">blablab</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <div class="card">
                                    <div class="card-head">Housemate 1</div>
                                    <div class="card-body">Achun</div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card">
                                    <div class="card-head">Housemate 2</div>
                                    <div class="card-body">Miwon</div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card">
                                    <div class="card-head">Housemate 3</div>
                                    <div class="card-body">Dani</div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="card">
                                    <div class="card-head">Housemate 4</div>
                                    <div class="card-body">Ewok</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="housemateContainer" class="hide">
                        <div class="judul">
                            <h1>Housemate</h1>
                        </div>
                        <hr>
                        <div class="isi">
                            <h1>isi</h1>
                        </div>
                    </div>
                    <div id="financeContainer" class="hide">
                        <div class="judul">
                            <h1>Finance</h1>
                        </div>
                        <hr>
                        <div class="isi">
                            <h1>isi</h1>
                        </div>
                    </div>
                    <div id="taskContainer" class="hide">
                        <div class="judul">
                            <h1>Task</h1>
                        </div>
                        <hr>
                        <div class="isi">
                            <h1>isi</h1>
                        </div>
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