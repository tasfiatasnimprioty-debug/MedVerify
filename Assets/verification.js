
function verifyDoctor() {

    const doctorId = document.getElementById('doctorId').value.trim();
    const resultBox = document.getElementById('doctorResult');
    
 
    if (!doctorId) {
        alert('Please enter Doctor ID');
        return;
    }
    
    const formData = new FormData();
    formData.append('doctor_id', doctorId);
    
    fetch('../Controllers/verificationController.php?action=checkDoctor', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        
        if (data.error) {
            alert('Please login first');
            window.location.href = '../Views/login.php';
            return;
        }
        
        resultBox.style.display = 'block';
        
       
        if (data.status === 'verified') {
            resultBox.className = 'result-box verified';
            resultBox.innerHTML = `
                <h4>✅ ${data.message}</h4>
                <p><strong>Doctor ID:</strong> ${data.doctor_id}</p>
                <p><strong>Doctor Name:</strong> ${data.doctor_name}</p>
                <p><strong>Status:</strong> <span style="color: green;">Verified</span></p>
            `;
        } else {
            resultBox.className = 'result-box not-verified';
            resultBox.innerHTML = `
                <h4>❌ ${data.message}</h4>
                <p><strong>Doctor ID:</strong> ${data.doctor_id}</p>
                <p><strong>Status:</strong> <span style="color: red;">Not Found</span></p>
            `;
        }
        
      
        loadHistory();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Verification failed');
    });
}


function verifyMedicine() {
 
    const medicineCode = document.getElementById('medicineCode').value.trim();
    const resultBox = document.getElementById('medicineResult');
    
    if (!medicineCode) {
        alert('Please enter Medicine Code');
        return;
    }
    
    const formData = new FormData();
    formData.append('medicine_code', medicineCode);
    
    fetch('../Controllers/verificationController.php?action=checkMedicine', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
      

        resultBox.style.display = 'block';
        
        if (data.status === 'verified') {
            resultBox.className = 'result-box verified';
            resultBox.innerHTML = `
                <h4>✅ ${data.message}</h4>
                <p><strong>Medicine Code:</strong> ${data.medicine_code}</p>
                <p><strong>Name:</strong> ${data.medicine_name}</p>
                <p><strong>Company:</strong> ${data.company}</p>
            `;
        } else {
            resultBox.className = 'result-box not-verified';
            resultBox.innerHTML = `
                <h4>❌ ${data.message}</h4>
                <p><strong>Medicine Code:</strong> ${data.medicine_code}</p>
                <p><strong>Status:</strong> <span style="color: red;">Not Found</span></p>
            `;
        }
        
        loadHistory();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Verification failed');
    });
}

function loadHistory() {
    
    fetch('../Controllers/verificationController.php?action=getHistory')
        .then(response => response.json())
        .then(data => {
            const table = document.getElementById('historyTable');
            
        
            const loadingRow = document.getElementById('historyLoading');
            if (loadingRow) loadingRow.remove();
            
            const rows = table.getElementsByTagName('tr');
            for (let i = rows.length - 1; i >= 1; i--) {
                rows[i].remove();
            }
          
            if (data.error) {
                const newRow = table.insertRow();
                newRow.innerHTML = `<td colspan="5">${data.error}</td>`;
                return;
            }
            
            if (data.length === 0) {
                const newRow = table.insertRow();
                newRow.innerHTML = '<td colspan="5">No history yet</td>';
                return;
            }
            
            data.forEach(item => {
                const newRow = table.insertRow();
                const statusColor = item.status === 'verified' ? 'green' : 'red';
                const statusIcon = item.status === 'verified' ? '✅' : '❌';
                const typeIcon = item.type === 'doctor' ? '👨‍⚕️' : '💊';
                
                newRow.innerHTML = `
                    <td>${typeIcon} ${item.type}</td>
                    <td>${item.code}</td>
                    <td>${item.name}</td>
                    <td style="color: ${statusColor};">${statusIcon}</td>
                    <td>${item.timestamp}</td>
                `;
            });
        })
        .catch(error => {
            console.error('Error loading history:', error);
        });
}


document.addEventListener('DOMContentLoaded', function() {

    loadHistory();
    
    document.getElementById('doctorId').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') verifyDoctor();
    });
    
    document.getElementById('medicineCode').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') verifyMedicine();
    });
});