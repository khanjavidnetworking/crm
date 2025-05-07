<?php
include "dbconnection.php";


function addlead()
{

    global $con;
    $successMessage = '';
    if (isset($_POST['create_lead'])) {
        // echo $_POST['comment_author']; this line is for testing 


        $CN = $_POST['cname'];
        $CNO = $_POST['cnumber'];
        $AM = $_POST['accountm'];
        // $TL = $_POST[''];
        $Description = $_POST['desc'];
        // $Date = $_POST['ldate'];
       
        // $comment_date = $_POST['date'];

        $update_query = "INSERT INTO leads ( CN, CNO, AM, TL,Description) 
        VALUES ('$CN','$CNO','$AM','$Description')";

        $result_update_comment = mysqli_query($con, $update_query);
        if ($result_update_comment) {
            echo '<div class="alert alert-success" role="alert">
                 <h4 class="alert-heading">Well done!</h4>
                 <hr>
                 <h3 class="text-aling:center">Data has been uploaded successfully</h3>
                
                </div>';
            header("location:leads.php");
        } else {
            die("Failed to comment" . mysqli_error($con));
        }
    }
}
?>