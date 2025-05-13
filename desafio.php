<?php
class ContaBancaria{

    public string $titular;
    private float $saldo;

   public function __construct(string $titular, float $saldoInicial = 0.0)
    {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    public function depositar(float $valor): void
    {
        if ($valor > 0) {
            $this->saldo += $valor;
            echo "Depósito de R\$ " . number_format($valor, 2, ',', '.') .
                 "realizado. Saldo atual: R\$ ". number_format($this->saldo, 2, ',', '.') . PHP_EOL;
        } else {
            echo "Valor de depósito inválido." . PHP_EOL;
        }
    }

    public function sacar(float $valor): void
    {
        if ($valor <= 0) {
            echo "Valor de saque inválido." . PHP_EOL;
        } elseif ($valor > $this->saldo) {
            echo "<br>Saldo insuficiente para saque de R\$ " . number_format($valor, 2, ',', '.') .
                 ". Saldo atual: R\$ " . number_format($this->saldo, 2, ',', '.') . PHP_EOL;
        } else {
            $this->saldo -= $valor;
            echo "<br>Saque de R\$ " . number_format($valor, 2, ',', '.') .
                 " realizado. Saldo atual: R\$ " . number_format($this->saldo, 2, ',', '.') . PHP_EOL;
        }
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }
}


$conta = new ContaBancaria("panqueca da silva");
$conta->depositar(500.00);
$conta->sacar(600.00);
$conta->sacar(400.00);
?>