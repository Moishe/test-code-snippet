import mailchimp_transactional as MailchimpTransactional
from mailchimp_transactional.api_client import ApiClientError

mailchimp = MailchimpTransactional.Client('YOUR_API_KEY')

def run():
  try:
    response = mailchimp.subaccounts.update({
      "id": "UNIQUE_ACCOUNT_ID",
      "custom_quota": 100
    })
    print("Success! This account's new sending quota is {} ".format(response['custom_quota']))
  except ApiClientError as error:
    print('An exception occurred: {}'.format(error.text))

run()