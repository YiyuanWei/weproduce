set FOREIGN_KEY_CHECKS = 0;

drop table if exists ds_button_material,ds_button_requirement, ds_button_thickness,ds_zipper_thickness, ds_zipper_material, ds_zipper_requirement, ds_fabric_material, ds_fabric_requirement, ds_fabric_category, ds_fabric_thickness, ds_request_fabric_100, ds_request_100, ds_request_garment_100, ds_faric_information, ds_request_data_100;

Create Table ds_request_data_100 like ds_buy_data_6;

Create Table ds_button_material(
bmid INT Not Null AUTO_INCREMENT COMMENT 'Button Material id',
bm VARCHAR(45) Not Null COMMENT 'Button Material',
Primary Key (bmid)
);

Create Table ds_button_thickness(
btid INT Not Null AUTO_INCREMENT comment 'Button thickness id',
btv FLOAT COMMENT 'Button Thickness value',
unit varchar(20) Not Null comment 'Button Thickness unit',
Primary Key (btid)
);

Create Table ds_zipper_material(
zmid INT Not Null AUTO_INCREMENT COMMENT '拉链材料ID',
zm VARCHAR(45) Not Null COMMENT '拉链材料名称',
Primary Key (zmid)
);

CREATE TABLE ds_zipper_thickness(
ztid INT NOT NUll AUTO_INCREMENT comment 'zipper thickness id',
ztv FLOAT COMMENT 'zipper thickness value',
unit varchar(20) Not Null comment 'zipper thickness thickness',
Primary key (ztid)
);

Create Table ds_fabric_material(
fmid INT Not Null COMMENT '布料材料ID',
fm VARCHAR(45) Not Null COMMENT '布料材料',
Primary Key (fmid)
);

Create Table ds_fabric_category(
fcatid INT Not Null COMMENT '布料类型ID',
fcat VARCHAR(45) Not Null COMMENT '布料类型',
Primary Key (fcatid)
);

CREATE TABLE ds_fabric_thickness(
ftid int not null AUTO_INCREMENT,
ftv FLOAT COMMENT 'thickness value',
unit VARCHAR(20) not null comment 'thickness unit',
PRIMARY KEY (ftid)
);

Create Table ds_request_100(
itemid INT Not Null COMMENT '订单ID',
userid Int Not Null COMMENT '用户ID',
addtime Int(10) UNSIGNED Not NUll COMMENT 'order time',
adddate Date NOT NULL comment 'order date',
sample TINYINT Not Null COMMENT '用户样本是否已发送：0否；1是; 默认0',
type TINYINT Not Null COMMENT '布料类型: 0 garment ; 1 fabric',
Primary Key (itemid));


Create Table ds_request_garment_100(
itemid INT Not NUll COMMENT 'Garment订单ID',
quantity int,
saletime date COMMENT 'estimated on sales time',
ftid int COMMENT 'foreign key for thickness',
fDesign varchar(250) COMMENT 'url of design draft',
fSize varchar(250) COMMENT 'url of size table',
fLabel varchar(250) COMMENT 'url of design for label',
photos json COMMENT 'urls in json for sample photos',
others varchar(300),
fimg json Not Null COMMENT '布料图片url',
fmid INT Not Null COMMENT 'fabric material ID',
fcatid INT Not Null comment 'fabric type id',
fweight float NOT Null comment 'fabric weight',
fm VARCHAR(45) COMMENT 'used when fmid == 0',
fcat VARCHAR(45) COMMENT 'used when fcatid == 0',
ftv Float comment 'used when ftid == 0',
ftunit varchar(45) COMMENT 'used when ftid == 0',
Primary Key (itemid),
Foreign Key (itemid) references ds_request_100(itemid),
FOREIGN KEY (ftid) REFERENCES ds_fabric_thickness(ftid),
foreign Key (fmid) references ds_fabric_material(fmid),
foreign Key (fcatid) references ds_fabric_category(fcatid)
);

