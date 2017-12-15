<!--
Assignment 11 Question 1
11/27/17
Chris Battisto
-->

<html>
	<head>
		<title>Assign 11 Question 1</title>
    <h2>Question 1:  Add a new horse, sire and dam</h2>
	</head>
 
 <body>
 
 <! -- Fill form for SQL query -->
    <h3>Enter the new names:</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Horse name:<br>
      <input type="text" name="horsename">
        <br>Sire name:<br>
      <input type="text" name="sirename">
        <br>Dam name:<br>
      <input type="text" name="damname">
        <br>
      <input type="submit" value="Submit">
    </form>
    <h3><a href="http://students.cs.niu.edu/~z1788103/Assign10/assn10-1.php" class="button">Click here for new table results</a></h3>
      
  <?   
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
     $horse=$_POST['horsename'];
     $sire=$_POST['sirename'];
     $dam=$_POST['damname'];
   
     try {
       $conn=new PDO("mysql:dbname=username;host=students;", "username", "password");
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $query=$conn->prepare("INSERT INTO horse(name, sire, dam) VALUES ('".$horse."', '".$sire."', '".$dam."');");
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