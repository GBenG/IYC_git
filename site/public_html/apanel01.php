<?php

// �������� ����������� ������ ������������

# ���������� � ��
mysql_connect("localhost", "u158376855_sps", "u5088_sps");
mysql_select_db("u158376855_iyc");

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{     

if(isset($_POST['fqw_submit']))
{
	$url = 'http://www.iyc.com.ua/apanel01.php'; 
	header("Location: $url");	
}

if(isset($_POST['qw_submit']))
{
	$url = 'http://www.iyc.com.ua/apanel01.php'; 
	header("Location: $url");	
}


if(isset($_POST['submit']))
{
    $err = array();
	
    # �������� �����
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
     //   $err[] = "����� ����� �������� ������ �� ���� ����������� �������� � ����";
	 header("Location: reg_error.html"); exit();
    }
    
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
       // $err[] = "����� ������ ���� �� ������ 3-� �������� � �� ������ 30";
	   header("Location: reg_error.html"); exit();
    }
    
    # ���������, �� ��������� �� ������������ � ����� ������
    $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");
    if(mysql_result($query, 0) > 0)
    {
      //  $err[] = "������������ � ����� ������� ��� ���������� � ���� ������";
	  header("Location: reg_error.html"); exit();
    }
    
    # ���� ��� ������, �� ��������� � �� ������ ������������
    if(count($err) == 0)
    {
        $surname = $_POST['surname'];
		$name = $_POST['name'];
		$fname = $_POST['fname'];
		$dnumber = $_POST['dnumber'];
		$situation = $_POST['situation'];
        
		$login = $_POST['login'];
        
        # ������� ������ ������� � ������ ������� ����������
        $password = md5(md5(trim($_POST['password'])));
        
        mysql_query("INSERT INTO users SET user_login='".$login."', user_password='".$password."', surname='".$surname."', name='".$name."', fname='".$fname."', dnumber='".$dnumber."', situation='".$situation."'");
        header("Location: newok.html"); exit();
    }
    else
    {
       // print "<b>��� ����������� ��������� ��������� ������:</b><br>";
        foreach($err AS $error)
        {
        //    print $error."<br>";
		header("Location: reg_error.html"); exit();
        }
    }
}
}
else {header("Location: ap_error.html"); exit();}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>����������� ������ �������, �������, ������������� ��������� � ����, ���������� ���������� �����, ����������� ������, ��������� ������, �������� ������, ����������� ��������, ���, ������� ���������, ��������, ������, ������������, ��������, �������, ��������� ����� �������������, �����, ������������� ������, ����������� ������������, ����������� �����, ������ �������, ������������ ������������, ������������ �����, �������� ����, ����������� ����, ������������� ����, �������� �������, �������� ������, ���������, ���, �������-������������ ������������ , ��������� � ���, ����������� ������������ �������, �����������, ����������� ����� �������, ������, ��������, ���������� ������������� �� ����� �������������, ����������, �������, ����, ����������� �������, ������������� �������</title>
<meta name="DESCRIPTION" content="����������� ������, ����������� ������������, ��� ������������ �������� ������������,  ����������� ������������, ������������� �����������, ������������� ��������� ������� � ����" />
<meta name="KEYWORDS" content="����������� ������, ����������� ������������, ��� ������������ �������� ������������,  ����������� ������������, ������������� �����������, ������������� ��������� ������� � ����" />
<meta http-equiv="cache-control" content="no-cache" />
<link type="text/css" rel="stylesheet" href="css/iyc.css"/>
<link rel="shortcut icon" href="images/iyc.ico" />
<script type="text/javascript" src="/ua/scripts/swfobject.js"></script>
</head>

