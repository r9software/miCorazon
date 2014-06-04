<?php

require 'inc_core.php';
$mensaje='Mensaje de prueba para Edgar';

//

//mac
//03d0be9f39a205232e57b13740eeed9da4845816a76eee45fdda483b1c779392

$loop=array(
    array(
        'token'=>'83649287a72f98a974d8819c8d70bebb05fd8264f4419e2305b63fc205b69aac',
        'mensaje'=>$mensaje
    ),
    /*array(
        'token'=>'83649287a72f98a974d8819c8d70bebb05fd8264f4419e2305b63fc205b69aac',
        'mensaje'=>$mensaje
    )*/
);

push($loop);

function push($loop) {
    
    foreach($loop AS $notification) {
        
        // Put your device token here (without spaces):
        $deviceToken = $notification['token'];
        // Put your private key's passphrase here:
        $passphrase = 'hola';
        // Put your alert message here:
        $message = $notification['mensaje'];

        ////////////////////////////////////////////////////////////////////////////////
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        $fp = stream_socket_client(
                'ssl://gateway.sandbox.push.apple.com:2195', $err,
                $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
                exit("Failed to connect: $err $errstr" . PHP_EOL);

        echo 'Connected to APNS' . PHP_EOL.'<br/>';

        // Create the payload body
        $body['aps'] = array(
                'alert' => $message,
                'sound' => 'chime',
                'badge' => 0
                );

        // Encode the payload as JSON
        $payload = json_encode($body);
        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        if (!$result)
                echo 'Message FAIL delivered to '.$notification['token']. PHP_EOL.'<br/>';
        else
                echo 'Message OK delivered to '.$notification['token']. PHP_EOL.'<br/>';

        // Close the connection to the server
        fclose($fp);   
    }    
}

echo'<br/><br/>';
exit(json_encode(array('status'=>false,'error'=>'NOTHING_TO_DO')));

?>