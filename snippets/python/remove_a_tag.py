import hashlib
import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

EMAIL = "urist.mcvankab@example.com"
LIST_ID = "YOUR_LIST_ID"
SUBSCRIBER_HASH = hashlib.md5(EMAIL.encode('utf-8')).hexdigest()

client = MailchimpMarketing.Client()
mailchimp.set_config({
  "api_key": "YOUR_API_KEY",
  "server": "YOUR_SERVER_PREFIX"
})
try:
    response = client.lists.update_list_member_tags(LIST_ID, SUBSCRIBER_HASH, body={
        "tags": [{
            "name": "Influencer",
            "status": "inactive"
        }]
    })
    print("client.ping.get() response: {}".format(response))
except ApiClientError as error:
    print("An exception occurred: {}".format(error.text))