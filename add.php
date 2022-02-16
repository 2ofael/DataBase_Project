<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $address = (!empty($_POST['address'])) ? $_POST['address'] : '';
    $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
    $phoneNumber = (!empty($_POST['phoneNumber'])) ? $_POST['phoneNumber'] : '';
    $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';

    if (!empty($id)) {
        // update the record
        $stu_query = "UPDATE `book` SET first_name='" . $first_name . "', last_name='" . $last_name . "',address='" . $address . "',email= '" . $email . "', phoneNumber='" . $phoneNumber . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `book` (first_name, last_name, address,email, phoneNumber) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $address . "', '" . $email . "', '" . $phoneNumber . "' )";
        $msg = "add";
    }

    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:/crud/index.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $stu_id = $_GET['id'];
    $stu_query = "SELECT * FROM `book` WHERE id='" . $stu_id . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $first_name = $results[1];
    $last_name = $results[2];
    $address = $results[3];
    $email = $results[4];
    $phoneNumber = $results[5];

} else {
    $first_name = "";
    $last_name = "";
    $address = "";
    $email = "";
    $phoneNumber = "";
    $stu_id = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
   <?php include 'partial/nav.php';?>

    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-7">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class="form-group row">
          
               
            <label for="address" class="col-sm-3 col-form-label">address</label>
                <div class="col-sm-7">
                <input type="address" value="<?php echo $address; ?>" name="address" class="form-control" id="address" placeholder="address">
                </div>
            
            
              
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>


            <div class="form-group row">
            <label for="phoneNumber" class="col-sm-3 col-form-label">Phone Number</label>
           <div class="col-sm-7">

                <input type="Phone Number" value="<?php echo $phoneNumber; ?>" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Phone Number">



             
              </div> 
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="student_id" value="<?php echo $stu_id; ?>">
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>