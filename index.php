<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>EIRS</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
    <div id="bg">
        <div id="cell"></div>
        <div id="welcome">
            <p id="title" class="words">连接每一个<span>家</span>的故事</p>
            <p id="explain" class="words">
                随时随地任性找房，我们努力为您想更多！我们在这里，等你。</p>
        </div>
        <div id="getIn" class="words">
            <p>
                <span id="login">登&nbsp;&nbsp;&nbsp;录</span>
                <span id="register">注&nbsp;&nbsp;&nbsp;册</span>
            </p>
        </div>
    </div>
    <div id="blackOverlay" class="words animated">
        <div id="loginTab" class="animated fadeIn">
            <i id="cancelBtn" class="fa fa-times-circle fa-3x"></i>
            <h3 class="words">Welcome</h3>
            <form class="form" name="logTab" action="login.php" method="post" onSubmit="return inputCheck()">
                <input type="text" name="phnum" class="text" placeholder="手机号码">
                <input type="password" name="psd" class="text" placeholder="密码">
                <p>
                    <input type="radio" class="radio" name="type" value="0" checked="checked">
                    <span class="radioInput" id="user"></span>用户
                    <input type="radio" class="radio" name="type" value="1">
                    <span class="radioInput" id="administrator"></span>管理员
                </p>
                <button type="submit" id="login-button">登&nbsp;&nbsp;&nbsp;录</button>
            </form>
        </div>
        <div id="registerTab">
            <i id="cancelBtn2" class="fa fa-times-circle fa-3x"></i>
            <h3 class="words">Register</h3>
            <form class="form" name="regTab" action="register.php" method="post" onSubmit="return regCheck()">
                <input type="text" name="name" class="text" placeholder="姓名">
                <input type="text" name="idNum" class="text" placeholder="身份证号">
                <div id="birth">
                    <h5>出&nbsp;&nbsp;&nbsp;&nbsp;生&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;期</h5>
                    <input type="text" class="date" name="year"  placeholder="年">
                    <input type="text" class="date" name="month" placeholder="月">
                    <input type="text" class="date" name="day" placeholder="日">
                </div>
                <p>
                    <input type="radio" class="radio" name="gender" value="1" checked="checked">
                    <span class="radioInput" id="male"></span>男
                    <input type="radio" class="radio" name="gender" value="0">
                    <span class="radioInput" id="female"></span>女
                </p>
                <input type="text" name="email" class="text" placeholder="邮箱">
                <input type="text" name="addr" class="text" placeholder="地址">
                <input type="text" name="tel" class="text" placeholder="手机号码">
                <input type="password" name="psd" class="text" placeholder="密码">
                <input type="password" name="psdAgain" class="text" placeholder="密码">
                <button type="submit" id="reg-button">注&nbsp;&nbsp;&nbsp;册</button>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</html>