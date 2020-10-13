dc="YOUR_DC"
apikey="YOUR_API_KEY"
listid="YOUR_LIST_ID"

referral_code="THE_REFERRAL_CODE"
subscriber_email="$(LOOKUP_IN_YOUR_APP)"
subscriber_hash="$(echo -n "$subscriber_email" | md5sum | cut -d' ' -f1)"

read -r -d '' data <<EOT
{
  "name": "registered_referral",
  "properties": [
    "${referral_code}"
  ]
}
EOT

curl -s --request POST \
--url "https://${dc}.api.mailchimp.com/3.0/lists/${listid}/members/${subscriber_hash}/events" \
--user "foo:${apikey}" --include \
--data "$data" && echo "Event successfully created!"