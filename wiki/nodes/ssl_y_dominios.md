---
title: SSL y Gestión de Dominios — Fede Nowback
project: fedenowback
type: node
tags: [ssl, https, domains, dns, letsencrypt, zerossl, ploi]
---

# 🔒 Nodo: SSL y Gestión de Dominios

## 🌐 Configuración de Dominio
* **Dominio Principal:** `fedenowback.com.ar`
* **Subdominio WWW:** `www.fedenowback.com.ar`
* **DNS Nameservers:** Hostinger DNS (`cosmos.dns-parking.com`, `nova.dns-parking.com`)
* **Registrador:** NIC.ar
* **Registro A:** `72.61.34.92` (Servidor Ploi `errante`)

## 🔐 Certificado SSL (HTTPS) & Let's Encrypt
* **Emisor:** Let's Encrypt / ZeroSSL en Ploi
* **Ploi Site ID:** `406351` en Servidor `105871` (`errante`)
* **Ubicación Certificado Nginx:** `/etc/letsencrypt/live/fedenowback.com.ar/`

### ⚠️ Consideraciones Críticas de Validación (Multi-Perspective Validation)
1. **Validación Multi-Perspectiva (MPV):** Let's Encrypt valida los registros DNS desde múltiples servidores en todo el mundo (1 primario + 3 secundarios). En dominios `.com.ar` recién delegados, los nodos secundarios pueden experimentar latencia inicial (*secondary validation networking error*).
2. **Rate Limit de Intentos Fallidos (Failed Validation Limit):** Si se acumulan 5 intentos fallidos en 1 hora, Let's Encrypt bloquea temporalmente la emisión por 60 minutos para ese dominio. Es fundamental verificar que los resolvers globales (Google `8.8.8.8`, Cloudflare `1.1.1.1`) respondan la IP correcta antes de forzar reintentos sucesivos.

---

## 🔗 Nodos Relacionados
- [[nodes/infraestructura_y_servidores]] — Configuración de IPs y servidores.
- [[nodes/despliegue_y_ploi]] — Configuración y panel de administración en Ploi.
- [[guides/guia_despliegue_y_mantenimiento]] — Procedimientos de despliegue.
