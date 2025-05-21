const Q_uestions = [
    ["Que signifie « 404 not found » ?", "error"],
    ["En quelle année la Première Guerre mondiale a-t-elle été terminée ?", "1918"],
    ["Combien d'épisodes dans Breaking Bad ?", "62"],
    ["Quand le Maroc a-t-il obtenu son indépendance ?", "1956"],
    ["Qu'est-ce que « 8÷2*(2+2) » ?", "16"],
    ["Combien d'épisodes dans « Better Call Saul » ?", "63"],
    ["En quelle année la Seconde Guerre mondiale a-t-elle commencé ?", "1939"]
];

function quiz() {
    let answers_ = 0;
    let wrong_answer = 0;
    let results = "";          // Stockage des réponses corrigées pour les montrer à la fin
    let user_answer = "";     // Pour afficher les réponses des utilisateurs aux questions
    let skipped = 0;         // Pour compter les questions sautées
    
    for(let i = 0; i <Q_uestions.length; i++) {
        let question = Q_uestions[i][0];
        let right_answer = Q_uestions[i][1];
        let answer_me = prompt(question)

        if (answer_me !== null) {

            if (answer_me == right_answer) {
                // On peut aussi utiliser `.toLowerCase()` & `.trim()` pour filtrer les réponses de l'utilisateur s'il a écrit des lettres majuscules ou minuscules.

                answers_++;
                alert("Réponse correcte !");
            }

                else {
                    alert("Ce n'est pas la bonne !");
                    wrong_answer++;
                    results += `Question : ${question} <br> Réponse correcte : ${right_answer} <br><br>`;
                }

                user_answer += `Question : ${question} <br> Votre réponse : ${answer_me} <br><br>`;
        }
        else {
            skipped++;
            alert("Vous avez sauté une question !");
        }


    }

    let score_ = `Vous avez répondu ${answers_} questions correctes sur un total de ${Q_uestions.length}.<br>`;
    score_ += `Vous avez répondu ${wrong_answer} questions incorrectes.<br>`;
    score_ += `Vous avez sauté ${skipped} questions.<br><br>`;
    score_ += "Voici les questions et vos réponses : <br><br>" + user_answer;
    score_ += "<br>Voici les réponses corrigées : <br>" + results;
    document.getElementById('quiz_score').innerHTML = score_;
}