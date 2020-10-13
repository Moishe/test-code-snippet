require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$email = "prudence.mcvankab@example.com";
$list_id = "YOUR_LIST_ID";
$subscriber_hash = md5(strtolower($email));

try {
    $response = $mailchimp->lists->getListMember($list_id, $subscriber_hash);
    print_r($response);
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}