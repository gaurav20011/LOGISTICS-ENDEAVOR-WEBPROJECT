<div class="navbar-area">


    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.php">
                    <!-- <img src="medico_assets/assets/img/logo.png" class="logo-one" alt="Logo"> -->
                    <!-- <img src="medico_assets/assets/img/logo-2.png" class="logo-two" alt="Logo"> -->
                    <h4 style="text-align:center; color:#31B3F7">Cargos</h4>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">

                        <!-- 🟡 for user session  starts-->
                        <?php if (isset($_SESSION['user_id'])) { ?>

                            <li class="nav-item">
                                <a href="index.php" class="nav-link">
                                    HOME
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="view_feedback.php" class="nav-link">
                                    Feedbacks
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="about.php" class="nav-link">
                                    About us
                                </a>
                            </li>

                            <!-- user login & reg -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    User
                                    <i class='bx bx-chevron-down'></i>
                                </a>

                                <ul class="dropdown-menu">

                                    <li class="nav-item">
                                        <a href="user/logout.php" class="nav-link">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- user booking status -->
                            <li class="nav-item">
                                <a href="booking_all_user.php" class="nav-link">
                                    <!-- booking status -->
                                </a>
                            </li>

    

                        <?php } else { ?>
                            <!-- 🟡 for user session  ends-->

                            <li class="nav-item">
                                <a href="index.php" class="nav-link">
                                    HOME
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="about.php" class="nav-link">
                                    About us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="view_feedback.php" class="nav-link">
                                    Feedbacks
                                </a>
                            </li>


                            <!-- company login & reg -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    company
                                    <i class='bx bx-chevron-down'></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="company/login_front.php" class="nav-link">
                                            Login
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="company/reg_front.php" class="nav-link">
                                            Register
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- user login & reg -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    User
                                    <i class='bx bx-chevron-down'></i>
                                </a>


                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="user/login_front.php" class="nav-link">
                                            Login
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="user/reg_front.php" class="nav-link">
                                            Register
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Admin login -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Admin
                                    <i class='bx bx-chevron-down'></i>
                                </a>


                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="admin/login_front.php" class="nav-link">
                                            Login
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>


    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-item">
                            <div class="option-item">
                                <i class='search-btn bx bx-search'></i>
                                <i class='close-btn bx bx-x'></i>
                                <div class="search-overlay search-popup">
                                    <div class='search-box'>
                                        <form class="search-form">
                                            <input class="search-input" name="search" placeholder="Search" type="text">
                                            <button class="search-button" type="submit">
                                                <i class="bx bx-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="option-item">
                                <div class="add-cart-btn">
                                    <a href="#" class="cart-btn-icon">
                                        <i class='bx bx-shopping-bag'></i>
                                        <span>0</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>