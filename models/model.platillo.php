<?php
require_once("model.base.php");

class Platillo extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function insertItemCategoriasDropdown($categorias, $idCategoria) {
        while($row = $categorias->next()){
            $comparation = ($row->IdCategoria == $idCategoria) ? 'selected':'';
            echo "<option $comparation value=$row->IdCategoria>$row->Categoria</option>";
        }
    }

    Public function getEstadisticaTipoPlatilloMasVisitado($anio) {
        $this->data = $this->db->recordSet("SELECT
                                            COUNT(cat_categorias.IdCategoria) AS Visitas,
                                            cat_categorias.Categoria
                                            FROM fin_visitasplatillos
                                            INNER JOIN fin_platillos 
                                            ON fin_visitasplatillos.FkPlatillo = fin_platillos.IdPlatillo
                                            INNER JOIN cat_categorias 
                                            ON fin_platillos.FkCategoria = cat_categorias.IdCategoria
                                            WHERE YEAR(fin_visitasplatillos.FechaVisita) = $anio
                                            GROUP BY cat_categorias.Categoria
                                            ORDER BY Visitas DESC");
    }

    public function getEstadisticaPlatillosMasVisitados($anio) {
        $this->data = $this->db->recordSet("SELECT
                                            COUNT(fin_visitasplatillos.IdVisitaPlatillo) AS NumeroVisita,
                                            cat_categorias.Categoria,
                                            fin_platillos.Platillo
                                            FROM fin_visitasplatillos
                                            INNER JOIN fin_platillos 
                                            ON fin_visitasplatillos.FkPlatillo = fin_platillos.IdPlatillo
                                            INNER JOIN cat_categorias 
                                            ON fin_platillos.FkCategoria = cat_categorias.IdCategoria
                                            WHERE YEAR(fin_visitasplatillos.FechaVisita) = $anio
                                            GROUP BY fin_platillos.Platillo
                                            ORDER BY NumeroVisita DESC");
    }

    public function getEstadisticaPlatillosMasDescargados($anio) {
        $this->data = $this->db->recordSet("SELECT
                                            fin_platillos.Platillo,
                                            cat_categorias.Categoria,
                                            MONTH(fin_descargasplatillos.FechaDescarga)AS Mes,
                                            COUNT(fin_platillos.IdPlatillo) AS NumeroDescarga
                                            FROM fin_descargasplatillos
                                            INNER JOIN fin_platillos 
                                            ON fin_descargasplatillos.FkPlatillo = fin_platillos.IdPlatillo
                                            INNER JOIN cat_categorias 
                                            ON fin_platillos.FkCategoria = cat_categorias.IdCategoria
                                            WHERE YEAR(fin_descargasplatillos.FechaDescarga) = $anio
                                            GROUP BY fin_platillos.Platillo
                                            ORDER BY NumeroDescarga DESC");
    }

    public function getDataGraficaBarra1($anio) {
        $this->data = $this->db->recordSet("SELECT
                                            MONTH(fin_visitasplatillos.FechaVisita) AS Mes,
                                            Count(cat_categorias.IdCategoria) AS Visitas,
                                            cat_categorias.Categoria
                                            FROM fin_visitasplatillos
                                            INNER JOIN fin_platillos 
                                            ON fin_visitasplatillos.FkPlatillo = fin_platillos.IdPlatillo
                                            INNER JOIN cat_categorias 
                                            ON fin_platillos.FkCategoria = cat_categorias.IdCategoria
                                            WHERE YEAR(fin_visitasplatillos.FechaVisita) = $anio
                                            GROUP BY cat_categorias.Categoria, Mes
                                            ORDER BY cat_categorias.Categoria, Visitas DESC");
    }

    public function getDataGraficaBarra2($anio) {
        $this->data = $this->db->recordSet("SELECT
                                            fin_platillos.Platillo,
                                            cat_categorias.Categoria,
                                            MONTH(fin_descargasplatillos.FechaDescarga) AS Mes,
                                            COUNT(fin_platillos.IdPlatillo) AS Descargas
                                            FROM fin_descargasplatillos
                                            INNER JOIN fin_platillos 
                                            ON fin_descargasplatillos.FkPlatillo = fin_platillos.IdPlatillo
                                            INNER JOIN cat_categorias 
                                            ON fin_platillos.FkCategoria = cat_categorias.IdCategoria
                                            WHERE YEAR(fin_descargasplatillos.FechaDescarga) = $anio
                                            GROUP BY fin_platillos.Platillo, Mes
                                            ORDER BY fin_platillos.Platillo DESC");
        }
}

$platillo = new Platillo($db);
$platillo->setView ("vw_platillos");
$platillo->setTable("fin_platillos");

$platillo->setKey  ("IdPlatillo");
$platillo->addField("Platillo");
$platillo->addField("Ingrediente");
$platillo->addField("Preparacion");
$platillo->addField("ImagenPlatillo");
$platillo->addField("FechaRegistro");
$platillo->addField("HoraRegistro");
$platillo->addField("FkCategoria");
$platillo->addField("FkSeguimiento");
$platillo->addField("FkUsuario");
$platillo->newRecord();
?>