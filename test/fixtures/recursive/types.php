<?php

return [
    0  => 'struct BaseImageList {
 int base_image_id;
}',
    1  => 'struct BaseImageListResponse {
 BaseImageInfo BaseImageList;
}',
    2  => 'struct BaseImageInfo {
 boolean IsUsed;
 int Count;
 int ParentID;
 BaseImageInfo Group;
 ImageInfo Leaf;
}',
    3  => 'struct InfoCode {
 int ID;
 string Name;
 string Code;
}',
    4  => 'struct ImageInfo {
 boolean IsUsed;
}',
    5  => 'struct BaseImageTree {
}',
    6  => 'struct BaseImageTreeResponse {
 BaseImageInfo BaseImageTree;
}',
    7  => 'struct ImageTreeSearch {
 string image_name;
}',
    8  => 'struct ImageTreeSearchResponse {
 BaseImageInfo ImageTreeSearch;
}',
    9  => 'struct ImageList {
 int base_image_id;
}',
    10 => 'struct ImageListResponse {
 ImageInfo ImageList;
}',
    11 => 'struct BaseImageDetailsGet {
 int base_image_id;
}',
    12 => 'struct BaseImageDetailsGetResponse {
 BaseImage BaseImageDetailsGet;
}',
    13 => 'struct BaseImage {
 BaseImageInfo Parent;
 BaseImageParameter ParameterList;
}',
    14 => 'struct BaseImageParameter {
 BaseImageInfo Parent;
 Parameter Parameter;
 string Value;
 boolean IsUsedForName;
}',
    15 => 'struct Parameter {
 boolean IsUsed;
 string Marker;
 UnitOfMeasurement Unit;
 CustomDataType DataType;
 SingleValueSelectionType SelectionType;
 ParameterGroupInfo ParameterGroup;
 AttributeValueList ValueList;
 AttributeValueSelection SelectionLimit;
}',
    16 => 'struct UnitOfMeasurement {
 int ID;
 string Name;
 string Symbol;
 string Description;
}',
    17 => 'struct CustomDataType {
}',
    18 => 'struct SingleValueSelectionType {
}',
    19 => 'struct ParameterGroupInfo {
 boolean IsUsed;
 int Count;
 int ParentID;
 ParameterGroupInfo Group;
 ParameterInfo Leaf;
}',
    20 => 'struct ParameterInfo {
 boolean IsUsed;
 string Marker;
 UnitOfMeasurement Unit;
 CustomDataType DataType;
 SingleValueSelectionType SelectionType;
}',
    21 => 'struct AttributeValueList {
 int ID;
 string Marker;
 string Name;
}',
    22 => 'struct AttributeValueSelection {
 int Limit;
}',
    23 => 'struct BaseImageDetailsSet {
 BaseImage base_image;
}',
    24 => 'struct BaseImageDetailsSetResponse {
 BaseImageInfo BaseImageDetailsSet;
}',
    25 => 'struct BaseImageSubNamesUpdate {
 int base_image_id;
}',
    26 => 'struct BaseImageSubNamesUpdateResponse {
}',
    27 => 'struct BaseImageDelete {
 int base_image_id;
}',
    28 => 'struct BaseImageDeleteResponse {
}',
    29 => 'struct ImageDetailsGet {
 int image_id;
}',
    30 => 'struct ImageDetailsGetResponse {
 Image ImageDetailsGet;
}',
    31 => 'struct Image {
 int ID;
 boolean IsUsed;
 BaseImageInfo Parent;
 BaseImageParameter ParameterList;
}',
    32 => 'struct ImageDetailsSet {
 Image image;
}',
    33 => 'struct ImageDetailsSetResponse {
 ImageInfo ImageDetailsSet;
}',
    34 => 'struct ImageCountGet {
}',
    35 => 'struct ImageCountGetResponse {
 StatusBar ImageCountGet;
}',
    36 => 'struct StatusBar {
 int ParentCount;
 int ChildCount;
 int LeafCount;
}',
    37 => 'struct ImageUsingFlip {
 int image_id;
}',
    38 => 'struct ImageUsingFlipResponse {
 boolean ImageUsingFlip;
}',
    39 => 'struct ImageDelete {
 int image_id;
}',
    40 => 'struct ImageDeleteResponse {
}',
    41 => 'struct ParameterList {
 int parameter_group_id;
}',
    42 => 'struct ParameterListResponse {
 ParameterInfo ParameterList;
}',
    43 => 'struct ParameterGroupTree {
}',
    44 => 'struct ParameterGroupTreeResponse {
 ParameterGroupInfo ParameterGroupTree;
}',
    45 => 'struct ParameterTreeSearch {
 string parameter_name;
}',
    46 => 'struct ParameterTreeSearchResponse {
 ParameterGroupInfo ParameterGroupTree2ParameterName;
}',
    47 => 'struct ParameterGroupList {
 int parameter_group_id;
}',
    48 => 'struct ParameterGroupListResponse {
 ParameterGroupInfo ParameterGroupList;
}',
    49 => 'struct ParameterGroupDetailsGet {
 int parameter_group_id;
}',
    50 => 'struct ParameterGroupDetailsGetResponse {
 ParameterGroup ParameterGroupDetailsGet;
}',
    51 => 'struct ParameterGroup {
 ParameterGroupInfo Parent;
 ArrayOfParameterInfo ParameterInfoList;
 ArrayOfParameterGroupInfo ParameterSubGroupInfoList;
}',
    52 => 'struct ArrayOfParameterInfo {
 ParameterInfo ParameterInfo;
}',
    53 => 'struct ArrayOfParameterGroupInfo {
 ParameterGroupInfo ParameterGroupInfo;
}',
    54 => 'struct ParameterGroupDetailsSet {
 ParameterGroup parameter_group;
}',
    55 => 'struct ParameterGroupDetailsSetResponse {
 ParameterGroupInfo ParameterGroupDetailsSet;
}',
    56 => 'struct GroupCountGet {
}',
    57 => 'struct GroupCountGetResponse {
 StatusBar GroupCountGet;
}',
    58 => 'struct ParameterGroupDelete {
 int parameter_group_id;
}',
    59 => 'struct ParameterGroupDeleteResponse {
}',
    60 => 'struct ParameterDetailsGet {
 int parameter_id;
}',
    61 => 'struct ParameterDetailsGetResponse {
 Parameter ParameterDetailsGet;
}',
    62 => 'struct ParameterDetailsSet {
 Parameter parameter;
}',
    63 => 'struct ParameterDetailsSetResponse {
 ParameterInfo ParameterDetailsSet;
}',
    64 => 'struct ParameterUnitList {
}',
    65 => 'struct ParameterUnitListResponse {
 UnitOfMeasurement ParameterUnitList;
}',
    66 => 'struct ParameterDataTypeList {
}',
    67 => 'struct ParameterDataTypeListResponse {
 CustomDataType ParameterDataTypeList;
}',
    68 => 'struct ParameterValueSelectionTypeList {
}',
    69 => 'struct ParameterValueSelectionTypeListResponse {
 SingleValueSelectionType ParameterValueSelectionTypeList;
}',
    70 => 'struct ParameterValueList {
 int parameter_id;
}',
    71 => 'struct ParameterValueListResponse {
 AttributeValueList ParameterValueList;
}',
    72 => 'struct ParameterDelete {
 int parameter_id;
}',
    73 => 'struct ParameterDeleteResponse {
}',
    74 => 'struct UnitOfMeasurementAllGet {
}',
    75 => 'struct UnitOfMeasurementAllGetResponse {
 ArrayOfUnitOfMeasurement UnitOfMeasurementListResult;
}',
    76 => 'struct ArrayOfUnitOfMeasurement {
 UnitOfMeasurement UnitOfMeasurement;
}',
    77 => 'struct UnitOfMeasurementAdd {
 string name;
 string symbol;
 string description;
}',
    78 => 'struct UnitOfMeasurementAddResponse {
 int UnitOfMeasurementAddResult;
}',
    79 => 'struct UnitOfMeasurementUpdate {
 UnitOfMeasurement unit_of_measurement;
}',
    80 => 'struct UnitOfMeasurementUpdateResponse {
 UnitOfMeasurement UnitOfMeasurement;
}',
    81 => 'struct UnitOfMeasurementDelete {
 int unit_of_measurement_id;
}',
    82 => 'struct UnitOfMeasurementDeleteResponse {
}',
    83 => 'struct UniqueNameValidate {
 ObjectName object_name;
 string object_value;
 int parent_id;
}',
    84 => 'string ObjectName',
    85 => 'struct UniqueNameValidateResponse {
 boolean UniqueNameValidateResult;
}',
    86 => 'struct Ping {
 string payload;
}',
    87 => 'struct PingResponse {
 string Result;
}',
    88 => 'struct GetUsedDB {
}',
    89 => 'struct GetUsedDBResponse {
 string Result;
}',
    90 => 'struct PingDatabase {
 string payload;
}',
    91 => 'struct PingDatabaseResponse {
 string Result;
}',
    92 => 'struct BuildInfoGet {
}',
    93 => 'struct BuildInfoGetResponse {
 BuildInfo BuildInfoGetResult;
}',
    94 => 'struct BuildInfo {
 string CommitHash;
 string Branch;
 dateTime CommitDate;
 string UserName;
 dateTime BuildDate;
 string ServerName;
 string DbName;
}',
    95 => 'struct ArrayOfBaseImageInfo {
 BaseImageInfo BaseImageInfo;
}',
    96 => 'struct ArrayOfImageInfo {
 ImageInfo ImageInfo;
}',
    97 => 'struct ArrayOfCustomDataType {
 CustomDataType CustomDataType;
}',
    98 => 'struct ArrayOfSingleValueSelectionType {
 SingleValueSelectionType SingleValueSelectionType;
}',
    99 => 'struct ArrayOfAttributeValueList {
 AttributeValueList AttributeValueList;
}'
];
