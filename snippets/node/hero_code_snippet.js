const client = require("mailchimp-marketing");

client.setConfig({
  apiKey: "YOUR_API_KEY",
  server: "YOUR_SERVER_PREFIX",
});

const run = async () => {
  const response = await client.ping.get();
  console.log(response);
}

run();