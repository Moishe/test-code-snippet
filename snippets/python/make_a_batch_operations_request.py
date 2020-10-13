from mailchimp_marketing import Client
import json

mailchimp = Client()
mailchimp.set_config({
  "api_key": "YOUR_API_KEY",
  "server": "YOUR_SERVER_PREFIX"
})

list_id = 'YOUR_LIST_ID'

users = [
    {
        'id': '1',
        'email': 'user1@example.com'
    },
    {
        'id': '2',
        'email': 'user2@example.com'
    },
]

operations = []
for user in users:
    operation = {
        "method": "POST",
        "path": f"/lists/{list_id}/members",
        "operation_id": user['id'],
        "body": json.dumps({
            "email_address": user['email'],
            "status": "subscribed"
        })
    }
    operations.append(operation)

payload = {
    "operations": operations
}

response = mailchimp.batches.start(payload)
print(response)