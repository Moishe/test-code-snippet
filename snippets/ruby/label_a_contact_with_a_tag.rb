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

response = mailchimp.lists.update_list_member_tags list_id, subscriber_hash, {
  body: {
    tags: [
      {
        name: "Influencer",
        status: "active"
      }
    ]
  }
}

puts "The return type for this endpoint is nil, so this should be true: #{response.nil?}" 