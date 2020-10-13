const express = require("express");
const bodyParser = require("body-parser");

const app = express();

// notice that the body will be of type `x-www-form-urlencoded`,
// and needs to be parsed as such
app.use(
  bodyParser.urlencoded({
    extended: false
  })
);

const TARGET_LINK_URL = "https://www.eiffelflowers.biz/news/ultraviolet-sale";

const generateMessage = email => ({
  html:
    "<p>We noticed you were interested in violets! How about we offer you a great deal on a dozen if you buy in the next 72 hours?</p>",
  text:
    "We noticed you were interested in violets! How about we offer you a great deal on a dozen if you buy in the next 72 hours?",
  subject: "Roses Are Red, Violets Are On Sale",
  from_email: "hello@eiffelflowers.biz",
  from_name: "Daisy @ Eiffel Flowers",
  to: [
    {
      email,
      type: "to"
    }
  ]
});

app.post("/", (req, res) => {
  const mandrillEvents = JSON.parse(req.body.mandrill_events);
  mandrillEvents.forEach(event => {
    const {
      clicks: [url],
      email
    } = event.msg;
    if (url === TARGET_LINK_URL) {
      // send follow-up message here using the Mailchimp Transactional API
      // for more details, see https://mailchimp.com/developer/guides/send-your-first-transactional-email
      console.log("Send follow up email with this payload:", generateMessage(email));
    } else {
      // lets us test the webhook using the Mailchimp Transactional UI (see next section)
      console.log("webhook handled successfully!");
    }
  });
  res.send("Done");
});

app.listen(3000, () => console.log("Now listening at http://localhost:3000"));