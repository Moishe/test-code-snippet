const mailchimp = require("mailchimp-transactional")(
  "YOUR_API_KEY"
);

const message = {
  from_email: "hello@example.com",
  subject: "Hello world",
  text: "Welcome to Mailchimp Transactional!",
  to: [
    {
      email: "freddie@example.com",
      type: "to"
    }
  ]
};

async function run() {
  const response = await mailchimp.messages.send({
    message
  });
  console.log(response);
}
run();