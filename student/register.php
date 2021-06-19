<?php

    require_once '../dbconn.php';

    session_start();
    if (isset($_SESSION['student_login'])) {
     header('location: index.php');
    }

    if (isset($_POST['student_register'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $roll = $_POST['roll'];
        $reg = $_POST['reg'];
        $phone = $_POST['phone'];

        $input_errors = array();

        if (empty($fname)) {
            $input_errors['fname'] = "First name field is required";
        }

        if (empty($lname)) {
            $input_errors['lname'] = "Last name field is required";
        }

        if (empty($email)) {
            $input_errors['email'] = "Email name field is required";
        }

        if (empty($password)) {
            $input_errors['password'] = "Password name field is required";
        }

        if (empty($username)) {
            $input_errors['username'] = "Username name field is required";
        }


        if (empty($roll)) {
            $input_errors['roll'] = "Roll name field is required";
        }

        if (empty($reg)) {
            $input_errors['reg'] = "Reg No. name field is required";
        }

        if (empty($phone)) {
            $input_errors['phone'] = "Phone name field is required";
        }


        if (count($input_errors) == 0) {

            $query = "SELECT * FROM students WHERE email = '$email'";
            $email_check = mysqli_query($conn, $query);
            $email_check_row = mysqli_num_rows($email_check);

            if ($email_check_row == 0) {
                $query = "SELECT * FROM students WHERE username = '$username'";
                $username_check = mysqli_query($conn, $query);
                $username_check_row = mysqli_num_rows($username_check);

                if ($username_check_row == 0) {

                    //Data insert
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    $query = "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`,
                             `phone`) VALUES ('$fname', '$fname', '$roll', '$reg', '$email', '$username', '$password_hash', '$phone')";
                    $result =  mysqli_query($conn, $query);

                    if ($result) {
                        $success = "Registration Successfully";
                    }
                    else {
                        $error = "Something wrong";
                    }
                }
                else {
                    $username_exists = "this username already exiss";
                }
            }
            else {
                $email_exists = "this email already exiss";
            }


        }
    }

?>



<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>

            <?php
                if (isset($success)) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?= $success ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }
            ?>
            <?php
            if (isset($error)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
            <?php
            if (isset($email_exists)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $email_exists ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
            <?php
            if (isset($username_exists)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $username_exists ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>


        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="First Name">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['fname'])) {
                                echo '<span">'.$input_errors['fname'].'<span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['lname'])) {
                                echo '<span">'.$input_errors['lname'].'<span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['email'])) {
                                echo '<span">'.$input_errors['email'].'<span>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                            if (isset($input_errors['password'])) {
                                echo '<span">'.$input_errors['password'].'<span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($input_errors['username'])) {
                                echo '<span">'.$input_errors['username'].'<span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" placeholder="Roll" ">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['roll'])) {
                                echo '<span">'.$input_errors['roll'].'<span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" placeholder="Reg. No"">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['reg'])) {
                                echo '<span">'.$input_errors['reg'].'<span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" placeholder="01*********" ">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($input_errors['fname'])) {
                                echo '<span">'.$input_errors['fname'].'<span>';
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>
