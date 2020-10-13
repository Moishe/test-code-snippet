require 'sinatra'

configure do
  set :port, 3000
end


post '/' do
  type, data = params['type'], params['data']

  if type == 'unsubscribe'
    fake_db.unsubscribe_user(data['id'])
  elsif type == 'subscribe'
    fake_db.subscribe(data)
  end
end