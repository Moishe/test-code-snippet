referral_code = "THE_REFERRAL_CODE"
list_id = "YOUR_LIST_ID"
user = fakeDB.get_user_by_referral_code(referral_code)
subscriber_hash = Digest::MD5.hexdigest(user.email.downcase)

response = mailchimp.lists.get_list_member_events(
  list_id,
  subscriber_hash
)

puts "We have created #{response["total_items"]} events for this user."