let students = JSON.parse(localStorage.getItem("students")) || [];

function saveData() {
  localStorage.setItem("students", JSON.stringify(students));
  renderList();
}

function addStudent() {
  let name = document.getElementById("nameInput").value;
  if (name === "") return;

  students.push({ name: name, present: false });
  document.getElementById("nameInput").value = "";
  saveData();
}

function toggleAttendance(index) {
  students[index].present = !students[index].present;
  saveData();
}

function deleteStudent(index) {
  students.splice(index, 1);
  saveData();
}

function renderList() {
  let list = document.getElementById("studentList");
  list.innerHTML = "";

  students.forEach((student, index) => {
    list.innerHTML += `
      <li>
        ${student.name} - ${student.present ? "Present" : "Absent"}
        <div>
          <button onclick="toggleAttendance(${index})">Toggle</button>
          <button onclick="deleteStudent(${index})">Delete</button>
        </div>
      </li>
    `;
  });
}

renderList();