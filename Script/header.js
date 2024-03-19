function verifierCheckbox() {
    var checkbox = document.getElementById("checkbox");
    var menuAccueil = document.getElementById("menuAccueil");

    if (checkbox.checked) {
        menuAccueil.classList.add("transitioned");
        document.addEventListener("click", fermerMenuEnDehors);
    } else {
        menuAccueil.classList.remove("transitioned");
        document.removeEventListener("click", fermerMenuEnDehors);
    }
}

function fermerMenuEnDehors(event) {
    var menuAccueil = document.getElementById("menuAccueil");
    var checkbox = document.getElementById("checkbox");
    if (!menuAccueil.contains(event.target) && event.target !== checkbox) {
        checkbox.checked = false;
        menuAccueil.classList.remove("transitioned");
        document.removeEventListener("click", fermerMenuEnDehors);
    }
}



let isChecked = false;

    function toggleChecked() {
      const listeContact = document.getElementById('listeCo');
      const logoContact = document.getElementById('img');
      
      if (isChecked) {
        console.log("imageDéCliquée");
        listeContact.classList.add("hidden");
        logoContact.classList.remove("animationTremblement");

      } else {
        console.log("imageCliquée");
        listeContact.classList.remove("hidden");
        logoContact.classList.add("animationTremblement");

      }
      isChecked = !isChecked;
    }

    function toggleSection(){
      var creationSection = document.getElementById('Login');
      var connexionSection = document.getElementById('SignUp');
      creationSection.classList.toggle('hidden');
      connexionSection.classList.toggle('hidden');
  }

  function showConnection() {
    var form = document.getElementById('form');
    if (form.hasAttribute('hidden')) {
        form.removeAttribute('hidden');
        console.log("Form shown");
    } else {
        form.setAttribute('hidden', true);
        console.log("Form hidden");
    }
}