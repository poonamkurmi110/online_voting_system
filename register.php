<?php
include('shared/header.php');
if (isset($_SESSION['username'])) {
    header('location:/voting/index.php');
}

?>

<div class="container">
    <div class="header center">
        <h2 class="text-center senction-title"> <i>Registration Form</i></h2>
    </div>

    <div>
        <form method="POST" action="register.php">
            <?php include("errors.php"); ?>
            <div class="row">
                <div class="col-lg-6 col-md-6  col-sm-12">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <label>Conact No.</label>
                        <input type="text" class="form-control" name="contact_no" minlength="10" maxlength="10" placeholder="contact no.">
                    </div>
                    <div class="form-group">
                        <label for="gender"> Gender</label>

                        <select id="gender" name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password1">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6  col-sm-12">

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" required placeholder="DD/MM/YYYY" name="dob">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="city" class="form-control" required name="city">
                    </div>
                    <div class="form-group">
                        <label for="state'"> State</label>
                        <select id="state" class="form-control" name="state">
                            <option value="Madhya Pradesh">Madhya pradesh</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Uttar pradesh">Uttar pradesh</option>
                            <option value="Gujrat">Gujrat</option>
                            <option value="Rajsthan">Rajsthan</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Maharashtra">Maharashtra</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="input-group">
                <button type="submit" name="register" value="register" class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
</div>

</div>



<?php include('shared/footer.php'); ?>