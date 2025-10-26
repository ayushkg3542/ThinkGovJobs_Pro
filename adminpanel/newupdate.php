<?php 
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
include('../connection.php');

$sql = "SELECT * FROM newsupdate_data ORDER BY created_at DESC";
$result = $conn->query($sql);

// // Initialize an empty array to store the fetched blog posts
$blogPosts = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Add each blog post to the array
        $blogPosts[] = $row;
    }
}

if(isset($_POST['delete_id'])){
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $delete_query = "DELETE FROM newsupdate_data WHERE newsupdate_id = '$delete_id'";
    $result = mysqli_query($conn, $delete_query);

    if($result){
        echo "<script type='text/javascript'>alert('Blog deleted successfully.')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Error: Unable to delete the product.')</script>";
    }
}

?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools d-flex justify-content-center align-items-center" style="gap: 12px;">
                                <form role="search">
                                    <div class="input-group">
                                        <input class="form-control me-2" type="search" id="searchInput"
                                            placeholder="Search" aria-label="Search">
                                    </div>
                                </form>
                                <a href="add_newupdate.php" class="btn btn-outline-secondary"><i
                                        class="bi bi-plus"></i>
                                    Add New Update Data</a>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($blogPosts as $post) { ?>
                            <div class="col-md-12 mb-4">
                                <div class="card-body">
                                    <h4 class="card-title"><strong><?php echo $post['newsupdate_title']; ?></strong></h4>
                                    <!-- <p class="card-text"><?php echo $post['newsupdate_discription']; ?></p> -->
                                    <p class="card-text">Date: <?php echo $post['date']; ?></p>
                                    <p>Author Name: <strong><?php echo $post['author_name']?></strong></p>
                                    <form action="" method="post" class="d-flex" style="gap: 10px;"
                                        id="deleteBlog_<?php echo $post['newsupdate_id']?>"
                                        onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                        <a class="btn btn-outline-warning edit-news-btn"
                                            href="edit_newupdate.php?id=<?php echo $post['newsupdate_id']; ?>"
                                            data-edit-id="<?php echo $post['newsupdate_id']; ?>">Edit Blog</a>
                                        <input type="hidden" name="delete_id"
                                            value="<?php echo $post['newsupdate_id']?>">
                                        <button class="btn btn-outline-danger delete-button"
                                            data-delete-id="<?php echo $row['newsupdate_id']; ?>"><i
                                                class="bi bi-trash3"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function() {
            const deleteForm = document.querySelector(
                `#deleteBlog_${button.getAttribute("data-delete-id")}`);
            if (deleteForm && confirm('Are you sure you want to delete this product?')) {
                deleteForm.submit();
            }
        });
    });
});
</script>
<?php include('include/footer.php')?>