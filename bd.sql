
create table usuarios(
codigo int not null auto increment,
usuario varchar(100) not null,
senha varchar(100) not null,
cargo varchar (100) not null,
nome varchar (200) not null,
habilitacao varchar (30) not null,
veiculo_chassi varchar (10) not null,
rastreador_codigo varchar (10) not null,
veiculo_status varchar (15) not null,
primary key (codigo),
foreign key (veiculo_chassi) references veiculo(chassi),
foreign key (rastreador_codigo) references rastreador(codigo),
foreign key (veiculo_status) references veiculo(status)
);

create table veiculo(
chassi varchar(30) not null,
modelo varchar(100) not null,
marca varchar(100) not null,
ano varchar (100) not null,
placa varchar (200) not null,
status varchar (15) not null,
rastreador_localizacao varchar (500) not null,
primary key (chassi),
foreign key (veiculo_codigo) references veiculo(codigo),
foreign key (rastreador_localizacao) references rastreador(localizacao)
);

create table rastreador(
codigo varchar(15) not null,
localizacao varchar(500) not null,
primary key (codigo),
);

create table usuarios (
codigo int not null auto_increment,
usuario varchar(100) not null,
senha varchar(100) not null,
cargo varchar (100) not null,
);

create table veiculo(
chassi varchar(30) not null,
modelo varchar(100) not null,
marca varchar(100) not null,
ano varchar (100) not null,
placa varchar (200) not null,
status varchar (15) not null,
) 

create table motorista (

)


