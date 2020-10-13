const listId = "YOUR_LIST_ID";
const tagId = "YOUR_TAG_ID";
const body = {
  members_to_remove: ["john.smith@example.com", "brad.hudson@example.com"]
};

async function run() {
  const response = await apiInstance.batchSegmentMembers(
    body,
    listId,
    tagId
  );

  console.log(`Successfully untagged ${response.total_removed} contacts`);
}

run();