<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
 
    <title>新增選項區</title>
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
                background-image: url(bg.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
               
                width:100%;
                height:250px;
                
            }
        </style>
        <script type="text/javascript">
            function _check(){
                if(document.myForm.option.value.length == 0 || document.myForm.text.value.length == 0){
                    alert("請填完資料");
                }
                else{
                    myForm.submit();
                }
            }
            
            
        </script>
</head>
<body>

    
    <form name="myForm" method="post" action="post_option.php">
        <table border="1" width="800" align="center">
            <tr>
                <td colspan="2">
                    <font>新增選項</font>
                </td>
            </tr>
            <tr>
                <td width=15%>
                    <font>選項名稱</font>
                </td>
                <td width=85%>
                    <input name="option" type="text" size="50">
                </td>
            </tr>
            <tr>
                <td width=15%>
                    <font>內容</font>
                </td>
                <td >
                    <textarea name="text" size="500" cols="5" rows="5" style="width:70%;height:100px;"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" value="新增選項" onClick="_check()">
                    <input type="reset" value="重新輸入">
                </td>
            </tr>
        </table>
    <p align="center"><a href="index.php">回首頁</a></p>
    </form>
    
    
</body>
</html>