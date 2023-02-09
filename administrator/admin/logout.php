<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Đăng xuất tài khoản</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <style>
        *{
            box-sizing: border-box; 
            margin: 0;
            padding: 0;
        }

        html{
            width: 100%;
            height: 100vh;
            font-family: "Lato", Arial, sans-serif;
        }

        .cen{
            height: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        .cen a{
            margin-top: 12px;
            text-decoration: none;
            min-width: 120px;
            padding: 12px 20px;
            color: #fff;
            background-color: #01d28e;
            border-radius: 5px;
        }

        .cen a:hover{
            background-color: #00a16b;
        }

        .box-content {
            margin: 0 auto;
            width: 100%;
            height: 100vh;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    unset($_SESSION['current_user']);
    ?>
    <div id="user_logout" class="box-content">
        <div class="cen">
            <h1>Đăng xuất tài khoản thành công</h1>
            <a href="../../login/login.php">Đăng nhập lại</a>
        </div>
    </div>
</body>

</html>