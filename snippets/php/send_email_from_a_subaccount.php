require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');
function run($message)
{
    try {
        $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey("YOUR_API_KEY");
        $response = $mailchimp->messages->send(["message" => $message]);
        print_r($response);
    } catch (Error $e) {
        echo 'Error: ', $e->getMessage(), "\n";
    }
}

$message = [
    "from_email" => "hello@example.com",
    "subject" => "Subaccount test",
    "text" => "This email was sent from a subaccount!",
    "to" => [
        [
            "email"=>"freddie@example.com",
            "type"=>"to"
        ]
    ],
    "subaccount"=>"UNIQUE_ACCOUNT_ID_PHP"
];
run($message);