<?php
include 'db_connect.php';

// Handle the deletion if requested
if (isset($_POST['delete'])) {
    $instructor_id = $_POST['instructor_id'];
    $delete_sql = "DELETE FROM Instructors WHERE instructor_id = $instructor_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Instructor deleted successfully!";
    } else {
        echo "Error deleting instructor: " . $conn->error;
    }
}

// Handle adding a new instructor if requested
if (isset($_POST['add_instructor'])) {
    $instructor_name = $_POST['instructor_name'];
    $email = $_POST['email'];

    $add_sql = "INSERT INTO Instructors (instructor_name, email) VALUES ('$instructor_name', '$email')";
    if ($conn->query($add_sql) === TRUE) {
        echo "Instructor added successfully!";
    } else {
        echo "Error adding instructor: " . $conn->error;
    }
}

// Display Instructors List
$sql = "SELECT * FROM Instructors";
$result = $conn->query($sql);

echo "<h1>Instructors List</h1>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["instructor_id"] . "</td>
                <td>" . $row["instructor_name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='instructor_id' value='" . $row["instructor_id"] . "'>
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

<!-- Add Instructor Form -->
<h2>Add New Instructor</h2>
<form method="POST" action="">
    Name: <input type="text" name="instructor_name" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit" name="add_instructor">Add Instructor</button>
</form>
