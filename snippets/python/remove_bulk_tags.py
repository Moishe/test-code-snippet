import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

API_KEY = "YOUR_API_KEY"
SERVER_PREFIX = "YOUR_SERVER_PREFIX"

LIST_ID = "YOUR_LIST_ID"
TAG_ID = "YOUR_TAG_ID"

client = MailchimpMarketing.Client()
client.setConfig(API_KEY, SERVER_PREFIX)
try:
    response = client.lists.batch_segment_members({
        "members_to_remove": [
            "john.smith@example.com",
            "brad.hudson@example.com",
        ]
    }, LIST_ID, TAG_ID)
    print("client.ping.get() response: {}".format(response))
except ApiClientError as error:
    print("An exception occurred: {}".format(error.text))