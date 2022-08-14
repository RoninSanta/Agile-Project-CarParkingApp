
const express = require("express");
const app = express();
const path = require('path'); 

app.get("test.html", function (req, res) {
  res.sendFile(path.join(__dirname + '/test.html')); 
});

app.listen(process.env.PORT || 5000);
