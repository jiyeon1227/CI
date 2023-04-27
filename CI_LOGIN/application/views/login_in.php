<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>로그인</title>
<head>
</head>

<body>
<h1><?=$user_name; ?>님 안녕하세요!</h1>
<h2>로그인 되었습니다.</h2>
<hr></hr>
<h3>Your User ID is: <?=$uid; ?></h3>
<h3>Your System Role is: <?=$role; ?></h3>
<h3>Your Menu options: <?=$menu; ?></h3>

<?php echo anchor ('Auth/logout','Logout') ?>

</body>
</html>