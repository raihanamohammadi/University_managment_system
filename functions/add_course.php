<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $schedule = $_POST['schedule'];
    $credits = $_POST['credits'];
    $instructor_id = $_POST['instructor_id'];
    $books = $_POST['books'];
    $prerequisites = $_POST['prerequisites'];

    $sql = "INSERT INTO Courses (course_name, course_code, schedule, credits, instructor_id, books, prerequisites)
            VALUES ('$course_name', '$course_code', '$schedule', $credits, $instructor_id, '$books', '$prerequisites')";

    if ($conn->query($sql) === TRUE) {
        echo "Course added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="add_course.php">
    Course Name: <input type="text" name="course_name" required><br>
    Course Code: <input type="text" name="course_code" required><br>
    Schedule: <input type="text" name="schedule"><br>
    Credits: <input type="number" name="credits"><br>
    Instructor ID: <input type="number" name="instructor_id"><br>
    Books: <input type="text" name="books"><br>
    Prerequisites: <input type="text" name="prerequisites"><br>
    <button type="submit">Add Course</button>
</form>
