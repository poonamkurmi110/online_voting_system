<?php

$username = '';
$email = '';
$errors = array();
$db = mysqli_connect('localhost', 'root','', 'registration');


if (isset($_POST['register'])) {
    $email = ($_POST['email']);
    $contact = ($_POST['contact_no']);
    $city = ($_POST['city']);
    $state = ($_POST['state']);
    $gender = ($_POST['gender']);
    $dob = ($_POST['dob']);
    $password = ($_POST['password']);
    $password1 = ($_POST['password1']);
    $name = ($_POST['username']);
    
    $username = strtolower(str_replace(' ','',$_POST['username']).rand(100,1000));
    
    

    // fields filling
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $password1) {
        array_push($errors, "The two passwords do not match");
    }
    //if no errors found then save in db

    if (count($errors) == 0) {
        $password = md5("password1"); //pass encryption
        $sql = "INSERT INTO voters_registration(`id`,`name`, `contact_no`, `email_id`, `city`, `state`, `gender`, `dob`, `username`, `password`)
          VALUES(null,'$name', '$contact', '$email', '$city', '$state', '$gender', '$dob', '$username', '$password1')";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now loged in";
        header('location:/voting/index.php'); //redirect home pg
    }
}
//log user in from login page
if (isset($_POST['login'])) {
    // echo('Login<br>');
    
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    // fields filling
    if (empty($username)) {
        array_push($errors, "Username is required");
    }   
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        // $password = md5($password); //encrypt before comparing 
        $query = "SELECT * FROM voters_registration WHERE (`username`='$username' OR `email_id`='$username') AND `password`='$password'";
    
    
        $result = mysqli_query($db, $query);
        $canRes = mysqli_fetch_array($result);
        if (mysqli_num_rows($result)) {
           //log user in
            $_SESSION['username'] = $canRes['username'];
            $_SESSION['success'] = "You are now loged in";
            header('location:/voting/index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
//logout
if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    header('location:/voting/login.php');
}
