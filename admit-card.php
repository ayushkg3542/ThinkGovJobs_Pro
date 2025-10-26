<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 if(!isset($_GET['page_no'])){
    $page=1;
 }else{
    $page=$_GET['page_no'];
 }

 $limit = 5;
 $offset = ($page-1)*$limit;

 $sql = "SELECT * FROM admitcard_data LEFT JOIN blog_category ON admitcard_data.category=blog_category.category_id ORDER BY date DESC limit $offset, $limit";
 $result = $conn->query($sql);

 $blogPosts = array();

 if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {

        $row['admitcard_discription'] = substr($row['admitcard_discription'],0 ,500) . '...';
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
                    <h1>Admit Card</h1>
                </div>
            </div>
            <?php foreach ($blogPosts as $post): ?>
            <div class="card my-3">
                <div class="card-title p-3">
                    <a href="admit-card-allnews.php?admitcard_id=<?php echo $post['admitcard_id']; ?>">
                        <h2><?php echo $post['admitcard_title']; ?></h2>
                    </a>
                    <span><?php echo $post['date']?></span>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p><?php echo $post['admitcard_discription']; ?><a
                                href="admit-card-allnews.php?admitcard_id=<?php echo $post['admitcard_id']; ?>">Read
                                More</a></p>
                    </div>
                    <div class="link-part my-5">
                        <p><i class="bi bi-folder-fill"></i> <a href="admit-card.php">Admit Card</a></p>
                        <p><i class="bi bi-chat-left-dots-fill"></i> <a
                                href="admit-card-allnews.php?admitcard_id=<?php echo $post['admitcard_id']; ?>">Leave a
                                comment</a></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php 
                $pagination ="SELECT * FROM admitcard_data"; 
                $run_query = mysqli_query($conn, $pagination);
                $total_post = mysqli_num_rows($run_query);
                $pages = ceil($total_post/$limit);
                ?>
            <ul class="pagination pt-2 pb-5">
                <?php for ($i=1; $i <= $pages; $i++) { ?>
                <li class="page-item <?= ($i==$page) ? $active = 'active':'';?>">
                    <a href="admit-card.php?page_no=<?= $i?>" class="page-link"><?= $i?></a>
                </li>
                <?php }?>
            </ul>
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
                <form action="admitcard_search.php" method="GET">
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
                    <h4>Recent Post</h4>
                </div>
                <?php 
                    $select2 = "SELECT * FROM admitcard_data ORDER BY date DESC";
                    $query2 = mysqli_query($conn, $select2);
                    $postCounter = 0;
                    ?>
                <div class="card-body p-3">
                    <ul>
                        <?php while(($title = mysqli_fetch_assoc($query2)) && $postCounter < 5){?>
                        <div style="display: flex; gap: 10px;">
                            <a href="./admit-card-allnews.php?admitcard_id=<?php echo $title['admitcard_id']; ?>"
                                style="display: block; text-decoration: none;" class="card-link-wp">
                                <?= $title['admitcard_title'] ?>
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
                    <ul>
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
<?php include('includes/footer.php')?>