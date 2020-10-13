from operator import itemgetter

def handleInboundEmailWebhook(request):
  try:
    mandrill_events = itemgetter('mandrill_events')(request)
    for inboundEvent in mandrill_events['inboundEvents']:
      from_email = inboundEvent['from_email']
      subject = inboundEvent['subject']
      text = inboundEvent['text']
      msg = inboundEvent['msg']
      user = fakeDb.getUserByEmail(from_email)
      fakeDb.createTodo({
      'user' : user,
      'text' : subject,
      'description' : text
    })
  except: 
    print('Empty request passed')

handleInboundEmailWebhook()