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

    
?>