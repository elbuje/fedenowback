---
title: "Sesión: Motor SMTP Hostinger SSL, Recuperación de Password y Actualización de Precios Landing Octubre"
project: fedenowback
type: session
date: 2026-09-28
tags: [session, smtp, email, auth, password-reset, landing-octubre, pricing, ploi]
---

# 🚀 Sesión: Motor SMTP Hostinger SSL, Recuperación de Password y Actualización de Precios Landing Octubre

**Fecha:** 28 de Septiembre de 2026  
**Rama:** `main`  
**Commits:**
- `720ccfe` — `docs(wiki): registrar sesion 2026-09-27 landing evento presencial mentalidad y marketing con IA`
- `5f0d7cf` — `fix(landing): actualizar precios evento octubre preventa 80k hasta 3 oct y lista 150k`
- `2e7272e` — `feat(auth): integrar cliente SMTP Hostinger SSL para recuperacion de password y bienvenida`
- `7a24f11` — `docs: actualizar status.md con verificacion SMTP de recuperacion`

---

## 🎯 Objetivos de la Sesión

1. **Auditoría y Regularización de la Wiki:** Indexación y documentación de la sesión previa del 27 de Septiembre sobre la landing del evento presencial de Octubre.
2. **Diagnóstico y Corrección del Sistema de Correo:** Resolver la falta de entrega en la recuperación de contraseñas debido a la inexistencia de un MTA local (`sendmail`) y bloqueos de reputación en servidores VPS.
3. **Desarrollo de Cliente SMTP Socket SSL Nativo:** Implementación de un motor de correo en PHP sin dependencias pesadas autenticado contra `smtp.hostinger.com:465`.
4. **Actualización Comercial de la Landing de Octubre:** Modificación de la estructura de precios (Preventa $80.000 hasta el 3 de Octubre / Precio regular $150.000 desde el 4 de Octubre) en todas las vistas y archivos HTML.
5. **Sincronización en Producción:** Actualización de variables `.env` en Ploi (`errante`) y deploy continuo.

---

## 🛠️ Cambios Implementados

### 1. Motor SMTP Nativo (`website-php/includes/smtp_mailer.php`)
- Socket client con SSL directo (`ssl://smtp.hostinger.com:465`).
- Soporte RFC 5321 multi-línea con `EHLO`, `AUTH LOGIN` (Base64), `MAIL FROM`, `RCPT TO`, `DATA`, `QUIT`.
- Encabezados MIME UTF-8 (`Subject`, `From`, `Reply-To`) y multipart alternativo (`text/html` + `text/plain`).
- Remitente configurado: `contacto@fedenowback.com.ar` ("Fede Nowback").

### 2. Autenticación & Notificaciones (`website-php/includes/community_store.php`)
- `fede_send_reset_password_email`: Envío real de correos de recuperación con link firmado y token SHA-256 válido por 2 horas.
- `fede_send_welcome_user_email`: Envío de correos de bienvenida con credenciales iniciales.

### 3. Ajuste de Precios Landing Octubre
Actualizados en `landing-octubre.php`, `mentalidad-marketing-neuroventas-ia.php`, `Mentalidad-Marketing-Neuroventas-con-IA.html`, `landing-octubre.html` y `landin-octubre.html`:
- **Preventa:** `$80.000` (Ahorrás `$70.000`, antes `$150.000`) hasta el 3 de Octubre.
- **Precio de Lista:** `$150.000` luego del 3 de Octubre.
- **Sticky Bar Mobile:** Actualizada con badge de preventa y enlace de WhatsApp con `$80.000`.

### 4. Variables de Entorno en Producción Ploi (`.env`)
Configurado en servidor `errante` (Ploi Site ID `406351`):
```env
SMTP_HOST=smtp.hostinger.com
SMTP_PORT=465
SMTP_USER=contacto@fedenowback.com.ar
SMTP_PASS=Fedemail2026!
SMTP_SECURE=ssl
SMTP_FROM_EMAIL=contacto@fedenowback.com.ar
SMTP_FROM_NAME="Fede Nowback"
```

---

## 🧪 Pruebas y Validación

- ✅ Prueba de envío SMTP socket SSL a `mfmujic@gmail.com` verificada con éxito (`success: true`).
- ✅ Prueba del endpoint de recuperación de contraseña con token real verificada.
- ✅ Despliegue automático en Ploi completado sin incidencias.

---

## 🔗 Nodos Relacionados
- [[nodes/infraestructura_y_servidores]] — Configuración de servidores y variables SMTP.
- [[nodes/rutas_y_seo]] — Landings de eventos y precios.
- [[nodes/base_de_datos]] — Tabla `fede_users` y tokens de recuperación.
- [status.md](file:///home/mfmujic/fedenowback/status.md) — Estado general del proyecto.
