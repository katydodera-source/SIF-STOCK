const express = require("express");
const path = require("path");
const app = express();

// Puerto de Render
const PORT = process.env.PORT || 3000;

// Carpeta de archivos estáticos
app.use(express.static(path.join(__dirname, "public")));

// Rutas
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "index.html"));
});

// Iniciar servidor
app.listen(PORT, () => {
  console.log(`Servidor corriendo en puerto ${PORT}`);
});
