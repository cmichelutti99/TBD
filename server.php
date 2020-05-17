<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Patients</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div><b>List of Patients</b></div>
    <?php
        $db = pg_connect("host=localhost dbname=tbd user=tbd password=tbd");
        $result = pg_query($db, "SELECT patient_last_name, patient_first_name FROM patient;");
        while ($row = pg_fetch_row($result)) {
            $patient_last_name = $row[0];
            $patient_first_name = $row[1];
            echo $patient_first_name . " " . $patient_last_name . "<br/>";
        }
    ?>

    <div style="margin-top: 20px"><b>Add a patient</b></div>
    <?php
        $parameters = array("Max", "Mustermann");
        $result = pg_query_params($db, "INSERT INTO patient (patient_last_name, patient_first_name) RETURNING id;", $parameters);
        $row = pg_fetch_row($result);
        $inserted_id = $row[0];
        echo "Inserted ID: " . $inserted_id;
   ?>

    <div style="margin-top: 20px"><b>Modify a patient</b></div>
    <?php
        $parameters = array("Max", "Mustermann" $inserted_id);
       
    ?>

    <div style="margin-top: 20px"><b>Delete a patient</b></div>
    <?php
        $parameters = array($inserted_id);
        pg_query_params($db, "DELETE FROM  patient WHERE id=$1;", $parameters);
    ?>
</body>

</html>
