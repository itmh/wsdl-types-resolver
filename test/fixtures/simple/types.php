<?php

return [
    0   => 'struct RoleList {
}',
    1   => 'struct RoleListResponse {
 ArrayOfRole RoleListResult;
}',
    2   => 'struct ArrayOfRole {
 Role Role;
}',
    3   => 'struct Role {
}',
    4   => 'struct InfoCode {
 int ID;
 string Name;
 string Code;
}',
    5   => 'struct DemandStateList {
}',
    6   => 'struct DemandStateListResponse {
 ArrayOfDemandState DemandStateListResult;
}',
    7   => 'struct ArrayOfDemandState {
 DemandState DemandState;
}',
    8   => 'struct DemandState {
}',
    9   => 'struct DemandWorkflowList {
 int role_id;
 boolean has_native;
}',
    10  => 'struct DemandWorkflowListResponse {
 ArrayOfDemandWorkflow DemandWorkflowListResult;
}',
    11  => 'struct ArrayOfDemandWorkflow {
 DemandWorkflow DemandWorkflow;
}',
    12  => 'struct DemandWorkflow {
 dateTime DefaultDeadline;
}',
    13  => 'struct RoleToWorkflowList {
 int role_id;
}',
    14  => 'struct RoleToWorkflowListResponse {
 ArrayOfRoleToWorkflow RoleToWorkflowListResult;
}',
    15  => 'struct ArrayOfRoleToWorkflow {
 RoleToWorkflow RoleToWorkflow;
}',
    16  => 'struct RoleToWorkflow {
 int RoleID;
 int WorkflowID;
}',
    17  => 'struct DemandListOld {
 int role_id;
 int manager_api;
 boolean show_closed;
 int limit;
}',
    18  => 'struct DemandListOldResponse {
 ArrayOfDemand DemandListOldResult;
}',
    19  => 'struct ArrayOfDemand {
 Demand Demand;
}',
    20  => 'struct Demand {
 int AuthorID;
 string AuthorName;
 int ExecutorID;
 int ContractId;
 DemandBuilding Building;
 int FlatID;
}',
    21  => 'struct DemandBase {
 int ID;
 DemandState DemandState;
 DemandWorkflow DemandWorkflow;
 dateTime CreatedDt;
 dateTime Deadline;
 string Main;
 int Priority;
 DemandLock DemandLock;
}',
    22  => 'struct DemandLock {
 int ManagerApi;
 string ManagerName;
 dateTime ExpireDt;
 dateTime CreatedDt;
}',
    23  => 'struct DemandBuilding {
 int Branch;
}',
    24  => 'struct DemandsFilterGet {
 string filter_json;
 int limit;
 int offset;
}',
    25  => 'struct DemandsFilterGetResponse {
 DemandsFilter DemandsFilterGetResult;
}',
    26  => 'struct DemandsFilter {
 ArrayOfDemand DemandList;
 int DemandsCount;
 int DemandsOverdueCount;
 int DemandsNewCount;
 int DemandsOpenCount;
 int DemandsDoneCount;
 int DemandsProcessCount;
 int DemandsRejectCount;
}',
    27  => 'struct DemandLock {
 int demand_id;
 int manager_id;
}',
    28  => 'struct DemandLockResponse {
 dateTime DemandLockResult;
}',
    29  => 'struct DemandUnlock {
 int demand_id;
 int manager_api;
}',
    30  => 'struct DemandUnlockResponse {
}',
    31  => 'struct DemandsPhoneCallsAdd {
 ArrayOfDemand2PhoneCall demand_2_phone_call_list;
}',
    32  => 'struct ArrayOfDemand2PhoneCall {
 Demand2PhoneCall Demand2PhoneCall;
}',
    33  => 'struct Demand2PhoneCall {
 int DemandId;
 decimal PhoneCallId;
}',
    34  => 'struct DemandsPhoneCallsAddResponse {
}',
    35  => 'struct DemandAssign {
 int demand_id;
 int manager_api;
 int executor_id;
}',
    36  => 'struct DemandAssignResponse {
}',
    37  => 'struct UrlGisGet {
}',
    38  => 'struct UrlGisGetResponse {
 string UrlGisGetResult;
}',
    39  => 'struct UrlSssGet {
}',
    40  => 'struct UrlSssGetResponse {
 string UrlSssGetResult;
}',
    41  => 'struct BuildingInfoGet {
 int building_id;
}',
    42  => 'struct BuildingInfoGetResponse {
 DemandAddress BuildingInfoGetResult;
}',
    43  => 'struct DemandAddress {
 int SssAddressId;
 string Problem;
 string ConnectionPossibilityName;
 string ConnectionPossibilityCode;
}',
    44  => 'struct BuildingInfoByDemandGet {
 int demand_id;
}',
    45  => 'struct BuildingInfoByDemandGetResponse {
 DemandAddress BuildingInfoByDemandGetResult;
}',
    46  => 'struct ManagerStatusGet {
 int manager_api;
 int current_role_id;
}',
    47  => 'struct ManagerStatusGetResponse {
 ManagerStatus ManagerStatusGetResult;
}',
    48  => 'struct ManagerStatus {
 int ID;
 int RoleID;
 int MetaStatusID;
 string Code;
 string Name;
 boolean HasSipStatus;
}',
    49  => 'struct ManagerStatusAvailableList {
 int manager_api;
 int role_id;
}',
    50  => 'struct ManagerStatusAvailableListResponse {
 ArrayOfManagerStatus ManagerStatusAvailableListResult;
}',
    51  => 'struct ArrayOfManagerStatus {
 ManagerStatus ManagerStatusAvailable;
}',
    52  => 'struct ManagerStatusSet {
 int manager_api;
 int status;
 int current_role_id;
}',
    53  => 'struct ManagerStatusSetResponse {
}',
    54  => 'struct ManagerStatusPreviousSet {
 int manager_api;
 int role_id;
}',
    55  => 'struct ManagerStatusPreviousSetResponse {
}',
    56  => 'struct CallCenterSchedulerAdd {
 string manager_ad_login;
 dateTime date_from;
 dateTime date_trim;
 ArrayOfCallCenterWorkShift work_shift_list;
}',
    57  => 'struct ArrayOfCallCenterWorkShift {
 CallCenterWorkShift CallCenterWorkShift;
}',
    58  => 'struct CallCenterWorkShift {
 dateTime DateFrom;
 dateTime DateTrim;
}',
    59  => 'struct CallCenterSchedulerAddResponse {
}',
    60  => 'struct CallCenterSchedulerSyncronise {
 ArrayOfCallCenterWorkShiftListItem work_shift_list;
 dateTime date_from;
 dateTime date_trim;
}',
    61  => 'struct ArrayOfCallCenterWorkShiftListItem {
 CallCenterWorkShiftListItem CallCenterWorkShiftListItem;
}',
    62  => 'struct CallCenterWorkShiftListItem {
 string ManagerLogin;
 dateTime Date;
}',
    63  => 'struct CallCenterSchedulerSyncroniseResponse {
}',
    64  => 'struct WorkShiftNearestGet {
 int manager_api;
}',
    65  => 'struct WorkShiftNearestGetResponse {
 CallCenterWorkShiftManagerInfo WorkShiftNearestGetResult;
}',
    66  => 'struct CallCenterWorkShiftManagerInfo {
 int WorkTime;
 int RestTime;
}',
    67  => 'struct DemandProcessedCountGet {
 int manager_api;
}',
    68  => 'struct DemandProcessedCountGetResponse {
 int DemandProcessedCountGetResult;
}',
    69  => 'struct ClientInformationBasicGet {
 int contract_id;
}',
    70  => 'struct ClientInformationBasicGetResponse {
 ClientInformationBasic ClientInformationBasicGetResult;
}',
    71  => 'struct ClientInformationBasic {
 string ContractName;
 string ClientName;
 string ServiceClassName;
 string ServiceState;
 string MoneyBalance;
 string Recommended;
}',
    72  => 'struct ClientInformationAdditionalGet {
 int contract_id;
}',
    73  => 'struct ClientInformationAdditionalGetResponse {
 ClientInformationAdditional ClientInformationAdditionalGetResult;
}',
    74  => 'struct ClientInformationAdditional {
 string ClientAddress;
 ArrayOfClientContact ClientContactList;
}',
    75  => 'struct ClientPassportInfo {
 string ClientPassportNumber;
 string ClientPassportIssuer;
 dateTime ClientPassportDate;
}',
    76  => 'struct ArrayOfClientContact {
 ClientContact ClientContact;
}',
    77  => 'struct ClientContact {
 string ChannelName;
 string Name;
 string Mem;
 string Subscribes;
 boolean IsVerified;
 boolean Accountant;
 boolean Technical;
 string Code;
}',
    78  => 'struct TariffInfoGet {
 int contract_id;
}',
    79  => 'struct TariffInfoGetResponse {
 TariffInfo TariffInfoGetResult;
}',
    80  => 'struct TariffInfo {
 string TariffName;
 string Mem;
 string DayTax;
 string SpeedIn;
 TrialPeriodCondition TrialPeriodCondition;
 ArrayOfString DiscountItemsList;
}',
    81  => 'struct TrialPeriodCondition {
 boolean IsAvailable;
 boolean IsActiveNow;
 boolean IsUsed;
 dateTime FromDate;
 dateTime TrimDate;
}',
    82  => 'struct ArrayOfString {
 string string;
}',
    83  => 'struct DemandsCrashGet {
 int contract_id;
 int limit;
 int offset;
 boolean default_state;
}',
    84  => 'struct DemandsCrashGetResponse {
 CrashDemandViewModel DemandsCrashGetResult;
}',
    85  => 'struct CrashDemandViewModel {
 ArrayOfCrashDemand CrashDemandList;
 int Count;
}',
    86  => 'struct ArrayOfCrashDemand {
 CrashDemand CrashDemand;
}',
    87  => 'struct CrashDemand {
 boolean Closed;
}',
    88  => 'struct IdentificationDemand {
 int ContractID;
 int DemandID;
 dateTime StartDt;
 dateTime EndDt;
}',
    89  => 'struct MaintenanceDemand {
 dateTime StartedActually;
 dateTime EndedActually;
 string Stage;
}',
    90  => 'struct DemandsMaintenanceGet {
 int contract_id;
 int limit;
 int offset;
 boolean default_state;
}',
    91  => 'struct DemandsMaintenanceGetResponse {
 MaintenanceDemandViewModel DemandsMaintenanceGetResult;
}',
    92  => 'struct MaintenanceDemandViewModel {
 ArrayOfMaintenanceDemand MaintenanceDemandList;
 int Count;
}',
    93  => 'struct ArrayOfMaintenanceDemand {
 MaintenanceDemand MaintenanceDemand;
}',
    94  => 'struct DemandByContractList {
 int contract_id;
}',
    95  => 'struct DemandByContractListResponse {
 ArrayOfDemandBase DemandByContractListResult;
}',
    96  => 'struct ArrayOfDemandBase {
 DemandBase DemandByContract;
}',
    97  => 'struct DemandDetailGet {
 int demand_id;
}',
    98  => 'struct DemandDetailGetResponse {
 DemandDetail DemandDetailGetResult;
}',
    99  => 'struct DemandDetail {
 int ContractID;
 ArrayOfDemandContact DemandContacts;
 int AuthorID;
 string AuthorName;
 string AuthorFullName;
 string Mem;
 int CrashDemandLinked;
 string CrashDemandLinkedName;
 int CauseID;
 string CauseName;
 int DotID;
 string DotName;
 string RisDemandContacts;
 ArrayOfRecordLink RecordLinkList;
 DemandAddress Address;
 int ExecutorID;
 string ExecutorName;
 dateTime LastModify;
}',
    100 => 'struct ArrayOfDemandContact {
 DemandContact DemandContact;
}',
    101 => 'struct DemandContact {
 string Code;
 string Value;
}',
    102 => 'struct ArrayOfRecordLink {
 RecordLink RecordLink;
}',
    103 => 'struct RecordLink {
 string Link;
 dateTime Dt;
 string Phone;
}',
    104 => 'struct DemandCommentList {
 int demand_id;
}',
    105 => 'struct DemandCommentListResponse {
 ArrayOfComment DemandCommentListResult;
}',
    106 => 'struct ArrayOfComment {
 Comment DemandComment;
}',
    107 => 'struct Comment {
 int CommentID;
 string Text;
 dateTime dt;
 string DepartmentHref;
 string FullNameHref;
 int ManagerID;
 string ManagerName;
 string ManagerFullName;
 string GroupName;
 int DemandID;
 string WorkflowName;
 boolean IsManager;
 boolean IsClientRead;
}',
    108 => 'struct DemandCommentAdd {
 int demand_id;
 int manager_api;
 string text;
}',
    109 => 'struct DemandCommentAddResponse {
}',
    110 => 'struct DemandStateSet {
 int demand_id;
 int manager_api;
 int state;
 string text;
}',
    111 => 'struct DemandStateSetResponse {
}',
    112 => 'struct CallStatisticsAdd {
 ArrayOfPhoneCall phone_calls;
}',
    113 => 'struct ArrayOfPhoneCall {
 PhoneCall PhoneCall;
}',
    114 => 'struct PhoneCall {
 decimal Id;
 decimal ParentId;
 string FromNumber;
 string ToNumber;
 dateTime StartDate;
 dateTime EndDate;
 string RecordLink;
 string CallType;
 ArrayOfPhoneCallAssign CallAssignees;
}',
    115 => 'struct ArrayOfPhoneCallAssign {
 PhoneCallAssign PhoneCallAssign;
}',
    116 => 'struct PhoneCallAssign {
 int Id;
 decimal Call;
 dateTime AssignDate;
 dateTime AnswerDate;
 dateTime FinishDate;
 string ManagerName;
 int ManagerId;
}',
    117 => 'struct CallStatisticsAddResponse {
}',
    118 => 'struct CallTransferPhoneList {
 int role_id;
}',
    119 => 'struct CallTransferPhoneListResponse {
 ArrayOfCallTransferPhone CallTransferPhoneListResult;
}',
    120 => 'struct ArrayOfCallTransferPhone {
 CallTransferPhone CallTransferPhone;
}',
    121 => 'struct CallTransferPhone {
 int ID;
 string Name;
 string Comment;
}',
    122 => 'struct ManagerInternalPhoneList {
}',
    123 => 'struct ManagerInternalPhoneListResponse {
 ArrayOfManagerInternalPhone ManagerInternalPhoneListResult;
}',
    124 => 'struct ArrayOfManagerInternalPhone {
 ManagerInternalPhone ManagerInternalPhone;
}',
    125 => 'struct ManagerInternalPhone {
 int Manager;
 string PhoneNumber;
}',
    126 => 'struct ManagerInternalPhoneUpdate {
 ArrayOfNtLoginInternalPhone nt_login_internal_phone_list;
}',
    127 => 'struct ArrayOfNtLoginInternalPhone {
 NtLoginInternalPhone NtLoginInternalPhone;
}',
    128 => 'struct NtLoginInternalPhone {
 string NtLogin;
 string PhoneNumber;
}',
    129 => 'struct ManagerInternalPhoneUpdateResponse {
}',
    130 => 'struct CityList {
 int branch_id;
}',
    131 => 'struct CityListResponse {
 ArrayOfCity CityListResult;
}',
    132 => 'struct ArrayOfCity {
 City City;
}',
    133 => 'struct City {
 int Id;
 string Name;
 int BranchId;
 int CityAddress;
}',
    134 => 'struct StreetList {
 int city_id;
 string term;
}',
    135 => 'struct StreetListResponse {
 ArrayOfInfo StreetAutocompleteListResult;
}',
    136 => 'struct ArrayOfInfo {
 Info Street;
}',
    137 => 'struct Info {
 int ID;
 string Name;
}',
    138 => 'struct BuildingList {
 int street_id;
}',
    139 => 'struct BuildingListResponse {
 ArrayOfInfo1 BuildingListResult;
}',
    140 => 'struct ArrayOfInfo1 {
 Info Building;
}',
    141 => 'struct DocumentFileGet {
 int paper_version;
}',
    142 => 'struct DocumentFileGetResponse {
 PaperFile DocumentFileGetResult;
}',
    143 => 'struct PaperFile {
 string Name;
 string Type;
 base64Binary Data;
}',
    144 => 'struct DocumentDelete {
 int paper_version;
 int manager_api;
}',
    145 => 'struct DocumentDeleteResponse {
}',
    146 => 'struct DocumentList {
 int demand;
}',
    147 => 'struct DocumentListResponse {
 ArrayOfPaper DocumentListResult;
}',
    148 => 'struct ArrayOfPaper {
 Paper Paper;
}',
    149 => 'struct Paper {
 int PaperID;
 int PaperVersion;
 int Demand;
 int Contract;
 int FinanceDocument;
 string Name;
 string Mem;
 int PaperTypeId;
 string PaperTypeCode;
 string PaperTypeName;
 string PackTemplateCode;
 string MimeType;
 string FileName;
 Stream InputStream;
 string DocumentNumber;
 dateTime DocumentDt;
 dateTime Dt;
 int Size;
 int UploaderId;
 string UploaderName;
}',
    150 => 'struct Stream {
 long Position;
 int ReadTimeout;
 int WriteTimeout;
}',
    151 => 'struct MarshalByRefObject {
}',
    152 => 'struct DocumentCreate {
 int demand;
 dateTime document_dt;
 string mem;
 PaperFile file;
 int manager_api;
}',
    153 => 'struct DocumentCreateResponse {
 int DocumentCreateResult;
}',
    154 => 'struct Ping {
 string payload;
}',
    155 => 'struct PingResponse {
 string Result;
}',
    156 => 'struct GetUsedDB {
}',
    157 => 'struct GetUsedDBResponse {
 string Result;
}',
    158 => 'struct PingDatabase {
 string payload;
}',
    159 => 'struct PingDatabaseResponse {
 string Result;
}',
    160 => 'struct BuildInfoGet {
}',
    161 => 'struct BuildInfoGetResponse {
 BuildInfo BuildInfoGetResult;
}',
    162 => 'struct BuildInfo {
 string CommitHash;
 string Branch;
 dateTime CommitDate;
 string UserName;
 dateTime BuildDate;
}',
    163 => 'struct ArrayOfManagerStatus1 {
 ManagerStatus ManagerStatus;
}',
    164 => 'struct ArrayOfDemandBase1 {
 DemandBase DemandBase;
}',
    165 => 'struct ArrayOfComment1 {
 Comment Comment;
}',
    166 => 'struct ArrayOfInfo2 {
 Info Info;
}'
];
