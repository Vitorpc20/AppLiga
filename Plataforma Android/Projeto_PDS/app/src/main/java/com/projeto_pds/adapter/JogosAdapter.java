package com.projeto_pds.adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ArrayAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.projeto_pds.R;
import com.projeto_pds.model.Jogo;
import com.projeto_pds.telas.TelaJogo;
import com.projeto_pds.telas.TelaListaJogos;

import java.util.ArrayList;

public class JogosAdapter extends ArrayAdapter<Jogo> implements View.OnClickListener {

    private ArrayList<Jogo> dataSet;
    private Context mContext;
    private JogosAdapterListener listener;

    // View lookup cache
    private static class ViewHolder {
        TextView tvNomeJogo;
        TextView tvModalidade;
        TextView tvData;
        /*TextView txtType;
        TextView txtVersion;
        ImageView info;*/
    }

    public JogosAdapter(ArrayList<Jogo> data, Context context) {
        super(context, R.layout.list_view_item_jogo, data);
        this.dataSet = data;
        this.mContext=context;

    }

    private int lastPosition = -1;

    @Override
    public void onClick(View v) {
        if(listener!=null){
            int position=(Integer) v.getTag();
            Jogo jogo = getItem(position);
            listener.selected(jogo);
        }
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // Get the data item for this position
        Jogo jogo = getItem(position);
        // Check if an existing view is being reused, otherwise inflate the view
        ViewHolder viewHolder; // view lookup cache stored in tag

        final View result;

        if (convertView == null) {

            viewHolder = new ViewHolder();
            LayoutInflater inflater = LayoutInflater.from(getContext());
            convertView = inflater.inflate(R.layout.list_view_item_jogo, parent, false);
            viewHolder.tvNomeJogo = (TextView) convertView.findViewById(R.id.tv_nome_jogo);
            viewHolder.tvModalidade = (TextView) convertView.findViewById(R.id.tv_modalidade_jogo);
            viewHolder.tvData = (TextView) convertView.findViewById(R.id.tv_data_jogo);

            result=convertView;

            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
            result=convertView;
        }

        /*Animation animation = AnimationUtils.loadAnimation(mContext, (position > lastPosition) ? R.anim.up_from_bottom : R.anim.down_from_top);
        result.startAnimation(animation);*/
        lastPosition = position;

        viewHolder.tvNomeJogo.setText(jogo.getNomeTime1()+" vs "+jogo.getNomeTime2());
        viewHolder.tvModalidade.setText(jogo.getModalidade());
        viewHolder.tvData.setText(jogo.getData()+" "+jogo.getHora());
        // Return the completed view to render on screen
        return convertView;
    }

    public void setListener(JogosAdapterListener listener) {
        this.listener = listener;
    }

    public interface JogosAdapterListener{
        void selected(Jogo jogo);
    }
}
