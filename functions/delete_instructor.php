<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['instructor_id'];

    $sql = "DELETE FROM Instructors WHERE instructor_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Instructor deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="delete_instructor.php">
    Instructor ID: <input type="number" name="instructor_id" required><br>
    <button type="submit">Delete Instructor</button>
</form>
