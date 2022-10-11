const express = require('express');
const app = express();
const mysql = require('mysql');
const bodyParser = require('body-parser');
const cors = require('cors');

app.use(bodyParser.json());
app.use(cors());
app.use(express.json());

const db = mysql.createConnection({
  host: "140.131.114.154",
  user: "emily",
  password: "@Tfboys806@",
  port:'3306',
  database: 'runningkids'
});

db.connect();

/*app.post('/page/Gift/gift.js', (req, res) => {

        const giftNO = req.gift.gift_no;
        const gift = req.gift.gift;

    db.query('SELECT * FROM gift WHERE gift_no = 1', [gift], (error, rows, fields) => {
        if (error) console.log(error);
        if (rows.length > 0) {
            res.send(rows);
        } else {
            res.send(rows);
        }
    });
})

app.get('/trips', (req, res) => {

        const gift = req.query.gift;
        const giftContent = req.query.companyId;
        const status1 = req.query.status1;

    db.query('SELECT * FROM trips WHERE driver = ? AND company_id = ? AND status_1 = ?', [driver, companyId, status1], (error, rows, fields) => {
        if(error) console.log(error);
        else{
            console.log(driver)
            res.send(rows);
        }
    })
});*/

app.post('/data', function(req, res){
	console.log(req.body); 
    var data = {today_mi:req.body.today_mi};
    var sql = 'INSERT INTO record SET ?';
    db.query(sql, data, (err, result)=>{
        if(err) throw err;
        console.log(result);
        res.send({
            no: null,
            today_mi: req.body.today_mi
        });
    });
});

const PORT = process.env.PORT || 4000;
app.listen(PORT, () => {
    console.log(`Listening on port ${PORT}`);
})