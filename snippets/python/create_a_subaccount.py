import mailchimp_transactional as MailchimpTransactional
from mailchimp_transactional.api_client import ApiClientError

mailchimp = MailchimpTransactional.Client('YOUR_API_KEY')

newAccount = {
  'id': "UNIQUE_ACCOUNT_ID",
  'name': "Acme Widgets", # optional
  'notes': "Free tier", # optional
  'custom_quota': 10 # optional
}

def run():
  try:
    response = mailchimp.subaccounts.add(newAccount)
    print("Successfully created subaccount. This account's status is: {}".format(response['status']))
  except ApiClientError as error:
    print("Subaccount cannot be created. This account's status is: {}".format(error.text['status']))

run()