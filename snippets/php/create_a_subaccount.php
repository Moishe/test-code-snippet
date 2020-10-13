require_once('/path/to/mailchimp-transactional-php/vendor/autoload.php');

function run($newAccount)
{
    try {
        $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey("YOUR_API_KEY");
        $response = $mailchimp->subaccounts->add($newAccount);
        if(isset($response->status)){
            echo "Successfully created subaccount. This account's status is " . $response->status;
        }else{
            echo "Could not create subaccount: <br>";
            print_r($response);
        }
    } catch (Error $e) {
        echo 'Error: ', $e->getMessage(), "\n";
    }
}

$newAccount = [
    "id" => "UNIQUE_ACCOUNT_ID_PHP4",
    "name" => "Acme Widgets", // Optional
    "notes" => "Free tier", // Optional
    "custom_quota" => 10, // Optional
];
run($newAccount);