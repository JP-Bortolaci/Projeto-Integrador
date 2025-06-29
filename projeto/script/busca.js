const searchInput = document.getElementById('search');
const resultsList = document.getElementById('results');
const locationDisplay = document.getElementById('location-display');

searchInput.addEventListener('input', () => {
    const term = searchInput.value.trim();

    if (term.length === 0) {
        resultsList.innerHTML = '';
        locationDisplay.textContent = '';
        return;
    }

    fetch(`../includes/buscar_ajax.php?term=${encodeURIComponent(term)}`)
        .then(response => response.json())
        .then(data => {
            resultsList.innerHTML = '';
            locationDisplay.textContent = '';

            if (data.error) {
                resultsList.innerHTML = `<li>Erro: ${data.error}</li>`;
                return;
            }

            if (data.length === 0) {
                resultsList.innerHTML = '<li>Nenhum item encontrado</li>';
                return;
            }

            data.forEach(item => {
                const li = document.createElement('li');
                li.textContent = `${item.nome} (${item.referencia})`;
                li.style.cursor = 'pointer';
                li.addEventListener('click', () => {
                    locationDisplay.textContent = `Localização do item: ${item.localizacao.match(/A\d+/)}`;
                    localizarPeca(item.localizacao);
                });
                resultsList.appendChild(li);
            });
        })
        .catch(err => {
            resultsList.innerHTML = `<li>Erro na busca: ${err.message}</li>`;
        });
});

const estoque = document.getElementById("estoque");

// Gerar 4 corredores (C1 a C4)
let corredorAtual = 1;

for (let bloco = 0; bloco < 4; bloco++) {
    // 2 linhas de prateleiras por corredor (C1 a C4)
    for (let linha = 0; linha < 2; linha++) {
        // Adiciona linha de corredor entre blocos (exceto após o último)
        if (bloco < 4 && linha == 1) {
            for (let i = 0; i < 5; i++) {
                const corredor = document.createElement("div");
                const corredorSpan = document.createElement("span");
                corredor.className = "corredor";
                corredorSpan.className = "corredorSpan";
                if (i == 1 || i == 3) {
                    corredorSpan.textContent = `C${corredorAtual}`
                } else {
                    corredorSpan.textContent = "";
                }
                estoque.appendChild(corredor);
                corredor.appendChild(corredorSpan);
            }
        }
        for (let p = 1; p <= 5; p++) {
            const prateleira = document.createElement("div");
            const prateleiraSpan = document.createElement("span");
            const prateleiraNum = (linha * 5 + p); // P1 a P8 por corredor
            const id = `C${corredorAtual}P${prateleiraNum}`;


            prateleira.className = "prateleira";
            prateleira.id = id;
            prateleiraSpan.className = "prateleiraSpan";
            prateleiraSpan.textContent = `P${prateleiraNum}`;

            estoque.appendChild(prateleira);
            prateleira.appendChild(prateleiraSpan);
        }
    }
    corredorAtual++;
}

// Função para destacar uma prateleira
function localizarPeca(codigo) {
    document.getElementById("estoque").style.display = "grid";
    const local = codigo.match(/^C\d+P\d+/)?.[0];
    document.querySelectorAll('.prateleira').forEach(p => p.classList.remove('destacado'));
    const alvo = document.getElementById(local.toUpperCase());
    if (alvo) {
        alvo.classList.add('destacado');
        alvo.scrollIntoView({ behavior: 'smooth', block: 'center' });
    } else {
        alert('Localização não encontrada.');
    }
}
