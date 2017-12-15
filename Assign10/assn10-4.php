<!--
Assignment 10 Question 4
11/20/17
Chris Battisto
-->

<html>

	<head>
		<title>Assign 10 Question 3</title>
    <h2>Question 4:  Races from selected horse</h2>
	</head>
 
 <body>
 
    <! -- Drop box for SQL query -->
    <h3>Select a horse:</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <select id="horseName" name="horseName">
		  <option value=1>Secretariat</option>
		  <option value=2>Man O&#39 War</option>
		  <option value=3>Spectacular Bird</option>
		  <option value=4>Citation</option>
		  <option value=5>Native Dancer</option>
      <option value=6>Seattle Slew</option>
      <option value=7>Affirmed</option>
      <input type="submit" name="submit" value="Submit">
    </select>
    </form>
    <h3>Results:</h3>
 
 <?   
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
     $selectedValue=$_POST['horseName'];
   
     try {
       $conn=new PDO("mysql:dbname=username;host=students;", "username", "password");
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $query=$conn->prepare("SELECT race.name, runsin.tm, runsin.finish FROM race INNER JOIN runsin ON runsin.rid=race.race_id WHERE hid=".$selectedValue.";");
       $query->execute();
     
       //print table results
       echo "<table border=1>
       <tr>
         <th>Race</th>
         <th>Place</th>
         <th>Time</th>
       </tr>";
     
       foreach($query as $key => $row) {
         echo "<tr>";
         foreach($row as $nom => $field) {
         //print fields, remove =string
         if(gettype($nom) != "string") {
           echo "<td>" . $field . "</td>";
           }
         }
       }
     }
   
     //exception for error
     catch(Exception $e) {
       echo "Error executing try statement";
       echo "<p>" . $e->getMessage() . "</p>";
     }
     $conn=null;
     
    } 
   
   ?>
   
  </body>
</html> 