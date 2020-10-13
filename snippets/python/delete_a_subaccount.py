import mailchimp_transactional as MailchimpTransactional
from mailchimp_transactional.api_client import ApiClientError

mailchimp = MailchimpTransactional.Client('YOUR_API_KEY')

def run():
  try:
    response = mailchimp.subaccounts.delete({
      "id": "UNIQUE_ACCOUNT_ID"
    })
    print('API called successfully: {}'.format(response))
  except ApiClientError as error:
    print('An exception occurred: {}'.format(error.text))

run()