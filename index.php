<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
 
    <title>線上投票系統</title>
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
            function _check(){
                if(document.myForm.Tid.value.length == 0 || document.myForm.Tname.value.length == 0){
                    alert("請填完資料");
                }
                else{
                    var T=0;
                    for(var i=0;i < document.myForm.elements.length;i++){
                        
                        if(document.myForm.elements[i].name == "name" && document.myForm.elements[i].checked == true){
                            T=1;
                        }
                    }
                    if(T==1){
                        myForm.submit();
                    }
                    else{
                         alert("請勾選選項");
                    }
                }
                
            }
            
            
        </script>
</head>
<body>
    <form name="myForm" method="post" action="post.php">
    <div class='top_div'></div>
    <table width='800px' align='center' cellspacing='3'  >
    <?php
        
        require_once("dbtools.inc.php");
        $link = create_connection();
        $sql = "SELECT * FROM vote";
        $result = execute_sql($link,"Portfolio_4",$sql);
        
        $bg[0]="#0AB16F";
        $bg[1]="#EC5C59";
        $bgg[0]="#D9D9FF";
        
        
        
        if(mysqli_num_rows($result) == null || mysqli_num_rows($result) == 1){
            echo "<tr bgcolor='".$bg[1]."'>";
            //echo " <td width='120' align='center' ></td>";
            echo "<td height='50px' align='center' >沒有選項或選項不足2<br></td></tr>";
        }
        else{
            $j=1;
            while($row = mysqli_fetch_assoc($result)){
                
                echo "<tr  height='50px' bgcolor='".$bg[$j%2]."'>";
                echo " <td  width='120' align='center'><input type='radio' name='name' value='".$row["name"]."'> 選項:".$row["name"]."<br></td>";
                echo "<td style='word-break:break-all;' >".$row["options_content"]."</td>";
                echo "</tr>";
                //echo $row["name"]."1154";
                $j++;
            }
            
            
        }
        /*echo "<tr  height='50px' bgcolor='".$bg[$j%2]."'>";
        echo " <td colspan='2' align='left'> <input type='button' >新增選項"."<br></td>";
        echo "</tr>";*/
        
        mysqli_free_result($result);
        mysqli_close($link);
    ?>
    </table>
    
    
        
        <div align="center">
            身分證:<input type=text name='Tid' size='10'>
                姓名:<input type=text name='Tname' size='10'>
            <input type="button" value="提交" onClick="_check()">
            <input type="reset" value="重新投票">
            <input type="button" value="新增投票人選"  onclick="location.href='new_options.php'">
            <input type="button" value="觀看結果" onclick="location.href='show_result.php'"> 
        </div>
               
    
    </form>
    
    
</body>
</html>