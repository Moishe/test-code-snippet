require 'MailchimpTransactional'

client = MailchimpTransactional::Client.new(ENV['YOUR_API_KEY'])
account_id = "UNIQUE_ACCOUNT_ID"

begin
  account = client.subaccounts.resume(id: account_id)
  puts account["status"] # => “active”
rescue MailchimpTransactional::ApiError => e
  puts "Error: #{e}"
end