<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO Enrollments (student_id, course_id, grade) VALUES ($student_id, $course_id, '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "Enrollment added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="add_enrollment.php">
    Student ID: <input type="number" name="student_id" required><br>
    Course ID: <input type="number" name="course_id" required><br>
    Grade: <input type="text" name="grade" maxlength="2"><br>
    <button type="submit">Add Enrollment</button>
</form>
