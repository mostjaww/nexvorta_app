<script>
  function toggleChatWindow() {
    const chatWindow = document.getElementById('chat-window');
    if (chatWindow.style.display === 'none') {
      chatWindow.style.display = 'flex';
    } else {
      chatWindow.style.display = 'none';
    }
  }

  function sendMessage() {
    const chatInput = document.getElementById('chat-input');
    const message = chatInput.value.trim();
    if (message === '') return;

    addMessageToChat('user', message);
    chatInput.value = '';

    // Loading bubble
    addMessageToChat('bot', 'Typing...');

    fetch('function/nexva-ai.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          message: message
        })
      })
      .then(res => res.json())
      .then(data => {
        const messages = document.querySelectorAll('.chat-message.bot');
        messages[messages.length - 1].remove(); // remove typing
        addMessageToChat('bot', data.reply);
      })
      .catch(err => {
        addMessageToChat('bot', 'Terjadi kesalahan saat menghubungi AI.');
      });
  }


  function addMessageToChat(sender, message) {
    const chatMessages = document.getElementById('chat-messages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `chat-message ${sender}`;
    messageDiv.innerHTML = `<div class="message-bubble ${sender}">${message}</div>`;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }
  // Enter key to send message
  document.addEventListener('DOMContentLoaded', () => {
    const chatInput = document.getElementById('chat-input');
    if (chatInput) {
      chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
          sendMessage();
        }
      });
    }
  });
</script>

<div id="preloader">
</div>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<script src="assets/js/main.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("telegramForm");
    const btn = document.getElementById("submitBtn");
    const loading = document.getElementById("form-loading");
    const errorBox = document.getElementById("form-error");
    const successBox = document.getElementById("form-success");

    form.addEventListener("submit", function(e) {
      // 1. Stop refresh halaman dan stop script bawaan template
      e.preventDefault();
      e.stopPropagation();

      // 2. Persiapan UI
      btn.disabled = true;
      loading.style.display = "block";
      errorBox.style.display = "none";
      successBox.style.display = "none";

      // 3. Ambil Data
      const name = document.getElementById("name-field").value;
      const email = document.getElementById("email-field").value;
      const subject = document.getElementById("subject-field").value;
      const message = document.getElementById("message-field").value;

      const token = "7890870095:AAH-onk-Sv3eZnw7PlRz3aXxkCN1R-HREsw";
      const chatId = "5183095350";
      const fullText = `📩 *Nexvorta Report Contact*\n\n*Name:* ${name}\n*Email:* ${email}\n*Subject:* ${subject}\n*Message:* ${message}`;

      // 4. Kirim ke Telegram
      fetch(`https://api.telegram.org/bot${token}/sendMessage`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            chat_id: chatId,
            text: fullText,
            parse_mode: "Markdown"
          }),
        })
        .then(async res => {
          const data = await res.json();
          loading.style.display = "none";
          btn.disabled = false;

          if (res.ok) {
            successBox.style.display = "block";
            form.reset();
            // Hilangkan pesan sukses setelah 5 detik
            setTimeout(() => {
              successBox.style.display = "none";
            }, 5000);
          } else {
            throw new Error(data.description || "Gagal mengirim.");
          }
        })
        .catch(err => {
          loading.style.display = "none";
          btn.disabled = false;
          errorBox.innerText = "Error: " + err.message;
          errorBox.style.display = "block";
        });
    });
  });
</script>

</body>

</html>