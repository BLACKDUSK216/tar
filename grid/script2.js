function simulateMatch() {
  const outcomesDiv = document.getElementById('outcomes');
  outcomesDiv.innerHTML = '';
  const table = document.createElement('table');
  table.innerHTML = '<tr><th>Over</th><th>Ball 1</th><th>Ball 2</th><th>Ball 3</th><th>Ball 4</th><th>Ball 5</th><th>Ball 6</th></tr>';

  for (let over = 1; over <= 6; over++) {
    const row = simulateOver(over);
    table.appendChild(row);
  }

  outcomesDiv.appendChild(table);
}

function simulateOver(over) {
  const row = document.createElement('tr');
  row.innerHTML = `<td>${over}</td>`;
  const ballContainer = document.createElement('div');
  ballContainer.classList.add('ball-container');

  for (let ball = 1; ball <= 6; ball++) {
    let result = (over === 6 || (ball >= (7 - over) && ball <= 6)) ? '6' : 'x';
    displayResult(result, ballContainer);
    row.innerHTML += `<td>${result}</td>`;
  }

  row.appendChild(ballContainer);
  return row;
}

function displayResult(result, container) {
  const ball = document.createElement('div');
  ball.classList.add('ball');
  ball.textContent = result;
  container.appendChild(ball);
}

function simulateSelectedOver() {
  const selectedOverInput = document.getElementById('selectedOver');
  const selectedOver = parseInt(selectedOverInput.value);
  const overToSimulate = Math.min(6, Math.max(1, isNaN(selectedOver) ? 1 : selectedOver));
  simulateMatchForSelectedOver(overToSimulate);
}

function simulateMatchForSelectedOver(selectedOver) {
  const outcomesDiv = document.getElementById('outcomes');
  outcomesDiv.innerHTML = '';
  const table = document.createElement('table');
  table.innerHTML = '<tr><th>Over</th><th>Ball 1</th><th>Ball 2</th><th>Ball 3</th><th>Ball 4</th><th>Ball 5</th><th>Ball 6</th></tr>';

  const row = simulateOver(selectedOver);
  table.appendChild(row);

  outcomesDiv.appendChild(table);
}

function validateAndSimulate() {
  const selectedOverInput = document.getElementById('selectedOver');
  const selectedOver = parseInt(selectedOverInput.value);
  const overToSimulate = Math.min(6, Math.max(1, isNaN(selectedOver) ? 1 : selectedOver));
  simulateMatchForSelectedOver(overToSimulate);
}

function simulateBasedOnProbability() {
  const selectedOverInput = document.getElementById('selectedOver');
  const probabilityInput = document.getElementById('probability');
  const selectedOver = parseInt(selectedOverInput.value); 
  const probability = parseInt(probabilityInput.value);
  const overToSimulate = Math.min(6, Math.max(1, isNaN(selectedOver) ? 1 : selectedOver));
  const validatedProbability = Math.min(100, Math.max(0, isNaN(probability) ? 50 : probability));
  simulateMatchForSelectedOverWithProbability(overToSimulate, validatedProbability);
}

function simulateMatchForSelectedOverWithProbability(selectedOver, probability) {
  const outcomesDiv = document.getElementById('outcomes');
  outcomesDiv.innerHTML = '';
  const table = document.createElement('table');
  table.innerHTML = '<tr><th>Over</th><th>Ball 1</th><th>Ball 2</th><th>Ball 3</th><th>Ball 4</th><th>Ball 5</th><th>Ball 6</th></tr>';

  const row = document.createElement('tr');
  row.innerHTML = `<td>${selectedOver}</td>`;
  const ballContainer = document.createElement('div');
  ballContainer.classList.add('ball-container');

  for (let ball = 1; ball <= 6; ball++) {
    let result = determineResult(ball, probability);
    displayResult(result, ballContainer);
    row.innerHTML += `<td>${result}</td>`;  
  }

  row.appendChild(ballContainer);
  table.appendChild(row);
  outcomesDiv.appendChild(table);
}

function determineResult(ball, probability) {
  if (probability < 16.67) return 'x';
  if (probability < 33.34) return (ball === 6) ? '6' : 'x';
  if (probability < 50.1) return (ball >= 5) ? '6' : 'x';
  if (probability < 66.68) return (ball >= 4) ? '6' : 'x';
  if (probability < 83.35) return (ball >= 3) ? '6' : 'x';
  if (probability < 100) return (ball >= 2) ? '6' : 'x';
  return '6';
}

simulateMatch();
