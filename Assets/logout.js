
function loginAgain() {
    alert("Redirecting to login page...");
    window.location.href = "login.php";
}


function goHome() {
    alert("Redirecting to homepage...");
    window.location.href = "dashboard.php";
}


document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("loginAgainBtn").addEventListener("click", loginAgain);
    document.getElementById("goHomeBtn").addEventListener("click", goHome);
});
