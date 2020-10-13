dc="YOUR_DC"
apikey="YOUR_API_KEY"
listid="YOUR_LIST_ID"

referral_code="THE_REFERRAL_CODE"
subscriber_email="$(LOOKUP_IN_YOUR_APP)"
subscriber_hash="$(echo -n "$subscriber_email" | md5sum | cut -d' ' -f1)"

num_events="$(curl -s \
--url "https://${dc}.api.mailchimp.com/3.0/lists/${listid}/members/${subscriber_hash}/events" \
--header 'content-type: application/json' \
--user "foo:${apikey}" | jq -r '.total_items')"

echo "We have created ${num_events} for this user."