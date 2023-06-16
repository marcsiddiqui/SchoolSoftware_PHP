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

    function DeleteEmployee($employeeId)
    {
        // $query = "DELETE FROM Employee WHERE Id = " . $employeeId;
        $query = "UPDATE Employee SET Deleted = 1 WHERE Id = " . $employeeId;
        $result = ExecutreMySqlQuery($query);
    }
?>