<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('shared/config.php');
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voting System</title>
  <meta charset="utf-8"><link rel="shortcut icon" href="/voting/favicon.ico" type="image/x-icon">
<link rel="icon" href="/voting/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="/voting/shared/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
</head>

<body>
  <div class="header bg-success text-center ">
    <h1 class="title pt-2 pb-2 ">Online Voting System <i class='fa fa-vote-yea'></i></h1>
    <?php if (isset($_SESSION['username'])) : ?>
      <a class="logoutbtn " href="/voting/index.php?logout='1'"><i class="fa fa-power-off"></i><br> Logout</a>
    <?php endif; ?>
  </div>
  <style>
    .logoutbtn {
      color: white;
      font-size: 15px;
    }

    .logoutbtn {
      position: absolute;
      right: 40px;
      top: 15px;
    }
    .header .title i {        
    font-size: 40px;
    color: #fff;
      }

    @media(max-width:720px) {
      .logoutbtn {
        right: 16px;
        top: 5px;
      }
      .bg-success {
    height: 60px;
    margin-bottom: 8px;}

      .header .title {        
    font-size: 19px;
    padding-left: 8px;
    padding-top: 5px;
    text-align: left;
      }
      .header .title i {        
    font-size: 20px;
    color: #fff;
      }
    }
  </style>
  <!-- <h1 class="text-center" style="background: lightgreen;"><i>Online Voting System</i></h1> -->
  <!-- A grey horizontal navbar that becomes vertical on small screens -->

  <!--<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
  <a class="navbar-brand" href="/">Online Voting System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php if (isset($_SESSION['username'])) : ?>
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
    </li>
    <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="/register.php">Register</a>
      </li>
      <?php if (empty($_SESSION['username'])) : ?>
        <li class="nav-item">
            <a class="nav-link" href="/login.php">Login</a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="/fdbkform.php">Feedback Form</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
  <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
  </ul>
  <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->

  </div>
  </nav>