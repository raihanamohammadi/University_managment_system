<?php
include 'db_connect.php';

// Handle the deletion if requested
if (isset($_POST['delete'])) {
    $enrollment_id = $_POST['enrollment_id'];
    $delete_sql = "DELETE FROM Enrollments WHERE enrollment_id = $enrollment_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Enrollment deleted successfully!";
    } else {
        echo "Error deleting enrollment: " . $conn->error;
    }
}

// Handle adding a new enrollment if requested
if (isset($_POST['add_enrollment'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    $add_sql = "INSERT INTO Enrollments (student_id, course_id, grade) VALUES ('$student_id', '$course_id', '$grade')";
    if ($conn->query($add_sql) === TRUE) {
        echo "Enrollment added successfully!";
    } else {
        echo "Error adding enrollment: " . $conn->error;
    }
}

// Display Enrollments List
$sql = "SELECT e.enrollment_id, s.student_name, c.course_name, e.grade 
        FROM Enrollments e 
        JOIN Students s ON e.student_id = s.student_id 
        JOIN Courses c ON e.course_id = c.course_id";
$result = $conn->query($sql);

echo "<h1>Enrollments</h1>";
echo "<table border='1'><tr><th>ID</th><th>Student</th><th>Course</th><th>Grade</th><th>Action</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["enrollment_id"] . "</td>
                <td>" . $row["student_name"] . "</td>
                <td>" . $row["course_name"] . "</td>
                <td>" . $row["grade"] . "</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='enrollment_id' value='" . $row["enrollment_id"] . "'>
                        <button type='submit' name='delete'>Delete</button>
                    </form>
                </td>
              </tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";
?>

<!-- Add Enrollment Form -->
<h2>Add New Enrollment</h2>
<form method="POST" action="">
    Student ID: <input type="text" name="student_id" required><br>
    Course ID: <input type="text" name="course_id" required><br>
    Grade: <input type="text" name="grade" maxlength="2"><br>
    <button type="submit" name="add_enrollment">Add Enrollment</button>
</form>
