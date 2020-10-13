async function handleWebhook(req) {
  const decodedText = decodeURIComponent(req.body);
  const params = new URLSearchParams(decodedText);
  const responseBodyUrl = params.get("data[response_body_url]");
  console.log(`You can fetch the gzipped response with ${responseBodyUrl}.`);
}