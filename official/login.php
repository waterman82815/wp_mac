<?php

echo "Facebook Login Test";

define('FACEBOOK_SDK_V4_SRC_DIR', '/facebook-php-sdk-v4-4.0-dev/src/Facebook/');
  require __DIR__ . '/facebook-php-sdk-v4-4.0-dev/autoload.php';

echo "1";

//   use Facebook\FacebookSession;
// // add other classes you plan to use, e.g.:
// // use Facebook\FacebookRequest;
// // use Facebook\GraphUser;
// // use Facebook\FacebookRequestException;

// FacebookSession::setDefaultApplication('902808659762591', '2c41660b5c84674c9ce10517ba68fa87');


// $helper = new FacebookRedirectLoginHelper('http://192.168.1.13/~waterman/official/login.php');
// //$loginUrl = $helper->getLoginUrl();
// // Use the login url on a link or button to 
// // redirect to Facebook for authentication


session_start();

echo "2";

// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

echo "3";

// init app with app id and secret
FacebookSession::setDefaultApplication( '902808659762591','2c41660b5c84674c9ce10517ba68fa87' );


// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://192.168.1.13/~waterman/official/login.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {


//   // When validation fails or other local issues
// }

echo "4";

// see if we have a session
if ( isset( $session ) ) {

	echo "login";
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
  header("Location: index.php");
} else {

	 echo "not login";
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>

?>  