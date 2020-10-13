function handleInboundEmailWebhook(req) {
  // Get the webhook events from the request body. We know
  // every event will be an inbound event, because we’re
  // only using this endpoint for inbound email.
  const { mandrill_events: inboundEvents } = req.body;

  inboundEvents.forEach(inboundEvent => {
    const {
      msg: { from_email, subject, text }
    } = inboundEvent;

    const user = fakeDb.getUserByEmail(from_email);
    fakeDb.createTodo({
      user,
      text: subject,
      description: text
    });
  });
}