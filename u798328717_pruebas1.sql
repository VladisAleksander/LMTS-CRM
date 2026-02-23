-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-02-2026 a las 07:26:01
-- Versión del servidor: 11.8.3-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u798328717_pruebas1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_locat` varchar(100) DEFAULT NULL,
  `a_desc` varchar(250) DEFAULT NULL,
  `a_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='Tabla de Áreas de la empresa';

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`a_id`, `a_name`, `a_locat`, `a_desc`, `a_stat`) VALUES
(1, 'Administración', 'Planta alta, oficina central', 'Coordina y supervisa las operaciones generales de la empresa, asegurando el cumplimiento de objetivos y políticas.', 1),
(2, 'Clientes', 'Planta baja, oficina lateral', 'Atiende consultas, gestiona solicitudes y da seguimiento a la experiencia de los clientes.', 1),
(3, 'Compras', 'Oficina 1, almacén', 'Gestiona adquisiciones de bienes y servicios necesarios para el funcionamiento de la empresa.', 1),
(4, 'Recursos Financieros', 'Planta alta, oficina lateral izquierda', 'Registra, controla y analiza las operaciones financieras de la empresa.', 1),
(5, 'Inventarios y Parque Vehicular', 'Oficina 2, almacén', 'Controla la entrada, salida y existencia de productos o materiales.', 1),
(6, 'Jurídico', 'Planta alta, zona de oficinas privadas', 'Asesora legalmente y gestiona contratos, riesgos legales y cumplimiento normativo.', 1),
(7, 'Almacén', 'Muelles de carga', 'Coordina transporte, almacenamiento y distribución de productos.', 1),
(8, 'Servicios Generales', 'Taller anexo o sótano técnico', 'Realiza reparaciones y mantenimiento preventivo de instalaciones y equipos.', 1),
(9, 'Proveedores', 'Oficina 3, almacén', 'Gestiona relaciones, contratos y entregas con los proveedores.', 1),
(10, 'Recursos Humanos', 'Planta alta, oficina lateral derecha ', 'Recluta, capacita y gestiona al personal, así como temas laborales y bienestar.', 1),
(11, 'Sistemas', 'Sala técnica o cuarto de servidores', 'Mantiene la infraestructura tecnológica y da soporte informático interno.', 1),
(12, 'Soporte', 'Sala técnica o cuarto de servidores', 'Atiende incidencias técnicas y brinda asistencia a usuarios internos.', 1),
(13, 'Ventas', 'Oficina con acceso a sala de exhibición o recepción', 'Promueve y cierra ventas, gestiona relaciones comerciales y metas de ingresos.', 1),
(14, 'Desarrollador', NULL, 'Desarrollador del sistema', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_desc` varchar(250) DEFAULT NULL,
  `c_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`c_id`, `c_name`, `c_desc`, `c_stat`) VALUES
(1, 'Computadoras e Impresoras', 'Problemas relacionados con hardware físico, como fallos en encendido, lentitud en equipos o errores en impresión (ej. atascos de papel o conexión de impresoras).', 1),
(2, 'Sistema y Programas', 'Incidencias en el software del sistema operativo o aplicaciones específicas, como errores al abrir programas, actualizaciones fallidas o bloqueos inesperados.', 1),
(3, 'Redes e Internet', 'Dificultades con la conectividad, como falta de acceso a internet, problemas con Wi-Fi, redes internas o conexiones remotas lentas o inestables.', 1),
(4, 'Cuentas y Contraseñas', 'Cuestiones de acceso a cuentas, como olvido de contraseñas, bloqueos de usuario, creación de nuevas cuentas o problemas de autenticación.', 1),
(5, 'Reloj Checador', 'Errores en el sistema de registro de asistencia, como fallos en el reloj biométrico, problemas de sincronización o discrepancias en los registros de entrada/salida.', 1),
(6, 'Seguridad y Prevención', 'Amenazas o alertas de seguridad, como virus, accesos no autorizados, configuraciones de firewall o medidas preventivas para proteger datos y equipos.', 1),
(7, 'Otros', 'Consultas generales o problemas no clasificados', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `e_id` int(11) NOT NULL,
  `e_uid` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `e_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `e_last1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `e_last2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `e_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `e_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `e_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `pue_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `e_stat` int(11) NOT NULL,
  `e_crea` datetime NOT NULL,
  `e_mod` datetime NOT NULL,
  `e_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`e_id`, `e_uid`, `e_name`, `e_last1`, `e_last2`, `e_mail`, `e_phone`, `e_pass`, `pue_id`, `area_id`, `e_stat`, `e_crea`, `e_mod`, `e_out`) VALUES
