<?php

/**
 * @author Tom Gillespy
 * @copyright 2013
 */

require('../includes/php_serial.class.php');

$serial = new phpSerial();
$serial->deviceSet("/dev/ttyACM0"); //The device path
$serial->confBaudRate(9600); //Baud rate setting, although apparently not needed
$serial->confParity("none");//partiy, needed?
$serial->confCharacterLength(8); //byte length to 7 bits
$serial->confStopBits(1);//stop bits, needed?
// open the connection
$serial->deviceOpen();
$servonum = 1;
$position = 6000;
$acc = 1;
$speed = 2;
$serial->sendMessage(chr(0x89) . chr($servonum) . chr($acc & 0x7F) . chr(($acc >> 7) & 0x7F));
usleep(1);
$serial->sendMessage(chr(0x87) . chr($servonum) . chr($speed & 0x7F) . chr(($speed >> 7) & 0x7F));
usleep(1);
$serial->sendMessage(chr(0x84) . chr($servonum) . chr($position & 0x7F) . chr(($position >> 7) & 0x7F));

$serial->sendMessage(chr(0x90) . chr($servonum));
$positionread = $serial->readPort(2);
$actualposition = (($positionread[1] << 8).$positionread[0]) & chr(0xFFFF);
echo $actualposition;
$serial->deviceClose();
?>
