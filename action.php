<?php
	
	// FOR POST REQUESTS

	// RELEASE THE KRAKEN
	require('classes/core.php'); // releasing the kraken

	$core = new Core();

	if (empty($_GET['id'])) { die('System Error. Employee ID not specified.'); }

	switch($_GET['s']) { // subpage
		case 'emp':
			$res = $core->employees($_GET['p'], (isset($_GET['id'])?$_GET['id']:NULL) ); // get by action (p)
			if ($res) {header('Location: index.php');} else {
				die("Input Error. Something's wrong with your form. Please go back and try again.");
			}
			break;
		break;
		default:
			header('Location: index.php');
		break;
	}
    
?>