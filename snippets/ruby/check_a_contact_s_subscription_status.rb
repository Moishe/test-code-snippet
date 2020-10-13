require "MailchimpMarketing"
require "digest"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})
list_id = ENV["LIST_ID"]

email = "prudence.mcvankab@example.com"
subscriber_hash = Digest::MD5.hexdigest email.downcase

begin
  response = mailchimp.lists.get_list_member list_id, subscriber_hash
  puts "This user's subscription status is #{response.status}."
rescue MailchimpMarketing::ApiError => e
  if e.status === 404
    puts "This email is not subscribed to this list: #{e.message}"
  end
end