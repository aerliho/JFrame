<?php
/**
 * 统一入口文件
 * ------------
 * 1、框架核心、应用结构按统一规则固定，不提供可选定制功能(提供将大幅增加框架复杂度)
 * 2、应用结构也尽量简单，无需过多冗余模块的划分逻辑
 * 3、可选自定义VENDOR_PATH、RUNTIME_PATH、LOG_PATH、CACHE_PATH、TEMP_PATH、CONF_FILE多个常量实现简单的文件结构修改
 * ------------
 * @authors Jea杨 (JJonline@JJonline.Cn)
 * @date    2017-01-06 14:28:46
 * @version $Id$
 */
require './jframe/jframe.php';

/**


// Undefined variable: b
$a = $b;

// Division by zero
$b = 0;
$a = 3 / $b;


// Fatal error: Class 'wechatsdk' not found
new wechatsdk();


throw new Exception('$error');


// $1231fasd;

use jframe\Config;
dump(Config::get());
Config::set('db_port_slave',3307);
dump(Config::get());
Config::reset();
dump(Config::get());
*/