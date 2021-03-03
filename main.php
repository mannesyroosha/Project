<?php 

	require('mysqli_connect.php');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();

            $_SESSION["name"] = $_POST['name'];
            $password = $_POST['pass'];
            $statement = mysqli_prepare($dbc, "Select * from credentials WHERE username = ? and password=?");
            mysqli_stmt_bind_param($statement, 'ss', $_SESSION["name"], $password);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            if(mysqli_stmt_num_rows($statement)==1){           
                    header("Location: http://localhost/cs/coffeestore.php");
            }
            else{
                echo "<h3>Wrong Credentials! Please try again!</h3>";
            }
		}

?>
<html>
<head>

<style>
    body{  
    background-image: url("backg.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;

}
    h3{
        font-family: 'Brush Script MT', cursive;
        font-size:2em;
         color:darkblue;
    }
h1 {
        display: inline-block;
        width: 3em;
        padding: 0.9em 0;
        margin: 0.5em;
        text-align: center;
        }
#wrapper{
    border:1px solid black;
    text-align:center;
}
 </style>
</head>
<body>
        <div id="wrapper">
<?php include "header.php"?>
       
    <form action="main.php" method="POST">
        <h3><p>Please login to order coffee</p></h3>
        <p><input type="text" name="name" placeholder="name"></p>
        <p><input type="password" name="pass" placeholder="password"></p>
        <p><input type="submit" value="submit"></p>

    </form>
    </div>
</body>

</html>