// Contact Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    updateAuthUI();
});

function handleContactForm(event) {
    event.preventDefault();
    
    const formData = {
        name: document.getElementById('contactName').value,
        email: document.getElementById('contactEmail').value,
        subject: document.getElementById('contactSubject').value,
        message: document.getElementById('contactMessage').value,
        timestamp: new Date().toISOString()
    };
    
    // Save contact message to localStorage (in real app, this would be sent to server)
    const contactMessages = JSON.parse(localStorage.getItem('volunteerHubContacts') || '[]');
    contactMessages.push(formData);
    localStorage.setItem('volunteerHubContacts', JSON.stringify(contactMessages));
    
    // Reset form
    document.getElementById('contactName').value = '';
    document.getElementById('contactEmail').value = '';
    document.getElementById('contactSubject').value = '';
    document.getElementById('contactMessage').value = '';
    
    // Show success message
    showAlert('Thank you for your message! We\'ll get back to you within 24 hours.', 'success');
}