import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

mailchimp = MailchimpMarketing.Client()
mailchimp.set_config({
  "api_key": "YOUR_API_KEY",
  "server": "YOUR_SERVER_PREFIX"
})

list_id = "YOUR_LIST_ID"

member_info = {
    "email_address": "prudence.mcvankab@example.com",
    "status": "subscribed",
    "merge_fields": {
      "FNAME": "Prudence",
      "LNAME": "McVankab"
    }
  }

try:
  response = mailchimp.lists.add_list_member(list_id, member_info)
  print("response: {}".format(response))
except ApiClientError as error:
  print("An exception occurred: {}".format(error.text))