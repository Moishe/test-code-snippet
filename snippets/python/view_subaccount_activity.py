import mailchimp_transactional as MailchimpTransactional
from mailchimp_transactional.api_client import ApiClientError

mailchimp = MailchimpTransactional.Client('YOUR_API_KEY')

def run():
  try:
    response = mailchimp.subaccounts.info({
      "id": "UNIQUE_ACCOUNT_ID"
    })
    print("This subaccount has sent: {} emails. Its status is: {}".format(response['sent_total'], response['status']))
  except ApiClientError as error:
    print('An exception occurred: {}'.format(error.text))

run()