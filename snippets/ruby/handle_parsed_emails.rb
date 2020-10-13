def handle_inbound_email_webhook(request)
  mandrill_events = request.body[:mandrill_events]
  mandrill_events.each do |event|
    msg = event[:msg]
    from_email = msg[:from_email]
    subject = msg[:subject]
    text = msg[:text]
    
    user = fake_db.get_user_by_email(from_email)
    fake_db.create_to_do({
user: user,
text: subject,
description: text
    })
  end
end