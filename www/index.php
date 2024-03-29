<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 24/05/2018
 * Time: 13:48
 */

// load composer packages
require 'vendor/autoload.php';

// new Plates instance
$templates = new League\Plates\Engine('views/'); // views as base folder

// get URI and break it up to separate querystring if applicable
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// routing
switch ($request_uri[0]) {
	// home
	case '/':
		// no break -> same as '/home'
	case '/home':
		echo $templates->render('home');
		break;
	case '/verhuur/huur':
		echo $templates->render('verhuur/huur');
		break;
	case '/verhuur/kampverhuur':
		echo $templates->render('verhuur/kampverhuur');
		break;
	case '/covid':
		echo $templates->render('covid');
		break;
	case '/leiding':
		echo $templates->render('leiding');
		break;
	case '/contact':
		echo $templates->render('contact');
		break;
	case '/contacttracing':
		echo $templates->render('contacttracing');
		break;
	case '/bier':
		echo $templates->render('bier');
		break;
	case '/kamp':
		echo $templates->render('kamp');
		break;
	// ACTS
	case '/-9':
		echo $templates->render('acts/acts_template', ['id' => '-9', 'groep' => '-9', 'normalday' => 0, 'normalhour' => 14]);
		break;
	case '/-12':
		echo $templates->render('acts/acts_template', ['id' => '-12', 'groep' => '-12', 'normalday' => 0, 'normalhour' => 14]);
		break;
	case '/-14':
		echo $templates->render('acts/acts_template', ['id' => '-14', 'groep' => '-14', 'normalday' => 0, 'normalhour' => 14]);
		break;
	case '/+14':
		echo $templates->render('acts/acts_template', ['id' => '+14', 'groep' => '+14', 'normalday' => 0, 'normalhour' => 14]);
		break;
	case '/+16':
		echo $templates->render('acts/acts_template', ['id' => '+16', 'groep' => '+16', 'normalday' => 5, 'normalhour' => 20]);
		break;
	case '/+20':
		echo $templates->render('acts/acts_template', ['id' => '+20', 'groep' => '+20', 'normalday' => 6, 'normalhour' => 20]);
		break;
	// INFO
	case '/info/wiezijnwij':
		echo $templates->render('info/wiezijnwij');
		break;
	case '/info/werking':
		echo $templates->render('info/werking');
		break;
	case '/info/geschiedenis':
		echo $templates->render('info/geschiedenis');
		break;
	case '/info/uniform':
		echo $templates->render('info/uniform');
		break;
	case '/info/kljinklj':
		echo $templates->render('info/kljinklj');
		break;
	case '/info/reglement':
		echo $templates->render('info/reglement');
		break;
	case '/info/kamp':
		echo $templates->render('info/kamp');
		break;
	case '/info/sportfeesten':
		echo $templates->render('info/sportfeesten');
		break;
	case '/info/privacy':
		echo $templates->render('info/privacy');
		break;
	// LEIDING
	case '/leiding/acts':
		echo $templates->render('leiding/acts');
		break;
	case '/leiding/bouw':
		echo $templates->render('leiding/bouw');
		break;
	case '/leiding/inschrijven':
		echo $templates->render('leiding/inschrijven');
		break;
	case '/leiding/kledij':
		echo $templates->render('leiding/kledij');
		break;
	case '/leiding/kledij.php':
		echo $templates->render('leiding/kledij');
		break;
	default:
		header('HTTP/1.0 404 Not Found');
		echo $templates->render('404');
		break;
}

?>
