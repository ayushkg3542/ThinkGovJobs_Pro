<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');
 ?>

<style>
.card {
    border: none;
    background-color: #f3f3f3;
}

li {
    list-style: none;
}

li a {
    text-decoration: none;
}
</style>

<div class="container">
    <div class="row my-3">
        <div class="col-md-8 col-md-8 col-12">
            <div class="card">
                <div class="card-title p-3">
                    <h1>Contact Us</h1>
                </div>
                <div class="card-body">
                    <p>"We appreciate you stopping by <a href="https://thinkgovtjobs.com/"
                            target="_blank">ThinkGovtJobs.com</a> We appreciate
                        your opinions, and we're
                        available to assist you with any queries or worries you might have.
                        <br>
                        <br>
                        To reach us, please email us at Surajp78697@gmail.com. Our team will respond to your inquiry as
                        soon as possible.
                        <br>
                        <br>
                        You can also stay connected with us on our social media channels for the latest updates and
                        news. Thank you for choosing ThinkGovtJobs.com and we look forward to hearing from you soon.”
                    </p>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <br>
                        <span style="font-size: 14px;">BY SUBMITTING YOUR INFORMATION, YOU'RE GIVING US PERMISSION TO
                            EMAIL YOU. YOU MAY UNSUBSCRIBE AT
                            ANY TIME.</span>
                        <input type="submit" class="btn btn-success" value="Subscribe" name="submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-12">
            <div class="card">
                <div class="card-title p-3">
                    <h4>Recent Post</h4>
                </div>
                <?php 
                    $select2 = "SELECT * FROM result_data ORDER BY date DESC";
                    $query2 = mysqli_query($conn, $select2);
                    $postCounter = 0;
                    ?>
                <div class="card-body p-3">
                    <ul>
                        <?php while(($title = mysqli_fetch_assoc($query2)) && $postCounter < 5){?>
                        <div style="display: flex; gap: 10px;">
                            <a href="./result-allnews.php?result_id=<?php echo $title['result_id']; ?>"
                                style="display: block; text-decoration: none;" class="card-link-wp">
                                <?= $title['result_title'] ?>
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

<?php include('includes/footer.php');?>