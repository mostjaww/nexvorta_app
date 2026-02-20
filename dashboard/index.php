<?php include "header.php"; ?>

<?php include "topbar.php"; ?>

<?php include "bottombar.php"; ?>

<!-- Floating Chat Button -->
<div id="chat-button" class="floating-chat-btn">
    <button type="button" class="chat-btn" onclick="toggleChatWindow()">
        <i class="bi bi-chat-dots"></i>
    </button>
    <div id="chat-window" class="chat-window" style="display: none;">
        <div class="chat-header">
            <h5>Chat with Nexva (Nexvorta AI Assistant)</h5>
            <button type="button" class="btn-close" onclick="toggleChatWindow()"></button>
        </div>
        <div class="chat-messages" id="chat-messages"></div>
        <div class="chat-input-area">
            <input type="text" id="chat-input" class="chat-input" placeholder="Type your message..." />
            <button type="button" class="btn-send" onclick="sendMessage()">
                <i class="bi bi-send"></i>
            </button>
        </div>
    </div>
</div>

<a href="#" id="scroll-top" class="d-flex align-items-center justify-content-center scroll-top"><i
        class="bi bi-arrow-up-short"></i>
</a>

<?php include "footer.php"; ?>