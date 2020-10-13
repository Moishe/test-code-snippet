MESSAGE='{"key": "$YOUR_API_KEY", "message": {"from_email": "hello@example.com", "subject": "Hello World", "text": "Welcome to Mailchimp Transactional!", "to": [{ "email": "freddie@example.com", "type": "to" }]}}'

curl -sS -X POST "https://mandrillapp.com/api/1.0/messages/send" --header 'Content-Type: application/json' --data-raw "$MESSAGE"