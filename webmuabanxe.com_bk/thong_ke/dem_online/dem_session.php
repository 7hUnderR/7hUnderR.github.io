<?php
//--------------------------so nguoi online
 $GLOBALS['CURRENT_TIME'] = time();
 $GLOBALS['CURRENT_TIME'] -= date("Z", $GLOBALS['CURRENT_TIME']);
 $sessionID = open_session();
 dbl_UpdateSession($sessionID);
function open_session() {
 return session_id();
}
function dbl_UpdateSession($sessionID) {
 $filename = "thong_ke/dem_online/session.tdb";
 $fp = fopen($filename, 'r+');
 if ( $fp ) {
  flock($fp, LOCK_EX);
  $data = fread($fp, filesize($filename));
  $sessions = unserialize($data);
 } else {
  $sessions = Array();
 }

 $sessions[$sessionID] = $GLOBALS['CURRENT_TIME'];
 $quit = 0;
 while ( !$quit ) {
  $quit = 1;
  foreach ( $sessions as $ID=>$DATA ) {
   if ( $DATA < $GLOBALS['CURRENT_TIME']-900 ) {
    unset($sessions[$ID]);
    $quit = 0;
    break;
   }
  }
 }
 $GLOBALS['SESSIONS'] = $sessions;
 $sessiondata = serialize($sessions);
 if ( $fp ) {
  fseek($fp, 0);
  ftruncate($fp, 0);
 } else {
  $fp = fopen($filename, "w");
  if ( $fp ) {
   flock($fp, LOCK_EX);
  }
 }
 if ( $fp ) {
  fwrite($fp, $sessiondata);
  flock($fp, LOCK_UN);
  fclose($fp);
 }
}
$online=count($GLOBALS['SESSIONS']);
//$ran=rand(20, 50);
$ran=0;
$online = $online + $ran;

//-------------------------end-so nguoi online

?>
