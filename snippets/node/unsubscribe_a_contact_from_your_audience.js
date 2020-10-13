const listId = "YOUR_LIST_ID";
const email = "prudence.mcvankab@example.com";
const subscriberHash = md5(email.toLowerCase());

async function run() {
  const response = await mailchimp.lists.updateListMember(
    listId,
    subscriberHash,
    {
      status: "unsubscribed"
    }
  );

  console.log(`This user is now ${response.status}.`);
}

run();