<?php 
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
include('../connection.php');

// Check if the delete button is clicked
if (isset($_POST['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    // Perform the delete operation in the database
    $delete_query = "DELETE FROM haedline_data WHERE id = '$delete_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        // Successful deletion
        echo "<script type='text/javascript'>alert('Headline deleted successfully.')</script>";
    } else {
        // Failed deletion
        echo "<script type='text/javascript'>alert('Error: Unable to delete the headline.')</script>";
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Headline Detail</h1>
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
                            <div class="card-tools d-flex">
                                <a href="updatehomepage.php" class="btn btn-outline-secondary"><i class="bi bi-plus"></i>
                                    Add More</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="myTableData">
                                <thead>
                                    <th>Sr. No.</th>
                                    <th>Headline</th>
                                    <th>Headline URL</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <!-- <th>DELETE</th> -->
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM headline_data";
                                    $query_result = mysqli_query($conn, $query);
                                    $rows = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
                                    
                                    // Check if there are rows returned from the database
                                    if ($rows) {
                                        foreach ($rows as $row) {
                                            ?>
                                    <tr>
                                        <td><?php echo $row['headline_id']; ?></td>
                                        <td><?php echo $row['headline']; ?></td>
                                        <td><a href="<?php echo htmlspecialchars($row['headline_url'], ENT_QUOTES, 'UTF-8')?>" target="_blank"><?php echo $row['headline_url']; ?></a></td>
                                        <td><a href="edit_headline.php?headline_id=<?php echo $row['headline_id']; ?>"
                                                class="btn btn-outline-success editBtn"><i class="bi bi-pencil-square"></i></button></td>
                                        <td>
                                            <form action="" method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                <input type="hidden" name="delete_id"
                                                    value="<?php echo $row['headline_id']; ?>">
                                                <button type="submit" class="btn btn-outline-danger deletebtn">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        // No categories found in the database
                                        ?>
                                    <tr>
                                        <td colspan="3">No categories found.</td>
                                    </tr>
                                    <?php
                                    }     
                        ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('include/footer.php')?>