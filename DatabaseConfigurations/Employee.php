<?php
    include "DbFucntions.php";
    function PrepareEmployeeList()
    {
        $query = "SELECT * FROM employee WHERE Deleted = 0";
        $result = ExecutreMySqlQuery($query);
        if (count($result) > 0) {
            if ($result["Success"] == true) {
                if (mysqli_num_rows($result["Response"]) > 0) {
                    while ($row = mysqli_fetch_assoc($result["Response"])) {
                        echo
                            "<tr>
                                <td>".$row["FirstName"]."</td>
                                <td>".$row["LastName"]."</td>
                                <td>".$row["Email"]."</td>
                                <td>".$row["CNIC"]."</td>
                                <td>".$row["PhoneNumber"]."</td>
                                <td><button type='button' class='btn btn-danger'>Delete</button></td>
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
?>