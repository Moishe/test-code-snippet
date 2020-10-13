#!/bin/bash
set -euo pipefail


list_id="YOUR_LIST_ID"
email="prudence.mcvankab@example.com"

subscriber_hash=$(echo -n "$email" | md5sum | cut -f1 -d' ')

curl -sS --request GET \
  --url "https://$API_SERVER.api.mailchimp.com/3.0/lists/$list_id/members/$subscriber_hash" \
  --user "key:$API_KEY" \
| jq '.status'