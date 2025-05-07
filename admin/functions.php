<?php
include "dbconnection.php";


// 0131040100029471 
function viewAlllleads()
{
    global $con;
    $view_leads = "SELECT * FROM leads ";
    $view_users_result = mysqli_query($con, $view_leads);
    if ($view_users_result) {
        while ($row_user = mysqli_fetch_assoc($view_users_result)) {
           $user_id = $row_user['id'];
           $user_name = $row_user['CN'];
           $user_password= $row_user['CNO'];
           $user_fristname = $row_user['AM'];
           $user_lastname = $row_user['Description'];
           $user_email= $row_user['Date'];
?>
            <tr>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $user_name; ?></td>
               
                <td><?php echo $user_password; ?></td>
                <td><?php echo $user_fristname; ?></td>

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

    global $connection;
    $successMessage = '';
    if (isset($_POST['create_user'])) {
        // echo $_POST['comment_author']; this line is for testing 


        $user_name = $_POST['username'];
        $user_password = $_POST['password'];
        $user_fristname = $_POST['userfname'];
        $user_fristname = $_POST['userfname'];
        $user_lastname = $_POST['userlname'];
        $user_email = $_POST['email'];
        $user_image = $_POST['user_image'];
        $user_role = $_POST['role'];
        $ransalt = $_POST['ransalt'];
        // $comment_date = $_POST['date'];

        $update_query = "INSERT INTO users (user_name,user_password,user_fristname,user_lastname,user_email,user_image,user_role,ransalt )
            VALUES ('$user_name','$user_password','$user_fristname','$user_lastname','$user_email','$user_role','$user_image','$ransalt')";

        $result_update_comment = mysqli_query($connection, $update_query);
        if ($result_update_comment) {
            echo '<div class="alert alert-success" role="alert">
                 <h4 class="alert-heading">Well done!</h4>
                 <hr>
                 <h3 class="text-aling:center">Data has been uploaded successfully</h3>
                
                </div>';
            header("location:view_all_users.php");
        } else {
            die("Failed to comment" . mysqli_error($connection));
        }
    }
}






function approveusers()
{
    global $con;
    // $id=$_GET['approve'];

    if (isset($_GET['admin_role'])) {

        $approve = $_GET['admin_role'];

        $admin_query = "UPDATE users SET user_role= 'admin' WHERE user_id =$approve";

        $result_update_user = mysqli_query($con, $admin_query);
        if ($result_update_user) {
            header("location:view_all_users.php");
        } else {
            echo "something is wrong";
        }
    }



    // some part is also updated in edit_comment.php
}


function unapproveusers()
{
    global $connection;
    // $id=$_GET['approve'];

    if (isset($_GET['sub_role'])) {

        $unapprove = $_GET['sub_role'];

        $sub_query = "UPDATE users SET user_role= 'subscriber' WHERE user_id =$unapprove";

        $result_update_sub_user = mysqli_query($connection, $sub_query);
        if ($result_update_sub_user) {
            header("location:view_all_users.php");
        } else {
            echo "something is wrong";
        }
}
}

function deleteLead()
{
    global $con;

    if (isset($_GET['delete_user'])) {

        $delete_user = $_GET['delete_user'];
        $sql_delete = "DELETE FROM leads WHERE id = $delete_user";
        $result_delete = mysqli_query($con, $sql_delete);
        if ($result_delete) {
            header("location:viewall.php");
        } else {
            die("try again " . mysqli_error($con));
        }
    }
}



function updateUser(){
    // this update function is not involved for edit user page full server coding has been updated there
    // so follow that code only this code is only for BACKUP. Thanks
    global $connection;
    // $id =$_GET['update_user'];
    if(isset($_GET['update_user'])){
        $id=$_GET['update_user'];
    
        $query = "SELECT * FROM users WHERE user_id =$id ";
        $result = mysqli_query($connection,$query);
        if($result){
          while($rowupdate = mysqli_fetch_assoc($result)){
              $user_name = $rowupdate['user_name'];
              $user_password = $rowupdate['user_password'];
              // $user_fristname = $rowupdate['user_fristname'];
              $user_fristname = $rowupdate['user_lastname'];
              $user_lastname = $rowupdate['user_lastname'];
              $user_email = $rowupdate['user_email'];
              $user_image = $rowupdate['user_image'];
              $user_role = $rowupdate['user_role'];
              $ransalt = $rowupdate['ransalt'];
      
          }
      }
    
    }

// upper case we are fetching the Data from Data Base Lower part we are updating the Data in DataBase.

    if (isset($_POST['update_user'])) {
    
    
        $user_name = $_POST['username'];
        $user_password = $_POST['password'];
        $user_fristname = $_POST['userfname'];
        $user_fristname = $_POST['userfname'];
        $user_lastname = $_POST['userlname'];
        $user_email = $_POST['email'];
        $user_image = $_POST['user_image'];
        $user_role = $_POST['role'];
        $ransalt = $_POST['ransalt'];
        // $comment_date = $_POST['date'];
    
        $update_query = "UPDATE users SET  user_name ='$user_name',user_password='$user_password',
            user_fristname='$user_fristname',user_lastname='$user_lastname',user_email='$user_email',user_image='$user_image',
            user_role='$user_role',ransalt='$ransalt' WHERE user_id=$id ";
    
        $result_update_user = mysqli_query($connection, $update_query);
        if ($result_update_user) {
            echo '<div class="alert alert-success" role="alert">
                 <h4 class="alert-heading">Well done!</h4>
                 <hr>
                 <h3 class="text-aling:center">Data has been uploaded successfully</h3>
                
                </div>';
            header("location:view_all_users.php");
        } else {
            die("Failed to comment" . mysqli_error($connection));
        }
    }
}







?>
