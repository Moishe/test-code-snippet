require "MailchimpMarketing"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config({
  :api_key => ENV["API_KEY"],
  :server => ENV["API_SERVER"]
})

event = {
  name: "Ruby Developers Meetup"
}

footer_contact_info = {
  company: "Mailchimp",
  address1: "675 Ponce de Leon Ave NE",
  address2: "Suite 5000",
  city: "Atlanta",
  state: "GA",
  zip: "30308",
  country: "US"
}

campaign_defaults = {
  from_name: "Gettin' Together",
  from_email: "gettintogether@example.com",
  subject: "Ruby Developers Meetup",
  language: "EN_US"
}

response = mailchimp.lists.create_list(
  name: event[:name],
  contact: footer_contact_info,
  permission_reminder: 'test',
  email_type_option: true,
  campaign_defaults: campaign_defaults
)

puts response

puts "Successfully created an audience. The audience id is #{response["id"]}."