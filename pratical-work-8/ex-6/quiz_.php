<?php

$questions = [
    'q1' => ['correct' => '21,196 km', 'text' => 'What is the length of the Great Wall of China?', 'options' => ['a' => '37,791 km','b' => '11,325 km','c' => '21,196 km']],
    'q2' => ['correct' => '93 million miles', 'text' => 'What is the distance from Earth to the Sun?', 'options' => ['a' => '93 million miles', 'b' => '83 million miles', 'c' => '145 million miles']],
    'q3' => ['correct' => 'Malbolge', 'text' => 'What is the most complex programming language?', 'options' => ['a' => 'C++', 'b' => 'Malbolge', 'c' => 'Ruby']],
    'q4' => ['correct' => 'Python', 'text' => 'What is the most easiest programming language?', 'options' => ['a' => 'Python', 'b' => 'R', 'c' => 'Javascript']],
    'q5' => ['correct' => 'JavaScript', 'text' => 'What is the most popular programming language?', 'options' => ['a' => 'C', 'b' => 'Kotlin', 'c' => 'JavaScript']],
    'q6' => ['correct' => 'English', 'text' => 'What is the most spoken language in the world?', 'options' => ['a' => 'French', 'b' => 'Spanish', 'c' => 'English', 'd' => 'Japanese']],
    'q7' => ['correct' => 'Mandarin Chinese', 'text' => 'What is the most complex language to learn?', 'options' => ['a' => 'Russian', 'b' => 'Mandarin Chinese', 'c' => 'Arabic', 'd' => 'Japanese']]
];

$score = 0;
$total = count($questions);
$results = [];

foreach ($questions as $question => $content) {

    $correct = $content['correct'];
    $userAnswerValue = $_GET[$question];
    $userAnswerText = $content['options'][$userAnswerValue] ?? 'Unknown answer';

    if ($userAnswerText === $correct) {

        $score++;

        $results[$question] = ['correct' => true, 'answer' => $userAnswerText, 'question_text' => $content['text']];

    } else {

        $results[$question] = ['correct' => false, 'answer' => $userAnswerText, 'correct_answer' => $correct, 'question_text' => $content['text']];

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz Results</title>

    <style>

        body {
            font-family: sans-serif;
            background-color: #161616;
            color: white;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: blue;
            text-align: center;
        }
        .result {
            background: rgb(33, 33, 33);
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            border-left: 3px solid;
        }
        .correct {
            border-left-color: #2ecc71;
        }
        .incorrect {
            border-left-color: #e74c3c;
        }
        .score {
            text-align: center;
            font-size: 25px;
            margin: 11px;
        }
        .correct-answer {
            color: #2ecc71;
        }
        .user-answer {
            color: #e74c3c;
        }
        .retry-btn {
            display: block;
            text-align: center;
            margin-top: 11px;
        }
        .retry-btn a {
            background-color: green;
            color: white;
            padding: 5px 5px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

    </style>

</head>
<body>

    <h1>Your Quiz Answers</h1>

    <div class="score">
        Your Score: <?php echo "$score/$total"; ?> | <?php echo round(($score/$total)*100); ?>%
    </div>
    
    <?php foreach ($results as $q => $result): ?>

        <div class="result <?php echo $result['correct'] ? 'correct' : 'incorrect'; ?>">

            <p><strong><?php echo $result['question_text']; ?></strong></p>

            <?php if ($result['correct']): ?>
                <p>Correct! Answer, <small class="correct-answer"><?php echo $result['answer']; ?></small></p>
            <?php else: ?>
                <p>You chose: <span class="user-answer"><?php echo $result['answer']; ?></span></p>
                <p>Correct answer: <span class="correct-answer"><?php echo $result['correct_answer']; ?></span></p>
            <?php endif; ?>

        </div>

    <?php endforeach; ?>
    
    <div class="retry-btn">
        <a href="quiz_.html">Retake Quiz</a>
    </div>

</body>
</html>