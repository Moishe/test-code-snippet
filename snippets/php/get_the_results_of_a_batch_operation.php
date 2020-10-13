require dirname(__DIR__).'/vendor/autoload.php';

$url = "RESPONSE_BODY_URL_FROM_PREVIOUS_STEPS";
$guzzle = new GuzzleHttp\Client();
$response = $guzzle->get($url);

// Extract data from gzipped archive, return as array
// Implementation details not included
$results = processBatchArchive($response);

foreach ($results as $result)
{
    $user = FakeUser::find($result['operation_id']);
    $user->setMailchimpWebId(result['response']['web_id']);
    $user->save();
}