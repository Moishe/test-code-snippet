require "net/http"

response_body_url = URI.parse("RESPONSE_BODY_URL_FROM_PREVIOUS_STEPS")
response = Net::HTTP.get(response_body_url)

# Example data extraction from gzipped archive, returns as array of hashes
results = processBatchArchive(response)
results.each do |result|
  user = User.find(result[:operation_id])
  user.update mailchimp_web_id: result[:response][:web_id]
end