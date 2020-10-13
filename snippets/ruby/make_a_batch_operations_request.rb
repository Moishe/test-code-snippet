require "MailchimpMarketing"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})
list_id = ENV["LIST_ID"]

mock_users = [
  {
    id: 1,
    email: "user1@example.com"
  },
  {
    id: 2,
    email: "user2@example.com"
  }
]

operations = mock_users.map do |user|
  {
    method: "POST",
    path: "/lists/#{list_id}/members",
    operation_id: user[:id],
    body: {
      email_address: user[:email],
      status: "subscribed"
    }
  }
end

response = mailchimp.batches.start operations
puts response