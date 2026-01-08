// Load sample data
function loadSampleData() {
    fetch('../Controllers/verificationController.php?action=getSampleData')
        .then(response => response.json())
        .then(data => {
            // Update doctor list
            let doctorList = document.getElementById('doctorList');
            if(doctorList) {
                let html = '';
                data.doctors.forEach(doctor => {
                    html += `<div>${doctor.doctor_id}: ${doctor.name}</div>`;
                });
                doctorList.innerHTML = html;
            }
            
            // Update medicine list
            let medicineList = document.getElementById('medicineList');
            if(medicineList) {
                let html = '';
                data.medicines.forEach(medicine => {
                    html += `<div>${medicine.medicine_code}: ${medicine.name}</div>`;
                });
                medicineList.innerHTML = html;
            }
        });
}

// Verify Doctor
function verifyDoctor() {
    let doctorId = document.getElementById('doctorId').value.trim();
    let resultBox = document.getElementById('doctorResult');
    
    if(!doctorId) {
        alert('Please enter Doctor ID');
        return;
    }
    
    // Create form data
    let formData = new FormData();
    formData.append('doctor_id', doctorId);
    
    // Send request
    fetch('../Controllers/verificationController.php?action=checkDoctor', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Show result
        resultBox.style.display = 'block';
        
        if(data.status === 'verified') {
            resultBox.className = 'result verified';
            resultBox.innerHTML = `
                <h3>✅ ${data.message}</h3>
                <p><strong>ID:</strong> ${data.doctor_id}</p>
                <p><strong>Name:</strong> ${data.doctor_name}</p>
                <p><strong>Specialization:</strong> ${data.specialization || 'N/A'}</p>
            `;
        } else if(data.status === 'not_found') {
            resultBox.className = 'result not-verified';
            resultBox.innerHTML = `
                <h3>❌ ${data.message}</h3>
                <p><strong>Entered ID:</strong> ${data.doctor_id}</p>
                <p>Doctor not found in database.</p>
            `;
        } else {
            resultBox.className = 'result not-verified';
            resultBox.innerHTML = `
                <h3>⚠️ ${data.message}</h3>
            `;
        }
        
        // Reload history
        loadHistory();
    })
    .catch(error => {
       
        console.error('Error:', error);
    });
}

// Verify Medicine
function verifyMedicine() {
    let medicineCode = document.getElementById('medicineCode').value.trim();
    let resultBox = document.getElementById('medicineResult');
    
    if(!medicineCode) {
        alert('Please enter Medicine Code');
        return;
    }
    
    // Create form data
    let formData = new FormData();
    formData.append('medicine_code', medicineCode);
    
    // Send request
    fetch('../Controllers/verificationController.php?action=checkMedicine', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Show result
        resultBox.style.display = 'block';
        
        if(data.status === 'verified') {
            resultBox.className = 'result verified';
            resultBox.innerHTML = `
                <h3>✅ ${data.message}</h3>
                <p><strong>Code:</strong> ${data.medicine_code}</p>
                <p><strong>Name:</strong> ${data.medicine_name}</p>
                <p><strong>Company:</strong> ${data.company}</p>
            `;
        } else if(data.status === 'not_found') {
            resultBox.className = 'result not-verified';
            resultBox.innerHTML = `
                <h3>❌ ${data.message}</h3>
                <p><strong>Entered Code:</strong> ${data.medicine_code}</p>
                <p>Medicine not found in database.</p>
            `;
        } else {
            resultBox.className = 'result not-verified';
            resultBox.innerHTML = `
                <h3>⚠️ ${data.message}</h3>
            `;
        }
        
        // Reload history
        loadHistory();
    })
    .catch(error => {
    
        console.error('Error:', error);
    });
}

function loadHistory() {
    fetch('../Controllers/verificationController.php?action=getHistory')
      .then(response => response.json())
      .then(data => {
          let html = '';
          if(!data || data.length === 0) {
              html = '<tr><td colspan="5">No history found.</td></tr>';
          } else {
              data.forEach(item => {
                  html += `
                      <tr>
                          <td>${item.type}</td>
                          <td>${item.code}</td>
                          <td>${item.name}</td>
                          <td>${item.status}</td>
                          <td>${item.timestamp}</td>
                      </tr>
                  `;
              });
          }
          const body = document.getElementById('historyBody');
          if(body) body.innerHTML = html;
      })
      .catch(error => {
          console.error('Error loading history:', error);
      });
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Load sample data
    loadSampleData();
    
    // Load history
    loadHistory();

    // Wire up refresh button to avoid full page reload
    const refreshBtn = document.getElementById('refreshHistory');
    if(refreshBtn) {
        refreshBtn.addEventListener('click', function(e) {
            e.preventDefault();
            loadHistory();
        });
    }
    
    // Enter key support
    document.getElementById('doctorId').addEventListener('keypress', function(e) {
        if(e.key === 'Enter') verifyDoctor();
    });
    
    document.getElementById('medicineCode').addEventListener('keypress', function(e) {
        if(e.key === 'Enter') verifyMedicine();
    });
});