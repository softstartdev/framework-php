# framework-php

# Cambios realizados

### General

En todas las funciones utilidades:

  - Se hicieron totalmente autosuficientes.
  - Sus dependencias como phpmailer se cargar desde composer.
  - Se convirtieron en clases con funciones estáticas.
  - Se creo el compoennte Router, ya no son necesarrios los factories.
  - Se creo el driver Firebird.
  - Las clases entidades se hicieron mas abstractas e independientes.
  - Se creo la clase config que carga por carpeta, archivo por environment.
  - Se creo la clase response.
  - Se creo la clase params.

Se crean aplicaciones examples que se pueden extender a aplicaciones reales.

# Cambios pendientes.

Config
----------

- Usar envs para separar el código fuente.

Views
----------
- Boostrap 4
- Usar js como librería.

Models
----------
create table
migrations up y down por lotes
crear tablas
modificar tablas
ORM como esquemas