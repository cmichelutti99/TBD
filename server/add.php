<?php include('server.php'); 

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM Patient WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $firstname = $record['firstname'];
    $lastname = $record['lastname'];
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
        <form action="dashboard.php" method="post">
        <button type="submit" name="back" class="btn">Back</button>
        </form>

<form method="post" action="server.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label>First name</label>
                <input type="text" name="first_name" value="<?php echo $first_name; ?> ">
            
            </div>
            <div class="input-group">
                <label>Last name</label>
                <input type="text" name="last_name" value="<?php echo $last_name; ?> ">
            
            </div>
            <div class="input-group">
                <label>Fiscal code</label>
                <input type="text" name="fiscal_code" value="<?php echo $fiscal_code; ?> ">
        
            </div>
            <div class="input-group">
                <?php if ($edit_state == false): ?>
                    <button type="submit" name="add" class="btn">Add</button>
                <?php else: ?>
                    <button type="submit" name="update" class="btn">Update</button>
                <?php endif ?>
            
            </div>
            
        </form>
        <form action="logout.php" method="post">
        <button type="submit" name="logout" class="btn">Logout</button>
        </form>
            
    </body>
</html>
