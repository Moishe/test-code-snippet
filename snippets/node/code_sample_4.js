const listId = "YOUR_LIST_ID";
const tagId = "YOUR_TAG_ID";
const body = {
  members_to_add: ["dolly.parton@example.com", "rihanna@example.com"]
};

async function run() {
  const response = await mailchimp.lists.batchSegmentMembers(
    body,
    listId,
    tagId
  );

  console.log(`Successfully tagged ${response.total_added} contacts`);
}

run();