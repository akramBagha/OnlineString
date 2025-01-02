<?php 
    require_once('Config_DB.php');
    $stringList = array();
    $stringList = SelectAll($dbLink);
?>



<?php
				
	//__________Add Adv To DB
	if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['nameString']) && isset($_POST['valueString'])){
            if(!empty($_POST['nameString']) && !empty($_POST['valueString'])) {
                //$isInsertToDataBase = false;
                $nameString = $_POST['nameString'];
                $valueString = $_POST['valueString'];
    
                $sql = 'INSERT INTO string_for_online_them  (`name` , `value`) 
                    VALUES 
                        (
                        "'.$nameString.'",
                        "'.$valueString.'"
                        );';
                $query = mysqli_query($dbLink, $sql)or die(mysqli_error($dbLink));
                if($query){
                    echo 'success INSERT action into DB';
                    $stringList = SelectAll($dbLink);
                }                       
                                    
            }
            else {
                echo 'name or value is empity';
            }
        }
        //__________EDIT______________
        if((isset($_POST['editName']) || isset($_POST['editValue']) )&& isset($_POST['editId'])&& isset($_POST['rowNumber'])){
            //if(!empty($_POST['editName']) && !empty($_POST['editValue'])) {

                $rowNumber = $_POST['rowNumber'];
                $editId = $_POST['editId'];
                $editName = $_POST['editName'];
                $editValue = $_POST['editValue'];
                $query = false;

                if(!empty($editName) && !empty($editValue) ){
                    echo "Edit Name : $editName and Value : $editValue , in row : $rowNumber";
                    $sql = "UPDATE `string_for_online_them` SET `name`= '$editName',`value`= '$editValue' WHERE `id`=$editId " ;
                    $query = mysqli_query($dbLink, $sql)or die(mysqli_error($dbLink));
                }
                else if(!empty($editName) ){
                    echo "Edit Name : $editName , in row : $rowNumber";
                    $sql = "UPDATE `string_for_online_them` SET `name`= '$editName' WHERE `id`=$editId " ;
                    $query = mysqli_query($dbLink, $sql)or die(mysqli_error($dbLink));
                }
                else if(!empty($editValue)){
                    echo "Edit Value : $editValue , in row : $rowNumber";
                    $sql = "UPDATE `string_for_online_them` SET `value`= '$editValue' WHERE `id`=$editId " ;
                    $query = mysqli_query($dbLink, $sql)or die(mysqli_error($dbLink));
                }                
                
                if($query){
                    //echo 'success Update action into DB';
                    $stringList = SelectAll($dbLink);
                }                       
                                    
            
        }
    }
?>

<?php
function SelectAll($dbLink)
{

    $sql = "SELECT * FROM string_for_online_them ORDER BY id DESC ";
    $query = mysqli_query($dbLink , $sql ) or die(mysqli_error());     
    
    $a = mysqli_num_rows($query); 
    $stringList = array()   ;
	if($a > 0){			
		for($i= 0 ;$i < $a ; $i++){				
			$row=mysqli_fetch_array($query);
			$string = new ArrayObject();
			$string ["id"] = $row["id"];
			$string ["name"] = $row["name"];
			$string ["value"] = $row["value"];
				
		    array_push($stringList , $string);
		}
    }
    return $stringList;    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Input Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container_form">
        <form class="string-form" action='addString.php' method='post' accept-charset='UTF-8' enctype="multipart/form-data">
            <label for="stringInput" class="form-label">Enter a new string:</label>
            <input type="text" id="stringInput" name="nameString" placeholder="insert name " required>
            <input type="text" id="stringInput" name="valueString" placeholder="insert value " required>
            <button type="submit" class="submit-btn">Add</button>
            <div class= 'submit-btn'><a class="submit-btn" href='getStringList.php' target='_blank'>  view Json </a></div>
        </form>
    </div>


    <div class="title_massage" >
    NOT : for edit items, just enter new value and click 'save edit' button.
    </div>
    

    <!-- Show list -->
    <div class="table-container">        
    <table>
            <thead>
                <tr>
                    <th>row</th>
                    <th>name</th>
                    <th>value</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
                <?php                    
                    if(isset($stringList)){                        
                        for($i = 0 ; $i < count($stringList) ; $i++){
                            //echo $stringList[$i]['id'];
                            $rowNumber = $i+1;
                            echo '<form class="string-form" action="addString.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">';
                                echo '<tr>                            
                                <td>'.($rowNumber).'</td>'.                            
                               
                                '<input type="hidden" name="rowNumber"  value="'.$rowNumber.'" >'.
                                '<input type="hidden" name="editId"  value="'.$stringList[$i]['id'].'" >'.
                                
                                '<td>'.
                                    '<input type="text" id="stringInput" name="editName" placeholder="'.$stringList[$i]['name'].'" >'.
                                '</td>
                                <td>'.
                                    '<input type="text" id="stringInput" name="editValue" placeholder="'.$stringList[$i]['value'].'" >'.
                                '</td>
                                <td>'.
                                    '<button type="submit" class="submit-btn">save edit</button> '.                               
                                '</td>
                                
                                </tr>';
                            echo '</form>' ;
                        }    
                        //<td>'.$stringList[$i]['id'].'</td>  
                        //<td>'.$stringList[$i]['name'].'</td>                  
                    }                    
                ?>
            </tbody>
        </table>

            
        <!-- <input type="text" id="stringInput" name="valueString" placeholder="insert value string" required> -->
   
    
        
    </div>
</body>
</html>
