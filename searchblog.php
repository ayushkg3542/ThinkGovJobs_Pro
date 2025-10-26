<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');
 
 if(isset($_GET['search'])){
    $searchTerm = urldecode($_GET['search']);

    $blogPostContent = getBlogPostContent($searchTerm, $conn);

} else {
    // Handle the case when no search term is provided
    echo "Invalid request. Please provide a search term.";
}

function getBlogPostContent($searchTerm, $conn)
{
    $tableColumns = array(
        "admission_data" => array("title" => "admission_name", "discription" => "admission_discription"),
        "result_data" => array("title" => "result_title", "discription" => "result_discription"),
        "syllabus_data" => array("title" => "syllabus_title", "discription" => "syllabus_discription"),
        "admitcard_data" => array("title" => "admitcard_title", "discription" => "admitcard_discription")
    );

    // Loop through each table and check if the title exists
    foreach ($tableColumns as $table => $columns) {
        $sql = "SELECT {$columns['discription']} FROM $table WHERE {$columns['title']} = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Title found in this table, fetch and return the description
            $row = $result->fetch_assoc();
            return $row[$columns['discription']];
        }
    }

 }
?>

<div class="container">
    <?php echo "<h3>{$searchTerm}</h3>";
    ?>
    <br>
    <?php echo "{$blogPostContent}";?>
    

</div>
