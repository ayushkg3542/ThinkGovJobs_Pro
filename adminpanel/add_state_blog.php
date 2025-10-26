<?php 
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
include('../connection.php');

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $state_title = $_POST["state_title"];
    $state_discription = $_POST["state_discription"];
    $state_name = $_POST['state_name'];
    $author_name = $_POST['author_name'];

    // Validate and sanitize the data (you should perform more thorough validation)
    $state_title = trim($state_title);
    $state_discription = trim($state_discription);
    $state_name = trim($state_name);
    $author_name = trim($author_name);

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO state_related_blog   (state_title, state_discription, state_name, author_name) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $state_title, $state_discription, $state_name, $author_name);
    
    // echo "SQL Query: " . $sql ."<br>";
    if ($stmt->execute()) {
        echo "<script>alert('Admission blog post submitted successfully!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM state_name";
$query = mysqli_query($conn, $sql);
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

.btn-sidebar {
    margin-top: 0px;
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
                    <a href="state_related.php" class="btn btn-secondary btn-sm"><i class="bi bi-chevron-left"></i> Back</a>
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
                                <a href="states.php" class="btn btn-outline-secondary"><i class="bi bi-plus"></i>
                                    Add State</a>
                            </div>
                        </div>
                        <header>
                            <h1><i class="bi bi-caret-right-fill"></i> Add Other Blog</h1>
                            <!-- Add navigation links here if needed -->
                        </header>
                        <div class="card-body">
                            <h4 class="post-title">Write Your Blog Post</h4>
                            <form id="blog-form" method="post" action="" enctype="multipart/form-data">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="state_title" required>

                                <label for="author">Author:</label>
                                <input type="text" id="author" name="author_name" required>

                                <label for="admission">Content:</label>
                                <textarea contenteditable="true" id="editor" name="state_discription" rows="10"
                                    cols="30" required></textarea>

                                <label for="state">State</label>
                                <select class="form-control mt-3" name="state_name" required>
                                    <option value="">Select State</option>
                                    <?php while($state_name=mysqli_fetch_assoc($query)){?>
                                    <option value="<?= $state_name['state_id']?>"><?= $state_name['state_name']?>
                                    </option>
                                    <?php }?>
                                </select>
                                <button type="submit">Post Blog</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="../ckfinder/ckfinder.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace("state_discription");
</script>
<script>
CKFinder.setupCKEditor(CKEDITOR.instances.blogs, {
    basePath: '../ckfinder/ckfinder.js', // Adjust the path to CKFinder accordingly
    rememberLastFolder: true // Remember the last used folder in CKFinder
});
</script>
<?php include('include/footer.php')?>