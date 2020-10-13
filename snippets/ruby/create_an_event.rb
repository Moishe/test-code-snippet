require "MailchimpMarketing"
require "digest/md5"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})

referral_code = "THE_REFERRAL_CODE"
list_id = "YOUR_LIST_ID"
user = fakeDB.get_user_by_referral_code(referral_code)
subscriber_hash = Digest::MD5.hexdigest(user.email.downcase)

options = {
  name: "registered_referral",
  properties: {
    referral_code: referral_code
  }
}

response = mailchimp.lists.create_list_member_event(
  list_id,
  subscriber_hash,
  options
)

puts "Event successfully created!"