package com.projeto_pds.telas;

import android.content.Intent;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.widget.TextView;

import com.projeto_pds.R;
import com.projeto_pds.info.Configs;
import com.projeto_pds.model.Jogador;
import com.projeto_pds.model.Jogo;
import com.projeto_pds.testeViewPager.ViewPagerAdapter;
import com.projeto_pds.testeViewPager.ViewPagerJogoAdapter;

import java.util.ArrayList;

public class TelaJogo extends AppCompatActivity {

    private Toolbar mActionBarToolbar;
    private Toolbar toolbar;
    private TabLayout tabLayout;
    private ViewPager viewPager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tela_jogo);

        TextView tvNomeTime1 = findViewById(R.id.tv_nome_time_1);
        TextView tvNomeTime2 = findViewById(R.id.tv_nome_time_2);
        TextView tvResultadoTime1 = findViewById(R.id.tv_resultado_time_1);
        TextView tvResultadoTime2 = findViewById(R.id.tv_resultado_time_2);
        TextView tvInfoJogo = findViewById(R.id.tv_info_jogo);


        Jogo jogo = null;
        ArrayList<Jogador> jogadoresTime1 = new ArrayList<>();
        ArrayList<Jogador> jogadoresTime2 = new ArrayList<>();
        Intent intent = getIntent();
        int posicao_campeonato = intent.getIntExtra("campeonato_position_list", -1);
        int posicao_jogo = intent.getIntExtra("jogo_position_list", -1);

        if(posicao_campeonato!=-1 && posicao_jogo!=-1){
            try {
                jogo = Configs.campeonatoList.get(posicao_campeonato).getListaDeJogos().get(posicao_jogo);
                jogadoresTime1 = jogo.getJogadoresTime1();
                jogadoresTime2 = jogo.getJogadoresTime2();
            } catch (Exception e){
                e.printStackTrace();
            }
        }

        if(jogo!=null){
            tvNomeTime1.setText(jogo.getNomeTime1());
            tvNomeTime2.setText(jogo.getNomeTime2());
            tvResultadoTime1.setText(String.valueOf(jogo.getResultadoTime1()));
            tvResultadoTime2.setText(String.valueOf(jogo.getResultadoTime2()));
            tvInfoJogo.setText(jogo.getModalidade()+" "+jogo.getData()+" "+jogo.getHora());
        }

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        viewPager = (ViewPager) findViewById(R.id.viewpager);
        ViewPagerJogoAdapter adapter = new ViewPagerJogoAdapter (getSupportFragmentManager(), jogadoresTime1, jogadoresTime2);
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
