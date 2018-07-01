<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>button属性控制表单</title>  
</head>  
<body>  
    <form id="myForm"></form>  
    <p>  
        <label for="username">用户名:</label>  
        <input type="text" name="username" id="username" form="myForm">  
    </p>  
    <p>  
        <label for="address">地址:</label>  
        <input type="text" name="address" id="address" form="myForm">  
    </p>  
    <button type="submit" form="myForm" formaction="http://localhost:8888/form/userInfo" formmethod="post">提交</button>  
    <button type="reset" form="myForm">重置</button>  
</body>  
</html>