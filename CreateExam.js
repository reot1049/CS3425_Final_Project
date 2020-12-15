var add_question = document.getElementById('question');
let question_count = 1;
var exam = document.getElementById('createExam');
add_question.onclick = function() {
  question_creation(question_count);
  question_count = question_count + 1;
}

var choices = [];

function question_creation(question_count) {
  //create new div
  let new_div = document.createElement('DIV');
  new_div.id = 'div' + question_count;
  exam.appendChild(new_div);
  //create new question
  let new_question_form = document.createElement('FORM')
  new_question_form.type='TEXT';
  new_question_form.name='question_form' + question_count;
  new_question_form.id='question_form' + question_count;
  document.getElementById(new_div.id).appendChild(new_question_form);
  let new_question_input = document.createElement('INPUT');
  new_question_input.type = 'TEXT';
  new_question_input.id = 'question_input' + question_count;
  new_question_input.placeholder = 'Question ' + question_count;
  new_question_input.size = '80';
  document.getElementById(new_div.id).appendChild(new_question_input);
  let question_points = document.createElement('INPUT');
  question_points.type = 'number';
  question_points.id = 'question' + question_count + 'points';
  question_points.min = '0';
  question_points.max = '10';
  question_points.style.margin = '0px 0px 0px 5px';
  let question_points_label = document.createElement('LABEL');
  question_points_label.for = question_points.id;
  question_points_label.style.margin = '0px 0px 0px 5px';
  question_points_label.innerHTML = "Points for this question: ";
  document.getElementById(new_div.id).appendChild(question_points_label);
  document.getElementById(new_div.id).appendChild(question_points);
  new_line(new_div.id);
  //update choices array
  choices[question_count - 1] = 1;
  //create initial choice
  new_choice_input_form = document.createElement('FORM');
  new_choice_input_form.type='TEXT';
  new_choice_input_form.id = 'question' + question_count + 'choice';
  document.getElementById(new_div.id).appendChild(new_choice_input_form);
  new_choice_input = document.createElement('INPUT');
  new_choice_input.type='TEXT';
  new_choice_input.id='question' + question_count + 'choice' + choices[question_count - 1];
  new_choice_input.placeholder = 'choice ' + choices[question_count - 1];
  document.getElementById(new_choice_input_form.id).appendChild(new_choice_input);
  //input for if choice is correct or not
  let correct_choice = document.createElement('INPUT');
  correct_choice.type = 'radio';
  correct_choice.id = new_choice_input.id + 'correct_choice';
  correct_choice.value = 'correct';
  correct_choice.name = new_choice_input.id + 'is_correct';
  correct_choice.style.margin = '0px 0px 0px 5px';
  document.getElementById(new_choice_input_form.id).appendChild(correct_choice);
  let correct_choice_label = document.createElement('LABEL');
  correct_choice_label.for = 'correct_choice';
  correct_choice_label.innerHTML = 'Correct';
  correct_choice_label.style.margin = '0px 0px 0px 5px';
  document.getElementById(new_choice_input_form.id).appendChild(correct_choice_label);
  let incorrect_choice = document.createElement('INPUT');
  incorrect_choice.type = 'radio';
  incorrect_choice.id = new_choice_input.id + 'incorrect_choice';
  incorrect_choice.value = 'incorrect';
  incorrect_choice.name = new_choice_input.id + 'is_correct';
  incorrect_choice.style.margin = '0px 0px 0px 5px';
  document.getElementById(new_choice_input_form.id).appendChild(incorrect_choice);
  let incorrect_choice_label = document.createElement('LABEL');
  incorrect_choice_label.for = 'incorrect_choice';
  incorrect_choice_label.innerHTML  = 'Incorrect'
  incorrect_choice_label.style.margin = '0px 0px 0px 5px';
  document.getElementById(new_choice_input_form.id).appendChild(incorrect_choice_label);
  new_line(new_choice_input_form.id);
  //create button for additional choices
  let additional_choice = document.createElement('BUTTON');
  additional_choice.id = 'additional_choice' + question_count;
  additional_choice.innerHTML = "Another choice";
  additional_choice.onclick= function() {
    choices[question_count - 1] += 1;
    more_choice_input = document.createElement('INPUT');
    more_choice_input.type = 'TEXT';
    more_choice_input.id = 'question' + question_count + 'choice' + choices[question_count - 1];
    more_choice_input.placeholder = 'choice ' + choices[question_count - 1];
    document.getElementById(new_choice_input_form.id).insertBefore(more_choice_input, new_div[1]);
    //input for if choice is correct or not
    let correct_choice = document.createElement('INPUT');
    correct_choice.type = 'radio';
    correct_choice.id = more_choice_input.id + 'correct_choice';
    correct_choice.value = 'correct';
    correct_choice.name = more_choice_input.id + 'is_correct';
    correct_choice.style.margin = '0px 0px 0px 5px';
    document.getElementById(new_choice_input_form.id).appendChild(correct_choice);
    let correct_choice_label = document.createElement('LABEL');
    correct_choice_label.for = 'correct_choice';
    correct_choice_label.innerHTML = 'Correct';
    correct_choice_label.style.margin = '0px 0px 0px 5px';
    document.getElementById(new_choice_input_form.id).appendChild(correct_choice_label);
    let incorrect_choice = document.createElement('INPUT');
    incorrect_choice.type = 'radio';
    incorrect_choice.id = more_choice_input.id + 'incorrect_choice';
    incorrect_choice.value = 'incorrect';
    incorrect_choice.name = more_choice_input.id + 'is_correct';
    incorrect_choice.style.margin = '0px 0px 0px 5px';
    document.getElementById(new_choice_input_form.id).appendChild(incorrect_choice);
    let incorrect_choice_label = document.createElement('LABEL');
    incorrect_choice_label.for = 'incorrect_choice';
    incorrect_choice_label.innerHTML  = 'Incorrect'
    incorrect_choice_label.style.margin = '0px 0px 0px 5px';
    document.getElementById(new_choice_input_form.id).appendChild(incorrect_choice_label);
    new_line(new_choice_input_form.id);
  }
  document.getElementById(new_div.id).appendChild(additional_choice);

}

function new_line(body) {
  var line = document.createElement('BR');
  document.getElementById(body).appendChild(line);
}
