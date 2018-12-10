package com.projeto_pds.telas;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.projeto_pds.R;
import com.projeto_pds.adapter.JogosAdapter;
import com.projeto_pds.model.Campeonato;
import com.projeto_pds.model.Jogo;

import java.util.ArrayList;

public class TelaListaJogos extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tela_lista_jogos);

        ListView lvListaJogos = findViewById(R.id.lv_lista_jogos);

        final ArrayList<Jogo> listaDeJogos = getListaDeJogos();

        JogosAdapter adapter = new JogosAdapter(listaDeJogos, getApplicationContext());
        adapter.setListener(new JogosAdapter.JogosAdapterListener() {
            @Override
            public void selected(Jogo jogo) {
                Intent intent = new Intent(TelaListaJogos.this, TelaJogo.class);
                TelaListaJogos.this.startActivity(intent);
            }
        });
        lvListaJogos.setAdapter(adapter);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setBackgroundDrawable(new ColorDrawable(Color.parseColor("#2E3641")));
    }

    public ArrayList<Jogo> getListaDeJogos(){
        ArrayList<Jogo> list = new ArrayList<>();
        for(int i=0; i<10; i++){
            Jogo jogo = new Jogo();
            //jogo.set("Jogo "+i);
            list.add(jogo);
        }
        return list;
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }
}
