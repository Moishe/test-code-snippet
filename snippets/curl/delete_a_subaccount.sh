curl -X POST \
  https://mandrillapp.com/api/1.0/subaccounts/delete \
  --data-binary @- << EOF 
{
  "key": "YOUR_API_KEY",
  "id": "UNIQUE_ACCOUNT_ID"
}
EOF