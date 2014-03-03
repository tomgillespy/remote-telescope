<?php

/**
 * @author Tom Gillespy
 * @copyright 2013
 */

require('../includes/php_serial.class.php');

$serial = new phpSerial();
$serial->deviceSet("/dev/ttyUSB0"); //The device path
$serial->confBaudRate(2400); //Baud rate setting, although apparently not needed
$serial->confParity("none");//partiy, needed?
$serial->confCharacterLength(8); //byte length to 7 bits
$serial->confStopBits(1);//stop bits, needed?
// open the connection
$serial->deviceOpen();
$servonum = 1;
$position = 6000;
$acc = 1;

$speed = 2;
for ($i = 1, $i < 100, $i++)
{
$serial->sendMessage(chr(0xFF) . chr(0x0A) . chr(0x00) . chr(0x40).chr(0x00).chr(0x00).chr(0x4A));
$serial->sendMessage(chr(0xFF) . chr(0x0A) . chr(0x00) . chr(0x40).chr(0x00).chr(0x00).chr(0x4A));
};

usleep(1);
$serial->sendMessage(chr(0xFF) . chr(0x0A) . chr(0x00) . chr(0x00).chr(0x00).chr(0x00).chr(0x0A));

$serial->sendMessage(chr(0x90) . chr($servonum));
$positionread = $serial->readPort(2);
$actualposition = (($positionread[1] << 8).$positionread[0]) & chr(0xFFFF);
echo $actualposition;
$serial->deviceClose();
?>
