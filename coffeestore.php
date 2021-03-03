
<html>
<head>
<style>
h1 {
        display: inline-block;
        width: 3em;
        padding: 0.9em 0;
        margin: 0.5em;
        text-align: center;
        
        }
    h2{
        font-family: 'Brush Script MT', cursive;
        font-size:3em;
         color:darkblue;
    }
#holder{
    border:1px solid black;
    text-align:center;
}
body{  
    background-image: url("backg.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;

}
td{
    border: solid 1px black;
    font-size: large;
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
<div id="holder">
<?php

require('mysqli_connect.php');
session_start();


$query = "SELECT * FROM menu"; 
$result = mysqli_query($dbc,$query);
echo "<h2> Welcome to BrewBuzz </h2>";
echo "<div id='holder'><table>"; 
echo "<tr><th>CoffeeName</th><th>CoffeeCost</th></tr>";
while($row = mysqli_fetch_array($result)){   
    $itemID = $row['itemid'];
echo "<tr><td><a href=checkout.php?varname=".$itemID.">" . $row['coffeename'] . "</a></td><td>" . $row['price']  . "</td></tr>";  
}
echo "</table></div>";

?>
</div>
</body>
</html>