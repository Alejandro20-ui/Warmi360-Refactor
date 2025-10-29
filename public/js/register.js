const base_url = "http://localhost/Warmi360-Refactor/public";

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registro-form");
  const btnValidar = document.getElementById("btn-validar");
  const dniInput = document.getElementById("dni");

  // ✅ VALIDAR DNI (con texto "Validando...")
  btnValidar.addEventListener("click", async () => {
    const dni = dniInput.value.trim();
    if (dni.length !== 8) {
      alert("⚠️ Ingresa un DNI válido (8 dígitos)");
      return;
    }

    btnValidar.disabled = true;
    const originalText = btnValidar.textContent;
    btnValidar.textContent = "Validando...";

    try {
      const res = await fetch(`${base_url}/?view=validar-dni`, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `dni=${dni}`
      });

      const data = await res.json();

      if (data.success && data.data) {
        document.getElementById("nombres").value = data.data.nombres;
        document.getElementById("apellidos").value =
          `${data.data.apellido_paterno} ${data.data.apellido_materno}`;
        alert("✅ DNI validado correctamente");
      } else {
        alert("❌ No se pudo validar el DNI. Verifica el número.");
      }
    } catch (err) {
      console.error(err);
      alert("🚨 Error al conectar con el servidor o API.");
    } finally {
      btnValidar.disabled = false;
      btnValidar.textContent = originalText;
    }
  });

  // ✅ REGISTRAR USUARIA
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append("dni", document.getElementById("dni").value.trim());
    formData.append("nombres", document.getElementById("nombres").value.trim());
    formData.append("apellidos", document.getElementById("apellidos").value.trim());
    formData.append("correo", document.getElementById("correo").value.trim());
    formData.append("telefono", document.getElementById("telefono").value.trim());
    formData.append("sexo", document.getElementById("sexo").value.trim());

    try {
      const res = await fetch(`${base_url}/?view=registrar`, {
        method: "POST",
        body: formData
      });

      const data = await res.json();

      if (data.success) {
        alert(`${data.message}`); // mostrará también el PIN generado
        form.reset();
      } else {
        alert("❌ " + data.message);
      }
    } catch (err) {
      console.error(err);
      alert("🚨 Error al conectar con el servidor.");
    }
  });
});
