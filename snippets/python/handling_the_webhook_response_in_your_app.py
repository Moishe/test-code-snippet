from flask import Flask,request

app = Flask(__name__)

@app.route('/', methods=['POST'])
def index():
  TARGET_LINK_URL = "https://www.eiffelflowers.biz/news/ultraviolet-sale"
  mandrillEvents = request.form.to_dict(flat=False)['mandrill_events']
  for event in mandrillEvents:
    msg = event['msg']
    click = msg['clicks'][0]
    email = msg['email']
    if click == TARGET_LINK_URL :
      # send follow-up message here using the Mailchimp Transactional API
      # for more details, see https://mailchimp.com/developer/guides/send-your-first-transactional-email
      print("Send follow up email with this payload:")
      generateMessage(email)
    else :
      # lets us test the webhook using the Mailchimp Transactional UI (see next section)
      print("webhook handled successfully!")
  return 'Done'
  
def generateMessage(email):
  return {
    "html":"<p>We noticed you were interested in violets! How about we offer you a great deal on a dozen if you buy in the next 72 hours?</p>",
    "text":"We noticed you were interested in violets! How about we offer you a great deal on a dozen if you buy in the next 72 hours?",
    "subject": "Roses Are Red, Violets Are On Sale",
    "from_email": "hello@eiffelflowers.biz",
    "from_name": "Daisy @ Eiffel Flowers",
    "to": [
      {
        "email":email,
        "type": "to"
      }
    ]
  }
  

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')