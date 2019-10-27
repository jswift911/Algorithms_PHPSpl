<?php
$stream = 0;
$streams = 2;
$message = "";
$flag = 99;
$memory = new SplStack();

while(true){
    
    switch ($stream) {
        case 1:
            $string = "Demon: I'm waiting your orders. Ask me to remember or to remind something!";
            if($string){
                sleep(1);
                $socketOut = stream_socket_client('tcp://127.0.0.1:5432');
                if($message){
                    fwrite($socketOut, $message . PHP_EOL);
                    $message = '';
                    $flag = 0;
                }else{
                    fwrite($socketOut, $string . PHP_EOL);
                }
                
                fclose($socketOut);
            }
            break;
            
        case 0:
            $socketServer = stream_socket_server("tcp://127.0.0.1:6543");
            $socketOut = stream_socket_accept($socketServer, -1);
            $call = fread($socketOut, 1024);
            $call = mb_substr($call, 0, -2);
            $call = mb_strtolower($call);
            $command = "";
            $result = preg_match("/^\w+/",$call, $command);
            
            switch ($command[0]) {
                case 'remember':
                    $memory->push(str_replace('remember ', '', $call));
                    $message = "Demon: I will remember it. Anything else?";
                    break;
                case 'remind':
                    if($memory->isEmpty()){
                        $message = "Demon: Nothing to reminde. Anything to remember?";
                    }else{
                        $message = "Demon: Your last phrase was \"{$memory->pop()}\". Anything else?";
                    }
                    
                    break;
                case 'hi':
                case 'hello':
                    $message = "Demon: Greetings, my master.";
                    break;
                default:
                    break;
            }
            fclose($socketOut);
            fclose($socketServer);
            break;
    }
    
    $stream = ($stream + 1) % $streams;
}

