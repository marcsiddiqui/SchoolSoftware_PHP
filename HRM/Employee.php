<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Employees List</h2>
  <p>Here we will show all employees from database:</p>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>CNIC</th>
        <th>PhoneNumber</th>
      </tr>
    </thead>
    <tbody>
      <?php
        
        include "../DatabaseConfigurations/Employee.php";

        PrepareEmployeeList();
      
      ?>
    </tbody>
  </table>
</div>

</body>
</html>