package com.projeto_pds.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.projeto_pds.R;
import com.projeto_pds.model.Jogador;

import java.util.ArrayList;

public class JogadoresAdapter extends ArrayAdapter<Jogador> {

    private ArrayList<Jogador> dataSet;
    private Context mContext;

    // View lookup cache
    private static class ViewHolder {
        TextView txtName;
    }

    public JogadoresAdapter(ArrayList<Jogador> data, Context context) {
        super(context, R.layout.list_view_item_campeonato, data);
        this.dataSet = data;
        this.mContext = context;

    }

    private int lastPosition = -1;

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        Jogador jogador = getItem(position);
        ViewHolder viewHolder;

        if (convertView == null) {

            viewHolder = new ViewHolder();
            LayoutInflater inflater = LayoutInflater.from(getContext());
            convertView = inflater.inflate(R.layout.list_view_item_jogadores, parent, false);
            viewHolder.txtName = (TextView) convertView.findViewById(R.id.tv_nome_jogador);

            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
        }
        lastPosition = position;

        viewHolder.txtName.setText(jogador.getNome());
        return convertView;
    }
}
