<?php 
    require_once('Config_DB.php');
    $widgetList = array();
    $widgetList = SelectAllWidget($dbLink);
    $stringList = SelectAllString($dbLink);
    $typeWidgetList = SelectTypeWidget($dbLink);
?>



<?php
				
	//__________Add Widget To DB
	if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['nameWidget']) && isset($_POST['category'])){
            if(!empty($_POST['nameWidget']) ) {
                $nameWidget = $_POST['nameWidget'];
                $category = $_POST['category'];
                $typeWidget = htmlspecialchars($category);
                
                if(!empty($typeWidget)){
                    $sql = 'INSERT INTO widget_for_online_them  (`nameWidget` , `typeWidget`) 
                    VALUES 
                        (
                        "'.$nameWidget.'",
                        "'.$typeWidget.'"
                        );';
                    $query = mysqli_query($dbLink, $sql)or die(mysqli_error($dbLink));
                    if($query){
                        echo 'success INSERT action into DB';
                        $widgetList = SelectAllWidget($dbLink);
                    }   
                    else {
                        echo 'error to Insert';
                    }
                }
                else {
                    echo 'pleas select type widget';
                }                 
            }
            else {
                echo 'name is empity';
            }
        }
        //__________EDIT______________
        if( (isset($_POST['editName']) || isset($_POST['stringDropDown'])  )
            && isset($_POST['editId'])&& isset($_POST['rowNumber'])){
            $rowNumber = $_POST['rowNumber'];
            $editId = $_POST['editId'];
            if(isset($_POST['stringDropDown'])){
                $stringDropDown = $_POST['stringDropDown'];
                $stringDropDownValue = htmlspecialchars($stringDropDown);
            }
            
            $editName = $_POST['editName'];
            $query = false;

            if(!empty($editName)){
                echo "Edit Name : $editName , in row : $rowNumber ** ";
                $sql = "UPDATE `widget_for_online_them` SET
                `nameWidget`= '$editName' 
                 WHERE `id`=$editId " ;
                $query = mysqli_query($dbLink, $sql)or die(mysqli_error($dbLink));
            } 
             
            if(!empty($stringDropDownValue)){
                //echo "Edit Value : $stringDropDownValue , in row : $rowNumber ** ";
                echo "Edit Value string , in row : $rowNumber ** ";
                $sql = "UPDATE `widget_for_online_them` SET
                `valueWidget`= '$stringDropDownValue' 
                 WHERE `id`= $editId " ;
                $query = mysqli_query($dbLink, $sql)or die(mysqli_error($dbLink));
            }                  
            if($query){
                $widgetList = SelectAllWidget($dbLink);
            } 
            else{
                echo '_error';
            }                      
                                    
            
        }
    }
?>

<?php

//________Select All Widget
function SelectAllWidget($dbLink)
{

    $sql = "SELECT * FROM widget_for_online_them ORDER BY id DESC ";
    $query = mysqli_query($dbLink , $sql ) or die(mysqli_error());     
    
    $a = mysqli_num_rows($query); 
    $widgetList = array()   ;
	if($a > 0){			
		for($i= 0 ;$i < $a ; $i++){				
			$row=mysqli_fetch_array($query);
			$string = new ArrayObject();
			$string ["id"] = $row["id"];
			$string ["nameWidget"] = $row["nameWidget"];
			$string ["valueWidget"] = $row["valueWidget"];
            $string ["typeWidget"] = $row["typeWidget"];

            if(isset($string["valueWidget"]) && strcasecmp($string["valueWidget"] ,"") != 0){
                $sql_string = "SELECT `value` FROM string_for_online_them WHERE id ='".$string["valueWidget"]."'";
                $query_string = mysqli_query($dbLink , $sql_string ) or die(mysqli_error());
                $row_string=mysqli_fetch_array($query_string);
                $string ["valueWidget"] = $row_string["value"];
            }           
            
				
		    array_push($widgetList , $string);
		}
    }
    return $widgetList;    
    
}
//________Select All String
function SelectAllString($dbLink)
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
    
//________Select Type Widget
function SelectTypeWidget($dbLink)
{

    $sql = "SELECT * FROM type_widget ORDER BY id ASC ";
    $query = mysqli_query($dbLink , $sql ) or die(mysqli_error());     
    
    $a = mysqli_num_rows($query); 
    $typeWidget = array()   ;
	if($a > 0){			
		for($i= 0 ;$i < $a ; $i++){				
			$row=mysqli_fetch_array($query);
			$string = new ArrayObject();
			$string ["id"] = $row["id"];
			$string ["name"] = $row["name"];
				
		    array_push($typeWidget , $string);
		}
    }
    return $typeWidget;    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widget Input Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container_form">
        <form class="string-form" action='addWidget.php' method='post' accept-charset='UTF-8' enctype="multipart/form-data">
            <label for="nameWidget" class="form-label">Enter a new widget:</label>
            <input type="text" id="stringInput" name="nameWidget" placeholder="insert name " required>
            
            <select name="category" required>
                <option value="" disabled selected>Select an option</option>
                <?php 
                    for($i = 0 ; $i < count($typeWidgetList) ; $i++ ){
                        echo '<option value="'.$typeWidgetList[$i]['name'].'">'.$typeWidgetList[$i]['name'].'</option>';
                    }   
                ?>  
            </select>
            
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
                    <th>type</th>
                    <th>value</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
                <?php                    
                    if(isset($widgetList)){                        
                        for($i = 0 ; $i < count($widgetList) ; $i++){
                            //echo $widgetList[$i]['id'];
                            $rowNumber = $i+1;
                            echo '<form class="string-form" action="addWidget.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">';
                                echo '<tr>                            
                                <td>'.($rowNumber).'</td>'.                            
                               
                                '<input type="hidden" name="rowNumber"  value="'.$rowNumber.'" >'.
                                '<input type="hidden" name="editId"  value="'.$widgetList[$i]['id'].'" >'.
                                
                                '<td>'.
                                    '<input type="text" id="stringInput" name="editName" placeholder="'.$widgetList[$i]['nameWidget'].'" >'.
                                '</td>'.

                                '<td>'.
                                    '<lable >'.$widgetList[$i]['typeWidget'].'</label>'.
                                '</td>'.

                                '<td>'.
                                    '<select name="stringDropDown" >
                                        <option value="" disabled selected>Select an option</option>';
                                         
                                        for($j = 0 ; $j < count($stringList) ; $j++ ){
                                            //echo '<option value="'.$stringList[$j]['value'].'">'.$stringList[$j]['name'].'</option>';
                                            echo '<option value="'.$stringList[$j]['id'].'">'.$stringList[$j]['name'].'</option>';
                                        }   
                                        
                                echo'</select>' .
                                    '<input type="text" id="stringInput" name="" placeholder="'.$widgetList[$i]['valueWidget'].'" >'.
                                '</td>'.                                

                                '<td>'.
                                    '<button type="submit" class="submit-btn">save edit</button> '.                               
                                '</td>
                                
                                </tr>';
                            echo '</form>' ;
                        }    
                        //<td>'.$widgetList[$i]['id'].'</td>  
                        //<td>'.$widgetList[$i]['name'].'</td>                  
                    }                    
                ?>
            </tbody>
        </table>

            
        <!-- <input type="text" id="stringInput" name="valueString" placeholder="insert value string" required> -->
   
    
        
    </div>
</body>
</html>
