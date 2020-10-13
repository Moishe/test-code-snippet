require 'MailchimpTransactional'

client = MailchimpTransactional::Client.new(ENV['YOUR_API_KEY'])

new_account = {
  id: "UNIQUE_ACCOUNT_ID",
  name: "Acme Widgets", # optional
  notes: "Free Tier", # optional
  custom_quota: 10 # optional
}

begin
  account = client.subaccounts.add(new_account)
  puts account
rescue MailchimpTransactional::ApiError => e
  puts "Error: #{e}"
end