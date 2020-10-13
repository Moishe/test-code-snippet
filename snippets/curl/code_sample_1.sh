dc="YOUR_DC"
apikey="YOUR_API_KEY"
listid="YOUR_LIST_ID"
subscriber_email="urist.mcvankab@example.com"
subscriber_hash="$(echo -n "$subscriber_email" | md5sum | cut -d’ ‘ -f1)"

curl -s --request POST \
--url "https://${dc}.api.mailchimp.com/3.0/lists/${listid}/members/${subscriber_hash}/tags" \
--user "foo:${apikey}" --include \
--data '{"tags": [{"name": "Influencer", "status": "active"}]}'