<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .errorMessage {
      color: red;
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <a href="http://localhost:82/sms/hrm/Employee.php" type="button" class="btn btn-secondary">Back to List</a>
</div>

<div class="container">
  <h2>Edit Employee</h2>

  <form method="POST">

    <?php

      include "../DatabaseConfigurations/DbFucntions.php";

      $firstName = $lastName = $email = $password = $cnic = $address = $phoneNumber = "";
      $firstNameError = $lastNameError = $emailError = $passwordError = $cnicError = $addressError = $phoneNumberError = "";
      
      // need to get employee from database
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        $result = GetDataById("Employee", $_GET["id"]);

        if (count($result) > 0) {
            if ($result["Success"] == true) {
                if (mysqli_num_rows($result["Response"]) > 0) {
                    while ($row = mysqli_fetch_assoc($result["Response"])) {
                        $firstName = $row["FirstName"];
                        $lastName = $row["LastName"];
                        $email = $row["Email"];
                        $password = $row["Password"];
                        $cnic = $row["CNIC"];
                        $address = $row["Address"];
                        $phoneNumber = $row["PhoneNumber"];
                    }
                }
                else {
                    echo "<tr>
                        <td colspan='4'>No Employees are found!</td>
                    </tr>";
                }
            }
        }

      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $phoneNumber = $_POST["PhoneNumber"];
        $password = $_POST["Password"];
        $cnic = $_POST["CNIC"];
        $email = $_POST["Email"];
        $address = $_POST["Address"];

        $firstNameError = empty($firstName) ? "Please enter First Name!" : "";
        $lastNameError = empty($lastName) ? "Please enter Last Name!" : "";
        $emailError = empty($email) ? "Please enter Email!" : "";
        $passwordError = empty($password) ? "Please enter Password!" : "";
        $cnicError = empty($cnic) ? "Please enter CNIC!" : "";
        $addressError = empty($address) ? "Please enter Address!" : "";
        $phoneNumberError = empty($phoneNumber) ? "Please enter Phone Number!" : "";


        if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) && !empty($cnic) && !empty($address) && !empty($phoneNumber)) {
          
          $columnsArray = array(
            "FirstName" => $firstName,
            "LastName" => $lastName,
            "PhoneNumber" => $phoneNumber,
            "Password" => $password,
            "CNIC" => $cnic,
            "Email" => $email,
            "Address" => $address
          );

          Update("Employee", $columnsArray, $_GET["id"]);

        }


      }

    ?>

    
    <div class="form-group">
      <label>First Name:</label>
      <input type="text" class="form-control" id="FirstName" name="FirstName" value="<?php echo $firstName; ?>">
      <p class="errorMessage"><?php echo $firstNameError; ?></p>
    </div>
    <div class="form-group">
      <label>Last Name:</label>
      <input type="text" class="form-control" id="LastName" name="LastName" value="<?php echo $lastName; ?>">
      <p class="errorMessage"><?php echo $lastNameError; ?></p>
    </div>
    <div class="form-group">
      <label>CNIC:</label>
      <input type="text" class="form-control" id="CNIC" name="CNIC" value="<?php echo $cnic; ?>">
      <p class="errorMessage"><?php echo $cnicError; ?></p>
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $email; ?>">
      <p class="errorMessage"><?php echo $emailError; ?></p>
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control" id="Password" name="Password" value="<?php echo $password; ?>">
      <p class="errorMessage"><?php echo $passwordError; ?></p>
    </div>
    <div class="form-group">
      <label>Phone Number:</label>
      <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="<?php echo $phoneNumber; ?>">
      <p class="errorMessage"><?php echo $phoneNumberError; ?></p>
    </div>
    <div class="form-group">
      <label>Address:</label>
      <input type="text" class="form-control" id="Address" name="Address" value="<?php echo $address; ?>">
      <p class="errorMessage"><?php echo $addressError; ?></p>
    </div>

    <br /><br />

    <button type="submit" class="btn btn-primary">Save Employee</button>
  </form>

</div>

</body>
</html>
