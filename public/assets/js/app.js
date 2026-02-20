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

    // LOGIKA PREDIKSI (dari PredictorModel.php)
    setTimeout(() => {
        try {
            // Ini adalah implementasi dari logic di PredictorModel.php
            // return [
            //     'rounds' => $e,
            //     'next' => [
            //         $e[1],
            //         $e[4],
            //         $e[3],
            //     ]
            // ];

            const rounds = enemies;
            const next = [
                rounds[1],  // indeks ke-1 (elemen ke-2)
                rounds[4],  // indeks ke-4 (elemen ke-5)
                rounds[3]   // indeks ke-3 (elemen ke-4)
            ];

            let output = '';

            // Tampilkan ronde 1-7 (sesuai input)
            output += '🎯 RONDE 1-7:\n';
            rounds.forEach((name, index) => {
                output += `Ronde ${index + 1}: ${name}\n`;
            });

            // Tampilkan prediksi selanjutnya
            output += '\n🔮 PREDIKSI RONDE SELANJUTNYA:\n';
            const nextRounds = ['Ronde 8', 'Ronde 9', 'Ronde 10'];
            next.forEach((name, index) => {
                if (name) {
                    output += `${nextRounds[index]}: ${name}\n`;
                } else {
                    output += `${nextRounds[index]}: (data tidak tersedia)\n`;
                }
            });

            result.textContent = output;

        } catch (e) {
            result.textContent = 'Gagal memproses data';
            console.error(e);
        }
    })
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
