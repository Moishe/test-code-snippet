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

response = mailchimp.lists.update_list_member list_id, subscriber_hash, {
  status: "unsubscribed"
}

puts "This user is now #{response.status}."