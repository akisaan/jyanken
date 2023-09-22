const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// データベースに接続
const db = mysql.createConnection({
    host: 'localhost',
    user: 'your_username',
    password: 'your_password',
    database: 'your_database_name'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Connected to the database');
});

// ジャンケンの結果をデータベースに保存
app.post('/saveResult', (req, res) => {
    const { player_name, win_count, lose_count, draw_count, rating } = req.body;
    const sql = 'INSERT INTO player_stats (player_name, win_count, lose_count, draw_count, rating) VALUES (?, ?, ?, ?, ?)';
    db.query(sql, [player_name, win_count, lose_count, draw_count, rating], (err, result) => {
        if (err) throw err;
        res.send('Result saved to the database');
    });
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
