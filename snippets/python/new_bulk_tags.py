import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

API_KEY = "YOUR_API_KEY"
SERVER_PREFIX = "YOUR_SERVER_PREFIX"

LIST_ID = "YOUR_LIST_ID"

client = MailchimpMarketing.Client()
client.setConfig(API_KEY, SERVER_PREFIX)
try:
    response = client.lists.create_segment(LIST_ID, {
        "name": "MegaInfluencer",
        "static_segment": [
            "dolly.parton@example.com",
            "rihanna@example.com",
        ]
    }, LIST_ID, SUBSCRIBER_HASH)
    print("client.ping.get() response: {}".format(response))
except ApiClientError as error:
    print("An exception occurred: {}".format(error.text))