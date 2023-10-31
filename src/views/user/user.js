document.getElementById("filtro1").addEventListener("change", function() {
  var seleccion = this.value;

  var tarjetas = document.querySelectorAll("#contenidoopcion1, #contenidoopcion2, #contenidoopcion3,#contenidoopcion4");
  tarjetas.forEach(function(tarjeta) {
      tarjeta.style.display = "none";
  });

  document.getElementById("contenido" + seleccion).style.display = "block";
});