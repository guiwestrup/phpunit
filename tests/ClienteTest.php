<?php 
	use PHPUnit\Framework\TestCase;
	use app\Cliente;
	
	class ClientTest extends TestCase
	{
		public function testValidaCpf(): void
		{
			$clienteValido = new Cliente('gui','08838589917','12312312312');
			$this->assertEquals(
				"",
				$clienteValido->setCpf("08838589917")
			);
		}
	}

?>