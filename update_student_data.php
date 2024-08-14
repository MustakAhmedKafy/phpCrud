<?php
// Include the database connection file
require_once 'includes/db.php';

// Check if the form is submitted for adding a new student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstName'])) {
  // Existing code for adding a new student...
}

// Check if the form is submitted for updating a student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateStudent'])) {
  // Retrieve the data from the form
  $id = $_POST['id'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $age = $_POST['age'];

  // Validate the input
  if (!empty($id) && !empty($firstName) && !empty($lastName) && !empty($age)) {
    // Prepare the SQL query to prevent SQL injection
    $stmt = $connect->prepare("UPDATE students SET firstName = ?, lastName = ?, age = ? WHERE id = ?");

    if ($stmt) {
      // Bind the parameters
      $stmt->bind_param("ssii", $firstName, $lastName, $age, $id);

      // Execute the statement
      if ($stmt->execute()) {
        echo "<script>alert('Student updated successfully!');</script>";
      } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
      }

      // Close the statement
      $stmt->close();
    } else {
      echo "<script>alert('Error preparing the statement: " . $connect->error . "');</script>";
    }
  } else {
    echo "<script>alert('Please fill in all fields.');</script>";
  }

  // Close the database connection
  $connect->close();
}
?>