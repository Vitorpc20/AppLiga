package com.projeto_pds.testeViewPager;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;

import com.projeto_pds.fragment.ListaJogadoresFragment;
import com.projeto_pds.fragment.ListaJogosFragment;
import com.projeto_pds.fragment.RankingFragment;
import com.projeto_pds.model.Jogador;

import java.util.ArrayList;

public class ViewPagerJogoAdapter extends FragmentPagerAdapter {

    private String title[] = {"Jogadores Time_1", "Jogadores Time_2"};
    private ArrayList<Jogador> jogadoresTime1;
    private ArrayList<Jogador> jogadoresTime2;

    public ViewPagerJogoAdapter(FragmentManager manager, ArrayList<Jogador> jogadoresTime1, ArrayList<Jogador> jogadoresTime2) {
        super(manager);
        this.jogadoresTime1 = jogadoresTime1;
        this.jogadoresTime2 = jogadoresTime2;
    }

    @Override
    public Fragment getItem(int position) {
        if (position % 2 == 0) {
            ListaJogadoresFragment frag1 = new ListaJogadoresFragment();
            frag1.setListaJogadores(jogadoresTime1);
            return frag1;
        } else {
            ListaJogadoresFragment frag2 = new ListaJogadoresFragment();
            frag2.setListaJogadores(jogadoresTime2);
            return frag2;
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