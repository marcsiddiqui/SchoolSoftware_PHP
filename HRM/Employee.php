<?php
  include_once "../Layouts/Admin/header.php"
?>
<div class="container mt-3">
  <h2>Employees List</h2>
  <p>Here we will show all employees from database:</p>
  <a href="http://localhost:82/sms/hrm/CreateEmployee.php" class="btn btn-primary" type="button">Add New Employee</a>
  <br /><br />
  <form method="POST">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>CNIC</th>
          <th>PhoneNumber</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          
          include "../DatabaseConfigurations/Employee.php";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $employeeId = $_POST["deleteEmployee"];

            if ($employeeId > 0) {
              
              DeleteById('Employee', $employeeId, 1);

            }
          }

          PrepareEmployeeList();
        
        ?>
      </tbody>
    </table>
  </form>
</div>
<?php
  include_once "../Layouts/Admin/footer.php"
?>