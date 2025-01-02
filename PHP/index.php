<?php 
    require_once('Config_DB.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Input Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container_form">
        <form class="string-form" >
            <label for="stringInput" class="form-label">Choose and click on one item to continue</label>
            <div class= 'submit-btn'><a class="submit-btn" href='addString.php' target='_blank'>  Add New String </a></div>
            <div class= 'submit-btn'><a class="submit-btn" href='addWidget.php' target='_blank'>  Add New Widget </a></div>
        </form>
    </div>

</body>
</html>
