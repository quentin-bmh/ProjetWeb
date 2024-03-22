function verifierCheckbox() {
  var checkbox = document.getElementById("checkbox");
  var menuAccueil = document.getElementById("menuAccueil");

  if (checkbox.checked) {
      menuAccueil.classList.add("transitioned");
  } else {
      menuAccueil.classList.remove("transitioned");
  }
}

function toggleSection(){
  var creationSection = document.getElementById('Login');
  var connexionSection = document.getElementById('SignUp');
  creationSection.classList.toggle('hidden');
  connexionSection.classList.toggle('hidden');
}

function showProfil() {
  var profilDiv = document.getElementById('profil');
  var signUp = document.getElementById('SignUp');
  var from = document.getElementById('form');
  if(!signUp.classList.contains('hidden')){
    toggleSection();
  }
  profilDiv.classList.toggle("hidden");
  from.classList.toggle("hidden");
  
  //signUp.classList.toggle("hidden");
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


  
