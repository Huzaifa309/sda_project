<?php
include("config.php");
include("session.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


?>

<html>

   <head>
      <title>myLexus | Management</title>
      
<style type = "text/css">
    img {
        display: block;
        margin: 0 auto;
    }
    
        h1,h2 {
        text-align: center;
    }
</style>
      
<img src="logo.png" alt="Lexus Logo" width="500" height="150">
   </head>

    <h1>myLexus Management</h1>
     <h2>Welcome, Administrator! | <a href = "logout.php">Sign Out</a></h1>
 
     
     <button type="button" style="margin:auto;display:block" onclick="addNewEmployee()">New Employee</button>
     <button type="button" style="margin:auto;display:block" onclick="deleteEmployee()">Delete Employee</button>
     
   

   
   <body>
       <?php
       

       
    
       
$units_sold = "SELECT COUNT(*) as 'total', SUM(PRICE) AS 'sum' FROM sell, vehicles WHERE sell.VIN = vehicles.VIN";
          
       
       

    $result = $db->query($units_sold);
    if($result->num_rows > 0){           //check if query results in more than 0 rows
        while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
            
            $total_count = "<br><h2>" . "Total vehicles sold: " . $row["total"] . "</h2>";
            $total_sales = "<h2>Total company sales: $" . number_format($row["sum"]) . "</h2><br>";
            echo $total_count;
            echo $total_sales;
        }
       
    }
       
?>
       <button type="button" style="margin:auto;display:block" onclick="transactionSearch()">Transaction Search</button>
       
<script>
function addNewEmployee() {
    window.open("newEmployee.php");
}
function deleteEmployee() {
    window.open("delEmployee.php");
}
function transactionSearch() {
    window.open("transactionSearch.php");
}
</script>    
   

   
   </body>

    
    
</html>