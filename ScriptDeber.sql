/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Nombre Base:     paises                                      */
/* Created on:     10/10/2020 17:43:48                          */
/*==============================================================*/


drop table if exists CIUDAD;

drop table if exists PAIS;

/*==============================================================*/
/* Table: CIUDAD                                                */
/*==============================================================*/
create table CIUDAD
(
   COD_CIUDAD           int not null auto_increment,
   COD_PAIS             char(2),
   NOM_CIUDAD           char(50) not null,
   IMG_CIUDAD           char(50),
   NHAB_CIUDAD          int,
   primary key (COD_CIUDAD)
);

/*==============================================================*/
/* Table: PAIS                                                  */
/*==============================================================*/
create table PAIS
(
   COD_PAIS             char(2) not null,
   NOM_PAIS             char(60) not null,
   CON_PAIS             char(10),
   CAP_PAIS             char(25),
   IMG_PAIS             char(50),
   primary key (COD_PAIS)
);

alter table CIUDAD add constraint FK_PAIS_TIENE_N_CIUDADES foreign key (COD_PAIS)
      references PAIS (COD_PAIS) on delete cascade;
	  
	  
INSERT INTO `pais` (`COD_PAIS`, `NOM_PAIS`, `CON_PAIS`, `CAP_PAIS`, `IMG_PAIS`) VALUES
('AR', 'Argentina', 'AMÉRICA', 'BUENOS AIRES', 'ar.jpg'),
('AU', 'Australia', 'OCEANÍA', 'CANBERRA', 'au.jpg'),
('BR', 'Brazil', 'AMÉRICA', 'BRASILIA', 'br.jpg'),
('CA', 'Canada', 'AMÉRICA', 'OTTAWA', 'ca.jpg'),
('CL', 'Chile', 'AMÉRICA', 'SANTIAGO DE CHILE', 'cl.jpg'),
('CN', 'China', 'ASIA', 'PEKÍN', 'cn.jpg'),
('CO', 'Colombia', 'AMÉRICA', 'BOGOTÁ', 'co.jpg'),
('CZ', 'Czech Republic', 'EUROPA', 'PRAGA', 'cz.jpg'),
('DE', 'Germany', 'EUROPA', 'BERLÍN', 'de.jpg'),
('DO', 'Dominican Republic', 'AMÉRICA', 'SANTO DOMINGO', 'do.jpg'),
('EC', 'Ecuador', 'AMÉRICA', 'QUITO', 'ec.jpg'),
('ES', 'Spain', 'EUROPA', 'MADRID', 'es.jpg'),
('FR', 'France', 'EUROPA', 'PARÍS', 'fr.jpg'),
('GR', 'Greece', 'EUROPA', 'ATENAS', 'gr.jpg'),
('ID', 'Indonesia', 'ASIA', 'YAKARTA', 'id.jpg'),
('IE', 'Ireland', 'EUROPA', 'DUBLÍN', 'ie.jpg'),
('IN', 'India', 'ASIA', 'NUEVA DELHI', 'in.jpg'),
('IQ', 'Iraq', 'ASIA', 'BAGDAD', 'iq.jpg'),
('IT', 'Italy', 'EUROPA', 'ROMA', 'it.jpg'),
('JP', 'Japan', 'ASIA', 'TOKIO', 'jpn.jpg'),
('MX', 'Mexico', 'AMÉRICA', 'MÉXICO D.F.', 'mx.jpg'),
('NL', 'Netherlands', 'EUROPA', 'AMSTERDAM', 'nl.jpg'),
('PA', 'Panama', 'CIUDAD DE', 'AMÉRICA', 'pa.jpg'),
('PE', 'Peru', 'AMÉRICA', 'LIMA', 'pe.jpg'),
('PH', 'Philippines', 'ASIA', 'MANILA', 'ph.jpg'),
('PR', 'Puerto Rico', 'AMÉRICA', 'SAN JUAN', 'pr.jpg'),
('PT', 'Portugal', 'EUROPA', 'LISBOA', 'pt.jpg'),
('RU', 'Rusia', 'EUROPA', 'MOSCÚ', 'ru.jpg'),
('SE', 'Suecia', 'EUROPA', 'ESTOCOLMO', 'se.jpg'),
('SG', 'Singapore', 'ASIA', 'SINGAPUR', 'sg.jpg'),
('TH', 'Thailand', 'ASIA', 'BANGKOK', 'th.jpg'),
('TR', 'Turkey', 'ASIA', 'ANKARA', 'tr.jpg'),
('UA', 'Ukraine', 'EUROPA', 'KIEV', 'ua.jpg'),
('US', 'United States', 'AMÉRICA', 'WASHINGTON D.C.', 'us.jpg'),
('VE', 'Venezuela', 'AMÉRICA', 'CARACAS', 've.jpg');  
INSERT INTO `ciudad` (`COD_CIUDAD`, `COD_PAIS`, `NOM_CIUDAD`, `IMG_CIUDAD`, `NHAB_CIUDAD`) VALUES
(1, 'AR', 'San Miguel de Tucumán', 'tucuman.JPG', 548800),
(13, 'AU', 'Sidney', 'sidney.jpg', 1000000),
(19, 'AR', 'Rosario', 'tucuman.jpg', 1000456),
(21, 'AR', 'La Plata', 'tucuman.JPG', 101001),
(29, 'AR', 'Cordoba', 'tucuman.JPG', 1500041),
(30, 'AR', 'Salta', 'tucuman.JPG', 1000000),
(31, 'AR', 'Mendoza', 'tucuman.JPG', 150324),
(35, 'AR', 'San Juan', 'tucuman.JPG', 1500024),
(38, 'AR', 'Paraná', 'tucuman.JPG', 152000),
(39, 'AR', 'Concordia', 'tucuman.JPG', 152000),
(49, 'AU', 'Brisbane', 'tucuman.JPG', 123000),
(50, 'AU', 'Canberra', 'tucuman.JPG', 1000000),
(51, 'AU', 'Darwin', 'tucuman.JPG', 123456),
(66, 'AU', 'Perth', 'tucuman.JPG', 1234560);

