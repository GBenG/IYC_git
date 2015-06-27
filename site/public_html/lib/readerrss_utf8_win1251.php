<?
 function codirovkaReader($codirovka) { 
  return  @iconv("UTF-8","windows-1251",$codirovka);  
};

function startElement($parser, $name, $attrs) { 
    global $tag, $rss; 
    if ($name == 'RSS')  
            $rss = '^RSS'; 
        elseif ($name == 'RDF:RDF') 
            $rss = '^RDF:RDF'; 
         
    $tag .= '^' . $name; 
} 

function endElement($parser, $name) { 
    global $tag; 
    global $itemCount, $items; 
    if ($name == 'ITEM') { 
            $itemCount++; 
            if (!isset($items[$itemCount])) $items[$itemCount] = array('title' => '', 'link' => '', 'desc' => '', 'pubdate' => ''); 
    }  
     
    $tag = substr($tag, 0, strrpos($tag, '^')); 
} 

function characterData($parser, $data) { 
    global $tag, $chanTitle, $chanLink, $chanDesc, $rss, $imgTitle, $imgLink, $imgUrl; 
    global $items, $itemCount; 

    $rssChannel = ''; 
    if ($data) { 
            if ($tag == $rss . '^CHANNEL^TITLE') { 
                    $chanTitle .= $data; 
            } elseif ($tag == $rss . '^CHANNEL^LINK') { 
             $chanLink .= $data; 
            } elseif ($tag == $rss . '^CHANNEL^DESCRIPTION') { 
                     $chanDesc .= $data; 
            }  
        if ($rss == '^RSS') $rssChannel = '^CHANNEL'; 

        if ($tag == $rss . $rssChannel . '^ITEM^TITLE') { 
        $items[$itemCount]['title'] .= $data; 
        } elseif ($tag == $rss . $rssChannel . '^ITEM^LINK') { 
        $items[$itemCount]['link'] .= $data; 
        } elseif ($tag == $rss . $rssChannel . '^ITEM^DESCRIPTION') { 
        $items[$itemCount]['desc'] .= $data; 
        } elseif ($tag == $rss . $rssChannel . '^ITEM^PUBDATE') { 
         $items[$itemCount]['pubdate'] .= $data; 
    } elseif ($tag == $rss . $rssChannel . '^IMAGE^TITLE') { 
            $imgTitle .= $data; 
        } elseif ($tag == $rss . $rssChannel . '^IMAGE^LINK') { 
            $imgLink .= $data; 
        } elseif ($tag == $rss . $rssChannel . '^IMAGE^URL') { 
            $imgUrl .= $data; 
        }  
    }  

} 

function parseRSS($url) { 
    global $tag, $chanTitle, $chanLink, $chanDesc, $rss, $items, $itemCount, $imgTitle, $imgLink, $imgUrl; 
        $chanTitle = ''; 
    $chanLink = ''; 
    $chanDesc = ''; 
    $imgTitle = ''; 
    $imgLink = ''; 
    $imgUrl = ''; 
    $tag = ''; 
    $rss = ''; 

    global $items, $itemCount; 
  
    $itemCount = 0; 
    $items = array(0 => array('title' => '', 'link' => '', 'desc' => '', 'pubdate' => '')); 

    $xml_parser = xml_parser_create(); 
    xml_set_element_handler($xml_parser, "startElement", "endElement"); 
    xml_set_character_data_handler($xml_parser, "characterData"); 

    @$fp = fopen($url, "r"); 
    $data = ""; 
    while (true) { 
            @$datas = fread($fp, 4096); 
            if (strlen($datas) == 0) { 
                    break; 
            }  
            $data .= $datas; 
    }  

    @fclose($fp); 
     
    if ($data != '') { 
            $xmlresult = xml_parse($xml_parser, $data); 
            $xmlerror = xml_error_string(xml_get_error_code($xml_parser)); 
            $xmlcrtline = xml_get_current_line_number($xml_parser); 
             
            if ($xmlresult) 
            displayData(); 
        else 
            print("Error parsing this feed !<br />Error: ".@$xmlError." , at line: ".@$xmlCrtline.""); 
    } else { 
            print("Error while retriving feed ".$url.""); 
    }  
     
    xml_parser_free($xml_parser); 
} 

function displayData() { 
    global $chanTitle, $chanLink, $chanDesc, $rss, $items, $itemCount, $imgTitle, $imgLink, $imgUrl; 
    global $items, $itemCount; 
?>

<? /* echo '<a href="'.codirovkaReader($chanLink).'" target="_blank">'.codirovkaReader($chanTitle).'</a> ' ; */ ?>
<? /* echo codirovkaReader($chanDesc); */ ?>
<? /* echo	'<a href="'.codirovkaReader($imgLink).'" target="_blank"><img src="'.codirovkaReader($imgUrl).'" alt="'.codirovkaReader($imgTitle).'" border="0" /></a> '; */ ?>
  
    <?
//for($i = 0;$i < count($items)-1;$i++) { 
for($i = 0;$i < 5;$i++) { 
    
	if(@$items[$i]['link']<>''){
	  ?>
	  
	<?  echo  '<strong><font size="2" color="#8c2313">'.codirovkaReader(@$items[$i]['title']).'</font></strong><br><br>';   ?>
	<? /* echo  '<br><br>'.codirovkaReader(@$items[$i]['pubdate']).'<br><br>'; */ ?>
	<? echo '<font size="2">'.codirovkaReader(@$items[$i]['desc']).'</font><br><hr><br>'; ?> 
    <? /* echo '<br><a  href="'.codirovkaReader(@$items[$i]['link']).'" target="_blank"> '.codirovkaReader(@$items[$i]['link']).'</a> <hr size="1">' ;*/ ?>
   
    <?	
      } 
}		
		?>
		<?
}
parseRSS($url); 
?>
<br>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">