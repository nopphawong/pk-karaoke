<?PHP	
include('class.upload.php');
$host = $config['DOMAIN_NAME'];

function getConfig($set_info){
	if($set_info === true){
		global $db;
		global $tbl;
		global $config;
		$getConfig = $db->queryAndFetch(" SELECT * FROM ".$tbl."_setting WHERE setting_id = '1' ");
		$currentLang = (isset($_SESSION['LANG']) && ! empty($_SESSION['LANG'])) ? $_SESSION['LANG'] : $getConfig['setting_default_language'];
		$getConfigLang = $db->queryAndFetch(" SELECT * FROM ".$tbl."_setting_".$currentLang." WHERE setting_id = '1' ");
		$config['SITE_NAME'] = getDesc(htmlspecialchars($getConfigLang['setting_name']),200);
		$config['BASE_URL'] = $getConfig['setting_base_url'];
		$config['DOMAIN_NAME'] = $getConfig['setting_domain'];
		$config['KEYWORD'] = $getConfig['setting_keyword'];
		$config['SITE_DETAIL'] = $getConfigLang['setting_detail'];
		$config['SITE_LOGO'] = $getConfig['setting_logo'];
		$config['SITE_BANNER'] = $getConfig['setting_banner'];
		$config['SITE_BG'] = $getConfig['setting_bg'];
		$config['SITE_ABOUT'] = $getConfigLang['setting_about_us'];
		$config['SITE_CONTACT'] = $getConfigLang['setting_contact_us'];
		$config['FACEBOOK'] = $getConfig['setting_facebook'];
		$config['TWITTER'] = $getConfig['setting_twitter'];
		$config['GOOGLE'] = $getConfig['setting_google_plus'];
		$config['YOUTUBE'] = $getConfig['setting_youtube'];
		$config['EMAIL'] = $getConfig['setting_email'];
		$config['TEL'] = $getConfig['setting_tel'];
		$config['FAX'] = $getConfig['setting_fax'];
		$config['LINE'] = $getConfig['setting_line'];
		$config['LANG'] = $getConfig['setting_default_language'];
		return $config;
	}
}
getConfig($config['GET_INFO']);

function clean($input){
	global $db;
	global $tbl;
	$input = trim($input);
	if(get_magic_quotes_gpc()) {
		$input = stripslashes($input);
	}
	#ตัด html tag
	$input = strip_tags($input);
	$input = $db->escapeString($input);
	return $input;
}

function numberic($values){
	global $db;
	global $tbl;
	$values = trim($values);
	$values = $db->escapeString($values);
	if(is_numeric($values)){
		return $values;
	} else {
		return NULL;
	}	
}

function cleanTel($value) {
	$value = strtolower($value);
	$value = str_replace('+66','0' , $value);
	$value = str_replace('-','' , $value);
	$value = str_replace(' ','' , $value);
	$value = str_replace(',','' , $value);
	$value = str_replace('+','' , $value);
	$value = str_replace('\'','' , $value);
	return $value;
}
	
