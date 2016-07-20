<?php

return [
    'struct DocumentFileGet {
 int paper_version;
}',
    'struct DocumentFileGetResponse {
 PaperFile DocumentFileGetResult;
}',
    'struct PaperFile {
 string Name;
 string Type;
 base64Binary Data;
}',
    'struct DocumentCreate {
 int demand;
 dateTime document_dt;
 string mem;
 PaperFile file;
 int manager_api;
}',
    'struct DocumentCreateResponse {
 int DocumentCreateResult;
}'
];
