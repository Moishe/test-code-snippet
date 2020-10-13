dc=”YOUR_DC”
apikey=”YOUR_API_KEY”
listid=”YOUR_LIST_ID”
tagid=”YOUR_TAG_ID”

body() {
  cat <<EOT
{
  “members_to_remove”: [
    "john.smith@example.com",
    "brad.hudson@example.com"
  ]
}
EOT
}

count=”$(curl -s --request POST \
--url "https://${dc}.api.mailchimp.com/3.0/lists/${listid}/segments/${tagid}" \
--user "foo:${apikey}" --include \
--data “$(body)” | jq -r ‘.total_removed’)”

echo “Successfully untagged ${count} contacts”