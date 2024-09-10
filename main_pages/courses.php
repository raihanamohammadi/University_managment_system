<?php
include 'db_connect.php';

// Handle the deletion if requested
if (isset($_POST['delete'])) {
    $course_id = $_POST['course_id'];
    $delete_sql = "DELETE FROM Courses WHERE course_id = $course_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Course deleted successfully!";
    } else {
        echo "Error deleting course: " . $conn->error;
    }
}

// Handle adding a new course if requested
if (isset($_POST['add_course'])) {
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $credits = $_POST['credits'];

    $add_sql = "INSERT INTO Courses (course_name, course_code, credits) VALUES ('$course_name', '$course_code', '$credits')";
    if ($conn->query($add_sql) === TRUE) {
        echo "Course added successfully!";
    } else {
        echo "Error adding course: " . $conn->error;
    }
}

// Display Courses List
$sql = "SELECT * FROM Courses";
$result = $conn->query($sql);

echo "<h1>Courses List</h1>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Code</th><th>Credits</th><th>Action</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["course_id"] . "</td>
                <td>" . $row["course_name"] . "</td>
                <td>" . $row["course_code"] . "</td>
                <td>" . $row["credits"] . "</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='course_id' value='" . $row["course_id"] . "'>
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

<!-- Add Course Form -->
<h2>Add New Course</h2>
<form method="POST" action="">
    Name: <input type="text" name="course_name" required><br>
    Code: <input type="text" name="course_code" required><br>
    Credits: <input type="number" name="credits" required><br>
    <button type="submit" name="add_course">Add Course</button>
</form>

