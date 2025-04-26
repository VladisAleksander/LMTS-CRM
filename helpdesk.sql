-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: helpdesk
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_name` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `a_locat` varchar(100) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `a_desc` varchar(250) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `a_stat` int NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='Tabla de Áreas de la empresa';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Administración','Planta alta, oficina central','Coordina y supervisa las operaciones generales de la empresa, asegurando el cumplimiento de objetivos y políticas.',1),(2,'Clientes','Planta baja, oficina lateral','Atiende consultas, gestiona solicitudes y da seguimiento a la experiencia de los clientes.',1),(3,'Compras','Oficina 1, almacén','Gestiona adquisiciones de bienes y servicios necesarios para el funcionamiento de la empresa.',1),(4,'Contabilidad','Planta alta, oficina lateral izquierda','Registra, controla y analiza las operaciones financieras de la empresa.',1),(5,'Inventarios','Oficina 2, almacén','Controla la entrada, salida y existencia de productos o materiales.',1),(6,'Jurídico','Planta alta, zona de oficinas privadas','Asesora legalmente y gestiona contratos, riesgos legales y cumplimiento normativo.',1),(7,'Logística','Muelles de carga','Coordina transporte, almacenamiento y distribución de productos.',1),(8,'Mantenimiento','Taller anexo o sótano técnico','Realiza reparaciones y mantenimiento preventivo de instalaciones y equipos.',1),(9,'Proveedores','Oficina 3, almacén','Gestiona relaciones, contratos y entregas con los proveedores.',1),(10,'Recursos Humanos','Planta alta, oficina lateral derecha ','Recluta, capacita y gestiona al personal, así como temas laborales y bienestar.',1),(11,'Sistemas','Sala técnica o cuarto de servidores','Mantiene la infraestructura tecnológica y da soporte informático interno.',1),(12,'Soporte','Sala técnica o cuarto de servidores','Atiende incidencias técnicas y brinda asistencia a usuarios internos.',1),(13,'Ventas','Oficina con acceso a sala de exhibición o recepción','Promueve y cierra ventas, gestiona relaciones comerciales y metas de ingresos.',1);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `c_desc` varchar(250) DEFAULT NULL,
  `c_stat` int NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_name` (`c_name`),
  CONSTRAINT `categorias_chk_1` CHECK ((`c_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Hardware','Categoría relacionada al soporte técnico de hardware.',1),(2,'Software','Categoría relacionada al soporte técnico de software.',1),(3,'Redes e Internet','Soporte relacionado con redes y conectividad.',1),(4,'Sistemas','Soporte relacionado con sistemas operativos y plataformas.',1),(5,'Usuario','Soporte al usuario final y equipos personales',1),(6,'Seguridad','Problemas relacionados con accesos, permisos, virus, phishing y más',1),(7,'Otros','Consultas generales o problemas no clasificados',1);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `e_uid` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `e_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `e_last1` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `e_last2` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `e_mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `e_phone` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `e_pass` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pue_id` int NOT NULL,
  `area_id` int NOT NULL,
  `e_stat` int NOT NULL,
  `e_crea` datetime NOT NULL,
  `e_mod` datetime NOT NULL,
  `e_out` datetime DEFAULT NULL,
  PRIMARY KEY (`e_id`),
  UNIQUE KEY `e_uid` (`e_uid`),
  UNIQUE KEY `e_mail` (`e_mail`),
  KEY `pue_id` (`pue_id`),
  KEY `area_id` (`area_id`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`pue_id`) REFERENCES `puestos` (`p_id`),
  CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`),
  CONSTRAINT `empleados_chk_1` CHECK ((`e_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'UA000000','Administrador',NULL,NULL,'admin@elpunto.com','0','123456',31,11,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(2,'AV000001','Alejandro','Villaseñor','Villaseñor','alejandro.villasenor@elpunto.com','4433462649','hashed_password_1',1,1,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(3,'CR000002','Carlos','Ramírez','Díaz','carlos.ramirez@elpunto.com','5511122233','hashed_password_2',6,2,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(4,'EG000003','Elena','Gómez','Torres','elena.gomez@elpunto.com','5544455566','hashed_password_3',10,4,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(5,'LF000004','Luis','Fernández','Ríos','luis.fernandez@elpunto.com','5588899900','hashed_password_4',15,5,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(6,'VC000005','Valeria','Cruz','Herrera','valeria.cruz@elpunto.com','5577332211','hashed_password_5',36,12,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(7,'RS000006','Roberto','Santos','Aguilar','roberto.santos@elpunto.com','5512345678','hashed_admin_pass',2,1,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(8,'DV000007','Diana','Vargas','Méndez','diana.vargas@elpunto.com','5598765432','hashed_leader_pass',37,12,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(9,'MH000008','Miguel','Hernández','León','miguel.hernandez@elpunto.com','5543219876','hashed_lvl1_pass',38,12,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(10,'LM129799','Lenin','Meza','Jacuinde','lenin.meza@elpunto.com','(443) 841-9282','Password123',31,11,1,'2025-04-25 00:34:08','2025-04-25 00:34:08',NULL),(11,'MA937838','Mauricio','Alcaraz','Tapia','mauricio.alcaraz@elpunto.com','(436) 172-0090','Password123',31,11,1,'2025-04-25 02:49:16','2025-04-25 02:49:16',NULL);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatus` (
  `st_id` int NOT NULL AUTO_INCREMENT,
  `st_name` varchar(30) NOT NULL,
  `st_desc` varchar(250) DEFAULT NULL,
  `st_stat` int NOT NULL,
  PRIMARY KEY (`st_id`),
  UNIQUE KEY `st_name` (`st_name`),
  CONSTRAINT `estatus_chk_1` CHECK ((`st_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES (1,'Nuevo','Ticket recién creado, sin atender aún',1),(2,'En Proceso','El equipo de soporte está trabajando en el ticket',1),(3,'En Espera','Esperando información del usuario o recurso externo',1),(4,'Escalado','El ticket fue derivado a un nivel superior de soporte',1),(5,'Resuelto','La solución fue aplicada y validada',1),(6,'Cerrado','Ticket finalizado, sin necesidad de más acciones',1),(7,'Cancelado','El ticket fue anulado por el usuario o soporte',1);
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `per_id` int NOT NULL AUTO_INCREMENT,
  `per_name` varchar(50) NOT NULL,
  `per_desc` varchar(250) DEFAULT NULL,
  `per_stat` int NOT NULL,
  `area_id` int NOT NULL,
  PRIMARY KEY (`per_id`),
  UNIQUE KEY `per_name` (`per_name`),
  KEY `area_id` (`area_id`),
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`),
  CONSTRAINT `permisos_chk_1` CHECK ((`per_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Crear tickets de Soporte','Permite al usuario crear tickets de soporte técnico.',1,1),(2,'Ver reportes generales','Permite consultar reportes comunes entre áreas.',1,1),(3,'Acceso al sistema','Acceso general al sistema para uso básico.',1,1),(4,'Acceso a Panel Administrativo','Permite acceso total al sistema administrativo.',1,1),(5,'Visualizar Reportes Financieros','Accede a reportes internos y balances.',1,1),(6,'Gestionar recursos administrativos','Administra recursos y políticas administrativas.',1,1),(7,'Autorizar presupuestos','Permite aprobar presupuestos internos.',1,1),(8,'Asignar responsabilidades','Distribuye tareas entre personal administrativo.',1,1),(9,'Ver Datos de Clientes','Permite consultar información del cliente.',1,2),(10,'Modificar Perfil del Cliente','Permite editar los datos del cliente.',1,2),(11,'Consultar historial de clientes','Visualiza el historial de interacción con clientes.',1,2),(12,'Editar información de clientes','Modifica datos personales o preferencias del cliente.',1,2),(13,'Crear reportes de clientes','Genera informes de comportamiento de clientes.',1,2),(14,'Crear Orden de Compra','Permite generar solicitudes de compra.',1,3),(15,'Modificar Proveedores','Edita información de proveedores.',1,3),(16,'Autorizar órdenes de compra','Aprueba solicitudes de compra.',1,3),(17,'Consultar proveedores','Accede a la base de datos de proveedores.',1,3),(18,'Control de presupuestos de compra','Administra los fondos para adquisiciones.',1,3),(19,'Acceso a Libros Contables','Consulta registros contables y balances.',1,4),(20,'Registrar Transacciones','Permite registrar ingresos y egresos.',1,4),(21,'Generar estados financieros','Crea informes contables y balances.',1,4),(22,'Conciliación bancaria','Realiza y valida conciliaciones bancarias.',1,4),(23,'Ver Stock Disponible','Consulta existencias en almacén.',1,5),(24,'Actualizar Movimiento de Inventario','Registra entradas y salidas de productos.',1,5),(25,'Registrar productos','Agrega artículos al inventario.',1,5),(26,'Actualizar stock','Modifica las cantidades existentes.',1,5),(27,'Generar reportes de inventario','Obtiene estadísticas y reportes de productos.',1,5),(28,'Consultar Contratos','Permite ver contratos registrados.',1,6),(29,'Subir Documentos Legales','Carga nuevos contratos o demandas.',1,6),(30,'Revisar contratos','Permite la lectura y edición de contratos.',1,6),(31,'Asesoría legal interna','Brinda soporte legal a otras áreas.',1,6),(32,'Gestión de litigios','Administra procesos legales.',1,6),(33,'Asignar Rutas de Entrega','Define rutas para choferes.',1,7),(34,'Actualizar Estado de Entrega','Permite marcar productos como entregados.',1,7),(35,'Planificar rutas de entrega','Define las rutas logísticas.',1,7),(36,'Monitorear entregas','Consulta el estado de las entregas en curso.',1,7),(37,'Asignar transportistas','Asigna personal a tareas logísticas.',1,7),(38,'Registrar Incidencia de Mantenimiento','Reporta una falla o revisión.',1,8),(39,'Actualizar Estado de Reparación','Cambia el estatus de mantenimiento.',1,8),(40,'Registrar incidencias','Reporta problemas técnicos o estructurales.',1,8),(41,'Programar revisiones','Agendar mantenimientos preventivos.',1,8),(42,'Validar mantenimientos realizados','Revisar y aprobar trabajos finalizados.',1,8),(43,'Registrar Nuevo Proveedor','Permite alta de proveedores.',1,9),(44,'Evaluar Proveedores','Permite calificar calidad del proveedor.',1,9),(45,'Registrar nuevos proveedores','Alta de proveedores en el sistema.',1,9),(46,'Evaluar desempeño de proveedores','Analiza métricas de cumplimiento.',1,9),(47,'Negociar contratos','Participa en la negociación de acuerdos.',1,9),(48,'Registrar Empleados','Alta de nuevos empleados.',1,10),(49,'Editar Datos del Empleado','Permite actualizar información personal.',1,10),(50,'Gestionar nómina','Control de salarios y pagos.',1,10),(51,'Aplicar sanciones/bonificaciones','Aplica medidas disciplinarias o incentivos.',1,10),(52,'Acceso al Servidor','Permite ingreso a configuraciones del servidor.',1,11),(53,'Modificar Base de Datos','Permite realizar cambios directos en BD.',1,11),(54,'Implementar Seguridad TI','Aplica políticas de seguridad informática.',1,11),(55,'Administrar usuarios','Gestiona credenciales y accesos.',1,11),(56,'Configurar servidores','Gestiona el hardware del sistema.',1,11),(57,'Auditoría de seguridad','Analiza y valida logs del sistema.',1,11),(58,'Atender Tickets de Nivel 1','Gestiona solicitudes básicas de soporte.',1,12),(59,'Asignar Tickets de Soporte','Reasigna casos a otro técnico o nivel.',1,12),(60,'Cerrar Tickets','Permite cerrar un caso de soporte.',1,12),(61,'Asignar tickets','Redirecciona solicitudes a técnicos.',1,12),(62,'Responder solicitudes','Brinda soporte al usuario final.',1,12),(63,'Escalar incidentes','Envía problemas complejos a niveles superiores.',1,12),(64,'Registrar Venta','Permite ingresar una venta al sistema.',1,13),(65,'Ver Estadísticas de Ventas','Consulta el rendimiento comercial.',1,13),(66,'Modificar Precios','Permite ajustes sobre precios de productos.',1,13),(67,'Registrar ventas','Agrega operaciones al sistema.',1,13),(68,'Generar cotizaciones','Elabora presupuestos para clientes.',1,13),(69,'Seguimiento de prospectos','Da seguimiento a potenciales clientes.',1,13);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prioridad`
--

DROP TABLE IF EXISTS `prioridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prioridad` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `n_name` varchar(30) NOT NULL,
  `n_desc` varchar(250) DEFAULT NULL,
  `n_stat` int NOT NULL,
  PRIMARY KEY (`n_id`),
  UNIQUE KEY `n_name` (`n_name`),
  CONSTRAINT `prioridad_chk_1` CHECK ((`n_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prioridad`
--

LOCK TABLES `prioridad` WRITE;
/*!40000 ALTER TABLE `prioridad` DISABLE KEYS */;
INSERT INTO `prioridad` VALUES (1,'1 - Crítico','Impacto total en operaciones. Requiere atención inmediata.',1),(2,'2 - Alto','Impacto significativo, pero no total. Necesita solución rápida.',1),(3,'3 - Medio','Impacto moderado. Puede esperar un tiempo razonable.',1),(4,'4 - Bajo','Impacto menor o solicitud sin urgencia.',1),(5,'5 - Informativo','No es una falla. Es una consulta o solicitud general.',1);
/*!40000 ALTER TABLE `prioridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puesto_permisos`
--

DROP TABLE IF EXISTS `puesto_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puesto_permisos` (
  `pp_id` int NOT NULL AUTO_INCREMENT,
  `pue_id` int NOT NULL,
  `per_id` int NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `pue_id` (`pue_id`),
  KEY `per_id` (`per_id`),
  CONSTRAINT `puesto_permisos_ibfk_1` FOREIGN KEY (`pue_id`) REFERENCES `puestos` (`p_id`),
  CONSTRAINT `puesto_permisos_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `permisos` (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto_permisos`
--

LOCK TABLES `puesto_permisos` WRITE;
/*!40000 ALTER TABLE `puesto_permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `puesto_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puestos` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `p_tit` varchar(50) NOT NULL,
  `p_desc` varchar(250) DEFAULT NULL,
  `p_stat` int NOT NULL,
  `area_id` int NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_tit` (`p_tit`),
  KEY `area_id` (`area_id`),
  CONSTRAINT `puestos_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`),
  CONSTRAINT `puestos_chk_1` CHECK ((`p_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (1,'Gerente Administrativo','Supervisa las actividades administrativas generales.',1,1),(2,'Asistente Administrativo','Apoya en tareas operativas y documentación.',1,1),(3,'Coordinador de Oficina','Coordina recursos y procesos administrativos.',1,1),(4,'Representante de Atención al Cliente','Atiende solicitudes y dudas de clientes.',1,2),(5,'Analista de Satisfacción','Evalúa y mejora la experiencia del cliente.',1,2),(6,'Supervisor de Servicio al Cliente','Lidera el equipo de atención.',1,2),(7,'Jefe de Compras','Gestiona adquisiciones estratégicas.',1,3),(8,'Analista de Compras','Realiza pedidos y análisis de proveedores.',1,3),(9,'Asistente de Compras','Apoya en gestiones operativas de compras.',1,3),(10,'Contador General','Lleva el control de ingresos y egresos.',1,4),(11,'Auxiliar Contable','Apoya en registros y conciliaciones.',1,4),(12,'Analista Financiero','Realiza proyecciones y análisis contable.',1,4),(13,'Encargado de Inventarios','Administra entradas y salidas de stock.',1,5),(14,'Auxiliar de Almacén','Realiza conteos y organización.',1,5),(15,'Supervisor de Logística de Inventario','Coordina inventarios en diferentes puntos.',1,5),(16,'Abogado Corporativo','Asesora legalmente a la empresa.',1,6),(17,'Asistente Legal','Gestiona documentación legal.',1,6),(18,'Analista de Contratos','Revisa términos y condiciones legales.',1,6),(19,'Coordinador de Logística','Planea rutas y entregas.',1,7),(20,'Chofer de Reparto','Distribuye productos a clientes.',1,7),(21,'Encargado de Recepción','Recibe mercancías y verifica estado.',1,7),(22,'Técnico de Mantenimiento','Realiza reparaciones generales.',1,8),(23,'Supervisor de Mantenimiento','Coordina equipos técnicos.',1,8),(24,'Especialista en Infraestructura','Mantiene sistemas eléctricos, hidráulicos.',1,8),(25,'Coordinador de Proveedores','Gestiona relación con proveedores.',1,9),(26,'Analista de Evaluación de Proveedores','Control de calidad de servicios recibidos.',1,9),(27,'Especialista en Contrataciones','Negocia contratos con terceros.',1,9),(28,'Jefe de Recursos Humanos','Dirige políticas de personal.',1,10),(29,'Analista de Reclutamiento','Gestiona procesos de selección.',1,10),(30,'Especialista en Nómina','Procesa pagos y beneficios.',1,10),(31,'Administrador de Sistemas','Administra infraestructura TI.',1,11),(32,'Desarrollador Backend','Desarrolla servicios y APIs.',1,11),(33,'Desarrollador Frontend','Desarrolla interfaces para usuarios.',1,11),(34,'Ingeniero de Seguridad','Protege sistemas contra amenazas.',1,11),(35,'Técnico de Soporte Nivel 1','Atiende fallas básicas de usuarios.',1,12),(36,'Técnico de Soporte Nivel 2','Resuelve incidentes complejos.',1,12),(37,'Líder de Soporte Técnico','Coordina a los técnicos de soporte.',1,12),(38,'Ejecutivo de Ventas','Realiza venta directa a clientes.',1,13),(39,'Coordinador de Ventas','Monitorea KPIs y metas de ventas.',1,13),(40,'Especialista en Cuentas Clave','Gestiona relaciones con clientes estratégicos.',1,13);
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategorias` (
  `sc_id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `sc_name` varchar(50) NOT NULL,
  `sc_desc` varchar(250) DEFAULT NULL,
  `sc_stat` int NOT NULL,
  PRIMARY KEY (`sc_id`),
  UNIQUE KEY `sc_name` (`sc_name`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`c_id`),
  CONSTRAINT `subcategorias_chk_1` CHECK ((`sc_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategorias`
--

LOCK TABLES `subcategorias` WRITE;
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` VALUES (1,1,'Daño físico','Diagnóstico y reparación física de PCs',1),(2,1,'Equipo no enciende','Soporte a dispositivos que no arrancan',1),(3,1,'Problemas con periféricos','Fallas en mouse, teclado, monitor, etc.',1),(4,1,'Problemas con accesorios','Fallas en audífonos, micrófono, cámara, etc.',1),(5,1,'Soporte a impresoras','Configuración y diagnóstico de impresoras',1),(6,2,'Instalación de software','Instalación y configuración de programas',1),(7,2,'Errores al ejecutar aplicaciones','Solución de errores o cierres inesperados',1),(8,2,'Actualización de software','Aplicación de parches o nuevas versiones',1),(9,2,'Gestión de licencias de software','Revisión y activación de licencias',1),(10,2,'Problemas con Microsoft Office','Errores o configuración de Word, Excel, etc.',1),(11,2,'Encriptación (Bitlocker)','Solicitud de clave de desencriptado de Bitlocker',1),(12,3,'Fallas de conexión a internet','Problemas generales de conectividad',1),(13,3,'Conflictos de dirección IP','Revisión y asignación de direcciones IP',1),(14,3,'Problemas con red Wi-Fi','Fallas en redes inalámbricas internas',1),(15,3,'Configuración de VPN','Soporte en accesos remotos vía VPN',1),(16,3,'Recursos compartidos en red','Acceso a impresoras, carpetas, unidades',1),(17,4,'Soporte al sistema operativo','Windows, Linux, MacOS y más',1),(18,4,'Reinstalación del sistema operativo','Formateo y restauración del equipo',1),(19,4,'Gestión de usuarios del sistema','Alta, baja o modificación de usuarios',1),(20,4,'Errores de permisos o accesos','Restricciones indebidas en archivos o apps',1),(21,4,'Errores de arranque del sistema','Sistema operativo no inicia correctamente',1),(22,5,'Restablecimiento de contraseñas','Cambio o recuperación de claves de acceso',1),(23,5,'Desbloqueo de cuentas','Desbloqueo de accesos a cuentas',1),(24,5,'Alta de nuevo equipo de usuario','Registro y configuración inicial',1),(25,5,'Configuración de correo electrónico','Outlook, Gmail corporativo, etc.',1),(26,5,'Reporte de lentitud del equipo','Análisis de rendimiento y solución',1),(27,5,'Capacitación de uso','Guía de uso de equipos y sistemas',1),(28,6,'Recuperación de accesos','Reinicio o desbloqueo de accesos',1),(29,6,'Solicitudes de permisos especiales','Acceso a carpetas, aplicaciones o bases de datos',1),(30,6,'Reporte de malware o virus','Identificación de software malicioso',1),(31,6,'Alerta de phishing o estafa','Correos o sitios sospechosos',1),(32,6,'Autenticación en dos pasos (2FA)','Problemas con el segundo factor de autenticación',1),(33,7,'Consulta general de TI','Dudas sobre procesos o servicios de tecnología',1),(34,7,'Problemas no clasificados','Incidencias que no encajan en otras categorías',1),(35,7,'Errores aleatorios o poco frecuentes','Eventos no reproducibles',1),(36,7,'Recomendación o mejora sugerida','Propuestas de optimización en TI',1),(37,1,'Soporte preventivo o proactivo','Solicitudes no derivadas de fallos',1);
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subestatus`
--

DROP TABLE IF EXISTS `subestatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subestatus` (
  `se_id` int NOT NULL AUTO_INCREMENT,
  `est_id` int NOT NULL,
  `se_name` varchar(50) NOT NULL,
  `se_desc` varchar(250) DEFAULT NULL,
  `se_stat` int NOT NULL,
  PRIMARY KEY (`se_id`),
  UNIQUE KEY `se_name` (`se_name`),
  KEY `est_id` (`est_id`),
  CONSTRAINT `subestatus_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `estatus` (`st_id`),
  CONSTRAINT `subestatus_chk_1` CHECK ((`se_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subestatus`
--

LOCK TABLES `subestatus` WRITE;
/*!40000 ALTER TABLE `subestatus` DISABLE KEYS */;
INSERT INTO `subestatus` VALUES (1,1,'Pendiente de asignación','Aún no asignado a un técnico específico',1),(2,1,'Recibido por soporte','Ticket recibido por el área correspondiente',1),(3,2,'En diagnóstico','Se está evaluando el problema reportado',1),(4,2,'En reparación','Ya se inició la solución del problema',1),(5,2,'Esperando validación interna','Esperando confirmación de un área técnica',1),(6,3,'Esperando respuesta del usuario','Se necesita información adicional del usuario',1),(7,3,'Esperando evidencia del usuario','Se necesita evidencia adicional del usuario',1),(8,3,'Esperando repuesto','A la espera de una pieza o recurso físico',1),(9,3,'Esperando disponibilidad técnica','Soporte técnico no disponible temporalmente',1),(10,4,'Escalado a nivel 2','Derivado a soporte técnico especializado',1),(11,4,'Escalado a proveedor externo','Caso enviado al fabricante o proveedor',1),(12,5,'Solución aplicada','El técnico aplicó la solución al incidente',1),(13,5,'Pendiente de confirmación del usuario','Esperando validación por parte del usuario',1),(14,6,'Cierre automático','Cierre automático por inactividad del usuario',1),(15,6,'Cierre por confirmación del usuario','Cierre solicitado o validado por el usuario',1),(16,7,'Cancelado por error de reporte','El ticket fue reportado por equivocación',1),(17,7,'Cancelado por duplicado','El ticket es duplicado de uno existente',1);
/*!40000 ALTER TABLE `subestatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `t_num` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `t_tit` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `area_id` int NOT NULL,
  `emp_id` int NOT NULL,
  `t_phone` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cat_id` int NOT NULL,
  `scat_id` int NOT NULL,
  `niv_id` int NOT NULL,
  `est_id` int NOT NULL,
  `sest_id` int DEFAULT NULL,
  `t_desc` varchar(9000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `t_crea` datetime NOT NULL,
  `t_upd` datetime NOT NULL,
  `t_close` datetime DEFAULT NULL,
  PRIMARY KEY (`t_id`),
  UNIQUE KEY `t_num` (`t_num`),
  KEY `fk_ticket_area` (`area_id`),
  KEY `fk_ticket_empleado` (`emp_id`),
  KEY `fk_ticket_categoria` (`cat_id`),
  KEY `fk_ticket_subcategoria` (`scat_id`),
  KEY `fk_ticket_prioridad` (`niv_id`),
  KEY `fk_ticket_estatus` (`est_id`),
  KEY `fk_ticket_subestatus` (`sest_id`),
  CONSTRAINT `fk_ticket_area` FOREIGN KEY (`area_id`) REFERENCES `areas` (`a_id`),
  CONSTRAINT `fk_ticket_categoria` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`c_id`),
  CONSTRAINT `fk_ticket_empleado` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`e_id`),
  CONSTRAINT `fk_ticket_estatus` FOREIGN KEY (`est_id`) REFERENCES `estatus` (`st_id`),
  CONSTRAINT `fk_ticket_prioridad` FOREIGN KEY (`niv_id`) REFERENCES `prioridad` (`n_id`),
  CONSTRAINT `fk_ticket_subcategoria` FOREIGN KEY (`scat_id`) REFERENCES `subcategorias` (`sc_id`),
  CONSTRAINT `fk_ticket_subestatus` FOREIGN KEY (`sest_id`) REFERENCES `subestatus` (`se_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'TCK-20250423-000001','Primer ticket de prueba',12,1,'(234) 234-2342',2,7,4,1,1,'Descripción','2025-04-23 00:03:20','2025-04-23 00:03:20',NULL),(2,'TCK-20250423-000002','Segundo ticket de prueba',12,1,'(234) 234-2342',2,7,4,1,1,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>','2025-04-23 00:04:20','2025-04-23 00:04:20',NULL),(3,'TCK-20250423-000003','Tercer ticket de prueba',1,1,'(345) 345-3453',7,33,4,1,1,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>','2025-04-23 00:27:43','2025-04-23 00:27:43',NULL),(4,'TCK-20250423-000004','Cuarto Ticket de Prueba',11,1,'(123) 123-1231',2,7,4,1,1,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>','2025-04-23 00:30:20','2025-04-23 00:30:20',NULL);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-25 20:35:01
