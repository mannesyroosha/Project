
<html>
<head>
<style>
       body{  
    background-image: url("backg.jpg");
   
    background-size: 100% 100%;

}
    h2{
        font-family: 'Brush Script MT', cursive;
        font-size:3em;
    }
h1 {
        display: inline-grid;
        width: 3em;
        padding: 0.9em 0;
        margin: 0.8em;
        text-align: center;
        }
#wrapper{
    border:1px solid black;
    text-align:center;
}
td{
    border: solid 5px black;
    font-size: 1.2em;
}
table{
    text-align:center;
    width:80%;
    margin-left:auto;
    margin-right:auto;
}
 </style>
</head>
<body>
<div id="wrapper">
<h2> Your order details</h2>
<?php

require('mysqli_connect.php');
session_start();
$itemID = $_GET['varname'];

            $query = mysqli_prepare($dbc, "Select * from menu WHERE itemID = ?");
            mysqli_stmt_bind_param($query, 's', $itemID);
            mysqli_stmt_execute($query);
            $result = $query->get_result();

                                 
        echo "<table>"; 
echo "<tr><td>ItemID</td><td>coffeename</td><td>CoffeeCost</td></tr>";
while ($row = $result->fetch_array()) {
  echo "<tr><td>".$itemID."</td><td>" . $row['coffeename'] . "</td><td>" . $row['price']  . "</td></tr>"; 
  
    $_SESSION['price'] = $row['price'];
}
echo "</table>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header("Location: http://localhost/cs/success.php");
    }



?>
    <p><h4>Details</h4>
    <form action="#" method="POST">
        <p><input type='text' name='firstname' placeholder='FirstName' required></p>
        <p><input type='text' name='lastname' placeholder='LastName' required></p>
        <p><input type='text' name='quantity' placeholder='quantity' required></p>
        Payment Options:
<input type="radio" name="paymethod"
<?php if (isset($paymethod) && $paymethod=="cred/deb") echo "checked";?>
value="cred/deb">Credit/debit
<input type="radio" name="paymethod"
<?php if (isset($paymethod) && $paymethod=="COD") echo "checked";?>
value="COD">Cash on Delivery
<input type="radio" name="paymethod"
<?php if (isset($paymethod) && $paymethod=="gift") echo "checked";?>
value="gift">Promo Code
        <p><input type='submit' value='CheckOut'>

    </form>
    </div>
</body>

</html>
