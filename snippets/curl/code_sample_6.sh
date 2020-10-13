dc=”YOUR_DC”
apikey=”YOUR_API_KEY”
listid=”YOUR_LIST_ID”

body() {
  cat <<EOT
{
  “name”: “MegaInfluencer”,
  “static_segment”: [
    "dolly.parton@example.com",
    "rihanna@example.com"
  ]
}
EOT
}

tagid=”$(curl -s --request POST \
--url "https://${dc}.api.mailchimp.com/3.0/lists/${listid}/segments/" \
--user "foo:${apikey}" --include \
--data “$(body)” | jq -r ‘.id’)”

echo “Tag successfully created! Your tag id is ${tagid}”