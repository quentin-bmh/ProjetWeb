window.onload = function(){
    var menu = document.getElementById("menu");
    var carte = document.getElementById("carte");

    var sections = menu.getElementsByClassName("section");
    var sectionsCarte = Array.from(carte.getElementsByClassName("section"));
    var scroll = 0;
    var gap = 0;
    var centre = 1

    function isPortrait() {
        return window.matchMedia("(orientation: portrait)").matches;
    }

    var test = document.getElementById("test");
    window.onresize = function(){
        if(isPortrait()){
            menu.style.gridTemplateColumns = "1fr";
            menu.style.gridTemplateRows = "1fr 1fr 1fr";
        }else{
            menu.style.gridTemplateColumns = "1fr 1fr 1fr";
            menu.style.gridTemplateRows = "1fr";
        }
    }
    menu.onmouseout = function(){
        if(isPortrait()){
            menu.style.gridTemplateColumns = "1fr";
            menu.style.gridTemplateRows = "1fr 1fr 1fr";
        }else{
            menu.style.gridTemplateColumns = "1fr 1fr 1fr";
            menu.style.gridTemplateRows = "1fr";
        }
    }
    for(let i = 0 ; i < sections.length ; i++){
        sections[i].onmouseover = function(){
            let str = "";
            for(let j = 0 ; j < sections.length ; j++){
                if(j != i){
                    str+="1fr ";
                }else{
                    str+="1.5fr ";
                }
            }
            if(isPortrait()){
                menu.style.gridTemplateColumns = "1fr";
                menu.style.gridTemplateRows = str;
            }else{
                menu.style.gridTemplateColumns = str;
                menu.style.gridTemplateRows = "1fr";
            }
        }
    }
    /*
    sections[0].onmouseover = function(){
        if(isPortrait()){
            menu.style.gridTemplateColumns = "1fr";
            menu.style.gridTemplateRows = "1.5fr 1fr 1fr";
        }else{
            menu.style.gridTemplateColumns = "1.5fr 1fr 1fr";
            menu.style.gridTemplateRows = "1fr";
        }
    }
    sections[1].onmouseover = function(){
        if(isPortrait()){
            menu.style.gridTemplateColumns = "1fr";
            menu.style.gridTemplateRows = "1fr 1.5fr 1fr";
        }else{
            menu.style.gridTemplateColumns = "1fr 1.5fr 1fr";
            menu.style.gridTemplateRows = "1fr";
        }
    }
    sections[2].onmouseover = function(){
        if(isPortrait()){
            menu.style.gridTemplateColumns = "1fr";
            menu.style.gridTemplateRows = "1fr 1fr 1.5fr";
        }else{
            menu.style.gridTemplateColumns = "1fr 1fr 1.5fr";
            menu.style.gridTemplateRows = "1fr";
        }
    }
    */
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
    
    /*
    var contenus = carte.getElementsByClassName("contenu");
    for(let contenu of contenus){
        let items = contenu.getElementsByClassName("item");
        contenu.style.width = items.length*500+"px";
        contenu.onmouseout = function(){
            let str = "";
            for(let i = 0 ; i < items.length ; i++){
                str+="1fr ";
            }
            contenu.style.gridTemplateColumns = str;
        }
        for(let i = 0 ; i < items.length ; i++){
            items[i].onmouseover = function(){
                let str = "";
                for(let j = 0 ; j < items.length ; j++){
                    if(j != i){
                        str+="1fr ";
                    }else{
                        str+="2fr ";
                    }
                }
                contenu.style.gridTemplateColumns = str;
                /*
                if(isPortrait()){
                    menu.style.gridTemplateColumns = "1fr";
                    menu.style.gridTemplateRows = str;
                }else{
                    menu.style.gridTemplateColumns = str;
                    menu.style.gridTemplateRows = "1fr";
                }
                
            }
        }
    }
    */
    function toggleContainers() {
        var containerMenu = document.querySelector('.containermenu');
        var container = document.querySelector('.container');

        containerMenu.style.display = 'none';
        container.style.display = 'block';
    }
}