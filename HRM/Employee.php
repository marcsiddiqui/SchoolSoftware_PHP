<?php
  include_once "../Layouts/Admin/header.php"
?>
<style>
  .customWidth {
    width: 100% !important;
  }
  .customLable {
    color: black;
    font-weight: 700;
    margin-top: 5px;
  }
</style>
<div class="row column_title">
  <div class="col-md-12">
      <div class="page_title">
        <h2>Employees List</h2>
      </div>
  </div>
</div>
<!-- row -->
<div class="row">
  <!-- table section -->
  <div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
      <form method="POST">
        <?php
          $firstName = $lastName = $email = $password = $cnic = $address = $phoneNumber = "";
        ?>
        <div class="form-group col-md-6">
          <label class="customLable">First Name:</label>
          <input type="text" class="sr-input" id="FirstName" name="FirstName" value="<?php echo $firstName; ?>">
        </div>
        <div class="form-group col-md-6">
          <label class="customLable">Last Name:</label>
          <input type="text" class="sr-input" id="LastName" name="LastName" value="<?php echo $lastName; ?>">
        </div>
        <div class="form-group col-md-6">
          <label class="customLable">CNIC:</label>
          <input type="text" class="sr-input" id="CNIC" name="CNIC" value="<?php echo $cnic; ?>">
        </div>
        <div class="form-group col-md-6">
          <label class="customLable">Email:</label>
          <input type="text" class="sr-input" id="Email" name="Email" value="<?php echo $email; ?>">
        </div>
        <button type="submit" name="searchBtn" style="float:right; margin-left: 5px;" class="btn btn-info">Search Employee</button>
        <a href="http://localhost:82/sms/hrm/CreateEmployee.php" class="btn btn-primary" type="button">Add New Employee</a>
        <div class="full inbox_inner_section">
          <div class="row">
            <div class="col-md-12">
              <div class="full padding_infor_info">
                <div class="mail-box">
                  <div class="inbox-head" style="height: 1200px;">
                    <table class="table customLable">
                      <thead class="table-dark">
                        <tr>
                          <th></th>
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
            
                          include "../DatabaseConfigurations/Lists.php";

                          $filterArray = [];

                          if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            if(isset($_POST['searchBtn'])){
                              
                              $firstName = $_POST["FirstName"];
                              $lastName = $_POST["LastName"];
                              $cnic = $_POST["CNIC"];
                              $email = $_POST["Email"];
                              
                              // sepcific
                              $filterArray = array(
                                "FirstName" => $firstName,
                                "LastName" => $lastName,
                                "CNIC" => $cnic,
                                "Email" => $email
                              );

                              // // global
                              // $filterArray = array(
                              //   "FirstName" => $firstName,
                              //   "LastName" => $firstName,
                              //   "CNIC" => $firstName,
                              //   "Email" => $firstName
                              // );





                            }

                            $employeeId = 0;
                            if(isset($_POST['deleteEmployee'])){
                              $employeeId = $_POST["deleteEmployee"];
                            }

                            if ($employeeId > 0) {
                              
                              DeleteById('Employee', $employeeId, 1);

                            }
                          }

                          PrepareEmployeeList($filterArray);
                        
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- table section -->
</div>

<?php
  include_once "../Layouts/Admin/footer.php"
?>