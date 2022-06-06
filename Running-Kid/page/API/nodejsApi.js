const connection = mysql.createPool({
    host     : '140.131.114.154', // Your connection adress (localhost).
    user     : 'emily',     // Your database's username.
    password : '@Tfboys806@',        // Your database's password.
    port:'3306',
    database : 'runningkids'  // Your database's name.
    
  });
  
  // Starting our app.
  const app = express();
  
  // Creating a GET route that returns data from the 'users' table.
  app.get('/record', function (req, res) {
      // Connecting to the database.
      connection.getConnection(function (err, connection) {
  
      // Executing the MySQL query (select all data from the 'users' table).
      connection.query('SELECT sum(distance) FROM record', function (error, results, fields) {
        // If some error occurs, we throw an error.
        if (error) throw error;
  
        // Getting the 'response' from the database and sending it to our route. This is were the data is.
        res.send(results)
      });
    });
  });
  
  // Starting our server.
 /* app.listen(3000, () => {
   console.log('Go to http://localhost:3000/record so you can see the data.');
  });
  */
  