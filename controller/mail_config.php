<?php
// Detecta el entorno: 'local' (MailHog) o 'prod' (SMTP real)
define('MAIL_ENV', getenv('MAIL_ENV') ?: 'local');

// Configuración para local (MailHog)
if (MAIL_ENV === 'local') {
    define('MAIL_HOST', 'mailhog');
    define('MAIL_PORT', 1025);
    define('MAIL_USERNAME', null);
    define('MAIL_PASSWORD', null);
    define('MAIL_SMTP_SECURE', null);
    define('MAIL_FROM', 'no-reply@aquasoluciones.com');
    define('MAIL_FROM_NAME', 'AquaSoluciones');
} else {
     // Configuración para producción (lee de variables de entorno)
    define('MAIL_HOST', getenv('MAIL_HOST'));
    define('MAIL_PORT', getenv('MAIL_PORT'));
    define('MAIL_USERNAME', getenv('MAIL_USERNAME'));
    define('MAIL_PASSWORD', getenv('MAIL_PASSWORD'));
    define('MAIL_SMTP_SECURE', getenv('MAIL_SMTP_SECURE'));
    define('MAIL_FROM', getenv('MAIL_FROM'));
    define('MAIL_FROM_NAME', getenv('MAIL_FROM_NAME'));
}
?>