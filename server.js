const express = require('express');
const app = express();
const PORT = process.env.PORT || 3000;

app.get('/', (req, res) => {
  res.send('¡SIF-STOCK funcionando!');
});

app.listen(PORT, () => console.log(`Servidor en puerto ${PORT}`));
