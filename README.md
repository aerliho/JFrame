# JFrame
轻量级PHP微小项目框架

## JFrame概述

JFrame是一个日常工作中总结、提炼而出的用于微小PHP项目的快速框架，用于快速构建工作中遇到的微小PHP项目。JFrame支持简单的MVC、MySQL数据库、Redis缓存以及Smarty模板系统。

JFrame完美支持composer安装使用，依赖的外部库Smarty不加入版本控制，请使用composer命令自助安装，初始化JFrame后，在命令行模式下`composer update`即可；JFrame需PHP环境不低于5.5，建议PHP7.0及其以上环境。

JFrame非常适合用于微小PHP项目或内部流量可控、可预测项目，用于大中型项目请谨慎选择。

## JFrame规范


### JFrame文件结构
~~~
www  WEB部署目录，可以是web根目录也可以是web根目录下的子目录，名称任意
│
├─jframe                JFrame微小框架核心
│   ├─library           JFrame核心类所在文件夹
│   │   ├─jframe        基于命名空间的JFrame核心类文件夹目录
│   │
│   │
│   ├─helper.php        JFrame微小框架提供的常用函数库，核心框架不依赖
│   └─JFrame.php        JFrame微小框架入口文件
│
├─vendor                composer相关目录
│   ├─composer          composer自动加载器相关目录
│   ├─smarty            JFrame依赖的模板引擎smarty，可使用composer单独维护更新
│   ├─...               其他具体项目所安装依赖的使用composer安装的库
│   └─autoload.php      composer提供的自动加载器引用文件
│
│
├─application           基于JFrame的应用层PHP文件(应用层控制器、模块、模板之类的)
│    ├─controller       应用控制器目录，基于JFrame的应用控制器开发目录
│    ├─model            应用模块目录，基于JFrame的应用模块开发目录；这里的模块原则上与数据库中表一一对应
│    ├─runtime          应用运行时目录--缓存、日志等
│    ├─view             应用视图层模板文件目录
│    └─config.php       应用配置文件目录，微小项目仅该一个配置文件
│
│
├─asset                 微小项目的css、js、images等前端静态文件的目录
│   ├─css               前端所有css文件目录
│   ├─js                前端所有js文件目录
│   ├─images            前端所有资源图片文件目录
│   └─ ...              其他静态资源文件目录或文件
│
├─composer.json         composer的配置文件
├─composer.lock         composer的配置锁文件
├─.gitignore            git版本控制库的忽略规则文件
├─LICENSE
├─README.md
│
└─index.php             微小项目的统一入口文件，pathinfo模式的入口
~~~

### 目录和文件
*   目录不强制规范，驼峰和小写+下划线模式均支持；
*   类库、函数文件统一以`.php`为后缀；
*   类的文件名均以命名空间定义，并且命名空间的路径和类库文件所在路径一致；
*   类名和类文件名保持一致，统一采用驼峰法命名（首字母大写）；

### 函数和类、属性命名
*   类的命名采用驼峰法，并且首字母大写，例如 `User`、`UserType`，默认不需要添加后缀，例如`UserController`应该直接命名为`User`；
*   函数的命名使用小写字母和下划线（小写字母开头）的方式，例如 `get_client_ip`；
*   方法的命名使用驼峰法，并且首字母小写，例如 `getUserName`；
*   属性的命名使用驼峰法，并且首字母小写，例如 `tableName`、`instance`；
*   以双下划线“__”打头的函数或方法作为魔法方法，例如 `__call` 和 `__autoload`；

### 常量和配置
*   常量以大写字母和下划线命名，例如 `APP_PATH`和 `JFRAME_PATH`；
*   配置参数以小写字母和下划线命名，例如 `db_host` 和`redis_port`；

### 数据表和字段
*   数据表和字段采用小写加下划线方式命名，并注意字段名不要以下划线开头，例如 `app_user` 表和 `user_name`字段，不建议使用驼峰和中文作为数据表字段命名。


## JFrame的MVC支持情况

JFrame设计成单一入口形式，使用php的`pathinfo`模式传递框架参数和Get变量参数。JFrame的url结构为两层文件夹结构式，譬如`http://yourdomain/home/page`（或`http://yourdomain/home/page.html`）这种结构的url，通过服务器的rewrite后`home`就是执行的控制器类的名称（实际类名称是带有Controller后缀的，也就是`HomeController`），而`page`则为执行的home类中的page方法（PHP的类方法不区分大小写的机制导致操作名不区分大小写），当然这个方法必须是`public`作用域。关于服务器rewrite和php的pathinfo不再赘述。

JFrame利用PHP的反射（Reflection）机制，映射类名和方法名，用于执行控制器类和控制器方法，为了便于说明，称通过反射执行的PHP类为控制器（有时也会称之为控制器类，指代特定类型的统一PHP类），类中被执行的方法（public作用域）为操作。

在控制器类中可以通过命名空间（use语句）调用模型类，模型类与数据表一一对应，简化了MySQL对应数据表的操作，当然你也可以建立一个不予数据表对应的模型，为了便于叙述这种模型称之为空模型。

控制器类中自动初始化Smarty模板系统，通过Smarty快速构建前端界面。

## JFrame的MySQL数据库支持情况


## JFrame的Redis缓存支持情况


## JFrame的Smarty模板系统支持情况


## JFrame的常见问题