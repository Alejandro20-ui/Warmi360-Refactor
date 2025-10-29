<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../../config/database.php';
$pdo = Database::connect();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 3) {
  header("Location: /Warmi360-Refactor/public/?view=login");
  exit;
}

$base_url = "http://localhost/Warmi360-Refactor/public";

// 📊 Datos del dashboard
$totalUsuarias = $pdo->query("SELECT COUNT(*) FROM usuarios WHERE id_role = 1")->fetchColumn();
$planesActivos = $pdo->query("SELECT COUNT(*) FROM citas WHERE id_estado = 4")->fetchColumn();
$ingresos = $pdo->query("SELECT IFNULL(SUM(total), 0) FROM pedidos WHERE MONTH(fecha)=MONTH(CURDATE())")->fetchColumn();
$nuevasUsuarias = $pdo->query("
  SELECT DATE(fecha_registro) AS fecha, COUNT(*) AS cantidad 
  FROM usuarios 
  WHERE id_role = 1 
  AND fecha_registro >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
  GROUP BY DATE(fecha_registro)
")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | WARMI 360</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #f3ecf9;
      color: #4C3558;
      font-family: 'Poppins', sans-serif;
    }
    .sidebar {
      background-color: white;
      border-radius: 1rem;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      padding: 1rem 1.2rem;
    }
    .tab-btn {
      display: flex; align-items: center; gap: .75rem;
      width: 100%; padding: .75rem 1rem; border-radius: .75rem;
      font-weight: 600; color: #6a5a7a; transition: all .3s;
    }
    .tab-btn:hover { background-color: #e9dff2; transform: translateX(5px); }
    .tab-btn.active {
      background: linear-gradient(90deg, #8d67b9, #6b4b9c);
      color: white; box-shadow: 0 3px 10px rgba(141,103,185,0.3);
    }
    .card {
      background: white; border-radius: 1rem;
      box-shadow: 0 6px 15px rgba(0,0,0,0.08);
      transition: transform .2s;
    }
    .card:hover { transform: translateY(-4px); }
    .btn-accent {
      background: linear-gradient(90deg, #8d67b9, #6b4b9c);
      color: white; font-weight: 600;
      box-shadow: 0 3px 8px rgba(141,103,185,0.4);
      transition: all .3s;
    }
    .btn-accent:hover { transform: scale(1.05); }
  </style>
</head>

<body class="min-h-screen flex flex-col">

<!-- 🔹 HEADER -->
<header class="bg-white shadow-md fixed w-full top-0 z-50">
  <nav class="flex justify-between items-center px-8 py-4">
    <div class="flex items-center gap-3">
      <img src="<?= $base_url ?>/images/warmi360.png" class="w-14 rounded-lg">
      <h1 class="text-2xl font-bold">WARMI 360 - Admin</h1>
    </div>
    <div class="flex items-center gap-4">
      <span><i class="fa-solid fa-user mr-1"></i> <?= htmlspecialchars($_SESSION['nombres']) ?></span>
      <a href="<?= $base_url ?>/?view=logout" class="text-red-500 font-semibold"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
    </div>
  </nav>
</header>

<!-- 🔹 CONTENIDO -->
<main class="flex flex-1 pt-24 px-6 gap-6">

  <!-- 🧭 SIDEBAR -->
  <aside class="w-64 sidebar flex flex-col space-y-3 h-[calc(100vh-8rem)] sticky top-24">
    <button data-tab="inicio" class="tab-btn active"><i class="fa-solid fa-house"></i> Inicio</button>
    <button data-tab="usuarias" class="tab-btn"><i class="fa-solid fa-users"></i> Usuarias</button>
    <button data-tab="productos" class="tab-btn"><i class="fa-solid fa-box"></i> Artículos (Tienda)</button>
    <button data-tab="planes" class="tab-btn"><i class="fa-solid fa-hand-holding-heart"></i> Planes</button>
    <button data-tab="biblioteca" class="tab-btn"><i class="fa-solid fa-book-open-reader"></i> Biblioteca</button>
    <button data-tab="eventos" class="tab-btn"><i class="fa-solid fa-calendar-days"></i> Eventos</button>
    <button data-tab="pedidos" class="tab-btn"><i class="fa-solid fa-store"></i> Pedidos</button>
  </aside>

  <!-- 🧩 CONTENIDO PRINCIPAL -->
  <section id="contenido" class="flex-1 space-y-6">

    <!-- 🔹 INICIO -->
    <div id="tab-inicio" class="tab-content space-y-8">
      <h2 class="text-3xl font-bold mb-4">Panel Administrativo</h2>

      <!-- Tarjetas principales -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="card p-6 text-center"><h3 class="text-sm text-gray-500">Usuarias</h3><p class="text-4xl font-bold text-[#8d67b9]"><?= $totalUsuarias ?></p></div>
        <div class="card p-6 text-center"><h3 class="text-sm text-gray-500">Planes Activos</h3><p class="text-4xl font-bold text-[#8d67b9]"><?= $planesActivos ?></p></div>
        <div class="card p-6 text-center"><h3 class="text-sm text-gray-500">Ingresos</h3><p class="text-4xl font-bold text-[#8d67b9]">S/<?= number_format($ingresos, 2) ?></p></div>
      </div>

      <!-- Acciones rápidas + gráfico -->
      <div class="grid lg:grid-cols-2 gap-6">
        <div class="card p-6">
          <h3 class="text-lg font-semibold mb-4">⚡ Acciones Rápidas</h3>
          <div class="space-y-3">
            <button id="btnNuevaUsuariaInicio" class="w-full flex items-center justify-center gap-2 py-2 bg-[#f1e6fa] rounded-lg hover:bg-[#e3d5f3] transition"><i class="fa-solid fa-user-plus text-[#8d67b9]"></i> Añadir Usuaria</button>
          </div>
        </div>

        <div class="card p-6">
          <h3 class="text-lg font-semibold mb-4">📈 Nuevas Usuarias (Últ. 7 Días)</h3>
          <canvas id="graficoUsuarias"></canvas>
        </div>
      </div>

      <!-- Alertas y actividad reciente -->
      <div class="grid lg:grid-cols-2 gap-6">
        <div class="card p-6">
          <h3 class="text-lg font-semibold mb-3"><i class="fa-solid fa-bell text-yellow-500"></i> Alertas de Admin</h3>
          <p><?= $totalUsuarias < 5 ? '⚠️ Poca actividad de registro esta semana.' : '✅ Actividad normal de usuarias.' ?></p>
        </div>
        <div class="card p-6">
          <h3 class="text-lg font-semibold mb-3"><i class="fa-solid fa-clock-rotate-left text-[#8d67b9]"></i> Actividad Reciente</h3>
          <?php
          $ultima = $pdo->query("SELECT nombres, correo FROM usuarios WHERE id_role=1 ORDER BY fecha_registro DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
          $ultimoPedido = $pdo->query("SELECT id_pedido, total FROM pedidos ORDER BY fecha DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
          ?>
          <p><b>Última usuaria:</b> <?= $ultima['nombres'] ?? 'N/A' ?> (<?= $ultima['correo'] ?? '' ?>)</p>
          <p><b>Último pedido:</b> <?= $ultimoPedido['id_pedido'] ?? 'N/A' ?> - S/<?= $ultimoPedido['total'] ?? 0 ?></p>
        </div>
      </div>
    </div>

    <!-- 👩 USUARIAS -->
    <div id="tab-usuarias" class="tab-content hidden">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Gestión de Usuarias</h2>
        <button id="btnNuevaUsuaria" class="btn-accent px-5 py-2 rounded-lg"><i class="fa-solid fa-user-plus mr-2"></i> Añadir Usuaria</button>
      </div>
      <div class="card overflow-hidden">
        <table class="min-w-full text-center">
          <thead class="bg-[#8d67b9] text-white">
            <tr><th class="px-4 py-2">Nombre</th><th>Correo</th><th>Teléfono</th><th>Estado</th></tr>
          </thead>
          <tbody>
            <?php
            $usuarias = $pdo->query("SELECT nombres, correo, telefono, id_estado FROM usuarios WHERE id_role=1")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($usuarias as $u): ?>
            <tr class="border-b hover:bg-gray-100">
              <td class="py-2"><?= htmlspecialchars($u['nombres']) ?></td>
              <td><?= htmlspecialchars($u['correo']) ?></td>
              <td><?= htmlspecialchars($u['telefono']) ?></td>
              <td><?= $u['id_estado'] == 1 ? 'Activo' : 'Inactivo' ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </section>
</main>

<!-- 🩷 MODAL NUEVA USUARIA -->
<div id="modalUsuaria" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50">
  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
    <h3 class="text-xl font-semibold mb-4">Registrar Nueva Usuaria</h3>
    <form id="formUsuaria" class="space-y-4">
      <input type="text" name="dni" placeholder="DNI" maxlength="8" required class="w-full border rounded-lg px-3 py-2">
      <input type="text" name="nombres" placeholder="Nombres" required class="w-full border rounded-lg px-3 py-2">
      <input type="text" name="apellidos" placeholder="Apellidos" required class="w-full border rounded-lg px-3 py-2">
      <input type="email" name="correo" placeholder="Correo" required class="w-full border rounded-lg px-3 py-2">
      <input type="tel" name="telefono" placeholder="Teléfono" required class="w-full border rounded-lg px-3 py-2">
      <select name="sexo" class="w-full border rounded-lg px-3 py-2">
        <option value="Femenino" selected>Femenino</option>
        <option value="Masculino">Masculino</option>
      </select>
      <div class="flex flex-col gap-2">
        <button type="submit" class="btn-accent w-full py-2 rounded-lg">Guardar</button>
        <button type="button" id="cerrarModal" class="w-full py-2 rounded-lg bg-gray-300">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<script>
// 📊 Gráfico (días de la semana)
const datos = <?= json_encode(array_values(array_column($nuevasUsuarias, 'cantidad'))) ?>;
const etiquetas = <?= json_encode(array_map(fn($d)=>strftime('%a', strtotime($d['fecha'])), $nuevasUsuarias)) ?>;
if (document.getElementById('graficoUsuarias')) {
  new Chart(document.getElementById('graficoUsuarias'), {
    type: 'bar',
    data: { labels: etiquetas, datasets: [{ label: 'Nuevas Usuarias', data: datos, backgroundColor: '#8d67b9' }] },
    options: { scales: { y: { beginAtZero: true } } }
  });
}

// Tabs
document.querySelectorAll(".tab-btn").forEach(btn=>{
  btn.addEventListener("click",()=>{
    document.querySelectorAll(".tab-btn").forEach(b=>b.classList.remove("active"));
    btn.classList.add("active");
    const tab=btn.getAttribute("data-tab");
    document.querySelectorAll(".tab-content").forEach(t=>t.classList.add("hidden"));
    document.getElementById("tab-"+tab).classList.remove("hidden");
  });
});

// Modal
const modal=document.getElementById("modalUsuaria");
const openBtns=["btnNuevaUsuaria","btnNuevaUsuariaInicio"];
openBtns.forEach(id=>{
  const el=document.getElementById(id);
  if(el){el.addEventListener("click",()=>modal.classList.remove("hidden"));}
});
document.getElementById("cerrarModal").addEventListener("click",()=>modal.classList.add("hidden"));

// Guardar usuaria
document.getElementById("formUsuaria").addEventListener("submit",async(e)=>{
  e.preventDefault();
  const formData=new FormData(e.target);
  try{
    const res=await fetch("<?= $base_url ?>/?view=registrar",{method:"POST",body:formData});
    const data=await res.json();
    if(data.success){
      Swal.fire("✅ Éxito",data.message,"success");
      modal.classList.add("hidden");
      setTimeout(()=>location.reload(),1500);
    }else{
      Swal.fire("⚠️ Error",data.message,"warning");
    }
  }catch(err){
    Swal.fire("❌ Error","No se pudo registrar la usuaria.","error");
  }
});
</script>
</body>
</html>
