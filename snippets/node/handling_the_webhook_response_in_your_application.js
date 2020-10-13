const express = require("express");
const bodyParser = require("body-parser");
// this is a stand-in for the code you'd use to write to your own database
const fakeDB = require("fakeDB");

const app = express();

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true }));

app.post("/", (req, res) => {
 const { type, data } = req.body;
 if (type === "subscribe") {
   fakeDB.subscribeUser(data);
 } else if (type === "unsubscribe") {
   fakeDB.unsubscribeUser(data.id);
 }
});

app.listen(port, () =>
 console.log(`Listening at http://localhost:3000`)
);