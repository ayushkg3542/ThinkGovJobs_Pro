<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 $results = array();

 if (isset($_POST['search'])) {
     // Get the search query from the form
     $search = $_POST['search'];
 
     // Define an array of table names and their corresponding title column names
     $tables = array(
         "admission_data" => "admission_name",
         "result_data" => "result_title",
         "syllabus_data" => "syllabus_title",
         "admitcard_data" => "admitcard_title"
     );
 
     // Loop through each table and perform a search
     foreach ($tables as $table => $titleColumn) {
         $sql = "SELECT $titleColumn FROM $table WHERE $titleColumn LIKE ?";
         $stmt = $conn->prepare($sql);
         $param = "%$search%";
         $stmt->bind_param("s", $param);
         $stmt->execute();
         $result = $stmt->get_result();
 
         while ($row = $result->fetch_assoc()) {
            $title = $row[$titleColumn];
            $blogPage = "searchblog.php";
            // Create a link for each result that redirects to the specific blog page
            $results[] = "<a href='{$blogPage}?search=" . urlencode($title) . "'>$title</a>";         
        }
     }
 }
 
?>

<style>
.container .form-section {
    height: 300px;
}

.container .form-section form {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}

.container .form-section form .form-control {
    width: 40%;
    padding: 10px 3px;
}

.container .form-section form .btn {
    width: 10%;
    padding: 10px 0px
}
</style>
<div class="container">
    <div class="form-section">
        <form method="post" action="">
            <input type="text" name="search" class="form-control" placeholder="Search...">
            <input type="submit" value="Search" class="btn btn-outline-secondary">
        </form>
    </div>
    <?php
if (isset($_POST['search'])) {
    if (count($results) > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<ul>";
        foreach ($results as $result) {
            echo "<li>$result</li>";
        }
        echo "</ul>";
    } else {
        echo "No results found.";
    }
}
?>

</div>