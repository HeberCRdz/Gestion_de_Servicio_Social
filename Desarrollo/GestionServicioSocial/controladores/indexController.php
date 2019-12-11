<?php
require_once(dirname(__DIR__)."/core/BaseController.php");
require_once(dirname(__DIR__)."/core/ViewManager.php");

/**
 * Description of indexController
 *
 * @author alarconlg
 */
class indexController extends BaseController {
    
    public function index(){
        ViewManager::mostrar("Login", null);
    }
    
    public function ingresar(){
        
        $_SESSION["IDUSUARIO"] = 0;
        $_SESSION["NOMBREUSUARIO"] = $_REQUEST["usuario"];
 
        if($_REQUEST["usuario"] == "admin"){
            $_SESSION["TIPOUSUARIO"] = "A";
            $this->redireccionar(URL::construir("usuarios","index"));
        }else if($_REQUEST["usuario"] == "jdgtyv"){
            $_SESSION["TIPOUSUARIO"] = "J";
            $this->redireccionar(URL::construir("revisionRespuesta","index"));
        }else if($_REQUEST["usuario"] == "estud"){
            $_SESSION["TIPOUSUARIO"] = "E";
            $this->redireccionar(URL::construir("revision","index"));
        }else{
            ViewManager::mostrar("Login",null,"E","Usuario o contraseña incorrecto.");
        }
    }
}
