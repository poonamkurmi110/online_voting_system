<?php include('shared/header.php'); ?>


<?php 

$sql_party = mysqli_query($conn, "SELECT * FROM `candidates`");

?>

?>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  /* Float four columns side by side */
  /* .column {
      float: left;
      width: 25%;
      padding: 0 10px;
    } */

  /* Remove extra left and right margins, due to padding */
  .row {
    margin: 0 -5px;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Responsive columns */
  @media screen and (max-width: 600px) {
    .column {
      width: 100%;
      display: block;
      margin-bottom: 20px;
    }
  }
  /* Style the counter cards */
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    /* text-align: center; */
    background-color: #f1f1f1;
  }

  .polaroid img {
    border-radius: 50%;
    height: 90px;
    width: 90px;
  }
  .partyDetails .logo{
    text-align: center;
  }
  .partyDetails .logo img{
    max-height: 100px;
  }
</style>
</head>

<body>



  <div class="row">

    <div class="col-md-6 col-lg-6 col-sm-12">
      <div class="polaroid">
        <img src="img/adminlogo.jpg" alt="5 Terre" >
        <div class="container" >
          <p> Name:</p>
          <p> Contact No.</p>
          <p> Date of birth</p>
          <p> Gender</p>
          <p>City </p>
          <p> State</p>
          <p> Status</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12">

      <div class="row">
        <?php
        while ($party_list = mysqli_fetch_array($sql_party)):?>
          <!-- echo ($party_list['name']); -->
          <div class="col-md-12 col-md-12 col-sm-12 mb-3">
          <div class="card partyDetails p-0">
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-12 logo">
                <img src="/img/<?php  echo ($party_list['logo']); ?>" />
              </div>
              <div class="col-md-8 col-lg-8 col-sm-12">
                <h3 class="name"><?php  echo ($party_list['name']); ?></h3>
                <p class="desc p-0 m-0"><?php  echo ($party_list['desc']);?> </p>
                <button type="button" class="btn btn-success float-right voteNow">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        

        <!-- <div class="col-md-12 col-md-12 col-sm-12 mb-3">
          <div class="card">
            <div class="header">
              <img src="/img\aap-logo-apn-news.png" />
              <h3>AAP Party</h3>
            </div>
            <button type="button" class="btn btn-success">Vote Me</button>
          </div>
        </div>

        <div class="col-md-4 col-md-6 col-sm-12 mb-3">
          <div class="card">
            <div class="header">
              <img src="\img\indian-national-congress-png-21557136595djawzjxtc0.png" />
              <h3>Congress Party</h3>
            </div>
            <button type="button" class="btn btn-success">Vote Me</button>
          </div>
        </div>

        <div class="col-md-4 col-md-6 col-sm-12 mb-3">
          <div class="card">
            <div class="header">
              <img src="\img\NOTA_PTI.jpg" />
              <h3>Nota</h3>
            </div>
            <button type="button" class="btn btn-success">Vote Me</button>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <?php include('shared/footer.php'); ?>