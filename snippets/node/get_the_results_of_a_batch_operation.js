const fetch = require("node-fetch");

const responseBodyUrl = "RESPONSE_BODY_URL_FROM_PREVIOUS_STEPS";

async function run() {
  const response = await fetch(responseBodyUrl);

  // Extract data from gzipped archive, return as JSON array
  // Implementation details not included
  const results = processBatchArchive(response);
  results.forEach(result => {
    const user = fakeDB.findUser(result.operation_id);
    fakeDb.updateUser(user, {
      mailchimpWebId: result.response.web_id
    });
  });
}

run();