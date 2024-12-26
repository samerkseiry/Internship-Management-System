<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php

 
$filter = $_GET["filter"];

$sql = "SELECT * FROM jobs WHERE jobtitle LIKE '%$filter%' OR description LIKE '%$filter%' OR experience LIKE '%$filter%'";
$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="jobtemplates.php?id='.$row['id_jobs'].'>';
        echo '<div class="job-post">';
        echo '<h2>' . $row['jobtitle'] . '</h2>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<p><strong>Location:</strong> ' . $row['city'] . '</p>';
        echo '<p><strong>Experience:</strong> ' . $row['experience'] . ' years</p>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo '<p>No job posts found.</p>';
}

mysqli_close($connect);
?>
