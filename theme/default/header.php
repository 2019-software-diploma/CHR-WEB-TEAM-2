<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

require_once "config/main.config.php";
session_name('user');
session_start();
if (($page_type === 6 || $page_type === 2) && !isset($_SESSION['Email'])){
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $PageType[$page_type]; ?> - Caprivi Healthcare Research</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/css/main.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
        <div class="container">
            <div class="row">
                <a class="navbar-brand" href="/">
                    <img id="logo" src="./static/img/index.png" alt="Logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown <?php if ($page_type === 0) { echo "active"; } ?>">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cloud based Healthcare Research</a>
                        <div class="dropdown-menu bg-dark">
                            <a class="dropdown-item bg-dark text-light" href="/">Cloud Research</a>
                            <a class="dropdown-item bg-dark text-light" href="#">What's Cloud Computing</a>
                            <a class="dropdown-item bg-dark text-light" href="#">Cloud Type</a>
                            <a class="dropdown-item bg-dark text-light" href="#">Research Project</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?php if ($page_type === 1 || $page_type === 6 || $page_type === 2) { echo "active"; } ?>">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Get Involved</a>
                        <div class="dropdown-menu bg-dark">
                            <a class="dropdown-item bg-dark text-light" href="appointment.php">Make Appointment</a>
                            <a class="dropdown-item bg-dark text-light" href="profile.php">Subscribe to News letter</a>
                            <a class="dropdown-item bg-dark text-light" href="post.php">Post to fourm</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Out ICT Solutions</a>
                        <div class="dropdown-menu bg-dark">
                            <a class="dropdown-item bg-dark text-light" href="#">Publications</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About CHR</a>
                        <div class="dropdown-menu bg-dark">
                            <a class="dropdown-item bg-dark text-light" href="#">About CHR</a>
                            <a class="dropdown-item bg-dark text-light" href="#">Our Team</a>
                        </div>
                    </li>
                    <li class="nav-item <?php if ($page_type === 4) { echo "active"; } ?>">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <?php
                if (!isset($_SESSION["Email"])) {
                    ?>
                    <button type="button" class="nav-login btn btn-outline-dark" href="#Login" data-toggle="modal"
                            onclick="cleanDialog()">
                        Sign In / Up
                    </button>
                <?php
                } else {
                    ?>
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp; <?php echo $_SESSION["FirstName"]; ?> </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info"
                                 aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item dropdown-item-text disabled" href="#"><?php echo $Identity[$_SESSION['Level']]; ?></a>
                                <div class="dropdown-divider"></div>
                                <?php
                                    if ($_SESSION['Level'] == 5 || $_SESSION['Level'] == 6){
                                ?>
                                <a class="dropdown-item" href="profile.php">My account</a>
                                <?php
                                    } else {
                                ?>
                                <a class="dropdown-item" href="management.php">Management</a>
                                <?php
                                    }
                                ?>
                                <a class="dropdown-item" href="api.php?action=logout">Log out</a>
                            </div>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</header>
<div id="Login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="flip-container">
            <div class="flipper">
                <div class="front">
                    <div class="modal-dialog modal-login">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="avatar">
                                    <img src="./static/img/avatar.png" alt="Avatar">
                                </div>
                                <h4 class="modal-title">Member Login</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="loginForm" action="" method="post">
                                    <div class="form-group">
                                        <input type="text" id="l_username" class="form-control" name="username"
                                               placeholder="User ID" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="t_l_password" class="form-control"
                                               placeholder="Password" required="required">
                                        <input type="hidden" id="l_password" name="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <button id="login_btn" type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <span class="border-top"></span>
                            <div class="modal-body">
                                <button type="button" class="btn btn-primary btn-lg btn-block btn-register">Register
                                </button>
                            </div>
                            <div class="modal-footer">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="back">
                    <div class="modal-dialog modal-login">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="avatar">
                                    <img src="./static/img/avatar.png" alt="Avatar">
                                </div>
                                <h4 class="modal-title">Member Register</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="registerForm" action="" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               placeholder="First Name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               placeholder="Last Name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="t_r_password" class="form-control"
                                               placeholder="Password" required="required">
                                        <input type="hidden" id="r_password" name="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input id="c_r_password" type="password" class="form-control"
                                               placeholder="Conform Password" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" name="email"
                                               placeholder="Email" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" class="custom-control-input" id="newsLetter"
                                               name="newsletter">
                                        <label class="custom-control-label" for="newsLetter">Receive Email?</label>
                                    </div>
                                    <div class="form-group">
                                        <button id="register" type="submit"
                                                class="btn btn-primary btn-lg btn-block login-btn">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <span class="border-top"></span>
                            <div class="modal-body">
                                <button type="button" class="btn btn-primary btn-lg btn-block btn-login">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>