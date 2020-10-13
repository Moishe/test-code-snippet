const mailchimp = require("mailchimp-transactional")("YOUR_API_KEY");

async function run() {
  const response = await mailchimp.subaccounts.resume({
    id: "UNIQUE_ACCOUNT_ID"
  });
  console.log(`This subaccount is now ${response.status}`);
}

run();