import hashlib
import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

mailchimp = MailchimpMarketing.Client()
mailchimp.set_config({
  "api_key": "YOUR_API_KEY",
  "server": "YOUR_SERVER_PREFIX"
})

list_id = "YOUR_LIST_ID"
member_email = "MEMBER_EMAIL_ADDRESS"
member_email_hash = hashlib.md5(email.encode('utf-8')).hexdigest()
member_update = {"status": "unsubscribed"}

try:
  response = mailchimp.lists.update_list_member(list_id, member_email_hash, member_update)
  print("Response: {}".format(response))
except ApiClientError as error:
  print("An exception occurred: {}".format(error.text))