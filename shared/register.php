
<?php
session_start();

include "shared/database.php";

if(isset($_POST['register'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pswd = $_POST['pswd'];
    $re_pswd = $_POST['conf-pswd'];

    if($pswd == $re_pswd){
        $user_q = "INSERT into `users` values(null, '$username', '$email', '$pswd')";
        $user_res = mysqli_query($con, $user_q);
        if($user_res){
            header('location: #myModal1');
            die;
        }else{
            echo '<script>alert("Sign Up Error")</script>';
        }
    } else {
        echo '<script>alert("Passwords do not match")</script>';
    }
}
?>

<div class="ms_register_popup">
        <div id="myModal" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog register_dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa_icon form_close"></i>
                    </button>
                    <div class="modal-body">
                        <div class="ms_register_img">
                            <img src="images/register_img.png" alt="" class="img-fluid" />
                        </div>
                        <div class="ms_register_form">
                            <h2>Register / Sign Up</h2>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Your Name" name="username" class="form-control">
                                <span class="form_icon">
                                    <i class="fa_icon form-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Your Email" name="email" class="form-control">
                                <span class="form_icon">
                                    <i class="fa_icon form-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Enter Password" name="pswd" class="form-control">
                                <span class="form_icon">
                                    <i class="fa_icon form-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Confirm Password" name="conf-pswd" class="form-control">
                                <span class="form_icon">
                                    <i class=" fa_icon form-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <a href="#" class="ms_btn"><input type="button" value="Register now" name="register" style="background-color: transparent;border:none;color: black;" class="reg_btn"> </a>
                            <p>Already Have An Account? <a href="#myModal1" data-toggle="modal" class="ms_modal hideCurrentModel">login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----Login Popup Start---->
        <div id="myModal1" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog login_dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa_icon form_close"></i>
                    </button>
                    <div class="modal-body">
                        <div class="ms_register_img">
                            <img src="images/register_img.png" alt="" class="img-fluid" />
                        </div>
                        <div class="ms_register_form">
                            <h2>login / Sign in</h2>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Your Email" class="form-control">
                                <span class="form_icon">
                                    <i class="fa_icon form-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Enter Password" class="form-control">
                                <span class="form_icon">
                                    <i class="fa_icon form-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="remember_checkbox">
                                <label>Keep me signed in
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <a href="profile.php" class="ms_btn" target="_blank">login now</a>
                            <div class="popup_forgot">
                                <a href="#">Forgot Password ?</a>
                            </div>
                            <p>Don't Have An Account? <a href="#myModal" data-toggle="modal" class="ms_modal1 hideCurrentModel">register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>