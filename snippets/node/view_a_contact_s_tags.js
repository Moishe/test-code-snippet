const listId = "YOUR_LIST_ID";
const email = "urist.mcvankab@example.com";
const subscriberHash = md5(email.toLowerCase());

async function run() {
  const response = await mailchimp.lists.getListMemberTags(listId, subscriberHash);

  console.log(`Urist has been tagged ${response.total_items} times.`);
}

run();