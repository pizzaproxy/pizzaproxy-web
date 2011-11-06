<?php
class helper {

  public static function formatPrice($cent) {
    $decimal = $cent%100;
    if ($decimal == 0) $decimal = "00";
    return floor($cent/100) .",$decimal" . " €";
  }

  public static function formatPriceLaTeX($cent) {
    $decimal = $cent%100;
    if ($decimal == 0) $decimal = "00";
    return floor($cent/100) .",$decimal"." \euro{}";
  }  

  public static function getMissingPizzas($offers,$pizzaServices,$pizzas) {
    $missingPizzas = array();
    // if I would do 3 wrapped loops at work, my boss would kill me ;)
	// mine too.
    foreach ($offers as $proxy) {
      foreach ($pizzaServices as $service) {
        $exists = false;
        foreach ($pizzas as $pizza) {
          if ($pizza["serviceid"] == $service["id"] && $pizza["proxyid"] == $proxy["id"]) {
            $exists = true;
          }
        }
        if ($exists == false) {
          $missingPizzas[] = array("service" => $service["name"], "proxy" => $proxy["name"]);
        }
      }
    }
    return $missingPizzas;
  }

  public static function getConfig($key) {
      $config = include dirname(__FILE__).'/../config.php';
      return $config[$key];
  }

  public static function readline($desc) {
      if(function_exists('readline')){
          return trim(readline($desc));
      }else{
          echo $desc;
          $fp = fopen("php://stdin", "r");
          $in = fgets($fp, 4094); // Maximum windows buffer size
          fclose ($fp);
          return trim($in);
      }
  }

  /**
   * password_ssha and password_verify_ssha are included with the kind permission from Alex
   * 
   * @author Alex Badent <abadent@gmail.com>
   * @license http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-Share Alike 3.0 Unported
   * @copyright Copyright &copy; 2010 Alex Badent   
   */
  public static function password_ssha($pass) {
      mt_srand((double)microtime()*1000000);
      $salt = pack("CCCC", mt_rand(), mt_rand(), mt_rand(), mt_rand());
      $hash = "{SSHA}" . base64_encode(pack("H*", sha1($pass . $salt)) . $salt);
      return (string)$hash;
  }
  public static function password_verify_ssha($hash, $pass) {
     $ohash = base64_decode(substr($hash, 6));
     $osalt = substr($ohash, 20);
     $ohash = substr($ohash, 0, 20);
     $nhash = pack("H*", sha1($pass . $osalt));
     if ($ohash == $nhash) {
       return TRUE;
     } else {
       return FALSE;
     }
  }
  /**
   * end of foreign code
   */


}
