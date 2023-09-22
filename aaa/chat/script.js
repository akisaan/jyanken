// ジャンケンの選択肢
const choices = ["グー", "パー", "チョキ"];

// 戦績の初期化
let winCount = 0;
let loseCount = 0;
let drawCount = 0;
let rate = 1.0; // レート

// コンピュータの選択をランダムに決定する関数
function computerChoice() {
    const randomNumber = Math.floor(Math.random() * 3);
    return choices[randomNumber];
}

// 勝敗を判定し、レートを更新する関数
function determineWinner(playerChoice, computerChoice) {
    if (playerChoice === computerChoice) {
        rate += 0.2; // 引き分け時のレート増加
        return `引き分けです！ レート: ${rate.toFixed(1)}`;
    } else if (
        (playerChoice === "グー" && computerChoice === "チョキ") ||
        (playerChoice === "パー" && computerChoice === "グー") ||
        (playerChoice === "チョキ" && computerChoice === "パー")
    ) {
        // 勝利時の処理
        rate += 0.5; // 勝利時のレート増加
        return `勝ちました！ レート: ${rate.toFixed(1)}`;
    } else {
        // 敗北時の処理
        rate -= 0.3; // 敗北時のレート減少
        if (rate < 0.1) {
            rate = 0.1; // レートが0.1未満にならないように制限
        }
        return `負けました。 レート: ${rate.toFixed(1)}`;
    }
}

// 戦績を表示更新する関数
function updateScore() {
    document.getElementById("winCount").textContent = winCount;
    document.getElementById("loseCount").textContent = loseCount;
    document.getElementById("drawCount").textContent = drawCount;
}

// レートを表示更新する関数
function updateRate() {
    document.getElementById("rate").textContent = rate.toFixed(1);
}

// プレイヤーが選択したジャンケンを実行する関数
function play(playerChoice) {
    const computer = computerChoice();
    const result = determineWinner(playerChoice, computer);

    // 結果を表示
    document.getElementById("result").innerText = `あなたは${playerChoice}、コンピュータは${computer}。${result}`;

    // 戦績を更新
    if (result.includes("勝ち")) {
        winCount++;
    } else if (result.includes("負け")) {
        loseCount++;
    } else {
        drawCount++;
    }

    // 戦績を表示更新
    updateScore();

    // レートを表示更新
    updateRate();
}

// 各ジャンケンボタンにクリックイベントリスナーを追加
document.getElementById("グー").addEventListener("click", () => {
    play("グー");
});

document.getElementById("パー").addEventListener("click", () => {
    play("パー");
});

document.getElementById("チョキ").addEventListener("click", () => {
    play("チョキ");
});

// リセットボタンにクリックイベントリスナーを追加
document.getElementById("resetButton").addEventListener("click", () => {
    winCount = 0;
    loseCount = 0;
    drawCount = 0;
    rate = 1.0; // レートをリセット
    updateScore();
    updateRate();
});
