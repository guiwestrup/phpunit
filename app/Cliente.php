<?php
	
	namespace app;

	class Cliente
	{
		private $nome;
		private $cpf;
		private $telefone;


		public function __construct(string $nome = '', string $cpf = '', string $telefone = '')
		{
			$this->nome = $nome;
			$this->validaCpf($cpf);
			$this->cpf = $cpf;
			$this->telefone = $telefone;
		}

		public function __toString(): string
	    {
	        return $this->nome;
	    }

	    public static function fromString(string $nome): self
	    {
	        return new self($nome);
	    }

		public static function validaCpf(string $cpf): bool
		{
			if (strlen($cpf) != 11) {
				throw new InvalidArgumentException(
	                sprintf('"%s" cpf precisa ter 11 dígitos',$email)
	            );
			}
			// Verifica se nenhuma das sequências invalidas abaixo 
			// foi digitada. Caso afirmativo, retorna falso
			else if ($cpf == '00000000000' || 
				$cpf == '11111111111' || 
				$cpf == '22222222222' || 
				$cpf == '33333333333' || 
				$cpf == '44444444444' || 
				$cpf == '55555555555' || 
				$cpf == '66666666666' || 
				$cpf == '77777777777' || 
				$cpf == '88888888888' || 
				$cpf == '99999999999') {
				throw new InvalidArgumentException(
	                sprintf('"%s" cpf repetidos',$email)
	            );
			 // Calcula os digitos verificadores para verificar se o
			 // CPF é válido
			 } else {   
				
				for ($t = 9; $t < 11; $t++) {
					
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $cpf{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
					if ($cpf{$c} != $d) {
						throw new InvalidArgumentException(
			                sprintf('"%s" cpf inválido',$email)
			            );
					}
				}
				//se passou aqui deu certo
				return true;
			}
		}

		public function setCpf(string $cpf): void
		{
			$this->validaCpf($cpf);
			$this->cpf = $cpf;
		}

		public function getCpf()
		{
			return $this->cpf;
		}
	}

?>