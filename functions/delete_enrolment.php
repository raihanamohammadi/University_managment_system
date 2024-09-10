<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['enrollment_id'];

    $sql = "DELETE FROM Enrollments WHERE enrollment_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Enrollment deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="delete_enrollment.php">
    Enrollment ID: <input type="number" name="enrollment_id" required><br>
    <button type="submit">Delete Enrollment</button>
</form>
