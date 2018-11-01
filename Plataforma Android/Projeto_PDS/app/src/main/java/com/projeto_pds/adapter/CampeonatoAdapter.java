package com.projeto_pds.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.projeto_pds.model.Campeonato;
import com.projeto_pds.R;

import java.util.ArrayList;

/**
 * Created by Marcelo on 25/10/2018.
 */

public class CampeonatoAdapter extends ArrayAdapter<Campeonato> {

    private ArrayList<Campeonato> dataSet;
    Context mContext;

    // View lookup cache
    private static class ViewHolder {
        TextView txtName;
        TextView txtNomeCurso;
        /*TextView txtType;
        TextView txtVersion;
        ImageView info;*/
    }

    public CampeonatoAdapter(ArrayList<Campeonato> data, Context context) {
        super(context, R.layout.list_view_item_campeonato, data);
        this.dataSet = data;
        this.mContext=context;

    }

    private int lastPosition = -1;

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // Get the data item for this position
        Campeonato campeonato = getItem(position);
        // Check if an existing view is being reused, otherwise inflate the view
        ViewHolder viewHolder; // view lookup cache stored in tag

        final View result;

        if (convertView == null) {

            viewHolder = new ViewHolder();
            LayoutInflater inflater = LayoutInflater.from(getContext());
            convertView = inflater.inflate(R.layout.list_view_item_campeonato, parent, false);
            viewHolder.txtName = (TextView) convertView.findViewById(R.id.tv_nome_campeonato);
            viewHolder.txtNomeCurso = (TextView) convertView.findViewById(R.id.tv_curso_campeonato);
            /*viewHolder.txtType = (TextView) convertView.findViewById(R.id.type);
            viewHolder.txtVersion = (TextView) convertView.findViewById(R.id.version_number);
            viewHolder.info = (ImageView) convertView.findViewById(R.id.item_info);*/

            result=convertView;

            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
            result=convertView;
        }

        /*Animation animation = AnimationUtils.loadAnimation(mContext, (position > lastPosition) ? R.anim.up_from_bottom : R.anim.down_from_top);
        result.startAnimation(animation);*/
        lastPosition = position;

        viewHolder.txtName.setText(campeonato.getNomeCampeonato());
        viewHolder.txtNomeCurso.setText(campeonato.getCursoCampeonato());
        /*viewHolder.txtType.setText(dataModel.getType());
        viewHolder.txtVersion.setText(dataModel.getVersion_number());
        viewHolder.info.setOnClickListener(this);
        viewHolder.info.setTag(position);*/
        // Return the completed view to render on screen
        return convertView;
    }
}
