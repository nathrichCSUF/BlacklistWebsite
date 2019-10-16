  var mysql = require("mysql");
(function (window) {
  "use strict";
  var App = window.App || {};
  var mysql = require("mysql");
  function ConnecttoDB(){
    var con = mysql.createConnection({
      host: "localhost",
      user: "root",
      password: "TheBoys123!"

    });

    con.connect(function(err){
      if (err) throw err;
      console.log("Connected to blacklistwebsite database");

    })
  }

ConnecttoDB();
})(window);
