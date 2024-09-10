<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['student_id'];

    $sql = "DELETE FROM Students WHERE student_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="delete_student.php">
    Student ID: <input type="number" name="student_id" required><br>
    <button type="submit">Delete Student</button>
</form>
