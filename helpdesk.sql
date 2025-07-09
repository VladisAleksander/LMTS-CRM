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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='Tabla de Áreas de la empresa';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Administración','Planta alta, oficina central','Coordina y supervisa las operaciones generales de la empresa, asegurando el cumplimiento de objetivos y políticas.',1),(2,'Clientes','Planta baja, oficina lateral','Atiende consultas, gestiona solicitudes y da seguimiento a la experiencia de los clientes.',1),(3,'Compras','Oficina 1, almacén','Gestiona adquisiciones de bienes y servicios necesarios para el funcionamiento de la empresa.',1),(4,'Contabilidad','Planta alta, oficina lateral izquierda','Registra, controla y analiza las operaciones financieras de la empresa.',1),(5,'Inventarios','Oficina 2, almacén','Controla la entrada, salida y existencia de productos o materiales.',1),(6,'Jurídico','Planta alta, zona de oficinas privadas','Asesora legalmente y gestiona contratos, riesgos legales y cumplimiento normativo.',1),(7,'Logística','Muelles de carga','Coordina transporte, almacenamiento y distribución de productos.',1),(8,'Mantenimiento','Taller anexo o sótano técnico','Realiza reparaciones y mantenimiento preventivo de instalaciones y equipos.',1),(9,'Proveedores','Oficina 3, almacén','Gestiona relaciones, contratos y entregas con los proveedores.',1),(10,'Recursos Humanos','Planta alta, oficina lateral derecha ','Recluta, capacita y gestiona al personal, así como temas laborales y bienestar.',1),(11,'Sistemas','Sala técnica o cuarto de servidores','Mantiene la infraestructura tecnológica y da soporte informático interno.',1),(12,'Soporte','Sala técnica o cuarto de servidores','Atiende incidencias técnicas y brinda asistencia a usuarios internos.',1),(13,'Ventas','Oficina con acceso a sala de exhibición o recepción','Promueve y cierra ventas, gestiona relaciones comerciales y metas de ingresos.',1),(14,'Desarrollador',NULL,'Desarrollador del sistema',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'UA000000','Administrador',NULL,NULL,'admin@elpunto.com','0','123456',31,14,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(2,'AV000001','Alejandro','Villaseñor','Villaseñor','alejandro.villasenor@elpunto.com','(443) 346-2649','123456',1,1,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(3,'CR000002','Carlos','Ramírez','Díaz','carlos.ramirez@elpunto.com','5511122233','hashed_password_2',6,2,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(4,'EG000003','Elena','Gómez','Torres','elena.gomez@elpunto.com','5544455566','hashed_password_3',10,4,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(5,'LF000004','Luis','Fernández','Ríos','luis.fernandez@elpunto.com','5588899900','hashed_password_4',15,5,0,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(6,'VC000005','Valeria','Cruz','Herrera','valeria.cruz@elpunto.com','5577332211','hashed_password_5',36,12,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(7,'RS000006','Roberto','Santos','Aguilar','roberto.santos@elpunto.com','5512345678','hashed_admin_pass',2,1,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(8,'DV000007','Diana','Vargas','Méndez','diana.vargas@elpunto.com','5598765432','hashed_leader_pass',37,12,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(9,'MH000008','Miguel','Hernández','León','miguel.hernandez@elpunto.com','5543219876','hashed_lvl1_pass',38,12,1,'2025-04-19 01:18:33','2025-04-19 01:18:33',NULL),(10,'LM129799','Lenin','Meza','Jacuinde','lenin.meza@elpunto.com','(443) 841-9282','Password123',31,11,1,'2025-04-25 00:34:08','2025-04-25 00:34:08',NULL),(11,'MA937838','Mauricio','Alcaraz','Tapia','mauricio.alcaraz@elpunto.com','(436) 172-0090','Password123',31,11,1,'2025-04-25 02:49:16','2025-04-25 02:49:16',NULL),(12,'LB121442','Luis Antonio','Bedolla','Camacho','luisantonio.bedolla@elpunto.com','(443) 477-8472','123456',28,10,1,'2025-07-02 02:04:25','2025-07-02 02:04:25',NULL);
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
INSERT INTO `prioridad` VALUES (1,'1 - Crítica','Impacto total en operaciones. Requiere atención inmediata.',1),(2,'2 - Alta','Impacto significativo, pero no total. Necesita solución rápida.',1),(3,'3 - Medio','Impacto moderado. Puede esperar un tiempo razonable.',1),(4,'4 - Baja','Impacto menor o solicitud sin urgencia.',1),(5,'5 - Informativo','No es una falla. Es una consulta o solicitud general.',1);
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
INSERT INTO `subestatus` VALUES (1,1,'Pendiente de asignación','Aún no asignado a un técnico específico',1),(2,1,'Recibido por soporte','Ticket recibido por el área correspondiente',1),(3,2,'En diagnóstico','Se está evaluando el problema reportado',1),(4,2,'En reparación','Ya se inició la solución del problema',1),(5,2,'Esperando validación interna','Esperando confirmación de un área técnica',1),(6,3,'Esperando respuesta del usuario','Se necesita información adicional del usuario',1),(7,3,'Esperando evidencia del usuario','Se necesita evidencia adicional del usuario',1),(8,3,'Esperando repuesto','A la espera de una pieza o recurso físico',1),(9,3,'Esperando disponibilidad técnica','Soporte técnico no disponible temporalmente',1),(10,4,'Escalado a nivel 2','Derivado a soporte técnico especializado',1),(11,4,'Escalado a proveedor externo','Caso enviado al fabricante o proveedor',1),(12,5,'Solución aplicada','El técnico aplicó la solución al incidente',1),(13,5,'Pendiente de confirmación del usuario','Esperando validación por parte del usuario',1),(14,6,'Cierre automático','Cierre automático del ticket tras resolución',1),(15,6,'Confirmación del usuario','Cierre solicitado o validado por el usuario',1),(16,7,'Error de reporte','El ticket fue reportado por equivocación',1),(17,7,'Ticket duplicado','El ticket es duplicado de uno existente',1);
/*!40000 ALTER TABLE `subestatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_detalles`
--

DROP TABLE IF EXISTS `ticket_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_detalles` (
  `td_id` int NOT NULL AUTO_INCREMENT,
  `tick_id` int NOT NULL,
  `emp_id` int NOT NULL,
  `td_desc` mediumtext COLLATE utf8mb4_spanish_ci,
  `td_data` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `td_crea` datetime NOT NULL,
  `td_stat` int NOT NULL,
  PRIMARY KEY (`td_id`),
  KEY `tick_id` (`tick_id`),
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `ticket_detalles_ibfk_1` FOREIGN KEY (`tick_id`) REFERENCES `tickets` (`t_id`),
  CONSTRAINT `ticket_detalles_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`e_id`),
  CONSTRAINT `ticket_detalles_chk_1` CHECK ((`td_stat` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_detalles`
--

LOCK TABLES `ticket_detalles` WRITE;
/*!40000 ALTER TABLE `ticket_detalles` DISABLE KEYS */;
INSERT INTO `ticket_detalles` VALUES (1,1,12,'Esta es una respuesta de seguimiento al ticket de parte del Usuario',NULL,'2025-07-02 14:06:18',1),(2,1,8,'Esta es una respuesta de seguimiento al ticket de parte de Soporte',NULL,'2025-07-02 15:24:40',1),(3,1,12,'Esta es otra respuesta de seguimiento al ticket de parte del Usuario',NULL,'2025-07-03 02:04:10',1),(4,1,8,'Esta es otra respuesta de seguimiento al ticket de parte de Soporte',NULL,'2025-07-03 02:14:15',1),(5,1,12,'Esta es una última respuesta de seguimiento al ticket de parte del Usuario ',NULL,'2025-07-03 02:34:46',1),(6,5,1,'Esta es una respuesta de seguimiento al ticket de parte del Usuario',NULL,'2025-07-03 02:16:50',1),(7,5,8,'Esta es una respuesta de seguimiento al ticket de parte de Soporte',NULL,'2025-07-03 02:16:50',1),(8,5,1,'Esta es otra respuesta de seguimiento al ticket de parte del Usuario',NULL,'2025-07-03 02:16:50',1),(9,5,8,'Esta es otra respuesta de seguimiento al ticket de parte de Soporte',NULL,'2025-07-03 02:16:50',1),(10,7,2,'Este es un mensaje de prueba del botón \"Enviar\"Este es un mensaje de prueba del botón \"Enviar\"',NULL,'2025-07-08 07:43:59',1),(11,7,2,'<p>Este es un mensaje de prueba del botón \"Enviar\".</p><p><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAV8AAADcCAIAAABYhDUUAAAS4UlEQVR4Ae2dXWtc1RqA07tW5PgLeuGll+cnNBfSjBSiFQJCSYs3FY83R3ohEUQIFAYvCkpEKIhiaUoTwbSlJFLtOZJiSm2FHPNhamrSamKbj5aMSWf2x3tYe8/HnmR1OjPZ07Wy8oTBjnv23uvdz7vXs9da+6tNtvE3OjG7tJpr0WdqfqGh0Bqdv6GVMzMEdiGBtu1sM3bYDj2WhYDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQLYwRh6CoaA5QSwg+UJIjwIGCOAHYyhp2AIWE4AO1ieIMKDgDEC2MEYegqGgOUEsIPlCSI8CBgjgB2MoadgCFhOADtYniDCg4AxAtjBGHoKhoDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQLYwRh6CoaA5QSwg+UJIjwIGCOAHYyhp2AIWE4AO1ieIMKDgDEC2MEYegqGgOUEsIPlCSI8CBgjgB2MoadgCFhOADtYniDCg4AxAtjBGHoKhoDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQLYwRh6CoaA5QSwg+UJIjwIGCOAHYyhp2AIWE4AO1ieIMKDgDEC2MEYegqGgOUEsIPlCSI8CBgjgB2MoadgCFhOADtYniDCg4AxAtjBGHoKhoDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQLYwRh6CoaA5QSwg+UJIjwIGCOAHYyhp2AIWE4AO1ieIMKDgDEC2MEYegqGgOUEsIPlCSI8CBgjgB2MoadgCFhOADtYniDCg4AxAtjBGHoKhoDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQLYwRh6CoaA5QSwg+UJIjwIGCOAHYyhp2AIWE4AO1ieIMKDgDEC2MEYegqGgOUEsIPlCSI8CBgjgB2MoadgCFhOADtYniDCg4AxAtjBGHoKhoDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQLYwRh6CoaA5QSwg+UJIjwIGCOAHYyhp2AIWE4AO1ieIMKDgDEC2MEYegqGgOUEsIPlCSI8CBgjgB2MoadgCFhOADtYniDCg4AxAtjBGHoKhoDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQLYwRh6CoaA5QSwg+UJIjwIGCOAHYyhp2AIWE4AO1ieIMKDgDEC2MEYegqGgOUEsIPlCSI8CBgjgB2MoadgCFhOADtYniDCg4AxAtjBGHoKhoDlBLCD5QkiPAgYI4AdjKGnYAhYTgA7WJ4gwoOAMQJO2WFqfoEPBCCQFgGn7LD+uMAHAhBIiwB2QCgQgICeAHbQc0nLvqwHAjuXAHbADhCAgJ4AdtBz2bm+J3IIpEUAO2AHCEBAT8AdO/x676+19cdpWZP1QAAC7thhYfnRb3/cRxDs0xBIi4A7dhCRheVHv977K61LQVgPBHY5AafsYOyKUwqGgIsEsIOLWWWbIJAGAeyQBkXWAQEXCWAHF7PKNkEgDQLYIQ2KrAMCLhLADi5mlW2CQBoEsEMaFFkHBFwkgB1czCrbBIE0CGCHNCiyDgi4SAA7uJhVtgkCaRDADmlQZB0QcJEAdnAxq2wTBNIggB3SoMg6IOAiAezgYlbZJgikQQA7pEGRdUDARQLYwcWssk0QSIMAdkiDIuuAgIsEsIOLWWWbIJAGAeyQBkXWAQEXCWAHF7PKNkEgDQLYIQ2KrAMCLhLADi5mlW2CQBoEsEMaFFkHBFwkgB1czCrbBIE0CGCHNCiyDgi4SAA7uJhVtgkCaRDADmlQZB0QcJEAdnAxq2wTBNIggB3SoMg6IOAiAezgYlbZJgikQQA7pEGRdUDARQK7zg43ViQ7KS9flf1Dsm9A9pyTtn4znz3nVAD7h1Qw2Um5sWJg/wqnZ4L+Af/E+15Xt9fRWWjP8EkS8Do6va5u/8T7Qf9AOD1jIENGi9wtdsj5qgbuH5J/DMre82Z0UENDe8+rwPYPqSBzfuv3iI2NoH9AGeHQ4cLBTq8shQMdybqx27+XaCg+Bzu9Q4e9ru6gf0A2NlqfIStK2BV2yE6qo/TzA9J21jovVCnjrApy34ByROv+lBc6OguvHC4coKXQIIEDmcIrh72OTuWIXfDnuB1urMhLl+WFQbulsKVr88KgCjv1vkY4PeMfPe4den23NwrKbaVmv3iHXvePHne+r+GyHb763eSwQlWjYEv9r+fXPefkq99TO0IF336HFFInEHz7XWoZsm9Fztrh09vynP1didrWOKs24dPbKew1wdAlr+NVuhIp2+FAxut4NRi6lEKGrFyFm3b46vdIDbXr3g759bmB7bYggm+/U2pothXNgrUJKEE42oJw0A43VqIOheUDkPW76azanKbHIMLpGbVzMwDZOjlGbJ0cg3DQDi9d3mFjkPWMQbx0ucmmp3/0eO1DH7+mQsA/erzJDFm8mGt2yE7uvDMU9djhhcFmTnOqk5ecoWhdqyGxZu/Q6+6d5nTKDjlfXSxQT2XbifPsG2jwQqmNDS5/TKVdUOdKvI5Oxy6UcsoO2cnokqf6u/Q7as7nG7xKKugfUJc8JY5vfG8tgVcOO9Z8cMoO+4esvxpyOz46qy61rv/P6+pmMLK1Othk3gMZr6u7/gTZP6c7drixom5VaLTLcPqBTDzc/Ln2W8Prict9d05WH8tHV5tc/KnB/2Ow3pMX4fSMuodi0+5b5/8eyQY/TIYP87Kel/VcOD4a9B5rclV1lvjk2fwf5sNZ3eeHLwrtp4O5nPwyWLlPRLOeL4LZ+VDN3OBF003N7x067NLJC3fskJ1s5vaqKwWNwVf/arJ6X4puz7k51eTiT7XD3vP1jk2qbsXBZu659Hq/D/MlJut5Kd4Slgs/MyOIYK4UzKZ/54YLJ6+raf7toFZNHg5FZG64ITv41xZlfTH8uHGhHHTqFgx37PByU0fs2A6nt9PgTy47Ir3/kxeTU9L+/vLVTbVE/7/qpuxadeYJ+/2RwaIafrngvxXP847/w6Iq4/6o38QK01vEv5UTkfByVeTex/1Pa9c0ZQdVVi7sqyqrHr947Rn/xPv6lOzAqe7YQQ06NF4Va9jh7T9kw5NLk3IlJxuhiC8T86rm9z5Q06+MV4p7866acm1Ciov8FP10UT76UxbitokvE3/KGxeLi9z0ZGNZ3r4jq55culVZTz3x1zn0oAYdGq+Z/lj0kIl7328yi5c9VZnSMxjO5VSbws/L3PVy5Sweb78cDBdyMjNcaL8QrudlatgfmZf1laimveOPRB0WXySfk6nvSwLqCxfysnA96P85XMuHF/V1UmeH4oJFbR3JBmPzqjckImsr4UhfFHOVHbzPflYz3Lvu/ytTaD/mj9yWtU3zR+uMW0z5vExdaBSjS0MP7tihuXOZsR0Gf5Q3Ep/MiKqx7/4V2T6U1ZxMPJL4nv5LY9I2rr5vLFVq9TVPxJOe0iJXogofL66WfSizkSM2HhQXmYgPI2Fkn1gldXttX323Djd1LvO9YEFE8uGX+vqp6knPsGpc+Lnw1mhwa17yIvn5oEfNH9detWXFShVVS9Xyz8etdO/yvPr1fjSIsBzVyaKGTodrMRGR9Xz4jb50nR2iBdd+juzwQTAX1/NFNU6hVpgPz2QK7RU7KDWoyXHAx4oBL98OR64ro4nIrdNe+7bt0NFZ2pgd/687dmjuKU/acYeJ2YodyoMIb/6pkh3/pMYXQvkkagu8+KuaHg9VxEaI7dD2H+m5UTLIRbkZijyWtyMLKDsUpCdyUD3theQ8e87Vtc+pmlx6eEndR7+4li4GJ/T1s9CeCabyqsldHoPoGVW9+nE15lesvSPZUisjqpZrk6UGQqbQfsr//INSMKfCZRGZj4YMonL9xXIzpDRPVRhPscP56Ga1SqvnA//juKySHWKvlVxWODmqOFbmPxb8khcpbntUVjM9i5h5XRnaCTNhB5Wla3fkTOLTO1axQ7Gq90vbrJoztkN7NFQ2O6dm+2RVTVdtiuq2Q9t/5dIj1TrYKMjNO3KtoIzwbtkOj0riqLvVEDuilXboCx9Kzf52XI1ziZMIi6qL8VAdvbfUqFK1LHdwjvQFUyvF8yBjg8G9ajsUmwBVRkhqorYdol+1rZ4ojPvz0XhKwmtxQ2Y5cTbkvmp6xP2aLdvyxKiSEarvkZF3QsWvK0Z37LCdnoV2VLKqIVBth7a4LZCT9quipLEm7VElTy4Sn7+YuCtv/yRnHkQdkzTs0MqeRSY6foqMndq80xdr+FY7RLVrfLgOOxwLZlQ/RMaH/ZNfqAEC9ZdoO6Rgh1z42dZqHNmhXBdunC5uWrKbkzhjGnyu1tC8Hdoz6opJV/7csUPqo5LJqq6O24m2Q1u/9DxQu8BN1TyWm78WGwLJRVT3Ya1y/kJ1YdKwQ0tHJQt9Uc9ccuHn71QE0TMcrufCsUGv/b3ogL8SZrdWwq01alPbITJLQgHRqcrU7OBdiU6sqIGDOLZj3pH4SxRGfj7oPV1sGcXdos+jh/PNXCjNX7VF27KDQxdEuWOH7ZzRXKi+ICq+GipZ1bfaoW1M1BCeFMcj42Z/chE1VOnLmWtKHP8cl4UwHTu09oxme6Y4digiC7fDq6PhVNR3KI7YZYoDe2vzwZk+/2RfMDIpy5NBVA+31KhNdojNUvSO13shXE+z7VA4Elf+vIyPBl9fCMZXJL8YKIslwohHSYpDD/EoZtyWyfqnL4SzufBqcVgk2hYJx4aDr0ttjXL/qOYXzmjGdUL9d3Ridmk116LP1Hyx9lXKq/kt9auhklVdY4d+ORONtC/8WRlBSC6SmYyMEMW8kYtOW2y77fAMroYqtGe8/uvRYbaE28+Vzg6qA6zX/3Plcil1odFoPO74NDtkvFOjlQXXbof3U7WDOp8yGI10lsKeG/WVthJ2KLtv+br66UhfMBudqoiXyK+E3xSHVIsSVCc4JmtealXV4lCtLa6GKuG3yw7NXUkdH/Nb9d+L8tqP8tp3FX1ss6BndCV1fHh86wP/ZNb/8D1d2/uY92HWP9lbar1vqSRPPMC+453M+j2JbssT56x/nVVzev/u9U9mveKlXFU/VfpKyULjzdwakpre8AZyJXVZDnbZQUTdpGT7M+kbPENRZRPuwkrWagu/cxdWxQ2W9SxE1D0I6qUV26mBFi/LHdz6g789muAObpvtwNNfktkRnv7ybMXB01+qdj+rRiXjyHhyXDJDPDnumTU3eHJccsdT3y20g4h6i5R7nQueOvvM6nlzBfHU2Z1hB55Yn8wTT6xvrrY3sBRPrE/ucOXvdrYdRNTrYdSLsCweYqw/Nt5200BFfbYDDXFgvO2mLISqL9baQUS9YI435ZWzxZvyWqIY3pRX3sO2frHZDnELornbuus/sLd0Tt6y25IqnWr7wtV35MWV3Z37LLbKS0Q9o/Wlyzvv/TcvDKqwm347nhaFuj15esY/epz332xfOt6h1/2jx116wKx2n3HcDvE2ZyfVW3DUhVKWv1zzrApyX4PvrdDmtcZEdZqzo1O96oKXazbajjiQKbxy2Otw6tGyNXaVXWEH9UgTX11JuX9IPdV+73nrBiz3nleB7R9SQeaKj4GukbVt/7SxoRzR1a2ean+ws3InRcOPk6rjRoZGa6A985doKD4HO71Dh72ubvU+m434KYLbzoL1K9gtdign4saKqoEvX1VVcd9A9LZuQ6c29pxTAewfUsFkJ9PvR5Q3ucaXcHom6B9QD7Du6m7qUZRO2yF6lIvX1e2feD/oH3C+H7F1P9l1dtiKgCkQgICWAHbQYmEiBCAg2IGdAAIQ0BPADnouTIUABLAD+wAEIKAngB30XJgKAQhgB/YBCEBATwA76LkwFQIQwA7sAxCAgJ4AdtBzYSoEIIAd2AcgAAE9Aeyg58JUCEAAO7APQAACegLYQc+FqRCAAHZgH4AABPQEsIOeC1MhAAHswD4AAQjoCWAHPRemQgAC2IF9AAIQ0BPADnouTIUABLAD+wAEIKAngB30XJgKAQhgB/YBCEBATwA76LkwFQIQwA7sAxCAgJ6AvXaYvrsYBIE+aqZCAAKtJ2CvHe4sLK2u/d16ApQAAQjoCdhrh8WlR9N3F1fX/qYFoU8dUyHQYgL22mFpNbe49OjOwtL03cWp+QU+EIDAMyZgtR2WVnN8IAABUwSwAwKCAAT0BLCDnospW1MuBOwhgB2wAwQgoCeAHfRc7PE3kUDAFAHsgB0gAAE9Aeyg52LK1pQLAXsIYAfsAAEI6AlgBz0Xe/xNJBAwRQA7YAcIQEBPADvouZiyNeVCwB4C2AE7QAACegLYQc/FHn8TCQRMEcAO2AECENATwA56LqZsTbkQsIcAdsAOEICAngB20HOxx99EAgFTBLADdoAABPQEsIOeiylbUy4E7CGAHbADBCCgJ4Ad9Fzs8TeRQMAUAeyAHSAAAT0B7KDnYsrWlAsBewj8H6oN9V2bJ/UOAAAAAElFTkSuQmCC\" alt=\"\"></p>',NULL,'2025-07-08 07:44:37',1),(12,7,1,'Este es un mensaje de respuesta para probar que se actualice en tiempo real la linea de tiempo de mensajes.',NULL,'2025-07-08 07:55:21',1);
/*!40000 ALTER TABLE `ticket_detalles` ENABLE KEYS */;
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
  `t_desc` text COLLATE utf8mb4_spanish_ci,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'INC20250423001','Primer ticket de prueba',12,1,'(234) 234-2342',2,7,1,1,1,'Descripción','2025-04-23 00:03:20','2025-04-23 00:03:20',NULL),(2,'INC20250423002','Segundo ticket de prueba',12,1,'(234) 234-2342',2,7,2,2,1,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>','2025-04-23 00:04:20','2025-04-23 00:04:20',NULL),(3,'INC20250423003','Tercer ticket de prueba',1,1,'(345) 345-3453',7,33,3,3,1,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>','2025-04-23 00:27:43','2025-04-23 00:27:43',NULL),(4,'INC20250423004','Cuarto Ticket de Prueba',11,1,'(123) 123-1231',2,7,4,4,1,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>','2025-04-23 00:30:20','2025-04-23 00:30:20',NULL),(5,'INC20250630001','Quinto ticket de prueba',4,2,'(123) 412-3413',3,14,5,5,1,'Este es un ticket de prueba','2025-06-29 23:29:18','2025-06-29 23:29:18',NULL),(6,'INC20250703001','Otro ticket de prueba más',14,2,'(123) 456-7890',7,33,4,1,1,'<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>','2025-07-03 01:07:42','2025-07-03 01:07:42',NULL),(7,'INC20250708001','Prueba de ticket con imagenes',14,2,'(443) 346-2649',2,8,4,1,1,'<p>Este es un ticket de prueba con imagenes para verificar su funcionamiento.</p><p><img src=\"data:image/png;base64,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\" alt=\"\"></p>','2025-07-08 06:41:23','2025-07-08 06:41:23',NULL);
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

-- Dump completed on 2025-07-09 12:02:45
