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
        <div class="col-sm-8 col-md-8 col-12">
            <div class="card">
                <div class="card-title p-3">
                    <h1>Disclaimer</h1>
                </div>
                <div class="card-body">
                    <h2><strong>Disclaimer for Think Govt Jobs</strong></h2>
                    <p>If you require any more information or have any questions about our site’s disclaimer, please
                        feel free to contact us by email at Surajp78697@gmail.com.</p>
                    <br>
                    <br>
                    <p>All the information on this website – https://thinkgovtjobs.com/ – is published in good faith and
                        for general information purpose only. Think Govt Jobs does not make any warranties about the
                        completeness, reliability and accuracy of this information. Any action you take upon the
                        information you find on this website ( Think Govt Jobs), is strictly at your own risk. Think
                        Govt Jobs will not be liable for any losses and/or damages in connection with the use of our
                        website.
                        <br>
                        <br>
                        From our website, you can visit other websites by following hyperlinks to such external sites.
                        While we strive to provide only quality links to useful and ethical websites, we have no control
                        over the content and nature of these sites. These links to other websites do not imply a
                        recommendation for all the content found on these sites. Site owners and content may change
                        without notice and may occur before we have the opportunity to remove a link which may have gone
                        ‘bad’.
                        <br>
                        <br>
                        Please be also aware that when you leave our website, other sites may have different privacy
                        policies and terms which are beyond our control. Please be sure to check the Privacy Policies of
                        these sites as well as their “Terms of Service” before engaging in any business or uploading any
                        information.
                    </p>
                    <br>
                    <br>
                    <h2><strong>Consent</strong></h2>
                    <p>
                        By using our website, you hereby consent to our disclaimer and agree to its terms.
                    </p>
                    <br>
                    <br>
                    <h2><strong>Update</strong></h2>
                    <p>Should we update, amend or make any changes to this document, those changes will be prominently
                        posted here.</p>

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-12">
            <!-- <div class="card mb-3">
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
            </div> -->
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
                        <?php while($title = mysqli_fetch_assoc($query2) && $postCounter < 5){?>
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