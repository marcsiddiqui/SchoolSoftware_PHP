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

<div class="row column4 graph">
  <!-- tab style 2 -->
  <div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
      <div class="full graph_head">
          <div class="heading1 margin_0">
            <h2>Edit Employee</h2>
            <button type="submit" style="float:right; margin-left: 5px;" class="btn btn-primary">Save Student</button>
            <a href="http://localhost:82/sms/Student/Student.php" style="float:right" type="button" class="btn btn-secondary">Back to List</a>
          </div>
      </div>
      <div class="full inner_elements">
        <div class="row">
          <div class="col-md-12">
            <div class="tab_style2">
              <div class="tabbar padding_infor_info">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home_s2" role="tab" aria-controls="nav-home_s2" aria-selected="true">Info</a>
                        <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile_s2" role="tab" aria-controls="nav-profile_s2" aria-selected="false">Fees</a>
                        <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-contact_s2" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Parents</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent_2">
                    <div class="tab-pane fade show active" id="nav-home_s2" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="full padding_infor_info">
                          <div class="mail-box">
                            <div class="inbox-head" style="height: 550px;">

                              <?php

                                include "../DatabaseConfigurations/DbFucntions.php";

                                $fullName = $fatherName = $b_Form = "";
                                $fullNameError = $fatherNameError = $b_FormError = "";

                                // need to get employee from database
                                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                  
                                  $result = GetDataById("Student", $_GET["id"]);

                                  if (count($result) > 0) {
                                    if ($result["Success"] == true) {
                                      if (mysqli_num_rows($result["Response"]) > 0) {
                                          while ($row = mysqli_fetch_assoc($result["Response"])) {
                                              $fullName = $row["FullName"];
                                              $fatherName = $row["FatherName"];
                                              $b_Form = $row["B_Form"];
                                          }
                                      }
                                      else {
                                          echo "<tr>
                                              <td colspan='4'>No Students are found!</td>
                                          </tr>";
                                      }
                                    }
                                  }
                                }

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

                                    Update("Student", $columnsArray, $_GET["id"]);

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
                    <div class="tab-pane fade" id="nav-profile_s2" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et 
                          quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos 
                          qui ratione voluptatem sequi nesciunt.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-contact_s2" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et 
                          quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos 
                          qui ratione voluptatem sequi nesciunt.
                        </p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include_once "../Layouts/Admin/footer.php"
?>