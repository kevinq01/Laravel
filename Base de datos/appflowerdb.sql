-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-09-2021 a las 02:29:55
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u863523941_appflowerdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_empaque`
--

CREATE TABLE `causa_empaque` (
  `id_causa` int(2) NOT NULL,
  `causa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `causa_empaque`
--

INSERT INTO `causa_empaque` (`id_causa`, `causa`) VALUES
(1, 'A. hidratación'),
(2, 'B. Sin trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_general`
--

CREATE TABLE `causa_general` (
  `id_causa` int(2) NOT NULL,
  `causa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `causa_general`
--

INSERT INTO `causa_general` (`id_causa`, `causa`) VALUES
(1, 'A. Picking'),
(2, 'B. Materiales'),
(3, 'C. Alistamiento incompleto'),
(4, 'D. Calidad'),
(5, 'E. Otra labor'),
(6, 'F. Capacitaciones'),
(7, 'G. Sin ordenes'),
(8, 'H. reprocesos'),
(9, 'I. Hidratación '),
(10, 'J. Falla de maquina'),
(11, 'K. Fin de labor'),
(12, 'L. Falta carros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_produccion`
--

CREATE TABLE `causa_produccion` (
  `id_causa` int(2) NOT NULL,
  `causa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `causa_produccion`
--

INSERT INTO `causa_produccion` (`id_causa`, `causa`) VALUES
(1, 'A. Picking'),
(2, 'B. Materiales'),
(3, 'C. Alistamiento incompleto'),
(4, 'D. Calidad'),
(5, 'E. Otra labor'),
(6, 'F. Capacitaciones'),
(7, 'G. Sin ordenes'),
(8, 'H. reprocesos'),
(9, 'I. Hidratación '),
(10, 'J. Falla de maquina'),
(11, 'K. Fin de labor'),
(12, 'L. Falta carros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labor_empaque`
--

CREATE TABLE `labor_empaque` (
  `id_labor` int(2) NOT NULL,
  `labor` varchar(30) NOT NULL,
  `rendimiento` int(10) NOT NULL,
  `bonificacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `labor_empaque`
--

INSERT INTO `labor_empaque` (`id_labor`, `labor`, `rendimiento`, `bonificacion`) VALUES
(1, 'Empaque', 18, 200),
(2, 'Surtidor', 36, 100),
(3, 'Zunchador', 36, 100),
(4, 'Etiqueta', 36, 100),
(5, 'Postcosecha', 60, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labor_general`
--

CREATE TABLE `labor_general` (
  `id_labor` int(2) NOT NULL,
  `labor` varchar(30) NOT NULL,
  `rendimiento` int(10) NOT NULL,
  `bonificacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `labor_general`
--

INSERT INTO `labor_general` (`id_labor`, `labor`, `rendimiento`, `bonificacion`) VALUES
(1, 'Picking', 7000, 1),
(2, 'Tinción', 2400, 1),
(3, 'Material Seco', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labor_material`
--

CREATE TABLE `labor_material` (
  `id_labor` int(2) NOT NULL,
  `labor` varchar(20) NOT NULL,
  `promedio` int(10) NOT NULL,
  `bonificacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `labor_material`
--

INSERT INTO `labor_material` (`id_labor`, `labor`, `promedio`, `bonificacion`) VALUES
(1, 'Material seco', 1300, 3),
(2, 'Florisima', 2500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labor_produccion`
--

CREATE TABLE `labor_produccion` (
  `id_labor` int(2) NOT NULL,
  `labor` varchar(30) NOT NULL,
  `rendimiento` int(10) NOT NULL,
  `bonificacion` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `labor_produccion`
--

INSERT INTO `labor_produccion` (`id_labor`, `labor`, `rendimiento`, `bonificacion`) VALUES
(1, 'Armado', 500, '3.5'),
(2, 'Armado banda', 600, '3.5'),
(3, 'Armado tallo', 0, '0.0'),
(4, 'Soporte banda', 0, '0.0'),
(5, 'Preparacion armado', 0, '0.0'),
(6, 'Preparacion banda', 1400, '1.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empaque`
--

CREATE TABLE `tbl_empaque` (
  `id_empaque` int(255) NOT NULL,
  `celula` varchar(20) NOT NULL,
  `labor` int(2) NOT NULL,
  `posicion` varchar(15) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `cajas` int(10) NOT NULL,
  `hora` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materialseco`
--

CREATE TABLE `tbl_materialseco` (
  `id_seco` int(255) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `labor` int(2) NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(10) NOT NULL,
  `hora` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_operarios`
--

CREATE TABLE `tbl_operarios` (
  `id_operario` varchar(15) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `cedula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_operarios`
--

INSERT INTO `tbl_operarios` (`id_operario`, `nombre`, `cedula`) VALUES
('100790', 'Soto Giraldo Ximena', '1193410268'),
('101196', 'PatiÑo CastaÑo Juan Pablo', '1040050206'),
('101216', 'Orozco Otalvaro Jorge Andres', '1040030509'),
('102068', 'Giraldo Romero Angie Paola', '1036840598'),
('102072', 'PatiÑo CastaÑo Tania Alexandra', '1040050319'),
('102468', 'Bolivar Rendon Valentina', '1027892201'),
('102785', 'Alvarez MuÑoz Laura Michel', '1007325984'),
('102812', 'Chavarria Vasquez Alejandro', '1001813176'),
('103759', 'Balbin Vasco Brayan Daniel', '1040049929'),
('103851', 'Bedoya PatiÑo Isabel Cristina', '1007326091'),
('103886', 'MuÑoz Moreno Shirley Daliana', '1040051808'),
('103925', 'Moreno Quejada Sebastian Andres', '1039468791'),
('104418', 'Castro Osorio Yuliana', '1040051692'),
('104467', 'Cardona Ocampo Yedison Andres', '1007326047'),
('104473', 'Guzman Rios Sebastian', '1007326061'),
('104548', 'Mejia Serna Jehiny', '1022034543'),
('104743', 'Carmona Henao Luis Felipe', '1040045239'),
('104749', 'Tabares Tobon Juan Jose', '1193151139'),
('105260', 'Arias Perez Juan Carlos', '70786964'),
('105810', 'Buritica Garcia Gloria Yuliana', '1040049973'),
('105814', 'Cartagena Vargas Wilder Alejandro', '1001764134'),
('105815', 'Castro Gonzalez Leidy Viviana', '1040040850'),
('105821', 'Lopez Quintero Anyi Carolina', '1036403309'),
('106505', 'Grajales Alzate Dahiana', '1007285801'),
('106516', 'Jimenez Henao Santiago', '1036404595'),
('106561', 'Solano Contreras Monica Del Carmen', '1003286924'),
('107360', 'Nieto Gonzalez Yessica Yulieth', '1040040538'),
('107399', 'Vargas Cadavid Jose Fernando', '70953860'),
('107403', 'Higuita Oquendo Elizabeth', '43490549'),
('107411', 'Salas Hernandez Eder Luis', '1066186812'),
('108178', 'Orozco Otalvaro Leidy', '1007471441'),
('108183', 'Marin Mora Kelly Johana', '1018345468'),
('108249', 'Lopez Marulanda Juan Luis', '15380392'),
('108368', 'Lopez Quintero Cristian Camilo', '1001477111'),
('108439', 'CastaÑeda Jimenez Juan Jose', '1007362028'),
('108490', 'Botero Garcia Sergio', '1007326072'),
('108501', 'CastaÑeda Herrera Sebastian', '1037326085'),
('108512', 'Quitian Aristizabal John Freddy', '1056775710'),
('109548', 'Arbelaez Moreno Estefania', '1001724098'),
('109866', 'Cardenas Benavides Dagoberto Manuel', '92154284'),
('109882', 'Duque Ocampo Diego De Jesus', '1040046950'),
('109934', 'Soto Acosta Kevin Hernan', '1140906287'),
('110200', 'Ramirez Alvarez Sandra Milena', '1022033587'),
('110543', 'Velez Vanegas Kelin Dahiana', '1004567707'),
('110552', 'Bustamante Florez Juan Andres', '1040051824'),
('110553', 'Carmona Mejia Juan Jose', '1007326053'),
('110554', 'CastaÑeda Herrera Mariana', '1007343530'),
('110556', 'Chavarria Oliveros Maricela', '1037266334'),
('110563', 'Gaviria Botero Shirley Dayana', '1007429861'),
('110646', 'Osorio Betancur Santiago', '1040051517'),
('11079', 'Soto Rios Juan David', '1040033872'),
('111289', 'Villa Marin Dorys Alejandra', '1032070455'),
('111291', 'Villa Marin Maria Efigenia', '21432002'),
('111298', 'Quirama Grajales Edwin Orlando', '1020430195'),
('111665', 'Ramirez Alvarez Marta Elena', '43766998'),
('111819', 'Jaramilo Jaramillo Daniela Alejandra', '1001471027'),
('111825', 'MuÑoz Trujillo Johanna Andrea', '1040045997'),
('111829', 'Pena Bracho Juan Jose', '943610730101995'),
('111833', 'Rosendo Melendez Mirla Corimar', '827413709021977'),
('111834', 'Sanchez Valencia Emilse Del Socorro', '43856421'),
('111971', 'Mendoza Torrealba Josue Jonata', '920379410101981'),
('11203', 'Valencia Naranjo Paula Andrea', '1040035602'),
('112108', 'Grajales Chica Santiago', '1007362106'),
('112118', 'Angelico Jose Gregorio', '829725326041993'),
('112219', 'Quintero Quintero Diana Marcela', '1036402640'),
('112263', 'Bran Mola Carlos Andres', '71276511'),
('112264', 'Cadavid Martinez Roman Alejandro', '71740365'),
('112267', 'Gamboa Rey Ricardo Alonso', '1090531421'),
('112268', 'Garcia Piedrahita Michael Stivent', '1036933537'),
('112269', 'Grisales PatiÑo Ximena', '1035919366'),
('112288', 'Zapata Yepes Santiago', '1007242084'),
('114261', 'Salazar CastaÑo Beatriz Elena', '1036393825'),
('114377', 'Zuleta Duque Manuela Alejandra', '1036403291'),
('11465', 'Rios Morales Liliana Marcela', '43464225'),
('114879', 'PeÑa Gomez Georgina Del Carmen', '1036404012'),
('115053', 'Arias Bermudez Juliana Andrea', '1007319575'),
('115217', 'Tangarife Rios Manuela', '1040047925'),
('115793', 'Zapata Sanchez David', '1040051804'),
('115815', 'Pulgarin Salazar Daniela Alejandra', '1044101864'),
('115816', 'Fuentes Basto Danny Alexis', '1093759064'),
('116077', 'Martinez Rodriguez Yunior Segundo', '931550801041994'),
('116090', 'Marquez CaÑaveral Luis Alfonso', '1038123350'),
('116330', 'Gallego Cardona Simon Daniel', '1001416326'),
('116384', 'Parra Suesca Lesly Daiana', '1040051765'),
('116696', 'Roman Munera Maria Fernanda', '1007325960'),
('116906', 'Tovar Perez Adileunis Alejandra', '800660505121994'),
('116971', 'Gonzalez Gomez Yeimy Paola', '1117527834'),
('117347', 'Morelo Guerrero Derwis Daniel', '1063183914'),
('117409', 'Araque Navarro Keyla Yulmary', '1094429368'),
('117414', 'Ramirez Leon Eder Antonio', '1004821168'),
('117415', 'Florez Balbin Cindy Lorena', '1040182923'),
('117544', 'Alvarez Henao Diggladiana', '1040050863'),
('117580', 'Montoya Agudelo Cesar Camilo', '1040050428'),
('117581', 'Villa Espinosa Ever Alexander', '1035830797'),
('117582', 'Rivera Florez Estefany Yulieth', '1040047324'),
('117787', 'Cuervo Cardona Maria Victoria', '1040036021'),
('117790', 'Molina Barbutin Camilo Jose', '1073973358'),
('117791', 'Pulgarin Salazar Fabian Antonio', '1044101476'),
('117800', 'Osorio Usma Natalia', '1022035693'),
('117802', 'PeÑaloza Monsalve Yeiny', '1015445699'),
('118110', 'Pacheco Guarecuco Jose Rafael', '821229519031996'),
('118113', 'Zapata Murillo Maria Alejandra', '1193144877'),
('118342', 'Arias Gomez Diego Andres', '1036403078'),
('118614', 'Blanco Hernandez Zuritza Aixileht', '1098826596'),
('118645', 'Martinez Alvarez Gilberto Antonio', '1129495339'),
('118912', 'Lozano Palacios Brayan Steven', '1003827039'),
('119051', 'Botero Orozco Tania Lizeth', '1036964084'),
('119054', 'Hurtado Orozco Daniela', '1022036617'),
('119280', 'Estrada Gonzalez Doris Eugenia', '1040034109'),
('119294', 'Garcia Higuita Michael Elias', '1001403952'),
('119296', 'MuÑoz Agudelo Luisa Fernanda', '1007356700'),
('119297', 'Orozco Valencia Francy Yulieth', '1007449628'),
('119298', 'Ortiz Valencia Jose Elquil', '98504829'),
('119299', 'PatiÑo Valencia Camila', '1040051569'),
('119630', 'PatiÑo Hernandez Brayan', '1040051311'),
('119644', 'Botero Garcia Valentina', '1000400930'),
('119645', 'CastaÑo Echeverry Jhannia Milena', '1001639816'),
('119974', 'Mazo Florez Martha Eugenia', '39444022'),
('119991', 'Rios Palacio Deisy Yurany', '1040043410'),
('120272', 'Arias Jurado Maritza', '1040051037'),
('120386', 'Rios Palacio Caren', '1007362040'),
('120395', 'Rodriguez Moreno Julio Cesar', '1007346636'),
('120632', 'PeÑaloza Sanchez Yucelis Paola', '1143406494'),
('120648', 'Roman Osorio Luz Adriana', '1040038464'),
('120865', 'Gomez Garzon Jessica', '1193477483'),
('120867', 'Gonzalez Robles Ana Mileidy', '1002361802'),
('120870', 'Mosquera Puentez Carlos Mario', '1040503097'),
('120976', 'Duran Gimenez John Kenedy', '927490405061992'),
('121033', 'Tabares Zuluaica Angie Marcela', '1056782426'),
('121046', 'Mejia Vergara Yesica Paola', '1003306839'),
('121047', 'Lopez Carmona Juliana', '1001755946'),
('121049', 'Martinez Valencia Lina Maria', '1040181339'),
('121124', 'Berrio Morales Conrado Andres', '1010116103'),
('121178', 'Henao Castro Brian Alejandro', '1001651669'),
('121420', 'Mendez Polo Carlos Mario', '1066748133'),
('121422', 'Tobon Castro Edison Obdulio', '1007362013'),
('121554', 'Arroyave Rios Mariana', '1040049427'),
('121570', 'Hernandez Aguilar Ana Belen', '1036690868'),
('122209', 'Rondon Carvajal Sergio Andres', '1017240117'),
('122211', 'Arboleda Arbelaez Tomas', '1036646889'),
('122541', 'Herrera Barco Michael Estiben', '1036647954'),
('122588', 'Gonzalez Arbelaez Maria Cristina', '1036401959'),
('122627', 'Hernandez Suaza Juan Pablo', '1007460228'),
('122729', 'Rios Isabel Cristina', '39455989'),
('122891', 'Restrepo Ramirez Cristian David', '1037610489'),
('122947', 'Castro Garcia Alejandro', '1040050423'),
('123070', 'Villa Suarez Marcel Santiago', '1036952162'),
('123079', 'Garzon Nava Diana Carolina', '1090476934'),
('123084', 'Botero Gonzalez Laura', '1001755567'),
('123094', 'Moreno Renteria Ricardo', '1007935092'),
('123192', 'Jimenez Mora Diego Fernando', '1007403878'),
('123221', 'Santos Chima Yuseth Meliza', '1100687644'),
('123343', 'Perez Osorio Sebastian', '1007568547'),
('123549', 'Torres CastaÑo Maria Antonia', '1193541838'),
('123720', 'Alvarez Rivera Mauricio Antonio', '15383978'),
('123801', 'NoreÑa Ocampo Jorge Hernan', '1040050557'),
('123802', 'Ocampo Florez Diana Marcela', '1022035758'),
('123806', 'Perez Zapata Jose Joaquin', '1001250246'),
('123875', 'Botero Cardona Valentina', '1001478083'),
('123932', 'Lopez Llano Briyit Valentina', '1040047890'),
('123976', 'Alvarez Henao Liz Mariana', '1040050864'),
('123987', 'Bedoya Montes Esneider', '1007362129'),
('124023', 'Jaramillo PatiÑo Ligia Marisol', '1007325905'),
('124026', 'Lopez Mira Isabela', '1007445899'),
('124027', 'Valencia Rios Edy Yohanna', '1040032462'),
('124106', 'Arenas Gaviria Sara', '1040045883'),
('124133', 'Aceros OmaÑa Marcos Elias', '1148459489'),
('124196', 'Rincon Villegas Andres Felipe', '1040049260'),
('124197', 'Rondon Zapata Cibell Jhaderlys', '1036690731'),
('124199', 'Zapata Julio Cesar', '71737443'),
('124242', 'Perez Botta Maria Del Mar', '1045695968'),
('124258', 'Castro Suarez Cristian', '1001144673'),
('124395', 'Ocampo Salazar Jennifer', '1040046947'),
('124400', 'Toro Rios Yonatan Alexander', '1040183155'),
('124409', 'Meza Pardo Mileidis Yiset', '1103111798'),
('124466', 'Osorio Villada Jailer Alberto', '1040051237'),
('124597', 'Beltran Barreto Angie Fernanda', '1007568575'),
('125557', 'Villa Suarez Anderson', '1036954969'),
('125660', 'PatiÑo Henao Angie Manuela', '1001651580'),
('125892', 'Blandon Buitrago Carmen Liliana', '1040050198'),
('126123', 'Sanchez Juan David', '1000757022'),
('126176', 'Rios Agudelo Juan Pablo', '1040051784'),
('126181', 'MuÑoz Lopez Luis Miguel', '1040050052'),
('126191', 'Bermudez Zapata Santiago', '1000922430'),
('126623', 'Ruiz Montoya Ana Maria', '1036949041'),
('127102', 'CastaÑo Cardona Andres Felipe', '1040048833'),
('127200', 'Granados Betancur Natalia', '1040036680'),
('127273', 'Villada Martinez Valentina', '1001651948'),
('127274', 'Garcia Zapata Isaac Alejandro', '1126426977'),
('127304', 'Zapata Alvarez Marcela', '1037655473'),
('127392', 'Ramirez Marulanda Leidy Yohanna', '1007480767'),
('127394', 'Pulgarin Otalvaro Maria Karina', '1001652114'),
('127515', 'Ramos Vega Maria Camila', '1063308158'),
('127517', 'Vergara Henao Daniela', '1040051632'),
('127533', 'Bedoya Gutierrez Claudia', '43751272'),
('127794', 'Hernandez Arias Angy Paola', '1007915731'),
('127852', 'Usuga Garcia Daniela Maria', '1007843909'),
('127899', 'Quintero Garcia Sonia Del Carmen', '42841685'),
('127983', 'Roman Bedoya Brahyan Styven', '1040048073'),
('127986', 'Rios MuÑoz Deisy Tatiana', '1040048713'),
('127987', 'Tejada Hernandez Elkin Humberto', '15431393'),
('127989', 'Velasquez Usme Diana Marcela', '43836604'),
('128020', 'Villada Alvarez Ingrid Yuliana', '1040049195'),
('128021', 'Villada Lopez Julian David', '1040048353'),
('128022', 'Zapata Henao Estefania', '1001651785'),
('128143', 'Aristizabal Cardona Miriam Graciela', '39193378'),
('128144', 'Marulanda CastaÑo Eliana', '43463765'),
('128238', 'Botero Cardona Gloria Luz', '43766176'),
('128242', 'Martinez Rave Lilibeth Liceth', '1040030831'),
('128245', 'Salgado Mendez Cindy Paola', '1069486373'),
('128246', 'Scharlotk Restrepo Glenis Sorelly', '43453366'),
('128247', 'Suarez Oviedo Nicol Tatiana', '1006117708'),
('128367', 'Agamez Moreno Juan Alberto', '1069487430'),
('128371', 'Bedoya Blandon Juliana', '1001477696'),
('128373', 'Blandon Torres Yeison Andres', '1001651752'),
('128377', 'Holguin Ramirez Simon', '1000099576'),
('128384', 'Roman Rincon Juan Camilo', '1007290738'),
('128583', 'Florez Berrio Eliodora Maria', '1067948374'),
('128589', 'Gaviria CastaÑeda Juan Felipe', '1040048888'),
('128594', 'Henao Ruiz Luz Marina', '52400386'),
('128598', 'Perez Tangarife Andres Felipe', '1040184092'),
('128600', 'Sanchez Gaviria Johan Sebastian', '1040047405'),
('128601', 'Villada Granda Yurani Andrea', '1000397969'),
('128891', 'Blanco De La Cruz Stefany', '1140864089'),
('128892', 'Gutierrez Cordoba Carolina', '1036686859'),
('128893', 'Granda Betancur Jose Alfredo', '16803843'),
('128895', 'Lopez De Martinez Perlavi Josefina', '108319105091978'),
('129015', 'Torres Ospina Yury', '1007165559'),
('129064', 'Suaza Vargas Maria Alejandra', '1001651645'),
('129156', 'Jimenez Rodas Sara', '1040051409'),
('129158', 'PeÑa Osorio Miguel', '1152223600'),
('129161', 'Carmona Martinez Liliana Andrea', '39189401'),
('129163', 'Castro Grisales Tatiana Andrea', '1007480768'),
('129165', 'Caucil Palencia Nancy Del Socorro', '50943624'),
('129168', 'Jimenez Botero Cristian Camilo', '1040051493'),
('129173', 'Rios Villada Soranyi Astrid', '39189048'),
('129175', 'Tabares Monsalve Ana Maria', '1001360397'),
('129249', 'Angel Toro Alvaro De Jesus', '1040050940'),
('129250', 'Arias Martinez Juan Jose', '1038416849'),
('129251', 'Botero Lopez Ana Maria', '1001470932'),
('129252', 'Cardona Osorio Victor Daniel', '1040049250'),
('129253', 'CastaÑo Ramirez Maria Johanna', '1040045505'),
('129254', 'Diaz Cardona Andres Felipe', '1007338209'),
('129255', 'Marin Agudelo Yovanny', '1007285864'),
('129256', 'Osorio Florez James', '1036957215'),
('129257', 'Palmas Cardenas Keylis Vanessa', '1192762039'),
('129258', 'Rios Cardona Juliana', '1001652289'),
('129259', 'Tabares Arango Diana Cristina', '1040046930'),
('129260', 'Vallejo Castro Juliana', '1001651729'),
('129505', 'Cuervo Castro Joan Sebastian', '1001723878'),
('129512', 'Florez MuÑoz Astrid Yohana', '43717872'),
('129515', 'Velez Cavadia Estefania', '1028037745'),
('129517', 'Herrera Sarmiento Belky', '1118575390'),
('129520', 'Sanchez CastaÑo Maria Camila', '1007349020'),
('129522', 'Palencia Perez Yessica', '1001598966'),
('129525', 'Montes Moreno Kenner Alberto', '1007434207'),
('129527', 'Mesa Orozco Esperanza', '1036780050'),
('129531', 'Molina Ruiz Stiver Orlando', '1036399070'),
('129715', 'Isaza Rendon Jonnathan', '1036948951'),
('129716', 'Osorio Villada Mallerly', '1040047317'),
('129717', 'Roman Cardona Maria Isabel', '1037642115'),
('129803', 'Atehortua Alzate Willinton Alejandro', '1146439439'),
('129805', 'Becerra PatiÑo Santiago', '1017239560'),
('129814', 'Maldonado Jimenez Carlos Andres', '1002029435'),
('129816', 'Mazo Gaviria Leidy Cristina', '1022034567'),
('129819', 'Rivera Ramirez Michael', '1001651536'),
('129820', 'Torres Buitrago Sonia Milena', '1013636003'),
('130003', 'Rueda Mejia Derly Yadira', '63531000'),
('130214', 'Amaya Pinillos Zulay Yolima', '60396231'),
('130223', 'Berrio Blandon Juan Andres', '1002088929'),
('130234', 'Manco Varelas Diana Yurley', '1038808739'),
('130241', 'Valencia Galvis Dahiana', '1001479675'),
('130242', 'Usuga Villa Juan Luis', '1152465919'),
('130245', 'Urrego Montoya Mayra Graciela', '1040048230'),
('130252', 'Pulgarin Herrera Jorge Humberto', '1036933751'),
('130510', 'Agudelo Giraldo Maria Estefannia', '1036401130'),
('130534', 'Rozo Pantoja Ledys Yulieth', '1068813298'),
('130535', 'Garcia Acevedo Jesus Manuel', '1044938382'),
('130539', 'Gomez Valencia John Esteban', '1040181321'),
('130541', 'Lopez Henao Yesenia', '1001478728'),
('130542', 'Munera Rojas Julian David', '1036963117'),
('130543', 'NoreÑa Ocampo Yudy Liliana', '1000656367'),
('130544', 'MuÑoz Martinez Rodrigo Antonio', '8531839'),
('130545', 'MuÑoz Ocampo Daniela', '1040048563'),
('130784', 'Alvarez Pinango Jheysson Enrique', '701963124061995'),
('130826', 'Tobon Tobon Deisy Yolanda', '1007291112'),
('130831', 'Salas Pabon Juan Pablo', '1036670719'),
('130840', 'Rodriguez Camacho Kelly Johana', '1040356684'),
('130852', 'Jimenez Cartagena Diego Armando', '1048021799'),
('130860', 'Lugo Luquez Malvis Chiquinquira', '943677021101978'),
('130863', 'MuÑoz Ospina Nayibe', '1007292397'),
('130865', 'Mendoza Escobar Valeria Sofia', '1002248248'),
('131108', 'Holguin Ocampo Andres Felipe', '1017274871'),
('131117', 'Arenas Quintero Alfonso Angel', '3474329'),
('131124', 'Gomez Alvarez Jose Hernan', '1040043432'),
('131125', 'Gonzalez Vanezca Jose Luis', '747872131101995'),
('131128', 'Graterol Rojas Robert Alejandro', '779559931072001'),
('131130', 'Gutierrez Ramirez Andres Felipe', '1040048365'),
('131138', 'Murillo Zapata Karen Paulina', '1001774276'),
('131324', 'Alvarez Celis Angy Esmeralda', '1060813'),
('131335', 'Carvajal Rojas Mayra Liceth', '101966922071982'),
('131338', 'Duran Albarran Anabel Carolina', '108396516081993'),
('131344', 'Santana Vides Julio Cesar', '1148960480'),
('131347', 'Valencia Restrepo Leidy Vanesa', '1040050594'),
('131350', 'Vargas Bustamante Juan Manuel', '1040038854'),
('131357', 'Villada Villa Nallely', '1001652348'),
('131358', 'Osorno Atehortua Mariana', '1152452934'),
('131381', 'Gaviria Ortiz Valentina', '1001652284'),
('131516', 'Diaz Navarro Anyelo Enrique', '944168619051992'),
('131518', 'Garcia Aguirre Joverley', '15388158'),
('131524', 'Ospino Medina Shirli', '1048932606'),
('131526', 'Ramos Arcas Yarieska Yondery', '929932309081991'),
('131586', 'Giraldo Puerta Jose Manuel', '1001471176'),
('131592', 'Soto Solano Camilo Andres', '1040034355'),
('131593', 'Moreno Gonzalez Kevin Daniel', '825812015091998'),
('131670', 'Castillo Lozano Yormi Zoley', '1193554342'),
('131680', 'PatiÑo Velez Wilmar Alexander', '1128433814'),
('131750', 'Gallego Garcia Brayan Alexis', '1001651909'),
('131751', 'Gallego Holguin Faber Alonso', '15387888'),
('131752', 'Sepulveda Gonzalez Jesus Angel', '1000547945'),
('131753', 'Vega Oviedo Neider Jose', '1102123544'),
('132275', 'Betancur Zapata Jhon Mario', '1001532957'),
('132276', 'Tobon Holguin Angela Maria', '39191848'),
('132282', 'Soto Osorio Samir David', '1053822840'),
('132288', 'Osorio Cardona Lina Maria', '1001652003'),
('132290', 'Paez Navarro Miguel Angel', '1067929288'),
('132291', 'Grajales Alzate Johny Alexander', '1040040437'),
('132434', 'Arteaga Correa Jhovani', '15385049'),
('132435', 'Valencia Gomez Maria Alejandra', '1036405052'),
('132438', 'Botero Orozco Jhoan Manuel', '1000872704'),
('132439', 'Tobon Jaramillo Enith Janeth', '1042765439'),
('132441', 'Castro Vargas Edison', '1001652364'),
('132442', 'Causil Palencia Diana Patricia', '32295850'),
('132443', 'Diaz PanameÑo Mary Luz', '1045430502'),
('132444', 'Ocampo Uribe Juan Jose', '1000747629'),
('132445', 'IbaÑez Bedoya Anyi Yulieth', '1040045139'),
('132446', 'Jaramillo Salazar Marilin', '1036400566'),
('132447', 'Mercado Lozano Janis', '1003287160'),
('132448', 'Martinez Ramirez Luz Astrid', '1036397620'),
('132449', 'Matajira Rolon Jordan Arley', '1090503845'),
('132557', 'Sanchez Antunez Luis David', '108786517091992'),
('132561', 'Roman Arenas Alexandra', '39191759'),
('132564', 'Rodriguez Giraldo Jorge Mario', '1152459372'),
('132568', 'Piedrahita Florez Jonathan', '1001652184'),
('132569', 'Oviedo Luna Jaider De Jesus', '78303359'),
('132571', 'Garcia Higuita Sebastian', '1035305761'),
('132574', 'Gutierrez Chirinos Andrea Veronica', '1083056725'),
('132575', 'Lagos Espino Suany Alejandra', '1039452097'),
('132743', 'Arenas Lopez Beatriz Elena', '39447634'),
('132745', 'Arrieta Perez Natalia', '39419630'),
('132747', 'Florez Toro Juan Esteban', '1007429886'),
('132748', 'Guerra Alzate Laura', '1007565857'),
('132749', 'Marulanda Saldarriaga Valentina', '1040051722'),
('132751', 'Leon Urrego Soranyi', '1001671835'),
('132752', 'Mc Coy Perez Wendys', '1064314744'),
('132755', 'Ramirez Garcia Jesus Alejandro', '1040050106'),
('132756', 'Nectar Martinez Jhonatan David', '1124008035'),
('132757', 'Nunes Jimenez Ivana Patricia', '1127583167'),
('132774', 'Narvaez CastaÑo Adriana Patricia', '43467856'),
('132890', 'Acevedo Gomez Karen Elvira', '1044911761'),
('132893', 'Alvarez Quintana Gloria Elsy', '1040352661'),
('132904', 'Velasquez Hernandez Flor Alba', '43713347'),
('132910', 'Simanca Monroy Jaime', '73191261'),
('132913', 'Botero Roman Paola Andrea', '39189685'),
('132917', 'Buitrago Botero Erika Yisela', '1036780470'),
('132918', 'Salazar Lopez Ana Sofia', '1001387359'),
('132921', 'Cardona Posada Claudia Patricia', '1036778094'),
('132925', 'Cardona Tobon Sebastian', '1007346544'),
('132926', 'Roman Ocampo Milciades', '1040033340'),
('132932', 'Chavarria Aguiar Sebastian Eliecer', '1000195085'),
('132937', 'Contreras Torres Alexander Jose', '1140429283'),
('132943', 'Pestana De La Barrera Katerine', '1063156330'),
('132955', 'Giraldo Carmona Sirley Yamile', '1038417152'),
('132957', 'Gonzalez Campo Kenia', '1001033632'),
('132962', 'Henao Canizalez Blanca Nieves', '1041324426'),
('132966', 'Henao Moreno Sara', '1047461964'),
('132974', 'Olivar Jimenez Ana Lucia', '39452896'),
('132980', 'Martinez Serna Orfa Orquidea', '42843268'),
('132982', 'Mosquera Ramos Ivan Jose', '1049633261'),
('133212', 'Arenas Lopez Brian Steven', '1036966918'),
('133213', 'Vargas Arbelaez Juan Esteban', '1036402635'),
('133217', 'Tejada Montoya Victoria Andrea', '1037500884'),
('133219', 'Scarpetta Perdomo Yeison Andres', '1084898588'),
('133221', 'Rios Giraldo Claudia Cristina', '39446097'),
('133222', 'Restrepo Luz Ayde', '1047965198'),
('133223', 'Prieto Wilmer Alexis', '86049064'),
('133224', 'PeÑoloza Sanchez Dina Luz', '1143390314'),
('133225', 'PatiÑo Jimenez Daniel Stiven', '1007480938'),
('133226', 'Orozco Herrera Victor Isaias', '1007583282'),
('133229', 'Cano Vasquez Sury Valentina', '1027892136'),
('133230', 'Cordoba Pastrana Carmen Maria', '1066527644'),
('133231', 'Diaz Genes David', '1007596235'),
('133232', 'Julio Lopez Jhayra', '1074002805'),
('133233', 'Guzman Ruiz Natalia', '1037574376'),
('133234', 'Fuertes Cabarcas Cristina Isabel', '1038483647'),
('133235', 'Gutierrez Amaya Robinson Stiveen', '1007571724'),
('133236', 'Gomez Arango Vanesa', '1040049667'),
('133464', 'Osorio Rios Luisa Fernanda', '1036962258'),
('133479', 'Riascos Torres Yesica Paola', '1111744251'),
('133481', 'Rodriguez Perez Leonardo', '1045695182'),
('133483', 'Rojas Lugo Carolina Maria', '753024703111980'),
('133486', 'Mercado Sanchez Jorge Luis', '1140836019'),
('133487', 'Mayoriano Perez Breinys Maria', '1104407668'),
('133490', 'Galvis Gutierrez Pablo', '1001235920'),
('133491', 'Diaz Escalona Libardo Francisco', '1088362034'),
('133493', 'Cordero IbaÑez Katiuska Del Pilar', '1127655167'),
('133495', 'Buitrago Lopez Carlos Duvan', '1036955394'),
('133496', 'Bedoya Mesa Luis Estiven', '1000308069'),
('133497', 'Arias Suarez Santiago', '1040045193'),
('133757', 'Clavijo Hernandez Zenen', '77081298'),
('133758', 'LondoÑo Guerrero Johan Camilo', '1001848976'),
('133761', 'Alvarez Martinez Estefania', '1007285823'),
('133768', 'Melendez MuÑoz Yomaira Janeth', '1065915403'),
('133772', 'Moreno Valencia Maria Isabel', '1007362149'),
('133774', 'Simanca Diana Yulieth Paola', '1002497121'),
('133777', 'Tobon Botero Gloria Liceth', '1040049226'),
('133828', 'Gil Esledy Patricia', '43812897'),
('133836', 'Vargas Bedoya Tatiana', '1007362137'),
('133850', 'Vargas Giraldo Juan Gabriel', '1000307939'),
('133856', 'Mier CaÑa Danyelis Daniela', '1010124313'),
('134071', 'Alvarez Botero Nancy Liliana', '1010052865'),
('134072', 'Arango CastaÑeda Yuliana Paola', '1015216419'),
('134073', 'Arenas Maldonado Sara Valentina', '1007460299'),
('134074', 'Arenas Ramirez Edisson Ricardo', '1022034654'),
('134075', 'Botero Del Rio Idaly Maria', '43766275'),
('134076', 'Botero Hurtado Camilo Ignacio', '1022036581'),
('134077', 'Botero Hurtado Eduardo Ovidio', '1000440533'),
('134078', 'Botero Hurtado Yesica MarÍa', '1022033996'),
('134079', 'Sandobal Sepulveda Flor Nidia', '43765561'),
('134080', 'Duque Cortes Lina MarÍa', '43766884'),
('134081', 'Florez Grajales Maria Vanessa', '1026151581'),
('134082', 'Florez Hernandez Denis Tatiana', '1007368313'),
('134083', 'Gallego Hernandez Elkin Alejandro', '70856429'),
('134084', 'Perez Gloria Patricia', '43765512'),
('134085', 'Otalvaro Lopez Juan Pablo', '1000758121'),
('134086', 'Madera Gutierrez Manuel David', '1002235285'),
('134087', 'Lopez Chica Paula Andrea', '43765748'),
('134088', 'Gutierrez Galvis Brahian Daniel', '1001446018'),
('134089', 'Giraldo Arenas Jennifer Carolina', '1007460096'),
('134090', 'LondoÑo Montoya Yaqueline', '1036404386'),
('134091', 'Grajales Grisales Astrid Liliana', '1022035230'),
('134092', 'Herrera Martinez Yenny Liliana', '39453970'),
('134093', 'Mesa CastaÑo Geraldine', '1036404580'),
('134094', 'Velasquez Velasquez Maria Isabel', '1001455574'),
('134095', 'MuÑoz Bedoya Claudia Patricia', '43100234'),
('134096', 'Maya Guerrero Laura Fernanda', '1036251217'),
('134097', 'Franco Gutierrez Joes Julian', '1001157958'),
('134098', 'Olarte Galeano Luz Alejandra', '39320312'),
('134099', 'Vargas Perez Alejandro', '1007643166'),
('134100', 'Alvarez Sepulveda Liliana Maria', '43678963'),
('134101', 'Alzate LondoÑo Yuliana Andrea', '1036403075'),
('134102', 'Arbelaez Alvarez Daniela', '1036404837'),
('134103', 'Ardila Rueda Karen Daniela', '1005181110'),
('134104', 'Atehortua CastaÑeda Mariana', '1036403322'),
('134105', 'Suarez Quintero Emily', '1036394643'),
('134106', 'Quintero Salazar Jhon Bairon', '1000886327'),
('134107', 'Quintero Betancur Luisa Fernanda', '1066751757'),
('134108', 'Posada Serna Luisa Fernanda', '1045433567'),
('134109', 'Palacio MuÑeton Sandra Milena', '1017163948'),
('134126', 'Acosta Perez Dayana', '1193552111'),
('134132', 'Arbelaez Quintero Alejandra', '1001387375'),
('134144', 'Bedoya Manco Maria Valentina', '1036964770'),
('134156', 'Camargo Rodriguez Adriana Beatriz', '36726093'),
('134173', 'Carmona Hernandez Sharon Michelle', '1047479241'),
('134180', 'Carvajal Martinez Blanca Marleny', '39447965'),
('134192', 'Escobar MuÑoz Sebastian', '1000896716'),
('134194', 'Florez MuÑoz Dahiana Estefania', '1036250485'),
('134198', 'Gallego Cuervo Yuli Tatiana', '1036961243'),
('134204', 'Garzon Silva Jesica Andrea', '1036956062'),
('134206', 'Idarraga Herrera Diana Milena', '43646828'),
('134208', 'Lopez MuÑoz Katherine', '1036396606'),
('134211', 'Martinez AcuÑa Yuneis', '1040518604'),
('134214', 'Morales Villada Andres Felipe', '1007565805'),
('134215', 'Medina Gomez Estefania', '1001478579'),
('134216', 'Mora Velasquez Moises David', '1243339216'),
('134218', 'LondoÑo Henao Jennifer Carolina', '1020764785'),
('134220', 'Molina Delgado Leidy', '1068816791'),
('134223', 'Arango Rios Yesica Paola', '1040041244'),
('134240', 'Rios Lopez Mateo', '1040047959'),
('134243', 'Rios Ramirez Juan Pablo', '1001652353'),
('134244', 'Navarrete Rios Silvia Alexandra', '1053586065'),
('134245', 'Rodelo Martinez Andres Alejandro', '1051814835'),
('134247', 'Alzate Quintero Valentina', '1001387335'),
('134248', 'Ojeda Davila Emerson Paolo', '1126425266'),
('134250', 'Vergara Montes Elberto Alfonso', '1101381111'),
('134252', 'Ramirez Galvis Jessica Tatiana', '1036961431'),
('134253', 'Villada Restrepo Carlos Enrique', '1001652264'),
('134255', 'CataÑo Usme Yessica Andrea', '1036950396'),
('134256', 'Riasco Saavedra Anyi Alejandra', '1005278706'),
('134257', 'Cifuentes Gonzalez Anlly Paulina', '1001479375'),
('134259', 'Yanes Polanco Lina Marcela', '1071357698'),
('134260', 'Correa Valencia Gloria Yaneth', '1007375291'),
('134262', 'Salazar Reales Yaritza', '1007334337'),
('134263', 'Franco Zuluaga Leidy Carolina', '1036400998'),
('134264', 'Suarez Arias Luz Elena Del Socorro', '39356807'),
('134265', 'Gomez Henao Paula Andrea', '1059811726'),
('134266', 'Tuberquia Quiroz Flor Alba', '39416150'),
('134267', 'Velez Santana Mary Luz', '1036939193'),
('134268', 'Trujillo Giraldo Sebastian', '1001446920'),
('134270', 'Torrado Ortega Yubery', '1127664150'),
('134271', 'Moreno Jimenez Yarileth', '1032328286'),
('134272', 'Romero Florez Daniela', '1003293658'),
('134274', 'Quintero Daza John Fredy', '1036397386'),
('134275', 'Posada Lopez Nancy Yulieth', '1036398795'),
('134278', 'Giraldo Baena Cesar Augusto', '70786157'),
('134532', 'Barrientos Colon Maria Georgina', '1037580753'),
('134535', 'Cardona Quintero Luz Marina', '43466835'),
('134537', 'Gamez Durango Brando Camilo', '1007465969'),
('134540', 'Garcia PatiÑo Angie Tatiana', '1001478291'),
('134542', 'Giraldo Sanchez Daniela Melisa', '1001481287'),
('134545', 'Gonzalez Vargas Gladys Elena', '39189228'),
('134546', 'Guaimacuto Avila Jesus Daniel', '950555307091994'),
('134548', 'Hoyos Alzate Maria Fernanda', '1001387348'),
('134550', 'Jimenez Osorio Lina Paola', '1007346553'),
('134554', 'Moreno Velasquez Yudy Milena', '1045514808'),
('134556', 'MuÑoz Perez Dora Emilse', '22188137'),
('134557', 'Orozco Gutierrez July Marizol', '1059042743'),
('134561', 'Ossa CastaÑo Luz Marinela', '1036403808'),
('134642', 'Arias Henao Uriel De Jesus', '1036958620'),
('134645', 'Cardozo Garzon Brayan Alfonso', '1032484708'),
('134646', 'Carmona CastaÑeda Leidy Katherin', '1001446270'),
('134648', 'Florez Uribe Johana Maria', '43150670'),
('134651', 'Foronda Zapata Laura Katherine', '1001517577'),
('134652', 'Idarraga Gallo Valentina', '1007291044'),
('134654', 'Jaramillo Rendon Sandra Milena', '39456930'),
('134655', 'Loaiza Guarin Juan Esteban', '1007291636'),
('134656', 'Martinez Gomez Kelly Yohana', '1036967227'),
('134658', 'Moreno Sanchez Edith Yohana', '21627622'),
('134659', 'Mosquera Cordero Wandy Lorany', '1045435474'),
('134660', 'MuÑoz Vanegas Carlos Mario', '1072663857'),
('134661', 'Posada Quintero Leidy Yolima', '21628465'),
('134662', 'Quintero Correa Isabella', '1000761176'),
('134663', 'Ramirez Galvis Estefania', '1007346640'),
('134664', 'Rincon Salazar Tatiana Yulieth', '1090472117'),
('134665', 'Rodriguez Montoya Deiver Stith', '1002362264'),
('134666', 'Rodriguez Silva Annie Virginia', '750980204111986'),
('134667', 'Valencia Alvarez Teresita De Jesus', '43467870'),
('134668', 'Romero Florez Maria Camila', '1003294623'),
('134669', 'Ruiz Montoya Juan Felipe', '1036952520'),
('134670', 'Ruiz Obando Monica Maria', '1022033871'),
('134671', 'Tirado Vertel Deisy Yanith', '1001035297'),
('134672', 'Ruiz Roldan Sergio Emilio', '1128476483'),
('134673', 'Salinas Vanegas Laura Yurani', '1036402368'),
('134674', 'Jaramillo Isaza Esteban', '1000307912'),
('134675', 'LondoÑo Rios Mariana', '1193133706'),
('134676', 'Ocampo Rivera Daniela Cristina', '1193090384'),
('134899', 'Blandon Ocampo Juliana Marcela', '1036936176'),
('134900', 'Cordoba Perez Maria Camila', '1001725647'),
('134901', 'Rendon Loaiza Erneider', '1007407777'),
('134902', 'Lopez Chica Alejandra Maria', '43766500'),
('134903', 'Morales Jimenez Yasbleidy Michell', '1005180498'),
('134904', 'MuÑoz Morales Oscar Alejandro', '1039706448'),
('134905', 'MuÑoz Morales Carlos Alberto', '1039696523'),
('134906', 'Parra Herrera Brayhan David', '1067968198'),
('134907', 'Giraldo CastaÑo Antonio Jose', '71117429'),
('134908', 'Alvarez Gutierez Maria Alejandra', '1152704453'),
('134909', 'Macias Castrillon Mariana Alejandra', '1193104996'),
('134910', 'Blandon Villada Wiilter De Jesus', '1040046596'),
('134911', 'Mazo Zurita Oscar Dario', '1063289804'),
('134912', 'Cuervo Bedoya Maria Camila', '1001455341'),
('134913', 'Echavarria MuÑoz Jose Daniel', '1036401770'),
('134914', 'Madrid David John Jairo', '1146437622'),
('134915', 'Galvez Garcia Cindy Paola', '1036399097'),
('134916', 'Garcia Correa Danilo Andres', '1036961454'),
('134917', 'Martinez Vargas Alejandra', '1036398741'),
('134918', 'Martinez Vargas Luz Adriana', '1036399772'),
('134919', 'Gonzalez Zarate Amanda Katiuska', '944196708062000'),
('134920', 'Melendres Torrealba Juan Jose', '700231409081992'),
('134921', 'MuÑoz Chavarria Juan Esteban', '1036952360'),
('134922', 'Orozco Henao John Fredy', '1000659282'),
('134923', 'Henao Jimenez Norman Arley', '98655298'),
('134924', 'Osorio Acevedo Maria Alejandra', '43106193'),
('134925', 'Hurtado Manco John Alexander', '1020463880'),
('134926', 'LondoÑo Ruiz Erica Julieth', '1040047492'),
('134927', 'Soto Vargas Daniela', '1001140076'),
('134928', 'Lopez Loaiza Jhon Edwar', '1152451234'),
('134929', 'Restrepo Echavarria Robinson Arley', '1007631020'),
('134930', 'Suarez Zapata Laura', '1040749445'),
('134931', 'Romero Petit Karen Yuleisy', '108468418021989'),
('134932', 'Valencia Rodriguez Miguel', '1040050980'),
('134933', 'Vergara Alfaro Jorge Alonso', '8056459'),
('134934', 'Rojas Villada Jhoanny', '1037621999'),
('16826', 'Perez Pineda Luz Emilce', '21627666'),
('17114', 'Blandon Martinez Miryam Astrid', '1040033683'),
('1765', 'Vanegas CastaÑo Luz Marina', '43419814'),
('17660', 'Suarez Suarez Angel Humberto', '1040040967'),
('17703', 'Bedoya Echeverri Carolina ', '1040045539'),
('17803', 'Rios Jimenez Marisol', '1040042000'),
('17849', 'Arias Manrique Yolanda', '43463844'),
('17853', 'Mazo Arcila Catalina', '1036396400'),
('18272', 'Valencia Gonzalez Andres Felipe', '1040030702'),
('18648', 'Acevedo Lopez Johnatan', '1040036629'),
('19017', 'Restrepo Velez Andres Felipe', '1040044445'),
('20512', 'Osorio Montes Jhonatan Arles', '1040044427'),
('20814', 'Zapata CastaÑo John Alexander', '1022034813'),
('22776', 'Buitrago Rios Martha Cecilia', '39193308'),
('25630', 'Mosquera Hurtado Leidy Alexandra', '39193047'),
('25898', 'Lopez Jimenez Everson Andres', '1040045631'),
('25912', 'Montoya Arias Esperanza Del Carmen', '43688969'),
('27121', 'Bernal CastaÑeda Ricardo Andrey', '1040045303'),
('28385', 'Loaiza Galvis Yuly Viviana', '1047969327'),
('28459', 'Estrada Quintero Yesica Tatiana', '1001748822'),
('29247', 'Lopez MuÑoz Alejandra', '1036398405'),
('29665', 'Castrillon Arango Michael', '1040872677'),
('3108', 'Herrera Herrera Lina Maria', '39455045'),
('32532', 'Durango Puello Lilian Del Carmen', '51982797'),
('32533', 'CastaÑo Quintero Doralba', '39190668'),
('32545', 'Lopez Bedoya Maria Del Socorro', '39184880'),
('32570', 'Osorio Castro Maria Beronica', '43473816'),
('32572', 'Ruiz Villada Sandrart Maria', '39188095'),
('32574', 'Cardona Gomez Jhon Dario', '15377975'),
('32580', 'Guzman Rios Yaneth Patricia', '39192617'),
('32622', 'Posada Cuadros Marta Isbelia', '43837511'),
('32628', 'Bedoya Garcia Maria Eugenia', '39187337'),
('32673', 'Pelaez Carrasquilla Victor Hugo', '98667664'),
('32699', 'Botero Tobon Dora Elcy', '39189804'),
('32713', 'Botero Florez Leide Yohana', '39193418'),
('32717', 'Velasquez Diana Patricia', '39186155'),
('32718', 'Cardona Garzon Paula Yasmin', '39192496'),
('32719', 'Tabares Bedoya Victor Alfonso', '1036778757'),
('32720', 'Henao Vargas Sol Mery', '43764723'),
('32730', 'Perez Rendon Orlando De Jesus', '3361057'),
('32740', 'Villada Garcia Gloria Yaneth', '39190294'),
('32773', 'Bermudez Arboleda Paula Andrea', '1040032623'),
('32790', 'Herrera Giraldo Martha Cecilia', '39386156'),
('32791', 'LondoÑo Serna Liliana Maria', '39189968'),
('32792', 'Rios Carmona Ana Patricia', '1040035078'),
('32796', 'Florez Escobar Gloria Emilce', '43839325'),
('32805', 'Villada Lopez Walther Dario', '1040031307'),
('32810', 'Martinez Lopez Anny Yamile', '39192050'),
('32814', 'Castro Tabares Belarmina', '39185107'),
('32815', 'Ospina Perez Luz Estrella', '43765169'),
('32827', 'Lopez Tabares Fabio Nelson', '15387895'),
('32836', 'Atehortua CastaÑeda Diego Luis', '15378154'),
('32843', 'Tobon Tobon Yuri Yadira', '1040032023'),
('32846', 'Valencia Cortes Luz Edilma', '1022032298'),
('32847', 'Gil Rivillas Claudia Yaneth', '39191775'),
('32848', 'Perez Ruiz Blanca Edilia', '39190705'),
('32849', 'Gonzalez Rincon Mariluz', '43765652'),
('32914', 'Toro Rios Jose Yoam', '15379802'),
('33008', 'Trujillo Ramirez Adriana', '1079388800'),
('33012', 'Rodriguez Gaviria Lina Juliet', '1036924096'),
('33013', 'Ocampo Castro Blanca Irene', '1036780269'),
('33014', 'Ramirez Rodriguez Paula Andrea', '39187984'),
('33145', 'Mesa Orozco Maria Consuelo', '43473670'),
('33163', 'Montes Gallego Marleny', '43462113'),
('33164', 'Ocampo Garcia Maricela', '1000656437'),
('33169', 'Cadavid Perez Octavio', '75055433'),
('33171', 'Morales Echeverry Paola Yohanna', '1040035629'),
('33172', 'Romero Gil Hernan Narciso', '1004995276'),
('33173', 'Florez Agudelo Eugenio', '1040038808'),
('33177', 'Agudelo Gaviria Daniela', '1040043256'),
('33178', 'Salgado Basilio Vilma Marcela', '1104419310'),
('33181', 'Elejalde Aguirre Karen Yohana', '39192579'),
('33183', 'Rueda Florez Dalgin Edith', '1041530613'),
('33185', 'Blandon Bedoya Sergio Andres', '1040042069'),
('33283', 'Bedoya Garzon Deicy Nathalia', '1040039019'),
('33330', 'Roman Gaviria Diana Patricia', '39192755'),
('33367', 'Vasco Rios Edison Ferley', '1040041043'),
('33508', 'CastaÑeda CastaÑeda Santiago', '1040043192'),
('33630', 'Morales Villada Eliana Yamile', '1040037481'),
('33703', 'Osorio Alvarez Claudia Marcela', '39192841'),
('33770', 'Torres CastaÑo Soraida', '39192540'),
('34049', 'Rios Toro Edwin De Jesus', '1036780910'),
('34304', 'Henao Marulanda Victor Alfonso', '15389290'),
('34440', 'Vidales Castro Osfan Dayan', '1036948218'),
('34503', 'CastaÑeda Ocampo Caterine Johana', '1040035910'),
('34736', 'Rodriguez Serna Deisy Yuliana', '1040035805'),
('34777', 'Lopez Montoya Claudia Andrea', '43862832'),
('35124', 'Florez Ocampo Dary Juliet', '1036647960'),
('35250', 'Guzman Lopera Daniel Alejandro', '1040041408'),
('35916', 'Valencia Mejia Sandra Milena', '1040045408'),
('35941', 'Cardona Valencia Maria Yolanda', '39191176'),
('36021', 'Reyes Garcia Diego Alejandro', '1018437709'),
('36185', 'Castro Henao Vanessa', '1040043770'),
('36193', 'Hurtado CastaÑeda Ana Maria', '1040039917'),
('38042', 'Ospina Orozco Andres', '1022034787'),
('38581', 'NuÑez Duque Jorge Hernando', '98563922'),
('38622', 'Camayo Perez Lina Marcela', '1040043456'),
('38674', 'Rodriguez Goez Yonayro', '1101382922'),
('38881', 'Bedoya Garcia Jose Norvey', '1036778729'),
('38978', 'Cardona Morales Lina Marcela', '1036943810'),
('39239', 'Ramirez Botero Deisy Marleny', '1040045282'),
('39625', 'Giraldo Suarez Luz Orfilia', '1040030809'),
('41048', 'Cruze Alexander Louis', '408747'),
('42846', 'CastaÑeda Valencia Juan Esteban', '1040047530'),
('44346', 'Perez Tuiran Deivis Duvan', '1102858220'),
('44664', 'Arango Rios Fredy Alexander', '1040037925'),
('44778', 'Montoya Julio Nemias De Jesus', '1193150853'),
('46471', 'Ramirez Valencia Diana Marcela', '1040044806'),
('46545', 'Alvarez Arcila Diana Patricia', '39191620'),
('46547', 'Alvarez Arcila Julian David', '1040043550'),
('47371', 'Vainas Golondrino Jorge Enrique', '1060802430'),
('4809', 'Gomez Londono Deissy Mariana', '1036392327'),
('48291', 'Rendon Betancur Mariana', '1010007130'),
('49459', 'Soto Elejalde Manuela', '1036401848'),
('49983', 'Lopera Vasquez Gloria Ines', '21532685'),
('51293', 'Gallego CastaÑo Sergio Alberto', '1047970216'),
('51331', 'Ramirez Carmona Margarita Maria', '39191203'),
('51446', 'Vargas Henao Bibiana', '1036957076'),
('51507', 'Echeverri Seguro Gloria Amparo', '43345942'),
('51831', 'Calle Patin Nicolas', '1040037163'),
('51977', 'Arenas Ramirez Carlos David', '1022033773'),
('52088', 'Quintero Gallego Luz Nelly', '1070012358'),
('52098', 'Castro Osorio Jessica', '1040048347'),
('52235', 'Restrepo Velez Juan Guillermo', '1040047560'),
('52693', 'Quintero Montoya Adriana Patricia', '1036395777'),
('52708', 'Villada Villada Sandra Milena', '1040046677'),
('52944', 'Tabares Lopera Paola Andrea', '1036927992'),
('53176', 'Tabarez CastaÑeda Laura Milena', '1036784400'),
('53589', 'Cardona Rodriguez Yuli Andrea', '1036393902'),
('54430', 'Montes Mesa Marinela', '1001471426'),
('54770', 'LondoÑo Guerrero Evelyn Jorfani', '1040045289'),
('56189', 'LondoÑo Perez Maria Paulina', '1007429891'),
('56312', 'Berrio CastaÑeda Mariana', '1040044933'),
('56539', 'Osorio Jose Octavio', '15536168'),
('56542', 'Cuartas Correa Norbey Esteban', '1040047223'),
('57627', 'Bedoya Giraldo Jhony Alexander', '1040037662'),
('57652', 'Carmona Ceballos Yeny Paola', '1001725368'),
('57904', 'Arango Gonzalez Julian Esteban', '1022036130'),
('57938', 'Velez Gomez Luz Omaira', '43290031'),
('57948', 'Serna Valencia Luz Yomara', '1042064907'),
('58344', 'PatiÑo Cardona Alejandro', '1040047010'),
('58389', 'Cruz LondoÑo Nathalia Isabel', '1050552614'),
('58396', 'Rios Rojas Ana Maria', '1007285730'),
('58642', 'Arias CastaÑeda Judy Natalia', '1022035427'),
('58757', 'Arenas Ocampo Doris Andrea', '43766218'),
('58846', 'Rivera Florez Leidy Laura', '1040048935'),
('58957', 'Zuluaga Giraldo Adrian Felipe', '1035432849'),
('59159', 'Soto Perez Maribel', '1036402244'),
('59305', 'Gaviria Taborda Olga Lucia', '1022035136'),
('59413', 'Garcia Suarez Andres', '1001133027'),
('59859', 'Agamez Moreno Francisco Manuel', '1069494817'),
('6035', 'Tobon Tobon Lily Julieth', '1040037108'),
('60898', 'Montes Toro Yenny Maria', '1040045919'),
('61624', 'Parra Giraldo Jhony Alejandro', '1036402810'),
('62785', 'Correa Valencia Viviana Andrea', '1040038999'),
('63118', 'Gonzalez Correa Ana Maria', '1040036404'),
('63120', 'Rios Buitrago Karina', '1040036258'),
('63126', 'Cardona Zapata Edwin Alexander', '1036934743'),
('63137', 'Ibarra Quiroz Liliana Marcela', '39457628'),
('63507', 'Bedoya Vergara Maria Catalina', '1007665375'),
('63726', 'Gallego Vallejo Cielo Milena', '39448178'),
('64026', 'Aguirre Valencia Blanca Cecilia', '43767015'),
('64308', 'Mora Cendy Yessenia', '1104705636'),
('6536', 'Lopez Lopez Charles Alberto', '1036778936'),
('65642', 'Barrera Mazo Giovanny Arley', '1036401506'),
('65643', 'Botero Bedoya Juan David', '1040041557'),
('66005', 'Grajales Tabares Claudia Lucia', '1036393234'),
('66182', 'Bedoya Manrique Juan Jose', '1007429879'),
('66322', 'Valencia Martinez Yolima Astrid', '1040039826'),
('67057', 'Henao LondoÑo Juan Alejandro', '1040048841'),
('67116', 'Ocampo Orozco Diana Yadira', '43382502'),
('67692', 'Jimenez Bibiana Maria', '43221599'),
('67713', 'Henao Valencia Yenny Paola', '1000874906'),
('68330', 'Quintero Gomez Paola Andrea', '1036400412'),
('68551', 'Florez Macias Manuela', '1036402514'),
('68688', 'Colorado Rios Maria Alejandra', '1001652181'),
('69779', 'Cardona Cardona Cristian Camilo', '1001652303'),
('69972', 'Guzman Bedoya Jose Simon', '1007565889'),
('70345', 'Perez Naranjo Luis Stiven', '1040049057'),
('70469', 'Calderon Rios Daniela', '1040048992'),
('72766', 'Cardona Bedoya Sindy Paola', '1040044877'),
('73605', 'Blandon Bedoya Edwar Arley', '1040049881'),
('73781', 'Cardona Lopez Daniela', '1040047409'),
('74181', 'Toro Alzate Cristian Adrian', '1040050221'),
('7422', 'Botero Vallejo Andres Antonio', '15387340'),
('75170', 'Alvarez Claudia Marcela', '1007633766'),
('75180', 'AvendaÑo Loaiza Sebastian', '1036960011'),
('75181', 'Arbelaez LondoÑo Jhon Santiago', '1036399517'),
('75188', 'Castrillon Lopez Sol Beatriz', '43645046'),
('75197', 'Osorio Cifuentes James Yadir', '1035231110'),
('76297', 'Perez Torres Daniela', '1040050088'),
('76668', 'Arango Ramirez Leidy Steffany', '1036400371'),
('77135', 'Arredondo Suaza Hilda Liliana', '43765641'),
('77191', 'Gaviria Taborda Sandra Milena', '1007459949'),
('77890', 'Parra Ospina Jose David', '1045048734'),
('7813', 'Armero Morales Jesus Alberto', '1040037170'),
('78764', 'Ospina Arenas Maria Camila', '1022036554'),
('78800', 'MuÑoz Ayala Luisa Maria', '1017178031'),
('79038', 'Maya Rodriguez Juan Camilo', '1036785252'),
('79332', 'Diaz Puerta Styven', '1020418310'),
('79339', 'Espinal Montoya Sergio Esteban', '1020446952'),
('79350', 'Pareja Bernal Ivan Dario', '1017176085'),
('79377', 'Meneses Yepes Luisa Fernanda', '1152684778'),
('79387', 'Martinez Quintero Maryori', '39177465'),
('7945', 'Castrillon Arias Esmid', '8156446'),
('79698', 'Florez Sanchez Jonathan Alexander', '1033338831'),
('8025', 'Arango MuÑoz Nora Elena', '39190769'),
('80792', 'Valencia Martinez Esteban Andres', '1040050677'),
('81719', 'Gulfo Vega Cristian Alberto', '1067858070'),
('82172', 'Jaramillo Clavijo Alegria De Los Angeles', '43702900'),
('82197', 'Algarin Echavarria Diana Maria', '63458639'),
('82290', 'Arenas Ocampo Martha Cecilia', '43766177'),
('82294', 'Sandoval Gloria Marleny', '43765128'),
('82472', 'Zapata Tobon Maicalane', '43905992'),
('83889', 'LondoÑo Tuberquia Vanessa', '1128480600'),
('86245', 'Gonzalez Upegui Duban Estiven', '1007445888'),
('87047', 'Vainas Golondrino Jeremias', '1061544959'),
('87198', 'Galeano Vergara Brenda Dahiana', '1003851505'),
('87296', 'Zuluaga Quintero Daniela', '1036402191'),
('87328', 'Perez Orozco Luisa Fernanda', '1035390610'),
('87381', 'Cruz LondoÑo Duvian Vicente', '1104135289'),
('87654', 'Arenas Restrepo Jeniffer Elena', '1040042915'),
('87664', 'Garces Vanessa', '1028003909'),
('87683', 'Corrales Sanchez Andres Felipe', '1040044439'),
('87685', 'Gonzalez Mejia Manuel Antonio', '17390939'),
('88222', 'Mena Zuluaga Juan Sebastian', '1036927405'),
('88229', 'Arias Otalvaro Adriana Patricia', '39191715'),
('88534', 'Berrocal Posada Jeniffer Paola', '1040046843'),
('88577', 'Ocampo Gomez Andres Felipe', '1040048933'),
('88593', 'PeÑaloza Meza Ana Shirly', '26976993'),
('88804', 'Pavas Lopez Juan Fernando', '15386044'),
('88810', 'Ocampo Ramirez Marisol', '30327405'),
('89093', 'Rendon Cardona Oscar David', '1036940058'),
('89380', 'Alzate Vasquez Maria Alejandra', '1007841109'),
('89645', 'Jurado Alzate Diana', '1088262537'),
('89874', 'Alzate Cardona Brayan Alexis', '1036786387'),
('89934', 'Loaiza Herrera Geraldina', '1040045622'),
('89942', 'Ospina Mosquera Claudia Patricia', '43605124'),
('90032', 'Sanchez Jimenez Leidy Bibiana', '1036403712'),
('90043', 'Bedoya Lujan Maria Rocio', '39448900'),
('90053', 'Morales Garcia Angy Lorena', '1040050795'),
('90708', 'Sossa Montoya Duqueiro Adolfo', '15433911'),
('90812', 'Quitian Campos Mayerly Astrid', '1054564806'),
('91146', 'Sepulveda Giraldo Julian', '1036961974'),
('91245', 'Rodriguez Carvajal Robinson', '1093800119'),
('91307', 'Tobon Tamayo Johan Stivens', '1035438063'),
('91772', 'Villa Gil Leidy Julieth', '1007326073'),
('91953', 'LondoÑo Pareja Natalia Marcela', '39286142'),
('91956', 'Ruiz Rodriguez Cristian Miguel', '1036337644'),
('91962', 'Toro Gomez Luis Carlos', '1037975821'),
('92335', 'Botero Botero Juan Pablo', '1001415252'),
('92424', 'Santamaria Rendon Blainer', '1036404421'),
('92712', 'Castro Gonzalez Yuliana', '1007346454'),
('93908', 'Marin Agudelo Deiby Noriel', '1036935057'),
('94109', 'Morales Tabares Luz Elena', '43765758'),
('94177', 'David Carvajal Edison Andres', '1038333798'),
('94186', 'Ramos Moreno Yoryis Leonardo', '1078581391'),
('94188', 'Tobon Gaviria Natalia', '1040034611'),
('94191', 'Valverde Murillo Alexander Manuel', '10933978'),
('94199', 'Zapata Henao Yuli Bibiana', '1036839862'),
('94534', 'Giraldo Cuartas Oscar Arbey', '1040051712'),
('94878', 'Botero Cardona Maria Joaquina', '1040049740'),
('95119', 'Correa Reinosa Yeison Leandro', '1053805604'),
('95173', 'MuÑoz Montoya Yesica', '1040043052'),
('95432', 'Barco Cifuentes Claudia Monica', '43553699'),
('95592', 'Delgado Valencia Andres Felipe', '1040047477'),
('96769', 'Ruiz Holguin Deisy Viviana', '1096252397'),
('96770', 'Escobar Albao Elvis Andres', '1096238224'),
('97108', 'Aguilar Atencio Mely Laura', '1126121942'),
('97122', 'Chuvila Isco Manuela Estefania', '1005233266'),
('97154', 'Diaz Genes Luz Daniela', '1066528553'),
('97181', 'Molina Posso Laura Michell', '1040051200'),
('97246', 'Rolon Velasco Maria Fernanda', '1090509465'),
('97399', 'Moreno Macea Edith Del Rosario', '30580082'),
('99343', 'Valencia Berrio Jose Daniel', '1040043838'),
('99699', 'Florez Molina Brayam Stiben', '1040047286'),
('99725', 'Trejo Gomez Gustavo Andres', '758608'),
('99731', 'Tarazon Garcia Jose Antonio', '937797225091991'),
('99740', 'Castillo Daza Gustavo Jesus', '947867605011988'),
('99756', 'Maldonado Contreras Leonard Daniel', '949951813081993'),
('99800', 'Gaviria Botero Yenifer Manuela', '1040051630'),
('99853', 'Arenas Pulgarin Jorge Mario', '1040184115'),
('99855', 'Rivera Florez Breidy', '1000188681'),
('99859', 'Meza Ovallos Jairo David', '1093798529');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil`
--

CREATE TABLE `tbl_perfil` (
  `id_perfil` int(2) NOT NULL,
  `perfil` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_perfil`
--

INSERT INTO `tbl_perfil` (`id_perfil`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Lider');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_picking`
--

CREATE TABLE `tbl_picking` (
  `id_picking` int(255) NOT NULL,
  `labor` int(2) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `tallos` int(10) NOT NULL,
  `horas` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_produccion`
--

CREATE TABLE `tbl_produccion` (
  `id_produccion` int(255) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `labor` int(2) NOT NULL,
  `posicion` varchar(2) NOT NULL,
  `fecha` date NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `tallos` int(10) NOT NULL,
  `hora` decimal(4,2) NOT NULL,
  `recetas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tinturados`
--

CREATE TABLE `tbl_tinturados` (
  `id_tinturado` int(255) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `labor` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `tallos` int(10) NOT NULL,
  `horas` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `correo` varchar(50) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `password` varchar(20) NOT NULL,
  `perfil` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`correo`, `nombre`, `password`, `perfil`) VALUES
('admin@gmail.com', 'Admin', 'admin1234', 1),
('appflower@gmail.com', 'Admin AppFlower', 'admin1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmproduccion`
--

CREATE TABLE `tmproduccion` (
  `id_tmproduccion` int(11) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `labor` int(2) NOT NULL,
  `posicion` varchar(2) NOT NULL,
  `causa` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `tiempo` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_empaquefinal`
--

CREATE TABLE `tm_empaquefinal` (
  `id_empaquetm` int(255) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `celula` varchar(20) NOT NULL,
  `causa` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `minutos` int(5) NOT NULL,
  `horas` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_general`
--

CREATE TABLE `tm_general` (
  `id_general` int(255) NOT NULL,
  `operario` varchar(11) NOT NULL,
  `labor` int(2) NOT NULL,
  `causa` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `semana` varchar(20) DEFAULT NULL,
  `tiempo` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `causa_empaque`
--
ALTER TABLE `causa_empaque`
  ADD PRIMARY KEY (`id_causa`);

--
-- Indices de la tabla `causa_general`
--
ALTER TABLE `causa_general`
  ADD PRIMARY KEY (`id_causa`);

--
-- Indices de la tabla `causa_produccion`
--
ALTER TABLE `causa_produccion`
  ADD PRIMARY KEY (`id_causa`);

--
-- Indices de la tabla `labor_empaque`
--
ALTER TABLE `labor_empaque`
  ADD PRIMARY KEY (`id_labor`);

--
-- Indices de la tabla `labor_general`
--
ALTER TABLE `labor_general`
  ADD PRIMARY KEY (`id_labor`);

--
-- Indices de la tabla `labor_material`
--
ALTER TABLE `labor_material`
  ADD PRIMARY KEY (`id_labor`);

--
-- Indices de la tabla `labor_produccion`
--
ALTER TABLE `labor_produccion`
  ADD PRIMARY KEY (`id_labor`);

--
-- Indices de la tabla `tbl_empaque`
--
ALTER TABLE `tbl_empaque`
  ADD PRIMARY KEY (`id_empaque`),
  ADD KEY `fk_tbl_talloatallo_labor_empaque1_idx` (`labor`),
  ADD KEY `fk_tbl_empaquefinal_tbl_operario1_idx` (`operario`);

--
-- Indices de la tabla `tbl_materialseco`
--
ALTER TABLE `tbl_materialseco`
  ADD PRIMARY KEY (`id_seco`),
  ADD KEY `fk_tbl_materialseco_tbl_operarios1_idx` (`operario`),
  ADD KEY `fk_tbl_materialseco_labor_material1_idx` (`labor`);

--
-- Indices de la tabla `tbl_operarios`
--
ALTER TABLE `tbl_operarios`
  ADD PRIMARY KEY (`id_operario`);

--
-- Indices de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `tbl_picking`
--
ALTER TABLE `tbl_picking`
  ADD PRIMARY KEY (`id_picking`),
  ADD KEY `fk_tbl_picking_tbl_operarios1_idx` (`operario`),
  ADD KEY `fk_tbl_picking_labor_general1_idx` (`labor`);

--
-- Indices de la tabla `tbl_produccion`
--
ALTER TABLE `tbl_produccion`
  ADD PRIMARY KEY (`id_produccion`),
  ADD KEY `fk_tbl_produccion_labor_produccion1_idx` (`labor`),
  ADD KEY `fk_tbl_produccion_tbl_operario1_idx` (`operario`);

--
-- Indices de la tabla `tbl_tinturados`
--
ALTER TABLE `tbl_tinturados`
  ADD PRIMARY KEY (`id_tinturado`),
  ADD KEY `fk_tbl_tinturados_tbl_operarios1_idx` (`operario`),
  ADD KEY `fk_tbl_tinturados_labor_general1_idx` (`labor`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `fk_tbl_usuario_tbl_perfil_idx` (`perfil`);

--
-- Indices de la tabla `tmproduccion`
--
ALTER TABLE `tmproduccion`
  ADD PRIMARY KEY (`id_tmproduccion`),
  ADD KEY `fk_tmproduccion_labor_produccion1_idx` (`labor`),
  ADD KEY `fk_tmproduccion_tmcausa1_idx` (`causa`),
  ADD KEY `fk_tmproduccion_tbl_operarios1_idx` (`operario`);

--
-- Indices de la tabla `tm_empaquefinal`
--
ALTER TABLE `tm_empaquefinal`
  ADD PRIMARY KEY (`id_empaquetm`),
  ADD KEY `fk_tm_empaquefinal_causa_empaque1_idx` (`causa`),
  ADD KEY `fk_tm_empaquefinal_tbl_operario1_idx` (`operario`);

--
-- Indices de la tabla `tm_general`
--
ALTER TABLE `tm_general`
  ADD PRIMARY KEY (`id_general`),
  ADD KEY `fk_tm_tinturados_tbl_operarios1_idx` (`operario`),
  ADD KEY `fk_tm_general_labor_general1_idx` (`labor`),
  ADD KEY `fk_tm_general_causa_general1_idx` (`causa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `causa_empaque`
--
ALTER TABLE `causa_empaque`
  MODIFY `id_causa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `causa_general`
--
ALTER TABLE `causa_general`
  MODIFY `id_causa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `causa_produccion`
--
ALTER TABLE `causa_produccion`
  MODIFY `id_causa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `labor_empaque`
--
ALTER TABLE `labor_empaque`
  MODIFY `id_labor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `labor_general`
--
ALTER TABLE `labor_general`
  MODIFY `id_labor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `labor_material`
--
ALTER TABLE `labor_material`
  MODIFY `id_labor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `labor_produccion`
--
ALTER TABLE `labor_produccion`
  MODIFY `id_labor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_empaque`
--
ALTER TABLE `tbl_empaque`
  MODIFY `id_empaque` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_materialseco`
--
ALTER TABLE `tbl_materialseco`
  MODIFY `id_seco` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  MODIFY `id_perfil` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_picking`
--
ALTER TABLE `tbl_picking`
  MODIFY `id_picking` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_produccion`
--
ALTER TABLE `tbl_produccion`
  MODIFY `id_produccion` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tinturados`
--
ALTER TABLE `tbl_tinturados`
  MODIFY `id_tinturado` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmproduccion`
--
ALTER TABLE `tmproduccion`
  MODIFY `id_tmproduccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tm_empaquefinal`
--
ALTER TABLE `tm_empaquefinal`
  MODIFY `id_empaquetm` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tm_general`
--
ALTER TABLE `tm_general`
  MODIFY `id_general` int(255) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empaque`
--
ALTER TABLE `tbl_empaque`
  ADD CONSTRAINT `fk_tbl_empaquefinal_tbl_operario1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_talloatallo_labor_empaque1` FOREIGN KEY (`labor`) REFERENCES `labor_empaque` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_materialseco`
--
ALTER TABLE `tbl_materialseco`
  ADD CONSTRAINT `fk_tbl_materialseco_labor_material1` FOREIGN KEY (`labor`) REFERENCES `labor_material` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_materialseco_tbl_operarios1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_picking`
--
ALTER TABLE `tbl_picking`
  ADD CONSTRAINT `fk_tbl_picking_labor_general1` FOREIGN KEY (`labor`) REFERENCES `labor_general` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_picking_tbl_operarios1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_produccion`
--
ALTER TABLE `tbl_produccion`
  ADD CONSTRAINT `fk_tbl_produccion_labor_produccion1` FOREIGN KEY (`labor`) REFERENCES `labor_produccion` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_produccion_tbl_operario1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_tinturados`
--
ALTER TABLE `tbl_tinturados`
  ADD CONSTRAINT `fk_tbl_tinturados_labor_general1` FOREIGN KEY (`labor`) REFERENCES `labor_general` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_tinturados_tbl_operarios1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_tbl_usuario_tbl_perfil` FOREIGN KEY (`perfil`) REFERENCES `tbl_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tmproduccion`
--
ALTER TABLE `tmproduccion`
  ADD CONSTRAINT `fk_tmproduccion_labor_produccion1` FOREIGN KEY (`labor`) REFERENCES `labor_produccion` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tmproduccion_tbl_operarios1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tmproduccion_tmcausa1` FOREIGN KEY (`causa`) REFERENCES `causa_produccion` (`id_causa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tm_empaquefinal`
--
ALTER TABLE `tm_empaquefinal`
  ADD CONSTRAINT `fk_tm_empaquefinal_causa_empaque1` FOREIGN KEY (`causa`) REFERENCES `causa_empaque` (`id_causa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tm_empaquefinal_tbl_operario1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tm_general`
--
ALTER TABLE `tm_general`
  ADD CONSTRAINT `fk_tm_general_causa_general1` FOREIGN KEY (`causa`) REFERENCES `causa_general` (`id_causa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tm_general_labor_general1` FOREIGN KEY (`labor`) REFERENCES `labor_general` (`id_labor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tm_tinturados_tbl_operarios1` FOREIGN KEY (`operario`) REFERENCES `tbl_operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
