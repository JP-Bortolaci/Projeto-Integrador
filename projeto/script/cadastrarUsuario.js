function cadastrarUsuario() {
    const login = document.getElementById("username").value;
    const senha = document.getElementById("password").value;
    const tipoUsuario = document.getElementById("tipoUsuario").value;

    fetch("../includes/inserirUsuario.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ login, senha, tipoUsuario })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro na resposta do servidor.");
        }
        return response.json();
    })
    .then(data => {
        if (data.status === "ok") {
            alert(data.mensagem);
        } else {
            alert("Erro: " + data.mensagem);
        }
    })
    .catch(error => {
        console.error("Erro:", error);
        alert("Erro na conexão com o servidor.");
    });
}function cadastrarUsuario() {
    const login = document.getElementById("username").value;
    const senha = document.getElementById("password").value;
    const tipoUsuario = document.getElementById("tipoUsuario").value;

    fetch("../includes/inserirUsuario.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ login, senha, tipoUsuario })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro na resposta do servidor.");
        }
        return response.json();
    })
    .then(data => {
        if (data.status === "ok") {
            alert(data.mensagem);
        } else {
            alert("Erro: " + data.mensagem);
        }
    })
    .catch(error => {
        console.error("Erro:", error);
        alert("Erro na conexão com o servidor.");
    });
}