<?php include 'header.php' ?>

<!-- table -->
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>All Students</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Add Students
    </button>

    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="text" class="form-control mb-3" placeholder="First Name">
            <input type="text" class="form-control mb-3" placeholder="Last Name">
            <input type="number" class="form-control mb-3" placeholder="Age">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
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
      <tr>
        <td>1</td>
        <td>Anirban</td>
        <td>Bhowmick</td>
        <td>28</td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Update
          </button>

          <!-- Modal -->
          <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="text" class="form-control mb-3" placeholder="First Name">
                  <input type="text" class="form-control mb-3" placeholder="Last Name">
                  <input type="number" class="form-control mb-3" placeholder="Age">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
                </div>
              </div>
            </div>
          </div>

        </td>
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


<?php include 'footer.php' ?>