<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>파일 다운로드</title>
		<style>
		ul{
			list-style:none;
		}
		li {
			float: left;
		}
		</style>
</head>

<body>
<div id = file_down>
	<span><?="<a href='/ci_test/index.php/file_down/file_down'>zip 다운로드</a>"?></sapn>
	<?php print_r($_FILES);?>
</div>
<br>
<div id = image_down>
	<ul>
		<li>
			<div class="img1"><img src="/ci_test/file/1png.png" width="" height="" alt="쿠로미" /></div>
			<span><?="<a href='/ci_test/index.php/file_down/image_down?name=1'>💙쿠로미 사진 다운로드💙</a>"?></sapn>
			<!-- <span><?="<a href='/ci_test/index.php/file_down/image_down?name={$name}'>💙쿠로미 사진 다운로드💙</a>"?></sapn> -->
		</li>
		<li>
			<div class="img2"><img src="/ci_test/file/2png.png" width="" height="" alt="마이멜로디" /></div>
			<span><?="<a href='/ci_test/index.php/file_down/image_down?name=2'>💗마이멜로디 사진 다운로드💗</a>"?></sapn>
		</li>
		<li>
			<div class="img3"><img src="/ci_test/file/3png.png" width="" height="" alt="폼폼푸린" /></div>
			<span><?="<a href='/ci_test/index.php/file_down/image_down?name=3'>💛폼폼푸린 사진 다운로드💛</a>"?></sapn>
		</li>
		<li>
			<div class="img4"><img src="/ci_test/file/4png.png" width="" height="" alt="시나몬롤" /></div>
			<span><?="<a href='/ci_test/index.php/file_down/image_down?name=4'>🤍시나몬롤 사진 다운로드🤍</a>"?></sapn>
		</li>
	</ul>
	
</div>
</body>
</html>
