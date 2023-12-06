<html">
<head>
<title>myLexus | Sales Representative </title>
<style type = "text/css">
    img {
        display: block;
        margin: 0 auto;
    }
        h1,h2 {
        text-align: center;
    }
        th, td {
    padding: 15px;
    text-align: left;
        }
</style>
<img src="logo.png" alt="Lexus Logo" width="500" height="150">

      
   </head>
        <body>
              <h1>myLexus Sales Representative</h1>
     <h2>Welcome, Employee | <a href = "logout.php">Sign Out</a></h1>
            
            
             <button type="button" style="margin:auto;display:block" onclick="newSale()">New Sale</button>
             
             
             <script>

function newSale() {
    window.open("newPurchase.php");
}

</script>                 
        </body>
</html>


<?php
include("config.php");
include("session.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$units_sold = "SELECT COUNT(*) as 'total', SUM(PRICE) AS 'sum' FROM sell, vehicles WHERE sell.eid = 8 AND sell.VIN = vehicles.VIN";

    $result = $db->query($units_sold);
    if($result->num_rows > 0){           //check if query results in more than 0 rows
        $row = $result->fetch_assoc();   //loop until all rows in result are fetched
           
            echo "<br>" . "Vehicles sold so far: " . $row["total"] . "<br>";
            echo "Total sales: $" . number_format($row["sum"]) . "<br>";
    }
    else {
        echo "No sales to show";
    }
?>

<table style="width:100%">
    <thead>
            <tr>
                <th>Trans No.</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
            </tr>
    </thead>

    
    <tbody>
<?php
$emp_sales = "SELECT purchase.TRANSID, vehicles.MAKE, vehicles.MODEL, vehicles.YEAR, vehicles.PRICE
FROM purchase
INNER JOIN vehicles ON purchase.VIN = vehicles.VIN";

$result = $db->query($emp_sales);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
?>    
<tr>
<td><?php echo $row["TRANSID"] ?></td>
<td><?php echo $row["MAKE"] ?></td>
<td><?php echo $row["MODEL"] ?></td>
<td><?php echo $row["YEAR"] ?></td>
<td><?php echo $row["PRICE"] ?></td>
</tr>
<?php
}
} else {
echo "No sales to show.";
}

     ?>
    </tbody>
</table>