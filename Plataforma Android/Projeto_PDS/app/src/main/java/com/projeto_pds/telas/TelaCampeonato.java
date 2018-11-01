package com.projeto_pds.telas;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.LinearLayout;

import com.projeto_pds.R;
import com.projeto_pds.info.Configs;
import com.projeto_pds.model.Campeonato;
import com.projeto_pds.model.Jogo;
import com.projeto_pds.testeViewPager.ViewPagerAdapter;

import java.util.ArrayList;

public class TelaCampeonato extends AppCompatActivity {

    private Toolbar toolbar;
    private TabLayout tabLayout;
    private ViewPager viewPager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tela_campeonato);

        ArrayList<Jogo> listaDeJogo = new ArrayList<>();

        Intent intent = getIntent();
        int posicao = intent.getIntExtra("campeonato_position_list", -1);

        if(posicao!=-1){
            try {
                Campeonato campeonato = Configs.campeonatoList.get(posicao);
                listaDeJogo = campeonato.getListaDeJogos();
            } catch (Exception e){
                e.printStackTrace();
            }
        }

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        viewPager = (ViewPager) findViewById(R.id.viewpager);
        ViewPagerAdapter adapter = new ViewPagerAdapter(getSupportFragmentManager(), listaDeJogo, posicao);
        viewPager.setAdapter(adapter);

        tabLayout = (TabLayout) findViewById(R.id.tabs);
        tabLayout.setupWithViewPager(viewPager);
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }
}
