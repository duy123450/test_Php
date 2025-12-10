<?php
function postIndex($index, $value="")
{
	if (!isset($_POST[$index]))	return $value;
	return trim($_POST[$index]);
}

function checkUserName($string)
{
	if (preg_match("/^[a-zA-Z0-9._-]*$/",$string)) 
	  return true;
	return false;
}


function checkEmail($string)
{  echo $string;
	if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $string))
	 return true;
	return false;	
	
}

$sm = postIndex("submit");
$username = postIndex("username");
$email = postIndex("email");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab6_3</title>
<style>
fieldset{width:50%; margin:100px auto;}
.info{width:600px; color:#006; background:#6FC; margin:0 auto}
#frm1 input{width:300px}
</style>
</head>

<body>
<fieldset>
<legend style="margin:0 auto">Đăng ký thông tin </legend>
<form action="lab06_3.php" method="post" enctype="multipart/form-data" id='frm1'>
<table  align="center">
    <tr>
      <td width="88">UserName</td>
      <td width="317"><input type="text" name="username" value="<?php echo $username;?>"/>*</td></tr>
       <tr>
      <td>Mật khẩu</td>
      <td><input type="text" name="password"  />*</td></tr>
       <tr>
      <td>Email</td>
      <td><input type="text" name="email"  value="<?php echo $email;?>"  />*</td></tr>
       <tr>
      <td>Ngày sinh</td>
      <td><input type="text" name="date"  />*</td></tr>
       <tr>
      <td>Điện thoại</td>
      <td><input type="text" name="phone"  /></td></tr>
      
      <tr><td colspan="2" align="center"><input type="submit" value="submit" name="submit"></td></tr>
</table>
</form>
</fieldset>

<?php

if ($sm !="")
{
	?>
    <div class="info">Lỗi<br />
    	<?php 
		
		if (checkUserName($username)==false) 
			echo "Username: Các ký tự được phép: a-z, A-Z, số 0-9, ký tự ., _ và - <br>";
		if (checkEmail($email)==false) 
			echo "Định dạng email sai!<br>";
		?>
		
    </div>
    <?php

}
?>
</body>
</html>
