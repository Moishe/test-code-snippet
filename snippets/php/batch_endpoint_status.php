function handleWebhook($req) {
    $params = $req->body;
    $response_body_url = $params['data[response_body_url]'];
    echo "You can fetch the gzipped response with {$response_body_url}.";
}