const mailchimp = require("mailchimp-transactional")("YOUR_API_KEY");

const message = {
  from_email: "hello@example.com",
  subject: "Subaccount test",
  text: "This email was sent from a subaccount!",
  to: [
    {
      email: "freddie@example.com",
      type: "to"
    }
  ],
  subaccount: "UNIQUE_ACCOUNT_ID"
};

async function run() {
  const response = await mailchimp.messages.send({
    message
  });
  console.log(response);
}
run();