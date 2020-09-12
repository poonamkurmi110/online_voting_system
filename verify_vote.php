<?php
// echo ('Success');
include('shared/config.php');
$username = ($_POST['voter_id']);
$candidate_ID = ($_POST['candidate_ID']);

$sql = "UPDATE `voters_registration` SET `status`='1' WHERE username = '$username' ";
mysqli_query($conn, $sql);

if (!empty($candidate_ID)) {
    $sql_party = mysqli_query($conn, "SELECT * FROM `candidates`  WHERE `id` = '$candidate_ID'");
    $canRes = mysqli_fetch_array($sql_party);
    $noOfVotes = $canRes['no_of_votes'];
    $noOfVotes++;
    $sql_candidates = "UPDATE `candidates` SET `no_of_votes`='$noOfVotes' WHERE `id` = '$candidate_ID' ";
    mysqli_query($conn, $sql_candidates);
    // header('location:/voting/index.php'); //redirect home pg
    echo ('Success');
} else {
    echo ('Error');
}
