<?php
require_once("model.base.php");

class Usuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    } 
    
    public function insertItemPaisesDropdown($paises, $idPais) {
        while($row = $paises->next()){
            $comparation = ($row->IdPais == $idPais) ? 'selected':'';
            echo "<option $comparation value=$row->IdPais>$row->Pais</option>";
        }
    }
    
    public function insertItemRolesDropdown($roles, $idRol) {
        while($row = $roles->next()){
            $comparation = ($row->IdRol == $idRol) ? 'selected':'';
            echo "<option $comparation value=$row->IdRol>$row->Rol</option>";
        }
    }

    public function getEstadisticaUsuariosRegistrados() {
        $this->data = $this->db->recordSet("SELECT Pais, COUNT(FkPais) as Cantidad
                                            FROM fin_usuarios 
                                            INNER JOIN cat_paises 
                                            On cat_paises.IdPais = fin_usuarios.FkPais 
                                            GROUP BY Pais");
    }
}

$usuario = new Usuario($db);
$usuario->setView ("vw_usuarios");
$usuario->setTable("fin_usuarios");

$usuario->setKey  ("IdUsuario");
$usuario->addField("NombreUsuario");
$usuario->addField("Paterno");
$usuario->addField("Materno");
$usuario->addField("Nacimiento");
$usuario->addField("Correo");
$usuario->addField("Clave");
$usuario->addField("FkPais");
$usuario->addField("FkRol");
$usuario->newRecord();
?>