

var mymap = L.map('mapa').setView([9.8582215, -83.9211454], 16);
// var mymap = L.map('mapa').fitWorld();
// mymap.setZoom(15);
// mymap.locate({ setView: true, maxZoom: 18 });
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 18,
  id: 'mapbox/streets-v11',
  accessToken: 'pk.eyJ1IjoiYnJ5YW5icmVuZXMyMDE5IiwiYSI6ImNrNTQyNjhmdDA5OTUzZHFoNWpubXo0NGMifQ.85NahMDmJOucBOEiHTPbmg'
}).addTo(mymap);

var rutas = [];
loadJSON(function (response) {
  rutas = JSON.parse(response);
});
var listaRutas = [];

var IconoMarcador = L.Icon.extend({
  options: {
    iconSize: [50, 50],
    shadowSize: [50, 64],
    iconAnchor: [22, 50],
    shadowAnchor: [4, 62],
    popupAnchor: [-3, -76]
  }
});
var icono = new IconoMarcador({ iconUrl: '/img/locationicon.png' });

rutas.forEach(ruta => {
  var [x, y] = ruta.geometry.coordinates;
  listaRutas.push([x, y]);
  var nombre = ruta.properties.name;
  var marker = L.marker([x, y], { icon: icono }).bindPopup(`<b>${nombre}</b>`).addTo(mymap);
});

var polygon = L.polygon(listaRutas).addTo(mymap);

var rutaLatLng = [];
listaRutas.forEach(ruta => {
  rutaLatLng.push(L.latLng(ruta[0], ruta[1]));
})

L.Routing.control({ waypoints: rutaLatLng }).addTo(mymap);

function loadJSON(callback) {

  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', '../mapas/rutas/ruta.json', false); // Replace 'my_data' with the path to your file
  xobj.onreadystatechange = function () {
    if (xobj.readyState == 4 && xobj.status == "200") {
      // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
      callback(xobj.responseText);
    }
  };
  xobj.send(null);
}