const notes = [];
let id = 0;

function addNotes() {
  let noteName = document.getElementById("noteName").value;

  if (noteName == "") {
    alert("Input kosong");
    return;
  } else {
    notes.push(noteName);
    displayNotes();
  }
  document.getElementById("noteName").value = "";
  console.log(noteName);
}

function displayNotes() {
  let noteBody = document.getElementById("noteBody");
  noteBody.innerHTML = "";

  for (let i = 0; i < notes.length; i++) {
    let note = notes[i];

    let noteElement = document.createElement("div");
    noteElement.innerHTML = `<div class="input-group mb-3"><input type="text" id="noteVal-${i}" class="form-control" value="${note}">
        <button type="button" class="btn btn-success" onclick="editNote(${i})">
          <i class="bi bi-check-lg"></i>
        </button>
        <button type="button" class="btn btn-danger" onclick="deleteNote(${i})">
          <i class="bi bi-trash-fill"></i>
        </button>
        </div>
        `;
    noteBody.appendChild(noteElement);
  }
}

function editNote(index) {
  let noteVal = document.getElementById(`noteVal-${index}`).value;
  notes[index] = noteVal;
  displayNotes();
}

function deleteNote(index) {
  notes.splice(index, 1);
  displayNotes();
}

displayNotes();
