<?php
// Base URL global
$base_url = "http://localhost/Warmi360-Refactor/public";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro | WARMI 360</title>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      color: #fff;
      overflow: hidden;
    }

    video {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .register-box {
      width: 90%;
      max-width: 950px;
      background-color: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 35px;
      margin: 6% auto;
      text-align: center;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.15);
    }

    input, select {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background-color: rgba(255, 255, 255, 0.25);
      color: #fff;
      margin-top: 5px;
      transition: all 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: #b47cd1;
      box-shadow: 0 0 8px rgba(180, 124, 209, 0.6);
    }

    input::placeholder { color: rgba(255, 255, 255, 0.8); }

    /* 🔘 Botones */
    button {
      background-color: #b47cd1;
      border: 1px solid #ffffff55;
      padding: 10px 16px;
      border-radius: 8px;
      color: #fff;
      cursor: pointer;
      font-weight: 600;
      box-shadow: 0 0 10px rgba(180, 124, 209, 0.4);
      transition: all 0.3s ease;
    }

    button:hover {
      background-color: #9b5ac6;
      transform: scale(1.05);
      box-shadow: 0 0 12px rgba(180, 124, 209, 0.7);
    }

    button:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    #btn-validar {
      flex-shrink: 0;
      padding: 10px 15px;
      border-radius: 8px;
      border: 1px solid #fff4;
      background-color: #a866d8;
      font-weight: 600;
      transition: all 0.3s;
    }

    #btn-validar:hover {
      background-color: #9a55cc;
    }

    .btn-registrar {
      background-color: #7A3EB1;
      padding: 12px 35px;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: bold;
      margin-top: 10px;
      box-shadow: 0 0 12px rgba(122, 62, 177, 0.5);
    }

    .btn-registrar:hover {
      background-color: #8b53c2;
    }

    .link-login {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      color: #EAD7F5;
      text-decoration: none;
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <!-- 🎥 Video de fondo -->
  <video autoplay muted loop playsinline>
    <source src="<?= $base_url ?>/images/VideoMujer.mp4" type="video/mp4">
    Tu navegador no soporta videos en HTML5.
  </video>

  <!-- 📦 Caja principal -->
  <div class="register-box">
    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
      <img src="<?= $base_url ?>/images/corazonblanco.png" alt="Logo WARMI 360" style="width: 60px;">
      <h2 style="font-weight: 600; font-size: 1.5rem;">Registro de usuaria</h2>
    </div>
    <p style="color: #f1e9f9; font-size: 0.95rem;">Completa tus datos para crear tu cuenta segura 💜</p>

    <form id="registro-form">
      <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-top: 25px;">
        <!-- Columna izquierda -->
        <div style="width: 48%;">
          <div style="margin-bottom: 18px;">
            <label>DNI</label><br>
            <div style="display: flex; gap: 10px;">
              <input type="text" id="dni" maxlength="8" pattern="[0-9]{8}" required placeholder="Ingresa tu DNI">
              <button type="button" id="btn-validar">Validar</button>
            </div>
          </div>

          <div style="margin-bottom: 18px;">
            <label>Nombres</label><br>
            <input type="text" id="nombres" readonly placeholder="Se autocompletará">
          </div>

          <div style="margin-bottom: 18px;">
            <label>Apellidos</label><br>
            <input type="text" id="apellidos" readonly placeholder="Se autocompletará">
          </div>

          <div style="margin-bottom: 18px;">
            <label>Sexo</label><br>
            <select id="sexo" disabled>
              <option value="Femenino" selected>Femenino</option>
            </select>
          </div>
        </div>

        <!-- Columna derecha -->
        <div style="width: 48%;">
          <div style="margin-bottom: 18px;">
            <label>Correo electrónico</label><br>
            <input type="email" id="correo" required placeholder="ejemplo@email.com">
          </div>

          <div style="margin-bottom: 18px;">
            <label>Número de celular</label><br>
            <input type="tel" id="telefono" pattern="9[0-9]{8}" maxlength="9" required placeholder="987654321">
          </div>
        </div>
      </div>

      <!-- Botón inferior -->
      <div style="text-align: center; margin-top: 25px;">
        <a href="<?= $base_url ?>/?view=login" class="link-login">← Iniciar Sesión</a><br>
        <button type="submit" class="btn-registrar">Registrar</button>
      </div>
    </form>
  </div>

  <script src="<?= $base_url ?>/js/register.js"></script>
</body>
</html>
