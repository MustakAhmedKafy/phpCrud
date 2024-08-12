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
            <form id="addStudentForm" action="your-server-endpoint" method="post">
              <input type="text" class="form-control mb-3" name="first_name" placeholder="First Name" required>
              <input type="text" class="form-control mb-3" name="last_name" placeholder="Last Name" required>
              <input type="number" class="form-control mb-3" name="age" placeholder="Age" required>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="addStudentForm" class="btn btn-primary">Save</button>
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
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateStudentLabel<?php echo $row['id']; ?>">Update Student</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <input type="text" class="form-control mb-3" value="<?php echo $row['firstName']; ?>" placeholder="First Name">
                      <input type="text" class="form-control mb-3" value="<?php echo $row['lastName']; ?>" placeholder="Last Name">
                      <input type="number" class="form-control mb-3" value="<?php echo $row['age']; ?>" placeholder="Age">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td><button class="btn btn-danger">Delete</button></td>
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