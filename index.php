<?php include 'header.php' ?>
<?php include 'includes/db.php' ?>


<!-- table -->
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>All Students</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
      Add Students
    </button>

    <!-- Modal for Adding Student -->
    <div class="modal fade" id="addStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStudentLabel">Add Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addStudentForm" action="insert_student.php" method="post">
              <input type="text" class="form-control mb-3" name="firstName" placeholder="First Name" required>
              <input type="text" class="form-control mb-3" name="lastName" placeholder="Last Name" required>
              <input type="number" class="form-control mb-3" name="age" placeholder="Age" required>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" form="addStudentForm" class="btn btn-primary" value="Add" />
          </div>
        </div>
      </div>
    </div>

  </div>

  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Query to select all students
      $sql = "SELECT * FROM `students`";
      $result = $connect->query($sql);

      // Check if there are results
      if ($result->num_rows > 0) {
        // Loop through each row in the results
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["firstName"]; ?></td>
            <td><?php echo $row["lastName"]; // Fixed typo here
                ?>
            </td>
            <td><?php echo $row["age"]; ?></td>
            <td>
              <!-- Button trigger modal for Update -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateStudentModal<?php echo $row['id']; ?>">
                Update
              </button>

              <!-- Modal for Updating Student -->
              <div class="modal fade" id="updateStudentModal<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateStudentLabel<?php echo $row['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form method="POST" action="update_student_data.php" id="updateStudentData">
                      <div class="modal-header">
                        <h5 class="modal-title" id="updateStudentLabel<?php echo $row['id']; ?>">Update Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" class="form-control mb-3" name="firstName" value="<?php echo $row['firstName']; ?>" placeholder="First Name">
                        <input type="text" class="form-control mb-3" name="lastName" value="<?php echo $row['lastName']; ?>" placeholder="Last Name">
                        <input type="number" class="form-control mb-3" name="age" value="<?php echo $row['age']; ?>" placeholder="Age">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button form="updateStudentData" type="submit" name="updateStudent" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


            </td>
            <td>
              <form method="POST" action="delete_student.php">
                <!-- Hidden input to store the student ID -->
                <input type="hidden" name="id" value="<?php echo $student_id; ?>">
                <button class="btn btn-danger" type="submit" name="delete">Delete</button>
              </form>
            </td>
          </tr>
      <?php
        }
      } else {
        echo "<tr><td colspan='6' class='text-center'>No students found</td></tr>";
      }
      // Close the connection
      $connect->close();
      ?>
    </tbody>
  </table>
</div>

<?php include 'footer.php' ?>