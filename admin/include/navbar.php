<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>ADMIN <span>PANEL</span></h4>
                <img src="images/admin.png" alt="">
                <h5>SUPER ADMIN</h5>
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="dashboard.php"><img class="icon_img" src="images/house.png" alt=""> HOME</a>
                    <!-- <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="manageMember.php"><img class="icon_img" src="images/customer-service.png" alt="">Manage Member</a>
                </li>
                <li>
                    <a href="manageNgo.php"><img class="icon_img" src="images/info.png" alt="">Manage NGO</a>
                </li>
                <li>
                    <a href="managemedicineApprove.php"><img class="icon_img" src="images/briefcase.png" alt="">Manage Medicine Approval</a>
                </li>
                <li>
                    <a href="managegoodsApprove.php"><img class="icon_img" src="images/briefcase.png" alt="">Manage Goods Approval</a>
                </li>
                <li>
                    <a href="managemoneyApprove.php"><img class="icon_img" src="images/briefcase.png" alt="">Manage Money Approval</a>
                </li>
                <li>
                    <!-- <a href="#"><img class="icon_img" src="images/blog.png" alt="">Reporting</a> -->
                </li>
            </ul>
            
            
        </nav>
        

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <label for="check" id="sidebarCollapse">
                        <i class="fas fa-bars" id="sidebar_btn"></i>
                      </label>
                    
                    <div class="button">
                        <a class="btn btn-danger" href="adminlogout.php">LOGOUT</a>
                    </div>
            </nav>