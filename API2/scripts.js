const app = document.getElementById('root');
const container = document.createElement('div');
container.setAttribute('class', 'container');
app.appendChild(container);

let correctAnswersCount = 0; 
let wrongAnswersCount = 0; 

const request = new XMLHttpRequest();
request.open('GET', 'https://opentdb.com/api.php?amount=10&type=boolean', true);
request.onload = function () {
  const data = JSON.parse(this.response);
  if (request.status >= 200 && request.status < 400) {
    const questions = data.results;

    questions.forEach((question, index) => {
      const card = document.createElement('div');
      card.setAttribute('class', 'card');

      const h1 = document.createElement('h1');
      h1.textContent = `Kysymys ${index + 1}: ${question.question}`;

      const trueButton = document.createElement('button');
      trueButton.textContent = 'Totta';
      trueButton.addEventListener('click', () => handleAnswerClick(true, question.correct_answer, card));

      const falseButton = document.createElement('button');
      falseButton.textContent = 'Tarua';
      falseButton.addEventListener('click', () => handleAnswerClick(false, question.correct_answer, card));

      container.appendChild(card);
      card.appendChild(h1);
      card.appendChild(trueButton);
      card.appendChild(falseButton);
    });

    const submitButton = document.createElement('button');
    submitButton.textContent = 'Tulokset';
    submitButton.addEventListener('click', showResult);
    container.appendChild(submitButton);
  } else {
    const errorMessage = document.createElement('marquee');
    errorMessage.textContent = `Kysymyksiä ei saatu ladattua`;
    app.appendChild(errorMessage);
  }
};

request.send();

function handleAnswerClick(userAnswer, correctAnswer, card) {
  const feedback = document.createElement('p');

  if (userAnswer === (correctAnswer === 'True')) {
    correctAnswersCount++;
    feedback.textContent = 'Oikein!';
    feedback.style.color = 'green';
  } else {
    feedback.textContent = 'Väärin. Oikea vastaus oli ' + correctAnswer;
    feedback.style.color = 'red';
    wrongAnswersCount++;
  }

  card.appendChild(feedback);
  card.querySelectorAll('button').forEach(button => (button.disabled = true));
}

function showResult() {
  container.innerHTML = '';

  const resultCard = document.createElement('div');
  resultCard.setAttribute('class', 'card result-card');

  const resultHeading = document.createElement('h1');
  resultHeading.innerHTML = `Oikeita vastauksia: ${correctAnswersCount}<br>Vääriä vastauksia: ${wrongAnswersCount}`;


  container.appendChild(resultCard);
  resultCard.appendChild(resultHeading);
}
