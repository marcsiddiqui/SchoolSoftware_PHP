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
        <h2>Fee Types List</h2>
      </div>
  </div>
</div>
<!-- row -->
<div class="row">
  <!-- table section -->
  <div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
      <form method="POST">
        <a href="http://localhost:82/sms/FeeTypes/CreateFeeType.php" class="btn btn-primary" type="button">Add New Fee Type</a>
        <div class="full inbox_inner_section">
          <div class="row">
            <div class="col-md-12">
              <div class="full padding_infor_info">
                <div class="mail-box">
                  <div class="inbox-head" style="height: 550px;">
                    <table class="table customLable">
                      <thead class="table-dark">
                        <tr>
                          <th>Fee Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
            
                          include "../DatabaseConfigurations/Lists.php";

                          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $feeTypeId = $_POST["deleteFeeType"];

                            if ($feeTypeId > 0) {
                              
                              DeleteById('FeeType', $feeTypeId, 1);

                            }
                          }

                          PrepareFeeTypeList();
                        
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