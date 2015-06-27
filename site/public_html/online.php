<?php

// Страница регистрации нового пользователя

# Соединямся с БД
mysql_connect("localhost", "u5088_sps", "u5088_sps");
mysql_select_db("u5088_contracts");


if(isset($_POST['submit_q']))
{
    $err = array();
	
    # проверям капчу
    if(!preg_match("/4dqrzm/",$_POST['txt_capch']))
    {
     //   $err[] = "Логин может состоять только из букв английского алфавита и цифр";//
//	 header("Location: reg_error.html"); exit();
    }
    
    # Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        $tfio = $_POST['txt_fio'];
		$tmess = $_POST['txt_mess'];
        
       
        mysql_query("INSERT INTO premod SET fio='".$tfio."', mmessage='".$tmess."'");
        header("Location: qweok.html"); exit();
    }
    else
    {
       // print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
        //    print $error."<br>";
		header("Location: reg_error.html"); exit();
        }
    }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Юридические услуги Луганск, адвокат, представление интересов в суде, возмещение морального вреда, гражданский кодекс, налоговый кодекс, трудовой кодекс, юридическая компания, суд, исковое заявление, алименты, развод, наследование, нотариус, договор, признание права собственности, юрист, хозяйственный кодекс, абонентское обслуживание, расторжение брака, юристы Луганск, приватизация недвижимости, приватизация земли, судебный спор, гражданские дела, хозяйственные дела, адвокаты Луганск, правовая помощь, завещание, ДТП, дорожно-транспортное происшествие , заявление в суд, юридическая консультация Луганск, инюркомпани, юридическая фирма Луганск, сделки, договоры, оформление свидетельства на право собственности, увольнение, выговор, КЗоТ, гражданский процесс, хозяйственный процесс</title>
<meta name="DESCRIPTION" content="Юридические услуги, юридические консультации, ООО «Юридическая компания «ИнЮрКомпани»,  Юридическое обслуживание, сопровождение организаций, Представление интересов граждан в суде" />
<meta name="KEYWORDS" content="Юридические услуги, юридические консультации, ООО «Юридическая компания «ИнЮрКомпани»,  Юридическое обслуживание, сопровождение организаций, Представление интересов граждан в суде" />
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
                    <td>&nbsp; <a href="index.php" title="На главную">Главная</a></td>
                    <td>&nbsp; <a href="about.php">О компании</a></td>
                    <td>&nbsp; <a href="#">Поиск</a></td>
                     <FORM METHOD=POST ACTION="/phprusearch/"><td height="50px">&nbsp; <input NAME="query" ACTION="/phprusearch/" type="text" width="100"></td></FORM>
                  </tr>
                </table> 				</td>
    			<td width="54px" background="images/img__04.gif">&nbsp;</td>
				<td>&nbsp;</td>
    			<td width="410" background="images/img__05.jpg">&nbsp;</td>
				<td width="20px">&nbsp;</td>
  			</tr>
		</table>	</td>
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
                    <td  width="27px" height="29px" background="images/img__13.gif">&nbsp;</td>
                    <td colspan="4"class="telefon">&nbsp;(099) 418-72-30</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="27px" height="29px" >&nbsp;</td>
                    <td colspan="4" class="telefon">&nbsp;<!--(095) 567-70-55 --></td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="30px" height="27px">&nbsp;</td>
                    <td width="30px">
						<a href="online.php" onMouseOver="document.pic1.src='images/img__60d.gif'"
						onMouseOut="document.pic1.src='images/img__60.gif'">
						<img src="images/img__60.gif" width="203" height="27" dynsrc="images/img__60.gif" name="pic1" title="Задать свой вопрос прямо сейчас!">						</a>					</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                </table>
				</div>
                <div style="position:relative; left:300px; top:70px;"><img src="images/free.jpg" width="187" height="95"></div>				</td>
				<td>&nbsp;</td>
   				<td width="410" background="images/img__10.jpg">&nbsp;</td>
				<td width="20px">&nbsp;</td>
  			</tr>
		</table>	</td>
  </tr>
  <tr>
    <td height="50px" colspan="3" bgcolor="#990000" background="images/img__24.gif">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
      <tr>
        <td height="50px" width="198px">Общая информация</td>
		<td width="1px"  background="images/img__59.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="middlemenu">
          <tr>
            <td height="50px">&nbsp;</td>

            <td><a href="fiz.php">Физические лица</a></td>
			<td width="1px"  background="images/img__59.gif">&nbsp;</td>
            <td><a href="jur.php">Юридические лица</a></td>
			<td width="1px"  background="images/img__59.gif">&nbsp;</td>
            <td><a href="private.php">Личный кабинет</a></td>
            <td height="50px">&nbsp;</td>
          </tr>
        </table></td>
		<td width="1px"  background="images/img__59.gif">&nbsp;</td>
        <td height="50px" width="198px">Новости</td>
      </tr>
      </table>	</td>
  </tr>
  <tr>
    <td width="200px" bgcolor="#dcdcdc" style="border-right:1px solid #bfbfbe; vertical-align:top; padding-top:10px;">
	  <div class="leftmenuitem"><a href="http://zakon1.rada.gov.ua/cgi-bin/laws/main.cgi">Законодательство Украины</a></div>
	  <div class="leftmenuitem"><a href="lug_sud.php">Адреса и реквизиты судов общей юрисдикции</a></div>
	  <div class="leftmenuitem"><a href="executive.php">Органы государственной исполнительной службы</a></div>
	  <div class="leftmenuitem"><a href="procur.php">Органы прокуратуры</a></div>
	  <div class="leftmenuitem"><a href="mvs.php">Органы внутренних дел</a></div>
      <div class="leftmenuitem" style="position:relative; top:100px">
	  &nbsp;&nbsp;&nbsp;<embed type="application/x-shockwave-flash" width="160" height="230" src="/images/banner.swf" quality="best" wmode="Window" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
