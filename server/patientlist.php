<?php include('server.php'); 

if(!isset($_SESSION['username'])){
	header('location: login.php');
}

			if(isset($_GET['edit'])){
				$id = $_GET['edit'];
				$edit_state = true;
				$rec = mysqli_query($db, "SELECT * FROM patients WHERE id=$id");
				$record = mysqli_fetch_array($rec);
				$first_name = $record['first_name'];
				$last_name = $record['last_name'];
                $fiscal_code= $record['fiscal_code'];
				$id = $record['id'];
			}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>List of Patients</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="msg">
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
            </div>
        <?php endif?>
        
        <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
        <form action="dashboard.php" method="post">
        <button type="submit" name="back" class="btn">Back</button>
        </form>
        <form method="GET">
            <input type="text" placeholder="Search for" name="query">
            <input type="submit" value="Search">
        </form>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Fiscal code</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
            <?php while ($row = mysqli_fetch_array($results)){?>
            
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['fiscal_code']?></td>
                    <td>
                        <a class ="edit_btn" href="add.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    </td>
                    <td>
                        <a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </table>
        <form action="logout.php" method="post">
        <button type="submit" name="logout" class="btn">Logout</button>
        </form>
        
    </body>
    
</html>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($db, $query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($db, "SELECT * FROM patients
            WHERE (`first_name` LIKE '%".$query."%') OR (`last_name` LIKE '%".$query."%')OR (`fiscal_code` LIKE '%".$query."%')");
             
    
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo"<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Fiscal code</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead><tr>
                    <td>".$results['id']."</td><td>".$results['first_name']."</td>
                    <td>".$results['last_name']."</td>
                    <td>".$results['fiscal_code']."</td>";
               
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    
    
?>

  
         
