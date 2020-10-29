// Este archivo se crea para contener la información del
// mapa importado de leaflet sin afectar a los archivos plug-in
// ni al main.js

var map = L.map('mapa').setView([40.409126, -3.692291], 16);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([40.409126, -3.692291]).addTo(map)
    .bindPopup('Conferencia de Desarrollo Web')
    .openPopup();