package com.projeto_pds.model;

public class Jogador {

    private int pontosNaPartida;
    private String nome;

    public Jogador(){}

    public Jogador(String nome, int pontos){
        this.nome = nome;
        this.pontosNaPartida = pontos;
    }

    public int getPontosNaPartida() {
        return pontosNaPartida;
    }

    public void setPontosNaPartida(int pontosNaPartida) {
        this.pontosNaPartida = pontosNaPartida;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }
}