(1, 'UA000000', 'Administrador', NULL, NULL, 'admin@js1.techcaremx.com', '0', '123456', 31, 14, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(2, 'AV000001', 'Alejandro', 'Villaseñor', 'Villaseñor', 'alejandro.villasenor@js1.techcaremx.com', '(443) 346-2649', '123456', 1, 1, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(3, 'CR000002', 'Carlos', 'Ramírez', 'Díaz', 'carlos.ramirez@elpunto.com', '5511122233', 'hashed_password_2', 6, 2, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(4, 'EG000003', 'Elena', 'Gómez', 'Torres', 'elena.gomez@elpunto.com', '5544455566', 'hashed_password_3', 10, 4, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(5, 'LF000004', 'Luis', 'Fernández', 'Ríos', 'luis.fernandez@elpunto.com', '5588899900', 'hashed_password_4', 15, 5, 0, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(6, 'VC000005', 'Valeria', 'Cruz', 'Herrera', 'valeria.cruz@elpunto.com', '5577332211', 'hashed_password_5', 36, 12, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(7, 'RS000006', 'Roberto', 'Santos', 'Aguilar', 'roberto.santos@elpunto.com', '5512345678', 'hashed_admin_pass', 2, 1, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(8, 'DV000007', 'Diana', 'Vargas', 'Méndez', 'diana.vargas@elpunto.com', '5598765432', 'hashed_leader_pass', 37, 12, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(9, 'MH000008', 'Miguel', 'Hernández', 'León', 'miguel.hernandez@elpunto.com', '5543219876', 'hashed_lvl1_pass', 38, 12, 1, '2025-04-19 01:18:33', '2025-04-19 01:18:33', NULL),
(10, 'LM129799', 'Lenin', 'Meza', 'Jacuinde', 'lenin.meza@elpunto.com', '(443) 841-9282', 'Password123', 31, 11, 1, '2025-04-25 00:34:08', '2025-04-25 00:34:08', NULL),
(11, 'MA937838', 'Mauricio', 'Alcaraz', 'Tapia', 'mauricio.alcaraz@elpunto.com', '(436) 172-0090', 'Password123', 31, 11, 1, '2025-04-25 02:49:16', '2025-04-25 02:49:16', NULL),
(12, 'LB121442', 'Luis Antonio', 'Bedolla', 'Camacho', 'luisantonio.bedolla@elpunto.com', '(443) 477-8472', '123456', 28, 10, 1, '2025-07-02 02:04:25', '2025-07-02 02:04:25', NULL),
(13, 'PH306642', 'Paulina', 'Hernández', 'Olivo', 'paulina.hernandez@js1.techcaremx.com', '(443) 110-1998', 'Homero1', 10, 4, 1, '2025-08-13 03:41:18', '2025-08-13 03:41:18', NULL),
(14, 'FA187867', 'Francisco', 'Armenta', 'Zavala', 'francisco.armenta@js1.techcaremx.com', '(123) 456-7890', '123456', 31, 11, 1, '2025-08-14 02:58:15', '2025-08-14 02:58:15', NULL),
(15, 'KM256975', 'kenaty', 'meza', '', 'kenaty.meza@js1.techcaremx.com', '(000) 000', '123456', 34, 11, 1, '2026-01-22 08:31:05', '2026-01-22 08:31:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(30) NOT NULL,
  `st_desc` varchar(250) DEFAULT NULL,
  `st_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`st_id`, `st_name`, `st_desc`, `st_stat`) VALUES
(1, 'Nuevo', 'Ticket recién creado, sin atender aún', 1),
(2, 'En Proceso', 'El equipo de soporte está trabajando en el ticket', 1),
(3, 'En Espera', 'Esperando información del usuario o recurso externo', 1),
(4, 'Escalado', 'El ticket fue derivado a un nivel superior de soporte', 1),
(5, 'Resuelto', 'La solución fue aplicada y validada', 1),
(6, 'Cerrado', 'Ticket finalizado, sin necesidad de más acciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(50) NOT NULL,
  `per_desc` varchar(250) DEFAULT NULL,
  `per_stat` int(11) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`per_id`, `per_name`, `per_desc`, `per_stat`, `area_id`) VALUES
(1, 'Crear tickets de Soporte', 'Permite al usuario crear tickets de soporte técnico.', 1, 1),
(2, 'Ver reportes generales', 'Permite consultar reportes comunes entre áreas.', 1, 1),
(3, 'Acceso al sistema', 'Acceso general al sistema para uso básico.', 1, 1),
(4, 'Acceso a Panel Administrativo', 'Permite acceso total al sistema administrativo.', 1, 1),
(5, 'Visualizar Reportes Financieros', 'Accede a reportes internos y balances.', 1, 1),
(6, 'Gestionar recursos administrativos', 'Administra recursos y políticas administrativas.', 1, 1),
(7, 'Autorizar presupuestos', 'Permite aprobar presupuestos internos.', 1, 1),
(8, 'Asignar responsabilidades', 'Distribuye tareas entre personal administrativo.', 1, 1),
(9, 'Ver Datos de Clientes', 'Permite consultar información del cliente.', 1, 2),
(10, 'Modificar Perfil del Cliente', 'Permite editar los datos del cliente.', 1, 2),
(11, 'Consultar historial de clientes', 'Visualiza el historial de interacción con clientes.', 1, 2),
(12, 'Editar información de clientes', 'Modifica datos personales o preferencias del cliente.', 1, 2),
(13, 'Crear reportes de clientes', 'Genera informes de comportamiento de clientes.', 1, 2),
(14, 'Crear Orden de Compra', 'Permite generar solicitudes de compra.', 1, 3),
(15, 'Modificar Proveedores', 'Edita información de proveedores.', 1, 3),
(16, 'Autorizar órdenes de compra', 'Aprueba solicitudes de compra.', 1, 3),
(17, 'Consultar proveedores', 'Accede a la base de datos de proveedores.', 1, 3),
(18, 'Control de presupuestos de compra', 'Administra los fondos para adquisiciones.', 1, 3),
(19, 'Acceso a Libros Contables', 'Consulta registros contables y balances.', 1, 4),
(20, 'Registrar Transacciones', 'Permite registrar ingresos y egresos.', 1, 4),
(21, 'Generar estados financieros', 'Crea informes contables y balances.', 1, 4),
(22, 'Conciliación bancaria', 'Realiza y valida conciliaciones bancarias.', 1, 4),
(23, 'Ver Stock Disponible', 'Consulta existencias en almacén.', 1, 5),
(24, 'Actualizar Movimiento de Inventario', 'Registra entradas y salidas de productos.', 1, 5),
(25, 'Registrar productos', 'Agrega artículos al inventario.', 1, 5),
(26, 'Actualizar stock', 'Modifica las cantidades existentes.', 1, 5),
(27, 'Generar reportes de inventario', 'Obtiene estadísticas y reportes de productos.', 1, 5),
(28, 'Consultar Contratos', 'Permite ver contratos registrados.', 1, 6),
(29, 'Subir Documentos Legales', 'Carga nuevos contratos o demandas.', 1, 6),
(30, 'Revisar contratos', 'Permite la lectura y edición de contratos.', 1, 6),
(31, 'Asesoría legal interna', 'Brinda soporte legal a otras áreas.', 1, 6),
(32, 'Gestión de litigios', 'Administra procesos legales.', 1, 6),
(33, 'Asignar Rutas de Entrega', 'Define rutas para choferes.', 1, 7),
(34, 'Actualizar Estado de Entrega', 'Permite marcar productos como entregados.', 1, 7),
(35, 'Planificar rutas de entrega', 'Define las rutas logísticas.', 1, 7),
(36, 'Monitorear entregas', 'Consulta el estado de las entregas en curso.', 1, 7),
(37, 'Asignar transportistas', 'Asigna personal a tareas logísticas.', 1, 7),
(38, 'Registrar Incidencia de Mantenimiento', 'Reporta una falla o revisión.', 1, 8),
(39, 'Actualizar Estado de Reparación', 'Cambia el estatus de mantenimiento.', 1, 8),
(40, 'Registrar incidencias', 'Reporta problemas técnicos o estructurales.', 1, 8),
(41, 'Programar revisiones', 'Agendar mantenimientos preventivos.', 1, 8),
(42, 'Validar mantenimientos realizados', 'Revisar y aprobar trabajos finalizados.', 1, 8),
(43, 'Registrar Nuevo Proveedor', 'Permite alta de proveedores.', 1, 9),
(44, 'Evaluar Proveedores', 'Permite calificar calidad del proveedor.', 1, 9),
(45, 'Registrar nuevos proveedores', 'Alta de proveedores en el sistema.', 1, 9),
(46, 'Evaluar desempeño de proveedores', 'Analiza métricas de cumplimiento.', 1, 9),
(47, 'Negociar contratos', 'Participa en la negociación de acuerdos.', 1, 9),
(48, 'Registrar Empleados', 'Alta de nuevos empleados.', 1, 10),
(49, 'Editar Datos del Empleado', 'Permite actualizar información personal.', 1, 10),
(50, 'Gestionar nómina', 'Control de salarios y pagos.', 1, 10),
(51, 'Aplicar sanciones/bonificaciones', 'Aplica medidas disciplinarias o incentivos.', 1, 10),
(52, 'Acceso al Servidor', 'Permite ingreso a configuraciones del servidor.', 1, 11),
(53, 'Modificar Base de Datos', 'Permite realizar cambios directos en BD.', 1, 11),
(54, 'Implementar Seguridad TI', 'Aplica políticas de seguridad informática.', 1, 11),
(55, 'Administrar usuarios', 'Gestiona credenciales y accesos.', 1, 11),
(56, 'Configurar servidores', 'Gestiona el hardware del sistema.', 1, 11),
(57, 'Auditoría de seguridad', 'Analiza y valida logs del sistema.', 1, 11),
(58, 'Atender Tickets de Nivel 1', 'Gestiona solicitudes básicas de soporte.', 1, 12),
(59, 'Asignar Tickets de Soporte', 'Reasigna casos a otro técnico o nivel.', 1, 12),
(60, 'Cerrar Tickets', 'Permite cerrar un caso de soporte.', 1, 12),
(61, 'Asignar tickets', 'Redirecciona solicitudes a técnicos.', 1, 12),
(62, 'Responder solicitudes', 'Brinda soporte al usuario final.', 1, 12),
(63, 'Escalar incidentes', 'Envía problemas complejos a niveles superiores.', 1, 12),
(64, 'Registrar Venta', 'Permite ingresar una venta al sistema.', 1, 13),
(65, 'Ver Estadísticas de Ventas', 'Consulta el rendimiento comercial.', 1, 13),
(66, 'Modificar Precios', 'Permite ajustes sobre precios de productos.', 1, 13),
(67, 'Registrar ventas', 'Agrega operaciones al sistema.', 1, 13),
(68, 'Generar cotizaciones', 'Elabora presupuestos para clientes.', 1, 13),
(69, 'Seguimiento de prospectos', 'Da seguimiento a potenciales clientes.', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `n_id` int(11) NOT NULL,
  `n_name` varchar(30) NOT NULL,
  `n_desc` varchar(250) DEFAULT NULL,
  `n_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`n_id`, `n_name`, `n_desc`, `n_stat`) VALUES
(1, '1 - Crítica', 'Impacto total en operaciones. Requiere atención inmediata.', 1),
(2, '2 - Alta', 'Impacto significativo, pero no total. Necesita solución rápida.', 1),
(3, '3 - Medio', 'Impacto moderado. Puede esperar un tiempo razonable.', 1),
(4, '4 - Baja', 'Impacto menor o solicitud sin urgencia.', 1),
(5, '5 - Informativo', 'No es una falla. Es una consulta o solicitud general.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `p_id` int(11) NOT NULL,
  `p_tit` varchar(50) NOT NULL,
  `p_desc` varchar(250) DEFAULT NULL,
  `p_stat` int(11) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`p_id`, `p_tit`, `p_desc`, `p_stat`, `area_id`) VALUES
(1, 'Gerente Administrativo', 'Supervisa las actividades administrativas generales.', 1, 1),
(2, 'Asistente Administrativo', 'Apoya en tareas operativas y documentación.', 1, 1),
(3, 'Coordinador de Oficina', 'Coordina recursos y procesos administrativos.', 1, 1),
(4, 'Representante de Atención al Cliente', 'Atiende solicitudes y dudas de clientes.', 1, 2),
(5, 'Analista de Satisfacción', 'Evalúa y mejora la experiencia del cliente.', 1, 2),
(6, 'Supervisor de Servicio al Cliente', 'Lidera el equipo de atención.', 1, 2),
(7, 'Jefe de Compras', 'Gestiona adquisiciones estratégicas.', 1, 3),
(8, 'Analista de Compras', 'Realiza pedidos y análisis de proveedores.', 1, 3),
(9, 'Asistente de Compras', 'Apoya en gestiones operativas de compras.', 1, 3),
(10, 'Responsable Recursos Financieros', 'Lleva el control de ingresos y egresos.', 1, 4),
(11, 'Auxiliar Contable', 'Apoya en registros y conciliaciones.', 1, 4),
(12, 'Analista Financiero', 'Realiza proyecciones y análisis contable.', 1, 4),
(13, 'Encargado de Inventarios', 'Administra entradas y salidas de stock.', 1, 5),
(14, 'Auxiliar de Almacén', 'Realiza conteos y organización.', 1, 5),
(15, 'Supervisor de Logística de Inventario', 'Coordina inventarios en diferentes puntos.', 1, 5),
(16, 'Abogado Corporativo', 'Asesora legalmente a la empresa.', 1, 6),
(17, 'Asistente Legal', 'Gestiona documentación legal.', 1, 6),
(18, 'Analista de Contratos', 'Revisa términos y condiciones legales.', 1, 6),
(19, 'Coordinador de Logística', 'Planea rutas y entregas.', 1, 7),
(20, 'Chofer de Reparto', 'Distribuye productos a clientes.', 1, 7),
(21, 'Encargado de Recepción', 'Recibe mercancías y verifica estado.', 1, 7),
(22, 'Técnico de Mantenimiento', 'Realiza reparaciones generales.', 1, 8),
(23, 'Supervisor de Mantenimiento', 'Coordina equipos técnicos.', 1, 8),
(24, 'Especialista en Infraestructura', 'Mantiene sistemas eléctricos, hidráulicos.', 1, 8),
(25, 'Coordinador de Proveedores', 'Gestiona relación con proveedores.', 1, 9),
(26, 'Analista de Evaluación de Proveedores', 'Control de calidad de servicios recibidos.', 1, 9),
(27, 'Especialista en Contrataciones', 'Negocia contratos con terceros.', 1, 9),
(28, 'Jefe de Recursos Humanos', 'Dirige políticas de personal.', 1, 10),
(29, 'Analista de Reclutamiento', 'Gestiona procesos de selección.', 1, 10),
(30, 'Especialista en Nómina', 'Procesa pagos y beneficios.', 1, 10),
(31, 'Administrador de Sistemas', 'Administra infraestructura TI.', 1, 11),
(32, 'Desarrollador Backend', 'Desarrolla servicios y APIs.', 1, 11),
(33, 'Desarrollador Frontend', 'Desarrolla interfaces para usuarios.', 1, 11),
(34, 'Ingeniero de Seguridad', 'Protege sistemas contra amenazas.', 1, 11),
(35, 'Técnico de Soporte Nivel 1', 'Atiende fallas básicas de usuarios.', 1, 12),
(36, 'Técnico de Soporte Nivel 2', 'Resuelve incidentes complejos.', 1, 12),
(37, 'Líder de Soporte Técnico', 'Coordina a los técnicos de soporte.', 1, 12),
(38, 'Ejecutivo de Ventas', 'Realiza venta directa a clientes.', 1, 13),
(39, 'Coordinador de Ventas', 'Monitorea KPIs y metas de ventas.', 1, 13),
(40, 'Especialista en Cuentas Clave', 'Gestiona relaciones con clientes estratégicos.', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto_permisos`
--

CREATE TABLE `puesto_permisos` (
  `pp_id` int(11) NOT NULL,
  `pue_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `sc_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sc_name` varchar(50) NOT NULL,
  `sc_desc` varchar(250) DEFAULT NULL,
  `sc_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`sc_id`, `cat_id`, `sc_name`, `sc_desc`, `sc_stat`) VALUES
(1, 1, 'Daño físico', 'Diagnóstico y reparación física de PCs', 1),
(2, 1, 'Equipo no enciende', 'Soporte a dispositivos que no arrancan', 1),
(3, 1, 'Problemas con periféricos', 'Fallas en mouse, teclado, monitor, etc.', 1),
(4, 1, 'Problemas con accesorios', 'Fallas en audífonos, micrófono, cámara, etc.', 1),
(5, 1, 'Soporte a impresoras', 'Configuración y diagnóstico de impresoras', 1),
(6, 2, 'Instalación de software', 'Instalación y configuración de programas', 1),
(7, 2, 'Errores al ejecutar aplicaciones', 'Solución de errores o cierres inesperados', 1),
(8, 2, 'Actualización de software', 'Aplicación de parches o nuevas versiones', 1),
(9, 2, 'Gestión de licencias de software', 'Revisión y activación de licencias', 1),
(10, 2, 'Problemas con Microsoft Office', 'Errores o configuración de Word, Excel, etc.', 1),
(11, 2, 'Encriptación (Bitlocker)', 'Solicitud de clave de desencriptado de Bitlocker', 1),
(12, 3, 'Fallas de conexión a internet', 'Problemas generales de conectividad', 1),
(13, 3, 'Conflictos de dirección IP', 'Revisión y asignación de direcciones IP', 1),
(14, 3, 'Problemas con red Wi-Fi', 'Fallas en redes inalámbricas internas', 1),
(15, 3, 'Configuración de VPN', 'Soporte en accesos remotos vía VPN', 1),
(16, 3, 'Recursos compartidos en red', 'Acceso a impresoras, carpetas, unidades', 1),
(17, 4, 'Soporte al sistema operativo', 'Windows, Linux, MacOS y más', 1),
(18, 4, 'Reinstalación del sistema operativo', 'Formateo y restauración del equipo', 1),
(19, 4, 'Gestión de usuarios del sistema', 'Alta, baja o modificación de usuarios', 1),
(20, 4, 'Errores de permisos o accesos', 'Restricciones indebidas en archivos o apps', 1),
(21, 4, 'Errores de arranque del sistema', 'Sistema operativo no inicia correctamente', 1),
(22, 5, 'Restablecimiento de contraseñas', 'Cambio o recuperación de claves de acceso', 1),
(23, 5, 'Desbloqueo de cuentas', 'Desbloqueo de accesos a cuentas', 1),
(24, 5, 'Alta de nuevo equipo de usuario', 'Registro y configuración inicial', 1),
(25, 5, 'Configuración de correo electrónico', 'Outlook, Gmail corporativo, etc.', 1),
(26, 5, 'Reporte de lentitud del equipo', 'Análisis de rendimiento y solución', 1),
(27, 5, 'Capacitación de uso', 'Guía de uso de equipos y sistemas', 1),
(28, 6, 'Recuperación de accesos', 'Reinicio o desbloqueo de accesos', 1),
(29, 6, 'Solicitudes de permisos especiales', 'Acceso a carpetas, aplicaciones o bases de datos', 1),
(30, 6, 'Reporte de malware o virus', 'Identificación de software malicioso', 1),
(31, 6, 'Alerta de phishing o estafa', 'Correos o sitios sospechosos', 1),
(32, 6, 'Autenticación en dos pasos (2FA)', 'Problemas con el segundo factor de autenticación', 1),
(33, 7, 'Consulta general de TI', 'Dudas sobre procesos o servicios de tecnología', 1),
(34, 7, 'Problemas no clasificados', 'Incidencias que no encajan en otras categorías', 1),
(35, 7, 'Errores aleatorios o poco frecuentes', 'Eventos no reproducibles', 1),
(36, 7, 'Recomendación o mejora sugerida', 'Propuestas de optimización en TI', 1),
(37, 1, 'Soporte preventivo o proactivo', 'Solicitudes no derivadas de fallos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subestatus`
--

CREATE TABLE `subestatus` (
  `se_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `se_name` varchar(50) NOT NULL,
  `se_desc` varchar(250) DEFAULT NULL,
  `se_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subestatus`
--

INSERT INTO `subestatus` (`se_id`, `est_id`, `se_name`, `se_desc`, `se_stat`) VALUES
(1, 1, 'Pendiente de asignación', 'Aún no asignado a un técnico específico', 1),
(2, 1, 'Recibido por soporte', 'Ticket recibido por el área correspondiente', 1),
(3, 2, 'En diagnóstico', 'Se está evaluando el problema reportado', 1),
(4, 2, 'En reparación', 'Ya se inició la solución del problema', 1),
(5, 2, 'Esperando validación interna', 'Esperando confirmación de un área técnica', 1),
(6, 3, 'Esperando respuesta del usuario', 'Se necesita información adicional del usuario', 1),
(7, 3, 'Esperando evidencia del usuario', 'Se necesita evidencia adicional del usuario', 1),
(8, 3, 'Esperando repuesto', 'A la espera de una pieza o recurso físico', 1),
(9, 3, 'Esperando disponibilidad técnica', 'Soporte técnico no disponible temporalmente', 1),
(10, 4, 'Escalado a nivel 2', 'Derivado a soporte técnico especializado', 1),
(11, 4, 'Escalado a proveedor externo', 'Caso enviado al fabricante o proveedor', 1),
(12, 5, 'Solución aplicada', 'El técnico aplicó la solución al incidente', 1),
(13, 5, 'Pendiente de confirmación del usuario', 'Esperando validación por parte del usuario', 1),
(14, 6, 'Ticket resuelto', 'Cierre automático del ticket tras resolución', 1),
(15, 6, 'Solicitado por usuario', 'Cierre solicitado o validado por el usuario', 1),
(16, 6, 'Error de reporte', 'El ticket fue reportado por equivocación', 1),
(17, 6, 'Ticket duplicado', 'El ticket es duplicado de uno existente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `t_id` int(11) NOT NULL,
  `t_num` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `t_tit` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `area_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `t_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `niv_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `sest_id` int(11) DEFAULT NULL,
  `t_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `t_crea` datetime NOT NULL,
  `t_upd` datetime NOT NULL,
  `t_close` datetime DEFAULT NULL,
  `t_close_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`t_id`, `t_num`, `t_tit`, `area_id`, `emp_id`, `t_phone`, `cat_id`, `scat_id`, `niv_id`, `est_id`, `sest_id`, `t_desc`, `t_crea`, `t_upd`, `t_close`, `t_close_user`) VALUES
(1, 'INC20250423001', 'Primer ticket de prueba', 12, 1, '(234) 234-2342', 2, 7, 5, 3, 6, 'Se realizó una actualización en la descripción del ticket durante la implementación web.', '2025-04-23 00:03:20', '2025-09-01 05:29:31', NULL, NULL),
(2, 'INC20250423002', 'Segundo ticket de prueba', 12, 1, '(234) 234-2342', 2, 7, 2, 2, 3, '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>', '2025-04-23 00:04:20', '2025-04-23 00:04:20', NULL, NULL),
(3, 'INC20250423003', 'Tercer ticket de prueba', 1, 1, '(345) 345-3453', 7, 33, 3, 3, 6, '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>', '2025-04-23 00:27:43', '2025-04-23 00:27:43', NULL, NULL),
(4, 'INC20250423004', 'Cuarto Ticket de Prueba', 11, 1, '(123) 123-1231', 2, 7, 4, 6, 14, '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>', '2025-04-23 00:30:20', '2025-09-01 21:16:44', '2025-09-01 21:16:44', 1),
(5, 'INC20250630001', 'Quinto ticket de prueba', 14, 2, '(123) 412-3413', 2, 8, 3, 6, 14, '<p>Este es un ticket de prueba</p><p>Este ticket ha sido modificado.</p>', '2025-06-29 23:29:18', '2025-08-29 03:15:18', '2025-08-29 03:15:18', 1),
(6, 'INC20250703001', 'Otro ticket de prueba más', 14, 2, '(123) 456-7890', 7, 33, 4, 6, 14, '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>', '2025-07-03 01:07:42', '2025-07-03 01:07:42', NULL, NULL),
(7, 'INC20250708001', 'Prueba de ticket con imagenes', 14, 2, '(443) 346-2649', 2, 8, 4, 3, 8, '<p>Este es un ticket de prueba con imagenes para verificar su funcionamiento.</p><p><img src=\"data:image/png;base64,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\" alt=\"\"></p>', '2025-07-08 06:41:23', '2025-09-01 21:18:36', NULL, NULL);
INSERT INTO `tickets` (`t_id`, `t_num`, `t_tit`, `area_id`, `emp_id`, `t_phone`, `cat_id`, `scat_id`, `niv_id`, `est_id`, `sest_id`, `t_desc`, `t_crea`, `t_upd`, `t_close`, `t_close_user`) VALUES
(8, 'INC20250901001', 'Probando la creación de un ticket en web', 4, 13, '(443) 110-1998', 2, 8, 3, 2, 3, '<p>Esta sería la descripción del primer ticket de prueba en web.</p><p><img src=\"data:image/png;base64,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Sw8f0kbDWrvtttu+b/fdV199db6GRlHE0XjvmSixGxkbR8YEdfPveteOu+260+hRrazTB77guW+HWo+Pgdz7Sy+99N3vfM9uu++2+577vvzKxO9952ujR+C+u2/bZ5+9k0oNUhHYHbbdydjo6acnIuJ/fuONtxJwgYCBi6aULEJk676FTCophmm+W0NEWIfMJv0nFtAJ+0/aD762orvtAEUVgiPIch+y3DvnaAtCavVVV33ve961xSYbisutgffeMAYU3kBkuTCMQs9avgWQoiTmyjjokEP+ec+dN91y2z/vvuePp/9hi03XzBqdE158+bxzL/7wxw786IGHfPQjx334w0d017u7G7PheriWGjnPaqCID+q2qQm1EuYRimeF7ersUTWRc58VgmpCJQefwZcnjc3ypMx/RxfFFnviayaKDQmdKHcsSUwc+3p3TwhudFsyevhwl6VJZCtR5D0sYIWNFJ28ZWmW84QcIhAE02g0kmqFArkN8oHl4nyjWok32WSjPfbY47LLLvvrZZf89a+XXn75JRef99vtt92SyHXBs0lGOANGTMTPtMLXBFCe954qBUhLS6sY53yD76/syRhDPprhP7DAigd376Xw1kJkgcDLvffckDjnEHxLS0slTryng21UIkm7u3KX5rlTC9O/5qwP4jtOqpFNXE6fa2wUEbtpngWARz6QSBAnpuZT7L7XrtfddPVjDz/mHVxoTJ8549HHX7aUlSSpD8ELv+5SBBl5TllFL4Cx1MwKVA3n60lF4piq8aOVZ2DlJi21BcxStxysDY0O2RO7wcPx0INgikUUpCZ4lzUkuMQgtpJE1goTpprwTh+MKAJb55kj4glLbvQDgvOODwfnKAoMUpTlOUxUGb/Bpj899Wdf+/KXjjj0kIMPPfDIow5rnzU9d4AkzkTB53ygGAFDCLpHZyLPex8+zqukPK8b60rvzieAMao8qzVp6SywIprP5XSlwYiBFbpVT2cOuDw1QgdN2CkAU34N9bnAM8GTGxqXq6OoiCi2PH8kB+BWI4iJf/STn3zq0yenzhONguCDj2xRnrdsusWO199w1R9+98uzzz73r3+5Yvf3bMdtC6T2/d/+cb993sn+BPrE+PCHPnzSiSf5kBPTn/vcZ0866ZOWyyWpXXHF5WuttUZM7x7UuxdCm9HSW2CFgzv3wjZKrJEszyBms802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Rl9w4Z+eemEmiNesZ/rk6V//2rfe/a6d3/vu937zOz975dV2PZaU/P5rrzrygA89+vRLdXBb3PHMI/fu8/6Db7ztQRA0rnvSs09/6tgTdnnPXocdduKDDz145PEnfPOnZ3ZRl6SS02Eby0UkWdcDd974hc98ctd37bzfXnv9+CendvSwBuAbE5569NjjTtjxvXt84ICP/vBHP+nuzosZ8tyiF/5dmBCxubE8kLEe7HPchhv94je/3Hy14ddccOYTL05lX/fcde83vvLlh598hnDv7pj++198/2Mf2nunnXc69Mjj737kKb4yE9Y/+ebXj9h/30P3P+Bj7//gRz78sf0O+PBNdz5GPpsUqgzNqDDm0gxtELfJ8zyJawFxT8rPM1EUV5DVkzZ8dO93cVQPPfIEdyOzp792+HGfuPGfD7z7Pbvusfuu11/1t+OPO3La7C5INOv1mTNnTK8bPWBBo84jlxnt3bN6Up/1zJgy+bhPfeHfT76487vftfF647/46eOefeLhKVNnZpQLbyLb09Al89xjj3z5s59uNHr23f/966299pX/+Mfnv/INFtRnTPn8p45r7+r+8te+9bGDP37nnXddfP55gZjmo4Prk0L4OIiLl2vhQoUtZy+YltGjP/b+3Uw258mnnyNeZ78+c/qrUyqVCh8sX/vyV6699tqtdthp7/fvP3v6KyefcNQjjz1PfcTGab3bBl+pVCdMmj55anscV/Rhw16GLpUGG7rjW8DIHGFSb2R8I620xpx4gl53Eb79Xe9YX7ybOnUqGp2/+80vp8yu/+asS7/zgx9991tfv+C0H3TMeP6nvzqtM6Bt+JjMZd25HswjqiCTbpfnBjxD+full03tir/9i9N/9JNTfnDK/9x5zZ9WrWJ4tUorB+8dXLWllenNNt7i73/92+9PP+PL3/j6b0/77bt23umRJ198bWY6ZeJzPe3TDjzwwD333eWgww78y1/+esJxR8eGzxrd8WTcWUnOfZTPXZ5lLkfm6N25PUvg7Tu22aQ7b5/48iTyWpLY5T3d9S4+fX74g5/99fLrP//N7379W988/SdfHxf13HXXPQ3gK6d859Ibb7jwH3896KCDus3IIz/xxffutGENxRvFAow2RFg0/hAZyWIOIxDskY15fmGj7i66TVQSqzfkL7/0QtrTU+U5dhyeevKJrbffacNNVhFCxsjmW66/7ZYbPPfSpEZAd6pYq1Qqnl3mPk6qmYnAz1VZz7NPPzNq1XU32GpzuljYFBVpNVne3alAjaxBaKSpFgVz3dXXf+yQwz744Q/95dyzR49ozRHilmStdTYct+r4H37/lMMOPPKPv/7tpIkTEds6wJdWCGIjfOzwg6qxoZZUKjHEAmR6jzx/7IUJleGjapW4BeBiTGITWxZj0quzv/ClUz52yPHHn/TJrhmvjkikEuvyA0uN//c99//id6dttOkWhxyyX0xhgYdROiyObEiSGZKjWsSgiDZuZuDqVYLGEkWgr4ShHVpvuP2B1pbqdlttgno9dy6JiIg+SblvS2o+hJ4UzpqWltbI+4SFVoI1jdQ7b4j4Wq3W0jqiUgN3JqBTbtRr1kaRt4LiL2SCRDYH/nThhWefe+Fue+7z29//Ydzo0XfcdH1A1pXBDB9/1oV///zJnxhhu67802lHH37Qqf/31y42BULgCyUXBVvnwTVClrXPZgcADEwdiVx3z9Oz3Ijt3rFZ5NAS8WGT+jx9bWbPp7/wjamvd3/nq1/7xuc/d+3V102f/nqeNriEufTQ1fWT358f2lb+6Y+/O7bGLjJTHndS6hAlTvMQHdlChiWIGIxPQ9pZAQhZy2M/jzP/eOFN9z216aYbb7/1xqi2jBu36qsvPT9tcocayMis12Y//MRz41cd01Yl9NJ6vcfXU7pDiHQ36kmSGAjRN3LEiMnPP/X0vyfEAohBd+jMxRlFF8SKns0Qtbj//vvXXmudw444Ztyqq797/3333H3XPE+TKiRO7PDhxxx37EUXnX/LnbfttMN2V99w2+wG+O3LUCAA54jKShLBpSuNJNLR1VNnz6efefYt9z66wWZb77jNxhWb5Rn3ammtIpMmvjBnzpxDDjlk263X23jDjT7z+S+MXmVVE+npELLG1//nyy++POWU7/941ZWqFvCeJ5UsMuxnqNJQHtuC5szkcMRWJQ6zp77y8+99/9Qffv+rX/ni+/bb/3eX3ZaM3/x73/teC8HpceKnPjN7ygvf+cJJ999x8zVXX33il3/weqPyiaM+PgyoxrkRd84ZZ953379vuerKr37jSzEaPu2BrRx88MGjMOsHnz/6f3/50zPOOO8jR37mlc54hjd1qpLK8NoIC5d58CBo4isvP/fcc4AJHZ3PvfBSbCqhgSf/fdch79/j73/9+8xZ9ckvvTZjdsfw1igR7onYLATCO65A4pC72dMnfvcbp/7kB7/44Q9+usu+B/7ijItHjlvt5784lZV5vGMMv4vFeb1ztZVaRrS6B+67tdFAMHLnfffPaWTdBDafMKed8e+77918gw1CvXHXrffecfsD02bWUxhPVYcumaE7tAWOTCI+6m1LV72nJ+++5tp/XPG3y++5624b1479xMl/vvzCNVZtE7aLaptut/OPfvDdaZNe+sL/+9wpp3zn1VmdPzr1F9tsvrarN3bZe5/V1l773w/c/8XPffa0s8459riTYldvsXxFtKttvNnv//eXKw+v/fmiC667+pqvffv7tZFjKi2tGYCkrafBt8vuFoNjTzxhlfHjTzzxxO133PnI4z/RNmpUVXwSwtprrrXJ5pt//0c/3mvf/Q86/KgZM2f/4DtfGpXABCSxBQz4bIiH1X3UOWfWXbfdcOXlf7n55puDRF/44lf+/reLxo2OPb9/iQ3JsFxi7u/XXm3V44454o7bb9rlve/bYed3P/rU84iSihXu6B594ulg46effPzzJ5/0ja9+6Wtf+eJ999w/5NEw5AdIoA0kI6iaqO2vt9x0/b/uufOhB+7710N3/fP+m6669pNHfGik5dcfYgqQmPS+ffa9+a67rr/59ltvu+PW667d4707EnFJtYLamHMvu+rqq66gjEv/cdOBhx/70N03f2Sf94CvkFLZcJt3Xnbltfffd89f/3rJ5husEbn6qEoSA6i0XHztjX/81Y+4fWpdaew5l/7ljjvuvPWmWy746z9O/fX/3nPT31YdLi2jx51y6u/vuvveW26+8eZ//vPKq6/aeqPVeFpCXx3o3PkF1FRQHXPpDXc98OD99951078evOe+e/9567VXH3fIR4dHqnwsMTV/zwcPvunBJzbdaMuKVA79+BG33nnHbbdc/8/bb/vSN39w++33/M+xhwwHfvyHM6976Il7HrjrsYf/+dC/7vzXvXd89IBdIxTDp7ZDlFY4uAOc0wh8NzXgrlcJRlBy9RiOacCAjwHGMG3DR7a2tsURjxm1rqKOdSUaO3b0sFZC0QKWn0gj5GmWTp0x56MHHnbZX/4+c+r0Zx5+9Etf+/qsWbP2eM9OMaAfiYy+srJBkARJS0s1LiRE3NZzExID2qlJKpVqS0uLemFrI7Az7VeKAKokFZiiLnoD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eEH4xHjnO3facdttVhoz2gjGjhp51OEHfeK4I/bZY7csrXNXM6ytdcftt9lq80032XiDJLKUzonnatMU+k3tUSjBuSfxKaXEqn2kTKbFI4piGynsHHKO04W82LV0d3XEcRxF1nrEIhUmrAwf3mbgc669nu40TcFmIllKQUtB3NA4CgCP9jM+3IR+fYetN91zj135CHWNer2nqxbH79hyc46LS8PxmDWgtVaNRKLIZFmDDj4UY1yKvt/WJv1z8Lb28h8K94toT0BkjXRE6zCanr52+qtTbPCRQXdHJx+vsbGW3i+Axl/qoToXbJxYa+lBN91onU032WC7rbYMLutonzNp4iuUHPPtwJg4jrfdepstNtt4+623bKsleVrniV4URQ190S1HMEAF6lryGAdeC6IQyoVKIew9TfPZs2df8qeLbr3xhkajRxu4lO+i3uUMjUaDz5kEMqq1lY8jrj0TQpW+V+styRUCREjOKeJtEnPx8Eys3nDrrjn+sEM++oH377PFJhuutspYG5wAkQTCHCGb/PKEqZMnuTylMnTw7DIArADeSsKyD2bZq7AYGig26O1IWpno90atqBmdV1FvxOc9HU+1knBnaY201CqRqGP23gVOodYFAtuWqcWOHYhjoi3nl/yenkcfeSoWrLXm+LGjRxHQ7bNmcpkhz4LPR40csfba4y3CtKlTnnj8MUGgtw0OfObMY2WFQG/vHr43hQGpkkWdAz1r8EUIxsZ8X67VPvSBA/bYfVcjYa211/j4YYdtscnGG663/hEfP/TwQw/ecYftEiNdnR3e5w4heE/vPqC3Uu4i41CUsmvA8OlkpAzkPv/8s8JbCGPHjNp9l3ftsdt7hrdGHBfXm6N3p3VchuAqcUKsd3V19T9+2YiWAFhXk8v2Wi6UGGgCGpw0kNOfJqr5cqpxH0uAMaNHbrXVVttss3VsYJNkg/XW2W6brbZ5x1ajR44yRpzjVqK3NiuHYiJ784t5M4aterobdFo8EHz66afb2zsqkd1t111GtA1bafRoIHBpDR/WsuOOO9YidHd33nn7rT09XVwkXIp0tCk/9hR9UYHi3htxNfSmFngTgTFRFIkIN9B0sYCp1VpHDGttrSTMJkk0vCXabqt3vO+929cStFRky802X3v86hVruDiNYSzxUnh3Eb7ucLFQCHukE4kiRfA7Ntsk8EAouDiy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\" alt=\"\"></p>', '2025-09-01 03:30:55', '2025-09-01 05:28:17', NULL, NULL);
INSERT INTO `tickets` (`t_id`, `t_num`, `t_tit`, `area_id`, `emp_id`, `t_phone`, `cat_id`, `scat_id`, `niv_id`, `est_id`, `sest_id`, `t_desc`, `t_crea`, `t_upd`, `t_close`, `t_close_user`) VALUES
(9, 'INC20250901002', 'Toner 85a', 4, 13, '(443) 110-1998', 1, 5, 4, 2, 5, 'Solicito un toner nuevo 85a', '2025-09-01 17:49:36', '2025-09-01 18:36:41', NULL, NULL),
(10, 'INC20250903001', 'Ticket de prueba', 11, 1, '(573) 573-7543', 1, 1, 5, 2, 5, 'Este es otro ticket de prueba.&nbsp;puchainita rica', '2025-09-03 08:18:17', '2025-09-03 08:22:49', NULL, NULL),
(11, 'INC20251022001', 'Verificación de cambios con campos dinámicos', 1, 2, '(123) 123-1231', 7, 33, 4, 1, 1, 'Este es un nuevo ticket probando nuevas funcionalidades con campos dinámicos', '2025-10-22 08:22:38', '2025-10-22 08:22:38', NULL, NULL),
(12, 'INC20251022002', 'Segundo ticket de prueba para campos dinámicos', 1, 2, '(123) 123-1231', 1, 1, 4, 1, 1, 'Probando funcionalidad \"Required\" en campo dinámico.', '2025-10-22 08:23:41', '2025-10-22 08:23:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_detalles`
--

CREATE TABLE `ticket_detalles` (
  `td_id` int(11) NOT NULL,
  `tick_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `td_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `td_data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `td_crea` datetime NOT NULL,
  `td_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ticket_detalles`
--

INSERT INTO `ticket_detalles` (`td_id`, `tick_id`, `emp_id`, `td_desc`, `td_data`, `td_crea`, `td_stat`) VALUES
(1, 1, 12, 'Esta es una respuesta de seguimiento al ticket de parte del Usuario', NULL, '2025-07-02 14:06:18', 1),
(2, 1, 8, 'Esta es una respuesta de seguimiento al ticket de parte de Soporte', NULL, '2025-07-02 15:24:40', 1),
(3, 1, 12, 'Esta es otra respuesta de seguimiento al ticket de parte del Usuario', NULL, '2025-07-03 02:04:10', 1),
(4, 1, 8, 'Esta es otra respuesta de seguimiento al ticket de parte de Soporte', NULL, '2025-07-03 02:14:15', 1),
(5, 1, 12, 'Esta es una última respuesta de seguimiento al ticket de parte del Usuario ', NULL, '2025-07-03 02:34:46', 1),
(6, 5, 1, 'Esta es una respuesta de seguimiento al ticket de parte del Usuario', NULL, '2025-07-03 02:16:50', 1),
(7, 5, 8, 'Esta es una respuesta de seguimiento al ticket de parte de Soporte', NULL, '2025-07-03 02:16:50', 1),
(8, 5, 1, 'Esta es otra respuesta de seguimiento al ticket de parte del Usuario', NULL, '2025-07-03 02:16:50', 1),
(9, 5, 8, 'Esta es otra respuesta de seguimiento al ticket de parte de Soporte', NULL, '2025-07-03 02:16:50', 1),
(10, 7, 2, 'Este es un mensaje de prueba del botón \"Enviar\"Este es un mensaje de prueba del botón \"Enviar\"', NULL, '2025-07-08 07:43:59', 1),
(11, 7, 2, '<p>Este es un mensaje de prueba del botón \"Enviar\".</p><p><img src=\"data:image/png;base64,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\" alt=\"\"></p>', NULL, '2025-07-08 07:44:37', 1),
(12, 7, 1, 'Este es un mensaje de respuesta para probar que se actualice en tiempo real la linea de tiempo de mensajes.', NULL, '2025-07-08 07:55:21', 1),
(13, 1, 1, 'ESta es una respuesta de prueba.', NULL, '2025-08-12 04:35:42', 1),
(14, 1, 1, '<p>Prueba de corrección de código JS</p>', NULL, '2025-08-24 01:29:30', 1),
(15, 1, 1, 'Verificación de función', NULL, '2025-08-24 03:02:23', 1),
(16, 6, 1, 'Esta es una nota de ejemplo.', NULL, '2025-08-25 02:33:51', 1),
(17, 5, 2, 'Este es un último mensaje de prueba tras el cierre del ticket por parte de soporte.', NULL, '2025-08-29 01:47:05', 1),
(18, 8, 1, '<p>Se confirma la correcta creación del ticket, aunque fue creado en entorno local. Sin embargo, esta respuesta es creada en entorno web.</p><p><br></p>', NULL, '2025-09-01 05:24:26', 1),
(19, 8, 13, 'Se confirma la correcta lectura desde el perfil relacionado, se procSe confirma la correcta lectura desde el perfil relacionado, se confirma que no se pueden ver tickets no asignados.', NULL, '2025-09-01 05:26:34', 1),
(20, 4, 1, 'RESPUESTA DE TICKET', NULL, '2025-09-01 21:15:52', 1),
(21, 1, 14, 'Verificando que el departamento de Sistemas puede acceder a los detalles de un ticket.', NULL, '2025-09-02 08:17:22', 1),
(22, 10, 1, '<p>Este es un mensaje de prueba.</p>', NULL, '2025-09-03 08:22:22', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`a_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `e_uid` (`e_uid`),
  ADD UNIQUE KEY `e_mail` (`e_mail`),
  ADD KEY `pue_id` (`pue_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`st_id`),
  ADD UNIQUE KEY `st_name` (`st_name`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `per_name` (`per_name`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`n_id`),
  ADD UNIQUE KEY `n_name` (`n_name`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_tit` (`p_tit`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `puesto_permisos`
--
ALTER TABLE `puesto_permisos`
  ADD PRIMARY KEY (`pp_id`),
  ADD KEY `pue_id` (`pue_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`sc_id`),
  ADD UNIQUE KEY `sc_name` (`sc_name`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `subestatus`
--
ALTER TABLE `subestatus`
  ADD PRIMARY KEY (`se_id`),
  ADD UNIQUE KEY `se_name` (`se_name`),
  ADD KEY `est_id` (`est_id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `t_num` (`t_num`),
  ADD KEY `fk_ticket_area` (`area_id`),
  ADD KEY `fk_ticket_empleado` (`emp_id`),
  ADD KEY `fk_ticket_categoria` (`cat_id`),
  ADD KEY `fk_ticket_subcategoria` (`scat_id`),
  ADD KEY `fk_ticket_prioridad` (`niv_id`),
  ADD KEY `fk_ticket_estatus` (`est_id`),
  ADD KEY `fk_ticket_subestatus` (`sest_id`),
  ADD KEY `fk_tickets_close_user` (`t_close_user`);

--
-- Indices de la tabla `ticket_detalles`
--
ALTER TABLE `ticket_detalles`
  ADD PRIMARY KEY (`td_id`),
  ADD KEY `tick_id` (`tick_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `puesto_permisos`
--
ALTER TABLE `puesto_permisos`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `subestatus`
--
ALTER TABLE `subestatus`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ticket_detalles`
--
ALTER TABLE `ticket_detalles`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`pue_id`) REFERENCES `puestos` (`p_id`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`);

--
-- Filtros para la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `puestos_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`);

--
-- Filtros para la tabla `puesto_permisos`
--
ALTER TABLE `puesto_permisos`
  ADD CONSTRAINT `puesto_permisos_ibfk_1` FOREIGN KEY (`pue_id`) REFERENCES `puestos` (`p_id`),
  ADD CONSTRAINT `puesto_permisos_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `permisos` (`per_id`);

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`c_id`);

--
-- Filtros para la tabla `subestatus`
--
ALTER TABLE `subestatus`
  ADD CONSTRAINT `subestatus_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `estatus` (`st_id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_ticket_area` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`),
  ADD CONSTRAINT `fk_ticket_categoria` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`c_id`),
  ADD CONSTRAINT `fk_ticket_empleado` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`e_id`),
  ADD CONSTRAINT `fk_ticket_estatus` FOREIGN KEY (`est_id`) REFERENCES `estatus` (`st_id`),
  ADD CONSTRAINT `fk_ticket_prioridad` FOREIGN KEY (`niv_id`) REFERENCES `prioridad` (`n_id`),
  ADD CONSTRAINT `fk_ticket_subcategoria` FOREIGN KEY (`scat_id`) REFERENCES `subcategorias` (`sc_id`),
  ADD CONSTRAINT `fk_ticket_subestatus` FOREIGN KEY (`sest_id`) REFERENCES `subestatus` (`se_id`),
  ADD CONSTRAINT `fk_tickets_close_user` FOREIGN KEY (`t_close_user`) REFERENCES `empleados` (`e_id`);

--
-- Filtros para la tabla `ticket_detalles`
--
ALTER TABLE `ticket_detalles`
  ADD CONSTRAINT `ticket_detalles_ibfk_1` FOREIGN KEY (`tick_id`) REFERENCES `tickets` (`t_id`),
  ADD CONSTRAINT `ticket_detalles_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`e_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
