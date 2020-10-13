import mailchimp_transactional as MailchimpTransactional
from mailchimp_transactional.api_client import ApiClientError

mailchimp = MailchimpTransactional.Client('YOUR_API_KEY')

def run():
  try:
    response = mailchimp.subaccounts.pause({
      "id": "UNIQUE_ACCOUNT_ID"
    })
    print("This subaccount is now {} ".format(response['status']))
  except ApiClientError as error:
    print('An exception occurred: {}'.format(error.text))

run()