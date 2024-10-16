# docker-serverweb

## Pipeline para el Servidor 3 

## Descripción
La ejecución de esta pipeline lleva a cabo acciones automatizadas para comprobar el estado del docker que contiene al servidor web, levantarlo en caso de caída y, por otra parte, la actualización del sitio web.

## Stages
Tenemos 2 escenarios: tests y update_web que pueden ejecutarse con un mensaje en el commit o con el uso de una variable llamada "ACCIÓN" en el momento de ejecutar la pipeline con los 3 valores disponibles ("actualizar", "comprobar" o "crear").

## Playbooks
Para ejecutar tareas de Ansible, hay dos playbooks: 
[] xample.yml para el testeo técnico.
[] update-web.yml para la copia del código web hacia el volúmen persistente del docker.
