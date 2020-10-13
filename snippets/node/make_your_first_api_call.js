const mailchimpTx = require("mailchimp-transactional")("YOUR_API_KEY");

async function run() {
  const response = await mailchimpTx.users.ping();
  console.log(response);
}

run(); = await mailchimp.ping.get();
  console.log(response);
}

run();