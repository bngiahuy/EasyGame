SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE EASYGAME_SMARTFARM;
USE EASYGAME_SMARTFARM;

CREATE TABLE USER (
    UserID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    fname VARCHAR(255) DEFAULT NULL,
    lname VARCHAR(255) DEFAULT NULL,
    gender BOOLEAN DEFAULT NULL,
    phone_number VARCHAR(10) DEFAULT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (UserID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE CONTROL (
  `Den1` int(11) NOT NULL,
  `Bom1` int(11) NOT NULL,
  `Ps1` int(11) NOT NULL,
  `Rc1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO CONTROL VALUES (0,0,0,0);

CREATE TABLE AUTO (
  `Temperature` int(11) NOT NULL,
  `Humidity` int(11) NOT NULL,
  `Light` int(11) NOT NULL,
  `Mois` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO AUTO VALUES (25, 95, 200, 80);

CREATE TABLE `display` (
  `Temperature1` int(11) NOT NULL,
  `Temperature2` int(11) NOT NULL,
  `Humidity1` int(11) NOT NULL,
  `Humidity2` int(11) NOT NULL,
  `Light1` int(11) NOT NULL,
  `Light2` int(11) NOT NULL,
  `Mois1` int(11) NOT NULL,
  `Mois2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `display` (`Temperature1`, `Temperature2`, `Humidity1`, `Humidity2`, `Light1`, `Light2`, `Mois1`, `Mois2`) VALUES
(30, 35, 90, 20, 1000, 10, 100, 10);

CREATE TABLE GARDEN (
    GardenID INT NOT NULL AUTO_INCREMENT,
    Vi_tri VARCHAR(255) DEFAULT NULL,
    So_cay INT DEFAULT NULL,
    Che_do_quan_ly VARCHAR(255) DEFAULT NULL,
    Tinh_trang VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (GardenID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO GARDEN VALUES (1, "Thu Duc, Ho Chi Minh City", 10, NULL, NULL);


CREATE TABLE DEVICE (
    DeviceID INT NOT NULL AUTO_INCREMENT,
    GardenID INT NOT NULL,
    Ten VARCHAR(255) DEFAULT NULL,
    Tinh_trang VARCHAR(255) DEFAULT NULL,
    Trang_thai BOOLEAN DEFAULT NULL,
    Cong_dung VARCHAR(255) DEFAULT NULL,
    Mo_ta VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (DeviceID, GardenID),
    FOREIGN KEY (GardenID) REFERENCES GARDEN(GardenID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO DEVICE VALUES (1, 1, "TEMP_01", null, null, "Do nhiet do garden 1", null);
INSERT INTO DEVICE VALUES (2, 1, "MOIS_01", null, null, "Do do am dat garden 1", null);
INSERT INTO DEVICE VALUES (3, 1, "HUMID_01", null, null, "Do do am khong khi garden 1", null);
INSERT INTO DEVICE VALUES (4, 1, "LIGHT_01", null, null, "Do cuong do anh sang garden 1", null);



CREATE TABLE DEVICE_DATA (
    DeviceID INT NOT NULL,
    Thong_so_do_duoc INT DEFAULT NULL,
    Thoi_gian_do_duoc datetime NOT NULL,
    FOREIGN KEY (DeviceID) REFERENCES DEVICE(DeviceID)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE PLANT (
    PlantID INT NOT NULL AUTO_INCREMENT,
    GardenID INT NOT NULL,
    Ten VARCHAR(255) DEFAULT NULL,
    Tinh_trang VARCHAR(255) DEFAULT NULL,
    So_luong INT DEFAULT NULL,
    Muc_phat_trien VARCHAR(255) DEFAULT NULL,
    Ngay_trong DATE DEFAULT NULL,
    Ghi_chu VARCHAR(255) DEFAULT NULL,
    def_Cuong_do_anh_sang FLOAT DEFAULT NULL,
    def_Nhiet_do FLOAT DEFAULT NULL,
    def_Do_am_dat FLOAT DEFAULT NULL,
    def_Do_am_khong_khi FLOAT DEFAULT NULL,
    PRIMARY KEY (PlantID),
    FOREIGN KEY (GardenID) REFERENCES GARDEN(GardenID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE STATUS (
  Trang_thai_den int(11) NOT NULL,
   Trang_thai_phunsuong int(11) NOT NULL,
  Trang_thai_maybom int(11) NOT NULL,
  Trang_thai_RC int(11) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE DISPLAY (
  `Temperature` int(11) NOT NULL,
  `Humidity` int(11) NOT NULL,
  `Light` int(11) NOT NULL,
  `Mois` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO DISPLAY VALUES (30, 90, 1000, 100);

INSERT INTO STATUS VALUES (0,0,0,0);

INSERT INTO USER (email, `password`) VALUES
('admin@gmail.com', 'admin');
COMMIT;