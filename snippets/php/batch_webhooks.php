require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

try {
    $response = $mailchimp->batchWebhooks->create([
        "url" => "https://example.com/your-webhook-url",
    ]);

    echo $response;
} catch (\MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}