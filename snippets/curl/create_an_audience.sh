#!/bin/bash
set -euo pipefail


event_name="Bash Developers Meetup"

footer_contact_info='{
  "company": "Mailchimp",
  "address1": "675 Ponce de Leon Ave NE",
  "address2": "Suite 5000",
  "city": "Atlanta",
  "state": "GA",
  "zip": "30308",
  "country": "US"
}'

campaign_defaults='{
  "from_name": "Gettin'\'' Together",
  "from_email": "gettintogether@example.com",
  "subject": "Bash Developers Meetup",
  "language": "EN_US"
}'

curl -sS --request POST \
  --url "https://$API_SERVER.api.mailchimp.com/3.0/lists" \
  --user "key:$API_KEY" \
  --header 'content-type: application/json' \
  --data @- \
<<EOF | jq '.id'
{
  "name": "$event_name",
  "contact": $footer_contact_info,
  "permission_reminder": "permission_reminder",
  "email_type_option": true,
  "campaign_defaults": $campaign_defaults
}
EOF