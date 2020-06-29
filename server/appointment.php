<?php 
require_once("./includes/config.inc.php");
	
	
	session_start();
	
	if(!isset($_SESSION['username'])){
	header('location: login.php');
	}


if(isset($_GET['id']))
{
    $item_id = $_GET['id'];
    

    
    $query = mysqli_query($db, "SELECT * FROM patients WHERE id='$item_id'");
	$query2 = mysqli_query($db, "SELECT * FROM appoint WHERE uid='$item_id'");
}

?>

      
      <!DOCTYPE html>
<html>
<head>
        <title>Appointments</title>
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
		
		
		
			        <h1>Appointments</h1>
		<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Measure</td>
                <td>Notes</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($res = mysqli_fetch_array($query2)){?>
                <tr>
                    <td><?php echo $res['id']?></td>
                    <td><?php echo $res['measure']?></td>
                    <td><?php echo $res['notes']?></td>
                    <td><?php echo $res['date']?></td>
                </tr>
           <?php }?>
           
        </tbody>
        </table>
        
        <h1>Measurement</h1>
        <table>
        
			            <form action="addmeasures.php" method="post">
				<input type="hidden" name="doctorid" value="<?php echo $_SESSION['doctorid'];?>">
				<input type="hidden" name="uid" value="<?php echo $_GET['id'];?>">
			
				<div class="input-group">
				<label>Measure</label>
				<select name="measure">
					<option value="Tooth Cleaning">Tooth Cleaning</option>
					<option value="Examination">Examination</option>
					<option value="Tooth Repair">Tooth Repair</option>
					<option value="other">other</option>
</select>
				</div>
            
               <div class="input-group">
                <label>Notes</label>
                 <textarea id="text" name="notes" cols="35" rows="4"></textarea>
           </div>
				<div class="input-group">
				<input type="date" name="date" value="2020-06-30">
				</div>
               <div class="input-group">
            <button type="submit" name="back" class="btn">Add</button>
			</div>
              
            
           
        </table>
        
        
    </body>
</html>
