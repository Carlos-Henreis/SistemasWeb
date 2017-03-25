/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package beans;

/**
 *
 * @author carlos
 */
public class votoBeans {
    private int Palmeiras;
    private int SaoPaulo;
    private int Corinthians;
    private int Cruzeiro;
    private int Atletico;
    private int Vasco;
    private int voto;
    private String time ="";
    
    public void setTime (String ptime) {
        time = ptime;
    }
    
    public String gettime (){
        return time;
    }
    public void calculavoto(String time) {
        if (time.equals("Palmeiras")){
            Palmeiras ++;
        }else {
            if (time.equals("SaoPaulo")){
                SaoPaulo ++;
            }else {
                if (time.equals("Corinthians")){
                    Corinthians ++;
                }else {
                    if (time.equals("Cruzeiro")){
                        Cruzeiro ++;
                    }else {
                        if (time.equals("Atletico")){
                            Atletico ++;
                        }else { 
                            Vasco ++;
                        }
                    }
                }
            }
        }
        
    }

    public void aumentaVoto() {
        voto++;
    }
    public boolean javotou () {
        if (voto == 1)
            return false;
        return true;
    }
    
    public String imprimeresult() {
        String result ="";
        result += "Seu voto foi computado. O placar atual é o seguinte:<br>";
        result += "Vasco:"+Vasco;
        result += "<br>Palmeiras:"+Palmeiras;
        result += "<br>SaoPaulo:"+SaoPaulo;
        result += "<br>Corinthians:"+Corinthians;
        result += "<br>Cruzeiro:"+Cruzeiro;
        result += "<br>Atletico:"+Atletico;
        return result;
    }
}
