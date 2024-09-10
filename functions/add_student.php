<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Students (student_name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Student added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="add_student.php">
    Name: <input type="text" name="student_name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Add Student</button>
</form>
