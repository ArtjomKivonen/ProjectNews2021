<?php
session_start();
include_once 'inc/database.php';
//..........
include_once 'model/Model.php';
include_once 'model/ModelContact.php';
include_once 'model/modelUser.php';
//...................

include_once ("controller/Controller.php");
include_once 'controller/controllerUser.php';
//.......................
include_once 'route/routing.php';

echo $response;

?>