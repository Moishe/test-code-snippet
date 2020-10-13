<?php
require_once '/path/to/MailchimpMarketing/vendor/autoload.php';

$mailchimp = new MailchimpMarketing\ApiClient();
$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX',
]);

$response = $mailchimp->campaigns->create(["type" => "plaintext"]);
print_r($response);
