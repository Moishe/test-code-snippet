const mailchimp = require("mailchimp-transactional")("YOUR_API_KEY");

async function run() {
  const response = await mailchimp.subaccounts.info({
    id: "UNIQUE_ACCOUNT_ID"
  });
  console.log(
    `This subaccount has sent ${response.sent_total} emails. Its status is ${
      response.status
    }.`
  );
}
run();