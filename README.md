#Gestor de Tareas - Guía de Configuración  

Esta guía te ayudará a configurar y poner en funcionamiento la aplicación Gestor de Tareas en un entorno Ubuntu.  

  
#Configuración del Entorno  
Asegúrate de tener instalado git, PHP version 8.2 y MySQL en tu máquina Ubuntu.  

#Clonar el Repositorio  
Abrimos un terminal y ponemos.  
`` cd /opt/lampp/htdocs``  
creamos una carpeta llamada 'tasks' y dentro de ella clonamos el repositorio  
``git clone https://github.com/luis13xd/taskmanager.git``  
Luego accedemos a nuestra carpeta llamada taskmanager.  
``cd taskmanager``  
Despues nos cambiamos a la rama develop  
``git checkout develop``  
Con esto ya tendremos nuestro proyecto clonado.  

#Configuración de la Base de Datos  
Importar la Base de Datos llamada tasks_db.sql en phpmyadmin, la base de datos esta en la raiz de este proyecto.  
  
#Configuración de la Conexión a la Base de Datos:  
Ve al archivo config/db.php y asegúrate de que las credenciales de conexión a la base de datos sean correctas (nombre de usuario, contraseña, nombre de la base de datos).  
  
#Ejecutar la Aplicación  
Nos dirigimos a la carpeta de nuestra maquina con permisos de administrador y verificamos el estado.  
``sudo /opt/lampp/lampp status``  
Ubicado en nuestra carpeta lampp ejecutamos los servicios de xampp.  
``sudo ./lampp start``  
  

Asegúrate de que los permisos de archivos y directorios sean correctos para el servidor web.  
  

Abre tu navegador web y navega a http://localhost/tasks/taskmanager/frontend/ (o la ruta adecuada según tu configuración de servidor).  
