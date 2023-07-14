
<style>
h1{
    text-align:center;
}

table{
    background-color:#FFC;
    padding:5px;
    border:#666 5px solid;
}

.no_validado{
    font-size:18px;
    color:#F00;
    font-weight:bold;
}

.validado{
    font-size:18px;
    color:#0C3;
    font-weight:bold;
}


</style>
<?php
                        if (isset($_POST["enviando"])) {

                          $usuario=$_POST["nombre_usuario"];
                          $edad=$_POST["edad_usuario"];
          
                          if ($usuario=="juan"&& $edad>=18) {
                              echo "<p class='validado'>pudes entrar</p>";
                            }else {
                              echo "<p class='no_validado'>" . "no puedes entrar" . "</p>";
                  }}
      

             /*	Problem detected!
	Port 3306 in use by "Unable to open process"!
	MySQL WILL NOT start without the configured ports free!
 	You need to uninstall/disable/reconfigure the blocking application
	or reconfigure MySQL and the Control Panel to listen on a different port
	Problem detected!
	Port 8080 in use by ""C:\Program Files (x86)\National Instruments\Shared\NI WebServer\ApplicationWebServer.exe" -user"!
	Tomcat WILL NOT start without the configured ports free!
	You need to uninstall/disable/reconfigure the blocking application
	or reconfigure Tomcat and the Control Panel to listen on a different port
    
    
    
    Apache/2.4.48 (Win64) OpenSSL/1.1.1k PHP/8.0.8 Server at localhost Port 80
    error: The requested URL was not found on this server. 
    Apache/2.4.48 (Win64) OpenSSL/1.1.1k PHP/8.0.8 Server at localhost Port 80


    https://www.youtube.com/watch?v=6c4PErvPzgg&t=48s
    */
        ?>