require "MailchimpMarketing"
require "digest"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})
list_id = ENV["LIST_ID"]

email = "urist.mcvankab@example.com"
subscriber_hash = Digest::MD5.hexdigest email.downcase

response = mailchimp.lists.get_list_member_tags list_id, subscriber_hash

puts "Urist has been tagged #{response["total_items"]} times."