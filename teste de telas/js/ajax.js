// /js/ajax.js

function buscarItens(query) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "includes/busca.php?search=" + query, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            exibirResultados(response);
        }
    };
    xhr.send();
}

function exibirResultados(results) {
    const resultsContainer = document.querySelector('.results');
    resultsContainer.innerHTML = ''; // Limpa resultados anteriores
    results.forEach(item => {
        const li = document.createElement('li');
        li.innerHTML = `<strong>${item.nome}</strong> - Localização: ${item.localizacao}`;
        resultsContainer.appendChild(li);
    });
}

function adicionarItem(nome, referencia, localizacao) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cadastro.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Item adicionado com sucesso!");
        }
    };
    xhr.send("nome=" + nome + "&referencia=" + referencia + "&localizacao=" + localizacao);
}
