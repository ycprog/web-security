<?php

/*
*
*
*/

require_once("common.php");

session_start();

define( 'GET_PERSON_DATA', 1 );
define( 'WITHDRAW_MONEY', 2 );
define( 'LOGIN', 3 );

$dataArray = 
array( 
	array( 'name' => 'Eric Lan',
		   'phone' => '12345678' ),
	array( 'name' => 'Leon Ho',
		   'phone' => '87654321' ),
    array( 'name' => 'Kenn Chee',
    	   'phone' => '56781234' )
    );

// Parse input
$nRequestType = GET('type');

$szRes = array();


switch( $nRequestType ) {
	case GET_PERSON_DATA:
		$nPersonID = intval(GET('id'));
		$szRes['person'] = $dataArray[$nPersonID];
		break;
	case WITHDRAW_MONEY:
		// CSRF Protection check
		/*if ( md5( session_id() ) != GET('key') ) {
			$szRes['result'] = false;
			break;
		}*/

		if ( isset($_SESSION['login']) && $_SESSION['login'] === true ) {
			$nWithAmount = intval(GET('withdraw'));
			$_SESSION['money'] -= $nWithAmount;
			$szRes['result'] = true;
		} else {
			$szRes['result'] = false;
		}
		break;
	case LOGIN:
		$_SESSION['login'] = true;
		$szRes['result'] = true;
	default:
		break;
}

header('Content-Type: application/json');

/**************/
/* Allow CORS */
//header('Access-Control-Allow-Origin: http://sig.yclim.com');
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Origin: http://google.com');


echo json_encode($szRes);
