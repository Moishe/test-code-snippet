curl -sS -X POST "https://mandrillapp.com/api/1.0/users/ping" \
  --header 'Content-Type: application/json' \
  --data-raw '{ "key": "YOUR_API_KEY" }' --user "`anystring`:${apikey}" | jq -r