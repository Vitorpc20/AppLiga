package com.projeto_pds.fragment;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.projeto_pds.R;
import com.projeto_pds.adapter.JogosAdapter;
import com.projeto_pds.model.Campeonato;
import com.projeto_pds.model.Jogo;
import com.projeto_pds.telas.TelaCampeonato;
import com.projeto_pds.telas.TelaInicial;
import com.projeto_pds.telas.TelaJogo;
import com.projeto_pds.telas.TelaListaJogos;

import java.util.ArrayList;

/**
 * A simple {@link Fragment} subclass.
 */
public class ListaJogosFragment extends Fragment {

    private ArrayList<Jogo> listaDeJogos;
    private int posicao_campeonato;

    public ListaJogosFragment() {
        // Required empty public constructor
    }

    public void setListaDeJogo(ArrayList<Jogo> listaDeJogo) {
        this.listaDeJogos = listaDeJogo;
    }

    public void setPosicao_campeonato(int posicao_campeonato) {
        this.posicao_campeonato = posicao_campeonato;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_lista_jogos, container, false);
        ListView lvListaJogos = view.findViewById(R.id.lv_lista_jogos);

        JogosAdapter adapter = new JogosAdapter(listaDeJogos, getContext());
        lvListaJogos.setAdapter(adapter);
        lvListaJogos.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Intent intent = new Intent(getContext(), TelaJogo.class);
                intent.putExtra("campeonato_position_list", posicao_campeonato);
                intent.putExtra("jogo_position_list", position);
                ListaJogosFragment.this.startActivity(intent);
            }
        });
        return view;
    }
}
