const listId = "YOUR_LIST_ID";
const email = "urist.mcvankab@example.com";
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
            status: "inactive",
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