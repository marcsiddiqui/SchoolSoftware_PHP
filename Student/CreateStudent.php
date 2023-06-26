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
        <h2>Edit Employee</h2>
      </div>
  </div>
</div>
<!-- row -->
<div class="row">
  <!-- table section -->
  <div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
      <form method="POST">
        <button type="submit" style="float:right; margin-left: 5px;" class="btn btn-primary">Save Student</button>
        <a href="http://localhost:82/sms/Student/Student.php" style="float:right" type="button" class="btn btn-secondary">Back to List</a>  
        <div class="full inbox_inner_section">
          
          <div class="row">
            <div class="col-md-12">
              <div class="full padding_infor_info">
                <div class="mail-box">
                  <div class="inbox-head" style="height: 550px;">

                    <?php

                      include "../DatabaseConfigurations/DbFucntions.php";

                      $fullName = $fatherName = $b_Form = "";
                      $fullNameError = $fatherNameError = $b_FormError = "";

                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                        $fullName = $_POST["FullName"];
                        $fatherName = $_POST["FatherName"];
                        $b_Form = $_POST["B_Form"];

                        $fullNameError = empty($fullName) ? "Please enter Full Name!" : "";
                        $fatherNameError = empty($fatherName) ? "Please enter Father Name!" : "";
                        $b_FormError = empty($b_Form) ? "Please enter B-Form!" : "";


                        if (!empty($fullName) && !empty($fatherName) && !empty($b_Form)) {
                          
                          $columnsArray = array(
                            "FullName" => $fullName,
                            "FatherName" => $fatherName,
                            "B_Form" => $b_Form
                          );

                          Insert("Student", $columnsArray);
                        }
                      }

                    ?>

                    <div class="form-group">
                      <label class="customLable">Full Name:</label>
                      <input type="text" class="sr-input customWidth" id="FullName" name="FullName" value="<?php echo $fullName; ?>">
                      <p class="errorMessage"><?php echo $fullNameError; ?></p>
                    </div>
                    <div class="form-group">
                      <label class="customLable">Father Name:</label>
                      <input type="text" class="sr-input customWidth" id="FatherName" name="FatherName" value="<?php echo $fatherName; ?>">
                      <p class="errorMessage"><?php echo $fatherNameError; ?></p>
                    </div>
                    <div class="form-group">
                      <label class="customLable">B_Form:</label>
                      <input type="text" class="sr-input customWidth" id="B_Form" name="B_Form" value="<?php echo $b_Form; ?>">
                      <p class="errorMessage"><?php echo $b_FormError; ?></p>
                    </div>
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