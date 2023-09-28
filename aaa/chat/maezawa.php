<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>後澤jankenゲーム</title>
</head>
<body>
<?php
// PHP変数の定義
$money = 0;
$winningStreak = 0; 
$drawStreak = 0;
?>
<div id="app">
<p>所持金: <span id="money"><?php echo $money; ?></span>円</p>
<button onclick="play('gu')">ぐー</button>
<button onclick="play('choki')">ちょき</button>
<button onclick="play('pa')">ぱー</button>
<p id="result"></p>
<button onclick="reset()">リセット</button>
</div>
<script>
// JavaScript変数の定義
let computerChoice;
function play(playerChoice) {
  // コンピュータの選択
  computerChoice = getComputerChoice();
  // 結果処理
  let result = judge(playerChoice, computerChoice);
  // 賞金処理
  updateMoney(result);
  // 表示更新
  displayUpdate(result);
  // 続けるか確認
  confirmContinue();
}
// その他処理関数
</script>
</body>
</html>