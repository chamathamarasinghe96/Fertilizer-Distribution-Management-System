<?php require_once('includes/connection.php'); ?>

<?php
    
    session_start();
    $officerID = $_SESSION['userID'];
    $query = "SELECT OfficerID, CenterID, FName, LName FROM AGRICULTURAL_OFFICER WHERE OfficerID = '{$officerID}' LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($recordRow = mysqli_fetch_assoc($result)) {

        $userOfficerID = $recordRow['OfficerID'];
        $userCenterID = $recordRow['CenterID'];
        $userFName = $recordRow['FName'];
        $userLName = $recordRow['LName'];

        $msgViewUser = "Login as        {$userOfficerID} - {$userFName} {$userLName}        under Center - {$userCenterID}";

    }
    
    if (isset($_POST['btn_update'])) {

        $farmerID = $_POST['txtFarmerID'];
        $firstName = $_POST['txtFirstName'];
        $lastName = $_POST['txtLastName'];
        $address = $_POST['txtAddress'];
        $telNo = $_POST['txtTelNo'];
        $NIC = $_POST['txtNIC'];

        $query = "UPDATE FARMER SET FName = '{$firstName}', LName = '{$lastName}', Address = '{$address}', TelNo = '{$telNo}', NIC = '{$NIC}' WHERE FarmerID = '{$farmerID}'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            $msg2 = "Record updated successfully";
        } else {
            $msg2 = "Failed updating the record";
        }

    }

    if (isset($_POST['btn_save'])) {

        $farmerID = $_POST['txtFarmerID'];
        $firstName = $_POST['txtFirstName'];
        $lastName = $_POST['txtLastName'];
        $address = $_POST['txtAddress'];
        $telNo = $_POST['txtTelNo'];
        $NIC = $_POST['txtNIC'];

        $query = "INSERT INTO FARMER VALUES ('{$farmerID}', '{$firstName}', '{$lastName}', '{$address}', '{$telNo}', '{$NIC}')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            $msg2 = "New farmer added successfully";
        } else {
            $msg2 = "Failed adding new record";
        }

    }
    
    if (isset($_POST['btnAddNew'])) {
        
        $query = "SELECT * FROM FARMER";

        $result_set = mysqli_query($conn, $query);

        $farmerID = '';

        while ($record = mysqli_fetch_assoc($result_set)) {
            $farmerID = $record['FarmerID'];
        }

        $farmerID = "F" . str_pad(((int)(substr($farmerID, 1)) + 1), 3, '0', STR_PAD_LEFT);

    }

    if (isset($_POST['btnSearchID'])) {
        
        $NIC = $_POST['txtNIC'];
        
        $query = "SELECT * FROM FARMER WHERE NIC = '{$NIC}'";

        $resultRow = mysqli_query($conn, $query);

        if ($record = mysqli_fetch_assoc($resultRow)) {

            $farmerID = $record['FarmerID'];
            $firstName = $record['FName'];
            $lastName = $record['LName'];
            $address = $record['Address'];
            $telNo = $record['TelNo'];

        } else {
            $msg1 = "No such FarmerID exists";
        }

    }

?>



<?php include('includes/header.php'); ?>
    
    <form action="Farmers.php" method = "post">

        <h1>View Farmer Info</h1>
        <h4><?php echo $msgViewUser ?></h4><hr>
    
        <table>

            <tr>
                <td>NIC No : </td>
                <td>
                    <input type="text" name = "txtNIC" value = "<?php echo (isset($NIC)) ? $NIC : ''; ?>"></input>
                    <button name="btnSearchID" type="submit" value="HTML">SEARCH</button>
                    <label for="lblMsg1"><b><?php echo (isset($msg1)) ? $msg1 : ''; ?></b></label>
                </td>
            </tr>
            <tr>
                <td>Farmer ID : </td>
                <td>
                    <input type="text" name = "txtFarmerID" value = "<?php echo (isset($farmerID)) ? $farmerID : ''; ?>"></input>
                    <button name="btnAddNew" type="submit" value="HTML">ADD NEW</button>
                </td>
            </tr>
            <tr>
                <td>First Name : </td>
                <td><input type="text" name="txtFirstName" value = "<?php echo (isset($firstName)) ? $firstName : ''; ?>"></input></td>
            </tr>
            <tr>
                <td>Last Name : </td>
                <td><input type="text" name = "txtLastName" value = "<?php echo (isset($lastName)) ? $lastName : ''; ?>"></input></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><input type="text" name = "txtAddress" value = "<?php echo (isset($address)) ? $address : ''; ?>"></input></td>
            </tr>
            <tr>
                <td>Tel No : </td>
                <td><input type="text" name = "txtTelNo" value = "<?php echo (isset($telNo)) ? $telNo : ''; ?>"></input></td>
            </tr>
            
            <tr>
                <td> 
                </td>
            
                <td>
                    <button name="btn_update" type="submit" value="HTML">UPDATE</button>
                    <button name="btn_save" type="submit" value="HTML">SAVE NEW</button>
                    <label for="lblMsg2"><b><?php echo (isset($msg2)) ? $msg2 : ''; ?></b></label>
                </td>
            </tr>
            
        </table>

	</form> 

<?php include('includes/footer.php'); ?>

<?php mysqli_close($conn); ?>