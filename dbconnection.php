<?php
$con=mysqli_connect("localhost", "root", "", "crm");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}else{
    echo"Successfully connected verified by Khan javid";
}

?>