<body marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50px" colspan="3" bgcolor="#dcdcdc" background="images/img__06.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  			<tr>
    			<td height="50px" width="456px" bgcolor="#990000" background="images/img__24.gif">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
                  <tr>
                    <td width="170"><a href="index.php">�������� �� ����</a></td>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                    <td height="50px">&nbsp; </td>
                  </tr>
                </table> 				</td>
    			<td width="54px" background="images/img__04.gif">&nbsp;</td>
				<td>&nbsp;</td>
    			<td width="410">&nbsp;</td>
				<td width="20px">&nbsp;</td>
  			</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td height="250px" colspan="3"  bgcolor="#dcdcdc" background="images/img__11.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 			 <tr>
    			<td height="249px" width="240px">
				<div class="compname" style="position:relative; left:50px; width:120px;"><img src="images/orange_extra.png"></div>
				<div class="compname" style="position:relative; left:50px; width:250px;">������ ��������������</div>
				<div class="date" style="position:relative; left:50px; width:250px;">v.2.8</div>
			</td>
				<td width="270px">
			
			   </td>
				<td></td>
   				<td width="410">
				<div class="compname" style="position:relative; left:50px;  width:120px;"><img src="images/mailbox.png" width="118" height="128"></div>
			<div class="compname" style="position:relative; left:50px; width:250px;"><a href="http://www.mail.ru" target="_blank">iyc.com.ua@mail.ru</a>
			</div><div class="date" style="position:relative; left:50px; width:250px;">.</div>
				</td>
				<td width="20px">&nbsp;</td>
  			</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td height="50px" colspan="3" bgcolor="#990000" background="images/img__24.gif">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
      <tr>
        <td height="50px" width="198px">�������� �������</td>
		<td width="1px"  background="images/img__59.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
          <tr>
            <td height="50px">&nbsp;</td>

            <td>&nbsp;&nbsp;</td>
			<td width="1px"  background="images/img__59.gif">&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
			<td width="1px"  background="images/img__59.gif">&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td height="50px">&nbsp;</td>
          </tr>
        </table></td>
		<td width="1px"  background="images/img__59.gif">&nbsp;</td>
        <td height="50px" width="198px">�������</td>
      </tr>
      </table>
	</td>
  </tr>
  <tr>
    <td width="200px" bgcolor="#dcdcdc" style="border-right:1px solid #bfbfbe; vertical-align:top; padding-top:10px;">	  
	  <div class="leftmenuitem"><a href="#1">������� ����� ������ �������</a></div>
	  <div class="leftmenuitem"><a href="#2">������������� ����� ������������� �������</a></div>
	  <div class="leftmenuitem"><a href="#3">�������� ����� ������������ �� ����</a></div>
	  <div class="leftmenuitem"><a href="#4">�������� "������-�����"</a></div>


    </td>
    <td height="100%" style="vertical-align:top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:0px">
  <tr>
    <td colspan="8" class="content">
<a name="1"></a>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50px"><img src="images/plus.png" width="50" height="50"></td>
    <td width="94%"><p align="center"><strong>������� ����� ������ �������</strong></p></td>
  </tr>
</table>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><hr>
<div>
<form method="POST">
<table width="100%" border="0" cellspacing="6" cellpadding="0">
  <tr>
    <td width="150px">�����</td>
    <td><input name="login" type="text" style="width:500px;"></td>
  </tr>
  <tr>
    <td>������</td>
    <td><input name="password" type="password" style="width:500px;"></td>
  </tr>
  <tr>
    <td colspan="2" height="20px">&nbsp;</td>
    </tr>
  <tr>
    <td>������� �� ����</td>
    <td><input name="surname" type="text" style="width:500px;"></td>
  </tr>
  <tr>
    <td>������� �����</td>
    <td><input name="name" type="text" style="width:500px;"></td>
  </tr>
  <tr>
    <td>�����������</td>
    <td><input name="fname" type="text" style="width:500px;"></td>
  </tr>
  <tr>
    <td>���� ��������</td>
    <td><input name="dnumber" type="text" style="width:500px;"></td>
  </tr>
  <tr>
    <td >����������� ������</td>
    <td><textarea name="situation" style="width:500px;"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><input name="submit" type="submit" value="�������"></td>
    </tr>
</table>
</form>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><br><hr><br><br><a name="2"></a>
	<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50px"><img src="images/change.png" width="50" height="50"></td>
    <td width="94%"><p align="center"><strong>������������� ����� ������������� �������</strong></p></td>
  </tr>
</table>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><br><hr>
<br><br>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div>
<? 
  
/* ����������� � ����� ������ */
$hostname = "localhost"; // ��������/���� �������, � MySQL 
$username = "u5088_sps"; // ��� ������������ (� Denwer`� �� ��������� "root") 
$password = "u5088_sps"; // ������ ������������ (� Denwer`� �� ��������� ������ �����������, ���� �������� ����� �������� ������) 
$dbName = "u5088_contracts"; // �������� ���� ������ 
  
/* ������� MySQL, � ������� �������� ������ */
$table = "users"; 
  
