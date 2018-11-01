package com.projeto_pds.fragment;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;

import com.projeto_pds.R;
import com.projeto_pds.adapter.JogadoresAdapter;
import com.projeto_pds.model.Jogador;

import java.util.ArrayList;

/**
 * A simple {@link Fragment} subclass.
 */
public class ListaJogadoresFragment extends Fragment {

    private ArrayList<Jogador> listaJogadores;

    public ListaJogadoresFragment() {
        // Required empty public constructor
    }

    public void setListaJogadores(ArrayList<Jogador> listaJogadores) {
        this.listaJogadores = listaJogadores;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_lista_jogadores, container, false);
        ListView lvListaJogadores = view.findViewById(R.id.lv_lista_jogadores);
        JogadoresAdapter adapter = new JogadoresAdapter(listaJogadores, getContext());
        lvListaJogadores.setAdapter(adapter);
        return view;
    }

}
