package com.projeto_pds.adapter;

import android.content.Context;
import android.graphics.Color;
import android.graphics.PorterDuff;
import android.support.annotation.NonNull;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.projeto_pds.R;
import com.projeto_pds.model.Ranking;

import java.util.ArrayList;

public class RankingAdapter extends ArrayAdapter<Ranking> {

    public RankingAdapter(ArrayList<Ranking> data, Context context) {
        super(context, R.layout.list_view_item_ranking, data);
        Log.d("ranking", "Criou Ranking Adapter");
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // Get the data item for this position
        Ranking ranking = getItem(position);
        // Check if an existing view is being reused, otherwise inflate the view
        ViewHolder viewHolder; // view lookup cache stored in tag

        if (convertView == null) {

            viewHolder = new ViewHolder();
            LayoutInflater inflater = LayoutInflater.from(getContext());
            convertView = inflater.inflate(R.layout.list_view_item_ranking, parent, false);
            viewHolder.ivPosicao = convertView.findViewById(R.id.iv_posicao);
            viewHolder.tvPosicao = (TextView) convertView.findViewById(R.id.tv_posicao);
            viewHolder.tvNome = (TextView) convertView.findViewById(R.id.tv_nome);
            viewHolder.tvPontuacao = (TextView) convertView.findViewById(R.id.tv_pontuacao);

            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
        }

        position++;
        switch (position){
            case 1:
                viewHolder.ivPosicao.setVisibility(View.VISIBLE);
                viewHolder.ivPosicao.setColorFilter(Color.parseColor("#FCD323"), PorterDuff.Mode.SRC_ATOP);
                break;
            case 2:
                viewHolder.ivPosicao.setVisibility(View.VISIBLE);
                viewHolder.ivPosicao.setColorFilter(Color.parseColor("#BBBBBB"), PorterDuff.Mode.SRC_ATOP);
                break;
            case 3:
                viewHolder.ivPosicao.setVisibility(View.VISIBLE);
                viewHolder.ivPosicao.setColorFilter(Color.parseColor("#B97D3F"), PorterDuff.Mode.SRC_ATOP);
                break;
        }

        viewHolder.tvPosicao.setText(String.valueOf(position));
        viewHolder.tvNome.setText(ranking.getNome());
        viewHolder.tvPontuacao.setText(String.valueOf((int)ranking.getPontuacao()));
        // Return the completed view to render on screen

        Log.d("ranking", "carregou view");
        return convertView;
    }

    // View lookup cache
    private static class ViewHolder {
        ImageView ivPosicao;
        TextView tvPosicao;
        TextView tvNome;
        TextView tvPontuacao;
    }
}
