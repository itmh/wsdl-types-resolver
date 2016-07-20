<?php

return [
    'struct BaseImageInfo {
 boolean IsUsed;
 int Count;
 int ParentID;
 BaseImageInfo Group;
 ImageInfo Leaf;
}',
    'struct ImageInfo {
 boolean IsUsed;
}',
    'struct BaseImageTree {
}',
    'struct BaseImageTreeResponse {
 BaseImageInfo BaseImageTree;
}',
];
