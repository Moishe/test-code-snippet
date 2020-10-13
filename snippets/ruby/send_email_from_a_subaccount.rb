require 'MailchimpTransactional'

client = MailchimpTransactional::Client.new(ENV['YOUR_API_KEY'])

message = {
  from_email: "hello@example.com",
  subject: "Subaccount test",
  text: "This email was sent from a subaccount!",
  to: [
    {
      email: "freddie@example.com",
      type: "to"
    }
  ],
  subaccount: "UNIQUE_ACCOUNT_ID"
}

begin
  msg_response = client.messages.send(message: message)
  puts msg_response
rescue MailchimpTransactional::ApiError => e
  puts "Error: #{e}"
end