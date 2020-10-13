#!/bin/bash
set -euo pipefail

server="SERVER_PREFIX"
apikey="YOUR_API_KEY"

url="https://example.com/your-webhook-url"

curl -sS --request POST \
  "https://${server}.api.mailchimp.com/3.0/batch-webhooks" \
  --user "foo:${apikey}" \
  --data @- \
<<EOF | jq
{
	"url": "${url}"
}
EOF