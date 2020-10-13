require 'MailchimpTransactional'
require 'sinatra'


TARGET_LINK_URL = "https://www.eiffelflowers.biz/news/ultraviolet-sale"

configure do
  set :port, 3000
end

def generate_message(email)
  {
    html:
"<p>We noticed you were interested in violets! How about we offer you a great deal on a dozen if you buy in the next 72 hours?</p>",
    text:
     "We noticed you were interested in violets! How about we offer  
you a great deal on a dozen if you buy in the next 72 hours?",
    subject: "Roses Are Red, Violets Are On Sale",
    from_email: "hello@eiffelflowers.biz",
    from_name: "Daisy @ Eiffel Flowers",
    to: [
	{
	  email: email,
 	  type: "to"
	}
    ]
  }
end

head '/' do
  200
end

post '/' do
  events = JSON.parse(CGI.unescape(params['mandrill_events']))
  events.each do |event|
    msg = event['msg']
    click = msg['clicks'][0]
    email = msg['email']

    if click && click['url'] == TARGET_LINK_URL
      # send follow-up message here using the Mailchimp Transactional API
      # for more details, see https://mailchimp.com/developer/guides/send-your-first-transactional-email

      puts """
Send follow up email with this payload:  #{generate_message(email)}
	 """
    else
      puts 'webhook handled successfully!'
    end
  end
  'Done!'
end