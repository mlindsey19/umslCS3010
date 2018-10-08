

var slider = document.getElementById("myRange");
var output = document.getElementById("myRange");
output.innerHTML = slider.value;

slider.oninput = function() {
    output.innerHTML = this.value;
}


function clickCounter() {
    if(typeof(Storage) !== "undefined") {
        sessionStorage.slideValue = Number(slider.value);
        location.reload();
    }
    else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
    }
}

topColorfullRange = sessionStorage.slideValue ? sessionStorage.slideValue : 14;

if ( topColorfullRange > 14 ){
    topColorfullRange = ( ( topColorfullRange - 14 ) * 100 ) + Number(topColorfullRange);
    console.log(topColorfullRange)
}



var t = 1;
var radius = 50;
var squareSize = 6.5;
var prec = 19.55;
var fuzzy = 0.001;
var inc = (Math.PI-fuzzy)/prec;
var discoBall = document.getElementById("discoBall");

for(var t=fuzzy; t<Math.PI; t+=inc) {
    var z = radius * Math.cos(t);
    var currentRadius = Math.abs((radius * Math.cos(0) * Math.sin(t)) - (radius * Math.cos(Math.PI) * Math.sin(t))) / 2.5;
    var circumference = Math.abs(2 * Math.PI * currentRadius);
    var squaresThatFit = Math.floor(circumference / squareSize);
    var angleInc = (Math.PI*2-fuzzy) / squaresThatFit;
    for(var i=angleInc/2+fuzzy; i<(Math.PI*2); i+=angleInc) {
        var square = document.createElement("div");
        var squareTile = document.createElement("div");
        squareTile.style.width = squareSize + "px";
        squareTile.style.height = squareSize + "px";
        squareTile.style.transformOrigin = "0 0 0";
        squareTile.style.webkitTransformOrigin = "0 0 0";
        squareTile.style.webkitTransform = "rotate(" + i + "rad) rotateY(" + t + "rad)";
        squareTile.style.transform = "rotate(" + i + "rad) rotateY(" + t + "rad)";
        var randomColorInt = randomNumber(0,topColorfullRange);
        if((t > 1.3 && t < 1.9) || (t < -1.3 && t > -1.9)) {
            if ( randomColorInt < 6 ){
                squareTile.style.backgroundColor = randomColor(randomColorInt);
            } else {
                squareTile.style.backgroundColor = randomColor("bright");
            }
        }
        else {
            if ( randomColorInt < 6 ){
                squareTile.style.backgroundColor = randomColor(randomColorInt);
            } else {
                squareTile.style.backgroundColor = randomColor("any");
            }
        }
        square.appendChild(squareTile);
        square.className = "square";
        squareTile.style.webkitAnimation = "reflect 2s linear infinite";
        squareTile.style.webkitAnimationDelay = String(randomNumber(0,20)/10) + "s";
        squareTile.style.animation = "reflect 2s linear infinite";
        squareTile.style.animationDelay = String(randomNumber(0,20)/10) + "s";
        squareTile.style.backfaceVisibility = "hidden";
        var x = radius * Math.cos(i) * Math.sin(t);
        var y = radius * Math.sin(i) * Math.sin(t);
        square.style.webkitTransform = "translateX(" + Math.ceil(x) + "px) translateY(" + y + "px) translateZ(" + z + "px)";
        square.style.transform = "translateX(" + x + "px) translateY(" + y + "px) translateZ(" + z + "px)";
        discoBall.appendChild(square);
    }
}

function randomColor(type) {
    var  r, g, b;
    if(type == "bright") {
        r = g = b = randomNumber(130, 255);
    }
    else if (type == 0){ //green
        r = randomNumber(50, 130);
        g = randomNumber(200, 280);
        b = 0;
    }
    else if(type == 1){ //blue
        r = randomNumber(30, 50);
        g = randomNumber(200, 280);
        b = randomNumber(200, 250);
    }
    else if(type == 2){ //purple
        r = randomNumber(170, 222);
        g = randomNumber(0, 20);
        b = randomNumber(200, 222);
    }
    else if(type == 3){ //yellow
        r = randomNumber(222, 255);
        g = randomNumber(222, 255);
        b = randomNumber(20, 50);
    }
    else if(type == 4){//orange
        r = randomNumber(220, 250);
        g = randomNumber(50, 90);
        b = randomNumber(20, 40);
    }
    else if(type == 5){//red
        r = randomNumber(170, 222);
        g = randomNumber(0, 22);
        b = randomNumber(50, 85);
    }
    else {
        r = g = b = randomNumber(110, 190);
    }
    return "rgb(" + r + "," + g + "," + b + ")";
}

function randomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


