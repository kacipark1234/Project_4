<?php
    

    
    
    $name = $_POST["name"];
    $Tid = $_POST["Tid"];
    $Tname = $_POST["Tname"];
    
    /*echo $name;
    echo $Tid;
    echo $Tname;*/
    
    require_once("dbtools.inc.php");

    $time = date("Y-m-d H:i:s");
    
    $link = create_connection();
    $sql = "SELECT * FROM users WHERE id = $Tid";
    $result = execute_sql($link,"Portfolio_4",$sql);
    
    if(mysqli_num_rows($result) == null){
        //echo "2<br>";
        $sql = "INSERT INTO users(id,name) VALUES('$Tid','$Tname')";
        $result = execute_sql($link,"Portfolio_4",$sql);
        
        $sql = "UPDATE vote SET score = score+1 WHERE name = '$name'";
        $result = execute_sql($link,"Portfolio_4",$sql);
        
        mysqli_close($link);
        header("location:index.php");
        exit(); 
    }
    else{
        echo "<script type='text/javascript'>
                    alert('你已投票')
                    history.back();
              </script>";
        
    }
    
    //$cid = mysqli_num_rows($result) + 1;
    //$sql = "INSERT INTO message(author,subject,content) VALUES('$author','$subject','$text','$time')";
    //echo $sql;
    //$result = execute_sql($link,"Portfolio_3",$sql);
?>