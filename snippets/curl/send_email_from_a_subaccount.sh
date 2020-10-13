curl -X POST \
  https://mandrillapp.com/api/1.0/messages/send \
  --data-binary @- << EOF 
{
  "key": "YOUR_API_KEY",
   "message": {
     "text": "This email was sent from a subaccount!",
      "subject": "Subaccount test",
      "from_email": "hello@example.com",
      "to": [{ 
        "email": "freddie@example.com",
        "type": "to" 
      }],
      "subaccount": "UNIQUE_ACCOUNT_ID"
    }
}
EOF