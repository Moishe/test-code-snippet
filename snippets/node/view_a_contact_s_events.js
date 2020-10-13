const referralCode = "THE_REFERRAL_CODE";
const listId = "YOUR_LIST_ID";
const user = fakeDB.getUserByReferralCode(referralCode);
const subscriberHash = md5(user.email.toLowerCase());

async function run() {
  const response = await mailchimp.lists.getListMemberEvents(
    listId,
    subscriberHash
  );

  console.log(`We have created ${response.totalItems} events for this user.`);
}

run();