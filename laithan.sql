-- MEMBUAT TABLE table_siswa
-- dengan field
--  id tipe data int panjang 32 unsigned, dengan primari key,  dengan auto increment
--  nisn tipe data VARCHAT panjang 255, dengan UNIQUE
CREATE TABLE table_siswa (
    id INT(32) unsigned PRIMARY KEY AUTO_INCREMENT,
    nisn VARCHAR(255) UNIQUE,
    nama_siswa VARCHAR(255),
    alamat TEXT
);

-- table siswa harus sudah ada
-- insert satu data
INSERT INTO table_siswa 
    (nisn, nama_siswa, alamat)
VALUES
    ('ABC123', 'budi', 'jakarta');

-- INSERT lebih dari satu
INSERT INTO table_siswa 
    (nisn, nama_siswa, alamat)
VALUES
    ('ABC124', 'iwan', 'jakarta'),
    ('ABC125', 'andre', 'bogor');

-- ubah semua field alamat
UPDATE table_siswa SET 
    nama_siswa = 'budi',
    alamat = 'tangerang';

-- ubah yang memiliki id = 1
UPDATE table_siswa SET 
    nama_siswa = 'budi',
    alamat = 'jakarta'
WHERE id = 1;

-- ubah yang memiliki nama = budi DAN alamat = tangerang
UPDATE table_siswa SET 
    nama_siswa = 'iwan',
    alamat = 'bogor'
WHERE nama_siswa = 'budi' AND alamat = 'tangerang';

-- ubah yang memiliki nama = iwan ATAU alamat = jakarta
UPDATE table_siswa SET 
    nama_siswa = 'andre',
    alamat = 'bandung'
WHERE nama_siswa = 'iwan' OR alamat = 'jakarta';

-- delete semua
DELETE FROM table_siswa;

-- delete id = 7
DELETE FROM table_siswa WHERE id = 7;


-- SELECT
-- SELECT ALL
SELECT * FROM table_siswa;

-- SELECT beberapa field saja
SELECT nama_siswa, alamat FROM table_siswa;

-- SELECT dengan condition
SELECT * FROM table_siswa WHERE id = 9;
SELECT * FROM table_siswa WHERE nama_siswa = 'iwan';

-- SELECT 2 pertama
SELECT * FROM table_siswa LIMIT 2;

-- SELECT 2 terakhir
SELECT * FROM table_siswa ORDER BY id DESC LIMIT 2;
