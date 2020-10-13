dc=”YOUR_DC”
apikey=”YOUR_API_KEY”
listid=”YOUR_LIST_ID”
subscriber_email=”urist.mcvankab@example.com”
subscriber_hash=”$(echo -n “$subscriber_email” | md5sum | cut -d’ ‘ -f1)”
# use below for OS X
# subscriber_hash="$(md5 -s "$subscriber_email" | cut -d' ' -f4)"

curl -s --request GET \
--url "https://${dc}.api.mailchimp.com/3.0/lists/${listid}/members/${subscriber_hash}/tags" \
--user "foo:${apikey}" | jq -r .