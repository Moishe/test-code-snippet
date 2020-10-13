curl -X POST \
  https://mandrillapp.com/api/1.0/subaccounts/add \
  --data-binary @- << EOF 
{
  "key": "YOUR_API_KEY",
  "id": "UNIQUE_ACCOUNT_ID",
  "name": "Acme Widgets",
  "notes": "Free tier",
  "custom_quota": 10
}
EOF