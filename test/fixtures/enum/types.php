<?php

return [
    'struct BuildingAccessInfoGet {
 int building_id;
}',
    'struct BuildingAccessInfoGetResponse {
 BuildingAccessInfo BuildingAccessInfoGetResult;
}',
    'struct BuildingAccessInfo {
 ArrayOfAccessInfo AccessInfoList;
 DemandAddress BuildingInfo;
}',
    'struct ArrayOfAccessInfo {
 AccessInfo AccessInfo;
}',
    'struct AccessInfo {
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
    'string Mode',
    'struct DemandAddress {
 int SssAddressId;
 string Problem;
 string ConnectionPossibilityName;
 string ConnectionPossibilityCode;
}'
];
