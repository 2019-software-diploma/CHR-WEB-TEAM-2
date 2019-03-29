<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 * Date: 2019-03-11
 * Time: 17:54
 */

session_start();
$_SESSION;
require_once "theme/default/header.php";
/*Main Start*/
?>
<!-- Modal HTML -->
<div id="Login" class="modal fade ">
    <div class="flipper">
        <div class="modal-dialog modal-dialog-centered modal-login modal-front">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar">
                        <img src="./static/img/avatar.png" alt="Avatar">
                    </div>
                    <h4 class="modal-title">Member Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/api.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                        </div>
                    </form>
                </div>
                <span class="border-top"></span>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary btn-lg btn-block btn-register" onclick="flip()">Register</button>
                </div>
                <div class="modal-footer">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>
        </div>
        <div class="modal-dialog modal-dialog-centered modal-login modal-back">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar">
                        <img src="./static/img/avatar.png" alt="Avatar">
                    </div>
                    <h4 class="modal-title">Member Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/api.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="rpassword" placeholder="Conform Password" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Register</button>
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
<?php
/*Main End*/
require_once "theme/default/footer.php";
?>
