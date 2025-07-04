# Configuración para Dokploy

## Variables de Entorno Requeridas

Configura las siguientes variables de entorno en Dokploy:

```bash
# Base de Datos
DB_HOST=161.132.53.113
DB_PORT=3307
DB_NAME=bd_2201080045
DB_USER=2201080045
DB_PASSWORD=7Araga68JoC2
DB_ROOT_PASSWORD=7Araga68JoC2

# Aplicación
APP_ENV=production
APP_DEBUG=false
APP_NAME=Sistema de Trámite Documentario

# Puertos
PORT=80
APP_PORT=8080
PHPMYADMIN_PORT=8081
```

## Verificación de Variables

### Local (desarrollo)
Para verificar que las variables están cargándose correctamente en local:

1. Ejecutar: `docker-compose up app -d`
2. Verificar variables: `docker exec sistema_tramite_app env | Select-String "DB_"`
3. Probar en navegador: `http://localhost:8080/debug_env.php`

### Producción (Dokploy)
**IMPORTANTE**: Eliminar el archivo `debug_env.php` en producción por seguridad.

## Archivos Importantes

- `.env` - Variables de entorno (NO subir a git en producción)
- `docker-compose.yml` - Configuración de contenedores
- `Dockerfile` - Imagen de la aplicación
- `docker-entrypoint.sh` - Script de inicialización

## Comandos Útiles

```bash
# Construir imagen
docker build -t sistema-tramite .

# Verificar variables en contenedor
docker exec <container_id> env | grep DB_

# Ver logs del contenedor
docker logs <container_id>

# Acceder al contenedor
docker exec -it <container_id> bash
```

## Solución de Problemas

### Variables no se cargan
- Verificar que estén definidas en `docker-compose.yml` en la sección `environment:`
- Verificar que el archivo `.env` tenga las variables correctas
- Reconstruir el contenedor: `docker-compose up --build`

### Error de conexión a BD
- Verificar que la BD externa esté accesible
- Verificar credenciales
- Verificar puerto (3307 en este caso)
- Verificar firewall/red

### Archivo debug_env.php
- Solo para desarrollo/debugging
- **ELIMINAR en producción**
- No contiene información sensible pero puede exponer configuración

## Pasos para Deploy en Dokploy

1. Configurar todas las variables de entorno listadas arriba
2. Eliminar `debug_env.php` del código
3. Cambiar `APP_ENV=production` y `APP_DEBUG=false`
4. Deployar usando el Dockerfile
5. Verificar que la aplicación se conecte correctamente a la BD

## Notas Adicionales

- El proyecto está configurado para usar variables de entorno
- La conexión a BD se hace a través de `model/model_conexion.php`
- Se usa vlucas/phpdotenv para cargar variables del archivo .env
- En producción, las variables deben configurarse en el sistema/Dokploy, no en .env
