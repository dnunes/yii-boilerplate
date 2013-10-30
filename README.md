yii-boilerplate
===============
This is a base structure to Yii Framework, written in PHP. The sample provided assumes a HTML5 project frontend. No libs of any kind are included. This is just the framework, nice and clean.

### Why?
This repository contains, besides a *lighter* Yii Framework itself (that can be easily updated whenever needed), all configuration files correctly set up for the **improved folder structured** used here. It includes samples for models, controllers, layouts, views, partials, yadda yadda.

### Basic Structure
The current base structure is as follow:

- /
- **envconfig.php**
- **...**
- \_runtime/
- \_yiif/
- \_protected/
  - controllers/
  - config/
     - **main.php**
     - **routes.php**
  - models/
    - views/
       - **...**
       - layouts/
           - \_parts/
               - **...**
           - **...**
- webroot/
  - \_assets/
  - css/
  - img/
  - js/
  - **.htaccess.model**
- **README.md**

The relevant config files are:

- /**envconfig.php** - Environment configs are here (paths, databases, debug flag)
- /_protected/config/**routes.php** - Application Routes in the Yii default format
- /_protected/config/**main.php** - Other Yii configuration. I hope you don't need to touch this very often
- /webroot/**.htaccess.model** - Rewrite config. If you're using Apache, copy this file to *.htaccess* and adjust the paths (specially the "*RewriteBase*")
