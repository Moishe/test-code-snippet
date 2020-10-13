require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');
function run($subAccount)
{
    try {
        $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey("YOUR_API_KEY");
        $response = $mailchimp->subaccounts->delete($subAccount);
        print_r($response);
    } catch (Error $e) {
        echo 'Error: ', $e->getMessage(), "\n";
    }
}

$subAccount = [
    "id" => "UNIQUE_ACCOUNT_ID_PHP",
];
run($subAccount);