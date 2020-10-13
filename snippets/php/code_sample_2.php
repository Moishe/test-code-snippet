require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$email = "urist.mcvankab@example.com";
$listId = "YOUR_LIST_ID";
$subscriberHash = md5(strtolower($email));

try {
    $response = $mailchimp->lists->getListMemberTags($listId, $subscriberHash);
    echo "Urist has been tagged {$response->getTotalItems()} times.";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}