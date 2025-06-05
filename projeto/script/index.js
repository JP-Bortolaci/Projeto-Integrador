function fazerLogin() {
    const login = document.getElementById("username").value;
    const senha = document.getElementById("password").value;

    fetch("includes/login.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ login, senha })
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            if (data.tipoUsuario === "gestor") {
                window.location.href = "pages/cadastro.html";
            } else if (data.tipoUsuario === "funcionario") {
                window.location.href = "pages/busca.html";
            } else {
                alert("Tipo de usuário inválido.");
            }
        } else {
            alert(data.mensagem);
        }
    })
    .catch(error => {
        console.error("Erro:", error);
        alert("Erro na conexão com o servidor.");
    });
}