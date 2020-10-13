require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new \MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$list_id = "YOUR_LIST_ID";

try {
    $response = $client->lists->addListMember($list_id, [
        "email_address" => "prudence.mcvankab@example.com",
        "status" => "subscribed",
        "merge_fields" => [
          "FNAME" => "Prudence",
          "LNAME" => "McVankab"
        ]
    ]);
    print_r($response);
} catch (MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}