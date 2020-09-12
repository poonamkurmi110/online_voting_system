<?php include('shared/header.php'); 

if (empty($_SESSION['username'])) {
    header('location:/voting/login.php');
}
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '-1';
// echo $_SESSION['username'];

$sql_party = mysqli_query($conn, "SELECT * FROM `candidates`");
$votersDetails = mysqli_query($conn, "SELECT * FROM `voters_registration` WHERE `username`='$username'");
$canRes = mysqli_fetch_array($votersDetails);
?>

<style>
    .polaroid img {
        border-radius: 50%;
        height: 90px;
        width: 90px;
    }

    .partyDetails .logo {
        text-align: center;
    }

    .partyDetails .logo img {
        max-height: 100px;
    }

    .statusVoted {
        color: red !important;
        font-weight: 700;

    }

    .statusNotVoted {
        color: red;
    }

    .infoItem {
        margin-top: 20px;
    }

    .lavelInfo {
        font-weight: 700;
    }
</style>
<div class="container">


    <div class="row">

        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card border border-success">
                <div class="polaroid">
                    <div class="avater">
                        <img src="img/adminlogo.jpg" alt="5 Terre">
                    </div>
                    <div class="container" style="height: 394px;">

                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0"><span class="lavelInfo"> Name : </span><?php echo ($canRes['name']); ?></p>
                        </div>
                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0"><span class="lavelInfo"> Username : </span> <span style="color:red; text-weight:700;"><?php echo ($canRes['username']); ?></span></p>
                        </div>

                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0"> <span class="lavelInfo">Contact No : </span><?php echo ($canRes['contact_no']); ?></p>
                        </div>

                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0"> <span class="lavelInfo">Date of Birth : </span><?php echo ($canRes['dob']); ?></p>
                        </div>
                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0"> <span class="lavelInfo">Gender : </span><?php echo ($canRes['gender']); ?></p>
                        </div>
                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0"> <span class="lavelInfo">City : </span><?php echo ($canRes['city']); ?></p>
                        </div>
                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0"> <span class="lavelInfo">State : </span><?php echo ($canRes['state']); ?></p>
                        </div>
                        <div class="pb-0 infoItem">
                            <p class="p-0 m-0" id="status_Title"><span class="lavelInfo">Status : </span>
                                <?php if (($canRes['status'])) : ?>
                                    <span class="statusVoted">Voted</span>
                                <?php else : ?>
                                    <span class="statusNotVoted">Not Voted</span>
                                <?php endif; ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div class="card">
                <div class="row">
                    <?php
                    while ($party_list = mysqli_fetch_array($sql_party)) : ?>
                        <!-- echo ($party_list['name']); -->
                        <div class="col-md-12 col-md-12 col-sm-12 mb-3">
                            <div class="card partyDetails p-0 border border-success">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-sm-12 logo">
                                        <img src="img/<?php echo ($party_list['logo']); ?>" />
                                    </div>
                                    <div class="col-md-8 col-lg-8 col-sm-12">
                                        <h3 class="name"><?php echo ($party_list['name']); ?></h3>
                                        <p class="desc p-0 m-0"><?php echo ($party_list['desc']); ?> </p>
                                        <button type="button" class="btn btn-success float-right voteNow" <?php echo (($canRes['status']) ? 'disabled' : ''); ?> id="vote_BTN" onclick="voteFor('<?php echo ($canRes['username']); ?>','<?php echo ($party_list['id']); ?>')">Vote me</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('shared/footer.php'); ?>

<script>
    function voteFor(voter_id, candidate_ID) {
        $(".voteNow").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "/voting/verify_vote.php",
            data: {
                "voter_id": voter_id,
                "candidate_ID": candidate_ID
            },
            success: function(res) {
                // alert('msg' + res);
                document.getElementById("status_Title").innerHTML = ('<span class="lavelInfo">Status : </span> <span class="statusVoted">Voted</span>');
                console.log("res");
                console.log(res);
            }
        });
    }
</script>