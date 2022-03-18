/*
SQLyog Community
MySQL - 10.4.22-MariaDB : Database - nasa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_nombre` varchar(45) NOT NULL COMMENT 'Nombre claro del banner',
  `banner_ipublicacion` datetime NOT NULL COMMENT 'Fecha inicio de publicación',
  `banner_fpublicacion` datetime NOT NULL COMMENT 'Fecha fin de publicación',
  `banner_path` varchar(100) NOT NULL COMMENT 'Ruta en el servidor de la imagen',
  `banner_descripcion` varchar(45) DEFAULT NULL COMMENT 'Descripción clara del banner y/o información que se agrega al banner',
  `banner_contenido_id` int(11) NOT NULL COMMENT 'Id de tipo de contenido',
  `banner_usuario_id` int(11) NOT NULL COMMENT 'Id del usuario que agregó el banner',
  `banner_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del banner',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`banner_id`),
  KEY `fk_banner_contenido_idx` (`banner_contenido_id`),
  KEY `fk_banner_usuarios_idx` (`banner_usuario_id`),
  KEY `fk_banner_estados_idx` (`banner_estado_id`),
  CONSTRAINT `fk_banner_contenido` FOREIGN KEY (`banner_contenido_id`) REFERENCES `contenido` (`contenido_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_banner_estados` FOREIGN KEY (`banner_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_banner_usuarios` FOREIGN KEY (`banner_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `banner` */

insert  into `banner`(`banner_id`,`banner_nombre`,`banner_ipublicacion`,`banner_fpublicacion`,`banner_path`,`banner_descripcion`,`banner_contenido_id`,`banner_usuario_id`,`banner_estado_id`,`create_at`,`update_at`) values 
(1,'Formación de líderes para el mundo','2022-03-18 16:41:45','2022-03-24 16:41:48','/path','Formación de líderes para el mundo complejo',1,1,1,'2022-03-17 16:42:27',NULL);

/*Table structure for table `contenido` */

DROP TABLE IF EXISTS `contenido`;

