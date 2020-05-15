
Create Table ds_order_request(
OrderID INT Not Null COMMENT '订单ID',
CustomerID Int Not Null COMMENT '用户ID',
OrderDate DATETIME Not NUll COMMENT '下单日期',
SampleSent TINYINT Default 0 Not Null COMMENT '用户样本是否已发送：0否；1是; 默认0',
FabricType TINYINT Not Null COMMENT '布料类型',
Primary Key (OrderID));


Create Table ds_order_request_garment(
OrderID INT Not NUll COMMENT 'Garment订单ID',
Primary Key (OrderID),
Foreign Key (OrderID) references ds_order_request(OrderID)
);


Create Table ds_button_material(
ButtonMaterialID INT Not Null COMMENT '纽扣材料ID',
ButtonMaterial VARCHAR(45) Not Null COMMENT '纽扣材料名称',
Primary Key (ButtonMaterialID)
);


Create Table ds_button_requirement(
OrderID INT Not Null COMMENT 'garment订单ID',
ButtonMaterialID INT Not Null COMMENT '纽扣材料ID',
ButtonImg json Not Null COMMENT '纽扣图片url',
ButtonDiameter Float Not Null COMMENT '纽扣直径',
ButtonThickness Float Not Null COMMENT '纽扣厚度',
Primary Key (OrderID),
Foreign Key (OrderID) references ds_order_request_garment(OrderID),
Foreign Key (ButtonMaterialID) references ds_button_material(ButtonMaterialID)
);


Create Table ds_zipper_material
(ZipperMaterialID INT Not Null COMMENT '拉链材料ID',
ZipperMaterial VARCHAR(45) Not Null COMMENT '拉链材料名称',
Primary Key (ZipperMaterialID)
);


Create Table ds_zipper_requirement(
OrderID INT Not Null COMMENT 'garment订单ID',
ZipperMaterialID INT Not Null COMMENT '拉链材料ID',
ZipperImg json Not Null COMMENT '拉链图片url',
ZipperNumber INT Not Null COMMENT '拉链数量',
ZipperThickness Float Not Null COMMENT '拉链厚度',
Primary Key (OrderID),
Foreign Key (OrderID) references ds_order_request_garment(OrderID),
Foreign Key (ZipperMaterialID) references ds_zipper_material(ZipperMaterialID)
);



Create Table ds_order_request_fabric(
OrderID INT Not Null COMMENT 'fabric订单ID',
Quantity INT Not Null COMMENT '订单数量',
Requirement VARCHAR(200) Not Null COMMENT '订单布料要求',
Primary key (OrderID),
Foreign Key (OrderID) references ds_order_request(OrderID)
);


Create Table ds_fabric_material(
FabricMaterialID INT Not Null COMMENT '布料材料ID',
FabricMaterial VARCHAR(45) Not Null COMMENT '布料材料',
Primary Key (FabricMaterialID)
);


Create Table ds_fabric_type(
FabricTypeID INT Not Null COMMENT '布料类型ID',
FabricType VARCHAR(45) Not Null COMMENT '布料类型',
Primary Key (FabricTypeID)
);


Create Table ds_fabric_information(
FabricID INT Not Null COMMENT '布料ID',
FabricMaterialID INT Not Null COMMENT '布料材料ID',
FabricTypeID INT Not Null COMMENT '布料类型ID',
FabricWeight float Not Null COMMENT '布料需求重量',
Primary Key (FabricID),
foreign Key (FabricMaterialID) references ds_fabric_material(FabricMaterialID),
foreign Key (FabricTypeID) references ds_fabric_type(FabricTypeID)
);


Create Table ds_fabric_requirement(
OrderID INT Not Null COMMENT '订单ID',
FabricImg json Not Null COMMENT '布料图片url',
FabricID INT Not Null COMMENT '布料ID',
Primary Key (OrderID),
foreign Key (OrderID) references ds_order_request_garment(OrderID),
foreign Key (OrderID) references ds_order_request_fabric(OrderID),
foreign Key (FabricID) references ds_fabric_information(FabricID)
);
