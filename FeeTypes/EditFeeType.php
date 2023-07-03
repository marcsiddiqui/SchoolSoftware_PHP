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
        <h2>Edit Fee Type</h2>
      </div>
  </div>
</div>
<!-- row -->
<div class="row">
  <!-- table section -->
  <div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
      <form method="POST">
        <button type="submit" style="float:right; margin-left: 5px;" class="btn btn-primary">Save Fee Type</button>
        <a href="http://localhost:82/sms/FeeTypes/FeeTypes.php" style="float:right" type="button" class="btn btn-secondary">Back to List</a>  
        <div class="full inbox_inner_section">
          
          <div class="row">
            <div class="col-md-12">
              <div class="full padding_infor_info">
                <div class="mail-box">
                  <div class="inbox-head" style="height: 550px;">

                    <?php

                      include "../DatabaseConfigurations/DbFucntions.php";

                      $feeTypeName = "";
                      $feeTypeNameError = "";

                      // need to get employee from database
                      if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        
                        $result = GetDataById("FeeType", $_GET["id"]);

                        if (count($result) > 0) {
                            if ($result["Success"] == true) {
                                if (mysqli_num_rows($result["Response"]) > 0) {
                                    while ($row = mysqli_fetch_assoc($result["Response"])) {
                                        $feeTypeName = $row["Name"];
                                    }
                                }
                                else {
                                    echo "<tr>
                                        <td colspan='4'>No Fee Types are found!</td>
                                    </tr>";
                                }
                            }
                        }
                      }

                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                        $feeTypeName = $_POST["Name"];

                        $feeTypeNameError = empty($feeTypeName) ? "Please enter Fee Name!" : "";

                        if (!empty($feeTypeName)) {
                          
                          $columnsArray = array(
                            "Name" => $feeTypeName
                          );

                          Update("FeeType", $columnsArray, $_GET["id"]);

                        }
                      }

                      ?>

                      <div class="form-group">
                        <label class="customLable">Fee Name:</label>
                        <input type="text" class="sr-input customWidth" id="Name" name="Name" value="<?php echo $feeTypeName; ?>">
                        <p class="errorMessage"><?php echo $feeTypeNameError; ?></p>
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