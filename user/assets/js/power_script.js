TweenMax.set("#ring1, #ring2,\
    #ring2 .c4, #ring2 .c5, #ring2 .c6, #ring2 .c7,\
    #ring2-1, #ring3,\
    #ring3-1, #ring3 .c4,\
    #ring4, #ring4 .c1, #ring4 .c2,\
    #ring4 .c3, #ring4 .c4", { transformOrigin: "50% 50%" })

function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

TweenMax.set("#ring1 .c1", {drawSVG: "0% 25%"})
TweenMax.set("#ring1 .c2", {drawSVG: "50% 75%"})

TweenMax.set("#ring2 .c4", {drawSVG: "0% 0%"})
TweenMax.set("#ring2 .c5", {drawSVG: "0% 0%"})
TweenMax.set("#ring2 .c6", {drawSVG: "0% 0%"})
TweenMax.set("#ring2 .c7", {drawSVG: "0% 0%"})

TweenMax.set("#ring3 .c1", {drawSVG: "0% 25%"})
TweenMax.set("#ring3 .c2", {drawSVG: "50% 75%"})
TweenMax.set("#ring3 .c4", {drawSVG: "60%"})

TweenMax.set("#ring4 .c1", {drawSVG: "60%", rotation: 120})
TweenMax.set("#ring4 .c2", {drawSVG: "60%", rotation: 40})
TweenMax.set("#ring4 .c3", {drawSVG: "60%", rotation: 180})

var u = 0.75

TweenMax.to("#ring1", 60*u, {rotation: -360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring2-1", 120*u, {rotation: 360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring2 .c4", 10*u, {rotation: 360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring2 .c5", 10*u, {rotation: 360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring2 .c6", 10*u, {rotation: 360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring2 .c7", 10*u, {rotation: 360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring3-1", 30*u, {rotation: 360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring3 .c4", 10*u, {rotation: -360, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring4 .c1", 5*u, {rotation: 360 + 120, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring4 .c2", 10*u, {rotation: -360 + 40, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring4 .c3", 2*u, {rotation: 360 + 180, repeat: -1, ease: Linear.easeNone})
TweenMax.to("#ring4 .c4", 2*u, {scale: 1.15, yoyo: true, repeat: -1, ease: Power2.easeInOut})

var timeout
document.body.addEventListener("mousemove", move)
document.body.addEventListener("touchmove", move)

function move(e) {
  e.preventDefault()
  clearTimeout(timeout)
  TweenMax.to("#move-text", 1, { opacity: 0 })
  var px = e.clientX
  var py = e.clientY
  if (e.touches) {
    px = e.touches[0].clientX
    py = e.touches[0].clientY
  }
  var w = window.innerWidth / 2
  var h = window.innerHeight / 2
  var nx = (px - w) / w
  var ny = (py - h) / h

  var tx = nx * 150
  var ty = ny * 60

  animCircles(tx, ty)  
  timeout = setTimeout(function() {
    animCircles(0,0)
  }, 2000)
}

function animCircles(tx, ty) {
  var tl = new TimelineMax()
  var rf = [1,0.5,0.25,0.125]
  for (var i = 1; i < 5; i++) {
    tl.to("#ring" + i, 2.5, {x: tx * rf[i], y: ty * rf[i - 1]}, "a")
  }
}

var diskTotal = 423
var diskMax = 2048
var energyMax = 50
var bandwidthMax = 32
var timeMax = 2400

function updateData() {
  var time = new Date()
  var timeValue = pad(time.getHours() * 100 + time.getMinutes(),4)
  var tp = timeValue/timeMax*100
  document.getElementById("time-text").textContent = timeValue + "HRS"
  TweenMax.to("#ring2 .c4", 0.5, { drawSVG: "0% "+ tp +"%" })
  
  var energy = Math.floor(Math.random()*30 + 10)
  var ep = energy/energyMax*100
  document.getElementById("energy-text").textContent = energy + "W"
  TweenMax.to("#ring2 .c5", 0.5, { drawSVG: "0% "+ ep +"%" })
  
  var bandwidth = Math.floor(Math.random()*20 + 5)
  var dp = bandwidth/bandwidthMax*100
  document.getElementById("bandwidth-text").textContent = bandwidth + "Mbps"
  TweenMax.to("#ring2 .c6", 0.5, { drawSVG: "0% "+ dp +"%" })
  
  diskTotal = Math.floor(diskTotal*10 + 1) / 10
  diskTotal = diskTotal > diskMax ? 423 : diskTotal
  var dip = diskTotal/diskMax*100
  document.getElementById("disk-text").textContent = diskTotal + "GB"
  TweenMax.to("#ring2 .c7", 0.5, { drawSVG: "0% "+ dip +"%" })
  
  setTimeout(updateData, 2000)
}
updateData()