require 'MailchimpMarketing'

begin
  client = MailchimpMarketing::Client.new
  client.set_config(ENV['API_KEY'], ENV['API_SERVER'])
  result = client.campaigns.create({ 'type' => 'variate' })
  p result
rescue MailchimpMarketing::ApiError => e
  puts "Error: #{e}"
end
