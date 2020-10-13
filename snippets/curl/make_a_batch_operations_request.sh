#!/bin/bash
set -euo pipefail

server="YOUR_SERVER_PREFIX"
apikey="YOUR_API_KEY"
listid="YOUR_LIST_ID"

declare -A subscriber1=(
	[email]="user1@example.com"
	[id]=1
	[status]="subscribed"
)

declare -A subscriber2=(
	[email]="user2@example.com"
	[id]=2
	[status]="subscribed"
)

curl -sS --request POST \
  "https://${server}.api.mailchimp.com/3.0/batches" \
  --user "`anystring`:${apikey}" \
  --data @- \
<<EOF | jq 'del(._links)'
{
	"operations":[
    	{
        	"method": "POST",
        	"path": "/lists/${listid}/members",
        	"operation_id": "${subscriber1[id]}",
        	"body": "{\"email_address\":\"${subscriber1[email]}\",\"status\":\"${subscriber1[status]}\"}"
    	},
    	{
        	"method": "POST",
        	"path": "/lists/${listid}/members",
        	"operation_id": "${subscriber2[id]}",
        	"body": "{\"email_address\":\"${subscriber2[email]}\",\"status\":\"${subscriber2[status]}\"}"
    	}
	]
}
EOF