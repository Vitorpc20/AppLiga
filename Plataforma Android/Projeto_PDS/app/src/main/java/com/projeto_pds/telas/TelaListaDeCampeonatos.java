package com.projeto_pds.telas;

import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.Html;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.projeto_pds.adapter.CampeonatoAdapter;
import com.projeto_pds.info.Configs;
import com.projeto_pds.model.Campeonato;
import com.projeto_pds.R;
import com.projeto_pds.model.Jogador;
import com.projeto_pds.model.Jogo;

import java.util.ArrayList;

public class TelaListaDeCampeonatos extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tela_lista_de_campeonatos);

        //getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        Configs.campeonatoList.addAll(criarListaDeCampeonato());

        ListView lvCampeonatos = findViewById(R.id.lv_campeonatos);
        CampeonatoAdapter adapter = new CampeonatoAdapter(Configs.campeonatoList, this.getApplicationContext());
        //lvCampeonatos.setDivider(null);
        lvCampeonatos.setAdapter(adapter);
        lvCampeonatos.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Intent intent = new Intent(TelaListaDeCampeonatos.this, TelaCampeonato.class);
                intent.putExtra("campeonato_position_list", position);
                startActivity(intent);
            }
        });

        getSupportActionBar().setBackgroundDrawable(new ColorDrawable(Color.parseColor("#2E3641")));
        getSupportActionBar().setSubtitle("Lista de campeonatos");
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }

    public ArrayList<Campeonato> criarListaDeCampeonato(){

        ArrayList<Campeonato> listaDeCampeonato = new ArrayList<>();

        Campeonato c1 = new Campeonato();
        c1.setNomeCampeonato("Intercursos 2018");
        c1.setCursoCampeonato(getResources().getString(R.string.curso_adm));
        c1.setListaDeJogos(criarListaDeJogos());

        Campeonato c2 = new Campeonato();
        c2.setNomeCampeonato("Intercursos 2017");
        c2.setCursoCampeonato(getResources().getString(R.string.curso_bcc));
        c2.setListaDeJogos(criarListaDeJogos());

        Campeonato c3 = new Campeonato();
        c3.setNomeCampeonato("Interbixos 2018");
        c3.setCursoCampeonato(getResources().getString(R.string.curso_bio));
        c3.setListaDeJogos(criarListaDeJogos());

        Campeonato c4 = new Campeonato();
        c4.setNomeCampeonato("Intercursos 2017");
        c4.setCursoCampeonato(getResources().getString(R.string.curso_eco));
        c4.setListaDeJogos(criarListaDeJogos());

        listaDeCampeonato.add(c1);
        listaDeCampeonato.add(c2);
        listaDeCampeonato.add(c3);
        listaDeCampeonato.add(c4);

        return listaDeCampeonato;
    }

    public ArrayList<Jogo> criarListaDeJogos(){
        ArrayList<Jogo> listaDeJogo = new ArrayList<>();

        Jogo j1 = new Jogo();
        j1.setNomeTime1(getResources().getString(R.string.curso_bcc));
        j1.setNomeTime2(getResources().getString(R.string.curso_eco));
        j1.setModalidade("Futsal");
        j1.setData("22/10");
        j1.setHora("08:00");
        j1.setResultadoTime1(3);
        j1.setResultadoTime2(2);
        j1.setJogadoresTime1(criarListaDeJogadoresDoTime1());
        j1.setJogadoresTime2(criarListaDeJogadoresDoTime2());

        Jogo j2 = new Jogo();
        j2.setNomeTime1(getResources().getString(R.string.curso_fis));
        j2.setNomeTime2(getResources().getString(R.string.curso_geo));
        j2.setModalidade("Volei");
        j2.setData("23/10");
        j2.setHora("08:00");
        j2.setResultadoTime1(1);
        j2.setResultadoTime2(0);
        j2.setJogadoresTime1(criarListaDeJogadoresDoTime1());
        j2.setJogadoresTime2(criarListaDeJogadoresDoTime2());

        Jogo j3 = new Jogo();
        j3.setNomeTime1(getResources().getString(R.string.curso_tur));
        j3.setNomeTime2(getResources().getString(R.string.curso_pedago));
        j3.setModalidade("Basquete");
        j3.setData("24/10");
        j3.setHora("08:00");
        j3.setResultadoTime1(2);
        j3.setResultadoTime2(4);
        j3.setJogadoresTime1(criarListaDeJogadoresDoTime1());
        j3.setJogadoresTime2(criarListaDeJogadoresDoTime2());

        Jogo j4 = new Jogo();
        j4.setNomeTime1(getResources().getString(R.string.curso_flo));
        j4.setNomeTime2(getResources().getString(R.string.curso_mat));
        j4.setModalidade("Handbol");
        j4.setData("25/10");
        j4.setHora("08:00");
        j4.setResultadoTime1(5);
        j4.setResultadoTime2(3);
        j4.setJogadoresTime1(criarListaDeJogadoresDoTime1());
        j4.setJogadoresTime2(criarListaDeJogadoresDoTime2());

        Jogo j5 = new Jogo();
        j5.setNomeTime1(getResources().getString(R.string.curso_prod));
        j5.setNomeTime2(getResources().getString(R.string.curso_eco));
        j5.setModalidade("Futsal");
        j5.setData("26/10");
        j5.setHora("08:00");
        j5.setResultadoTime1(2);
        j5.setResultadoTime2(2);
        j5.setJogadoresTime1(criarListaDeJogadoresDoTime1());
        j5.setJogadoresTime2(criarListaDeJogadoresDoTime2());

        Jogo j6 = new Jogo();
        j6.setNomeTime1(getResources().getString(R.string.curso_adm));
        j6.setNomeTime2(getResources().getString(R.string.curso_bio));
        j6.setModalidade("Volei");
        j6.setData("27/10");
        j6.setHora("08:00");
        j6.setResultadoTime1(0);
        j6.setResultadoTime2(0);
        j6.setJogadoresTime1(criarListaDeJogadoresDoTime1());
        j6.setJogadoresTime2(criarListaDeJogadoresDoTime2());

        listaDeJogo.add(j1);
        listaDeJogo.add(j2);
        listaDeJogo.add(j3);
        listaDeJogo.add(j4);
        listaDeJogo.add(j5);
        listaDeJogo.add(j6);

        return listaDeJogo;
    }

    public ArrayList<Jogador> criarListaDeJogadoresDoTime1(){
        ArrayList<Jogador> listaDeJogador = new ArrayList<>();
        listaDeJogador.add(new Jogador("Marcelo", 8));
        listaDeJogador.add(new Jogador("Vitor", 7));
        listaDeJogador.add(new Jogador("Lucas", 5));
        listaDeJogador.add(new Jogador("Leonardo", 3));
        listaDeJogador.add(new Jogador("Caio", 0));
        listaDeJogador.add(new Jogador("Matheus", 0));
        listaDeJogador.add(new Jogador("Alexandre", 0));
        listaDeJogador.add(new Jogador("Gabriel", 0));
        listaDeJogador.add(new Jogador("Paulo", 0));
        return listaDeJogador;
    }

    public ArrayList<Jogador> criarListaDeJogadoresDoTime2(){
        ArrayList<Jogador> listaDeJogador = new ArrayList<>();
        listaDeJogador.add(new Jogador("João", 4));
        listaDeJogador.add(new Jogador("Vinícios", 4));
        listaDeJogador.add(new Jogador("Rafael", 2));
        listaDeJogador.add(new Jogador("Otávio", 1));
        listaDeJogador.add(new Jogador("Gabriel", 0));
        listaDeJogador.add(new Jogador("Felipe", 0));
        listaDeJogador.add(new Jogador("Yuri", 0));
        listaDeJogador.add(new Jogador("Daniel", 0));
        listaDeJogador.add(new Jogador("Danilo", 0));
        return listaDeJogador;
    }
}
