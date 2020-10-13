require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new \MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$email = "prudence.mcvankab@example.com";
$listId = "YOUR_LIST_ID";
$subscriberHash = md5(strtolower($email));

try {
    $response = $mailchimp->lists->updateListMember($listId, $subscriberHash, ["status" => "unsubscribed"]);
    print_r($response);
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}