webhook_url = "YOUR_WEBHOOK_ABSOLUTE_URL"
payload = {
    "url": webhook_url
}

response = mailchimp.batchWebhooks.create(payload)
print(response)