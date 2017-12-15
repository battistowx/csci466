<!--
Assignment 10 Question 2
11/20/17
Chris Battisto
-->

<html>
	<head>
		<title>Assign 10 Question 2</title>
	</head>
  <h2>Question 2:  Race names and distances</h2>
  <h3>Results:</h3>
 
 <body>
   <?
   //open up connections
   try {
     $conn=new PDO("mysql:dbname=username;host=students;", "username", "password");
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $query=$conn->prepare("SELECT name, distance FROM race;");
     $query->execute();
     
     //print table results
     echo "<table border=1>
     <tr>
       <th>Race</th>
       <th>Distance</th>
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

   $conn=null
   ?>
   
  </body>
</html> 