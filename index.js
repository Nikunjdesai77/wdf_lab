document.getElementById("login-form").addEventListener("submit", function (e) {
  e.preventDefault(); // stop default form submission

  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();

  // Example credentials (you can change these)
  const correctUsername = "student";
  const correctPassword = "1234";

  if (username === "" || password === "") {
    alert("❌ Please enter both username and password.");
  } else if (username === correctUsername && password === correctPassword) {
    alert("✅ Login successful!");
    window.location.href = "dashboard.html"; // redirect to dashboard
  } else {
    alert("❌ Invalid login credentials.");
  }
});
