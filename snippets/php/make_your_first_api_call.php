<?php
require_once('/path/to/MailchimpTransactional/vendor/autoload.php');

function run(){
 try {
    $mailchimp = new MailchimpTransactional\ApiClient();
    $mailchimp->setApiKey('YOUR_API_KEY');
    $response = $mailchimp->users->ping();
    print_r($response);
  } catch (Error $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
  }
}
run();