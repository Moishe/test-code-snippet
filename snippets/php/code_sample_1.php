require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$email = "urist.mcvankab@example.com";
$listId = "YOUR_LIST_ID";
$subscriberHash = md5(strtolower($email));

$influencerTag = new MailchimpMarketing\Model\MemberTag([
    "name" => "Influencer",
    "status" => "active"
]);

$memberTags = new MailchimpMarketing\Model\MemberTags();
$memberTags->setTags([$influencerTag]);

try {
    $mailchimp->lists->updateListMemberTags($listId, $subscriberHash, $memberTags);
    echo "The return type for this endpoint is null";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}