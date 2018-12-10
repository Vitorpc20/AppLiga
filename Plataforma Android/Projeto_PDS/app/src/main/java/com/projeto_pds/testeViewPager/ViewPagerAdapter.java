package com.projeto_pds.testeViewPager;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;

import com.projeto_pds.fragment.ListaJogosFragment;
import com.projeto_pds.fragment.RankingFragment;
import com.projeto_pds.model.Jogo;

import java.util.ArrayList;

public class ViewPagerAdapter extends FragmentPagerAdapter {

    private String title[] = {"Lista de Jogos", "Ranking"};
    private ArrayList<Jogo> listaDeJogo;
    private int posicao_campeonato;

    public ViewPagerAdapter(FragmentManager manager, ArrayList<Jogo> listaDeJogo, int posicao_campeonato) {
        super(manager);
        this.listaDeJogo = listaDeJogo;
        this.posicao_campeonato = posicao_campeonato;
    }

    @Override
    public Fragment getItem(int position) {
        if(position%2==0){
            ListaJogosFragment frag = new ListaJogosFragment();
            frag.setListaDeJogo(listaDeJogo);
            frag.setPosicao_campeonato(posicao_campeonato);
            return frag;
        } else {
            return new RankingFragment();
        }
    }

    @Override
    public int getCount() {
        return title.length;
    }

    @Override
    public CharSequence getPageTitle(int position) {
        return title[position];
    }
}