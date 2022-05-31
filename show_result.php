<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
 
    <title>投票結果</title>
    <style type="text/css">
            html{
                 height: 100%;
            }
            body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-attachment: fixed;
                height: 100%;
            }
            .top_div{
                background-image: url(title_1.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
               
                width:100%;
                height:250px;
                
            }
        </style>
        <script type="text/javascript">
            
        </script>
</head>
<body>
    <div class='top_div'></div>
    <table width='800px' align='center' border="1" >
        <tr>
            <td >選項</td>
            <td >總票數</td>
            <td >百分比</td>
            <td >長條圖</td>
            
        </tr>
        <?php
            require_once("dbtools.inc.php");
            $link = create_connection();
            $sql = "SELECT * FROM vote";
            $result = execute_sql($link,"Portfolio_4",$sql);
            
            $total_score = 0;
           // echo $total_score;
            
            while($row = mysqli_fetch_assoc($result)){
                //echo $row["score"];
                $total_score += $row["score"];
            }
            
            //echo $total_score;
            
            mysqli_data_seek($result,0);
            while($row = mysqli_fetch_assoc($result)){
                //echo $row["name"];
                $per = round($row["score"]/$total_score,4)*100;
                $per2 = $per*5;
                echo "<tr>";
                echo "<td >".$row["name"]."</td>";
                echo "<td >".$row["score"]."</td>";
                echo "<td >".$per."%</td>";
                echo "<td ><img src='bar.png' height='20' width='".$per2 ."' >"."</td>";

                echo "</tr>";
                
            }
            
            mysqli_close($link);
        ?>
        
        
    </table>
    <p align="center"><a href="index.php">回首頁</a></p>
</body>
</html>