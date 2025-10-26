<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 if (isset($_GET['latestjob_id'])) {
    $blogId = $_GET['latestjob_id']; // Retrieve the blog ID from the query parameter

    // Fetch the full blog content based on the blog ID from the database
    $sql = "SELECT * FROM latestjob_data WHERE latestjob_id = $blogId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $blogTitle = $row['latestjob_title'];
        $blogDate = $row['date'];
        $blogContent = $row['latestjob_discription'];
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
.card-inner li{
    text-decoration: none;
    list-style: none;
}
.card-inner li a{
    text-decoration: none;
}
</style>

<div class="container">
    <div class="row my-3">
        <div class="col-sm-8 col-md-8 col-12">
            <div class="card">
                <div class="card-title p-3">
                    <h1>Latest Job</h1>
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
                    $select2 = "SELECT * FROM latestjob_data ORDER BY date DESC";
                    $query2 = mysqli_query($conn, $select2);

                    $postCounter = 0;
                   
                    ?>
                <div class="card-body p-3">
                    <ul>
                        <?php while(($title = mysqli_fetch_assoc($query2)) && $postCounter < 5){?>
                        <div style="display: flex; gap: 10px;">
                            <a href="./latestjob-allnews.php?latestjob_id=<?php echo $title['latestjob_id']; ?>"
                                style="display: block; text-decoration: none;" class="card-link-wp">
                                <?= $title['latestjob_title'] ?>
                            </a>
                        </div>
                        <hr>
                        <?php 
                        $postCounter++;
                    }?>
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
                            <a href="<?= $category['page_url']?>"
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