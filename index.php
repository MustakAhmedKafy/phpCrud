<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>All Students</h2>
      <button type="button" class="btn btn-primary">Add Students</button>
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
        <tr>
          <td>1</td>
          <td>Anirban</td>
          <td>Bhowmick</td>
          <td>28</td>
          <td><button class="btn btn-success">Update</button></td>
          <td><button class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Tarun</td>
          <td>Singh</td>
          <td>24</td>
          <td><button class="btn btn-success">Update</button></td>
          <td><button class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Ajay</td>
          <td>Singh</td>
          <td>25</td>
          <td><button class="btn btn-success">Update</button></td>
          <td><button class="btn btn-danger">Delete</button></td>
        </tr>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
