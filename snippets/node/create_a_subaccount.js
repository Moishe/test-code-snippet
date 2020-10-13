const mailchimp = require("mailchimp-transactional")("YOUR_API_KEY");

const newAccount = {
  id: "UNIQUE_ACCOUNT_ID",
  name: "Acme Widgets", // optional
  notes: "Free tier", // optional
  custom_quota: 10 // optional
};

async function run() {
  const response = await mailchimp.subaccounts.add(newAccount);
  console.log(
    `Successfully created subaccount. This account’s status is ${
      response.status
    }`
  );
}

run();