<?php 
ob_start();
include('../connection.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');

$headline_id = $_GET['headline_id'];

$query = "SELECT * FROM headline_data WHERE headline_id = '$headline_id'";
$query_result = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($query_result);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $headline = $_POST['headline'];
    $headline_url = $_POST['headline_url'];
    
    $headline = trim($headline);
    $headline_url = trim($headline_url);

    $update = "UPDATE headline_data SET headline = '$headline', headline_url = '$headline_url' WHERE headline_id = '$headline_id'";
    $query = mysqli_query($conn, $update);

    if($query){
        echo '<script>alert("Headline modified Successfully")</script>';
    }else{
        echo '<script>alert("Failed to Update")</script>';
        header('location: edit_updatehomepage.php');
    }
}



ob_flush();
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
                            <span style="font-size: 10px; color: red">*Add upto 9</span>
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="marquee_name" 
                                        class="form-control" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="post_url"
                                        class="form-control" required>
                                </div>
                                <div class="d-flex mt-3" style="gap: 10px;">
                                    <input type="submit" name="add_title" value="Submit"
                                        class="btn btn-outline-warning">
                                    <a href=".php" class="btn btn-outline-info">Back</a>
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
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="headline" value="<?= $rows['headline']?>"
                                        class="form-control" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="headline_url" value="<?= $rows['headline_url']?>"
                                        class="form-control" required>
                                </div>
                                <div class="d-flex mt-3" style="gap: 10px;">
                                    <input type="submit" name="headline_title" value="Submit"
                                        class="btn btn-outline-warning">
                                    <a href="news_category.php" class="btn btn-outline-info">Back</a>
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