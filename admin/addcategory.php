<?php include "includes/header.php";
 ?>


<div class="container-fluid py-2">
    <?php
                if (isset($_SESSION['message'])) {
                ?> <div class='alert alert-warning' role='alert'><?= $_SESSION['message']; ?></div>"
                    <?php unset($_SESSION['message']);
                }
                ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add Category</h5>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="description"  rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Image</label>
                            <input type="file" name="image"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">meta title</label>
                            <input type="text" name="meta_title"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">meta description</label>
                            <textarea name="meta_description"  rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">meta keyword</label>
                            <textarea name="meta_keyword"  rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="status">
                                <label class="form-check-label" for="status">
                                    Status
                                </label>
                            </div>
                        </div>
                           <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="popular" id="popular">
                                <label class="form-check-label" for="popular">
                                    Popular
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" name="add_category_btn" class="btn btn-primary">Add Category</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>

<?php include "includes/footer.php"; ?>