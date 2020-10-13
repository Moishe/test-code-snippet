require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

$mailchimp = new MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' => 'YOUR_API_KEY',
    'server' => 'YOUR_SERVER_PREFIX'
]);

$list_id = "YOUR_LIST_ID";

$users = [
    [
        'id' => '1',
        'email' => 'user1@example.com'
    ],
    [
        'id' => '2',
        'email' => 'user2@example.com'
    ],
];

$operations = [];
foreach ($users as $user) {
    $operation = [
        'method' => 'POST',
        'path' => "/lists/$list_id/members",
        'operation_id' => $user['id'],
        'body' => json_encode([
            'email_address' => $user['email'],
            'status' => 'subscribed'
        ])
    ];
    array_push($operations, $operation);
}

try {
    $response = $mailchimp->batches->start($operations);
    echo $response;
} catch (\MailchimpMarketing\ApiException $e) {
    echo $e->getMessage();
}