<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gogo Predictor | Magic Chess</title>
    <style>
        :root {
            --bg-dark: #0f172a;
            --card-dark: #1e293b;
            --text-light: #f1f5f9;
            --primary-blue: #3b82f6;
            --success-green: #10b981;
            --danger-red: #ef4444;
            --shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-dark);
            color: var(--text-light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 420px;
        }
        .card {
            background: var(--card-dark);
            padding: 30px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            border: 1px solid #334155;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            border-bottom: 2px solid var(--primary-blue);
            padding-bottom: 5px;
        }
        .info-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            background: #334155;
            border-radius: 8px;
            font-size: 0.9rem;
        }
        .counter-display {
            font-weight: bold;
            color: var(--success-green);
        }
        .input-group {
            margin-bottom: 15px;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 2px solid #475569;
            background: var(--bg-dark);
            color: var(--text-light);
            box-sizing: border-box;
        }
        input:focus {
            outline: none;
            border-color: var(--primary-blue);
        }
        button {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
        }
        .btn-add { background: var(--primary-blue); color: white; }
        .btn-calc { background: var(--success-green); color: white; }
        .btn-reset { background: var(--danger-red); color: white; }

        .enemy-tag {
            display: inline-block;
            background: var(--primary-blue);
            color: white;
            padding: 5px 10px;
            margin: 4px;
            border-radius: 5px;
            font-size: 0.85rem;
        }
        .result-box {
            background: #020617;
            border-radius: 8px;
            padding: 15px;
            min-height: 140px;
            white-space: pre-line;
        }
        .result-header {
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="card">
        <h2>🔮 Gogo Predictor</h2>

        <div class="info-bar">
            <span>Status Input:</span>
            <span class="counter-display" id="counter">0/7</span>
        </div>

        <div class="input-group">
            <input type="text" id="enemyInput" placeholder="Masukkan nickname lawan">
        </div>

        <button type="button" class="btn-add" onclick="addEnemy()">➕ Tambah Lawan</button>
        <div id="enemyList"></div>

        <button type="button" class="btn-calc" onclick="calculate()">🚀 Hitung Prediksi</button>
        <button type="button" class="btn-reset" onclick="resetAll()">🔄 Reset</button>

        <div class="result-box">
            <div class="result-header">Hasil:</div>
            <div id="result">Menunggu input...</div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>
