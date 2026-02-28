function toggleChatWindow() {
  const chatWindow = document.getElementById("chat-window");
  chatWindow.classList.toggle("active");
}

function sendMessage() {
  const chatInput = document.getElementById("chat-input");
  const message = chatInput.value.trim();
  if (message === "") return;

  addMessageToChat("user", message);
  chatInput.value = "";

  // Typing animation
  addMessageToChat(
    "bot",
    `
    <div class="typing-indicator">
      <span></span><span></span><span></span>
    </div>
  `,
  );

  fetch("function/nexva-ai.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      message: message,
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      const typingMessage = document.querySelector(
        ".chat-message.bot:last-child",
      );
      if (typingMessage) typingMessage.remove();
      addMessageToChat("bot", data.reply);
    })
    .catch((err) => {
      const typingMessage = document.querySelector(
        ".chat-message.bot:last-child",
      );
      if (typingMessage) typingMessage.remove();
      addMessageToChat("bot", "Terjadi kesalahan saat menghubungi Nexva.");
    });
}

function addMessageToChat(sender, message) {
  const chatMessages = document.getElementById("chat-messages");
  const messageDiv = document.createElement("div");
  messageDiv.className = `chat-message ${sender}`;
  messageDiv.innerHTML = `<div class="message-bubble ${sender}">${message}</div>`;
  chatMessages.appendChild(messageDiv);
  chatMessages.scrollTop = chatMessages.scrollHeight;
}

document.addEventListener("DOMContentLoaded", () => {
  const chatInput = document.getElementById("chat-input");
  if (chatInput) {
    chatInput.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        sendMessage();
      }
    });
  }
});
