<?php

header('Content-type: application/json');
require 'inc_core.php';
//pre_array($_SERVER);

if (isset($_SERVER['HTTP_REFERER'])&&$_SERVER['HTTP_REFERER']=='http://habitossanos.com/') {
    header('Transfer-Encoding: chunked');
}

// clean input
if (isset($_POST['method'])) {

    /*
    $_POST=multidimensionalArrayMap('htmlspecialchars',$_POST);
    $_POST=multidimensionalArrayMap('addslashes',$_POST);
    $_POST=multidimensionalArrayMap('strip_tags',$_POST);
     * */
}

$method=(isset($_POST['method']))?$_POST['method']:false;
$apiKey=(isset($_POST['apiKey']))?$_POST['apiKey']:false;

if (!$apiKey) {
    exit(json_encode(array('status'=>false,'error'=>'NO_APIKEY_SPECIFIED')));
}

switch($method) {
    
    case 'signup':
        
        $userEmail=(isset($_POST['userEmail']))?$_POST['userEmail']:exit(json_encode(array('status'=>false,'error'=>'NO_USEREMAIL_SPECIFIED')));
        $userPassword=(isset($_POST['userPassword']))?$_POST['userPassword']:exit(json_encode(array('status'=>false,'error'=>'NO_USERPASSWORD_SPECIFIED')));
        #$userOrigin=(isset($_POST['userOrigin']))?$_POST['userOrigin']:exit(json_encode(array('status'=>false,'error'=>'NO_USERORIGIN_SPECIFIED')));
        $userOrigin=(isset($_POST['userOrigin']))?$_POST['userOrigin']:false;
        $userOriginPlatform=(isset($_POST['userOriginPlatform']))?$_POST['userOriginPlatform']:exit(json_encode(array('status'=>false,'error'=>'NO_USERORIGINPLATFORM_SPECIFIED')));
        $userVenueCode=(isset($_POST['userVenueCode']))?mb_strtolower($_POST['userVenueCode']):false;
        $userNotificationsToggle=(isset($_POST['userNotificationsToggle']))?$_POST['userNotificationsToggle']:false;
        
        if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)) {
            exit(json_encode(array('status'=>false,'error'=>'USEREMAIL_NOT_VALID')));
        }
        
        mysql_query("SELECT * FROM users WHERE useremail='$userEmail'") 
            or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
        if (mysql_affected_rows()>'0') {
            exit(json_encode(array('status'=>false,'error'=>'USER_ALREADY_EXISTS')));
        }
        
        //CODES
        if ($userVenueCode) {
            
            if ($userVenueCode=='apitest') {
                $userVenue=array('venueName'=>'Blend','venueID'=>'Blend');
            } else {
                
                $getCode=mysql_query("SELECT * FROM venues WHERE venuecode='$userVenueCode' LIMIT 1") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
                if (mysql_affected_rows()=='0') {
                    //exit(json_encode(array('status'=>false,'error'=>'INCORRECT_VENUE_CODE')));
                    
                    $userVenue=array('venueName'=>NULL,'venueID'=>NULL);
                    $userVenueCode='';
            
                } else {
                    $rowCode=mysql_fetch_assoc($getCode);
                    $userVenue=array('venueName'=>$rowCode['venuename'],'venueID'=>$rowCode['venuename']);
                }
            }
        } else {
            
            $userVenue=array('venueName'=>NULL,'venueID'=>NULL);
            $userVenueCode='';

        }
        
        //CODES
        
        
        if ($userPassword=='') {
            exit(json_encode(array('status'=>false,'error'=>'USERPASSWORD_IS_BLANK')));
        }
        
        // hash&Salt
        $userPassword=md5($userPassword.'872139872130471234909');
        
        $userToken=substr(md5($_SERVER['REQUEST_TIME'].$userEmail),0,12);
        mysql_query("
            INSERT INTO users SET 
                useremail='$userEmail',
                userpassword='$userPassword',
                uservenuecode='$userVenueCode',
                usertoken='$userToken',
                userregdate='$_SERVER[REQUEST_TIME]',
                userlastlogin='$_SERVER[REQUEST_TIME]',
                userlastorigin='$userOrigin',
                useroriginplatform='$userOriginPlatform',
                type_register=1
            ")or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR'))));
        $userid=mysql_insert_id();
        createNewProgress($userid);
        
        if ($userOrigin) {
            // register Origin
            mysql_query("SELECT * FROM origins WHERE origin='$userOrigin' AND originuserid='$userid'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            if (mysql_affected_rows()=='0') {
                mysql_query("INSERT INTO origins SET origin='$userOrigin', originuserid='$userid', originlastlogindate='$_SERVER[REQUEST_TIME]'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            } else {
                mysql_query("UPDATE origins SET originlastlogindate='$_SERVER[REQUEST_TIME]' WHERE origin='$userOrigin' AND originuserid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            }
        }
        
        
        
        
        if ($userNotificationsToggle!==false) {
            if ($userNotificationsToggle=='1') {
                mysql_query("UPDATE users SET usernotifications='1' WHERE userid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            } else {
                mysql_query("UPDATE users SET usernotifications='0' WHERE userid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            }
        }
        exit(json_encode(array('status'=>true,'response'=>array('userToken'=>$userToken,'userVenue'=>$userVenue,'latestCatalog'=>getLatestCatalog_(),))));
        
    break;
    
    case 'signup2':
        
        $userVenueCode=(isset($_POST['userVenueCode']))?mb_strtolower($_POST['userVenueCode']):exit(json_encode(array('status'=>false,'error'=>'NO_CODEVENUE')));
        
        if( !trim($_POST['userVenueCode']) ){
            exit(json_encode(array('status'=>false,'error'=>'NO_CODEVENUE_EMPTY')));
        }

        
        $userEmail=(isset($_POST['userEmail']))?$_POST['userEmail']:exit(json_encode(array('status'=>false,'error'=>'NO_USEREMAIL_SPECIFIED')));
        $userPassword=(isset($_POST['userPassword']))?$_POST['userPassword']:exit(json_encode(array('status'=>false,'error'=>'NO_USERPASSWORD_SPECIFIED')));
        $userOrigin=(isset($_POST['userOrigin']))?$_POST['userOrigin']:false;
        $userOriginPlatform=(isset($_POST['userOriginPlatform']))?$_POST['userOriginPlatform']:exit(json_encode(array('status'=>false,'error'=>'NO_USERORIGINPLATFORM_SPECIFIED')));
        
        $userNotificationsToggle=(isset($_POST['userNotificationsToggle']))?$_POST['userNotificationsToggle']:false;
        
        if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)) {
            exit(json_encode(array('status'=>false,'error'=>'USEREMAIL_NOT_VALID')));
        }
        
        mysql_query("SELECT * FROM users WHERE useremail='$userEmail'") 
            or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
        if (mysql_affected_rows()>'0') {
            exit(json_encode(array('status'=>false,'error'=>'USER_ALREADY_EXISTS')));
        }
        
        //CODES
        if ($userVenueCode) {
            
            if ($userVenueCode=='apitest') {
                $userVenue=array('venueName'=>'Blend','venueID'=>'Blend');
            } else {
                
                $getCode=mysql_query("SELECT * FROM venues WHERE venuecode='$userVenueCode' LIMIT 1") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
                if (mysql_affected_rows()=='0') {
                     exit(json_encode(array('status'=>false,'error'=>'NO_CODEVENUE_NOT_VALID')));
            
                } else {
                    $rowCode=mysql_fetch_assoc($getCode);
                    $userVenue=array('venueName'=>$rowCode['venuename'],'venueID'=>$rowCode['venuename']);
                }
            }
        } else {
            exit(json_encode(array('status'=>false,'error'=>'NO_CODEVENUE_EMPTY')));
        }
        
        //CODES
        
        
        if ($userPassword=='') {
            exit(json_encode(array('status'=>false,'error'=>'USERPASSWORD_IS_BLANK')));
        }
        
        // hash&Salt
        $userPassword=md5($userPassword.'872139872130471234909');
        
        $userToken=substr(md5($_SERVER['REQUEST_TIME'].$userEmail),0,12);
        mysql_query("
            INSERT INTO users SET 
                useremail='$userEmail',
                userpassword='$userPassword',
                uservenuecode='$userVenueCode',
                usertoken='$userToken',
                userregdate='$_SERVER[REQUEST_TIME]',
                userlastlogin='$_SERVER[REQUEST_TIME]',
                userlastorigin='$userOrigin',
                useroriginplatform='$userOriginPlatform',
                type_register=0
            ")or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR'))));
        $userid=mysql_insert_id();
        createNewProgress($userid);
        
        if ($userOrigin) {
            // register Origin
            mysql_query("SELECT * FROM origins WHERE origin='$userOrigin' AND originuserid='$userid'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            if (mysql_affected_rows()=='0') {
                mysql_query("INSERT INTO origins SET origin='$userOrigin', originuserid='$userid', originlastlogindate='$_SERVER[REQUEST_TIME]'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            } else {
                mysql_query("UPDATE origins SET originlastlogindate='$_SERVER[REQUEST_TIME]' WHERE origin='$userOrigin' AND originuserid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            }
        }
        
        
        
        
        if ($userNotificationsToggle!==false) {
            if ($userNotificationsToggle=='1') {
                mysql_query("UPDATE users SET usernotifications='1' WHERE userid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            } else {
                mysql_query("UPDATE users SET usernotifications='0' WHERE userid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            }
        }
        exit(json_encode(array('status'=>true,'response'=>array('userToken'=>$userToken,'userVenue'=>$userVenue,'latestCatalog'=>getLatestCatalog_(),))));
        
    break;
    
    case 'login':
        
        $userEmail=(isset($_POST['userEmail']))?$_POST['userEmail']:exit(json_encode(array('status'=>false,'error'=>'NO_USEREMAIL_SPECIFIED')));
        $userPassword=(isset($_POST['userPassword']))?$_POST['userPassword']:exit(json_encode(array('status'=>false,'error'=>'NO_USERPASSWORD_SPECIFIED')));
        $userOrigin=(isset($_POST['userOrigin']))?$_POST['userOrigin']:false;
        $userNotificationsToggle=(isset($_POST['userNotificationsToggle']))?$_POST['userNotificationsToggle']:false;
        
        // hash&Salt
        $userPassword=md5($userPassword.'872139872130471234909');
        
        $con=mysql_query("SELECT * FROM users WHERE useremail='$userEmail' AND userpassword='$userPassword'")
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
        if (mysql_affected_rows()=='0') {
            exit(json_encode(array('status'=>false,'error'=>'USER_NOT_FOUND')));
        }
        
        $row=mysql_fetch_assoc($con);
        $userid=$row['userid'];
        
        if ($userOrigin) {
            // register Origin
            mysql_query("SELECT * FROM origins WHERE origin='$userOrigin' AND originuserid='$userid'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            if (mysql_affected_rows()=='0') {
                mysql_query("INSERT INTO origins SET origin='$userOrigin', originuserid='$userid', originlastlogindate='$_SERVER[REQUEST_TIME]'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            } else {
                mysql_query("UPDATE origins SET originlastlogindate='$_SERVER[REQUEST_TIME]' WHERE origin='$userOrigin' AND originuserid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            }
        }
        
        
        mysql_query("UPDATE users SET userlastlogin='$_SERVER[REQUEST_TIME]' WHERE userid='$userid'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
        
       
        //CODES
        if ($row['uservenuecode']!='') {
            
            if ($row['uservenuecode']=='APITEST') {
                $userVenue=array('venueName'=>'Blend','venueID'=>'Blend');
            } else {
                
                $getCode=mysql_query("SELECT * FROM venues WHERE venuecode='$row[uservenuecode]' LIMIT 1") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
                if (mysql_affected_rows()=='0') {
                    //exit(json_encode(array('status'=>false,'error'=>'INCORRECT_VENUE_CODE')));
                    
                    $userVenue=array('venueName'=>NULL,'venueID'=>NULL);
                    $userVenueCode='';
            
                } else {
                    $rowCode=mysql_fetch_assoc($getCode);
                    $userVenue=array('venueName'=>$rowCode['venuename'],'venueID'=>$rowCode['venuename']);
                }
            }
        } else {
            
            $userVenue=array('venueName'=>NULL,'venueID'=>NULL);
            $userVenueCode='';

        }
        
        //CODES
        
        if ($userNotificationsToggle!==false) {
            if ($userNotificationsToggle=='1') {
                mysql_query("UPDATE users SET usernotifications='1' WHERE userid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            } else {
                mysql_query("UPDATE users SET usernotifications='0' WHERE userid='$userid'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            }
        }
        
        $response=array('userToken'=>$row['usertoken'],'userVenue'=>$userVenue,'latestCatalog'=>getLatestCatalog_());
        catalogVersionCompare();
        exit(json_encode(array('status'=>true,'response'=>$response)));
        
    break;
        
    case 'getCatalog':
        
        $userToken=(isset($_POST['userToken']))?$_POST['userToken']:exit(json_encode(array('status'=>false,'error'=>'NO_USERTOKEN_SPECIFIED')));
        $user=validateToken($userToken);
        if (!$user) exit(json_encode(array('status'=>false,'error'=>'USERTOKEN_IS_INVALID')));
        
        $response=array('latestCatalog'=>getLatestCatalog_());
        catalogVersionCompare();
        exit(json_encode(array('status'=>true,'response'=>$response)));
        
    break;
    
    case 'registerSurveyGrade':
        
        $userToken=(isset($_POST['userToken']))?$_POST['userToken']:exit(json_encode(array('status'=>false,'error'=>'NO_USERTOKEN_SPECIFIED')));
        $user=validateToken($userToken);
        if (!$user) exit(json_encode(array('status'=>false,'error'=>'USERTOKEN_IS_INVALID')));
        
        $surveyGrade=(isset($_POST['surveyGrade']))?$_POST['surveyGrade']:exit(json_encode(array('status'=>false,'error'=>'NO_SURVEYGRADE_SPECIFIED')));
        mysql_query("UPDATE users SET usersurveygrade='$surveyGrade' WHERE userid='$user[userid]'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
        
        $response=null;
        catalogVersionCompare();
        exit(json_encode(array('status'=>true,'response'=>$response)));
        
    break;
    
    case 'toggleNotifications':
        
        $userToken=(isset($_POST['userToken']))?$_POST['userToken']:exit(json_encode(array('status'=>false,'error'=>'NO_USERTOKEN_SPECIFIED')));
        $user=validateToken($userToken);
        if (!$user) exit(json_encode(array('status'=>false,'error'=>'USERTOKEN_IS_INVALID')));
        
        $userOrigin=(isset($_POST['userOrigin']))?$_POST['userOrigin']:exit(json_encode(array('status'=>false,'error'=>'NO_USERORIGIN_SPECIFIED')));
        $userNotificationsToggle=(isset($_POST['userNotificationsToggle']))?$_POST['userNotificationsToggle']:exit(json_encode(array('status'=>false,'error'=>'NO_USERNOTIFICATIONTOGGLE_SPECIFIED')));
        if ($userNotificationsToggle=='1') {
            mysql_query("UPDATE users SET usernotifications='1' WHERE userid='$user[userid]'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
        } else {
            mysql_query("UPDATE users SET usernotifications='0' WHERE userid='$user[userid]'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
        }
        
        if ($userOrigin) {
            // register Origin
            mysql_query("SELECT * FROM origins WHERE origin='$userOrigin' AND originuserid='$user[userid]'") 
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            if (mysql_affected_rows()=='0') {
                mysql_query("INSERT INTO origins SET origin='$userOrigin', originuserid='$user[userid]', originlastlogindate='$_SERVER[REQUEST_TIME]'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            } else {
                mysql_query("UPDATE origins SET originlastlogindate='$_SERVER[REQUEST_TIME]' WHERE origin='$userOrigin' AND originuserid='$user[userid]'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
            }
        }
        
        $response=null;
        catalogVersionCompare();
        exit(json_encode(array('status'=>true,'response'=>$response)));
        
    break;
        
    case 'checkIn':
        
        /*
        // log Query
        $myFile = "log_checkIn.txt";
        $fh = fopen($myFile, 'a') or die("can't open file");
        $stringData =date('D/M-Y h:i:s').' >> ============================'."\n\n".json_encode($_POST)."\n\n".'============================='."\n\n\n";
        fwrite($fh, $stringData);
        fclose($fh);
        */
        
        $userToken=(isset($_POST['userToken']))?$_POST['userToken']:exit(json_encode(array('status'=>false,'error'=>'NO_USERTOKEN_SPECIFIED')));
        $user=validateToken($userToken);
        if (!$user) exit(json_encode(array('status'=>false,'error'=>'USERTOKEN_IS_INVALID')));
        
        $checkIns=(isset($_POST['checkIns']))?$_POST['checkIns']:exit(json_encode(array('status'=>false,'error'=>'NO_CHECKINS_SPECIFIED')));
        
        $vez=1;
        foreach($checkIns AS $key=>$data) {
            
            $data['activityLevel']=(isset($data['activityLevel']))?$data['activityLevel']:exit(json_encode(array('status'=>false,'error'=>'NO_ACTIVITYLEVEL_SPECIFIED')));
            $data['activityStep']=(isset($data['activityStep']))?$data['activityStep']:exit(json_encode(array('status'=>false,'error'=>'NO_ACTIVITYSTEP_SPECIFIED')));
            $data['activityDate']=(isset($data['activityDate']))?$data['activityDate']:exit(json_encode(array('status'=>false,'error'=>'NO_ACTIVITYDATE_SPECIFIED')));
            $data['activitySlot']=(isset($data['activitySlot']))?$data['activitySlot']:exit(json_encode(array('status'=>false,'error'=>'NO_ACTIVITYSLOT_SPECIFIED')));
            
            /*
                // check CD
                $past=$_SERVER['REQUEST_TIME']-(60*60*24);
                mysql_query("SELECT * FROM events WHERE eventuserid='$user[userid]' AND eventactivityslot='".$data['activitySlot']."' AND eventregdate > '$past'") 
                    or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
                if (mysql_affected_rows()>0) {
                    exit(json_encode(array('status'=>false,'error'=>'ACTIVITYSLOT_CURRENTLY_ON_COOLDOWN')));
                } 
            */
            
            mysql_query("
                INSERT INTO events SET 
                    eventuserid='$user[userid]',
                    eventactivityslot='".$data['activitySlot']."',
                    eventstep='".$data['activityStep']."',
                    eventdate='".$data['activityDate']."',
                    eventactivitylevel='".$data['activityLevel']."',
                    eventregdate='$_SERVER[REQUEST_TIME]'
                ") or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR'))));
            
            $vez++;
        }
        
        // recount Progress
        $notifications=updateProgress($user['userid']);
        $response=array('progress'=>getProgress($user['userid']),'userid*DEBUG'=>$user['userid']);
        
        if (count($notifications)>0) {
            $response['notifications']=$notifications;
        }
        
        catalogVersionCompare();
        exit(json_encode(array('status'=>true,'response'=>$response)));
        
    break;
    
    case 'getProgress':
        
        $userToken=(isset($_POST['userToken']))?$_POST['userToken']:exit(json_encode(array('status'=>false,'error'=>'NO_USERTOKEN_SPECIFIED')));
        $user=validateToken($userToken);
        if (!$user) exit(json_encode(array('status'=>false,'error'=>'USERTOKEN_IS_INVALID')));
        
        $response=array('progress'=>getProgress($user['userid']));
        catalogVersionCompare();
        exit(json_encode(array('status'=>true,'response'=>$response)));
        
    break;
    
    default:
        exit(json_encode(array('status'=>false,'error'=>'NO_METHOD_SPECIFIED')));
    break;
}

exit(json_encode(array('status'=>false,'error'=>'NOTHING_TO_DO')));

?>