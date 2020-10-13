const batchId = "YOUR_BATCH_OPERATION_ID";

async function run() {
  const response = await mailchimp.batches.status(batchId);
  console.log(response.status);
}

run();