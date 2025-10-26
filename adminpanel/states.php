<?php 
include('../connection.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');

if (isset($_POST['add_state'])) {
    // Retrieve the form data
    $state_name = mysqli_real_escape_string($conn, $_POST['state_name']);
    
    // Check if the category already exists in the database
    $sql = "SELECT * FROM state_name WHERE state_name = '{$state_name}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    
    if ($row) {
        echo "<script>alert('This state already exists.')</script>";
    } else {
        // Category doesn't exist, so add it to the database
        $insert_sql = "INSERT INTO state_name (state_name) VALUES ('{$state_name}')";
        $insert_query = mysqli_query($conn, $insert_sql);
        
        if ($insert_query) {
            echo "<script type='text/javascript'>alert('State added successfully.')</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: Unable to add the state.')</script>";
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
                    <h1>States</h1>
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
                                Add State
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="state_name" placeholder="State Name"
                                        class="form-control" required>
                                </div>
                                <div class="d-flex mt-3" style="gap: 10px;">
                                    <input type="submit" name="add_state" value="Submit"
                                        class="btn btn-outline-warning">
                                    <a href="add_state_blog.php" class="btn btn-outline-info">Back</a>
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