<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Selector de Teléfono</title>
    
       
    
        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/intlTelInput.min.js"></script>
    </head>
    <body>
        <div class="container mt-3">
            <label for="phone" class="form-label">Número de teléfono</label>
            <input type="tel" id="phone" class="form-control" placeholder="Número de teléfono">
        </div>
    
        <script>
            const input = document.querySelector("#phone");
    
            // Inicialización de intl-tel-input con Perú como valor predeterminado
            window.intlTelInput(input, {
                initialCountry: "pe", // Código de país ISO 3166-1 Alpha-2 para Perú
                separateDialCode: true, // Muestra el código de país separado
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/utils.js" // Para validaciones
            });
        </script>
 
    
    
</body>
</html>