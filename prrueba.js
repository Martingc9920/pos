var persona={"nombre":"pedro","apellidos":"perez"};
 
$.ajax({
url: "rest/servicioPersonas/personas",
type: "POST",
data: JSON.stringify(persona),
contentType: "application/json",
complete: resultado
});
 
&nbsp;