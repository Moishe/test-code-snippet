<?php
require_once('/path/to/MailchimpMarketing/vendor/autoload.php');
// You should always store your client id and secret in environment variables for security.
$mailchimp_client_id = getenv('MAILCHIMP_CLIENT_ID');
$mailchimp_client_secret = getenv('MAILCHIMP_CLIENT_SECRET');
$base_url = getenv('BASE_URL');
$oauth_callback = "$base_url/oauth/mailchimp/callback";
// 1. Navigate to http://127.0.0.1:3000 and click Login
if (empty($_GET)) {
  echo '<p>Welcome to the sample Mailchimp OAuth app! Click <a href="?login">here</a> to log in</p>';
}
// 2. The login link above will direct the user here, which will redirect
// to Mailchimp's OAuth login page.
if (isset($_GET['login'])) {
  header('Location: https://login.mailchimp.com/oauth2/authorize?'.http_build_query([
    'response_type' => 'code',
    'client_id' => $mailchimp_client_id,
    'redirect_uri' => $oauth_callback,
  ]));
  exit();
}
// 3. Once the user authorizes your app, Mailchimp will redirect the user to
// this endpoint, along with a code you can use to exchange for the user's
// access token.
if (isset($_GET['code'])) {
  $url = 'https://login.mailchimp.com/oauth2/token';
  $context = stream_context_create([
    'http' => [
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query([
        'grant_type' => "authorization_code",
        'client_id' => $mailchimp_client_id,
        'client_secret' => $mailchimp_client_secret,
        'redirect_uri' => $oauth_callback,
        'code' => $_GET['code'],
      ]),
    ],
  ]);
  $result = file_get_contents($url, false, $context);
  $decoded = json_decode($result);
  $access_token = $decoded->access_token;
  // Now we're using the access token to get information about the user.
  // Specifically, we want to get the user's server prefix, which we'll use to
  // make calls to the API on their behalf.  This prefix will change from user
  // to user.
  $url = 'https://login.mailchimp.com/oauth2/metadata';
  $context = stream_context_create([
    'http' => [
      'header' => "Authorization: OAuth $access_token",
    ],
  ]);
  $result = file_get_contents($url, false, $context);
  $decoded = json_decode($result);
  $dc = $decoded->dc;
  // Below, we're using the access token and server prefix to make an
  // authenticated request on behalf of the user who just granted OAuth access.
  // You wouldn't keep this in your production code, but it's here to
  // demonstrate how the call is made.
  $mailchimp = new MailchimpMarketing\ApiClient();
  $mailchimp->setConfig([
    'accessToken' => $access_token,
    'server' => $dc,
  ]);
  try {
    $response = $mailchimp->ping->get();
    echo "<p>This user\'s access token is $access_token and their server prefix is $dc.</p>";
    echo "<p>When pinging the Mailchimp Marketing API\'s ping endpoint, the server responded:<p>";
    echo "<code>" . json_encode($response) . "</code>";
  } catch (exception $e) {
    var_dump($e);
  }
  // In reality, you'd want to store the access token and server prefix
  // somewhere in your application.
  // fakeDB.getCurrentUser();
  // fakeDB.storeMailchimpCredsForUser(user, {
  //   dc,
  //   access_token
  // });
}