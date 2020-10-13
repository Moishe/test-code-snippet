const mailchimp = require("mailchimp-transactional")("YOUR_API_KEY");

async function run() {
  const response = await mailchimp.subaccounts.delete({
    id: "UNIQUE_ACCOUNT_ID"
  });
  console.log(response);
}

run();