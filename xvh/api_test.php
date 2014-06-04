<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('SITEURL','http://habitossanos.com/');

echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

# ********************************************* FUNCIONES ********************
# ********************************************* FUNCIONES ********************
# ********************************************* FUNCIONES ********************
# ********************************************* FUNCIONES ********************

function sdiv($divId, $styleOpt = NULL, $class = NULL) {	
    echo "<div id=\"$divId\"";
    if ($class != NULL) {
            echo " class=\"$class\"";
    }
    if ($styleOpt != NULL) {
            echo " style=\"$styleOpt\"";
    }
    echo ">\n";
}
function sdivclose() {
    echo "</div>\n";
}
function pre_array($array,$block=false) {
    echo '<pre';
    if ($block) {
        echo ' style="display:block;float:left;clear:left;width:100%;background:white;color:#666"';
    }
    echo '>';
        print_r($array);
    echo '</pre>';
}
function getCURL($param,$destination) {
    $p=http_build_query($param);
    return '<strong>CLI:</strong><br><p style="margin-top:10px;color:magenta">curl --data \''.$p.'\' '.$destination.'</p>';
}
function PostRequest($url, $referer, $_data) {

    // convert variables array to string:
    $data = array();
    
    while (list($n, $v) = each($_data)) {
	$data[] = "$n=$v";
    }
    $data = implode('&', $data);
    
    //MD FIX
    $data=http_build_query($_data);
    // format --> test1=a&test2=b etc.
    // parse the given URL
    $url = parse_url($url);
    if ($url['scheme'] != 'http') {
	die('Only HTTP request are supported !');
    }

    // extract host and path:
    $host = $url['host'];
    $path = $url['path'];

    // open a socket connection on port 80
    $fp = fsockopen($host, 80);

    // send the request headers:
    fputs($fp, "POST $path HTTP/1.1\r\n");
    fputs($fp, "Host: $host\r\n");
    fputs($fp, "Referer: $referer\r\n");
    fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
    fputs($fp, "Content-length: " . strlen($data) . "\r\n");
    fputs($fp, "Connection: close\r\n\r\n");
    fputs($fp, $data);

    $result = '';
    while (!feof($fp)) {
	// receive the results of the request
	$result .= fgets($fp, 128);
    }

    // close the socket connection:
    fclose($fp);

    // split the result header from the content
    $result = explode("\r\n\r\n", $result, 2);
    //pre_array($result);

    if (is_array($url)) {
	$url=$url['scheme'].'://'.$url['host'].$url['path'];
    }
    
    $header = isset($result[0]) ? $result[0] : '';
    $content = isset($result[1]) ? $result[1] : '';

    $contentRAW=$content;	

    $first=strpos($content,'{');
    $last=strrpos($content, '}');
    $content=substr($content, $first,($last-$first+1));

    // return as array:
    return array($header, $content, $contentRAW);
}

$apiKey='8AZ3-87B4-9803-FG19-BLND';

echo '<h2 style="margin:20px;font-family:Tahoma;color:red">XVh API TEST</h2>';

# ********************************************* SIGNUP ************************
# ********************************************* SIGNUP ************************
# ********************************************* SIGNUP ************************
# ********************************************* SIGNUP ************************

$userEmail=rand(1,9999999).'@blend.mx';
$userPassword='ruidoEnElVentilador';

$PARAMETROS=array('apiKey'=>$apiKey,'method'=>'signup','userEmail'=>$userEmail,
    'userPassword'=>$userPassword,'userOrigin'=>'APITEST','userVenueCode'=>'APITEST',
    'userOriginPlatform'=>'Api Test v1','userNotificationsToggle'=>'1');

sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-BOTTOM:0PX");
	echo '<h2 style="color:red">Test [signup] -- Registro de usuario</h2>';
	print "<br><strong>PARAMETROS</strong><br>";
	pre_array($PARAMETROS);

        $destino='http://habitossanos.com/xvh/';
	list($header,$content,$contentRAW)=PostRequest($destino,SITEURL,$PARAMETROS);
	print getCURL($PARAMETROS, $destino);

	print "<br><strong>HEADERS:</strong><br>".$header."<br><br><br>";
	print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."\n\n---RAW----\n\n".$contentRAW."</textarea><br><br><br>";
        //print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."</textarea><br><br><br>";
        
