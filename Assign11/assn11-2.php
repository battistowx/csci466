<!--
Assignment 11 Question 2
11/27/17
Chris Battisto 
-->

<html>
	<head>
		<title>Assign 11 Question 2</title>
    <h2>Question 2:  Add a new race</h2>
	</head>
 
  <body>
  <! -- Fill form for SQL query -->
    <h3>Enter the new race and distance:</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Race name:<br>
      <input type="text" name="racename">
        <br>Distance:<br>
      <input type="text" name="distance">
        <br>
      <input type="submit" value="Submit">
    </form>
    <h3><a href="http://students.cs.niu.edu/~z1788103/Assign10/assn10-3.php" class="button">Click here for new table results</a></h3>
      
  <?   
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
     $race=$_POST['racename'];
     $dist=$_POST['distance'];
   
     try {
       $conn=new PDO("mysql:dbname=username;host=students;", "username", "password");
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $query=$conn->prepare("INSERT INTO race(name, distance) VALUES ('".$race."', '".$dist."');");
       $query->execute();
   }
   
   //exception for error
   catch(Exception $e) {
     echo "<p>" . $e->getMessage() . "</p>";
     }

   $conn=null;
   }
   
   ?>
   
  </body>
</html>