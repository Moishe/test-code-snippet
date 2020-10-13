require "cgi"

def handle_webhook request
  params = CGI.parse request.body
  response_body_url = params["data[response_body_url]"]
  puts "You can fetch the gzipped response with #{response_body_url}"
end