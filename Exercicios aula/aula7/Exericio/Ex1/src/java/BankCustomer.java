
public class BankCustomer {

    private int nro_conta;
    private double saldo;
    private String nome;
    
    public void setNro_conta (int cConta) {
        nro_conta = cConta;
    }
    
    public void setSaldo (double cSaldo) {
        saldo = cSaldo;
    }
    
    public void setNome (String cNome) {
        nome = cNome;
    }

    public int getNro_conta() {
        return nro_conta;
    }

    public double getSaldo() {
        return saldo;
    }

    public String getNome() {
        return nome;
    }
    public double getSaldoNoSign() {
        return (Math.abs(saldo));
    }
}
