CREATE DATABASE EASYGAME_SMARTFARM;
USE EASYGAME_SMARTFARM;

CREATE TABLE USER (
	UserID int not null AUTO_INCREMENT,
	gioi_tinh varchar(3) check (gioi_tinh='nam' OR gioi_tinh='nu'),
	email varchar(255),
	Ho_ten_dem varchar(255),
	Ten varchar(255),
	SDT number(10),
	primary key (UserID)
);

create table DEVICE (
	DeviceID int not null AUTO_INCREMENT,
	Tinh_trang varchar(255),
	Mo_ta varchar(255),
	Trang_thai bool,
	Thong_so_do_duoc number,
	Ten varchar(255),
	Cong_dung VARCHAR(255),
	PRIMARY key (DeviceID),
	FOREIGN key (GardenID) REFERENCES GARDEN(GardenID)
);

create table GARDEN (
	GardenID int not null AUTO_INCREMENT,
	So_cay int, 
	Vi_tri varchar(255),
	Che_do_quan_ly VARCHAR(255),
	Tinh_trang VARCHAR(255),
	PRIMARY KEY (GardenID),
	
);

CREATE table PLANT (
	PlantID int not null AUTO_INCREMENT,
	Ten VARCHAR(255),
	Tinh_trang VARCHAR(255),
	So_luong int,
	Muc_phat_trien VARCHAR(255),
	Ngay_trong date,
 	Ghi_chu VARCHAR(255),
	PRIMARY KEY (PlantID),
	FOREIGN key (GardenID) REFERENCES GARDEN(GardenID)
);

