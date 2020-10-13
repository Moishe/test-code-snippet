const mailchimp = require("mailchimp-marketing");
const md5 = require("md5");

mailchimp.setConfig({
  apiKey: "YOUR_API_KEY",
  server: "YOUR_SERVER_PREFIX",
});

const email = "urist.mcvankab@example.com";
const listId = "YOUR_LIST_ID";
const subscriberHash = md5(email.toLowerCase());

async function run() {
  const response = await mailchimp.lists.updateListMemberTags(
    listId,
    subscriberHash,
    {
      body: {
        tags: [
          {
            name: "Influencer",
            status: "active",
          },
        ],
      },
    }
  );

  console.log(
    `The return type for this endpoint is null, so this should be true: ${
      response === null
    }`
  );
}

run();
