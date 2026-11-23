<?php
include "includes/header.php";
include "../middleware/adminmiddleware.php";

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category Page</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $categories = getAll("categories");
                            if ($categories && mysqli_num_rows($categories) > 0) {
                                foreach ($categories as $item) {
                                    ?>
                                    <tr>
                                        <td><?= (int)$item['id']; ?></td>
                                        <td><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <img src="../uploads/<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                                 width="50" height="50"
                                                 alt="<?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </td>
                                        <td><?= $item['status'] == '1' ? 'Hidden' : 'Visible'; ?></td>
                                        <td>
                                            <a href="edit-category.php?id=<?= (int)$item['id']; ?>" class="btn btn-primary">Edit</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_category_btn" value="<?= (int)$item['id']; ?>"
                                                        class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>