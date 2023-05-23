var alumnos = document.getElementById("alumnos")
var profes = document.getElementById("profes")
var departamentos = document.getElementById("departamentos")
var clases = document.getElementById("clases")
var añado = document.getElementById("añado")
var contador = 0
var element1 = document.getElementById('a');
var element1Left = element1.getBoundingClientRect().left;
var element2 = document.getElementById('añado');
var crearAlu = document.getElementById("crearAlu")
var crearProf = document.getElementById("crearProf")
var crearDe = document.getElementById("crearDep")
var crearClas = document.getElementById("crearClase")
var confir = document.getElementById("confir")
var idBorrar

element2.style.left = element1Left + 'px';
window.addEventListener('resize', function() {
    element1Left = element1.getBoundingClientRect().left;
    element2.style.left = element1Left + 'px';
});

function aviso(id){
    confir.style.display="block"
    idBorrar=id
}

function cancelar(){
    confir.style.display="none"
}

function alumno() {
    contador = 0
    alumnos.style.display="block"
    profes.style.display="none"
    departamentos.style.display="none"
    clases.style.display="none"
    añado.style.display="none"
}

function profe() {
    contador = 0
    alumnos.style.display="none"
    profes.style.display="block"
    departamentos.style.display="none"
    clases.style.display="none"
    añado.style.display="none"
}

function departamento() {
    contador = 0
    alumnos.style.display="none"
    profes.style.display="none"
    departamentos.style.display="block"
    clases.style.display="none"
    añado.style.display="none"
}

function clase() {
    contador = 0
    alumnos.style.display="none"
    profes.style.display="none"
    departamentos.style.display="none"
    clases.style.display="block"
    añado.style.display="none"
}

function añadir(){
    contador=0
    contador=contador+1
    if (contador % 2 === 0) {
        añado.style.display="none"
    } else {
        añado.style.display="block"
    }
}

function crearAlumno(){
    añado.style.display="none"
    crearAlu.style.display="block"
    confir.style.display="none"
}

function crearProfe(){
    añado.style.display="none"
    crearProf.style.display="block"
    confir.style.display="none"
}

function crearClase(){
    añado.style.display="none"
    crearClas.style.display="block"
    confir.style.display="none"
}

function crearDep(){
    añado.style.display="none"
    crearDe.style.display="block"
    confir.style.display="none"
}

function volver2(){
    contador = 0
    crearDe.style.display="none"
    crearAlu.style.display="none"
    crearClas.style.display="none"
    crearProf.style.display="none"
}
