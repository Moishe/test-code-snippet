require "MailchimpMarketing"

mailchimp = MailchimpMarketing::Client.new
mailchimp.set_config ENV["API_KEY"], ENV["API_SERVER"]
list_id = ENV["LIST_ID"]
tag_id = ENV["TAG_ID"]

body = {
  members_to_remove: ["john.smith@example.com", "brad.hudson@example.com"]
}

response = mailchimp.lists.batch_segment_members body, list_id, tag_id

puts "Successfully untagged #{response["total_removed"]} contacts"