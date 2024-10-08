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
### OBJECT FIT
```CSS
object-fit: contain;
object-fit: fill;
object-fit: none;
```
Object-cover se utiliza para que un elemento cubra, esté contenido dentro, se estreche dentro de todo su contenedor o especifique un tamaño que queremos que tome si el contenedor se hace muy grance. Se puede establecer en Tailwind al lado de los tamaños que queramos como mínimos.

```HTML
<div>
  <img class = "object-cover h48 w96">
</div>
<div>
  <img class = "object contain h48 w-96">
</div>
<div>
  <img class = "object-fill h48 w-96">
</div>
<div>
  <img class = "object-scale-down h-48 w-96">
</div>
```` 
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
justify-content: flex-end;
``` 
Para justificar el contenido hay que especificar primero el flex (o el grid) y después se escribe el tipo de justify que queramos: 

```HTML
<div class = "flex justify-content:normal"></div>
<div class = "flex justify-content:space-between"></div>
<div class = "grid grid-flow-col justify-stretch"></div>
<div class="grid justify-items-start"></div>
<!-- Para controlar como se comporta individualmente un contenedor: -->
<div class="grid justify-items-stretch ...">
  <div class="justify-self-start">este tiene un justify diferente al resto</div>
</div>
```
### LAYOUT TOP/RIGHT/BOTTOM/LEFT
```css
inset:0px;
left:0px;
bottom:0px;
inset-inline-start: 0px;
```
Serie de utilidades para controlar el posicionamiento horizontal o vertical de los elementos dentro de un contenedor posicionado.
```HTML
<div class="relative h-32 w-32">
  <div class = "absolute left-0 top-0 h-16 w-16">esquina izquierda arriba</div>
</div>
<div class="relative h-32 w-32">
  <div class = "absolute inset-x-0 top-0">expandirse el borde superior</div>
</div>
<div class="relative h-32 w-32">
  <div class = "absolute top-0 right-0 h-16 w-16">esquina derecha arriba</div>
</div>
<div class="relative h-32 w-32">
  <div class = "absolute inset-y-0 left-0 h-16 w-16">expandirse el borde izquierdo</div>
</div>
<div class="relative h-32 w-32">
  <div class = "absolute inset-0">cubrir el padre completo</div>
</div>
<div class="relative h-32 w-32">
  <div class = "absolute bottom-0 right-0 h-16 w-16">Esquina izquierda abajo</div>
</div>
```
### PADDING
```CSS
paddding: 0px;
padding-left: 0px;
padding-inline-start: 1px;
padding-inline-end: 10px;
```
Se controla con `pt-*`, `pr-*`, `pb-*`, y `pl-*`, siendo respectivamente TOP RIGHT BOTTOM y LEFT. 
Para los inline-start y inline-end se utiliza `ps-*`y `pe-*`.
```HTML
<div class="pt-6 ...">padding top 6(24 píxeles)</div>
<div class="pr-4 ...">padding right</div>
<div class="pb-8 ...">padding bottom</div>
<div class="pl-2 ...">padding left</div>
<div class="px-8 ...">padding horizontal</div>
<div class="py-8 ...">padding vertical</div>
<br/>
<div dir="ltr">
  <div class="ps-8 ...">hacia la derecha</div>
  <div class="pe-8 ...">hacia la izquierda</div>
<div>
```
### MARGIN
```CSS
margin: 0px;
margin-left:1px;
margin-right:10px;
margin-inline-start:5px;
```
Se utiliza mt-*, mr-*, mb-*, y ml-*  para controlar los márgenes TOP RIGHT BOTTOM y LEFT. 
Igual que el padding, utiliza mx-* para el eje horizontal y my-* para el eje vertical. 
Además, se uriliza ms-* para inline-start y me-* para inline-end.
```HTML
<div class="mt-6 ...">margin top 24</div>
<div class="mr-4 ...">margin right</div>
<div class="mb-8 ...">margin bottom</div>
<div class="ml-2 ...">margin left</div>
<div dir="ltr">
  <div class="ms-8 ...">inline-start</div>
  <div class="me-8 ...">inline-end</div>
<div>
```
### SIZING (Width y Height)
```CSS
width: 10px;
hegith: 3px;
```
Se puede utilizar width para controlar el ancho, hight para controlar el tamaño vertical y size para controlar ambos.
```HTML
<div class="w-10 h-5"></div>
<div class="size-16"></div>
<div class="size-full">Cubre su contenedor padre(como poner 100%)</div>
<div class="size-full md:size-auto"> quita el width y height asociado bajo una condición concreta</div>
```
### TIPOGRAFÍA
```CSS
font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-family: ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
```
Font family se utiliza para elegir una tipografía concreta. A continuación veremos cómo usar Font Family en Tailwind así como todas las especificidades que le podemos atribuir a la tipografía.
```HTML
<div class="font-serif">fuente con serif</div>
<div class="font-sans">fuente sin serif</div>ç
<div class="font-mono">fuente monospace</div>
```
Para darle un tamaño tenemos que utilizar los tamaños predeterminados (o crear los propios en Config.):
```HTML
<div class="text-xs"> texto en 12px con altura 16px</div>
<div class="text-sm">texto en 14px con altura 20px</div>
<div class="text-base">texto en 16px con altura 24</div>
<div class="text-lg">texto en 18px con altura 28px</div>
```
Como podemos comprobar sigue una prograsión de 1:2 1:4 con respecto al tamaño, lo que además obliga a estandarizar el texto en tamaños predeterminados y proporcionales.  
Se cumple una situación parecida con respecto al peso de la tipografía:
```HTML
<div class="font-thin"> equivalente al font-weight 100</div>
<div class="font-extralight"> equivalente al font-weight 200</div>
<div class="font-light"> equivalente al font-weight 300</div>
<div class="font-normal"> equivalente al font-weight 400</div>
```
Y así sucesivamente.  
Con respecto al espacio entre las letras también existe una propiedad que utiliza palabras concretas para definir tamaños proporcionados:
```HTML
<div class="traking-tighter"> Letra con espaciado -0.05em</div>
<div class="traking-tight"> Letra con espaciado -0.025em</div>
<div class="traking-normal"> Letra con espaciado 0em</div>
<div class="traking-wide"> Letra con espaciado 0.025em</div>
<div class="traking-wider"> Letra con espaciado 0.05em</div>
```
Seguidamente veremos ejemplos del TEXT ALIGN, que en CSS se escribe: 
```CSS
text-align:left;
text-align:justify;
```
```HTML
<div class="text-left"/>
<div class="text-justify"/>
```
### COLOR
Para atribuir un color Tailwind tiene una propia biblioteca de nombres para colores estándares. A continuación se pondrá la sintaxis para usarlo pero para buscar un color concreto ir a la siguiente dirección:   
[Colors](https://tailwindcss.com/docs/text-color)
```HTML
<p class="text-sky-400">Texto Azul</p>
<p class="text-sky-400/75">Texto Azul con opacidad del 75%</p>
<p class="text-fuchsia-950">Texto Rosa oscuro</p>
<p class="text-inherit">Color heredado</p>
<p class="text-slate-100">Texto Blanco</p>
```
### TEXT DECORATION
Principalmente usado para quitar el subrayado de los enlaces
```CSS
text-decoration-line:underline;
text-decoration: none;
text-decoration-line: line-through;
```
Y en Tailwind se utilizaría de la siguiente forma. 
```HTML
<p class="underline ..."></p>
<p class="overline ..."></p>
<p class="line-through ..."></p>
<p class="no-underline ..."></p>
```
### BACKGROUND
Para el Background Color, al igual que todos los colores, utiliza su propia nomenclatura.
```HTML
<button class="bg-indigo-500"/>
<button class="bg-white/75"/>
<button class="bg-transparent"/>
```
Para el Background Repeat, principalmente usado en la adaptabilidad de la página a tamaños:
```HTML
<div class="bg-repeat"></div>
<div class="bg-no-repeat"></div>
<div class="bg-repeat-x"> solo horizontalmente</div>
<div class="bg-repeat-y">solo verticalmente</div>
```
### BACKGROUND IMAGE
En este caso si queremos poner una imagen propia recomiendan  meterla en la configuración como un estilo propio:
```XML
module.exports = {
  theme: {
    extend: {
      backgroundImage: {
        'hero-pattern': "url('/img/hero-pattern.svg')",
        'footer-texture': "url('/img/footer-texture.png')",
      }
    }
  }
}
```
Y entonces se puede llamar desde el tipo BG
```HTML
<div class="bg-hero-pattern"/>
<div class="bg-footer-texture"/>
```
También tiene Gradientes nativos como imagenes de fondo: 
```HTML
<div class="bg-gradient-to-l from-cyan-500 to-blue-500">de cyan a azul hacia la izquierda</div>
```
Si queremos usar una imagen en un caso concreto y determinado podemos llamarla desde la clase:
```HTML
<div class="bg-[url('/img/hero-pattern.svg')]"></div>
```
### BORDERS
El ***Border Radius*** utiliza la misma forma que hemos visto en la tipografía. Una serie de tamaños preestablecidos que se invocan con palabras clave: 
```CSS
border-radius: 0px;
border-radius: 0.1rem;
```
```HTML
<div class="rounded"> 0.25rem;</div>
<div class="rounded-md">0.375rem;</div>
<div class="rounded-lg">0.5rem;</div>
<div class="rounded-full">9999px</div>
<div class="rounded-xl">0.75rem</div>
<div class="rounded-t-lg">border-top-left-radius:0.5rem, border-top-right-radius:0.5rem;</div>
```
Consultar este enlace para ver todas las opciones: 
[Border-radius](https://tailwindcss.com/docs/border-radius)