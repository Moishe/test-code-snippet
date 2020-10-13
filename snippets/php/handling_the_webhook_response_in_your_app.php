<?php
const TARGET_LINK_URL = "https://www.eiffelflowers.biz/news/ultraviolet-sale";
function generateEmail($email) {
  $message = new stdClass();
  $to = new stdClass();
  $to->email = $email;
  $to->type = 'to';
  $message->html = '<p>We noticed you were interested in violets! How about we offer you a great deal on a dozen if you buy in the next 72 hours?</p>';
  $message->text = 'We noticed you were interested in violets! How about we offer you a great deal on a dozen if you buy in the next 72 hours?';
  $message->subject = 'Roses Are Red, Violets Are On Sale';
  $message->from_email = 'hello@eiffelflowers.biz';
  $message->from_name = 'Daisy @ Eiffel Flowers';
  $message->to = [$to];
  return $message;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $mandrillEvents = json_decode($_POST['mandrill_events']);
  foreach ($mandrillEvents as $event) {
    $url = $event->msg->clicks[0];
    $email = $event->msg->email;
    echo "url: $url";
    if ($url === TARGET_LINK_URL) {
      // send follow-up message here using the Mailchimp Transactional API
      // for more details, see https://mailchimp.com/developer/guides/send-your-first-transactional-email
      echo 'Send follow up email with this payload:' . generateMessage($email);
    } else {
      // lets us test the webhook using the Mailchimp Transactional UI (see next section)
      echo 'webhook handled successfully!';
    }
  }
  echo 'Done';
}