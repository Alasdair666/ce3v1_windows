<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$verz="1.0";
//$comPort = "/dev/ttyACM0"; /*change to correct com port */
exec("mode COM3: BAUD=9600 PARITY=n DATA=8 STOP=1 to=off dtr=off rts=off"); 


if (isset($_REQUEST['note'])){
    switch($_REQUEST['note']){
        case 'Red': $fp = fopen("COM3", "w");
                    fwrite($fp, 1); /* this is the number that it will write */
                    fclose($fp);
                    break;
        case 'Orange': $fp = fopen("COM3", "w");
                        fwrite($fp, 2); /* this is the number that it will write */
                        fclose($fp);
                    break;
        case 'Purple': $fp = fopen("COM3", "w");
                        fwrite($fp, 3); /* this is the number that it will write */
                        fclose($fp);
                    break;
        case 'Yellow': $fp = fopen("COM3", "w");
                        fwrite($fp, 4); /* this is the number that it will write */
                        fclose($fp);
                    break;
        case 'White': $fp = fopen("COM3", "w");
                        fwrite($fp, 5); /* this is the number that it will write */
                        fclose($fp);
                    break;
        case 'Stop': $fp = fopen("COM3", "w");
                        fwrite($fp, 6); /* this is the number that it will write */
                        fclose($fp);
                    break;
        default: die('The page just puked');
    }
    
}
?>