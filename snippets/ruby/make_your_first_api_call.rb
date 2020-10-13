require 'MailchimpTransactional'

begin
  client = MailchimpTransactional::Client.new(ENV[‘YOUR_API_KEY’])
  result = client.users.ping() # => 'PONG!'
  p result
rescue MailchimpTransactional::ApiError => e
  puts "Error: #{e}"
end