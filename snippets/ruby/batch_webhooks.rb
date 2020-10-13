require "MailchimpMarketing"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})

url = "https://example.com/your-webhook-url"

response = mailchimp.batchWebhooks.create url
puts response