const listId = "YOUR_LIST_ID";
const subscribingUser = {
  firstName: "Prudence",
  lastName: "McVankab",
  email: "prudence.mcvankab@example.com"
};

async function run() {
  const response = await mailchimp.lists.addListMember(listId, {
    email_address: subscribingUser.email,
    status: "subscribed",
    merge_fields: {
      FNAME: subscribingUser.firstName,
      LNAME: subscribingUser.lastName
    }
  });

  console.log(
    `Successfully added contact as an audience member. The contact's id is ${
      response.id
    }.`
  );
}

run();