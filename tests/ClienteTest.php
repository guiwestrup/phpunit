<?php 
	use PHPUnit\Framework\TestCase;
	use app\Cliente;
	/**
	 * @testdox A Client register
	 */
	class ClientTest extends TestCase
	{

		/**
		 * @test
		 */
		public function validaCpfCorreto(): void
		{
			$clienteValido = new Cliente('gui','08838589917','12312312312');
			$this->assertEquals(
				"",
				$clienteValido->setCpf("08838589917")
			);
		}


		/**
		 * @expectedException InvalidArgumentException
		 */
		public function validaCpfIncorreto(): void
		{
			$this->expectException(InvalidArgumentException::class);
			Cliente::validaCpf('08838589');
		}
	}

?>