/* ������� ���������� */
mysql_connect($hostname, $username, $password) or die ("�� ���� ������� ����������"); 
  
/* �������� ���� ������. ���� ���������� ������ - ������� �� */
mysql_select_db($dbName) or die (mysql_error()); 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
/* ���� ���� ������ ������ ��������������, ������ ��������� */
if(isset($_POST['submit_edit']))
{

	$nem = $_POST['name'];
	$sur = $_POST['surname'];
	$eml = $_POST['fname'];
	$tem = $_POST['dnumber'];
	$mes = $_POST['situation'];
	$n = $_POST['update'];

//	mysql_query("UPDATE `u5088_contracts`.`test_table` SET `message` = '".$a."' WHERE `test_table`.`id` =1");
	mysql_query("UPDATE `u5088_contracts`.`users` SET `name` = '".$nem."', `surname` = '".$sur."', `fname` = '".$eml."',
`dnumber` = '".$tem."',`situation` = '".$mes."' WHERE `users`.`user_id` ='".$n."'");

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
/* ������� � ���������� $res ��� ���� ������ */
$query = "SELECT * FROM $table"; 
/* ��������� ������. ���� ���������� ������ - ������� ��. */
$res = mysql_query($query) or die(mysql_error()); 
/* ������ ���������� ������� � ���� ������ */
$row = mysql_num_rows($res); 

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{     
 
/* ���� ������ ������ �� ���� ���������� ����� */
while ($row = mysql_fetch_array($res)) { 
    echo "<form action=\"apanel01.php\" method=\"post\" name=\"edit_form\">\n"; 
    echo "<input type=\"hidden\" name=\"update\" value=\"".$row["user_id"]."\" />\n"; 
    echo "<table border=0 cellspacing=6 cellpadding=0 width=100% align=left>\n";
    echo "<tr>\n"; 
	
    echo "<td colspan=\"2\" style=\"border-bottom:solid 1px #CCCCCC;\"><i><div id=\"num\">".$row["user_id*"]."</div><b>".$row['user_login']."</b></i></td>\n"; 
    echo "</tr><tr>\n"; 
	
	echo "<td>������� �� ����:</td><td><input style=\"width:500px\" type=\"text\" value=\"".$row['surname']."\" name=\"surname\" /></td>\n"; 
    echo "</tr><tr>\n"; 
	
	echo "<td width=\"150px\">������� �����:</td><td><input style=\"width:500px\" type=\"text\" value=\"".$row['name']."\" name=\"name\" /></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td>�����������:</td><td><input style=\"width:500px\" type=\"text\" value=\"".$row['fname']."\" name=\"fname\" /></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td>���� ��������:</td><td><input style=\"width:500px\" type=\"text\" value=\"".$row['dnumber']."\" name=\"dnumber\" /></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td>����������� ������:</td><td><textarea style=\"width:500px\" name=\"situation\">".$row['situation']."</textarea></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"submit_edit\" class=\"buttons\" value=\"��������� ���������\" /></td>\n"; 
	
    echo "</tr></table></form>\n\n"; 
} 

	}
  
/* ��������� ���������� */
mysql_close(); 
  
/* ������� ������ �������� 
echo ("<div style=\"text-align: center; margin-top: 10px;\"><a href=\"index.html\">��������� �����</a></div>"); 
*/  
?>
<br>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><br><hr><br><br><a name="3"></a>
	<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50px"><img src="images/clear.png" width="50" height="50"></td>
    <td width="94%"><p align="center"><strong>�������� ����� ������������ �� ����</strong></p></td>
  </tr>
</table>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><br><hr>
<br><br>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div>
<? 
  
/* ����������� � ����� ������ */
$hostname = "localhost"; // ��������/���� �������, � MySQL 
$username = "u5088_sps"; // ��� ������������ (� Denwer`� �� ��������� "root") 
$password = "u5088_sps"; // ������ ������������ (� Denwer`� �� ��������� ������ �����������, ���� �������� ����� �������� ������) 
$dbName = "u5088_contracts"; // �������� ���� ������ 
  
/* ������� MySQL, � ������� �������� ������ */
$table = "users"; 
  
/* ������� ���������� */
mysql_connect($hostname, $username, $password) or die ("�� ���� ������� ����������"); 
  
/* �������� ���� ������. ���� ���������� ������ - ������� �� */
mysql_select_db($dbName) or die (mysql_error()); 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
/* ���� ���� ������ ������ ��������������, ������ ��������� */
if(isset($_POST['submit_del']))
{

	$nem = $_POST['name'];
	$sur = $_POST['surname'];
	$eml = $_POST['fname'];
	$tem = $_POST['dnumber'];
	$mes = $_POST['situation'];
	$n = $_POST['update'];

	mysql_query("DELETE FROM `u5088_contracts`.`users` WHERE `users`.`user_id` ='".$n."'");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
/* ������� � ���������� $res ��� ���� ������ */
$query = "SELECT * FROM $table"; 
/* ��������� ������. ���� ���������� ������ - ������� ��. */
$res = mysql_query($query) or die(mysql_error()); 
/* ������ ���������� ������� � ���� ������ */
$row = mysql_num_rows($res); 
  
 if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{     
/* ���� ������ ������ �� ���� ���������� ����� */
while ($row = mysql_fetch_array($res)) { 
    echo "<br><form action=\"apanel01.php\" method=\"post\" name=\"edit_form\">\n"; 
    echo "<input type=\"hidden\" name=\"update\" value=\"".$row["user_id"]."\" />\n"; 
    echo "<table border=0 cellspacing=6 cellpadding=0 align=left>\n";
    echo "<tr>\n"; 
	
    echo "<td width=\"150px\" colspan=\"2\" style=\"border-bottom:solid 1px #CCCCCC;\"><i><div id=\"num\">".$row["user_id*"]."</div><b>".$row['user_login']."</b></i></td>\n"; 

    echo "<td width=\"100px\"><input type=\"submit\" name=\"submit_del\" class=\"buttons\" value=\"�������\" /></td>\n"; 
	
    echo "</tr></table></form><br>\n\n"; 
} 
  }
/* ��������� ���������� */
mysql_close(); 
  
/* ������� ������ �������� 
echo ("<div style=\"text-align: center; margin-top: 10px;\"><a href=\"index.html\">��������� �����</a></div>"); 
*/  
?>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><br><hr><br><br><a name="4"></a>
	<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50px"><img src="images/Reflectivemail.jpg" width="50" height="50"></td>
    <td width="94%"><p align="center"><strong>�������� "������-�����"</strong></p></td>
  </tr>
</table>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><br><hr>
<br><br>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div>
<p align="left"><strong>����� �������</strong><br><br>
<? 
  
/* ����������� � ����� ������ */
$hostname = "localhost"; // ��������/���� �������, � MySQL 
$username = "u5088_sps"; // ��� ������������ (� Denwer`� �� ��������� "root") 
$password = "u5088_sps"; // ������ ������������ (� Denwer`� �� ��������� ������ �����������, ���� �������� ����� �������� ������) 
$dbName = "u5088_contracts"; // �������� ���� ������ 
  
/* ������� MySQL, � ������� �������� ������ */
$table = "premod"; 
  
/* ������� ���������� */
mysql_connect($hostname, $username, $password) or die ("�� ���� ������� ����������"); 
  
/* �������� ���� ������. ���� ���������� ������ - ������� �� */
mysql_select_db($dbName) or die (mysql_error()); 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
/* ���� ���� ������ ������ ��������������, ������ ��������� */
if(isset($_POST['qw_submit']))
{
//	echo '�������� ������ - �';
	
	$qfio = $_POST['qw_fio'];
	$qmmessage = $_POST['qw_mmessage'];
	$qotvet = $_POST['qw_otvet'];
	$m = $_POST['upoch'];
	
	
	mysql_query("INSERT INTO `u5088_contracts`.`postfaq` (`id`, `fio`, `mmessage`, `otvet`) VALUES (NULL, '".$qfio."', '".$qmmessage."', '".$qotvet."')");
	mysql_query("DELETE FROM `u5088_contracts`.`premod` WHERE `premod`.`id` ='".$m."'");

}
if(isset($_POST['qw_submit_del']))
{

	$m = $_POST['upoch'];
	
	mysql_query("DELETE FROM `u5088_contracts`.`premod` WHERE `premod`.`id` ='".$m."'");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
/* ������� � ���������� $res ��� ���� ������ */
$query = "SELECT * FROM $table"; 
/* ��������� ������. ���� ���������� ������ - ������� ��. */
$res = mysql_query($query) or die(mysql_error()); 
/* ������ ���������� ������� � ���� ������ */
$row = mysql_num_rows($res); 
  
  if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{     
 
/* ���� ������ ������ �� ���� ���������� ����� */
while ($row = mysql_fetch_array($res)) { 
    echo "<form action=\"apanel01.php\" method=\"post\" name=\"edit_form\">\n"; 
    echo "<input type=\"hidden\" name=\"upoch\" value=\"".$row["id"]."\" />\n"; 
    echo "<table border=0 cellspacing=6 cellpadding=0 width=100% align=left>\n";
    echo "<tr>\n"; 
	
    echo "<td colspan=\"2\" style=\"border-bottom:solid 1px #CCCCCC;\"><i><div id=\"num\">".$row["user_id*"]."</div><b>".$row['user_login']."</b></i></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td width=\"150px\" >���:</td><td><input style=\"width:500px\" type=\"text\" value=\"".$row['fio']."\" name=\"qw_fio\" class=\"lblock_red\" /></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td>������:</td><td><textarea style=\"width:500px\" name=\"qw_mmessage\" class=\"lblock_red\">".$row['mmessage']."</textarea></td>\n"; 
    echo "</tr><tr>\n"; 
	
	echo "<td>�����:</td><td><textarea style=\"width:500px\" name=\"qw_otvet\" class=\"lblock_red\">".$row['otvet']."</textarea></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"qw_submit\" class=\"buttons\" value=\"��������\" />
	<input type=\"submit\" name=\"qw_submit_del\" class=\"buttons\" value=\"�������\" /></td>\n"; 
	
    echo "</tr></table></form>\n\n"; 
} 
  }
/* ��������� ���������� */
mysql_close(); 
  

?>

<p align="left"><strong>������������ �������</strong><br><br>

<!--##################################################################################################################################################### -->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--##################################################################################################################################################### -->
<? 
  
/* ����������� � ����� ������ */
$hostname = "localhost"; // ��������/���� �������, � MySQL 
$username = "u5088_sps"; // ��� ������������ (� Denwer`� �� ��������� "root") 
$password = "u5088_sps"; // ������ ������������ (� Denwer`� �� ��������� ������ �����������, ���� �������� ����� �������� ������) 
$dbName = "u5088_contracts"; // �������� ���� ������ 
  
/* ������� MySQL, � ������� �������� ������ */
$table = "postfaq"; 
  
/* ������� ���������� */
mysql_connect($hostname, $username, $password) or die ("�� ���� ������� ����������"); 
  
/* �������� ���� ������. ���� ���������� ������ - ������� �� */
mysql_select_db($dbName) or die (mysql_error()); 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
/* ���� ���� ������ ������ ��������������, ������ ��������� */
if(isset($_POST['fqw_submit']))
{
//	echo '�������� ������ - �';
	
	$fqfio = $_POST['fqw_fio'];
	$fqmmessage = $_POST['fqw_mmessage'];
	$fqotvet = $_POST['fqw_otvet'];
	$fm = $_POST['fupoch'];
	
mysql_query("UPDATE `u5088_contracts`.`postfaq` SET `fio` = '".$fqfio."', `mmessage` = '".$fqmmessage."', `otvet` = '".$fqotvet."' WHERE `postfaq`.`id` ='".$fm."'");
	$url = 'http://www.iyc.com.ua/apanel01.php'; 
	header("Location: $url");	
}
if(isset($_POST['fqw_submit_del']))
{

	$fm = $_POST['fupoch'];
	
	mysql_query("DELETE FROM `u5088_contracts`.`postfaq` WHERE `postfaq`.`id` ='".$fm."'");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
/* ������� � ���������� $res ��� ���� ������ */
$query = "SELECT * FROM $table"; 
/* ��������� ������. ���� ���������� ������ - ������� ��. */
$res = mysql_query($query) or die(mysql_error()); 
/* ������ ���������� ������� � ���� ������ */
$row = mysql_num_rows($res); 
  
 if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{     
/* ���� ������ ������ �� ���� ���������� ����� */
while ($row = mysql_fetch_array($res)) { 
    echo "<form action=\"apanel01.php\" method=\"post\" name=\"edit_form\">\n"; 
    echo "<input type=\"hidden\" name=\"fupoch\" value=\"".$row["id"]."\" />\n"; 
    echo "<table border=0 cellspacing=6 cellpadding=0 width=100% align=left>\n";
    echo "<tr>\n"; 
	
    echo "<td colspan=\"2\" style=\"border-bottom:solid 1px #CCCCCC;\"><i><div id=\"num\">".$row["user_id*"]."</div><b>".$row['user_login']."</b></i></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td width=\"150px\" >���:</td><td><input style=\"width:500px\" type=\"text\" value=\"".$row['fio']."\" name=\"fqw_fio\" class=\"lblock_grn\" /></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td>������:</td><td><textarea style=\"width:500px\" name=\"fqw_mmessage\" class=\"lblock_grn\">".$row['mmessage']."</textarea></td>\n"; 
    echo "</tr><tr>\n"; 
	
	echo "<td>�����:</td><td><textarea style=\"width:500px\" name=\"fqw_otvet\" class=\"lblock_grn\">".$row['otvet']."</textarea></td>\n"; 
    echo "</tr><tr>\n"; 
	
    echo "<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"fqw_submit\" class=\"buttons\" value=\"��������\" />
	<input type=\"submit\" name=\"fqw_submit_del\" class=\"buttons\" value=\"�������\" /></td>\n"; 
	
    echo "</tr></table></form>\n\n"; 
} 
  }
/* ��������� ���������� */
mysql_close(); 
  

?>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br><br><hr><br><br><a name="3"></a>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
</td>
    </tr>
	  <tr>
    <td height="100%" colspan="8">&nbsp;</td>
    </tr>
  <tr>
    <td height="128px" colspan="3" background="images/img__31.gif"><img src="images/img__29.jpg"></td>
    <td width="86%" colspan="5" background="images/img__31.gif"><div class="telefon" style=" position:relative; top:25px; left:10px">����� ������?</div></td>
    </tr>
  <tr>
    <td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15px" height="29">&nbsp;</td>
    <td width="28px" background="images/img__13.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">���������</td>
    <td>&nbsp;</td>
    <td width="29px" background="images/img__36.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">��������</td>
    <td>&nbsp;</td>
    <td width="29px" background="images/img__38.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">����������</td>
    <td width="15px">&nbsp;</td>
  </tr>
  <tr>
    <td height="5">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td background="images/img__61.gif">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="5">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>    <td height="29">&nbsp;</td>
    <td><img src="images/img__43.gif"></td>
    <td class="adress">(099) 418-72-30</td>
    <td>&nbsp;</td>
    <td><img src="images/img__44.gif" width="29" height="20"></td>
    <td class="adress">...</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="adress">91038, �. �������, ��. ������������� 2 �</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td></td>
    <td class="adress"></td>
    <td>&nbsp;</td>
    <td><img src="images/img__49.gif" width="29" height="20"></td>
    <td class="adress">...</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="2"><div style="position:relative; top:0px; left:20px; width:200px;"> <a href="contacts.php" onMouseOver="document.pic_m.src='images/map_mo.jpg'"
						onMouseOut="document.pic_m.src='images/map.jpg'"> <img src="images/map.jpg" alt="�� �� �����" name="pic_m" width="200" height="40" border="0" title="�� �� �����"></a></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><img src="images/img__51.gif" width="29" height="20"></td>
    <td class="adress">iyc.com.ua@mail.ru</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="5">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></td>
    </tr>
</table> 
�</td>
    <td width="200px" bgcolor="#dcdcdc" style="border-left:1px solid #bfbfbe; vertical-align:top; padding-top:10px;">
		<table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10px">&nbsp;</td>
    <td><?  $url='http://news.liga.net/all/rss.xml' ;  // ���������� ����� ������ ������� ���� ������ � �������� � ��� �� �����.
		include ('lib/readerrss_utf8_win1251.php'); // ����������� ���� �������� RSS ����� � ��������� �� �����.
		?></td>
    <td width="10px">&nbsp;</td>
  </tr>
</table>

		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50px" colspan="3" bgcolor="#990000" background="images/img__24.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
  <tr>
    <td style="padding-left:10px; text-align:left" width="200px">&nbsp;Design by S.P.S</td>
    <td>� iyc.com.ua - 2012</td>
    <td style="padding-right:10px; text-align:right; text-decoration:underline;" width="200px"><a href="aconnect.php" title="������ ��������������">APanel</a></td>
  </tr>
</table>
</td>
  </tr>
</table>


</body>
</html>
