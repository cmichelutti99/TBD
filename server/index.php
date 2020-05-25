<?php include('server.php'); 


	if (isset($_SESSION['username'])){
	//Is the user_name set? == Is user logged in?

			if(isset($_GET['edit'])){
				$id = $_GET['edit'];
				$edit_state = true;
				$rec = mysqli_query($db, "SELECT * FROM patients WHERE id=$id");
				$record = mysqli_fetch_array($rec);
				$first_name = $record['first_name'];
				$last_name = $record['last_name'];
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
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)){?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td>
                        <a class ="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    </td>
                    <td>
                        <a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
           <?php }?>
           
        </tbody>
        </table>
        
        <form method="post" action="server.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label>First name</label>
                <input type="text" name="firstname" value="<?php echo $first_name; ?> ">
            
            </div>
            <div class="input-group">
                <label>Last name</label>
                <input type="text" name="lastname" value="<?php echo $last_name; ?> ">
            
            </div>
            <div class="input-group">
                <?php if ($edit_state == false): ?>
                    <button type="submit" name="add" class="btn">Add</button>
                <?php else: ?>
                    <button type="submit" name="update" class="btn">Update</button>
                <?php endif ?>
            
            </div>
        </form>
    </body>
</html>

<?php

	}else{
		
		die("You're not allowed to access this page! <a href='./login.php'>Back to login</a>");
		
	}

?>
