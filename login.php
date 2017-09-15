<?php
require_once __DIR__ . '/vendor/autoload.php';
if(!session_id()) {
    session_start();
}
$fb = new Facebook\Facebook([
	'app_id' => getenv("FB_APP_ID"),
	'app_secret' => getenv("FB_APP_SECRET"),
	'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'user_location']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://login.172.16.1.253.nip.io/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
