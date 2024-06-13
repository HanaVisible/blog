<?php

/* Cybersource Secure Acceptance W/M Profile Config */
// define('MERCHANT_ID', 'visible_1705488775');
// define('PROFILE_ID', 'C69254FA-0150-497E-88D7-CC87A76307BF');
// define('ACCESS_KEY', '5bb33ca0e8893a35a55d38b4a0960bb2');
// define('SECRET_KEY', '92fc2fe282f64be590d80d5ba159dae3a3f4ea2524d94c628f1f583abbb99b22b9024419ac4249f59e40a9c7d60923f67919a53f00df4f83ba5e1acbabd05242af39657ffaf14e6fb4f20405cffffaa989f144012aba48eebec96c4c87f6c25ce83113e9872f48779d716d0d3441d775597811d5204e4a2d8583f93724c2ea90');
// DF TEST: 1snn5n9w, LIVE: k8vif92e
define('DF_ORG_ID', '1snn5n9w');

define('MERCHANT_ID', 'gphk088013495200');
define('PROFILE_ID', '4A3D5655-F3A7-4544-8F53-9CEE9319847E');
define('ACCESS_KEY', 'dc100235a2a93e79af68fdd13b817143');
define('SECRET_KEY', 'bd6f122649694ad5984f692741f7102307c007f9569c40bdb667a7ac7e3aecff934b155506dc4dcca452ced59468bf51e782f77986fc421fa2098653f1f847a27eafc6559ffd412abfa9b5580633fd4bc698eb6879ef40bc84ce28d7c9bc32942f0d6d028776427492331859e4cae316c21a3a8b967d4b9f8ceec04b1aaf4909');

// PAYMENT URL
define('CYBS_BASE_URL', 'https://testsecureacceptance.cybersource.com');
// define('CYBS_BASE_URL', 'https://apitest.cybersource.com');

define('PAYMENT_URL', CYBS_BASE_URL.'/pay');
// define('PAYMENT_URL', '/sa-sop/debug.php');

define('TOKEN_CREATE_URL', CYBS_BASE_URL.'/token/create');
define('TOKEN_UPDATE_URL', CYBS_BASE_URL.'/token/update');

// EOF Secure Acceptance W/M

/* Cybersource Silnet Order Profile Config */
// define('MERCHANT_ID', ''); Merchant Id is Unique in two cases
define('PROFILE_ID_S', '');
define('ACCESS_KEY_S', '');
define('SECRET_KEY_S', '');

// DF TEST: 1snn5n9w, LIVE: k8vif92e
define('DF_ORG_ID_S', '1snn5n9w');

// PAYMENT URL
define('CYBS_BASE_URL_S', 'https://testsecureacceptance.cybersource.com/silent');

// define('CYBS_BASE_URL_S', 'https://apitest.cybersource.com/silent');

define('PAYMENT_URL_S', CYBS_BASE_URL_S.'/pay');
// define('PAYMENT_URL', '/sa-sop/debug.php');

define('TOKEN_CREATE_URL_S', CYBS_BASE_URL_S.'/token/create');
define('TOKEN_UPDATE_URL_S', CYBS_BASE_URL_S.'/token/update');

// EOF Silnet Order
