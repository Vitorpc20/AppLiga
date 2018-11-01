package com.projeto_pds.telas;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.projeto_pds.adapter.CampeonatoAdapter;
import com.projeto_pds.info.Configs;
import com.projeto_pds.model.Campeonato;
import com.projeto_pds.R;

import java.util.ArrayList;

public class TelaListaDeCampeonatos extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tela_lista_de_campeonatos);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        ListView lvCampeonatos = findViewById(R.id.lv_campeonatos);
        CampeonatoAdapter adapter = new CampeonatoAdapter(Configs.campeonatoList, this.getApplicationContext());
        //lvCampeonatos.setDivider(null);
        lvCampeonatos.setAdapter(adapter);
        lvCampeonatos.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Intent intent = new Intent(TelaListaDeCampeonatos.this, TelaCampeonato.class);
                intent.putExtra("campeonato_position_list", position);
                startActivity(intent);
            }
        });
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }
}
