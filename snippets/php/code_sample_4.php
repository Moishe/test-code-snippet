require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$listId = "YOUR_LIST_ID";
$tagId = YOUR_TAG_ID;

$membersToAdd = new \MailchimpMarketing\Model\MembersToAddremoveTofromAStaticSegment();
$membersToAdd->setMembersToAdd(["dolly.parton@example.com", "rihanna@example.com"]);

try {
    $response = $mailchimp->lists->batchSegmentMembers($membersToAdd, $listId, $tagId);
    echo "Successfully tagged {$response->getTotalAdded()} contacts";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}