<?php

function pre_array($array,$block=false) {
    echo '<pre';
    if ($block) {
        echo ' style="display:block;float:left;clear:left;width:100%;background:white;color:#666"';
    }
    echo '>';
        print_r($array);
    echo '</pre>';
}

ob_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');

$globalSettings=Array();
$globalSettings['server']='localhost';
$globalSettings['mysqluser']='habitos';
$globalSettings['mysqlpassword']='eureka';
$globalSettings['mysqldb']='ricardo_xvh';

$db = mysql_connect($globalSettings['server'],$globalSettings['mysqluser'],$globalSettings['mysqlpassword']) or exit(json_encode(array('status'=>false,'error'=>'MYSQL_CONNECT_ERROR')));
mysql_select_db($globalSettings['mysqldb'],$db) or exit(json_encode(array('status'=>false,'error'=>'MYSQL_CONNECT_ERROR')));
mysql_query("SET NAMES utf8") or exit(json_encode(array('status'=>false,'error'=>'MYSQL_CONNECT_ERROR')));

function validateToken($token) {
    
    $con=mysql_query("SELECT * FROM users WHERE usertoken='$token' LIMIT 1")
                or die(exit(json_encode(array('status'=>false,'error'=>'DB_ERROR: '.mysql_error()))));
    if (mysql_affected_rows()=='0') {
        return false;
    } else {
        $row=mysql_fetch_assoc($con);
        return $row;
    }
}

function multidimensionalArrayMap($func,$arr) {
    $newArr=array();
    foreach($arr as $key=> $value) {
        $newArr[$key]=( is_array($value)?multidimensionalArrayMap($func,$value):$func($value) );
    }
    return $newArr;
}

function getLatestCatalog() {
    
    $catalog=new stdClass();
    $catalog->catalogRevision='1';
    $catalog->catalogRevisionDate=$_SERVER['REQUEST_TIME'];
    $catalog->slots=array();
    for($i=0;$i<15;$i++) {
        
        $array=new stdClass();
        $array->title='Título actividad #'.$i;
        $array->what='Qué? de actividad #'.$i;
        $array->why='Porqué? de actividad #'.$i;
        
        $array->activities=array();
        
        for($y=0;$y<3;$y++) {
            $array->activities[$y]=new stdClass();
            
            $array->activities[$y]->actionName='Acción nivel '.$y.' del slot #'.$i;
            $array->activities[$y]->goalDescription='Duración de la Acción nivel '.$y.' del slot #'.$i;
            $array->activities[$y]->totalSteps=rand(1,90);
            
            $array->activities[$y]->tips=array();
            
            for($t=0;$t<rand(2,4);$t++) {
                $array->activities[$y]->tips[$t]=new stdClass();
                $array->activities[$y]->tips[$t]->tipDescription='Descripción del tip '.$t.' de la Actividad nivel '.$y.' del slot '.$i;
            }
            
        }
        
        $catalog->slots[$i]=$array;
        
        
    }
    return $catalog;
}

function getLatestCatalog_() {
    
    $catalog=new stdClass();
    $catalog->catalogRevision='1';
    $catalog->catalogRevisionDate=$_SERVER['REQUEST_TIME'];
    $catalog->slots=array();
    
    $vox=0;
    $con=mysql_query("SELECT * FROM slot ORDER BY slotid ASC") or die(mysql_error());
    while($row=mysql_fetch_assoc($con)) {
        
        $array=new stdClass();
        $array->title=$row['slotname'];
        $array->what=trim(str_replace(array("\r\n", "\r","\n"), "", $row['slotwhat']));
        $array->why=trim(str_replace(array("\r\n", "\r","\n"), "", $row['slotwhy']));
        $array->order=$row['slotorder'];
        $array->slotID=$row['slotid'];
        
        $array->activities=array();
        $cox=mysql_query("SELECT * FROM activity WHERE activityslot='$row[slotid]'") or die(mysql_error());
        $vez=0;
        while($rox=mysql_fetch_assoc($cox)) {
            $array->activities[$vez]=new stdClass();
            
            $array->activities[$vez]->actionName=$rox['activityaction'];
            $array->activities[$vez]->goalDescription=$rox['activitylength'];
            $array->activities[$vez]->totalSteps=$rox['activitysteps'];
            
            $array->activities[$vez]->tips=array();
            $coz=mysql_query("SELECT * FROM tip WHERE tipactivityid='$rox[activityid]'") or die(mysql_error());
            $vaz=1;
            while($roz=mysql_fetch_assoc($coz)) {
                
                //if ($vaz==1) break;
                $array->activities[$vez]->tips[$vaz]=new stdClass();
                $array->activities[$vez]->tips[$vaz]->tipDescription=trim(str_replace(array("\r\n", "\r","\n"), "", strip_tags($roz['tipdescription'])));
                $vaz++;
            }
            $vez++;
        }
        
        $catalog->slots[$row['slotid']]=$array;
        $vox++;
    }

    
    return $catalog;
}

function catalogVersionCompare() {
    global $response;
    
    $localCatalogVersion=(isset($_POST['localCatalogVersion']))?$_POST['localCatalogVersion']:false;
    
    if ($localCatalogVersion!==false) {
        $response['latestCatalogVersion']=1;
    }
}

