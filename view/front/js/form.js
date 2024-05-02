function validerforum() {
    // Get the form elements
    var id_forum = document.getElementById('id_forum');
    var titre = document.getElementById('titre');
    var description = document.getElementById('description');
    var date = document.getElementById('date');
    var categorie = document.getElementById('categorie');
    var etat = document.getElementById('etat');

    // Validate the form fields
    if (id_forum.value == '') {
        document.getElementById('erreurid_forum').innerText = 'Le champ id_forum est obligatoire';
        id_forum.style.border = '2px solid red';
        return false;
    } else {
        document.getElementById('erreurid_forum').innerText = '';
        id_forum.style.border = '2px solid green';
    }

    if (titre.value.length > 20) {
        document.getElementById('erreurtitre').innerText = 'Le champ titre doit être une chaîne de caractères de 20 caractères maximum';
        titre.style.border = '2px solid red';
        return false;
    } else if (titre.value == '') {
        document.getElementById('erreurtitre').innerText = 'Le champ titre est obligatoire';
        titre.style.border = '2px solid red';
        return false;
    } else {
        document.getElementById('erreurtitre').innerText = '';
        titre.style.border = '2px solid green';
    }

    if (description.value.length > 20) {
        document.getElementById('erreurdescription').innerText = 'La description doit être une chaîne de caractères de 20 caractères maximum';
        description.style.border = '2px solid red';
        return false;
    } else if (description.value == '') {
        document.getElementById('erreurdescription').innerText = 'Le champ description est obligatoire';
        description.style.border = '2px solid red';
        return false;
    } else {
        document.getElementById('erreurdescription').innerText = '';
        description.style.border = '2px solid green';
    }

    if (date.value < new Date().toISOString().split('T')[0]) {
        document.getElementById('erreurdate').innerText = 'La date doit être supérieure ou égale à la date du jour';
        date.style.border = '2px solid red';
        return false;
    } else {
        document.getElementById('erreurdate').innerText = '';
        date.style.border = '2px solid green';
    }

    if (categorie.value.length > 20) {
        document.getElementById('erreurcategorie').innerText = 'La catégorie doit être une chaîne de caractères de 20 caractères maximum';
        categorie.style.border = '2px solid red';
        return false;
    } else if (categorie.value == '') {
        document.getElementById('erreurcategorie').innerText = 'Le champ catégorie est obligatoire';
        categorie.style.border = '2px solid red';
        return false;
    } else {
        document.getElementById('erreurcategorie').innerText = '';
        categorie.style.border = '2px solid green';
    }

    if (etat.value == '') {
        document.getElementById('erreuretat').innerText = 'Le champ état est obligatoire';
        etat.style.border = '2px solid red';
        return false;
    } else {
        document.getElementById('erreuretat').innerText = '';
        etat.style.border = '2px solid green';
    }

    // If all fields are valid, submit the form
    return true;
}