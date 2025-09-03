<?php
// Este archivo es el encargado de recibir los parámetros UTM de diferentes trackeos
// Esta programado para verificar si la campaña existe en la BD
// Si es así añade suma al contador de la misma para su posterior análisis
// 
// ==========================
// Recibe datos de los siguientes archivos --> 'landing-page-folleteria'.
// ==========================
// Creación de archivo: 26/06/2025 N/D
// Última Modificación: 3/09/2025 15:57h.
// Subido a GitHub: / /
// ==========================

// Verificar que las variables UTM estan presentes

if(isset($_GET['utm_source']) || isset($_GET['utm_medium']) || isset($_GET['utm_campaign']) || isset($_GET['redirect'])) {
    // Procesar las UTM
    $source = $_GET['utm_source'] ?? '';
    $medium = $_GET['utm_medium'] ?? '';
    $campaign = $_GET['utm_campaign'] ?? '';
    $redirect = $_GET['redirect'] ?? 'null';
} else {
    header("Location: ../index.html");
}

?>