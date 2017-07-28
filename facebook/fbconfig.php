<?php
session_start();

require_once 'autoload.php';
require_once '../dbconfig.php';
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
// insert app id and secret key
FacebookSession::setDefaultApplication('164160570797777', 'c029d49eddba506dedfc8a638009a34a');
// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper('http://localhost/Dropbox/sociallogin/facebook/fbconfig.php');
try {
    $session = $helper->getSessionFromRedirect();
}
catch (FacebookRequestException $ex) {
    // When Facebook returns an error
}
catch (Exception $ex) {
// When validation fails or other local issues
}
// see if we have a session
if (isset($session)) {
    // graph api request for user data
    $request          = new FacebookRequest($session, 'GET', '/me?fields=name');
    $response         = $request->execute();
    // GET RESPONSE
    $graphObject      = $response->getGraphObject();
    $fbid             = $graphObject->getProperty('id');
    $fbfullname       = $graphObject->getProperty('name');
    /* ---- INSERT OR UPDATE RECORDS -----*/
    $_SESSION['social_id'] = $fbid;
    $test = mysqli_query($connection, "SELECT * FROM facebook WHERE oauth_user_id = '$fbid'");
    if (mysqli_num_rows($test) < 1) {
        $query = "INSERT INTO facebook (oauth_provider,oauth_user_id,fullname,user_img) VALUES ('facebook','$fbid','$fbfullname','http://graph.facebook.com/$fbid/picture')";
        $done  = mysqli_query($connection, $query);
        var_dump($query);
    } else {
        $query = "UPDATE facebook SET oauth_provider = 'facebook' oauth_user_id = '$fbid',fullname = '$fbfullname',user_img = 'http://graph.facebook.com/$fbid/picture' WHERE oauth_user_id = '$fbid'";
        $done  = mysqli_query($connection, $query);
    }
    /* ---- header location after session ----*/
    header("Location: ../cabinet.php");
} else {
    $loginUrl = $helper->getLoginUrl();
    header("Location: " . $loginUrl);
}
?>