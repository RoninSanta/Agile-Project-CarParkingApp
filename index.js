
const express = require("express");
const app = express();

app.get("/test.html", function (req, res) {
  res.send("TESTING HEROKU!!!");
});

app.listen(process.env.PORT || 5000);
