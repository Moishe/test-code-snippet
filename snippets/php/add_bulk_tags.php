require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$list_id = "YOUR_LIST_ID";
$tag_id = "YOUR_TAG_ID";

try {
    $response = $mailchimp->lists->batchSegmentMembers(["body" => ["dolly.parton@example.com", "rihanna@example.com"]], $list_id, $tag_id);
    echo "Successfully tagged {$response["total_added"]} contacts";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}