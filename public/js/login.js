// ✅ Dirección base del proyecto
const base_url = "http://localhost/Warmi360-Refactor/public";

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");

  if (!form) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch(`${base_url}/?view=procesar-login`, {
        method: "POST",
        body: formData,
      });

      // 🔹 Si la respuesta no es JSON válida
      if (!response.ok) {
        console.error("❌ Error HTTP:", response.status);
        alert("Error al conectar con el servidor.");
        return;
      }

      const data = await response.json();

      // 🔹 Mostrar mensaje de respuesta
      console.log("Respuesta del servidor:", data);

      if (data.success) {
        alert(data.message);

        // 🔹 Redirección controlada por JavaScript
        console.log("🔀 Redirigiendo a:", data.redirect);
        window.location.href = data.redirect;
      } else {
        alert(data.message);
      }
    } catch (err) {
      console.error("❌ Error al iniciar sesión:", err);
      alert("Error al conectar con el servidor.");
    }
  });
});
