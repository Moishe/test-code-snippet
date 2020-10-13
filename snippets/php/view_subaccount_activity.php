require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');
function run($subAccount)
{
    try {
        $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey("YOUR_API_KEY");
        $response = $mailchimp->subaccounts->info($subAccount);
        if(isset($response->sent_total) && isset($response->status)){
            echo "This subaccount has sent " . $response->sent_total . " emails. Its status is " . $response->status;
        }else{
            echo "Could not get subaccount info: <br>";
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