<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .errorMessage{
      color: red;
      
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <a href="http://localhost:82/sms/hrm/Employee.php" type="button" class="btn btn-secondary">Back to List</a>
</div>

<div class="container">
  <h2>Create New Employee</h2>
  <form method="post">

    <?php
    
    $firstName = $lastName = $email = $password = $cnic = $address = $phoneNumber = "";
    $firstNameError = $lastNameError = $emailError = $passwordError = $cnicError = $addressError = $phoneNumberError = "";




    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $firstName = $_POST["FirstName"];
      $lastName = $_POST["LastName"];
      $email = $_POST["Email"];
      $password = $_POST["Password"];
      $cnic = $_POST["CNIC"];
      $address = $_POST["Address"];
      $phoneNumber = $_POST["PhoneNumber"];

      if (empty($firstName)) {
        $firstNameError = "Please enter First Name!";
      }
      else {
        $firstNameError = "";
      }

      if (empty($lastName)) {
        $lastNameError = "Please enter Last Name!";
      }
      else {
        $lastNameError = "";
      }

      if (empty($email)) {
        $emailError = "Please enter Email!";
      }
      else {
        $emailError = "";
      }

      if (empty($password)) {
        $passwordError = "Please enter Password!";
      }
      else {
        $passwordError = "";
      }

      if (empty($cnic)) {
        $cnicError = "Please enter CNIC!";
      }
      else {
        $cnicError = "";
      }

      if (empty($address)) {
        $addressError = "Please enter Address!";
      }
      else {
        $addressError = "";
      }

      if (empty($phoneNumber)) {
        $phoneNumberError = "Please enter Phone Number!";
      }
      else {
        $phoneNumberError = "";
      }

    }

    ?>


<div class="form-group">
      <label>First Name:</label>
      <input type="text" class="form-control" id="FirstName" name="FirstName" />
      <p class="errorMessage"><?php echo $firstNameError; ?></p>
    </div>

    <div class="form-group">
      <label>Last Name:</label>
      <input type="text" class="form-control" id="LastName" name="LastName" />
      <p class="errorMessage"><?php echo $lastNameError; ?></p>
    </div>

    <div class="form-group">
      <label>Email:</label>
      <input type="text" class="form-control" id="Email" name="Email" />
      <p class="errorMessage"><?php echo $emailError; ?></p>
    </div>

    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control" id="Password" name="Password" />
      <p class="errorMessage"><?php echo $passwordError; ?></p>
    </div>

    <div class="form-group">
      <label>CNIC:</label>
      <input type="text" class="form-control" id="CNIC" name="CNIC" />
      <p class="errorMessage"><?php echo $cnicError; ?></p>
    </div>

    <div class="form-group">
      <label>Address:</label>
      <input type="text" class="form-control" id="Address" name="Address" />
      <p class="errorMessage"><?php echo $addressError; ?></p>
    </div>

    <div class="form-group">
      <label>Phone Number:</label>
      <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" />
      <p class="errorMessage"><?php echo $phoneNumberError; ?></p>
    </div>

    <br /><br />

    <button type="submit" class="btn btn-primary">Save</button>

  </form>
</div>

</body>
</html>
