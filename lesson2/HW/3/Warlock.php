<?php
$stream = 0;
$streams = 2;

while(true){
        
    switch ($stream) {
        case 0:
            echo "You: ";
            $string = fgets(STDIN, 255);
            if($string){
                $socketOut = stream_socket_client('tcp://127.0.0.1:6543');
                fwrite($socketOut, $string);
                fclose($socketOut);
            }
            break;
            
        case 1:
            $socketServer = stream_socket_server("tcp://127.0.0.1:5432");
            $socketOut = stream_socket_accept($socketServer, -1);
            echo fread($socketOut, 1024);
            fclose($socketOut);
            fclose($socketServer);
            break;
    }
    
    $stream = ($stream + 1) % $streams;
}

