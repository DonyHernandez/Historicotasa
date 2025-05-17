import './bootstrap';

// Importar Alpine.js
import Alpine from 'alpinejs';

// Configuración de rendimiento
document.addEventListener('alpine:init', () => {
    // Desactivar reactividad en elementos estáticos
    Alpine.directive('static', (el) => {
        Alpine.raw(el._x_dataStack[0]);
    });

    // Configurar el modo de producción
    Alpine.setMode('production');
});

// Asignar Alpine globalmente
window.Alpine = Alpine;

// Iniciar Alpine
Alpine.start();
