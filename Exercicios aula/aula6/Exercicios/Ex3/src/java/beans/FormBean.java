package beans;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author carlos
 */
public class FormBean {
    private String nome;
    private String sobrenome;
    private String email;
    private String[] linguagens;
    private String notificacao;
    
    public void setNome (String pnome){
        nome = pnome;
    }
    
    public void setSobrenome (String psobrenome){
        sobrenome = psobrenome;
    }
    
    public void setEmail (String pemail){
        email = pemail;
    }
    
    public void setLinguagem (String[] plinguagem){
        linguagens = plinguagem;
    }
    
    public void setNotificacao (String pnotificacao){
        notificacao = pnotificacao;
    }
    

    public String getNome(){
        return nome;
    }
    public String getSobrenome(){
        return sobrenome;
    }

    public String getEmail(){
        return email;
    }
    
    public String[] getLinguagem(){
        return linguagens;
    }
    
    public String getNotificacao(){
        return notificacao;
    }
    
}

