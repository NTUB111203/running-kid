var mysql = require('mysql');

var con = mysql.createConnection({
  host: "140.131.114.154",
  user: "emily",
  password: "@Tfboys806@",
  port:'3306',
  database:'runningkids'
});
  
  // Starting our app.
  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    con.query(sql, function (err, result) {
      if (err) throw err;
      console.log("Result: " + result);
    });
  });
  