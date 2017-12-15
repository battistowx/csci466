<!--
Dashboard.php
Chris Battisto
-->

<html>
	<head>
		<center><title>DJ Dashboard</title></center>
    <center><h2>DJ Dashboard</h2></center>
	</head>
 
 <body>
 
 <! -- Paid Queue form -->
 <?php
      $username = "username";
      $password = "password";
      
       //create a connection to the SQL database
       try{
          $dsn = "mysql:host=courses;dbname=username";
          $pdo = new PDO($dsn, $username, $password);
          echo "<center>";
          $search = $_POST["songSearch"];
          //MySQL statement
            $sql = "SELECT PaidQueue.customerNameP, Song.title, Song.artist, File.versionNum FROM File
	                  INNER JOIN Song ON File.songID=Song.songID
                    INNER JOIN PaidQueue ON File.versionNum=PaidQueue.versionNum;";
            $result = $pdo->query($sql);
            $allrows = $result->fetchAll(PDO::FETCH_ASSOC);
       echo "
                <table cellpadding='15'><caption>Paid Queue</caption><form action='dashboard.php' method='post'>
                  <tr>
                    <th>Customer</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Version</th>
                  </tr>
            ";
            
       //Display Songs from input search
       foreach($allrows as $index=>$rows){
              echo "<tr>";
              
              echo'
                <td><input type="radio" value="' . $rows['versionNum'] . '" name="verNum" id="verNum">
                ' . $rows['customerNameP'] . '</td>
                <td>'.$rows['title'].'</td>
                <td>'.$rows['artist'].'</td>
                <td>'.$rows['versionNum'].'</td>
                ';
              echo "</tr>";
            }
            echo "</table>";
       
       echo '
          <p>
            <input type="Submit" name="flagPaid" value="Flag as played"/>
            </p></form>
           </center>
         ';
       
       if(isset($_POST['flagPaid'])){
           $song=$_POST['verNum'];
           $sql="DELETE FROM PaidQueue WHERE versionNum='".$song."'";
           $result = $pdo->query($sql);
         }
       
      }
      //if unable to connect, print out error   
        catch(PDOexc $e){
          echo "Connection to a database failed: " . $e->getMessage();
        } 
        
  ?>
  
  <! -- Free Queue form -->
  <?php
      $username = "username";
      $password = "password";
       //create a connection to the SQL database
       try{
          $dsn = "mysql:host=courses;dbname=username";
          $pdo = new PDO($dsn, $username, $password);
          echo "<center>";
          $search = $_POST["songSearch"];
          //MySQL statement
            $sql = "SELECT FreeQueue.customerNameF, Song.title, Song.artist, File.versionNum FROM File
	                  INNER JOIN Song ON File.songID=Song.songID
	                  INNER JOIN FreeQueue ON File.versionNum=FreeQueue.versionNum;";
            $result = $pdo->query($sql);
            $allrows = $result->fetchAll(PDO::FETCH_ASSOC);
       echo "
                <table cellpadding='15'><caption>Free Queue</caption><form action='dashboard.php' method='post'>
                  <tr>
                    <th>Customer</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Version</th>
                  </tr>
            ";
            
       //Display Songs from input search
            foreach($allrows as $index=>$rows){
              echo "<tr>";
              
              echo'
                <td><input type="radio" value="' . $rows['versionNum'] . '" name="verNum" id="verNum">
                ' . $rows['customerNameF'] . '</td>
                <td>'.$rows['title'].'</td>
                <td>'.$rows['artist'].'</td>
                <td>'.$rows['versionNum'].'</td>
                ';
              echo "</tr>";
            }
            echo "</table>";
            
            echo '
          <p>
            <input type="Submit" name="flagFree" value="Flag as Played"/>
            </p></form>
           </center>
         ';
         
         if(isset($_POST['flagFree'])){
           $song=$_POST['verNum'];
           $sql="DELETE FROM FreeQueue WHERE versionNum='".$song."'";
           $result = $pdo->query($sql);
         }
       
      }
      //if unable to connect, print out error   
        catch(PDOexc $e){
          echo "Connection to a database failed: " . $e->getMessage();
        } 
        
  ?>     