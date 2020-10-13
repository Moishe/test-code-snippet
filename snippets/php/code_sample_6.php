require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$listId = "YOUR_LIST_ID";

$tag = new MailchimpMarketing\Model\List7();
$tag->setName("MegaInfluencer");
$tag->setStaticSegment(["dolly.parton@example.com", "rihanna@example.com"]);

try {
    $response = $mailchimp->lists->createSegment($listId, $tag);
    echo "Tag successfully created! Your tag id is " . $response->getId();
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}