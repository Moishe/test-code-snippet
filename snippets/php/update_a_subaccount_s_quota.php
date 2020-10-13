require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');
function run($subAccount)
{
    try {
        $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey("YOUR_API_KEY");
        $response = $mailchimp->subaccounts->update($subAccount);
        if (isset($response->custom_quota)) {
            echo "Success! This account's new sending quota is " . $response->custom_quota;
        } else {
            echo "Could not update subaccount: <br>";
            print_r($response);
        }
    } catch (Error $e) {
        echo 'Error: ', $e->getMessage(), "\n";
    }
}

$subAccount = [
    "id" => "UNIQUE_ACCOUNT_ID",
    "custom_quota" => 100
];
run($subAccount);