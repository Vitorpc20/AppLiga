package com.projeto_pds.model;

import java.util.ArrayList;
import java.util.List;

public class Jogo {

    private String nomeTime1;
    private String nomeTime2;
    private ArrayList<Jogador> jogadoresTime1;
    private ArrayList<Jogador> jogadoresTime2;
    private int resultadoTime1;
    private int resultadoTime2;
    private String modalidade;
    private String data;
    private String hora;

    public Jogo(){}

    public String getNomeTime1() {
        return nomeTime1;
    }

    public void setNomeTime1(String nomeTime1) {
        this.nomeTime1 = nomeTime1;
    }

    public String getNomeTime2() {
        return nomeTime2;
    }

    public void setNomeTime2(String nomeTime2) {
        this.nomeTime2 = nomeTime2;
    }

    public int getResultadoTime1() {
        return resultadoTime1;
    }

    public void setResultadoTime1(int resultadoTime1) {
        this.resultadoTime1 = resultadoTime1;
    }

    public int getResultadoTime2() {
        return resultadoTime2;
    }

    public void setResultadoTime2(int resultadoTime2) {
        this.resultadoTime2 = resultadoTime2;
    }

    public String getModalidade() {
        return modalidade;
    }

    public void setModalidade(String modalidade) {
        this.modalidade = modalidade;
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public String getHora() {
        return hora;
    }

    public void setHora(String hora) {
        this.hora = hora;
    }

    public ArrayList<Jogador> getJogadoresTime1() {
        return jogadoresTime1;
    }

    public void setJogadoresTime1(ArrayList<Jogador> jogadoresTime1) {
        this.jogadoresTime1 = jogadoresTime1;
    }

    public ArrayList<Jogador> getJogadoresTime2() {
        return jogadoresTime2;
    }

    public void setJogadoresTime2(ArrayList<Jogador> jogadoresTime2) {
        this.jogadoresTime2 = jogadoresTime2;
    }
}
