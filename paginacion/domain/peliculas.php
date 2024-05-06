<?php
include_once 'database.php';

class Pelicula extends Database {
    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $error = false;

    function __construct($nroPorPagina) {
        parent::__construct();
        $this -> resultadosPorPagina = $nroPorPagina;
        $this -> indice = 0;
        $this -> paginaActual = 1;

        $this -> calcularPaginas();
    }

    function calcularPaginas() {
        $query = $this -> connect() -> query('SELECT COUNT(*) AS total FROM peliculas');
        $this -> nResultados = $query -> fetch(PDO::FETCH_OBJ) -> total;
        $this -> totalPaginas = round($this -> nResultados / $this -> resultadosPorPagina);

        if (isset($_GET['pagina'])) {
            if (is_numeric($_GET['pagina'])) {
                if ($_GET['pagina'] >= 1 && $_GET['pagina'] <= $this -> totalPaginas) {
                    $this -> paginaActual = $_GET['pagina'];
                    $this -> indice = (($this -> paginaActual - 1) * $this -> resultadosPorPagina);
                } else {
                    echo "No existe esa pagina";
                    $this -> error = true;
                }
            } else {
                echo "Error al cargar la pagina";
                $this -> error = true;
            }
        }
    }

    function mostrarPeliculas() {
        if (!$this -> error) {
            $query = $this -> connect() -> prepare('SELECT * FROM peliculas LIMIT :posicion, :n');
            $query -> execute(['posicion' => $this -> indice, 'n' => $this -> resultadosPorPagina]);

            foreach ($query as $pelicula) {
                include 'views/view.pelicula.php';
            }
        } else {

        }
    }

    function mostrarPaginas() {
        $actual = '';
        echo "<ul>";
        for ($i = 0; $i < $this -> totalPaginas; $i++) {
            if (($i + 1) == $this -> paginaActual) {
                $actual = ' class="actual"';
            } else {
                $actual = '';
            }

            echo '<li><a ' . filter_var($actual, FILTER_SANITIZE_URL) . ' href="?pagina=' . filter_var($i + 1, FILTER_SANITIZE_URL) . '">' . ($i + 1) . '</a></li>';
        }
        echo "</ul>";
    }
}
