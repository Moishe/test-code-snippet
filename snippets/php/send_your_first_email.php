require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');

function run($message)
{
    try {
        $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey('YOUR_API_KEY');

        $response = $mailchimp->messages->send(["message" => $message]);
        print_r($response);
    } catch (Error $e) {
        echo 'Error: ', $e->getMessage(), "\n";
    }
}

$message = [
    "from_email" => "hello@example.com",
    "subject" => "Hello world",
    "text" => "Welcome to Mailchimp Transactional!",
    "to" => [
        [
            "email" => "freddie@example.com",
            "type" => "to"
        ]
    ]
];
run($message);