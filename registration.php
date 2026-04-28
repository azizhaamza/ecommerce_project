<?php 
session_start();

if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are already logged in";
    header("Location: index.php");
    exit();
}
include "includes/header.php"; 
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION['message'])) {
                ?> <div class='alert alert-warning' role='alert'><?= $_SESSION['message']; ?></div>"
                    <?php unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="functions/registration.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Your Name" name="first_name">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" aria-describedby="lastHelp" placeholder="Enter Your Last Name" name="last_name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter Your Phone Number" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Your Password" name="confirm_password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="register_btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>