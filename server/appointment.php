<?php 

if(isset($_GET['id']))
{
    $item_id = $_GET['id'];
    
    $connect = mysqli_connect('localhost', 'root', '', 'TBD');
    
    $query = mysqli_query($connect, "SELECT * FROM patients WHERE id='$item_id'");
}

?>

      
      <!DOCTYPE html>
<html>
<head>
        <title>Patient</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <h1>Information</h1>
        <form action="selectlist.php" method="post">
        <button type="submit" name="back" class="btn">Back</button>
        </form>

<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Fiscal code</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)){?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['fiscal_code']?></td>
                </tr>
           <?php }?>
           
        </tbody>
        </table>
        
        <h1>Measurement</h1>
        <table>
        
                <div class="input-group">
                <label>Temperature</label>
                <input type="number" name="temperature" >
            </div>
            
               <div class="input-group">
                <label>Notes</label>
                <input type="text" name="notes">
            </div>
            <form action="addmeasures.php" method="post">
            <button type="submit" name="back" class="btn">Add</button>
            </form>
              
            
           
        </table>
        
        
    </body>
</html>
