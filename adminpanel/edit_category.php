<?php 
include('../connection.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');

if (isset($_POST['add_category'])) {
    // Retrieve the form data
    $cat_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    
    // Check if the category already exists in the database
    $sql = "SELECT * FROM blog_category WHERE category_name = '{$cat_name}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    
    if ($row) {
        echo "<script>alert('This category already exists.')</script>";
    } else {
        // Category doesn't exist, so add it to the database
        $insert_sql = "INSERT INTO blog_category (category_name) VALUES ('{$cat_name}')";
        $insert_query = mysqli_query($conn, $insert_sql);
        
        if ($insert_query) {
            echo "<script type='text/javascript'>alert('Category added successfully.')</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: Unable to add the category.')</script>";
        }
    }
}

?>
<style>
.form-control {
    border: 1px solid;
    padding: 10px;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Our Category</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="font-weight-bold text-danger mt-2"><i class="bi bi-plus"></i>
                                Edit Blog Category
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="category_name" placeholder="Category Name"
                                        class="form-control" required>
                                </div>
                                <div class="d-flex mt-3" style="gap: 10px;">
                                    <input type="submit" name="add_category" value="Submit"
                                        class="btn btn-outline-warning">
                                    <a href="news_category.php" class="btn btn-outline-info">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('include/footer.php');

?>