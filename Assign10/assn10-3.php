<!--
Assignment 10 Question 3
11/20/17
Chris Battisto 
-->

<html>

	<head>
		<title>Assign 10 Question 3</title>
    <h2>Question 3:  Race names and distances</h2>
	</head>
 
 <body>
 
    <! -- Drop box for SQL query -->
    <h3>Select a distance:</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <select id="dist" name="dist">
		  <option value="1 1/16 m">1 1/16 m</option>
		  <option value="1 1/2 m">1 1/2 m</option>
		  <option value="1 1/4 m">1 1/4 m</option>
		  <option value="1 1/8 m">1 1/8 m</option>
		  <option value="1 3/16 m">1 3/16 m</option>
      <option value="1 3/4 m">1 3/4 m</option>
      <option value="1 3/8 m">1 3/8 m</option>
      <option value="1 5/8 m">1 5/8 m</option>
      <option value="1 m">1 m</option>
      <option value="1 mile">1 mile</option>
      <option value="2 miles">2 miles</option>
      <option value="5 1/2 f">5 1/2 f</option>
      <option value="5 f">5 f</option>
      <option value="6 1/2 f">6 1/2 f</option>
      <option value="6 f">6 f</option>
      <option value="7 f">7 f</option>
      <input type="submit" name="submit" value="Submit">
    </select>
    </form>
    <h3>Results:</h3>
 
 <?   
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
     $selectedValue=$_POST['dist'];
     echo $selectedValue;
   
     try {
       $conn=new PDO("mysql:dbname=username;host=students;", "id", "password");
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $query=$conn->prepare("SELECT name FROM race WHERE distance='".$selectedValue."'");
       $query->execute();
     
       //print table results
       echo "<table border=1>
       <tr>
         <th>Race</th>
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