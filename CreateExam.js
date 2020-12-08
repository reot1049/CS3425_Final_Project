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
  var new_div = document.createElement('DIV');
  new_div.id = 'div' + question_count;
  exam.appendChild(new_div);
  //create new question
  var new_question_form = document.createElement("FORM")
  new_question_form.type='TEXT';
  new_question_form.name='question_form' + question_count;
  new_question_form.id='question_form' + question_count;
  document.getElementById(new_div.id).appendChild(new_question_form);
  var new_question_input = document.createElement('INPUT');
  new_question_input.type = 'TEXT';
  new_question_input.id = 'question_input' + question_count;
  new_question_input.placeholder = 'Question ' + question_count;
  document.getElementById(new_div.id).appendChild(new_question_input);
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
  new_line(new_choice_input_form.id);
  //create button for additional choices
  let additional_choice = document.createElement('BUTTON');
  additional_choice.id = 'additional_choice' + question_count;
  additional_choice.innerHTML = "Another choice";
  additional_choice.onclick= function() {
    choices[question_count - 1] += 1;
    more_choice_input = document.createElement('INPUT');
    more_choice_input.type='TEXT';
    more_choice_input.id='question' + question_count + 'choice' + choices[question_count - 1];
    more_choice_input.placeholder = 'choice ' + choices[question_count - 1];
    document.getElementById(new_choice_input_form.id).insertBefore(more_choice_input, new_div[1]);
    new_line(new_choice_input_form.id);
  }
  document.getElementById(new_div.id).appendChild(additional_choice);
}

function another_choice(question_number) {
  new_choice_input = document.createElement('INPUT');
  new_choice_input.type='TEXT';
  new_choice_input.id='question' + question_count + 'choice' + choices[question_count - 1];
  new_choice_input.placeholder = 'choice ' + choices[question_count - 1];
  document.getElementById(question_number).appendChild(new_choice_input);
  new_line(question_number);
}

function new_line(body) {
  var line = document.createElement('BR');
  document.getElementById(body).appendChild(line);
}
