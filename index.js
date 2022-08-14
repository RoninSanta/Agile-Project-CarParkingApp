
const express = require("express");
const app = express();

app.get("/", function (req, res) {
  res.send("TESTING HEROKU!!!");
});

app.listen(process.env.PORT || 5000);
