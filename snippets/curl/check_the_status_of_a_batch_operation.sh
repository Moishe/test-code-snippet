#!/bin/bash
set -euo pipefail

server="YOUR_SERVER_PREFIX"
apikey="YOUR_API_KEY"
batchid="YOUR_BATCH_ID"

curl -sS \
  "https://${server}.api.mailchimp.com/3.0/batches/${batchid}" \
  --user "`anystring`:${apikey}" | jq '.status'