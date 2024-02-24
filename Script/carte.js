window.onload = function(){
    var menu = document.getElementById("menu");
    var carte = document.getElementById("carte");

    var sections = menu.getElementsByClassName("section");
    var sectionsCarte = Array.from(carte.getElementsByClassName("section"));
    var scroll = 0;
    var gap = 0;
    var centre = 1;


    menu.onmouseout = function(){
        menu.style.gridTemplateColumns = "1fr 1fr 1fr";
    }
    sections[0].onmouseover = function(){
        menu.style.gridTemplateColumns = "1.5fr 1fr 1fr";
    }
    sections[1].onmouseover = function(){
        menu.style.gridTemplateColumns = "1fr 1.5fr 1fr";
    }
    sections[2].onmouseover = function(){
        menu.style.gridTemplateColumns = "1fr 1fr 1.5fr";
    }
    function moveSlides(){
        gap = 0;
        for(let i = 0 ; i < sectionsCarte.length ; i++){
            sectionsCarte[i].style.left = (scroll + gap) + "px";
            gap += sectionsCarte[i].clientWidth;
        }
    }
    menu.onclick = function(){
        menu.style.display = "none";
        carte.style.display = "block";
        for(let i = centre-1 ; i >= 0 ; i--){
            scroll -= sectionsCarte[i].clientWidth;
        }
        moveSlides();
    }
    carte.onwheel = function(event){
        scroll += event.deltaY;
        moveSlides()
        if(parseFloat(sectionsCarte[centre].style.left) > window.innerWidth/2){
            let last = sectionsCarte.pop();
            sectionsCarte.unshift(last);
            scroll -= last.clientWidth;
        }
        if(parseFloat(sectionsCarte[centre].style.left) + sectionsCarte[centre].clientWidth < window.innerWidth/2){
            let first = sectionsCarte.shift();
            sectionsCarte.push(first);
            scroll += first.clientWidth;
        }
    }
}