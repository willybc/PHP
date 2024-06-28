<?php
class ProductoPaginado
{
	private $paginaActual;
	private $totalPaginas;
	private $nResultados;
	private $resultadosPorPagina;
	private $indice;
	private $error = false;
	private $productos;

	function __construct($nroPorPagina)
	{
		$this->resultadosPorPagina = $nroPorPagina;
		$this->indice = 0;
		$this->paginaActual = 1;

		$productoController = new ProductoController();
		$categorias = ['laptops', 'tablets'];
		$this->productos = $productoController->obtenerProductosPorCategorias($categorias);

		$this->nResultados = count($this->productos);
		$this->totalPaginas = ceil($this->nResultados / $this->resultadosPorPagina);

		$this->calcularPaginas();
	}

	function calcularPaginas()
	{
		if(isset($_GET['pagina'])) {
			if(is_numeric($_GET['pagina'])) {
				if($_GET['pagina'] >= 1 && $_GET['pagina'] <= $this->totalPaginas) {
					$this->paginaActual = $_GET['pagina'];
					$this->indice = (($this->paginaActual - 1) * $this->resultadosPorPagina);
				} else {
					echo "No existe esa página";
					$this->error = true;
				}
			} else {
				echo "Error al cargar la página";
				$this->error = true;
			}
		}
	}

	function obtenerProductos()
	{
		if(!$this->error) {
			return array_slice($this->productos, $this->indice, $this->resultadosPorPagina);
		} else {
			return [];
		}
	}

	function mostrarPaginas()
	{
		$actual = '';
		echo "<ul>";
		for($i = 0; $i < $this->totalPaginas; $i++) {
			if(($i + 1) == $this->paginaActual) {
				$actual = ' class="actual"';
			} else {
				$actual = '';
			}

			echo '<li><a' . $actual . ' href="?pagina=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
		}
		echo "</ul>";
	}
}