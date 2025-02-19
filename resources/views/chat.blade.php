<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat del Thread</title>
    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Agregar un token CSRF para la seguridad de Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        #messages {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 600px;
        }
        #messagesList {
            list-style-type: none;
            padding: 0;
        }
        #messagesList li {
            margin-bottom: 10px;
        }
        #sendMessageForm textarea {
            width: 100%;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>Chat del Thread</h1>
    
    <form id="sendMessageForm">
        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" rows="4" cols="50" placeholder="Escribe tu mensaje aquí"></textarea>
        <br>
        <button type="submit">Enviar Mensaje</button>
    </form>

    <div id="messages">
        <h3>Mensajes:</h3>
        <ul id="messagesList">
            <!-- Aquí se cargarán los mensajes -->
        </ul>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Función para enviar un mensaje
        document.getElementById('sendMessageForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevenir recarga de la página

            const message = document.getElementById('message').value;

            // Validar que el mensaje no esté vacío
            if (!message.trim()) {
                alert("Por favor, escribe un mensaje.");
                return;
            }

            // Enviar el mensaje al servidor
            axios.post('/chatPost', { message: message }, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => {
                const reply = response.data.reply; // Respuesta del servidor
                const messagesList = document.getElementById('messagesList');

                // Mostrar el mensaje del usuario
                const userMessage = document.createElement('li');
                userMessage.textContent = `Tú: ${message}`;
                messagesList.appendChild(userMessage);

                // Mostrar la respuesta del bot
                const botMessage = document.createElement('li');
                botMessage.textContent = `Bot: ${reply}`;
                messagesList.appendChild(botMessage);

                // Limpiar el campo de texto
                document.getElementById('message').value = '';
            })
            .catch(error => {
                console.error("Error al enviar el mensaje:", error.response?.data || error.message);
                alert("Hubo un error al enviar tu mensaje. Inténtalo de nuevo.");
            });
        });
    </script>
</body>
</html>
