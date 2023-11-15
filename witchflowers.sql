create database witchflowersbd;
use witchflowersbd;

create table flor_temporada(
  idflortempo int auto_increment primary key,
  idpedido2 int(10),
  temporada varchar(50),
  tipoflor varchar(50),
  nombreped varchar(50),
cantidadped int(2),
nota varchar(100),
tipopago varchar(20)
);

INSERT INTO flor_temporada(idpedido2, temporada, tipoflor,nombreped,cantidadped,nota,tipopago) VALUES 
('0495','Primavera','Lavanda','Erick','20','Que no esten marchitas por favor','Tarjeta Credito'),
('0496','Verano','Girasol','May','3','Las mas coloridas por favor','Efectivo'),
('0497','Otoño','Aster','Esmeralda','14','Me gustan las que florecieron mas','Efectivo')