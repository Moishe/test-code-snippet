import mailchimp_marketing as MailchimpMarketing
from mailchimp_marketing.api_client import ApiClientError

LIST_ID = "YOUR_LIST_ID"
TAG_ID = "YOUR_TAG_ID"

client = MailchimpMarketing.Client()
mailchimp.set_config({
  "api_key": "YOUR_API_KEY",
  "server": "YOUR_SERVER_PREFIX"
})
try:
    response = client.lists.batch_segment_members({
        "members_to_add": [
            "dolly.parton@example.com",
            "rihanna@example.com",
        ]
    }, LIST_ID, TAG_ID)
    print("client.ping.get() response: {}".format(response))
except ApiClientError as error:
    print("An exception occurred: {}".format(error.text))