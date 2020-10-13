import hashlib
from mailchimp_marketing import Client

mailchimp = Client()
mailchimp.set_config({
  "api_key": "YOUR_API_KEY",
  "server": "YOUR_SERVER_PREFIX"
})

list_id = 'YOUR_LIST_ID'

subscriber_email = "subscriber@email.com"
subscriber_hash = hashlib.md5(subscriber_email.lower().encode()).hexdigest()

response = mailchimp.lists.get_list_member_events(list_id, subscriber_hash)
total_items = response['total_items']
print(f'We have created {total_items} events for this user.')