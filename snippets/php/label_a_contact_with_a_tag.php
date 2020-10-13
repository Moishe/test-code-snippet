require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$email = "urist.mcvankab@example.com";
$list_id = "YOUR_LIST_ID";
$subscriber_hash = md5(strtolower($email));

try {
  $mailchimp->lists->updateListMemberTags($list_id, $subscriber_hash, [
    "tags" => [
      "name" => "Influencer",
      "status" => "active"
    ]
  ]);

    echo "The return type for this endpoint is null";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}erTags);
    echo "The return type for this endpoint is null";
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}