require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');
function run($subAccount)
{
    try {
        $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey("YOUR_API_KEY");
        $response = $mailchimp->subaccounts->pause($subAccount);
        if(isset($response->status)){
            echo "This subaccount is now " . $response->status;
        }else{
            echo "Could not change subaccount status: <br>";
            print_r($response);
        }
    } catch (Error $e) {
        echo 'Error: ', $e->getMessage(), "\n";
    }
}

$subAccount = [
    "id" => "UNIQUE_ACCOUNT_ID",
];
run($subAccount);