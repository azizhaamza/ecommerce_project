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
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="functions/registration.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>