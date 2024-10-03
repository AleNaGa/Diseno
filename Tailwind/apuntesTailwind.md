# TAILWIND
## INFORMACIÓN GENERAL  

Tailwind es un framework de *CSS* que permite diseñar rápidamente el aspecto de la interfaz sin tener que utilizar *CSS*.  
### Características básicas
Está compuesto por pequeñas clases utilitarias que se combinan creando diseños. Es por ello que es muy personalizable y no parte de estilos predefinidos como otros frameworks. Los desarrolladores tienen el control del estilo e incluso pueden accefer a la configuración. 
 ### Principales ventajas de usar Tailwind

- Es eficiente
- Permite construir diseños a través de módulos sin escribir mucho código
- Las clases son reutilizables y adaptativas
-  El diseño es responsive

### Desventajas de Tailwind
- Ensucia el código *HTML* porque define los estilos en la nomenclatura de la clase
- Necesita la documentación y una nomenclatura concreta para utilizarlo, por lo que el aprendizaje es complejo  


## Getting Started

Para utilizar Tailwind se puede instalar a través de la herramienta **Tailwind CLI**. Esta instalación necesita *node.js*. Como no vamos utilizamos NODE por ahora, haremos la instalación de una manera alternativa: 

1. En el *head* de nuestro **HTML** utilizaremos una etiqueta *Script* para llamar al **CDN** de *Tailwind*:
```HTML
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
```
- El **CDN**, o *Content Delivery Network* es un grupo de servidores con contenido que permite la rápida transferencia de *assets* necesarios para páginas de **HTML**, archivos de **JavaScript**, imágenes, vídeos, etc...  

2. Con la importación a través de la *url* se puede configurar (como configuraríamos el *tailwind.config.js si lo hubiéramos instalado de otra forma) en la etiqueta de *Script*:
```HTML
 <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  ```
  - Esto permite crear tus propias variables de estilo de Tailwind, que después puedes llamar dentro del atributo *class* del **HTML**
  - Dentro de esta configuración se pueden importar plugins externos, utilidades, etc...
  - Para más información sobre la configuración de **Tailwind** consultar en: [Tailwind Configuration](https://tailwindcss.com/docs/configuration)

3. Ahora podemos probar a utilizar Tailwind dentro de el atributo *class*: 
```HTML
<h1 class="text-3xl font-bold underline text-clifford">
    Hello world!
</h1>
```
4. Lo que nos daría el siguiente resultado:  
<br>
![Hello World! Underlined Bold](img/HelloWorld!.PNG)  
<br>

## Manual de principales utilidades

### DISPLAY
```CSS
Display: flex;
Display: inline;
Display: grid;
```
En Tailwind la característica Display no hace falta especificar la etiqueta **Display**, simplemente indicamos qué tipo de display queremos usar: 
```HTML
<div class="flex"> contenido en flex </div>
<div class="inline"> contenido en linea </div>
<div class="grid"> contenido en grid </div>
```
### FLEX
```CSS
flex-direction: column;
flex-direction: row;
flex-direction: row-reverse; 
```
Para especificar qué tipo de **Flex** queremos utilizar, se indica tras la especificación de Flex dentro del Tailwind:
```HTML
<div class="flex-row"> contenido en Flex row<div>
<div class="flex-col"> contenido en Flex columna<div>
<div class="flex-row-reverse"> contenido en Flex row reverse<div>
```
### Flex-Wrap
```CSS
flex-wrap: wrap;
flex-wrap: nowrap;
```
Al igual que la dirección del Flex, podemos indicar el tipo de wrap que queremos continuando el flex con wrap o nowrap: 
```HTML
<div class="flex-nowrap"> contenido que se mantiene</div>
<div class="flex-wrap"> contenido que se pliega</div>
```
### GRID
```CSS
grid-template-columns: repeat(1, minmax(0, 1fr));
grid-template-columns: repeat(4, minmax(0, 1fr));
```
El **grid** se implementa igual que el **flex**, indicando a continuación y con guiones características del mismo: 
```HTML
<div class="grid-cols-1">contenido en una columna</div>
<div class="grid-cols-4"> contenido en cuatro columnas</div>
```
> Con este ejemplo se puede observar cómo Tailwind ahorra cantidad de código CSS y simplifica mucho el trabajo. 

### Auto Grid
```CSS
grid-auto-columns: auto;
grid-auto-columns: max-content;
```
Para las columnas automáticas se establece directamente como **auto-cols**
```HTML
<div class="auto-cols-auto"> contenido en columnas automáticas</div>
<div class="ato-cols-max"> contenido en maximas columnas posibles</div>
```
### GAP
```CSS
gap:0px;
column-gap:0px;
```
Para el **gap** se establece primero la dirección y después el tamaño en pixeles. Hay que poner primero la etiqueta de **Grid**
> Tailwind utiliza múltiplos de 4, por lo que 1 = 4, 2 = 8
 ```HTML
 <div class="grid gap-x-1 gap-y-2.5"> contenido con separación horizontal de 4 píxeles y con separación vertical de 7 píxeles
 </div>
 ```
### JUSTIFY
```CSS
justify-content: normal;
justify-content: space-between;
``` 
Para justificar el contenido hay que especificar primero el flex y después 

