import './bootstrap';


document.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
    // You can also display a message in the HTML
    const messageElement = document.createElement('div');
    messageElement.textContent = 'DOM fully loaded and parsed';
    document.body.appendChild(messageElement);
});