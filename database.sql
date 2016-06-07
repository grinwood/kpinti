create table penjual (
	username varchar(50) not null ,
	password varchar(50) not null ,
	constraint pk_penjual primary key (username) 
);
create table kategori(
	id_kategori int(10) not null auto_increment,
	nama_kategori varchar(100) not null,
	constraint pk_kategori primary key(id_kategori)
);
create table produk (
	username varchar(50) not null ,
	id_barang int(10) not null auto_increment,
	id_kategori int(10) not null,
	nama varchar(100) not null,
	jumlah int(10) not null,
	harga int(10) not null,
	deskripsi varchar(500),
	nama_gbr varchar(100),
	constraint pk_produk primary key (id_barang),
	constraint fk_produk1 foreign key (username) references penjual(username) on delete cascade,
	constraint fk_produk2 foreign key (id_kategori) references kategori(id_kategori) on delete cascade
);
	
create table cart (
    id_pemesanan int(10) not null auto_increment,
	username varchar(50) not null ,
	id_barang int(10) not null,
	barang_order varchar (100) not null,
	jumlah_order int(10) not null,
	harga_order int(10) not null,
	constraint pk_cart primary key (id_pemesanan),
	constraint fk_pemesanan foreign key(id_barang) references produk(id_barang) on delete cascade,
	constraint fk_pemesanan1 foreign key(username) references penjual(username) on delete cascade

);
