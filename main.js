// main.js

// Placeholder for search functionality
function performSearch() {
    var query = document.getElementById('search').value;
    alert('Searching for: ' + query);
  }
  
  // Simple chat functionality for demonstration
  function sendMessage() {
    var chatWindow = document.getElementById('chat-window');
    var messageInput = document.getElementById('chat-message');
    var message = messageInput.value;
    if (message.trim() !== "") {
      var msgElement = document.createElement('div');
      msgElement.classList.add('chat-message');
      msgElement.textContent = message;
      chatWindow.appendChild(msgElement);
      messageInput.value = "";
      // Scroll to the bottom
      chatWindow.scrollTop = chatWindow.scrollHeight;
    }
  }
  