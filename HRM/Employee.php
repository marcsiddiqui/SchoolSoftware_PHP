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
        <a href="http://localhost:82/sms/hrm/CreateEmployee.php" class="btn btn-primary" type="button">Add New Employee</a>
        <div class="full inbox_inner_section">
          <div class="row">
            <div class="col-md-12">
              <div class="full padding_infor_info">
                <div class="mail-box">
                  <div class="inbox-head" style="height: 550px;">
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