#   Software de Administración de Ingresos para Gimnasios

##   Descripción

Este proyecto es una aplicación web integral diseñada para la gestión de alumnos y el control de mensualidades en gimnasios. Permite el registro eficiente de usuarios, la administración segura de pagos y la automatización de procesos, con el objetivo de optimizar la organización interna del negocio, mejorar la experiencia de los clientes y garantizar un control preciso sobre la asistencia y los ingresos.

##   Características Principales

* Registro de alumnos con datos personales (nombre, email, teléfono, plan).
* Registro de pagos de mensualidades.
* Consulta rápida del estado de pago de un alumno.
* Autenticación segura con usuario y contraseña.
* Dashboard para gestionar alumnos y mensualidades.
* Gestión de planes de membresía (creación, edición, actualización, eliminación).

##   Tecnologías Utilizadas

* **Lenguaje de programación:** PHP
* **Framework:** Laravel
* **Base de datos:** MySQL (implícito por el uso de Laravel Schema Builder)
* **Autenticación:** Laravel's built-in authentication (que incluye Spring Security)
* **ORM:** Eloquent (Laravel's ORM)
* **Motor de plantillas:** Blade (Laravel's templating engine)

##   Estructura de la Base de Datos

La base de datos del proyecto incluye las siguientes tablas:

* USERS: Almacena la información de los usuarios del sistema (administradores).
    * Campos: `id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`.
* PASSWORD_RESET_TOKENS: Almacena los tokens para restablecer contraseñas.
    * Campos: `email`, `token`, `created_at`.
* SESSIONS: Almacena información sobre las sesiones de los usuarios.
    * Campos: `id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`.
* CACHE: Almacena datos en caché para mejorar el rendimiento.
    * Campos: `key`, `value`, `expiration`.
* CACHE_LOCKS: Gestiona los bloqueos de caché.
    * Campos: `key`, `owner`, `expiration`.
* JOBS: Almacena información sobre los trabajos en cola.
    * Campos: `id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`.
* JOB_BATCHES: Almacena información sobre los lotes de trabajos.
    * Campos: `id`, `name`, `total_jobs`, `pending_jobs`, `failed_jobs`, `failed_job_ids`, `options`, `cancelled_at`, `created_at`, `finished_at`.
* FAILED_JOBS: Almacena información sobre los trabajos fallidos.
    * Campos: `id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`.
* PLANES: Almacena información sobre los planes de membresía.
    * Campos: `id`, `nombre`, `descripcion`, `precio`, `duracion`, `created_at`, `updated_at`.
* ALUMNOS: Almacena información sobre los alumnos del gimnasio.
    * Campos: `id`, `nombre`, `email`, `telefono`, `plan`, `created_at`, `updated_at`.

##   Controladores

Los siguientes controladores manejan la lógica de la aplicación:

* AlumnoController: Maneja la creación y el almacenamiento de alumnos.
* PlanController: Maneja la gestión de planes de membresía (CRUD).
* ProfileController: Maneja la gestión del perfil de usuario.
* AuthController: (Implícito en `auth.php`) Maneja la autenticación de usuarios (registro, inicio de sesión, restablecimiento de contraseña, etc.).

##   Modelos

Los siguientes modelos representan las tablas de la base de datos:

* Alumno: Representa la tabla `alumnos`.
* Plan: Representa la tabla `planes`.
* User: Representa la tabla `users`.

##   Autores

* Miguel Antonio Carvajal Cárdenas
* Johan Esteban García Yara
* Ángelo Rivera Barrera
* Steve Iverson Salazar Hernández
