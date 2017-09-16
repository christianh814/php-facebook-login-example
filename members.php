<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
$fb = new Facebook\Facebook([
	'app_id' => getenv("FB_APP_ID"),
	'app_secret' => getenv("FB_APP_SECRET"),
	'default_graph_version' => 'v2.2',
]); 
$fb_token = $_SESSION['fb_access_token'];
$res = $fb->get( '/me?fields=id,first_name,last_name,email,gender,locale,location', $fb_token);

$user = $res->getGraphObject()->asArray();
//var_dump($user);
?>
<h1>Facebook Info</h1>
<div>
	 <table style="width:50%">
	  <tr>
	    <th>Id</th>
	    <th>Picture</th>
	    <th>Firstname</th>
	    <th>Lastname</th>
	    <th>Email</th>
	    <th>Gender</th>
	    <th>Locale</th>
	    <th>city</th>
	  </tr>
	  <tr>
	    <td><?php echo $user['id'] ?></td>
	    <td><img src="<?php echo 'http://graph.facebook.com/' . $user['id'] . '/picture?type=large' ?>"></img></td>
	    <td><?php echo $user['first_name'] ?></td>
	    <td><?php echo $user['last_name'] ?></td>
	    <td><?php echo $user['email'] ?></td>
	    <td><?php echo $user['gender'] ?></td>
	    <td><?php echo $user['locale'] ?></td>
	    <td><?php echo $user['location']['name'] ?></td>
	  </tr>
	 </table>
</div>
