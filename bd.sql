

create table usuarios (
id int not null AUTO_INCREMENT,
usuario varchar(100) not null,
senha varchar(100) not null,
cargo varchar (100) not null,
primary key (id)
);

create table veiculo(
chassi varchar(30) not null,
modelo varchar(100) not null,
marca varchar(100) not null,
ano varchar (100) not null,
placa varchar (200) not null,
status varchar (15) not null,
primary key (chassi)
); 


create table rastreador(
codigo varchar(15) not null,
localizacao varchar(500) not null,
primary key (codigo)
);


create table motorista (
codigo int not null AUTO_INCREMENT,
nome varchar (200) not null,
habilitacao varchar (30) not null,
veiculo_chassi varchar (30) not null,
rastreador_codigo varchar (15) not null,
primary key (codigo),
foreign key (veiculo_chassi) references veiculo(chassi),
foreign key (rastreador_codigo) references rastreador(codigo)
);


