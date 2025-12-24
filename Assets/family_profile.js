
let familyMembersCount = 0;
let memberIdCounter = 2000;


function updateFamilyCount() {
    document.getElementById("familyMembersCount").innerHTML = familyMembersCount;
}


function addMemberToTable(memberId, name, relation, age, blood) {
    let table = document.getElementById("familyMembersTable");
    
    let newRow = "<tr>";
    newRow = newRow + "<td>" + memberId + "</td>";
    newRow = newRow + "<td>" + name + "</td>";
    newRow = newRow + "<td>" + relation + "</td>";
    newRow = newRow + "<td>" + age + "</td>";
    newRow = newRow + "<td>" + blood + "</td>";
    newRow = newRow + '<td><a href="#">View Profile</a></td>';
    newRow = newRow + "</tr>";
    
    table.innerHTML = table.innerHTML + newRow;
}


function addFamilyMember() {
    let nameInput = document.getElementById("memberName");
    let relationInput = document.getElementById("memberRelation");
    let ageInput = document.getElementById("memberAge");
    let bloodInput = document.getElementById("memberBlood");
    
    let name = nameInput.value;
    let relation = relationInput.value;
    let age = ageInput.value;
    let blood = bloodInput.value;
    
    if (name === "" || relation === "" || age === "" || blood === "") {
        alert("Please fill all fields!");
        return;
    }
    
    let memberId = memberIdCounter;
    memberIdCounter = memberIdCounter + 1;
    
    addMemberToTable(memberId, name, relation, age, blood);
    
    familyMembersCount = familyMembersCount + 1;
    updateFamilyCount();
    
    alert("Family member added successfully!\nName: " + name + "\nRelationship: " + relation);
    
    clearForm();
}


function clearForm() {
    document.getElementById("memberName").value = "";
    document.getElementById("memberRelation").value = "";
    document.getElementById("memberAge").value = "";
    document.getElementById("memberBlood").value = "";
}


document.addEventListener("DOMContentLoaded", function() {
    updateFamilyCount();
    
    document.getElementById("addMemberBtn").addEventListener("click", addFamilyMember);
    document.getElementById("clearFormBtn").addEventListener("click", clearForm);
});
