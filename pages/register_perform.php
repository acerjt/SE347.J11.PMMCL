<?php
include('../config/dbconfig.php');
if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM tbl_customer WHERE username='$username'";
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "taken";
    } else {
        echo 'not_taken';
    }
    exit();
}
if (isset($_POST['email_check'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM tbl_customer WHERE email='$email'";
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo "taken";
    } else {
        echo 'not_taken';
    }
    exit();
}
if (isset($_POST['getdistrict'])) {
    $provinceid = "0".$_POST['provinceid'];   // department id

    $sql = "SELECT maqh,name FROM devvn_quanhuyen WHERE matp= " . $provinceid;

    $result = mysqli_query($conn, $sql);

    $district_arr = array();

    while ($row = mysqli_fetch_array($result)) {
        $districtid = $row['maqh'];
        $name = $row['name'];

        $district_arr[] = array("id" => $districtid, "name" => $name);
    }

    // encoding array to json format
    echo json_encode($district_arr);

    exit();
}
if (isset($_POST['getward'])) {
    $districtid = "0".$_POST['districtid'];   // department id

    $sql = "SELECT xaid,name FROM devvn_xaphuongthitran WHERE maqh= " . $districtid;

    $result = mysqli_query($conn, $sql);

    $ward_arr = array();

    while ($row = mysqli_fetch_array($result)) {
        $wardid = $row['xaid'];
        $name = $row['name'];

        $ward_arr[] = array("id" => $wardid, "name" => $name);
    }

    // encoding array to json format
    echo json_encode($ward_arr);

    exit();
}
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = "0".$_POST['phonenumber'];
    $province = "0".$_POST['province'];
    $district = "0".$_POST['district'];
    $ward = "0".$_POST['ward'];
    $sql = "SELECT * FROM tbl_customer WHERE username='$username'";
    $results = mysqli_query($conn, $sql);

    if (mysqli_num_rows($results) > 0) {
        echo "exists";
        exit();
    } else {
        $query = "SELECT `AUTO_INCREMENT`
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = '$csdl'
        AND   TABLE_NAME   = 'tbl_customer';";
        $getcurrentcustomerid = mysqli_query($conn, $query);
        $currentcustomerid = mysqli_fetch_array($getcurrentcustomerid);
        $currentcustomerid = $currentcustomerid['AUTO_INCREMENT'];

        $query = "INSERT INTO tbl_customer (username, password, firstname, lastname, email, phone_number ) 
  	       	VALUES ('$username', '" . md5($password) . "','$firstname', '$lastname', '$email', '$phonenumber')";
        $results = mysqli_query($conn, $query);

        if ($results) {
         
           
            $query = "INSERT INTO tbl_customer_address (customerid, matp, maqh, mapx ) 
  	       	VALUES ('$currentcustomerid', '$province','$district', '$ward');";
            $results = mysqli_query($conn, $query);
            if($results) {
                echo 'Success!';
            }
            else {
                $sql = "delete from tbl_customer where id = '" . $currentcustomerid . "'";
                 $results = mysqli_query($conn, $query);
                 echo 'Fail!';
            }
        }
        else echo 'Fail!';


        
        exit();
    }
}
