const url = 'https://example.com/your-webhook-url';

async function run() {
  const response = await mailchimp.batchWebhooks.create({ url });
  console.log(response);
}

run();