function checkTel($value) {
	if(strlen($value) >= 9){
		$subTel	= substr($value,0,2);
		if(in_array($subTel, array('08','09','06','02','03','04','07'))){
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

#Alert
function msg($txt){
	echo '<script>';
	echo "alert(\"$txt\");";
	echo '</script>';
}

function Redirect($txt,$url){
	echo '<script>';
	echo "alert(\"$txt\");";
	echo "window.location.href = '$url';";
	echo '</script>';
}

function RedirectTo($url){
	echo '<script>';
	echo "window.location.href = '$url';";
	echo '</script>';
}

function getTitle($value) {
	global $db;
	global $tbl;
	$values = $db->escapeString($value);
	$value = strtolower($value);
	$value = str_replace('&amp;','-' , $value);
	$value = str_replace('&quot;','-' , $value);
	$value = str_replace('#','-' , $value);
	$value = str_replace(' ','-' , $value);
	$value = str_replace('%','เปอร์เซ็นต์' , $value);
	$value = str_replace('<','-' , $value);
	$value = str_replace('>','-' , $value);
	$value = str_replace('|','' , $value);
	$value = str_replace('"','-' , $value);
	$value = str_replace('?','-' , $value);
	$value = str_replace(';','-' , $value);
	$value = str_replace('^','-' , $value);
	$value = str_replace('&','-' , $value);
	$value = str_replace('!','-' , $value);
	$value = str_replace('.','' , $value);
	$value = str_replace('/','-' , $value);
	$value = str_replace('*','-' , $value);
	$value = str_replace(',','-' , $value);
	$value = str_replace('"','-' , $value);
	$value = str_replace('"','-' , $value);
	$value = str_replace('\'','-' , $value);
	$value = str_replace(':','-' , $value);
	$value = str_replace('"','-' , $value);
	$value = str_replace('---','-' , $value);
	$value = str_replace('--','-' , $value);	
	return $value;
}

function seoUrl($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9ก-ฮะาิีึืโเแุูไๆั๊่๋้็์]/i', '/[-]+/') , '-', $string);
    return strtolower(trim($string, '-'));
}

function cleanTag($value) {
	global $db;
	global $tbl;
	$values = $db->escapeString($value);
	$value = strtolower($value);
	$value = str_replace('&amp;',',' , $value);
	$value = str_replace('&quot;',',' , $value);
	$value = str_replace(' ',',' , $value);
	$value = str_replace(';',',' , $value);
	$value = str_replace('^',',' , $value);
	$value = str_replace('&',',' , $value);
	$value = str_replace('/',',' , $value);
	$value = str_replace(':',',' , $value);
	$value = str_replace('*',',' , $value);
	$value = str_replace('…',',' , $value);
	$value = str_replace('.',',' , $value);
	$value = str_replace('"',',' , $value);
	$value = str_replace(',,,',',' , $value);
	$value = str_replace(',,',',' , $value);	
	return $value;
}

function getDesc($value,$n) { 
	$value = str_replace('&nbsp;','' , $value);
	$value = str_replace('&hellip;','' , $value);
	$value = str_replace('&ldquo;','' , $value);
	$value = str_replace('&rdquo;','' , $value);
	$value = str_replace('&amp;',' and ' , $value);
	$value = str_replace('&quot;','' , $value);
	$value = str_replace('&ndash;','' , $value);
	$value = str_replace('&lsquo;','' , $value);
	$value = str_replace('&rsquo;','' , $value);
	$value = str_replace('&middot;','' , $value);
	$result = mb_strimwidth(trim(strip_tags($value)), 0, $n , "...", "UTF-8");
	return $result;
}

function cutText($value,$n) { 
	$result = mb_strimwidth(trim(strip_tags($value)), 0, $n , "", "UTF-8");
	return $result;
}

function resetDate($values){
	$exp_date = explode('-',$values);
	$result = $exp_date['2'].'-'.$exp_date['1'].'-'.$exp_date['0'];
	return date('Y-m-d', strtotime($result));
}

function reverseDate($date){
	$exp_date = explode('-',$date);
	$result = $exp_date['2'].'-'.$exp_date['1'].'-'.$exp_date['0'];
	return $result;
}

function echoArr($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

#หาระยะห่างของวัน
function DateDiff($date_in,$date_out){
	return (strtotime($date_out) - strtotime($date_in))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
 
 #เช็คอีเมล์
function checkmymail($mailadresse){
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$mailadresse ));
}

function chkPages(){
	$thisPages = explode('/',$_SERVER['PHP_SELF']);
	$count = count($thisPages)-1;
	return $thisPages[$count];
}

function monthDetail($m){
	switch($m){ 
		 case "01": $blank = 'มกราคม'; break; 
		 case "02": $blank = 'กุมภาพันธ์'; break; 
		 case "03": $blank = 'มีนาคม'; break; 
		 case "04": $blank = 'เมษายน'; break; 
		 case "05": $blank = 'พฤษภาคม'; break; 
		 case "06": $blank = 'มิถุนายน'; break; 
		 case "07": $blank = 'กรกฎาคม'; break; 
		 case "08": $blank = 'สิงหาคม'; break; 
		 case "09": $blank = 'กันยายน'; break; 
		 case "10": $blank = 'ตุลาคม'; break; 
		 case "11": $blank = 'พฤศจิกายน'; break; 
		 case "12": $blank = 'ธันวาคม'; break; 
	 }
	 return $blank;
}

function DateThai($strDate){
	(empty($strDate))? $strDate = date('Y-m-d H:i:s') : $strDate = $strDate;
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}

function level($value){
	switch($value){ 
		 case "99": $result = 'Super Administrator'; break; 
		 case "88": $result = 'ดูแลเกี่ยวกับ TGWEALTH(About us)'; break; 
		 case "77": $result = 'ดูแลเรื่องลงทุน (Investments)'; break; 
		 case "66": $result = 'ดูแลเรื่องสมาชิก (Member)'; break; 
		 case "55": $result = 'ข่าวสาร/กิจกรรม (News & Activity)'; break; 
		 case "44": $result = 'TG WEALTH CHANNAL'; break; 
		 case "00": $result = 'ระงับผู้ใช้งาน(Ban)'; break;
		 case "": $result = NULL; break;
	 }
	return $result;
}

function chkRefer($refer,$host){ #Input values : chkRefer($_SERVER['HTTP_REFERER'] , 'hostname')
	$refer = explode('/',$refer);
	$chkHost = explode('.',$refer[2]);
	if($chkHost[0]==$host || $chkHost[1]==$host){
		return true;
	} else {
		return false;	
	}
}

function getIP(){
	return $_SERVER['REMOTE_ADDR'];
}

function getNewName($imgName){
	$imgName = explode('.',$imgName);
	$i = count($imgName)-1;
	$name = strtolower($imgName[$i]);
	$rand = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'),0,9);
	$result = md5($rand.time()).'.'.$name;
	return $result;
}

function newName($imgName,$n){
	$imgName = explode('.',$imgName);
	$i = count($imgName)-1;
	$name = strtolower($imgName[$i]);
	$rand = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'),0,$n);
	$result = $rand.time().'.'.$name;
	return $result;
}

function newFileName($n){
	$rand = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'),0,$n);
	$result = $rand.time();
	return $result;
}

function chkImg($imgName){
	$imgName = explode('.',$imgName);
	$i = count($imgName)-1;
	$fileAllow = array('jpg', 'gif', 'png', 'JPG','PNG','GIF');
	if (in_array(strtolower($imgName[$i]), $fileAllow)){
		return true;
	} else {
		return false;	
	}
}

function chkPDF($fileName){ #input values : $_FILES["file"]["name"]
	$fileName = explode('.',$fileName);
	$i = count($fileName)-1;
	if(strtolower($fileName[$i])=='pdf'){
		return true;
	} else {
		return false;	
	}
}

function cropImg($file,$width,$height,$part,$newName){ #ค่าที่รับ $_FILES['img_profile'], ความกว้าง, ความสูง, พาทจัดเก็บ, ชื่อไฟล์
	$handle = new upload($file);
   	if ($handle->uploaded) {
       $handle->file_new_name_body   = $newName;
       $handle->image_resize			= true;
	   $handle->image_ratio_crop	= true;
	   $handle->image_x				= $width;
	   $handle->image_y				= $height;
       $handle->process($part); //Part file for save
       if ($handle->processed) {
		   return true;
		   $handle->clean();
       } else {
           #echo 'error : ' . $handle->error;
		   return false;	
       }
   	}
}

function uploadImg($file,$part,$newName){ #ค่าที่รับ $_FILES['img_profile'], พาทจัดเก็บ, ชื่อไฟล์
	$handle = new upload($file);
   	if ($handle->uploaded) {
       $handle->file_new_name_body   = $newName;
       $handle->process($part); //Part file for save
       if ($handle->processed) {
		   return true;
		   $handle->clean();
       } else {
           #echo 'error : ' . $handle->error;
		   return false;	
       }
   	}
}

function resizeImg($imgTemp,$imgName,$width,$height,$part){ #ค่าที่รับ $_FILES['file']['tmp_name'], $_FILES['file']['name'], ความกว้าง, ความยาว, พาทจัดเก็บ
	$typeImg = explode('.',$imgName);
	$i = count($typeImg)-1;
	$images = $imgTemp;
	$original_name = $imgName;
	$new_images = newName($imgName,5);
	#copy($images,$part.$original_name);
	$width = $width; //*** Fix Width & Heigh (Autu caculate) ***//
	$size=GetimageSize($images);
	#$height=round($width*$size[1]/$size[0]);
	$height = $height;
	if(strtolower($typeImg[$i])=='jpg'){
		$images_orig = ImageCreateFromJPEG($images);
	} elseif(strtolower($typeImg[$i])=='gif'){
		$images_orig = ImageCreateFromGIF($images);
	} elseif(strtolower($typeImg[$i])=='png'){
		$images_orig = ImageCreateFromPNG($images);
	}
	$photoX = ImagesX($images_orig);
	$photoY = ImagesY($images_orig);
	$images_fin = ImageCreateTrueColor($width, $height);
	ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	ImageJPEG($images_fin,$part.$new_images);
	ImageDestroy($images_orig);
	ImageDestroy($images_fin);
	#@unlink($part.$original_name);
	#return $part.$new_images;
	return $new_images;
}

function resizeImgAutoHeight($imgTemp,$imgName,$width,$part){ #ค่าที่รับ $_FILES['file']['tmp_name'], $_FILES['file']['name'], ความกว้าง, พาทจัดเก็บ
	$typeImg = explode('.',$imgName);
	$i = count($typeImg)-1;
	$images = $imgTemp;
	$original_name = $imgName;
	$new_images = newName($imgName,5);
	#copy($images,$part.$original_name);
	$width = $width; //*** Fix Width & Heigh (Autu caculate) ***//
	$size=GetimageSize($images);
	$height=round($width*$size[1]/$size[0]);
	if(strtolower($typeImg[$i])=='jpg'){
		$images_orig = ImageCreateFromJPEG($images);
	} elseif(strtolower($typeImg[$i])=='gif'){
		$images_orig = ImageCreateFromGIF($images);
	} elseif(strtolower($typeImg[$i])=='png'){
		$images_orig = ImageCreateFromPNG($images);
	}
	$photoX = ImagesX($images_orig);
	$photoY = ImagesY($images_orig);
	$images_fin = ImageCreateTrueColor($width, $height);
	ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	ImageJPEG($images_fin,$part.$new_images);
	ImageDestroy($images_orig);
	ImageDestroy($images_fin);
	#@unlink($part.$original_name);
	#return $part.$new_images;
	return $new_images;
}

function resizeImgLogo($imgTemp,$imgName){
	$typeImg = explode('.',$imgName);
	$i = count($typeImg)-1;
	$images = $imgTemp;
	$original_name = $imgName;
	$new_images = getNewName($imgName);
	copy($images,'_images/logo/'.$new_images);
	$width = 100; //*** Fix Width & Heigh (Autu caculate) ***//
	#$size=GetimageSize($images);
	#$height=round($width*$size[1]/$size[0]);
	$height = 58;
	if(strtolower($typeImg[$i])=='jpg'){
		$images_orig = ImageCreateFromJPEG($images);
	} elseif(strtolower($typeImg[$i])=='gif'){
		$images_orig = ImageCreateFromGIF($images);
	} elseif(strtolower($typeImg[$i])=='png'){
		$images_orig = ImageCreateFromPNG($images);
	}
	$photoX = ImagesX($images_orig);
	$photoY = ImagesY($images_orig);
	$images_fin = ImageCreateTrueColor($width, $height);
	ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	ImageJPEG($images_fin,'_images/thumbLogo/'.$new_images);
	ImageDestroy($images_orig);
	ImageDestroy($images_fin);
	#@unlink($part.$original_name);
	return $new_images;
}

function uploadFile($fileTemp,$fileName,$part){
	$new_name = newName($fileName,5);
	if(move_uploaded_file($fileTemp,$part.$new_name)){
		return $new_name;
	} else {
		return NULL;
	}
}

function outLink($url){
	if(!empty($url)){
		$chkURL = explode('/', $url);
		if(empty($chkURL[2])){
			$result = '<a rel="nofollow" target="_blank" href="outlink.php?url=http://'.$url.'">';
			$result .= $url;
			$result .= '</a>';
		} else {
			$result = '<a rel="nofollow" target="_blank" href="outlink.php?url='.$url.'">';
			$result .= $url;
			$result .= '</a>';
		}
		return $result;
	} else {
		return NULL;
	}
}

function getAlbumLink($ref_id,$type){
	if(!empty($ref_id) && isset($type)){
		$title = 'galery';
		switch($type){ 
			 case "0": $pages = "events-promotions/$title-$ref_id/"; break; 
			 case "1": $pages = "the-crystal-news/$title-$ref_id/"; break; 
			 case "2": $pages = "shop/$title-$ref_id/"; break; 
		 }
		 return $pages;
	} else {
		return '#';
	}
}

function chkPersonID($personID)
{
	if (strlen($personID) != 13) {
	 	return false;
	}
	
	$rev = strrev($personID); // reverse string ขั้นที่ 0 เตรียมตัว
	$total = 0;
	for($i=1;$i<13;$i++) // ขั้นตอนที่ 1 - เอาเลข 12 หลักมา เขียนแยกหลักกันก่อน
	{
		 $mul = $i +1;
		 $count = $rev[$i]*$mul; // ขั้นตอนที่ 2 - เอาเลข 12 หลักนั้นมา คูณเข้ากับเลขประจำหลักของมัน
		 $total = $total + $count; // ขั้นตอนที่ 3 - เอาผลคูณทั้ง 12 ตัวมา บวกกันทั้งหมด
	}
	$mod = $total % 11; //ขั้นตอนที่ 4 - เอาเลขที่ได้จากขั้นตอนที่ 3 มา mod 11 (หารเอาเศษ)
	$sub = 11 - $mod; //ขั้นตอนที่ 5 - เอา 11 ตั้ง ลบออกด้วย เลขที่ได้จากขั้นตอนที่ 4
	$check_digit = $sub % 10; //ถ้าเกิด ลบแล้วได้ออกมาเป็นเลข 2 หลัก ให้เอาเลขในหลักหน่วยมาเป็น Check Digit
	
	 if($rev[0] == $check_digit){  // ตรวจสอบ ค่าที่ได้ กับ เลขตัวสุดท้ายของ บัตรประจำตัวประชาชน
		 return true; /// ถ้า ตรงกัน แสดงว่าถูก
	 } else {
		 return false; // ไม่ตรงกันแสดงว่าผิด
	 }
}
?>