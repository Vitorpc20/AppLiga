package com.projeto_pds.fragment;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;

import com.projeto_pds.R;
import com.projeto_pds.adapter.RankingAdapter;
import com.projeto_pds.model.Ranking;

import java.util.ArrayList;


/**
 * A simple {@link Fragment} subclass.
 */
public class RankingFragment extends Fragment {


    public RankingFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_ranking, container, false);
        ListView listView = view.findViewById(R.id.lv_lista_ranking);
        RankingAdapter adapter = new RankingAdapter(getListOfRanking(), getContext());
        listView.setAdapter(adapter);
        return view;
    }

    public ArrayList<Ranking> getListOfRanking(){
        ArrayList<Ranking> array = new ArrayList<>();
        for(int i=0; i<5; i++){
            Ranking ranking = new Ranking();
            ranking.setPosicao(i);
            switch (i){
                case 0:
                    ranking.setNome(getResources().getString(R.string.curso_bcc));
                    ranking.setPontuacao(155);
                    break;
                case 1:
                    ranking.setNome(getResources().getString(R.string.curso_tur));
                    ranking.setPontuacao(90);
                    break;
                case 2:
                    ranking.setNome(getResources().getString(R.string.curso_eco));
                    ranking.setPontuacao(60);
                    break;
                case 3:
                    ranking.setNome(getResources().getString(R.string.curso_adm));
                    ranking.setPontuacao(50);
                    break;
                case 4:
                    ranking.setNome(getResources().getString(R.string.curso_prod));
                    ranking.setPontuacao(0);
                    break;
                case 5:
                    ranking.setNome(getResources().getString(R.string.curso_geo));
                    ranking.setPontuacao(0);
                    break;
                case 6:
                    ranking.setNome(getResources().getString(R.string.curso_fis));
                    ranking.setPontuacao(0);
                    break;
                case 7:
                    ranking.setNome(getResources().getString(R.string.curso_pedago));
                    ranking.setPontuacao(0);
                    break;
            }
            array.add(ranking);
            Log.d("ranking", "Criou Ranking");
        }
        return array;
    }

}
