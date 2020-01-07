

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

rutas = [
  {
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [
        9.8567, -83.9240
      ]
    },
    "properties": {
      "name": "Yokohama"
    }
  },
  {
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [
        9.8585, -83.9162
      ]
    },
    "properties": {
      "name": "Basho"
    }
  },
  {
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [
        9.8617, -83.9172
      ]
    },
    "properties": {
      "name": "Sunken"
    }
  }
]

var listaRutas = [];

rutas.forEach(ruta => {
  var [x, y] = ruta.geometry.coordinates;
  listaRutas.push([x, y]);
  var nombre = ruta.properties.name;
  var marker = L.marker([x, y]).bindPopup(`<b>${nombre}</b>`).addTo(mymap);
});

var polygon = L.polygon(listaRutas).addTo(mymap);

console.log(rutas);