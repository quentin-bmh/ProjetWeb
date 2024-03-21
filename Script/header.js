function verifierCheckbox() {
  var checkbox = document.getElementById("checkbox");
  var menuAccueil = document.getElementById("menuAccueil");

  if (checkbox.checked) {
      menuAccueil.classList.add("transitioned");
  } else {
      menuAccueil.classList.remove("transitioned");
  }
}


let isChecked = false;

    function toggleChecked() {
      const listeContact = document.getElementById('listeCo');
      const logoContact = document.getElementById('contact');
      
      if (isChecked) {
        console.log("imageDéCliquée");
        listeContact.classList.add("hidden");
        logoContact.classList.remove("phone");
        //logoContact.classList.add("animationTremblement");

      } else {
        console.log("imageCliquée");
        listeContact.classList.remove("hidden");
        //logoContact.classList.remove("animationTremblement");
        logoContact.classList.add("phone");

      }
      isChecked = !isChecked;
    }

    function toggleSection(){
      var creationSection = document.getElementById('Login');
      var connexionSection = document.getElementById('SignUp');
      creationSection.classList.toggle('hidden');
      connexionSection.classList.toggle('hidden');
  }

  var profilClique = false;

    function showProfil() {
        var form = document.getElementById('profil');
        profilClique = !profilClique;
        if (profilClique) {
            form .classList.toggle("hidden");
            console.log('profil cliqué');
        } else {
            form.classList.toggle("hidden");
            console.log('profil pas cliqué');
        }
    }
