<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 $state = $_GET['state_name'];

 $sql = "SELECT * FROM latestjob_data LEFT JOIN state_name ON latestjob_data.state_name = state_name.state_name WHERE state_name.state_name = ? ORDER BY date DESC";
 $stmt = $conn->prepare($sql);
$stmt->bind_param("s", $state);
$stmt->execute();
$result = $stmt->get_result();

 $blogPosts = array();

 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {

        $row['latestjob_discription'] = substr($row['latestjob_discription'],0 ,500) . '...';
        // Add each blog post to the array
        $blogPosts[] = $row;
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
    <section class="content-header">
        <div class="row my-2">
            <div class="col-sm-6">
                <a href="index.php" class="btn btn-warning"><i class="bi bi-chevron-left"></i>
                    Back</a>
            </div>
        </div>
    </section>
    <div class="row my-3">
        <div class="col-sm-8 col-md-8 col-12">
            <div class="card">
                <div class="card-title p-3">
                    <h1><span style="color: #ffa200; font-weight: 600;"><i class="bi bi-geo-alt-fill"></i>
                            <?php echo $state; ?></span> - Current JOB</h1>
                </div>
            </div>
            <?php if(empty($blogPosts)):?>
                <h5>No result found</h5>
                <?php else: ?>
            <?php foreach ($blogPosts as $post): ?>
            <div class="card my-3">
                <div class="card-title p-3">
                    <a href="statewise_post.php?state_name=<?php echo $post['state_name'];?>">
                        <h4><?php echo $post['latestjob_title']; ?></h4>
                    </a>
                    <span><?php echo date('d F Y', strtotime($post['date'])); ?></span>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-4 col-md-4 col-12">
            <div class="card mb-3">
                <?php 
                if (isset($_GET['table_search'])) {
                    $table_search = htmlspecialchars($_GET['table_search']); // Sanitize and store the search query
                } else {
                    $table_search = ""; // Initialize to an empty string if not provided in the URL
                }
                ?>
                <form action="result_search.php" method="GET">
                    <div class="form-inline p-3">
                        <div class="input-group input-group-sm w-100">
                            <input type="text" name="table_search" id="search_key" class="form-control float-right"
                                placeholder="Search" value="<?= $table_search?>" autocomplete="off">
                            <div class="input-group-append bg-secondary">
                                <button type="submit" class="btn btn-default">
                                    <i class="bi bi-search fa-light"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
                            <a href="<?= $category['page_url']?>" style="display: block; text-decoration: none;" class="card-link-wp">
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
<?php include('includes/footer.php');

?>