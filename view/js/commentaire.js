 
 function validercommentaire() {
 // Get the form elements
 var id_commentaire = document.getElementById('id_commentaire');
 var auteur = document.getElementById('auteur');
 var contenu = document.getElementById('contenu');
 var date_creation = document.getElementById('date_creation');


 if (/[^a-zA-Z0-9]/.test(auteur.value)) {
     document.getElementById('erreurauteur').innerText = 'Le champ auteur ne doit contenir que des lettres et des chiffres';
     auteur.style.border = '2px solid red';
     return false;
 } else if (auteur.value.length > 20) {
     document.getElementById('erreurauteur').innerText = 'Le champ auteur doit être une chaîne de caractères de 20 caractères maximum';
     auteur.style.border = '2px solid red';
     return false;
 } else if (auteur.value.trim() === '') {
     document.getElementById('erreurauteur').innerText = 'Le champ auteur est obligatoire';
     auteur.style.border = '2px solid red';
     return false;

 } else {
     document.getElementById('erreurauteur').innerText = '';
     auteur.style.border = '2px solid green';
 }

 if (/[^a-zA-Z0-9]/.test(contenu.value)) {
     document.getElementById('erreurcontenu').innerText = 'Le contenu ne doit contenir que des lettres et des chiffres';
     contenu.style.border = '2px solid red';
     return false;
 } else if (contenu.value.length > 20) {
     document.getElementById('erreurcontenu').innerText = 'Le contenu doit être une chaîne de caractères de 20 caractères maximum';
     contenu.style.border = '2px solid red';
     return false;
 } else if (contenu.value.trim() === '') {
     document.getElementById('erreurcontenu').innerText = 'Le champ contenu est obligatoire';
     contenu.style.border = '2px solid red';
     return false;

 } else {
     document.getElementById('erreurcontenu').innerText = '';
     contenu.style.border = '2px solid green';
 }


 return true;
}