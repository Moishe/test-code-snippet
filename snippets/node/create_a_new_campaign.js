const mailchimpClient = require("mailchimp-marketing");

mailchimpClient.setConfig({
  apiKey: "YOUR_API_KEY",
  server: "YOUR_SERVER_PREFIX",
});

(async () => {
  const response = await mailchimpClient.campaigns.create({ type: "absplit" });
  console.log(response);
})();
