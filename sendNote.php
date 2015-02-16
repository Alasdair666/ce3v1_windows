<?php

/* 
 * Released as free code by A Macleod.
 * This file expects to receive a $_REQUEST variable either in the form of a $_POST or $_Get.
 * A simple qury string with this variable could look like ?note=Red
 */
exec("mode COM3: BAUD=9600 PARITY=n DATA=8 STOP=1 to=off dtr=off rts=off"); 
$isRec = file('tmp/isRec.txt');
$isRec = $isRec[0];
$noteCount = 0;

function startRecording($firstNote){
   $np = fopen('tmp/currrentAtt.txt', 'w+');
    fwrite($np, $firstNote . '\n');
    fclose($np);
    $np = fopen('tmp/attStarted.txt', 'w');
    fwrite($np, true);
    fclose($np);
    $noteCount++;
}

function recordNote($aNote){
    $np = fopen('tmp/currrentAtt.txt', 'a');
    fwrite($np, $aNote . '\n');
    fclose($np);
    $noteCount++;
}
function stopRecording($lastNote){
    $np = fopen('tmp/currrentAtt.txt', 'a');
    fwrite($np, $lastNote . '\n');
    fclose($np);
    $np = fopen('tmp/isRec.txt', 'w');
    fwrite($np, false);
    fclose($np);
    $np = fopen('tmp/attComplete.txt', 'w');
    fwrite($np, true);
    fclose($np);
    $noteCount++;
}
if ($isRec != false && $noteCount === 0){
    startRecording($_REQUEST['note']);
} else if($isRec != false && $noteCount != 0){
    recordNote($_REQUEST['note']);
} else if ($isRec != false && $noteCount >= 4){
    stopRecording($_REQUEST['note']);
}

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