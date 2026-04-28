<?php
session_start();
include "includes/header.php"; 
?>
    <?php
                if (isset($_SESSION['message'])) {
                ?> <div class='alert alert-warning' role='alert'><?= $_SESSION['message']; ?></div>"
                    <?php unset($_SESSION['message']);
                }
                ?>
    <h1>Hello, world!</h1>
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
<?php include "includes/footer.php"; ?>
