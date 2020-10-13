require 'MailchimpTransactional'

client = MailchimpTransactional::Client.new(ENV['YOUR_API_KEY'])
account_id = "UNIQUE_ACCOUNT_ID"

begin
  account = client.subaccounts.pause(id: account_id)
  puts account["status"] # => “paused”
rescue MailchimpTransactional::ApiError => e
  puts "Error: #{e}"
end