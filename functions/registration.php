<?php
include "../config/dbcon.php";

session_start();



if(isset($_POST['register_btn'])){
    //echo "Register button is clicked";
    $name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);
    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['message'] = "Email already exists";
        header("Location: ../registration.php");
        exit(0);
    }else{

        if($password == $confirm_password){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (name, last_name, phone, email, password) VALUES ('$name', '$last_name', '$phone', '$email', '$password')";
            $query_run = mysqli_query($conn, $query);

            if($query_run){
                $_SESSION['message'] = "Registration Successfully";
                header("Location: ../login.php");
            }else{
                $_SESSION['message'] = "Something went wrong";
                header("Location: ../registration.php");
            }

        }else{
            $_SESSION['message'] = "Password and Confirm Password does not match";
            header("Location: ../registration.php");
        }
    }

}elseif(isset($_POST['login_btn'])){
    //echo "Login button is clicked";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email'";
    $login_query_run = mysqli_query($conn, $login_query);
    if(mysqli_num_rows($login_query_run) > 0){
        $row = mysqli_fetch_array($login_query_run);
        if(password_verify($password, $row['password'])){
            $_SESSION['auth'] = true;

            $_SESSION['auth_user'] = [
                'user_id' => $row['id'],
                'name' => $row['name'],
                'last_name' => $row['last_name'],
                'email' => $row['email']
            ];
            $_SESSION['message'] = "Login Successfully";
            header("Location: ../index.php");
        }else{
            header("Location: ../login.php");
            $_SESSION['message'] = "Invalid Password";
        }
    }else{
        header("Location: ../login.php");
        $_SESSION['message'] = "Invalid Email Address";
    }
}








?>