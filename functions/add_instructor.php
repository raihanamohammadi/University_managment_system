<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_name = $_POST['instructor_name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Instructors (instructor_name, email) VALUES ('$instructor_name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Instructor added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="add_instructor.php">
    Name: <input type="text" name="instructor_name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Add Instructor</button>
</form>
