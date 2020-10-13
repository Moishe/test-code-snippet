require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$batch_id = 'YOUR_BATCH_ID';

try {
    $response = $mailchimp->batches->status($batch_id);
    echo $response["status"];
} catch (\MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}