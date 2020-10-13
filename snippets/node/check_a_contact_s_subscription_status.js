const md5 = require("md5");

const listId = "YOUR_LIST_ID";
const email = "prudence.mcvankab@example.com";
const subscriberHash = md5(email.toLowerCase());

async function run() {
  try {
    const response = await mailchimp.lists.getListMember(
      listId,
      subscriberHash
    );

    console.log(`This user's subscription status is ${response.status}.`);
  } catch (e) {
    if (e.status === 404) {
      console.error(`This email is not subscribed to this list`, e);
    }
  }
}
run();