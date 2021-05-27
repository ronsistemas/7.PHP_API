(()=>{
   'use strict';
   document.addEventListener('DOMContentLoaded',()=>{
      //
      (function location() {
         if(document.getElementById('place') != null) {
            let description = document.getElementById('place').textContent;
            if(description == '') description = 'Paris';
            document.getElementsByName("location")[0].value = description;
         }
      })();

      //
      if(document.getElementById("divMap") != null) {
         //Estableciendo opción de select al elemento que se muestra
         if(document.getElementById('place')) {   
         //Mapa
         //let divMapa = document.getElementById("divMapa");
         //Obteniendo coordenadas de localización seleccionada
         let latitude = document.getElementsByTagName('td')[1].textContent;
         let longitude = document.getElementsByTagName('td')[2].textContent;
         let description = document.getElementById('place').textContent;
         //Seleccionando icono según localización
         let imgIcono = 'icons/' + description + '.svg';
         //Cambiando estilo de mapa para mostrarlo
         document.getElementById('divMap').style.display = 'block';
         //Código Leaflet para mostrar mapa
         var map = L.map('divMap').setView([latitude, longitude], 5); 
          var icono = L.icon({
            iconUrl: imgIcono,
            iconSize: [35, 35],
            iconAnchor: [22, 25],
            className: 'icono'
         }); 
         
         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
               attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
               maxZoom: 18
         }).addTo(map);

          //Añadiendo icono de localización y otros indicadores
        L.marker([latitude, longitude], { icon: icono }).addTo(map)
/*        .bindPopup(description) 
         .openPopup()
         .bindTooltip('Un tooltip')
         .openTooltip(); */
      }
      } 

   });
})();