<!--
Assignment 10 Question 1
11/20/17
-->

<html>
	<head>
		<title>Assign 10 Question 1</title>
    <h2>Question 1:  Horses, Sires, Dams</h2>
    <h3>Results:</h3>
	</head>
 
 <body>
   <?
   //open up connections
   try {
     $conn=new PDO("mysql:dbname=username;host=students;", "username", "password");
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $query=$conn->prepare("SELECT name, sire, dam FROM horse;");
     $query->execute();
     
     //print table results
     echo "<table border=1>
     <tr>
       <th>Name</th>
       <th>Sire</th>
       <th>Dam</th>
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