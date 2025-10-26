<?php 
ob_start();
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
include('../connection.php');

$id = $_GET['id'];

$query = "SELECT * FROM state_related_blog WHERE id = '$id'";
$query_result = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($query_result);

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $state_title = $_POST["admitcard_title"];
    $state_discription = $_POST["admitcard_discription"];
    $state_name = $_POST['state_name'];
    $author_name = $_POST['author_name'];

    // Validate and sanitize the data (you should perform more thorough validation)
    $state_title = trim($state_title);
    $state_discription = trim($state_discription);
    $state_name = trim($state_name);
    $author_name = trim($author_name);

    $update = "UPDATE state_related_blog SET state_title = '$state_title', state_discription = '$state_discription',state_name = '$state_name', author_name = '$author_name' WHERE id = '$id'";
    $query = mysqli_query($conn, $update);

    if($query){
        echo '<script>alert("Blog Updated Successfully")</script>';
        header('location: state_related.php');
    }else{
        echo '<script>alert("Failed to Update Blog")</script>';
        header('location: state_related.php');
    }


}

$sql = "SELECT * FROM state_name";
$query = mysqli_query($conn, $sql);

ob_flush();
?>
<style>
header {
    padding: 10px;
    text-align: start;
}

header h1 {
    color: #555555;
}

main {
    padding: 20px;
}

.container {
    max-width: 100%;
    margin: 0 auto;
}

.btn-sidebar{
    margin: 0;
}
.post-title {
    margin-top: 0;
}

label {
    display: block;
    margin-top: 10px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 8px;
}

button {
    margin-top: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    float: right;
}

button:hover {
    background-color: #555;
}

/* Custom styles for the text editor buttons */
.editor-buttons {
    margin-bottom: 10px;
}

.editor-buttons button {
    font-weight: bold;
    background-color: #fff;
    color: #333;
    border: none;
    padding: 4px 8px;
    cursor: pointer;

}

.editor-buttons button:not(:last-child) {
    margin-right: 5px;
}

.editor-buttons button.active {
    background-color: #ccc;
}

textarea {
    resize: vertical;
}

.ck-editor__editable[role="textbox"] {
    /* editing area */
    min-height: 20vw;
}

.ck-content .image {
    /* block images */
    max-width: 80%;
    margin: 20px auto;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Category</h1>
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
                                <a href="add_category.php" class="btn btn-outline-secondary"><i class="bi bi-plus"></i>
                                    Add Category</a>
                            </div>
                        </div>
                        <header>
                            <h1><i class="bi bi-caret-right-fill"></i> Edit Other Blog</h1>
                            <!-- Add navigation links here if needed -->
                        </header>
                        <div class="card-body">
                            <h4 class="post-title">Write Your Blog Post</h4>
                            <form id="blog-form" method="post" action="" enctype="multipart/form-data">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="state_title" value="<?= $rows['state_title']?>" required>

                                <label for="author_name">Author Name:</label>
                                <input type="text" id="author_name" name="author_name" value="<?= $rows['author_name']?>" required>

                                <label for="admission">Content:</label>
                                <textarea contenteditable="true" id="editor" name="state_discription" rows="10" cols="30"
                                    required><?= $rows['state_discription']?></textarea>
                                <label for="category">State</label>
                                <select class="form-control mt-3" name="state_name" required>
                                    <option value="">Select state</option>
                                    <?php while($state_name=mysqli_fetch_assoc($query)){?>
                                    <option value="<?= $state_name['state_id']?>"><?= $state_name['state_name']?>
                                    </option>
                                    <?php }?>
                                </select>
                                <button type="submit">Edit Blog</button>
                                <a href="state_related.php" class="btn btn-danger my-3" type="button" name="cancel">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("state_discription");
</script>
<?php include('include/footer.php')?>