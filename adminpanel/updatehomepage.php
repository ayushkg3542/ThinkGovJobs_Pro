<?php 
include('../connection.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');

if (isset($_POST['add_title'])) {
    // Retrieve the form data
    $marq_name = mysqli_real_escape_string($conn, $_POST['marquee_name']);
    $post_url = mysqli_real_escape_string($conn, $_POST['post_url']);

    // Check if the category already exists in the database
    $sql = "SELECT * FROM marquee_data WHERE marquee_name = '{$marq_name}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    
    if ($row) {
        echo "<script>alert('This marquee title is already exists.')</script>";
    } else {
        // Category doesn't exist, so add it to the database
        $insert_sql = "INSERT INTO marquee_data (marquee_name, post_url) VALUES ('{$marq_name}','{$post_url}')";
        $insert_query = mysqli_query($conn, $insert_sql);
        
        if ($insert_query) {
            echo "<script type='text/javascript'>alert('Marquee title added successfully.')</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: Unable to add the title.')</script>";
        }
    }
}

if (isset($_POST['add_headline'])) {
    // Retrieve the form data
    $headline = mysqli_real_escape_string($conn, $_POST['headline']);
    $headline_url = mysqli_real_escape_string($conn, $_POST['headline_url']);

    // Check if the category already exists in the database
    $sql = "SELECT * FROM headline_data WHERE headline = '{$headline_url}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    
    if ($row) {
        echo "<script>alert('This headline is already exists.')</script>";
    } else {
        // Category doesn't exist, so add it to the database
        $insert_sql = "INSERT INTO headline_data (headline, headline_url) VALUES ('{$headline}','{$headline_url}')";
        $insert_query = mysqli_query($conn, $insert_sql);
        
        if ($insert_query) {
            echo "<script type='text/javascript'>alert('Heading added successfully.')</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: Unable to add the headline.')</script>";
        }
    }
}

?>
<style>
.card-header {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-header h4 {
    width: 100%;
}

.card-header a {
    margin: 0px 20px;
}

.form-control {
    border: 1px solid;
    padding: 10px;
}

/* Style for the camera icon */
.camera-icon {
    cursor: pointer;
    float: right;
    padding: 10px;
    background: lightgrey;
    border-radius: 100%;
    width: 45px;
    text-align: center;
}

/* Styles for the modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding: 100px 0;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    margin: auto;
    display: block;
    max-width: 55%;
    max-height: fit-content;
}

.close {
    position: absolute;
    top: 65px;
    right: 370px;
    font-size: 36px;
    cursor: pointer;
    color: white;
}

.dropdown-menu.show {
    transform: translate3d(1250px, 66px, 0px);
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h3>Update Homepage</h3>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="font-weight-bold text-danger mt-2"><i class="bi bi-plus"></i>
                                Add Marquee Section
                            </h4>
                            <span style="font-size: 10px; color: red">*See image of marquee</span>
                            <span class="camera-icon" onclick="openModal()"><i class="bi bi-camera"></i></span>
                            <a type="button" data-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-three-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item edit-category-btn" href="marquee_name.php" data-edit-id="">View
                                    Marquee Title</a>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                        <span style="font-size: 12px; color: red">*Add upto 9</span>
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="marquee_name" placeholder="Add Title for marquee"
                                        class="form-control" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="post_url" placeholder="Add URL of post"
                                        class="form-control" required>
                                </div>
                                <div class="d-flex mt-3" style="gap: 10px;">
                                    <input type="submit" name="add_title" value="Submit"
                                        class="btn btn-outline-warning">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="modal-content" id="modalImage" src="" alt="Image">
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="font-weight-bold text-danger mt-2"><i class="bi bi-plus"></i>
                                Add Headline Section
                            </h4>
                            <span style="font-size: 10px; color: red">*See image of headline</span>
                            <span class="camera-icon" onclick="openModalSecond()"><i class="bi bi-camera"></i></span>
                            <a type="button" data-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-three-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item edit-category-btn" href="headline_name.php" data-edit-id="">View
                                    Headlines</a>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <span style="font-size: 12px; color: red">*Add upto 8</span>
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="headline" placeholder="Add headline"
                                        class="form-control" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="headline_url" placeholder="Add headline URL "
                                        class="form-control" required>
                                </div>
                                <div class="d-flex mt-3" style="gap: 10px;">
                                    <input type="submit" name="add_headline" value="Submit"
                                        class="btn btn-outline-warning">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModalSecond" class="modal">
                <span class="close" onclick="closeModalSecond()">&times;</span>
                <img class="modal-content" id="modalImageSecond" src="" alt="Image">
            </div>
            <a href="dashboard.php" class="btn btn-info btn-md"><i class="bi bi-arrow-left-short"></i> Back</a>
        </div>
    </section>
</div>
<script>
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    var modalImage = document.getElementById("modalImage");
    modalImage.src = "./dist/img/maruee_img.png"; // Replace with the path to your image
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function openModalSecond() {
    var modal = document.getElementById("myModalSecond");
    modal.style.display = "block";
    var modalImage = document.getElementById("modalImageSecond");
    modalImage.src = "./dist/img/headline_img.png"; // Replace with the path to your image
}

function closeModalSecond() {
    var modal = document.getElementById("myModalSecond");
    modal.style.display = "none";
}
</script>

<?php include('include/footer.php');

?>