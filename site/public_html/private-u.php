<?php
// Страница авторизации

# Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}


# Соединямся с БД
mysql_connect("localhost", "u5088_sps", "u5088_sps");
mysql_select_db("u5088_contracts");

if(isset($_POST['submit']))
{
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysql_query("SELECT user_id, user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");
    $data = mysql_fetch_assoc($query);
    
    # Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {

	   # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
            
        if(!@$_POST['not_attach_ip'])
        {
            # Если пользователя выбрал привязку к IP
            # Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }
        
        # Записываем в БД новый хеш авторизации и IP
        mysql_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
        
        # Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);
        
        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: report.php"); exit(); 	
    }
    else
    {
     //  print "Вы ввели неправильный логин/пароль";
	   header("Location: nopass.html"); exit();
    }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>«ИнЮрКомпани» - официальный сайт юридической компании</title>
<meta name="DESCRIPTION" content="Юридические услуги, Луганск, представление интересов в суде, юрист, в Луганске" />
<meta name="KEYWORDS" content="Юридические услуги, Луганск, представление интересов в суде, юрист, в Луганске" />
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
                     <td>&nbsp; <a href="index-u.php" title="На главную">Головна</a></td>
                    <td>&nbsp; <a href="about-u.php">О компанії</a></td>
                    <td>&nbsp; <a href="#">Пошук</a></td>
                     <FORM METHOD=POST ACTION="/phprusearch/"><td height="50px">&nbsp; <input NAME="query" ACTION="/phprusearch/" type="text" width="100"></td></FORM>
                  </tr>
                </table> 				</td>
    			<td width="54px" background="images/img__04.gif">&nbsp;</td>
				<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="adress" width="90px">Мова сайту:</td>
                    <td class="adress" width="90px"><a href="/private.php">RUS</a><img src="images/flag-rus.jpg" height="50" align="absmiddle"></td>
                    <td class="adress" width="90px"><a href="/private-u.php">UKR</a><img src="images/flag-ukr.jpg" height="50" align="absmiddle"></td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
    			<td width="410" background="images/img__05.jpg">&nbsp;</td>
				<td width="20px">&nbsp;</td>
  			</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td height="250px" colspan="3"  bgcolor="#dcdcdc" background="images/img__11.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 			 <tr>
    			<td height="249px" width="240px" background="images/img__12.gif"><img src="images/spacer.gif" alt="ООО «Юридическая компания «ИнЮрКомпани»" NAME="pic2" width="243" height="250" border="0" usemap="#Map"></td>
				<td width="270px">
				
				<div class="telname">
				<table width="100%" height="249px" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="5" height="85px" background="images/img__9.gif">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td  width="27px" height="29px"><img src="images/img__34.gif" width="29" height="28"></td>
                    <td colspan="4"class="telefon">&nbsp;(099) 418-72-30</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="27px" height="29px"><!--<img src="images/img__34.gif" width="29" height="28"> --></td>
                    <td colspan="4" class="telefon">&nbsp;<!--(095) 567-70-55 --></td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="30px" height="27px">&nbsp;</td>
                    <td width="30px">
						<a href="online-u.php" onMouseOver="document.pic1.src='images/img__60ud.gif'"
						onMouseOut="document.pic1.src='images/img__60u.gif'">
						<img src="images/img__60u.gif" width="203" height="27" dynsrc="images/img__60u.gif" name="pic1" title="Задать свой вопрос прямо сейчас!">									
						</a>
					</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                </table>
				</div>
                <div style="position:relative; left:300px; top:70px;"><img src="images/free-u.gif" width="187" height="95"></div>

				</td>
				<td>&nbsp;</td>
   				<td width="410" background="images/img__10.jpg">&nbsp;</td>
				<td width="20px">&nbsp;</td>
  			</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td height="50px" colspan="3" bgcolor="#990000" background="images/img__24.gif">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
      <tr>
         <td height="50px" width="198px">Загальна інформація</td>
		<td width="1px"  background="images/img__59.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
          <tr>
            <td height="50px">&nbsp;</td>            <td><a href="fiz-u.php">Фізичні особи</a></td>
			<td width="1px"  background="images/img__59.gif">&nbsp;</td>
            <td><a href="jur-u.php">Юридичні особи</a></td>
			<td width="1px"  background="images/img__59.gif">&nbsp;</td>
            <td><a href="private-u.php">Особистий кабінет</a></td>
            <td height="50px">&nbsp;</td>
          </tr>
        </table></td>
		<td width="1px"  background="images/img__59.gif">&nbsp;</td>
        <td height="50px" width="198px">Новини</td>
      </tr>
      </table>
	</td>
  </tr>
  <tr>
    <td width="200px" bgcolor="#dcdcdc" style="border-right:1px solid #bfbfbe; vertical-align:top; padding-top:10px;">
	  	  <div class="leftmenuitem"><a href="http://zakon1.rada.gov.ua/cgi-bin/laws/main.cgi">Законодавство України</a></div>
	  <div class="leftmenuitem"><a href="lug_sud-u.php">Адреси та реквізити судів загальної юрисдикції</a></div>
	  <div class="leftmenuitem"><a href="executive-u.php">Органи державної виконавчої служби</a></div>
	  <div class="leftmenuitem"><a href="procur-u.php">Органи прокуратури</a></div>
	  <div class="leftmenuitem"><a href="mvs-u.php">Органи внутрішніх справ</a></div>
      <div class="leftmenuitem" style="position:relative; top:100px">
	  &nbsp;&nbsp;&nbsp;<embed type="application/x-shockwave-flash" width="160" height="230" src="/images/banner.swf" quality="best" wmode="Window" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
</div>
    </td>
    <td height="100%" style="vertical-align:top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:0px">
  <tr>
    <td colspan="8" class="content">
	<p align="center"><strong>Ваш особистий кабінет</strong></p>

<br><br><br><br>

<form method="POST">
    <table align="center">
        <tr>
          <td rowspan="4"><img src="images/aiok.jpg" width="50px"></td>
            <td rowspan="4">&nbsp;</td>
            <td>Логін:</td>
            <td><input name="login" type="text"></td>
        </tr>
        <tr>
          <td>Пароль:</td>
            <td><input name="password" type="password"></td>
        </tr>
        <tr>
          <td></td>
            <td><input name="submit" type="submit" value="Увійти"></td>
        </tr>
    </table>
</form>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	 <br>
	 <br><br></td>
    </tr>
	  <tr>
    <td height="100%" colspan="8">&nbsp;</td>
    </tr>
  <tr>
    <td height="128px" colspan="3" background="images/img__31.gif"><img src="images/img__29.jpg"></td>
    <td width="86%" colspan="5" background="images/img__31.gif"><div class="telefon" style=" position:relative; top:25px; left:10px">Потрібна допомога?</div></td>
    </tr>
  <tr>
    <td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15px" height="29">&nbsp;</td>
    <td width="29px" background="images/img__13.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">Зателефонуйте</td>
    <td>&nbsp;</td>
    <td width="29px" background="images/img__36.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">Напишіть</td>
    <td>&nbsp;</td>
    <td width="29px" background="images/img__38.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">Приїжджайте</td>
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
  <tr>
    <td height="29">&nbsp;</td>
    <td><img src="images/img__43.gif"></td>
    <td class="adress">(099) 418-72-30</td>
    <td>&nbsp;</td>
    <td><img src="images/img__44.gif" width="29" height="20"></td>
    <td class="adress">...</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="adress">91038, м. Луганськ, вул. Доргомижського 2 Е</td>
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
    <td rowspan="2"><div style="position:relative; top:0px; left:20px; width:200px;"> <a href="contacts-u.php" onMouseOver="document.pic_m.src='images/map_mo.jpg'"
						onMouseOut="document.pic_m.src='images/map.jpg'"> <img src="images/map.jpg" alt="Мы на карте" width="200" height="40" name="pic_m" title="Мы на карте"></a></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
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
 </td>
    <td width="200px" bgcolor="#dcdcdc" style="border-left:1px solid #bfbfbe; vertical-align:top; padding-top:10px;">
		<table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10px">&nbsp;</td>
    <td><?  $url='http://news.liga.net/all/rss.xml' ;  // УКАЗЫВАЕТЕ АДРЕС КАНАЛА КОТОРЫЙ НАДО ЧИТАТЬ И ПОКАЗАТЬ У ВАС НА САЙТЕ.
		include ('lib/readerrss_utf8_win1251.php'); // ПОДКЛЮЧАЕТЕ ФАЙЛ ЧИТАЮЩИИ RSS КАНАЛ И ВЫВОДЯЩИИ НА ЭКРАН.
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
    <td>© iyc.com.ua - 2012</td>
    <td style="padding-right:10px; text-align:right; text-decoration:underline;" width="200px"><a href="aconnect.php" title="Панель администратора">APanel</a></td>
  </tr>
</table>
</td>
  </tr>
</table>


<map name="Map">
<area shape="poly" coords="49,145,76,121,88,35,177,35,208,203,119,203,49,166" href="index-u.php" target="_self" onMouseOver="document.pic2.src='images/img__12d.gif'" onMouseOut="document.pic2.src='images/img__12.gif'" title="На главную">
</map></body>
</html>
