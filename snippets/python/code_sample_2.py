import hashlib
import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

API_KEY = "YOUR_API_KEY"
SERVER_PREFIX = "YOUR_SERVER_PREFIX"

EMAIL = "urist.mcvankab@example.com"
LIST_ID = "YOUR_LIST_ID"
SUBSCRIBER_HASH = hashlib.md5(EMAIL.encode('utf-8')).hexdigest()

client = MailchimpMarketing.Client()
client.setConfig(API_KEY, SERVER_PREFIX)
try:
    response = client.lists.get_list_member_tags(LIST_ID, SUBSCRIBER_HASH)
    print("client.ping.get() response: {}".format(response))
except ApiClientError as error:
    print("An exception occurred: {}".format(error.text))