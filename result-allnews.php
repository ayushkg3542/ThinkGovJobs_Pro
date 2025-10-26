<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 if (isset($_GET['result_id'])) {
    $blogId = $_GET['result_id']; // Retrieve the blog ID from the query parameter

    // Fetch the full blog content based on the blog ID from the database
    $sql = "SELECT * FROM result_data WHERE result_id = $blogId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $blogTitle = $row['result_title'];
        $blogDate = $row['date'];
        $blogContent = $row['result_discription'];
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

table {
    width: 100%;
    max-width: 100%;
    border-collapse: collapse;
}

table tbody tr td h2 {
    font-size: 1.5rem;
    text-align: center;
}

table tbody tr td h3 {
    text-align: center;
    font-size: 1rem;
    color: green;
}

table table {
    table-layout: fixed;
}

table tbody tr td h4 {
    font-size: 0.8rem;
    color: yellow;
}

table,
tr,
td {
    word-wrap: break-word;
}

.card-inner li {
    text-decoration: none;
    list-style: none;
}

.card-inner li a {
    text-decoration: none;
}

td,
tr {
    border: 1px solid black;
}
</style>

<div class="container">
    <h2>Result</h2>
    <table width="100%" align="center" style="height: auto !important">
        <tbody>
            <tr valign="top" style="height: auto !important;">
                <td style="height: auto !important;">
                    <div align="left" style="height: auto !important;">
                        <?php echo $blogContent;?>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
function makeTableResponsive() {
    const table = document.querySelector('table');
    const screenWidth = window.innerWidth;

    if (screenWidth <= 768) {
        table.style.overflowX = 'auto';
    } else {
        table.style.overflowX = 'visible';
    }
}

// Call the function when the page loads and when the window is resized
window.addEventListener('load', makeTableResponsive);
window.addEventListener('resize', makeTableResponsive);
</script>

<?php include('includes/footer.php');?>