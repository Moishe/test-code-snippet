require "MailchimpMarketing"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})
list_id = ENV["LIST_ID"]

subscribing_user = {
  first_name: "Prudence",
  last_name: "McVankab",
  email_address: "prudence.mcvankab@example.com"
}

response = mailchimp.lists.add_list_member list_id, {
  email_address: subscribing_user[:email_address],
  status: "subscribed",
  merge_fields: {
    FNAME: subscribing_user[:first_name],
    LNAME: subscribing_user[:last_name]
  },
}

puts "Successfully added contact as an audience member. The contact's id is #{response.id}."