</div>
      <div class="leftmenuitem" style="position:relative; top:100px" align="center"><img src="/cgi-sys/Count.cgi?df=counter.dat|display=Counter|ft=0|md=5|frgb=182;182;182|dd=G|srgb=182;182;182|prgb=0;0;0"></div></td>
    <td height="100%" style="vertical-align:top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:0px">
  <tr>
    <td colspan="8" class="content">
 <div id="comments_div">
 	
 <p align="center"><strong>Задайте свой вопрос прямо сейчас</strong> </p>
	          
 <form method="POST">
<table width="100%" border="0" cellspacing="6" cellpadding="0">
  <tr>
    <td width="150">Ваше ФИО</td>
    <td><input name="txt_fio" type="text" style="width:500px;"></td>
  </tr>
  <tr>
    <td>Ваш вопрос</td>
    <td><textarea name="txt_mess" style="width:500px;"></textarea></td>
  </tr>
  <tr>
     </tr>
  <tr>
    <td colspan="2"><input name="submit_q" type="submit" value="Отправить"></td>
    </tr>
  <tr>
    <td colspan="2"> <hr>* Все вопросы проходят предварительную проверку. После утверждения наши юристы ответят Вам в кратчайшие сроки, и ваш вопрос вместе с ответом будет размещен на этой странице. </td>
  </tr>
</table>
</form>
 </div>
 
 <br> 
 <div>
 <p align="center"><strong>Часто задаваемые вопросы</strong> </p>
 
<? 
  
/* Соединяемся с базой данных */
$hostname = "localhost"; // название/путь сервера, с MySQL 
$username = "u5088_sps"; // имя пользователя (в Denwer`е по умолчанию "root") 
$password = "u5088_sps"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым) 
$dbName = "u5088_contracts"; // название базы данных 
  
/* Таблица MySQL, в которой хранятся данные */
$table = "postfaq"; 
  
/* Создаем соединение */
mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение"); 
  
/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error()); 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
  
/* Заносим в переменную $res всю базу данных */
$query = "SELECT * FROM $table"; 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error()); 
/* Узнаем количество записей в базе данных */
$row = mysql_num_rows($res); 
  
 
/* Цикл вывода данных из базы конкретных полей */
while ($row = mysql_fetch_array($res)) { 

    echo "<br><table border=0 cellspacing=0 cellpadding=0 align=left width=100%>\n";
	
	echo "<tr><td colspan=\"2\" style=\"border-bottom:solid 1px #CCCCCC;\"><br></td></tr>\n";
	
	
/*	echo "<tr bgcolor=\"#D9FFD9\"><td width=\"100px\" style=\"padding:10px\"><b>ФИО:</b>
	</td style=\"padding:10px\">		<td><br><b>".$row["fio"]."</b><br><br></td></tr>\n";*/
	
	echo "<tr bgcolor=\"#D9FFD9\"><td width=\"100px\" style=\"padding:10px\"><b>Вопрос:</b>	
	</td style=\"padding:10px\">	<td><br>".$row["mmessage"]."<br><br></td></tr>\n";
	
	echo "<tr bgcolor=\"#FFD9D9\"><td width=\"100px\" style=\"padding:10px\"><b>Ответ:</b>	
	</td style=\"padding:10px\">	<td><br>".$row["otvet"]."<br><br></td></tr>\n";
	
	
	echo "<tr><td colspan=\"2\" style=\"border-top:solid 1px #CCCCCC;\"><br></td></tr>\n";
	
/*	echo "<p>".$row["fio"]."</p>\n"; 
	echo "<p>".$row["mmessage"]."</p>\n"; 
	echo "<p>".$row["otvet"]."</p>\n"; */
	
	echo "</table><br><br>\n";

} 
  
/* Закрываем соединение */
mysql_close(); 
  
/* Выводим ссылку возврата 
echo ("<div style=\"text-align: center; margin-top: 10px;\"><a href=\"index.html\">Вернуться назад</a></div>"); 
*/  
?>
 
 </div>
	 <br><br><br></td>
    </tr>
	  <tr>
    <td height="100%" colspan="8">&nbsp;</td>
    </tr>
  <tr>
    <td height="128px" colspan="3" background="images/img__31.gif"><img src="images/img__29.jpg"></td>
    <td width="86%" colspan="5" background="images/img__31.gif"><div class="telefon" style=" position:relative; top:25px; left:10px">Нужна помощь?</div></td>
    </tr>
  <tr>
    <td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15px" height="29">&nbsp;</td>
    <td width="29px" background="images/img__13.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">Позвоните</td>
    <td>&nbsp;</td>
    <td width="29px" background="images/img__36.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">Напишите</td>
    <td>&nbsp;</td>
    <td width="29px" background="images/img__38.gif">&nbsp;</td>
    <td class="telefon" style="padding-left:10px" width="220px">Приезжайте</td>
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
    <td class="adress">91038, г. Луганск, ул. Доргомыжского 2 Е</td>
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
</table>		</td>
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
</table></td>
  </tr>
</table>


<map name="Map">
<area shape="poly" coords="49,145,76,121,88,35,177,35,208,203,119,203,49,166" href="index.php" target="_self" onMouseOver="document.pic2.src='images/img__12d.gif'" onMouseOut="document.pic2.src='images/img__12.gif'" title="На главную">
</map></body>
</html>
