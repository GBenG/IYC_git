<?php
// ������ ��������

# ���������� � ��
$link = mysqli_connect("localhost", "u158376855_sps", "u5088_sps") or die( mysql_error() );
mysqli_select_db($link, "u158376855_iyc");

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{   
    $query = mysqli_query($link,"SELECT *,INET_NTOA(user_ip) AS user_ip FROM admins WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
 or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "��, ���-�� �� ����������";
    }
    else
    {
  //      print "������, ".$userdata['user_login'].". �� ��������!";
		if($userdata['user_loginh'] !== 'ADMIN')
		{
		header("Location: apanel01.php"); exit(); 
		}	
    }
}
else
{
    print "�������� ����";
} 
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>CHECK</title>
</head>

<body>

</body>
</html>
