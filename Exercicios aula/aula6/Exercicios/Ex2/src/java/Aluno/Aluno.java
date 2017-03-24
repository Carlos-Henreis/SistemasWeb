package Aluno;


public class Aluno {

    String codigo;
    String nome;
    String sobrenome;
    String fone;
    String email;
    String endereco;
    String cidade;
    String estado;
    String cep;
    
    public void setCodigo (String pcodigo){
        codigo = pcodigo;
    }
    public void setNome(String pnome){
        nome = pnome;
    }
    public void setSobrenome(String psobrenome){
        sobrenome = psobrenome;
    }
    public void setFone(String pfone){
        fone = pfone;
    }
    public void setEmail(String pemail){
        email = pemail;
    }
    public void setEndereco(String pendereco){
        endereco = pendereco;
    }
    public void setCidade(String pcidade){
        cidade = pcidade;
    }
    public void setEstado(String pestado){
        estado = pestado;
    }
    public void setCep(String pcep){
        cep = pcep;
    }
    
    public String getCodigo (){
        return codigo;
    }
    public String getNome(){
        return nome;
    }
    public String getSobrenome(){
        return sobrenome;
    }
    public String getFone(){
        return fone;
    }
    public String getEmail(){
        return email;
    }
    public String getEndereco(){
        return endereco;
    }
    public String getCidade(){
        return cidade;
    }
    public String getEstado(){
        return estado;
    }
    public String getCep(){
        return cep;
    }
    
}
