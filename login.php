<?php include('shared/header.php'); ?>
<?php
if (isset($_SESSION['username'])) {
  header('location:/voting/index.php');
}

$sql_party = mysqli_query($conn, "SELECT * FROM `candidates`");

?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-12 col-lg-8">
      <h3 class="text-center senction-title"> Groups</h3>
      <div class=" section-bg">
        <div class="row">
          <?php
          while ($party_list = mysqli_fetch_array($sql_party)) : ?>
            <!-- echo ($party_list['name']); -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
              <div class="card partyCard text-left bg-white  border border-success">

                <img class="card-img-top partyLogo" src="img/<?php echo ($party_list['logo']); ?>" alt="">
                <div class="card-body">
                  <h4 class="card-title"><?php echo ($party_list['name']); ?></h4>
                  <p class="card-text"><?php echo ($party_list['desc']); ?></p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>

        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-12 col-lg-4">
      <h3 class="text-center senction-title"> Login</h3>
      <div class="card section-bg border border-success" style="height: 423px; ">
        <form method="POST" class="p-3" action="login.php">
          <div class="avater">
            <img class="text-center" src="img/user-icon.png" alt="User Icon">

          </div>
          <div class="form-group">
            <label for="username">Username/Email id </label>
            <input type="text" class="form-control" required placeholder="Username/email " name="username">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" required placeholder="Password" name="password">
          </div>

          <div class="input-group">
            <?php include('errors.php'); ?>

            <button type="submit" name="login" class="btn btn-success">Login</button>
          </div>
          <p>
            Not Registered?
            <a href="register.php"> Register Here </a>
          </p>
        </form>
      </div>
    </div>
  </div>


  <?php include('shared/footer.php'); ?>