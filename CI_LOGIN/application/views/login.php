<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<head>
<title>로그인</title>
<script src="http://code.jquery.com/jquery-latest.js" type='text/javascript'></script>
</head>

<body>
<h1>login</h1>
	<?php
		//폼 헬퍼 (form helper)을 이용
		//Auth 컨트롤러는 check_if_valid()가 true 일때 호출
		$submit_attributes =
		array('onsubmit'=>"return check_if_valid();", 'id' => 'Auth');
		echo form_open('Auth',$submit_attributes);//ci form helper

		echo"<table><tr><td>";
		echo form_label("User Name");
		echo"</td></td>";
		echo form_input(array('name'=>'user_name','value'=>''));
		echo "</td><td>";

		//에러 메세지
		echo "<label id='user_name_err' style='color:red; display:none'>name is too short</label>";
		echo "</td></tr>";

		echo '<tr><td>';
		echo form_label("password");
		echo "</td>,<td>";
		echo form_password("password","");
		echo "</td><td>";

		//에러 메세지
		echo "<label id='passeowf_err' style ='color:red; display:none'>name is too short</label>";
		echo "</td></tr>";
		echo "</table>";

		//전송버튼
		echo form_input(array('type'=>'submit',
								'value' => 'login'));
		echo form_close();
	?>

	<HR></HR>
	<!-- 인증작업 실패메세지 -->
	<p style="color:red"><?php echo $msg; ?></p>
</body>
	<!-- javascript -->
	<script type='text/javascript'>

		function check_if_valid(){
			var submit = true;
			var user_name = $('[name="user_name"]').val();//.val은 jquery에서 form의 값을 가져오거나 설정하는 메소드
			var password = $('[name="password"]').val();

			if(user_name.length < 2){
				$(#user_name_err).show();
				submit = false;
			}
			else
				$('#user_name_err').hide();

			if(password.length < 6){
				$('#password_err').show();
				submit = false;
			}
			else $('#password_err').hide();

			return submit;
		}
	</script>
</html>
<!--
	login은 로그인하지 않은 사용자에게 보여지는 페이지로 Auth/index메소드가 렌더링됨
-->