sdivclose();
$parseResponse=json_decode($content);
if ($parseResponse) {
    $parseResponse->response->latestCatalog='NOT_DISPLAYED_ON_API_TEST';
    sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-TOP:0PX;");
        echo '<p><STRONG>OBJETO ANTERIOR</STRONG></p>';
        pre_array($parseResponse);
    sdivclose();
} else {
    exit('Cant Parse'.var_dump($parseResponse));
}

# ********************************************* LOGIN ************************
# ********************************************* LOGIN ************************
# ********************************************* LOGIN ************************
# ********************************************* LOGIN ************************

$PARAMETROS=array('apiKey'=>$apiKey,'method'=>'login','userEmail'=>$userEmail,
    'userPassword'=>$userPassword,'userOrigin'=>'APITEST','localCatalogVersion'=>0,'userNotificationsToggle'=>'0');

sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-BOTTOM:0PX");
	echo '<h2 style="color:red">Test [login] -- Iniciar sesión</h2>';
	print "<br><strong>PARAMETROS</strong><br>";
	pre_array($PARAMETROS);

        $destino='http://habitossanos.com/xvh/';
	list($header,$content,$contentRAW)=PostRequest($destino,SITEURL,$PARAMETROS);
	print getCURL($PARAMETROS, $destino);

	print "<br><strong>HEADERS:</strong><br>".$header."<br><br><br>";
	print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."\n\n---RAW----\n\n".$contentRAW."</textarea><br><br><br>";
        //print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."</textarea><br><br><br>";
        
sdivclose();
$parseResponse=json_decode($content);
if ($parseResponse) {
    $parseResponse->response->latestCatalog='NOT_DISPLAYED_ON_API_TEST';
    $tokenFuturo=$parseResponse->response->userToken;
    sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-TOP:0PX;");
        echo '<p><STRONG>OBJETO ANTERIOR</STRONG></p>';
        pre_array($parseResponse);
    sdivclose();
} else {
    exit('Cant Parse'.var_dump($parseResponse));
}


# ********************************************* getCATALOG ******************* 
# ********************************************* getCATALOG ******************* 
# ********************************************* getCATALOG ******************* 
# ********************************************* getCATALOG ******************* 

$PARAMETROS=array('apiKey'=>$apiKey,'method'=>'getCatalog','userToken'=>$tokenFuturo,'localCatalogVersion'=>0);

sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-BOTTOM:0PX");
	echo '<h2 style="color:red">Test [getCatalog] -- Descargar catálogo</h2>';
	print "<br><strong>PARAMETROS</strong><br>";
	pre_array($PARAMETROS);

        $destino='http://habitossanos.com/xvh/';
	list($header,$content,$contentRAW)=PostRequest($destino,SITEURL,$PARAMETROS);
	print getCURL($PARAMETROS, $destino);

	print "<br><strong>HEADERS:</strong><br>".$header."<br><br><br>";
	print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."\n\n---RAW----\n\n".$contentRAW."</textarea><br><br><br>";
        
sdivclose();
$parseResponse=json_decode($content);
if ($parseResponse) {
    sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-TOP:0PX;");
        echo '<p><STRONG>OBJETO ANTERIOR</STRONG></p>';
        pre_array($parseResponse);
    sdivclose();
}

# ********************************************* registerSurveyGrade ******************* 
# ********************************************* registerSurveyGrade ******************* 
# ********************************************* registerSurveyGrade ******************* 
# ********************************************* registerSurveyGrade ******************* 

$PARAMETROS=array('apiKey'=>$apiKey,'method'=>'registerSurveyGrade','userToken'=>$tokenFuturo,'surveyGrade'=>rand(1,5));

sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-BOTTOM:0PX");
	echo '<h2 style="color:red">Test [registerSurveyGrade] -- Registrar calificación de Encuesta</h2>';
	print "<br><strong>PARAMETROS</strong><br>";
	pre_array($PARAMETROS);

        $destino='http://habitossanos.com/xvh/';
	list($header,$content,$contentRAW)=PostRequest($destino,SITEURL,$PARAMETROS);
	print getCURL($PARAMETROS, $destino);

	print "<br><strong>HEADERS:</strong><br>".$header."<br><br><br>";
	print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."\n\n---RAW----\n\n".$contentRAW."</textarea><br><br><br>";
        
