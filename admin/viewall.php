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
    <!-- <h1 style="text-align:center" >View All Leads</h1> -->



    <!-- <div style="background: linear-gradient(to right, #003366, #3399ff); padding: 20px;">
    <h1 style="
        margin: 0;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 32px;
        text-align: center;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
    ">
        View All Leads
    </h1>
</div> -->

<!-- HEADER SECTION -->
<div style="
    background: linear-gradient(to right, #003366, #3399ff);
    color: white;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
">

    <!-- LEFT: Logo + AIPL CRM -->
    <div style="display: flex; align-items: center;">
        <img src="logo.jpeg" alt="Logo" style="height: 40px; margin-right: 10px;">
        <span style="font-size: 24px; font-weight: bold;">AIPL CRM</span>
    </div>

    <!-- CENTER: Page Title -->
    <div style="text-align: center; flex: 1;">
        <span style="font-size: 28px; font-weight: bold; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">
            View All Leads
        </span>
    </div>

    <!-- RIGHT: Current Date & Time -->
    <div style="text-align: right; font-size: 14px;">
        <span id="datetime"></span>
    </div>
</div>

<!-- JAVASCRIPT FOR LIVE DATE & TIME -->
<script>
function updateDateTime() {
    const now = new Date();
    const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
    const dateStr = now.toLocaleDateString('en-US', options);
    const timeStr = now.toLocaleTimeString('en-US');
    document.getElementById('datetime').textContent = dateStr + ' | ' + timeStr;
}
setInterval(updateDateTime, 1000);
updateDateTime();
</script>


    <table class="table table-bordered table"  >
        <div class="form-group">
            <thead>
                <tr>
                    <td>customer ID</td>
                    <td>customer Name</td>
                    <td>customer Number</td>
                    <td>Account Manager</td>
                    <td>Type Of Lead</td>
                    <td>Description</td>
                    <!-- <td>Post_content</td> -->
                     
                    <td>Date</td>
                    <!-- <td>Approve</td> -->
                    <!-- <td>UnApprove</td> -->
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
                  <!-- <?php  echo '<h5 ><a href="../leads.php">Add New Lead</a></h5>' ?>  -->
                  <!-- <div style="text-align: left; margin: 20px;">
    <a href="../leads.php"
       style="background-color: #f39c12; color: white; padding: 10px 20px; 
              text-decoration: none; border: none; border-radius: 5px; 
              display: inline-block;">
        Add New Lead
    </a>
</div> -->
<a href="../leads.php" style="
    display: inline-block;
    padding: 8px 16px;
    background-color: #17a2b8;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
">
    Add New Lead
</a>


<form action="search.php" method="GET" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">
    <!-- <input type="text" name="customer_name" placeholder="Customer Name" 
        style="padding: 6px; margin-right: 5px;">
    <input type="text" name="customer_number" placeholder="Customer Number" 
        style="padding: 6px; margin-right: 5px;">
    <input type="text" name="account_manager" placeholder="Account Manager" 
        style="padding: 6px; margin-right: 5px;">
    <select name="type_of_lead" style="padding: 6px; margin-right: 5px;">
        <option value="">Type of Lead</option>
        <option value="Hot">Hot</option>
        <option value="Warm">Warm</option>
        <option value="Cold">Cold</option>
    </select>
    <input type="text" name="description" placeholder="Description" 
        style="padding: 6px; margin-right: 5px;">
    <input type="date" name="lead_date" 
        style="padding: 6px; margin-right: 5px;"> -->

    <!-- 🔍 SEARCH Button -->
    <button type="submit" style="
        padding: 8px 16px; 
        background-color: #007bff; 
        color: white; 
        border: none; 
        border-radius: 4px; 
        cursor: pointer;
    ">
        Search
    </button>
</form>
<!-- THis is Home page redirection from here   -->

<a href="home.php" style="
    display: inline-block;
    padding: 8px 16px;
    background-color: #17a2b8;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
">
    Home
</a>
<a href="import_file.php" style="
    display: inline-block;
    padding: 8px 16px;
    background-color: #2196F3;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
    margin-left:700px;
">
    Import File
</a>
<a href="export_csv.php" style="
    display: inline-block;
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    margin: 5px;
    margin-left:5px;
">
    Export File
</a>



                  <!-- <div style="text-align: right; margin: 20px;">
    <a href="export_csv.php" 
       style="background-color: #4CAF50; color: white; padding: 10px 20px; 
              text-decoration: none; border-radius: 5px; border: none; 
              display: inline-block;">
        Download CSV
    </a>
</div> -->


<!-- this is also important but i keep  here         -->
 <!-- Import Button -->

<!-- <div style="text-align: right; margin: 20px;">
    
    <a href="import_file.php" 
       style="background-color: #2196F3; color: white; padding: 10px 20px; 
              text-decoration: none; border-radius: 5px; border: none; 
              display: inline-block; margin-right: 10px;">
        Import File
    </a> -->

    <!-- Export Button -->
    <!-- <a href="export_csv.php" 
       style="background-color: #4CAF50; color: white; padding: 10px 20px; 
              text-decoration: none; border-radius: 5px; border: none; 
              display: inline-block;">
        Export CSV
    </a>
</div> -->
           
            </tbody>
        </div>

    </table>

    <!-- Page count at all pages     -->
     
    


</body>
</html>