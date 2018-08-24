<?php
session_start();
$_SESSION["captcha"] = intval(rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9)); // 

$my_img = imagecreate( 80, 40 );
$background = imagecolorallocate( $my_img, 230, 230, 230 );
$text_colour = imagecolorallocate( $my_img, 0, 0, 0 );
$line_colour = imagecolorallocate( $my_img, 0, 0, 0 );
imagestring( $my_img, 80, 20, 12, $_SESSION["captcha"], $text_colour );
imagesetthickness ( $my_img, 5 );
// imageline( $my_img, 10, 45, 150, 45, $line_colour );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
imagecolordeallocate( $background );
imagedestroy( $my_img );
?>
