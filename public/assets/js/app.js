const enemies = [];
const MAX = 7;

const enemyInput = document.getElementById('enemyInput');
const enemyList = document.getElementById('enemyList');
const counter = document.getElementById('counter');
const result = document.getElementById('result');

/* ======================
   UI HELPER
====================== */
function updateCounter() {
    counter.textContent = `${enemies.length}/${MAX}`;
}

function renderEnemyList() {
    enemyList.innerHTML = '';
    enemies.forEach(name => {
        const tag = document.createElement('span');
        tag.className = 'enemy-tag';
        tag.textContent = name;
        enemyList.appendChild(tag);
    });
}

/* ======================
   ADD ENEMY
====================== */
function addEnemy() {
    const name = enemyInput.value.trim();

    if (!name) {
        alert('Nama lawan tidak boleh kosong');
        return;
    }

    if (enemies.length >= MAX) {
        alert('Sudah mencapai 7 lawan');
        return;
    }

    enemies.push(name);
    enemyInput.value = '';

    updateCounter();
    renderEnemyList();
    result.textContent = 'Siap dihitung...';
}

/* ======================
   CALCULATE
====================== */
async function calculate() {
    if (enemies.length !== MAX) {
        alert('Masukkan tepat 7 lawan');
        return;
    }

    result.textContent = 'Memproses...';

    try {
        const res = await fetch('/public/api/predict', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ enemies })
        });

        const data = await res.json();

        if (!data.data) {
            result.textContent = 'Terjadi kesalahan server';
            return;
        }

        let output = '';

        // Ronde 1–7 (sesuai input)
        data.data.rounds.forEach(name => {
            output += name + '\n';
        });

        // Prediksi selanjutnya
        data.data.next.forEach(name => {
            output += name + '\n';
        });

        result.textContent = output.trim();

    } catch (e) {
        result.textContent = 'Gagal menghubungi server';
    }
}

/* ======================
   RESET
====================== */
function resetAll() {
    enemies.length = 0;
    enemyInput.value = '';
    enemyList.innerHTML = '';
    result.textContent = 'Menunggu input...';
    updateCounter();
}

/* ======================
   ENTER KEY SUPPORT
====================== */
enemyInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        addEnemy();
    }
});

/* INIT */
updateCounter();
