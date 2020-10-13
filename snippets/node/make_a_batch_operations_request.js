const mailchimp = require("@mailchimp/mailchimp_marketing");

mailchimp.setConfig({
  apiKey: "YOUR_API_KEY",
  server: "YOUR_SERVER_PREFIX"
});

const listId = "YOUR_LIST_ID";

async function run() {
  const myUsers = [
    {
      id: "1",
      email: "user1@example.com"
    },
    {
      id: "2",
      email: "user2@example.com"
    }
    // etc...
  ];

  const operations = myUsers.map((user, i) => ({
    method: "POST",
    path: `/lists/${listId}/members}`,
    operation_id: user.id,
    body: JSON.stringify({
      email_address: user.email,
      status: "subscribed"
    })
  }));

  const response = await mailchimp.batches.start({
    operations
  });
  console.log(response);
}

run();