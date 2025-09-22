// FAQ Toggle
const questions = document.querySelectorAll(".faq-question");

questions.forEach(q => {
  q.addEventListener("click", () => {
    q.classList.toggle("active");
    const ans = q.nextElementSibling;
    ans.style.display = ans.style.display === "block" ? "none" : "block";
  });
});

// Optional: Popup Alert on Page Load
window.onload = function() {
  alert("⚠️ Reminder: Hostel fees due by 30th Sept!");
};

// Optional: Auto Slider (rotate announcements)
let slideIndex = 0;
function showSlides() {
  let slides = document.querySelectorAll(".slide");
  slides.forEach(s => (s.style.display = "none"));
  slideIndex++;
  if (slideIndex > slides.length) slideIndex = 1;
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 3000); // change every 3 sec
}
showSlides();
