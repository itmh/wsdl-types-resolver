<?php

return [
    0  => 'struct BuildingAccessInfoGet {
 int building_id;
}',
    1  => 'struct BuildingAccessInfoGetResponse {
 BuildingAccessInfo BuildingAccessInfoGetResult;
}',
    2  => 'struct BuildingAccessInfo {
 ArrayOfAccessInfo AccessInfoList;
 DemandAddress BuildingInfo;
}',
    3  => 'struct ArrayOfAccessInfo {
 AccessInfo AccessInfo;
}',
    4  => 'struct AccessInfo {
 int Id;
 Mode Mode;
 int Number;
 string Description;
 string FIO;
 string Phone;
 string Job;
 string Email;
 string AuthorityName;
 boolean IsBuildingContact;
}',
    5  => 'string Mode',
    6  => 'struct DemandAddress {
 int SssAddressId;
 string Problem;
 string ConnectionPossibilityName;
 string ConnectionPossibilityCode;
}',
    7  => 'struct InfoCode {
 int ID;
 string Name;
 string Code;
}',
    8  => 'struct DemandAccessInfoGet {
 int demand_id;
}',
    9  => 'struct DemandAccessInfoGetResponse {
 BuildingAccessInfo DemandAccessInfoGetResult;
}',
    10 => 'struct AccessInfoAdd {
 int building_id;
 int manager_api;
 Mode mode;
 int number;
 string mem;
 string fio;
 string phone;
 string job;
 string email;
}',
    11 => 'struct AccessInfoAddResponse {
 int AccessInfoAddResult;
}',
    12 => 'struct AccessInfoSet {
 int access_info_id;
 int manager_api;
 Mode mode;
 int number;
 string mem;
 string fio;
 string phone;
 string job;
 string email;
}',
    13 => 'struct AccessInfoSetResponse {
}',
    14 => 'struct AccessInfoDelete {
 int access_info_id;
 int manager_api;
}',
    15 => 'struct AccessInfoDeleteResponse {
}',
    16 => 'struct DemandExecutorCancel {
 int demand_id;
}',
    17 => 'struct DemandExecutorCancelResponse {
}',
    18 => 'struct DemandCommentWithFileAdd {
 int demand_id;
 string manager_name;
 string mem;
}',
    19 => 'struct DemandCommentWithFileAddResponse {
}',
    20 => 'struct DemandExecutorList {
 int demand_id;
}',
    21 => 'struct DemandExecutorListResponse {
 ArrayOfManagerInfo DemandExecutorListResult;
}',
    22 => 'struct ArrayOfManagerInfo {
 ManagerInfo ManagerInfo;
}',
    23 => 'struct ManagerInfo {
 int ID;
 string Name;
 string DepartmentShortName;
 string DepartmentName;
 string Sid;
}',
    24 => 'struct Ping {
 string payload;
}',
    25 => 'struct PingResponse {
 string Result;
}',
    26 => 'struct GetUsedDB {
}',
    27 => 'struct GetUsedDBResponse {
 string Result;
}',
    28 => 'struct PingDatabase {
 string payload;
}',
    29 => 'struct PingDatabaseResponse {
 string Result;
}',
    30 => 'struct BuildInfoGet {
}',
    31 => 'struct BuildInfoGetResponse {
 BuildInfo BuildInfoGetResult;
}',
    32 => 'struct BuildInfo {
 string CommitHash;
 string Branch;
 dateTime CommitDate;
 string UserName;
 dateTime BuildDate;
 string ServerName;
 string DbName;
}'
];
