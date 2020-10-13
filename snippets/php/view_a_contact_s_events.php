require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new \MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$list_id = "YOUR_LIST_ID";
$email = "urist.mcvankab@example.com";
$subscriber_hash = md5(strtolower($email));

try {
    $response = $mailchimp->lists->getListMemberEvents($list_id, $subscriber_hash);
    echo "We have created {$response->getTotalItems()} events for this user.";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}