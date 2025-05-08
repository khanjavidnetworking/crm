<?php
// include("header.php");
include "dbconnection.php";
include "functions.php";
// addlead();



if (isset($_POST['create_lead'])) {
    // echo $_POST['comment_author']; this line is for testing 


    $CN = $_POST['cname'];
    $CNO = $_POST['cnumber'];
    $AM = $_POST['accountm'];
    $TL = $_POST['TL'];
    $Description = $_POST['desc'];
    $Date = date('y-m-d ');
    echo $Date;
   
    // $comment_date = $_POST['date'];

    $update_query = "INSERT INTO leads ( CN, CNO, AM,TL, Description,Date) 
    VALUES ('$CN','$CNO','$AM','$TL','$Description','$Date')";

    $result_update_comment = mysqli_query($con, $update_query);
    if ($result_update_comment) {
        echo "data Submitted Successfully";
        echo '<div class="alert alert-success" role="alert">
             <h4 class="alert-heading">Well done!</h4>
             <hr>
             <h3 class="text-aling:center">Data has been uploaded successfully</h3>
            
            </div>';
        header("location:dashboard.php");
        echo "data Submitted Successfully By Sanjay";

    } else {
        die("Failed to comment" . mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lead.css">
    <title>Document</title>
</head>
<body>
    <!-- <h1 style="text-align:center">This is leads Sections</h1> -->
    <div class="container">
    <h1 style="text-align:center" >Add New Lead</h1>
    <table class="table table-bordered table"  >
        <div class="form-group">
            <thead>
                <tr>
                    <td>customer ID</td>
                    <td>customer Name</td>
                    <td>customer Number</td>
                    <td>Account Manager</td>
                    <td>Type of Lead</td>
                    <td>Description</td>
                    <!-- <td>Post_content</td> -->
                     
                    <td>Date</td>
                    <td>Approve</td>
                    <td>UnApprove</td>
                    <td>Edit</td>
                    
                    
                    <!-- <td>Image</td> -->
                    <!-- <td>Role</td> -->
                    <!-- <td>ransalt</td> -->
                    <!-- <td>admin</td> -->
                    <!-- <td>Subscriber</td> -->
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
           
            addlead();
                ?>
                  <?php  echo '<h5 ><a href="../leads.php">Add New Lead</a></h5>' ?>

           
            </tbody>
        </div>


    
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="text" class="form-label">Customer Name</label>
        <input type="text" class="form-control" name="cname" aria-describedby="emailHelp" required=" ">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Customer contact Number</label>
        <input type="number " class="form-control" name="cnumber"  aria-describedby="emailHelp" maxlength="10" required=" ">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Account Manager</label>
        <input type="text" class="form-control" name="accountm" aria-describedby="emailHelp" required=" ">
    </div>
    <!-- <div class="mb-3">
        <label for="text" class="form-label">Type Of Lead</label>
        <option value="">Select</option>
        <input type="dropdown " name="" id="">
    </div> -->
    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Leads</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="TL" class="form-control select" required=" ">
                                                <option value="">Choose your Type of Lead</option>
                                                <option value="Hot">Important Hot</option>
                                                <option value="Warm">Urgent Warm</option>
                                                <option value="Cold">Cold </option>
                                                <option value="Follow-up">Follow-up</option>
                                            </select>
                                           </div>
                                    </div>
    <!-- <label>Type of Lead:
        <select name="lead_type[]">
          <option value="Hot">Hot</option>
          <option value="Warm">Warm</option>
          <option value="Cold">Cold</option>
          <option value="Follow-up">Follow-up</option>
        </select>
      </label> -->
    <div class="mb-3">
        <label for="text" class="form-label">Description</label>
        <input type="text" class="form-control" name="desc" aria-describedby="emailHelp" required=" ">
    </div>
    
   
    <div class="mb-3">
        <label for="text" class="form-label">Lead Date</label>
        <input type="date" class="form-control" name="date" aria-describedby="emailHelp" required=" ">
    </div>
    
    <button type="submit" name="create_lead" value="create_lead" 
    class="btn btn-primary">add Lead</button>
</form>
</div>
</body>
</html>