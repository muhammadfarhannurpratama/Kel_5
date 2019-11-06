package com.example.ip310.kastemin;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.example.ip310.kastemin.Model.PostPutDelDaftar;
import com.example.ip310.kastemin.Model.PostPutDelPesan;
import com.example.ip310.kastemin.Rest.ApiClient;
import com.example.ip310.kastemin.Rest.ApiInterface;
import com.squareup.picasso.Picasso;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class PesanBarangActivity extends AppCompatActivity {

    EditText jenis_kain, jumlah_baju, ukuran_baju, foto, catatan;
    ImageView tvGambar;
    Button btPesan;
    ApiInterface mApiInterface;
    public static PesanBarangActivity ma;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pesan_barang);

        Toolbar toolbar =(Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setTitle("Pesan Barang");
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        tvGambar = (ImageView) findViewById(R.id.tvGambar);
        jenis_kain = (EditText) findViewById(R.id.Jkain);
        jumlah_baju = (EditText) findViewById(R.id.JmlhBj);
        ukuran_baju = (EditText) findViewById(R.id.Ukuran);
        foto = (EditText) findViewById(R.id.Uploud);
        catatan = (EditText) findViewById(R.id.Catatan);

        btPesan = (Button) findViewById(R.id.btPesan);
        btPesan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Call<PostPutDelPesan> postPesanCall = mApiInterface.postPesan(jenis_kain.getText().toString(),
                        jumlah_baju.getText().toString(),ukuran_baju.getText().toString(),foto.getText().toString(),
                        catatan.getText().toString());
                postPesanCall.enqueue(new Callback<PostPutDelPesan>() {
                    @Override
                    public void onResponse(Call<PostPutDelPesan> call, Response<PostPutDelPesan> response) {

                        Toast.makeText(getApplicationContext(), "Berhasil", Toast.LENGTH_LONG).show();
                        // Notifi.ma.refresh();
                        //finish();
                    }

                    @Override
                    public void onFailure(Call<PostPutDelPesan> call, Throwable t) {
                        Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
                    }
                });
            }
        });

        Intent mIintent=getIntent();
        String gambar="http://192.168.1.6/kastemin/foto/"+mIintent.getStringExtra("Foto");
        Picasso.with(getApplicationContext()).load(gambar).into(tvGambar);

    }
}
