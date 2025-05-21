document.getElementById('login-form').addEventListener('submit', async function (e) {
    e.preventDefault();
  
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
  
    const response = await fetch('login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
    });
  
    const result = await response.text();
  
    if (result.trim() === 'success') {
      window.location.href = 'pages/dashboard.html';
    } else {
      document.getElementById('login-message').textContent = 'Usuário ou senha inválidos.';
    }
  });
  