<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 if (isset($_GET['admission_name'])) {
    $admissionName = $_GET['admission_name']; // Retrieve the admission name from the query parameter

    // Fetch the full admission content based on the admission name from the database
    $sql = "SELECT * FROM admission_data WHERE admission_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admissionName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $admissionName = $row['admission_name'];
        $admissionDate = $row['date'];
        $admissionContent = $row['admission_discription'];
    } else {
        // Handle the case when the admission is not found
        $admissionName = "Admission Not Found";
        $admissionDate = "";
        $admissionContent = "The requested admission could not be found.";
    }
} else {
    // Handle the case when the admission name is not provided
    $admissionName = "Invalid Admission Name";
    $admissionDate = "";
    $admissionContent = "Please provide a valid admission name.";
}


if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $stmt = $conn->prepare("INSERT INTO comment_section(name, message) VALUES (?,?)");
    $stmt->bind_param("ss", $name, $message);

    if($stmt->execute()){
        echo "<script>alert('Thank you for your comment')</script>";
    }else {
        echo "Error: " . $stmt->error;
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
    <h2>Admission</h2>
    <table width="100%" align="center" style="height: auto !important">
        <tbody>
            <tr valign="top" style="height: auto !important;">
                <td style="height: auto !important;">
                    <div align="left" style="height: auto !important;">
                        <?php echo $admissionContent;?>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php');?>