Create Table ds_button_requirement(
itemid INT Not Null COMMENT 'garment订单ID',
bmid INT Not Null COMMENT '纽扣材料ID',
bimg json Not Null COMMENT '纽扣图片url',
bdiameter Float Not Null COMMENT '纽扣直径',
btid INT Not Null COMMENT '纽扣厚度',
bm VARCHAR(45) COMMENT 'used when bmid == 0',
btv Float comment 'used when btid == 0',
btunit varchar(45) COMMENT 'used when btid == 0',
Primary Key (itemid),
Foreign Key (itemid) references ds_request_garment_100(itemid),
Foreign Key (bmid) references ds_button_material(bmid),
Foreign Key (btid) references ds_button_thickness(btid)
);

Create Table ds_zipper_requirement(
itemid INT Not Null COMMENT 'garment订单ID',
zmid INT Not Null COMMENT '拉链材料ID',
zimg json Not Null COMMENT '拉链图片url',
znumber INT Not Null COMMENT '拉链数量',
ztid INT Not Null COMMENT '拉链厚度',
zm VARCHAR(45) COMMENT 'used when zmid == 0',
ztv Float comment 'used when ztid == 0',
ztunit varchar(45) COMMENT 'used when ztid == 0',
Primary Key (itemid),
Foreign Key (itemid) references ds_request_garment_100(itemid),
Foreign Key (zmid) references ds_zipper_material(zmid),
Foreign Key (ztid) references ds_zipper_thickness(ztid)
);

Create Table ds_request_fabric_100(
itemid INT Not Null COMMENT 'fabric订单ID',
quantity INT Not Null COMMENT '订单数量',
req VARCHAR(300) Not Null COMMENT '订单布料要求',
fimg json Not Null COMMENT '布料图片url',
fmid INT Not Null COMMENT 'fabric material ID',
fcatid INT Not Null comment 'fabric type id',
fweight float NOT Null comment 'fabric weight',
fm VARCHAR(45) COMMENT 'used when fmid == 0',
fcat VARCHAR(45) COMMENT 'used when fcatid == 0',
Primary key (itemid),
Foreign Key (itemid) references ds_request_100(itemid),
foreign Key (fmid) references ds_fabric_material(fmid),
foreign Key (fcatid) references ds_fabric_category(fcatid)
);

INSERT INTO ds_fabric_material (fmid, fm) VALUES (0, 'Other');
INSERT INTO ds_button_material (bmid, bm) VALUES (0, 'Other');
INSERT INTO ds_zipper_material (zmid, zm) VALUES (0, 'Other');

INSERT INTO ds_fabric_category (fcatid, fcat) VALUES (0, 'Other');

INSERT INTO ds_fabric_thickness (ftid, ftv, unit) VALUES (0, null, 'Other');
INSERT INTO ds_button_thickness (btid, btv, unit) VALUES (0, null, 'Other');
INSERT INTO ds_zipper_thickness (ztid, ztv, unit) VALUES (0, null, 'Other');

UPDATE ds_button_material SET bmid = '0' WHERE ds_button_material.bmid = 1;
UPDATE ds_zipper_material SET zmid = '0' WHERE ds_zipper_material.zmid = 1;
UPDATE ds_fabric_material SET fmid = '0' WHERE ds_fabric_material.fmid = 1;

UPDATE ds_fabric_category SET fcatid = '0' WHERE ds_fabric_category.fcatid = 1;

UPDATE ds_button_thickness SET btid = '0' WHERE ds_button_thickness.btid = 1;
UPDATE ds_zipper_thickness SET ztid = '0' WHERE ds_zipper_thickness.ztid = 1;
UPDATE ds_fabric_thickness SET ftid = '0' WHERE ds_fabric_thickness.ftid = 1;

INSERT INTO ds_fabric_material (fmid, fm) VALUES (1, 'No Requirement');
INSERT INTO ds_button_material (bmid, bm) VALUES (1, 'No Requirement');
INSERT INTO ds_zipper_material (zmid, zm) VALUES (1, 'No Requirement');

INSERT INTO ds_fabric_category (fcatid, fcat) VALUES (1, 'No Requirement');

INSERT INTO ds_fabric_thickness (ftid, ftv, unit) VALUES (1, null, 'No Requirement');
INSERT INTO ds_button_thickness (btid, btv, unit) VALUES (1, null, 'No Requirement');
INSERT INTO ds_zipper_thickness (ztid, ztv, unit) VALUES (1, null, 'No Requirement');