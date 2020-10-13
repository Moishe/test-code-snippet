from flask import Flask,request
from operator import itemgetter

app = Flask(__name__)

@app.route('/', methods=['POST'])
def index():
  reqType= itemgetter('type')(request.get_json())
  reqData= itemgetter('data')(request.get_json())
  if reqType == "subscribe" :
   fakeDB.subscribeUser(reqData)
  elif reqType == "unsubscribe" :
   fakeDB.unsubscribeUser(reqData['id'])

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')