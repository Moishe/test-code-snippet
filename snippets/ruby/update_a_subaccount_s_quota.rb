require 'MailchimpTransactional'

client = MailchimpTransactional::Client.new(ENV['YOUR_API_KEY'])
account_id = "UNIQUE_ACCOUNT_ID"

fields = {
  # account id that you want updated
  id: account_id,
  # fields you want updated
  custom_quota: 100
}

begin
  account = client.subaccounts.update(fields)
  puts account
rescue MailchimpTransactional::ApiError => e
  puts "Error: #{e}"
end