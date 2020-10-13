const listId = "YOUR_LIST_ID";
const tag = {
  name: "MegaInfluencer",
  static_segment: ["dolly.parton@example.com", "rihanna@example.com"]
};

async function run() {
  const response = await mailchimp.lists.createSegment(listId, tag);

  console.log(`Tag successfully created! Your tag id is ${response.id}`);
}

run();