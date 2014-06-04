<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<?php
header('Content-Type: text/html; charset=utf-8');

require 'inc_core.php';
mysql_query('TRUNCATE TABLE slot') or die(mysql_error());
mysql_query('TRUNCATE TABLE activity') or die(mysql_error());
mysql_query('TRUNCATE TABLE tip') or die(mysql_error());
mysql_query('TRUNCATE TABLE progress') or die(mysql_error());
mysql_query('TRUNCATE TABLE users') or die(mysql_error());
mysql_query('TRUNCATE TABLE events') or die(mysql_error());

$slots=array();


$slotHeader=array(
    'Orden'=>'slotorder',
    'Titulo'=>'slotname',
    'Que'=>'slotwhat',
    'Por que'=>'slotwhy'
);

$activityHeader=array(
    
);

$headers=array();
$row = 1;
if (($handle = fopen("xvh.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $write=array();

        if ($row=='1') {
            
            for ($c=0; $c < $num; $c++) {
                echo $data[$c].'<br>';
                if (array_key_exists(utf8_encode($data[$c]),$slotHeader)) {
                    $headers[$c]=$slotHeader[$data[$c]];
                } else {
                    $headers[$c]=null;
                }
            }
            pre_array($headers);
        } else {
            
            for ($c=0; $c < $num; $c++) {
                if ($headers[$c]!='') {
                    echo "Existe ".utf8_encode($data[$c])." en $headers (".$headers[$c].")<br>";
                    $write[$headers[$c]]=utf8_encode(str_replace('##',',',$data[$c]));
                }
            }
            
            pre_array($write);
            mysql_query("
                INSERT INTO slot SET 
                slotorder='$write[slotorder]',
                slotname='$write[slotname]',
                slotwhat='$write[slotwhat]',
                slotwhy='$write[slotwhy]'
                ") or die(mysql_error());
            
            $slotid=mysql_insert_id();
            
            for($a=0;$a<3;$a++) {
                
                if ($a==0) {
                    $primero=utf8_encode(str_replace('##',',',$data[4]));
                    $segundo=utf8_encode(str_replace('##',',',$data[5]));
                }
                if ($a==1) {
                    $primero=utf8_encode(str_replace('##',',',$data[7]));
                    $segundo=utf8_encode(str_replace('##',',',$data[8]));
                }
                if ($a==2) {
                    $primero=utf8_encode(str_replace('##',',',$data[10]));
                    $segundo=utf8_encode(str_replace('##',',',$data[11]));
                }
                
                $step=explode('%',$segundo);
                //pre_array($step);
                
                //$lenght=$step[0].str_replace($step[1],'');
                
                mysql_query("
                INSERT INTO activity SET 
                    activityslot='$slotid',
                    activitylevel='$a',
                    activityaction='$primero',
                    activitysteps='".$step[1]."',
                    activitylength='$step[0]'
                ") or die(mysql_error());
                
                $activityid=mysql_insert_id();
                
                if ($a==0) {
                    $primero=utf8_encode(str_replace('##',',',$data[6]));
                }
                if ($a==1) {
                    $primero=utf8_encode(str_replace('##',',',$data[9]));
                }
                if ($a==2) {
                    $primero=utf8_encode(str_replace('##',',',$data[12]));
                }
                
                $explode=explode('@@',$primero);
                
                foreach($explode AS $tip) {
                    mysql_query("
                        INSERT INTO tip SET 
                            tipactivityid='$activityid',
                            tipdescription='$tip'
                        ") or die(mysql_error());
                }

            }
            
        }
        
        $row++;
    }
    fclose($handle);
}






exit('done');

?>
