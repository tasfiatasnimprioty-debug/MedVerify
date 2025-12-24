
let totalVerifications = 0;
let upcomingAppointment = "Oct 24";
let totalReports = 5;


function updateCardNumbers() {
    document.getElementById("verificationsCount").innerHTML = totalVerifications;
    document.getElementById("appointmentsCount").innerHTML = upcomingAppointment;
    document.getElementById("reportsCount").innerHTML = totalReports;
}


function increaseVerifications() {
    totalVerifications = totalVerifications + 1;
    updateCardNumbers();
}


function increaseReports() {
    totalReports = totalReports + 1;
    updateCardNumbers();
}


function resetCounts() {
    totalVerifications = 0;
    upcomingAppointment = "Oct 24";
    totalReports = 5;
    updateCardNumbers();
}


document.addEventListener("DOMContentLoaded", function() {

    updateCardNumbers();
    

    document.getElementById("addVerificationBtn").addEventListener("click", increaseVerifications);
    document.getElementById("addReportBtn").addEventListener("click", increaseReports);
    document.getElementById("resetBtn").addEventListener("click", resetCounts);
});
