package com.projeto_pds.model;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Marcelo on 25/10/2018.
 */

public class Campeonato {

    private String nomeCampeonato;
    private String cursoCampeonato;
    private ArrayList<Jogo> listaDeJogos;

    public Campeonato(){
        this.listaDeJogos = new ArrayList<>();
    }

    public String getNomeCampeonato() {
        return nomeCampeonato;
    }

    public void setNomeCampeonato(String nomeCampeonato) {
        this.nomeCampeonato = nomeCampeonato;
    }

    public String getCursoCampeonato() {
        return cursoCampeonato;
    }

    public void setCursoCampeonato(String cursoCampeonato) {
        this.cursoCampeonato = cursoCampeonato;
    }

    public ArrayList<Jogo> getListaDeJogos() {
        return listaDeJogos;
    }

    public void setListaDeJogos(ArrayList<Jogo> listaDeJogos) {
        this.listaDeJogos = listaDeJogos;
    }
}
