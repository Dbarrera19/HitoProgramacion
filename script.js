document.addEventListener("DOMContentLoaded", function() {
    
    // Agregar un evento al formulario cuando se intente enviar
    document.getElementById("registroForm").addEventListener("submit", function(event) {
        
        // Obtener los valores ingresados en los campos del formulario
        let edad = parseInt(document.getElementById("edad").value); // Convertir la edad a número entero
        let paquete = document.getElementById("paquete").value; // Obtener el paquete seleccionado
        let plan = document.getElementById("plan_base").value; // Obtener el tipo de plan
        let duracion = document.getElementById("duracion").value; // Obtener la duración de la suscripción

        // Validación 1: Restringir paquetes para menores de 18 años
        if (edad < 18 && paquete !== "Infantil") {
            alert("Error: Los menores de 18 años solo pueden contratar el Pack Infantil.");
            event.preventDefault(); // Detener el envío del formulario
        }

        // Validación 2: El plan Básico solo permite "Ninguno" o "Infantil"
        if (plan === "Basico" && paquete !== "Ninguno" && paquete !== "Infantil") {
            alert("Error: El plan Básico solo permite un paquete adicional.");
            event.preventDefault(); // Detener el envío del formulario
        }

        // Validación 3: El Pack Deporte solo puede contratarse con una suscripción anual
        if (paquete === "Deporte" && duracion !== "Anual") {
            alert("Error: El Pack Deporte solo está disponible con suscripción anual.");
            event.preventDefault(); // Detener el envío del formulario
        }
    });

});
