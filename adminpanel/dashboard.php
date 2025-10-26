<?php 
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
include('../connection.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <?php 
                            ?>
                            <p>Update Your Home Page</p>
                        </div>
                        <a href="updatehomepage.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php 
                $dash_category_query = "SELECT * FROM admission_data";
                $dash_category_query_num = mysqli_query($conn, $dash_category_query);

                if($dash_category_query_num){
                  $category_total = mysqli_num_rows($dash_category_query_num);

                  if($category_total){
                    echo '<h3 class="mb-2">' . $category_total . '</h3>';
                  }else{
                    echo '<h3 class="mb-2">No Data</h3>';
                  }
                }else {
                  echo '<h3 class="mb-2">Error in query: ' . mysqli_error($conn) . '</h3>';
              }
                ?>
                            <p>Admission Data</p>
                        </div>

                        <a href="admission_page.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php 
                $dash_category_query = "SELECT * FROM admitcard_data";
                $dash_category_query_num = mysqli_query($conn, $dash_category_query);

                if($dash_category_query_num){
                  $category_total = mysqli_num_rows($dash_category_query_num);

                  if($category_total){
                    echo '<h3 class="mb-2">' . $category_total . '</h3>';
                  }else{
                    echo '<h3 class="mb-2">No Data</h3>';
                  }
                }else {
                  echo '<h3 class="mb-2">Error in query: ' . mysqli_error($conn) . '</h3>';
              }
                ?>
                            <p>Admitcard Data</p>
                        </div>
                        <a href="admit_card_page.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php 
                $dash_category_query = "SELECT * FROM answerkey_data";
                $dash_category_query_num = mysqli_query($conn, $dash_category_query);

                if($dash_category_query_num){
                  $category_total = mysqli_num_rows($dash_category_query_num);

                  if($category_total){
                    echo '<h3 class="mb-2">' . $category_total . '</h3>';
                  }else{
                    echo '<h3 class="mb-2">No Data</h3>';
                  }
                }else {
                  echo '<h3 class="mb-2">Error in query: ' . mysqli_error($conn) . '</h3>';
              }
                ?>
                            <p>Answer Key Data</p>
                        </div>

                        <a href="answer_key_page.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php 
                $dash_category_query = "SELECT * FROM result_data";
                $dash_category_query_num = mysqli_query($conn, $dash_category_query);

                if($dash_category_query_num){
                  $category_total = mysqli_num_rows($dash_category_query_num);

                  if($category_total){
                    echo '<h3 class="mb-2">' . $category_total . '</h3>';
                  }else{
                    echo '<h3 class="mb-2">No Data</h3>';
                  }
                }else {
                  echo '<h3 class="mb-2">Error in query: ' . mysqli_error($conn) . '</h3>';
              }
                ?>
                            <p>Result Data</p>
                        </div>

                        <a href="result_page.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <?php 
                $dash_category_query = "SELECT * FROM syllabus_data";
                $dash_category_query_num = mysqli_query($conn, $dash_category_query);

                if($dash_category_query_num){
                  $category_total = mysqli_num_rows($dash_category_query_num);

                  if($category_total){
                    echo '<h3 class="mb-2">' . $category_total . '</h3>';
                  }else{
                    echo '<h3 class="mb-2">No Data</h3>';
                  }
                }else {
                  echo '<h3 class="mb-2">Error in query: ' . mysqli_error($conn) . '</h3>';
              }
                ?>
                            <p>Syllabus Data</p>
                        </div>
                        <a href="syllabus_page.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php 
                $dash_category_query = "SELECT * FROM latestjob_data";
                $dash_category_query_num = mysqli_query($conn, $dash_category_query);

                if($dash_category_query_num){
                  $category_total = mysqli_num_rows($dash_category_query_num);

                  if($category_total){
                    echo '<h3 class="mb-2">' . $category_total . '</h3>';
                  }else{
                    echo '<h3 class="mb-2">No Data</h3>';
                  }
                }else {
                  echo '<h3 class="mb-2">Error in query: ' . mysqli_error($conn) . '</h3>';
              }
                ?>

                            <p>Latest Job Data</p>
                        </div>
                        <a href="latest_job_page.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
    </section>
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href=""></a>.</strong>
    thinkgovtjobs.com
</footer>
</div>

<?php include('include/footer.php')?>