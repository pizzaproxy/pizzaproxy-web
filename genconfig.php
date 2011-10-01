<?php

include 'lib/helper.class.php';

$configfile = "config.php";

if (is_writable($configfile)) {

    echo "This will overwrite config.php, do you want to continue?\n";
    $answer = helper::readline("Y/n: ");
    if (!in_array($answer,array("Y","y","YES","yes","\n",""))) {
        exit(1);
    }
    if (!$handle = fopen($configfile, "w+")) {
        echo "Cannot open $filename for writing.";
        exit(1);
    }
    $content  = "<?php return array(\n";
    $content .= '   "event" => "'.helper::readline("Eventname: ").'",'."\n";
    $content .= '   "logofile" => "'.helper::readline("Logoname (in img/): ").'",'."\n";
    $content .= '   "apiuser" => array('."\n";
    $answer = helper::readline("Add API Users? Y/n: ");
    if (in_array($answer,array("Y","y","YES","yes","\n",""))) {
        $adduser = true;
            while($adduser == true){
                $user = helper::readline("Apiuser: ");
            if($user == ""){
                break;
            }else{
                $pw = helper::password_ssha(trim(helper::readline("Password: ")));
                $content .= '"'.$user.'" => "'.$pw.'",'."\n";
            }
            $answer = helper::readline("Add more API Users? Y/n: ");
            if (!in_array($answer,array("Y","y","YES","yes","\n",""))) {
                $adduser = false;
            }
        }
    }
    $content .= '   ),'."\n";
    $content .= '"alternatives_visible" => 3';
    $content .= '); ?>';

    if (!fwrite($handle, $content)) {
        echo "Cannot write to file. Dumping content instead: \n\n";
        echo $content;
        exit(1);
    }

    fclose($handle);

    echo "Written config!\n";

}else{
    echo "Error: config.php is not writeable.\n";
    exit(1);
}

