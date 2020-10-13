#!/usr/bin/env python

from urllib.parse import urlencode
from operator import itemgetter

import requests
from flask import Flask, redirect, request
import mailchimp_marketing as MailchimpMarketing

app = Flask(__name__)

@app.route('/')
def index():
    return "<p>Welcome to the sample Mailchimp OAuth app! Click <a href='/auth/mailchimp'>here</a> to log in</p>"


# 2. The login link above will direct the user here, which will redirect
# to Mailchimp's OAuth login page.
@app.route('/auth/mailchimp', methods=['GET'])
def auth():
    # You should always store your client id and secret in environment variables for security — the exception: sample code.
    MAILCHIMP_CLIENT_ID = "YOUR_CLIENT_ID"
    oauth_base = "https://login.mailchimp.com/oauth2/authorize?"
    return redirect("{}{}".format(oauth_base,
        urlencode({
            "response_type": "code",
            "client_id": MAILCHIMP_CLIENT_ID,
            "redirect_uri": "OAUTH_CALLBACK"
        })))


# 3. Once the user authorizes your app, Mailchimp will redirect the user to
# this endpoint, along with a code you can use to exchange for the user's
# access token.
@app.route('/oauth/mailchimp/callback', methods=['GET'])
def authCallback():
    # You should always store your client id and secret in environment variables for security — the exception: sample code.
    MAILCHIMP_CLIENT_ID = "YOUR_CLIENT_ID"
    MAILCHIMP_CLIENT_SECRET = "YOUR_CLIENT_SECRET"
    BASE_URL = "http://127.0.0.1:3000"
    OAUTH_CALLBACK = "{}/oauth/mailchimp/callback".format(BASE_URL)

    code = request.args['response_type']

    # Here we're exchanging the temporary code for the user's access token.
    tokenResponse = requests.post("https://login.mailchimp.com/oauth2/token",
              data={
                 'body': {
                     'grant_type': 'authorization_code',
                     'client_id': MAILCHIMP_CLIENT_ID,
                     'client_secret': MAILCHIMP_CLIENT_SECRET,
                     'redirect_uri': OAUTH_CALLBACK,
                     'code': code
                  }})
    access_token = itemgetter('access_token')(tokenResponse.json())
    print(access_token)

    # Now we're using the access token to get information about the user.
    # Specifically, we want to get the user's server prefix, which we'll use to
    # make calls to the API on their behalf.  This prefix will change from user
    # to user.

    metadataResponse = requests.get(
        'https://login.mailchimp.com/oauth2/metadata',
        headers={'Authorization': "OAuth {}".format(access_token)})

    dc = itemgetter('dc')(metadataResponse.json())
    print(dc)

    # Below, we're using the access token and server prefix to make an
    # authenticated request on behalf of the user who just granted OAuth access.
    # You wouldn't keep this in your production code, but it's here to
    # demonstrate how the call is made.

    mailchimp = MailchimpMarketing.Client()
    mailchimp.set_config({
      "access_token": "YOUR_ACCESS_TOKEN",
      "server": "YOUR_SERVER_PREFIX"
    })

    response = mailchimp.ping.get()
    print(response)

    return """<p>This user's access token is {} and their server prefix is {}.</p>
          <p>When pinging the Mailchimp Marketing API's ping endpoint, the server responded:<p>
           <code>{}</code>
          """.format(access_token, dc, code)
    # In reality, you'd want to store the access token and server prefix
    # somewhere in your application.
    # fakeDB.getCurrentUser()
    # fakeDB.storeMailchimpCredsForUser(user, {
    #      "dc":dc,
    #      access_token
    # })


if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')