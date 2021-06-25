var miRuleta = new Winwheel({
  numSegments: 16,
  outerRadius: 170,
  segments: [
    { fillStyle: "#304ffe", text: "Envío gratis" },
    { fillStyle: "#3949ab", text: "Desc 10%" },
    { fillStyle: "#00bcd4", text: "Bon $50" },
    { fillStyle: "#FFFF", text: "Nada" },
    { fillStyle: "#304ffe", text: "Envío gratis" },
    { fillStyle: "#3949ab", text: "Desc 10%" },
    { fillStyle: "#00bcd4", text: "Bon $50" },
    { fillStyle: "#FFFF", text: "Nada" },
    { fillStyle: "#304ffe", text: "Envío gratis" },
    { fillStyle: "#3949ab", text: "Desc 10%" },
    { fillStyle: "#00bcd4", text: "Bon $50" },
    { fillStyle: "#FFFF", text: "Nada" },
    { fillStyle: "#304ffe", text: "Envío gratis" },
    { fillStyle: "#3949ab", text: "Desc 10%" },
    { fillStyle: "#00bcd4", text: "Bon $50" },
    { fillStyle: "#FFFF", text: "Nada" },
    { fillStyle: "#304ffe", text: "Envío gratis" },
    { fillStyle: "#3949ab", text: "Desc 10%" },
    { fillStyle: "#00bcd4", text: "Bon $50" },
    { fillStyle: "#FFFF", text: "Nada" },
  ],
  animation: {
    type: "spinToStop",
    duration: 5,
    callbackFinished: "mensaje()",
    callbackAfter: "dibujarIndicador()"
  }
});

dibujarIndicador();

function mensaje() {
  var SegmentoSeleccionado = miRuleta.getIndicatedSegment();
  alert("Elemento seleccionado: " + SegmentoSeleccionado.text);



  document.getElementById('txt_premio').value = SegmentoSeleccionado.text;

  miRuleta.stopAnimation(false);
  miRuleta.rotationAngle = 0;
  miRuleta.draw();
  dibujarIndicador();
}



function dibujarIndicador() {
  var ctx = miRuleta.ctx;
  ctx.strokeStyle = "navy";
  ctx.fillStyle = "black";
  ctx.lineWidth = 2;
  ctx.beginPath();
  ctx.moveTo(170, 10);
  ctx.lineTo(230, 10);
  ctx.lineTo(200, 70);
  ctx.lineTo(170, 10);
  ctx.stroke();
  ctx.fill();
}
