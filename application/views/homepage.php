<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/bootstrap.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#HousemateSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Housemate</a>
                    <ul class="collapse list-unstyled" id="HousemateSubmenu">
                        <li>
                            <a href="#">Housemate 1</a>
                        </li>
                        <li>
                            <a href="#">Housemate 2</a>
                        </li>
                        <li>
                            <a href="#">Housemate 3</a>
                        </li>
                        <li>
                            <a href="#">Housemate 4</a>
                        </li>    
                    </ul>
                </li>
                <li>
                    <a href="#FinanceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Finance</a>
                    <ul class="collapse list-unstyled" id="FinanceSubmenu">
                        <li>
                            <a href="#">Income</a>
                        </li>
                        <li>
                            <a href="#">Expenses</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Task</a>
                </li>
            </ul>
            <div class="sidebar-footer bayangan-atas">
                <button id="btn-options" class="btn-options">
                    <i class="fas fa-cogs"></i>
                    <span>Options</span>
                </button>
            </div>
        </nav>
        
        <div id="content">
            <nav class="navbar navbar-expand bg-light bayangan-bawah">
                <div class="container">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <span id="nameHome">User Home Name</span>
                </div>
            </nav>

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
            
            <div class="footer bayangan-atas">
                <span>&copy Project Pemrograman Web 2018 | E-Work Corp.</span>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
    
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>

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