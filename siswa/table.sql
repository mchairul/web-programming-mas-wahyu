CREATE TABLE table_siswa (
    id INT(32) unsigned PRIMARY KEY AUTO_INCREMENT,
    nisn VARCHAR (255) UNIQUE,
    nama_siswa VARCHAR (255),
    alamat TEXT
);

INSERT INTO table_siswa
(nisn, nama_siswa, alamat)
VALUES
('ABC123', 'Budi', 'Jakarta'),
('ABC124', 'Andre','Tangerang'),
('ABC125', 'Iwan', 'Bogor'),
('ABC126', 'Rina','Depok'),
('ABC127', 'Rini','Bandung'),
('ABC128', 'Bunga', 'Karawang'),
('ABC129', 'Andi', 'Jakarta'),
('ABC1210', 'Tulip', 'Bekasi' );


CREATE TABLE mata_pelajaran (
    id INT (32) unsigned PRIMARY KEY AUTO_INCREMENT,
    kode_mata_pelajaran VARCHAR (255) UNIQUE,
    nama_mata_pelajaran VARCHAR (255)
);

INSERT INTO mata_pelajaran 
(kode_mata_pelajaran, nama_mata_pelajaran)
VALUES
('001','Programming'),
('002','Bahasa Indonesia'),
('003','Bahasa Inggris'),
('004','IPS'),
('005','IPA'),
('006','Olah Raga'),
('007','Sejarah'),
('008','Matematika');


CREATE TABLE jadwal (
    id INT(32) unsigned PRIMARY KEY AUTO_INCREMENT,
    id_siswa INT(32) unsigned,
    id_mata_pelajaran INT(32) unsigned,
    jadwal DATE,
    CONSTRAINT jadwal_siswa FOREIGN KEY (id_siswa) REFERENCES table_siswa(id),
    CONSTRAINT jadwal_mapel FOREIGN KEY (id_mata_pelajaran) REFERENCES  mata_pelajaran(id)
)

CREATE TABLE modul_mata_pelajaran (
    id INT(32) unsigned PRIMARY KEY AUTO_INCREMENT,
    id_mata_pelajaran INT(32) unsigned,
    nama_file VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255),
    CONSTRAINT modul_mapel FOREIGN KEY (id_mata_pelajaran) REFERENCES mata_pelajaran(id)
);