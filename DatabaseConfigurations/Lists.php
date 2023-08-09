<?php
    include "DbFucntions.php";

    function PrepareEmployeeList($filter_col_val)
    {
        $query = "SELECT * FROM employee WHERE Deleted = 0";

        $length = count($filter_col_val);
        $loopCount = 1;

        foreach ($filter_col_val as $key => $value) {

            if (!empty($value)) {

                // $query = $query . " OR ";   // global search
                $query = $query . " AND ";   // sepcific search
                
                if (gettype($value) == "string") {
                    $query = $query . " " . $key . " like '%" . $value . "%' ";
                }
                else {
                    $query = $query . " " . $key . " = " . $value . " ";
                }
                
            }

            $loopCount++;

        }

        echo $query;

        $result = ExecutreMySqlQuery($query);
        if (count($result) > 0) {
            if ($result["Success"] == true) {
                if (mysqli_num_rows($result["Response"]) > 0) {
                    while ($row = mysqli_fetch_assoc($result["Response"])) {
                        echo
                            "<tr>
                                <td><img height='75px' width='75px' src='http://localhost:82/sms/".$row["ImagePath"]."' /></td>
                                <td>".$row["FirstName"]."</td>
                                <td>".$row["LastName"]."</td>
                                <td>".$row["Email"]."</td>
                                <td>".$row["CNIC"]."</td>
                                <td>".$row["PhoneNumber"]."</td>
                                <td>
                                    <a href='http://localhost:82/sms/hrm/EditEmployee.php?id=".$row["Id"]."' class='btn btn-warning' type='button'>Edit</a>
                                    <button name='deleteEmployee' type='submit' value='".$row["Id"]."' class='btn btn-danger'>Delete</button>
                                </td>
                            </tr>";
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

    function PrepareStudentList()
    {
        $query = "SELECT * FROM Student";
        $result = ExecutreMySqlQuery($query);
        if (count($result) > 0) {
            if ($result["Success"] == true) {
                if (mysqli_num_rows($result["Response"]) > 0) {
                    while ($row = mysqli_fetch_assoc($result["Response"])) {
                        echo
                            "<tr>
                                <td>".$row["FullName"]."</td>
                                <td>".$row["FatherName"]."</td>
                                <td>".$row["B_Form"]."</td>
                                <td>
                                    <a href='http://localhost:82/sms/student/EditStudent.php?id=".$row["Id"]."' class='btn btn-warning' type='button'>Edit</a>
                                    <button name='deleteStudent' type='submit' value='".$row["Id"]."' class='btn btn-danger'>Delete</button>
                                </td>
                            </tr>";
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

    function PrepareFeeTypeList()
    {
        $query = "SELECT * FROM FeeType";
        $result = ExecutreMySqlQuery($query);
        if (count($result) > 0) {
            if ($result["Success"] == true) {
                if (mysqli_num_rows($result["Response"]) > 0) {
                    while ($row = mysqli_fetch_assoc($result["Response"])) {
                        echo
                            "<tr>
                                <td>".$row["Name"]."</td>
                                <td>
                                    <a href='http://localhost:82/sms/FeeTypes/EditFeeType.php?id=".$row["Id"]."' class='btn btn-warning' type='button'>Edit</a>
                                    <button name='deleteFeeType' type='submit' value='".$row["Id"]."' class='btn btn-danger'>Delete</button>
                                </td>
                            </tr>";
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
    
    function PrepareProductMenu()
    {
        $query = "SELECT * FROM employee WHERE Deleted = 0 ORDER BY Id DESC";
        $result = ExecutreMySqlQuery($query);
        if (count($result) > 0) {
            if ($result["Success"] == true) {
                if (mysqli_num_rows($result["Response"]) > 0) {

                    $createMainBox = true;

                    $innerProductCount = 0;

                    $activeApplied = "active";

                    $html = "";

                    while ($row = mysqli_fetch_assoc($result["Response"])) {

                        // opening a main box
                        if ($createMainBox) {
                            $html = $html . 
                            "
                                <div class='carousel-item ".$activeApplied."'>
                                    <div class='container'>
                                        <h1 class='fashion_taital'>Man & Woman Fashion</h1>
                                        <div class='fashion_section_2'>
                                            <div class='row'>
                            ";

                            $createMainBox = false;
                        }

                        $activeApplied = "";

                        // putting products 1 by 1 in main box
                        $html = $html .
                        "
                            <div class='col-lg-4 col-sm-4'>
                                <div class='box_main'>
                                <h4 class='shirt_text'>".$row["FirstName"]."</h4>
                                <p class='price_text'>Price  <span style='color: #262626;'>$ ".$row["Password"]."</span></p>
                                <div class='tshirt_img'><img src='http://localhost:82/sms/".$row["ImagePath"]."'></div>
                                    <div class='btn_main'>
                                        <div class='buy_bt'><a href='#'>Buy Now</a></div>
                                        <div class='seemore_bt'><a href='#'>See More</a></div>
                                    </div>
                                </div>
                            </div>
                        ";

                        $innerProductCount = $innerProductCount + 1;

                        // if we have added 3 products then close the main the box
                        if ($innerProductCount == 3) {
                            $html = $html .
                            "
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";

                            $createMainBox = true;
                            $innerProductCount = 0;
                        }
                    }

                    echo $html;
                }
                else {
                    
                }
            }
        }
    }
?>