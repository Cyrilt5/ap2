// Récupérer l'élément de sélection et l'élément à afficher
const selectElement1 = document.getElementById("date");
const selectElement2 = document.getElementById("heure");
const displayElement = document.getElementById("display-element");
//
var xhttp = new XMLHttpRequest();

//créer une variable pour inséré les donner dedans 
var formData = new FormData();
formData.append('date', selectElement1.value);

// Récupère l'élément select et le paragraphe où afficher le résultat
var select = document.getElementById("heure");
var select2 = document.getElementById("date");
var resultat = document.getElementById("resultat");

// Ajoute un écouteur d'événement pour détecter les changements de sélection
select.addEventListener("change", function() {
    // Récupère la valeur sélectionnée
    var valeurSelectionnee = select.value;
    // Met à jour le texte du paragraphe avec la valeur sélectionnée
    resultat.textContent = "Vous avez sélectionné : " + valeurSelectionnee;
});
select2.addEventListener("change", function() {
    // Récupère la valeur sélectionnée
    var valeurSelectionnee = select2.value;
    // Met à jour le texte du paragraphe avec la valeur sélectionnée
    resultat2.textContent = "Vous avez sélectionné : " + valeurSelectionnee;
});

// Ajouter un événement de changement à l'élément de sélection
selectElement1.addEventListener("change", () => {
// Si les deux options sont sélectionnées, afficher l'élément
if (selectElement1.value !== "" && selectElement2.value !== "") {
    displayElement.style.display = "block";
} else {
    // Sinon, masquer l'élément
    displayElement.style.display = "none";
}
});

selectElement2.addEventListener("change", () => {
// Si les deux options sont sélectionnées, afficher l'élément
if (selectElement1.value !== "" && selectElement2.value !== "") {
    displayElement.style.display = "block";
} else {
// Sinon, masquer l'élément
    displayElement.style.display = "none";
}
});
