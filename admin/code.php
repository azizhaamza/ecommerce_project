 <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    include('../config/dbcon.php');
    include "../functions/redirect.php";

    // Add category in
 
    if(isset($_POST['add_category_btn'])){
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description'];
        $meta_keyword = $_POST['meta_keyword'];
        $status = isset($_POST['status']) ? '1' : '0';
        $popular = isset($_POST['popular']) ? '1' : '0';

        $image = $_FILES['image']['name'];
        $path ="../uploads";


        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_ext;

        $query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular, image) VALUES ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keyword', '$status', '$popular', '$filename')";
        $query_run = mysqli_query($conn, $query);
        if(!$conn){
            echo "Error: " . $conn->error;
        }else
        {

            if($query_run){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                redirect("addcategory.php", "Category Added Successfully");
                exit(0);
            }else{
                echo "Error: " . mysqli_error($conn);
                redirect("addcategory.php", "Category Not Added");
            }    }
    }
    ?>