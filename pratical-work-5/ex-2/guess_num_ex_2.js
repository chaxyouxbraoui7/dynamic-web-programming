function random_guess() {

// Generation du nombre aléatoire

let randomNumber = Math.random();                 // Génération d'un nombre aléatoire entre 0 et 1
randomNumber = randomNumber * 10;                // Multiplication du nombre par 10, de manière à ce qu'il soit compris entre 0 et 10.
randomNumber = Math.floor(randomNumber);        // Arrondissement au nombre entier inférieur (0 à 9)
randomNumber = randomNumber + 1;               // On ajoute 1 à la valeur , pour qu'elle soit comprise entre 1 et 10.

let attempts = 0;
let guess;

do {
    guess = prompt("Devinez un nombre entre 1 et 10 :");


    if (guess === null) {    // Si l'utilisateur clique sur Annuler ou ferme l'invite, redémarrez
        alert("Vous avez annulé le jeu. Redémarrage...")

        window.location.reload(); // This will refresh the page and restart the game
        
            return; // Ensure the rest of the code doesn't execute after the page reloads
    }


    guess = parseInt(guess);    // Conversion de `guess` en un nombre entier

    if (isNaN(guess)) {             // Si l'utilisateur saisit une valeur non numérique
        alert("Veuillez entrer un nombre valide !");

        continue;
    }
    
    attempts++;

    if (guess < randomNumber) {
        alert("Le nombre à deviner est plus grand !");
    }

    else if (guess > randomNumber) {
        alert("Le nombre à deviner est plus petit !");
    }

        else {
        alert("Bravo ! Vous avez deviné le nombre en " + attempts + " tentatives.");
        }

} while (guess !== randomNumber);  // Répétition de l'opération jusqu'à le bon chiffre

}