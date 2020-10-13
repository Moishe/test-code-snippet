function handleInboundEmailWebhook($req)
{
    // Get the webhook events from the request body. We know
    // every event will be an inbound event, because we're
    // only using this endpoint for inbound email.
    $mandrill_events = $req->body;
    $inboundEvents = $mandrill_events->inboundEvents;

    foreach ($inboundEvents as $inboundEvent) {
        $msg = $inboundEvent->msg;
        $form_email = $msg->from_email;
        $subject = $msg->subject;
        $text = $msg->text;

        $user = $fakeDb->getUserByEmail($form_email);

        $fakeDb->createTodo(
            [
                "user" => $user,
                "text" => $subject,
                "description" => $text
            ]
        );
    }
}