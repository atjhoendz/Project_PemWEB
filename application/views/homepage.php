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
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <div class="a-group">
                        <a href="#" class="a-left">
                        <i class="fas fa-users"></i>
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
                        <a href="#" class="a-left">
                            <i class="fas fa-dollar-sign"></i>
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
                    <a href="#">
                        <i class="fas fa-tasks"></i>
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
                        <i class="fas fa-cogs"></i>
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
                    <div class="row">
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ad, cupiditate voluptas quis temporibus vero iusto voluptatum tempora molestiae.</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>blablab</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>blablab</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>blablab</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>blablab</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>blablab</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>blablab</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                                <h1>Finance</h1>
                                <p>blablab</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="footer bayangan-atas">
                <span>&copy Project Pemrograman Web 2018 | E-Work Corp.</span>
            </div>
        </div>
    </div>

    <!-- Script collapse Sidebar -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>