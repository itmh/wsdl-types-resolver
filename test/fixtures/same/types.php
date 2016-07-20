<?php

return [
    'struct Task {
 long Id;
 int WorkflowId;
 Workflow Workflow;
 dateTime CreatedDt;
 dateTime ModifiedDt;
 dateTime SolveDt;
 dateTime PlanDt;
 int AuthorId;
 Employee Author;
 int ExecutorId;
 Employee Executor;
 int StatusId;
 Status Status;
 int SubStatusId;
 int Priority;
 string Main;
 string Mem;
}',
    'struct Workflow {
 int ID;
 string Name;
 string Code;
}',
    'struct Employee {
 int Id;
 int ClientId;
 int JobId;
 int ManagerId;
 int ManagerGroupId;
 boolean IsFired;
}',
    'struct Status {
 int Id;
 string Name;
 string Code;
 ArrayOfSubStatus SubStatuses;
}',
    'struct ArrayOfSubStatus {
 SubStatus SubStatus;
}',
    'struct SubStatus {
 string Code;
 int Id;
 string Name;
}',
    'struct TaskDetailsGet {
 long task_id;
}',
    'struct TaskDetailsGetResponse {
 Task TaskDetailsGet;
}'
];
