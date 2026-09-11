# 🔒 Nodo: SSL y Gestión de Dominios

## 🌐 Configuración de Dominio
* **Dominio Principal:** `fedenowback.com.ar`
* **Subdominio WWW:** `www.fedenowback.com.ar`
* **DNS Nameservers:** Hostinger DNS (`cosmos.dns-parking.com`, `nova.dns-parking.com`)
* **Registrador:** NIC.ar
* **Registro A:** `72.61.34.92` (Servidor Ploi `errante`)

## 🔐 Certificado SSL (HTTPS)
* **Emisor:** Let's Encrypt / ZeroSSL en Ploi
* **Ploi Site ID:** `406351` en Servidor `105871` (`errante`)
* **Ubicación Certificado Nginx:** `/etc/letsencrypt/live/fedenowback.com.ar/`
* **Nota sobre Rate Limits:** Si Let's Encrypt genera error de rate limit (*5 failed authorizations in 1h*), se puede seleccionar ZeroSSL en el panel o esperar a que transcurra la ventana de 1 hora.
