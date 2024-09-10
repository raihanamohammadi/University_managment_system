<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['course_id'];

    $sql = "DELETE FROM Courses WHERE course_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Course deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="delete_course.php">
    Course ID: <input type="number" name="course_id" required><br>
    <button type="submit">Delete Course</button>
</form>
