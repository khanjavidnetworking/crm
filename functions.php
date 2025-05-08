<?php
include "dbconnection.php";

function viewAlllleads()
{
    global $con;
    $view_leads = "SELECT * FROM leads where AM";
    $view_users_result = mysqli_query($con, $view_leads);
    if ($view_users_result) {
        while ($row_user = mysqli_fetch_assoc($view_users_result)) {
           $user_id = $row_user['id'];
           $user_name = $row_user['CN'];
           $user_password= $row_user['CNO'];
           $user_fristname = $row_user['AM'];
           $user_lead = $row_user['TL'];
           $user_lastname = $row_user['Description'];
           $user_email= $row_user['Date'];
?>
            <tr>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $user_name; ?></td>
               
                <td><?php echo $user_password; ?></td>
                <td><?php echo $user_fristname; ?></td>
                <td><?php echo $user_lead; ?></td>

                <td><?php echo $user_lastname; ?></td>
                <td><?php echo $user_email; ?></td>
                <!-- <td><?php echo $user_image; ?></td>
                <td><?php echo $user_role; ?></td>
                <td><?php echo $ransalt; ?></td> -->
                <?php
                echo
                '<td>
                    
                
                <button class="btn btn-primary"><a href="updatelead.php?update_lead=' . $user_id . ' " class="text-light">Approve</a></button></td><td>
                <button class="btn btn-primary"><a href="updatelead.php?update_lead=' . $user_id . ' " class="text-light">unApprove</a></button></td><td>    
                <button class="btn btn-primary"><a href="updatelead.php?update_lead=' . $user_id . ' " class="text-light">Edit</a></button></td><td>

             
                  <button class="btn btn-danger"><a onClick=\" javascript: return confirm("are you sure"); \"  href="deletelead.php?delete_user=' . $user_id . '" 
                  class="text-light">Delete</a></button>
                </td>'
                ?>
              
                 


            </tr>
            
<?php
        }
    }
}


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