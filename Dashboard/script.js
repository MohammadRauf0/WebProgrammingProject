// // script.js
// function openNav() {
//     document.getElementById("mySidenav").style.width = "250px";
//     document.getElementById("main").style.marginLeft = "250px";
// }

// function closeNav() {
//     document.getElementById("mySidenav").style.width = "0";
//     document.getElementById("main").style.marginLeft= "0";
// }

// function addNote() {
//     // Get the note title from the input field
//     var noteTitle = document.getElementById("noteTitle").value;

//     // Create a new div for the note
//     var note = document.createElement("div");

//     // Set the note's content
//     note.innerHTML = `
//     <h2>${noteTitle}</h2>
//     <textarea placeholder="Write your note here..."></textarea>
//     `;

//     // Add the note to the main content
//     document.getElementById("main").appendChild(note);

//     // Clear the input field
//     document.getElementById("noteTitle").value = "";
// }