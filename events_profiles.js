// Mock JSON Data
const events = [
  { title: "Tech Fest 2025", date: "2025-11-02", venue: "Auditorium" },
  { title: "Sports Week", date: "2025-10-15", venue: "College Ground" },
  { title: "Coding Hackathon", date: "2025-12-01", venue: "Lab 3" }
];

const students = [
  { name: "Nikunj Desai", rollNo: "24CS016", dept: "Computer Science", email: "nikunj@example.com" },
  { name: "Anita Sharma", rollNo: "24CS045", dept: "Electronics", email: "anita@example.com" },
  { name: "Rahul Patel", rollNo: "24CS067", dept: "Mechanical", email: "rahul@example.com" }
];

// ✅ Display Events
const eventList = document.getElementById("eventList");
events.forEach(ev => {
  const li = document.createElement("li");
  li.textContent = `${ev.title} - ${ev.date} (${ev.venue})`;
  eventList.appendChild(li);
});

// ✅ Display Student Profiles
const profileContainer = document.getElementById("profileContainer");
students.forEach(stu => {
  const card = document.createElement("div");
  card.className = "profile-card";
  card.innerHTML = `
    <h4>${stu.name}</h4>
    <p>Roll No: ${stu.rollNo}</p>
    <p>Dept: ${stu.dept}</p>
    <p>Email: ${stu.email}</p>
  `;
  profileContainer.appendChild(card);
});
