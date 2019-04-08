<?
header('Content-Type: text/html; charset=UTF-8');
?>

<html lang="ja">
<body>


<?php

ini_set('mbstring.internal_encoding' , 'UTF-8');

echo var_dump($_FILES["pictures"]["error"]);
if(isset($_FILES)){
	foreach ($_FILES["pictures"]["error"] as $key => $error) {
	    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
	        // basename() で、ひとまずファイルシステムトラバーサル攻撃は防げるでしょう。
	        // ファイル名についてのその他のバリデーションも、適切に行いましょう。
	        $name = basename($_FILES["pictures"]["name"][$key]);

	        move_uploaded_file($tmp_name, "data/".$name);
	    }else{
	    	echo "エラーが発生しました";
	    }
	}
}
?>

<form action="" method="post" enctype="multipart/form-data">
<p>Pictures:
<input type="file" name="pictures[]" />
<input type="submit" value="Send" />
</p>

</form>
</body>
</html>