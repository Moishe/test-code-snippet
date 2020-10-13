from urllib.parse import parse_qs


def handle_webhook(response_body):
    response_body_url = urllib.parse.parse_qs(response_body)
    print(f"You can fetch the gzipped response with {response_body_url['data[response_body_url]']}")