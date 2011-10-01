<?php

include 'lib/helper.class.php';

$configfile = "config.php";

if (is_writable($configfile)) {

    echo "This will overwrite config.php, do you want to continue?\n";
    $answer= readline("Y/n");
    if (!in_array($answer,array("Y","y","YES","yes","\n"))) {
        exit(1);
    }
    if (!$handle = fopen($configfile, "a+")) {
        echo "Cannot open $filename for writing.";
        exit(1);
    }
    $content  = "return array(\n";
    $content .= '   "event" => "'.readline("Eventname: ").'",'."\n";
    $content .= '   "logofile" => "'.readline("Logoname (in img/): ").'",'."\n";
    $content .= '   "apiuser" => array('."\n";
    while($user = readline("Apiuser: ")){
        if($user = "\n"){
            break;
        }else{
            $pw = helper::password_ssha(trim(readline("Password: ")));
            $content .= '"'.$user.'" => "'.$pw.'",'."\n";
        }
    }
    $content .= '   ),'."\n";
    $content .= '"alternatives_visible" => 3';
    $content .= ');';

    if (!fwrite($handle, $content)) {
        echo "Cannot write to file. Dumping content instead: \n\n";
        echo $content;
        exit(1);
    }

    fclose($handle);

}else{
    echo "Error: config.php is not writeable.\n";
    exit(1);
}
