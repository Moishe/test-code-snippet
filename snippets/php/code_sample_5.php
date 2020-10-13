require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$listId = "YOUR_LIST_ID";
$tagId = YOUR_TAG_ID;

$membersToRemove = new MailchimpMarketing\Model\MembersToAddremoveTofromAStaticSegment();
$membersToAdd->setMembersToRemove(["dolly.parton@example.com", "rihanna@example.com"]);

try {
    $response = $mailchimp->lists->batchSegmentMembers($membersToRemove, $listId, $tagId);
    echo "Successfully untagged {$response->getTotalRemoved()} contacts";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}