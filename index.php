<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Client</title>
</head>
<body>
    <h1>WebSocket Client</h1>
    <input type="text" id="messageInput" placeholder="Enter message">
    <button onclick="sendMessage()">Send</button>
    <div id="messages"></div>

    <script>
        const socket = new WebSocket('ws://localhost:8765');

        socket.onopen = () => {
            console.log('Connected to WebSocket server');
        };

        socket.onmessage = (event) => {
            const messageDiv = document.createElement('div');
            messageDiv.textContent = `Server: ${event.data}`;
            document.getElementById('messages').appendChild(messageDiv);
        };

        function sendMessage() {
            const message = document.getElementById('messageInput').value;
            socket.send(message);
            const messageDiv = document.createElement('div');
            messageDiv.textContent = `You: ${message}`;
            document.getElementById('messages').appendChild(messageDiv);
        }
    </script>
</body>
</html>
