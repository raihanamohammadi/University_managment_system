<?php
include 'db_connect.php';

// Handle the deletion if requested
if (isset($_POST['delete'])) {
    $student_id = $_POST['student_id'];
    $delete_sql = "DELETE FROM Students WHERE student_id = $student_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Error deleting student: " . $conn->error;
    }
}

// Handle adding a new student if requested
if (isset($_POST['add_student'])) {
    $student_name = $_POST['student_name'];
    $email = $_POST['email'];
    $add_sql = "INSERT INTO Students (student_name, email) VALUES ('$student_name', '$email')";
    if ($conn->query($add_sql) === TRUE) {
        echo "Student added successfully!";
    } else {
        echo "Error adding student: " . $conn->error;
    }
}

// Display Students List
$sql = "SELECT * FROM Students";
$result = $conn->query($sql);

echo "<h1>Students List</h1>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["student_id"] . "</td>
                <td>" . $row["student_name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='student_id' value='" . $row["student_id"] . "'>
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

<!-- Add Student Form -->
<h2>Add New Student</h2>
<form method="POST" action="">
    Name: <input type="text" name="student_name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit" name="add_student">Add Student</button>
</form>
