#!/bin/bash
set -euo pipefail


list_id="YOUR_LIST_ID"
user_email="prudence.mcvankab@example.com"
user_fname="Prudence"
user_lname="McVankab"

curl -sS --request POST \
  --url "https://$API_SERVER.api.mailchimp.com/3.0/lists/$list_id/members" \
  --user "key:$API_KEY" \
  --header 'content-type: application/json' \
  --data @- \
<<EOF | jq '.id'
{
  "email_address": "$user_email",
  "status": "subscribed",
  "merge_fields": {
	"FNAME": "$user_fname",
	"LNAME": "$user_lname"
  }
}
EOF