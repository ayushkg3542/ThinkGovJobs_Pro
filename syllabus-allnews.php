<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 if (isset($_GET['syllabus_id'])) {
    $blogId = $_GET['syllabus_id']; // Retrieve the blog ID from the query parameter

    // Fetch the full blog content based on the blog ID from the database
    $sql = "SELECT * FROM syllabus_data WHERE syllabus_id = $blogId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $blogTitle = $row['syllabus_title'];
        $blogDate = $row['date'];
        $blogContent = $row['syllabus_discription'];
    } else {
        // Handle the case when the blog is not found
        $blogTitle = "Blog Not Found";
        $blogDate = "";
        $blogContent = "The requested blog could not be found.";
    }
} else {
    // Handle the case when the blog ID is not provided
    $blogTitle = "Invalid Blog ID";
    $blogDate = "";
    $blogContent = "Please provide a valid blog ID.";
}

$name = $message = $error = $thankYouMessage = '';
$inserted = false;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize it
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    // Validate the data (you can add more thorough validation)
    if (empty($name) || empty($message)) {
        $error = "Please fill in all fields.";
    } else {
        // Insert the data into the database (replace with your table name)
        $sql = "INSERT INTO comment_section (name, message) VALUES (?, ?)";
        // Prepare and execute the SQL statement to insert data
        // ...

        if ($inserted) {
            $thankYouMessage = "Thank you for your comment. We will reach you soon.";
        } else {
            $error = "Error: Insertion failed.";
        }
    }
}

 ?>
<style>
.card {
    border: none;
    background-color: #f3f3f3;
}

.card-title a {
    text-decoration: none;
    color: #000;
}

h1 {
    font-family: Lato;
}

.card-inner li {
    text-decoration: none;
    list-style: none;
}

.card-inner li a {
    text-decoration: none;
}
</style>

<div class="container">
    <div class="row my-3">
        <div class="col-sm-8 col-md-8 col-12">
            <div class="card">
                <div class="card-title p-3">
                    <h1>Admit Card</h1>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-title p-3">
                    <h2><?php echo $blogTitle; ?></h2>
                    <span><?php echo $blogDate;?></span>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p><?php echo $blogContent; ?></p>
                    </div>
                </div>
            </div>
            <div class="card my-3" id="comment-section">
                <div class="card-title p-3">
                    <h2>Leave a comment</h2>
                </div>
                <div class="card-body">
                    <?php if ($inserted) { ?>
                    <!-- Display a thank you message if the comment is successfully submitted -->
                    <div class="alert alert-success"><?php echo $thankYouMessage; ?></div>
                    <?php } else { ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Comment</label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="10"
                                required></textarea>
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-12">
            <div class="card mb-3">
                <div class="form-inline p-3">
                    <div class="input-group input-group-sm w-100">
                        <input type="text" name="table_search" id="search_key" class="form-control float-right"
                            placeholder="Search">
                        <div class="input-group-append bg-secondary">
                            <button type="submit" class="btn btn-default">
                                <i class="bi bi-search fa-light"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-title p-3">
                    <h4>Recent Post</h4>
                </div>
                <?php 
                    $select2 = "SELECT * FROM syllabus_data ORDER BY date DESC";
                    $query2 = mysqli_query($conn, $select2);
                    $postCounter = 0;
                   
                    ?>
                <div class="card-body p-3">
                    <ul>
                        <?php while(($title = mysqli_fetch_assoc($query2)) && $postCounter < 5){?>
                        <div style="display: flex; gap: 10px;">
                            <a href="./syllabus-allnews.php?syllabus_id=<?php echo $title['syllabus_id']; ?>"
                                style="display: block; text-decoration: none;" class="card-link-wp">
                                <?= $title['syllabus_title'] ?>
                            </a>
                        </div>
                        <hr>
                        <?php
                    $postCounter++; }?>
                    </ul>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-title p-3">
                    <h4>Categories</h4>
                </div>
                <?php 
                        $select3 = "SELECT * FROM blog_category";
                        $query3 = mysqli_query($conn, $select3);
                        ?>
                <div class="card-body">
                    <ul>
                        <?php while($category = mysqli_fetch_assoc($query3)){?>
                        <div style="display: flex; gap: 10px;">
                            <a href="<?= $category['page_url']?>" class="card-link-wp"
                                style="display: block; text-decoration: none;" class="card-link-wp">
                                <?= $category['category_name'] ?>
                            </a>
                        </div>
                        <hr>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-title p-3">
                    <h4>Legals</h4>
                </div>
                <div class="card-body p-3">
                    <ul class="card-inner">
                        <li><a href="contact_us.php" class="card-link-wp">Contact Us</a></li>
                        <hr>
                        <li><a href="aboutus.php" class="card-link-wp">About Us</a></li>
                        <hr>
                        <li><a href="disclaimer.php" class="card-link-wp">Disclaimer</a></li>
                        <hr>
                        <li><a href="privacypolicy.php" class="card-link-wp">Privacy Policies</a></li>
                        <hr>
                        <li><a href="termscondition.php" class="card-link-wp">Terms and Condition</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>