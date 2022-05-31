<?php
    $option = $_POST["option"];
    $text = $_POST["text"];
    
    echo $option;
    echo $text;
    
    require_once("dbtools.inc.php");

     
    $link = create_connection();
    $sql = "SELECT * FROM vote WHERE name = '$option'";
    $result = execute_sql($link,"Portfolio_4",$sql);
    
    if(mysqli_num_rows($result) == null){
        //echo "2<br>";
        $sql = "INSERT INTO vote(name,options_content,score) VALUES('$option','$text',0)";
        $result = execute_sql($link,"Portfolio_4",$sql);
        
       
        mysqli_close($link);
        header("location:index.php");
        exit(); 
    }
    else{
        // echo "3<br>";
        echo "<script type='text/javascript'>
                    alert('已有此選項')
                    history.back();
              </script>";
        
    }











?>