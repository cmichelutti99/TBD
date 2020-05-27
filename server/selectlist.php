<?php include('server.php'); 

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM Patient WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $firstname = $record['firstname'];
    $lastname = $record['lastname'];
    $fiscalcode = $record['fiscalcode'];
    $id = $record['id'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Select patient</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="dashboard.php" method="post">
        <button type="submit" name="back" class="btn">Back</button>
        </form>
        
        <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Fiscal code</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)){?>
                <tr>
                    <td>
                        <?php echo '<a href="appointment.php?id='.$row['id'].'">Select</a>'; ?>
                    </td>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['fiscal_code']?></td>
                </tr>
           <?php }?>
