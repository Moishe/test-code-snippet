import hashlib
from mailchimp_marketing import Client

mailchimp = Client()
mailchimp.set_config({
  "api_key": "YOUR_API_KEY",
  "server": "YOUR_SERVER_PREFIX"
})

list_id = 'YOUR_LIST_ID'

referral_code = "THE_REFERRAL_CODE"
subscriber_email = "subscriber@email.com"
subscriber_hash = hashlib.md5(subscriber_email.lower().encode()).hexdigest()
options = {
    "body": {
        "name": "registered_referral",
        "properties": {
            "ref_code": referral_code
        }
    }
}

response = mailchimp.lists.create_list_member_event(list_id, subscriber_hash, **options)
print(response.status_code)