document.getElementById("login-form").addEventListener("submit", function (e) {
  e.preventDefault(); // stop default form submission

  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();

  // Password: at least one uppercase, one lowercase, one special character, and at least 6 characters
  const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,}$/;

  if (username === "" || password === "") {
    alert("❌ Please enter both username and password.");
  } else if (!passRegex.test(password)) {
    alert("❌ Password must be at least 6 characters and include uppercase, lowercase, and a special character.");
  } else {
    alert("✅ Login successful! ");
    window.location.href = "dashboard.html"; // redirect to dashboard
  }
});
