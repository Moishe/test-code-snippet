const mailchimp = require("@mailchimp/mailchimp_marketing");
const md5 = require("md5");

mailchimp.setConfig({
  apiKey: "YOUR_API_KEY",
  server: "YOUR_SERVER_PREFIX"
});

const referralCode = "THE_REFERRAL_CODE";
const listId = "YOUR_LIST_ID";
const user = fakeDB.getUserByReferralCode(referralCode);
const subscriberHash = md5(user.email.toLowerCase());
const options = {
  name: "registered_referral",
  properties: {
    referralCode
  }
};

async function run() {
  const response = await mailchimp.lists.createListMemberEvent(
    listId,
    subscriberHash,
    options
  );

  console.log(`Event successfully created!`);
}

run();