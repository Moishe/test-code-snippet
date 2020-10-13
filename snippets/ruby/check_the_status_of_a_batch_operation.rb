require "MailchimpMarketing"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})
batch_id = ENV["BATCH_OPERATION_ID"]

response = mailchimp.batches.status batch_id
puts response.status