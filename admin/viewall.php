<?php
include "functions.php";
// include "../includesadmin/header.php";
include "dbconnection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
     crossorigin="anonymous"></script>
    <title>VIEW ALL Leads</title>
</head>
<body>
    <h1 style="text-align:center" >View All Leads</h1>
    <table class="table table-bordered table"  >
        <div class="form-group">
            <thead>
                <tr>
                    <td>customer ID</td>
                    <td>customer Name</td>
                    <td>customer Number</td>
                    <td>Account Manager</td>
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
           
            viewAlllleads();
                ?>
                  <?php  echo '<h5 ><a href="../leads.php">Add New Lead</a></h5>' ?>

           
            </tbody>
        </div>

    </table>
    


</body>
</html>