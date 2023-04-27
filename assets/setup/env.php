<?php

if (!defined('APP_NAME'))                       define('APP_NAME', 'Elias');
if (!defined('APP_ORGANIZATION'))               define('APP_ORGANIZATION', 'Elias');
if (!defined('APP_OWNER'))                      define('APP_OWNER', 'esco');
if (!defined('APP_DESCRIPTION'))                define('APP_DESCRIPTION', 'Personal Information Aliasing Management System');

if (!defined('ALLOWED_INACTIVITY_TIME'))        define('ALLOWED_INACTIVITY_TIME', time()+1*60);

if (!defined('DB_DATABASE'))                    define('DB_DATABASE', 'eliasdb');
if (!defined('DB_HOST'))                        define('DB_HOST','127.0.0.1');
if (!defined('DB_USERNAME'))                    define('DB_USERNAME','root');
if (!defined('DB_PASSWORD'))                    define('DB_PASSWORD' ,'');
if (!defined('DB_PORT'))                        define('DB_PORT' ,'');

if (!defined('MAIL_HOST'))                      define('MAIL_HOST', 'smtp.gmail.com');
if (!defined('MAIL_USERNAME'))                  define('MAIL_USERNAME', 'eliasmain2023@gmail.com');
if (!defined('MAIL_PASSWORD'))                  define('MAIL_PASSWORD', 'mbnevjkpfoctvitp');
if (!defined('MAIL_ENCRYPTION'))                define('MAIL_ENCRYPTION', 'ssl');
if (!defined('MAIL_PORT'))                      define('MAIL_PORT', 465);