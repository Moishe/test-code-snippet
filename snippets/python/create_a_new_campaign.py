import os
import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

try:
  client = MailchimpMarketing.Client()
  client.setConfig(os.getenv("API_KEY"), os.getenv("API_SERVER"))
  response = client.campaigns.create({"type": "plaintext"})
  print("client.ping.get() response: {}".format(response))
except ApiClientError as error:
  print("An exception occurred: {}".format(error.text))