function createNewProgress($userid) {

    $data=getLatestCatalog_();   
    $sql="INSERT INTO progress SET ";
    $inserts=array(
        'progressuserid'=>$userid
    );
    
    for($i=1;$i<16;$i++) {
        $inserts['progressactivitycurrent_'.$i]=0;
        $inserts['progressactivitylevel_'.$i]=0;
        $inserts['progressactivitytotal_'.$i]=$data->slots[$i]->activities[0]->totalSteps;
    }
    
    $time=1;
    foreach($inserts AS $key=>$val) {
        $sql.="$key='$val'";
        if ($time<count($inserts)) {
            $sql.=', ';
        }
        $time++;
    }
    
    mysql_query($sql) or die(mysql_error());
    
    return true;
}

function getProgress($userid) {
    
    $con=mysql_query("SELECT * FROM progress WHERE progressuserid='$userid'") or die(mysql_Error());
    $row=mysql_fetch_assoc($con);
    
    //unset($row->progressuserid);
    $array=new stdClass();
    $array->slots=array();
    //$array->META=$userid;
    
    for($i=1;$i<16;$i++) {
        $array->slots[$i]=new stdClass();
        $array->slots[$i]->slotID=$i;
        $array->slots[$i]->slotCurrentLevel=$row['progressactivitylevel_'.$i];
        $array->slots[$i]->slotCurrentStep=($row['progressactivitycurrent_'.$i]>$row['progressactivitytotal_'.$i])?$row['progressactivitytotal_'.$i]:$row['progressactivitycurrent_'.$i];
        $array->slots[$i]->slotCurrentTotalSteps=$row['progressactivitytotal_'.$i];
    }
    
    return $array;
}

function updateProgress($userid) {
    
    $progresoAnterior=getProgress($userid);
    $catalogoCompleto=getLatestCatalog_();
    $slots=array();
    $notifications=array();
    
    for($s=1;$s<16;$s++) {
        
        $slots[$s]['MaxLevel']=0;
        $slots[$s]['MaxSteps']=0;
        for($a=0;$a<3;$a++) {
            
            if ($a<$progresoAnterior->slots[$s]->slotCurrentLevel) {
                continue;
            }
            
            $con=mysql_query("SELECT COUNT(eventuserid) AS Many FROM events WHERE eventuserid='$userid' AND eventactivityslot='$s' AND eventactivitylevel='$a'") or die(mysql_Error());
            if (mysql_affected_rows()>0) {
                $row=mysql_fetch_object($con);
                //if ($s=='1') echo "En Slot $s Actividad $a hay $row->Many eventos<br/>\\n";
                //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'Hay '.$row->Many.' en Slot '.$s.' //Anterior: '.$progresoAnterior->slots[$s]->slotCurrentTotalSteps);
                if ($row->Many>$progresoAnterior->slots[$s]->slotCurrentTotalSteps) {
                    
                    if (($a+1)>2) {
                        
                        //Edgar Fix
                        //Si es mayor, subir a último Step
                        if ($row->Many>$progresoAnterior->slots[$s]->slotCurrentTotalSteps) {
                            mysql_query("UPDATE progress SET progressactivitycurrent_$s='".$progresoAnterior->slots[$s]->slotCurrentTotalSteps."',progressactivitytotal_$s='".$progresoAnterior->slots[$s]->slotCurrentTotalSteps."',progressactivitylevel_$s='".($a)."' WHERE progressuserid='$userid'") or die(mysql_Error());
                            //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'LEVELCAP FIX: '.$s.' //'.$a);
                        } else {
                            //Level Cap
                            $slots[$s]['MaxLevel']=2;
                            //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'LEVELCAP: '.$s.' //'.$a);
                        }
                        
                    }
                    
                } elseif ($row->Many==$progresoAnterior->slots[$s]->slotCurrentTotalSteps) {

                        //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'LEVELUP: '.$s.' //'.$a);
                        //Level up
                        $slots[$s]['MaxLevel']=($a+1);
                        mysql_query("UPDATE progress SET progressactivitycurrent_$s='0',progressactivitytotal_$s='".$catalogoCompleto->slots[$s]->activities[($a+1)]->totalSteps."',progressactivitylevel_$s='".($a+1)."' WHERE progressuserid='$userid'") or die(mysql_Error());
                        $notifications[]=array('type'=>'LEVEL_UP','SLOT'=>$s,'PAST_LEVEL'=>$a,'NEW_LEVEL'=>($a+1));
                    
                } else {

                    
                    /*
                    if ($slots[$s]['MaxLevel']==$a) {
                        //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'UPDATE_PROGRESS: '.$s);
                        //Progress Update Only
                        $slots[$s]['MaxSteps']=$row->Many;
                        mysql_query("UPDATE progress SET progressactivitycurrent_$s='".$row->Many."' WHERE progressuserid='$userid'") or die(mysql_Error());
                    } else {
                        //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'NOSE_QUE_PASO: '.$s);
                    }
                    */
                    
                    $slots[$s]['MaxLevel']=$progresoAnterior->slots[$s]->slotCurrentLevel;
                    if ($slots[$s]['MaxLevel']==$a) {
                        //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'PROGRESO'.$s.' //'.$a);
                        //$slots[$s]['MaxSteps']=$row->Many;
                        mysql_query("UPDATE progress SET progressactivitycurrent_$s='".$row->Many."' WHERE progressuserid='$userid'") or die(mysql_Error());
                    } else {
                        //$notifications[]=array('type'=>'DEBUG','MESSAGE'=>'UNCAUGHT'.$s.' //'.$a);
                    }
                    
                }
            }
        }
        
    }//a
    //pre_array($slots);
    //$notifications[]=array('type'=>'LEVEL_UP','SLOT'=>rand(1,15),'PAST_LEVEL'=>0,'NEW_LEVEL'=>1);
    
    return $notifications;
}


?>