CREATE TABLE `contenido` (
  `contenido_id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido_nombre` varchar(45) NOT NULL COMMENT 'Nombre de la sección y/o tipo de contenido',
  `contenido_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del tipo de contenido',
  `contenido_usuario_id` int(11) NOT NULL COMMENT 'Id usuario del tipo de contenido',
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`contenido_id`),
  KEY `fk_contenido_estados_idx` (`contenido_estado_id`),
  KEY `fk_contenido_usuarios_idx` (`contenido_usuario_id`),
  CONSTRAINT `fk_contenido_estados` FOREIGN KEY (`contenido_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contenido_usuarios` FOREIGN KEY (`contenido_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contenido` */

insert  into `contenido`(`contenido_id`,`contenido_nombre`,`contenido_estado_id`,`contenido_usuario_id`,`creat_at`,`update_at`) values 
(1,'Banner Principal',1,1,'2022-03-17 16:37:12',NULL),
(2,'Banner Secundario',1,1,'2022-03-17 16:37:30',NULL),
(3,'Informativo',1,1,'2022-03-17 16:37:36',NULL),
(4,'Eventos',1,1,'2022-03-17 16:40:44',NULL),
(5,'Noticias',1,1,'2022-03-17 16:41:02',NULL),
(6,'Novedades',1,1,'2022-03-17 16:41:19',NULL);

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `curso_id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_nombre` varchar(45) NOT NULL COMMENT 'Nombre Claro y descriptivo del curso',
  `curso_link` varchar(100) NOT NULL COMMENT 'Link del curso en el subsistema',
  `curso_descripcion` varchar(255) DEFAULT NULL COMMENT 'Descripción clara del curso',
  `curso_finicio` datetime NOT NULL COMMENT 'Fecha inicio del curso',
  `curso_fin` datetime NOT NULL COMMENT 'Fecha finalización del curso',
  `curso_usuario_id` int(11) NOT NULL COMMENT 'Id del usuario que creo el curso',
  `curso_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del curso',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`curso_id`),
  KEY `fk_cursos_usuarios_idx` (`curso_usuario_id`),
  KEY `fk_cursos_estados_idx` (`curso_estado_id`),
  CONSTRAINT `fk_cursos_estados` FOREIGN KEY (`curso_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cursos_usuarios` FOREIGN KEY (`curso_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cursos` */

/*Table structure for table `docentes` */

DROP TABLE IF EXISTS `docentes`;

CREATE TABLE `docentes` (
  `docente_id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_nombres` varchar(100) NOT NULL COMMENT 'Nombres del docente',
  `docente_apellidos` varchar(100) NOT NULL COMMENT 'Apellidos del docente',
  `docente_facebook` varchar(45) DEFAULT NULL COMMENT 'Dirección URL del perfil de Facebook del docente',
  `docente_instagram` varchar(45) DEFAULT NULL COMMENT 'Dirección URL del perfil de Instagram del docente',
  `docente_youtube` varchar(45) DEFAULT NULL COMMENT 'Dirección URL del canal de Youtube del docente',
  `docente_linkedin` varchar(45) DEFAULT NULL COMMENT 'Dirección URL del perfil de LinkedIn del docente',
  `docente_foto` varchar(45) NOT NULL COMMENT 'Ruta interna en el servidor para la foto',
  `docente_titulo` varchar(45) DEFAULT NULL COMMENT 'Titulación oficial del docente',
  `docente_puestoactual` varchar(45) DEFAULT NULL COMMENT 'Puesto actual del docente',
  `docente_educacion` varchar(45) DEFAULT NULL COMMENT 'Titulación académica del docente',
  `docente_descripcion` longtext DEFAULT NULL COMMENT 'Descripción y/o información reelevante del docente',
  `docente_pagina` varchar(45) NOT NULL COMMENT 'Dirección URL de la pagina creada para el docente',
  `docente_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del docente',
  `docente_usuario_id` int(11) NOT NULL COMMENT 'Id del usuario que creo el docente',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`docente_id`),
  KEY `fk_docentes_estados_idx` (`docente_estado_id`),
  KEY `fk_docentes_usuarios_idx` (`docente_usuario_id`),
  CONSTRAINT `fk_docentes_estados` FOREIGN KEY (`docente_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_docentes_usuarios` FOREIGN KEY (`docente_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `docentes` */

/*Table structure for table `docentes_cursos` */

DROP TABLE IF EXISTS `docentes_cursos`;

CREATE TABLE `docentes_cursos` (
  `docentes_docente_id` int(11) NOT NULL,
  `cursos_curso_id` int(11) NOT NULL,
  PRIMARY KEY (`cursos_curso_id`,`docentes_docente_id`),
  KEY `fk_docentes_has_cursos_cursos_idx` (`cursos_curso_id`),
  KEY `fk_docentes_has_cursos_docentes_idx` (`docentes_docente_id`),
  CONSTRAINT `fk_docentes_has_cursos_cursos` FOREIGN KEY (`cursos_curso_id`) REFERENCES `cursos` (`curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_docentes_has_cursos_docentes` FOREIGN KEY (`docentes_docente_id`) REFERENCES `docentes` (`docente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `docentes_cursos` */

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_nombre` varchar(45) NOT NULL COMMENT 'Nombre descriptivo del estado',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estados` */

insert  into `estados`(`estado_id`,`estado_nombre`,`create_at`,`update_at`) values 
(1,'Activo','2022-03-17 16:32:29',NULL),
(2,'Inactivo','2022-03-17 16:32:29',NULL),
(3,'Pendiente','2022-03-17 16:32:29',NULL);

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `evento_id` int(11) NOT NULL AUTO_INCREMENT,
  `evento_nombre` varchar(45) NOT NULL COMMENT 'Nombre promocional del evento',
  `evento_descripcion` varchar(255) NOT NULL COMMENT 'Descripción clara del evento',
  `evento_link` varchar(100) NOT NULL COMMENT 'Dirección URL / Link del evento (Teams - Zoom - Meet)',
  `evento_finicio` datetime NOT NULL COMMENT 'Fecha de inicio del evento',
  `evento_hinicio` time NOT NULL COMMENT 'Hora de inicio del evento',
  `evento_fin` datetime DEFAULT NULL COMMENT 'Fecha de finalización del evento',
  `evento_hfin` time DEFAULT NULL COMMENT 'Hora de finalización del evento',
  `evento_encargado` varchar(100) NOT NULL COMMENT 'Nombre de la persona encargada del evento',
  `evento_usuario_id` int(11) NOT NULL COMMENT 'Id del usuario que agregó el evento',
  `evento_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del evento',
  `evento_contenido_id` int(11) NOT NULL COMMENT 'Id de tipo de contenido',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`evento_id`),
  KEY `fk_eventos_usuarios_idx` (`evento_usuario_id`),
  KEY `fk_eventos_estados_idx` (`evento_estado_id`),
  KEY `fk_eventos_contenido_id` (`evento_contenido_id`),
  CONSTRAINT `fk_eventos_contenido` FOREIGN KEY (`evento_contenido_id`) REFERENCES `contenido` (`contenido_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_eventos_estados` FOREIGN KEY (`evento_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_eventos_usuarios` FOREIGN KEY (`evento_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `eventos` */

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `noticia_id` int(11) NOT NULL AUTO_INCREMENT,
  `noticia_titulo` varchar(100) NOT NULL COMMENT 'Ttitulo promocional de la noticia',
  `noticia_contenido` longtext NOT NULL COMMENT 'Redacción clara de la noticia',
  `noticia_ipublicacion` datetime NOT NULL COMMENT 'Fecha de inicio de la publicación de la noticia',
  `noticia_fpublicacion` datetime NOT NULL COMMENT 'Fecha de finalización de la publicación de la noticia',
  `noticia_adjunto` varchar(100) DEFAULT NULL COMMENT 'Ruta en el servidor de la imagen adjunta de la noticia',
  `noticia_contenido_id` int(11) NOT NULL COMMENT 'Id de tipo de contenido',
  `noticia_usuario_id` int(11) NOT NULL COMMENT 'Id del usuario que agregó la noticia',
  `estados_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado de la noticia',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`noticia_id`),
  KEY `fk_noticias_contenido_idx` (`noticia_contenido_id`),
  KEY `fk_noticias_usuarios_idx` (`noticia_usuario_id`),
  KEY `fk_noticias_estados_idx` (`estados_estado_id`),
  CONSTRAINT `fk_noticias_contenido` FOREIGN KEY (`noticia_contenido_id`) REFERENCES `contenido` (`contenido_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticias_estados` FOREIGN KEY (`estados_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticias_usuarios` FOREIGN KEY (`noticia_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `noticias` */

/*Table structure for table `prospectos` */

DROP TABLE IF EXISTS `prospectos`;

CREATE TABLE `prospectos` (
  `prospecto_id` int(11) NOT NULL AUTO_INCREMENT,
  `prospecto_nombre1` varchar(45) NOT NULL COMMENT 'Primer nombre del prospecto',
  `prospecto_nombre2` varchar(45) DEFAULT NULL COMMENT 'Segundo nombre del prospecto',
  `prospecto_apellido1` varchar(45) NOT NULL COMMENT 'Primer apellido del prospecto',
  `prospecto_apellido2` varchar(45) DEFAULT NULL COMMENT 'Segundo apellido del prospecto',
  `prospecto_correo` varchar(100) NOT NULL COMMENT 'Correo electronico del prospecto',
  `prospecto_telefono` varchar(45) NOT NULL COMMENT 'Número telefonico del prospecto',
  `prospecto_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del prospecto dentro del sistema',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`prospecto_id`),
  KEY `fk_prospectos_estados_idx` (`prospecto_estado_id`),
  CONSTRAINT `fk_prospectos_estados` FOREIGN KEY (`prospecto_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `prospectos` */

/*Table structure for table `prospectos_cursos` */

DROP TABLE IF EXISTS `prospectos_cursos`;

CREATE TABLE `prospectos_cursos` (
  `prospectos_prospecto_id` int(11) NOT NULL,
  `cursos_curso_id` int(11) NOT NULL,
  PRIMARY KEY (`prospectos_prospecto_id`,`cursos_curso_id`),
  KEY `fk_prospectos_has_cursos_cursos_idx` (`cursos_curso_id`),
  KEY `fk_prospectos_has_cursos_prospectos_idx` (`prospectos_prospecto_id`),
  CONSTRAINT `fk_prospectos_has_cursos_cursos1` FOREIGN KEY (`cursos_curso_id`) REFERENCES `cursos` (`curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prospectos_has_cursos_prospectos1` FOREIGN KEY (`prospectos_prospecto_id`) REFERENCES `prospectos` (`prospecto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `prospectos_cursos` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(45) NOT NULL COMMENT 'Nombre descriptivo del rol',
  `rol_descripcion` varchar(255) NOT NULL COMMENT 'Descripción de las actividades y/o funcaionalidades del rol',
  `rol_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del rol',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`rol_id`),
  KEY `fk_roles_estados_idx` (`rol_estado_id`),
  CONSTRAINT `fk_roles_estados` FOREIGN KEY (`rol_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `roles` */

insert  into `roles`(`rol_id`,`rol_nombre`,`rol_descripcion`,`rol_estado_id`,`create_at`,`update_at`) values 
(1,'Super Adminsitrador','Super Administrador ',1,'2022-03-17 16:32:29',NULL);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(255) NOT NULL COMMENT 'Nombres del usuario',
  `usuario_apellidos` varchar(255) NOT NULL COMMENT 'Apellidos del usuario',
  `usuario_usuario` varchar(45) NOT NULL COMMENT 'NickName del usuario con el que realizará la autenticación en el sistema',
  `usuario_correo` varchar(100) NOT NULL COMMENT 'Dirección de correo del usuario',
  `usuario_contrasena` varchar(255) NOT NULL COMMENT 'Contraseña encriptada del usuario',
  `usuario_foto` varchar(45) DEFAULT NULL COMMENT 'Ruta en el servidor de la foto de perfil del usuario',
  `usuario_estado_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Id estado del usuario',
  `usuario_rol_id` int(11) NOT NULL COMMENT 'Id del rol al que pertenece el usuario',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Fecha de creación',
  `update_at` timestamp NULL DEFAULT NULL COMMENT 'Fecha de modificación',
  PRIMARY KEY (`usuario_id`),
  KEY `fk_usuarios_roles_idx` (`usuario_rol_id`),
  KEY `fk_usuarios_estados_idx` (`usuario_estado_id`),
  CONSTRAINT `fk_usuarios_estados` FOREIGN KEY (`usuario_estado_id`) REFERENCES `estados` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`usuario_rol_id`) REFERENCES `roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`usuario_id`,`usuario_nombre`,`usuario_apellidos`,`usuario_usuario`,`usuario_correo`,`usuario_contrasena`,`usuario_foto`,`usuario_estado_id`,`usuario_rol_id`,`create_at`,`update_at`) values 
(1,'Gabriel ','Aguilera Gutierrez','gabriel_aguilera','gabriel_aguilera20201@unihorizonte.edu.co','gabriel_aguilera',NULL,1,1,'2022-03-17 16:32:30',NULL),
(2,'Yadira','Vargas','yadira_vargas','yadira_vargas20202@unihorizonte.edu.co','yadira_vargas',NULL,1,1,'2022-03-17 16:32:30',NULL),
(3,'Johan Sebastian','Diaz','johan_diaz','johan_diaz20201@unihorizonte.edu.co','johan_diaz',NULL,1,1,'2022-03-17 16:32:30',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
