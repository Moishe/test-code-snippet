require "MailchimpMarketing"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config ENV["API_KEY"], ENV["API_SERVER"]
list_id = ENV["LIST_ID"]

tag = {
  name: "MegaInfluencer",
  static_segment: ["dolly.parton@example.com", "rihanna@example.com"]
}

response = mailchimp.lists.create_segment list_id, tag

puts "Tag successfully created! Your tag id is #{response["id"]}"