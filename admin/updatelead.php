<?php

// include "../includesadmin/header.php";
include "dbconnection.php";
include "functions.php";
approveusers();
unapproveusers();

// updateUser();

if(isset($_GET['update_lead'])){
    $id=$_GET['update_lead'];

    $query = "SELECT * FROM leads WHERE id =$id ";
    $result = mysqli_query($con,$query);
    if($result){
      while($rowupdate = mysqli_fetch_assoc($result)){
          $user_name = $rowupdate['CN'];
          $user_password = $rowupdate['CNO'];
          // $user_fristname = $rowupdate['user_fristname'];
          $user_fristname = $rowupdate['AM'];
          $user_lastname = $rowupdate['TL'];
          $user_email = $rowupdate['Description'];
          $user_image = $rowupdate['Date'];
        //   $user_role = $rowupdate['user_role'];
        //   $ransalt = $rowupdate['ransalt'];
  
      }
  }

}
// upper case we are fetching the Data from Data Base Lower part we are updating the Data in DataBase. 


if (isset($_POST['update_lead'])) {
    
    
    $user_name = $_POST['username'];  //Customer Name
    $user_password = $_POST['password']; //customer Number
    $user_fristname = $_POST['userfname'];  //account manager
    // $user_fristname = $_POST['userfname'];
    // $user_lastname = $_POST['userlname'];
    $user_email = $_POST['email'];  //description
    $user_image = $_POST['user_image'];  //date
    // $user_role = $_POST['role'];
    // $ransalt = $_POST['ransalt'];
    // $comment_date = $_POST['date'];

    // $query_encrpt_update = "SELECT ransalt FROM users";
    //     $enc_users_pass_update = mysqli_query($connection,$query_encrpt_update);
    //     if(!$enc_users_pass_update){
    //         die("Query Failed".mysqli_error($connection));
    //     }
    //     $row_enc = mysqli_fetch_array($enc_users_pass_update);
    //     $salt_fetch= $row_enc['ransalt'];
        // $crp_password = crypt($user_password,$ransalt); just disabled 7/5/25

    $update_query = "UPDATE leads SET  CN ='$user_name', CNO='$user_password',
        AM='$user_fristname', Description='$user_email',Date='$user_image' WHERE id = $id ";

    $result_update_user = mysqli_query($con, $update_query);
    if ($result_update_user) {
        echo '<div class="alert alert-success" role="alert">
             <h4 class="alert-heading">Well done!</h4>
             <hr>
             <h3 class="text-aling:center">Data has been uploaded successfully</h3>
            
            </div>';
        header("location:viewall.php");
    } else {
        die("Failed to comment" . mysqli_error($connection));
    }
}




       
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>

<body>
    <?php
    updateUser();
    ?>
    <div class="container">
    
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="text" class="form-label">Customer Name</label>
                <input type="text" class="form-control" name="username" 
                value="<?php echo $user_name; ?>" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Customer Number</label>
                <input type="text" class="form-control" name="password"  
                value="<?php echo $user_password; ?>" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Accont Manager</label>
                <input type="text" class="form-control" name="userfname" value="<?php echo $user_fristname; ?>"
                 aria-describedby="emailHelp">
            </div>
           
              
            <div class="mb-3">
                <label for="text" class="form-label">Description</label>
                <input type="Text" class="form-control" name="email"
                value="<?php echo $user_email; ?>" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Date</label>
                <input type="date" class="form-control" name="user_image"
                value="<?php echo $user_image; ?>" aria-describedby="emailHelp">
            </div>
            
               
           
            
            <button type="submit" name="update_lead" value="update_lead" class="btn btn-primary">update Lead</button>
        </form>
    </div>
</body>

</html>