sdivclose();
$parseResponse=json_decode($content);
if ($parseResponse) {
    sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-TOP:0PX;");
        echo '<p><STRONG>OBJETO ANTERIOR</STRONG></p>';
        pre_array($parseResponse);
    sdivclose();
}

# ********************************************* checkIn ************************
# ********************************************* checkIn ************************
# ********************************************* checkIn ************************
# ********************************************* checkIn ************************

$checkIns=array(
        array('activitySlot'=>'1','activityDate'=>$_SERVER['REQUEST_TIME'],'activityStep'=>1,'activityLevel'=>0),
    );
$PARAMETROS=array('apiKey'=>$apiKey,'method'=>'checkIn','userToken'=>$tokenFuturo,'checkIns'=>$checkIns);

sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-BOTTOM:0PX");
	echo '<h2 style="color:red">Test [checkIn] -- Registrar una actividad</h2>';
	print "<br><strong>PARAMETROS</strong><br>";
	pre_array($PARAMETROS);

        $destino='http://habitossanos.com/xvh/';
	list($header,$content,$contentRAW)=PostRequest($destino,SITEURL,$PARAMETROS);
	print getCURL($PARAMETROS, $destino);

	print "<br><strong>HEADERS:</strong><br>".$header."<br><br><br>";
	print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."\n\n---RAW----\n\n".$contentRAW."</textarea><br><br><br>";
        
sdivclose();
$parseResponse=json_decode($content);
if ($parseResponse) {
    sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-TOP:0PX;");
        echo '<p><STRONG>OBJETO ANTERIOR</STRONG></p>';
        pre_array($parseResponse);
    sdivclose();
}

# ********************************************* getProgress ******************* 
# ********************************************* getProgress ******************* 
# ********************************************* getProgress ******************* 
# ********************************************* getProgress ******************* 

$PARAMETROS=array('apiKey'=>$apiKey,'method'=>'getProgress','userToken'=>$tokenFuturo);

sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-BOTTOM:0PX");
	echo '<h2 style="color:red">Test [getProgress] -- Obtener progreso de usuario</h2>';
	print "<br><strong>PARAMETROS</strong><br>";
	pre_array($PARAMETROS);

        $destino='http://habitossanos.com/xvh/';
	list($header,$content,$contentRAW)=PostRequest($destino,SITEURL,$PARAMETROS);
	print getCURL($PARAMETROS, $destino);

	print "<br><strong>HEADERS:</strong><br>".$header."<br><br><br>";
	print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."\n\n---RAW----\n\n".$contentRAW."</textarea><br><br><br>";
        
sdivclose();
$parseResponse=json_decode($content);
if ($parseResponse) {
    sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-TOP:0PX;");
        echo '<p><STRONG>OBJETO ANTERIOR</STRONG></p>';
        pre_array($parseResponse);
    sdivclose();
}

# ********************************************* toggleNotifications ******************* 
# ********************************************* toggleNotifications ******************* 
# ********************************************* toggleNotifications ******************* 
# ********************************************* toggleNotifications ******************* 

$PARAMETROS=array('apiKey'=>$apiKey,'method'=>'toggleNotifications','userToken'=>$tokenFuturo,'userNotificationsToggle'=>'1','userOrigin'=>'APITEST');

sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-BOTTOM:0PX");
	echo '<h2 style="color:red">Test [toggleNotifications] -- Prender o Apagar Notificaciones</h2>';
	print "<br><strong>PARAMETROS</strong><br>";
	pre_array($PARAMETROS);

        $destino='http://habitossanos.com/xvh/';
	list($header,$content,$contentRAW)=PostRequest($destino,SITEURL,$PARAMETROS);
	print getCURL($PARAMETROS, $destino);

	print "<br><strong>HEADERS:</strong><br>".$header."<br><br><br>";
	print "<br><strong>RESPUESTA:</strong><br><textarea style=\"margin:10px;width:800px;height:300px;border:1px gray dotted\">".$content."\n\n---RAW----\n\n".$contentRAW."</textarea><br><br><br>";
        
sdivclose();
$parseResponse=json_decode($content);
if ($parseResponse) {
    sdiv("clear","margin:20px;font-family:Tahoma;font-size:12px;width:900px;padding:20px;border:1px dotted gray;MARGIN-TOP:0PX;");
        echo '<p><STRONG>OBJETO ANTERIOR</STRONG></p>';
        pre_array($parseResponse);
    sdivclose();
}