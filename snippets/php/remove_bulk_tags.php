require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$list_id = "YOUR_LIST_ID";
$tag_id = YOUR_TAG_ID;

$members_to_remove = new MailchimpMarketing\Model\MembersToAddremoveTofromAStaticSegment();
$membersToAdd->setMembersToRemove(["dolly.parton@example.com", "rihanna@example.com"]);

try {
    $response = $mailchimp->lists->batchSegmentMembers($members_to_remove, $list_id, $tag_id);
    echo "Successfully untagged {$response->getTotalRemoved()} contacts";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}