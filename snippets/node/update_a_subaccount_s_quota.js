const mailchimp = require("mailchimp-transactional")("YOUR_API_KEY");

async function run() {
  const response = await mailchimp.subaccounts.update({
    id: "UNIQUE_ACCOUNT_ID",
    custom_quota: 100
  });
  console.log(
    `Success! This account's new sending quota is ${response.custom_quota}.`
  );
}

run();