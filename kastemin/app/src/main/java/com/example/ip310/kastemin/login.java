package com.example.ip310.kastemin;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.ip310.kastemin.Model.PostPutDelLogin;
import com.example.ip310.kastemin.Rest.ApiClient;
import com.example.ip310.kastemin.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;

public class login extends AppCompatActivity {
    ProgressDialog progressDialog;
    private EditText email, pass;
    private Button btn_login, btn_daftar;
    ApiInterface mApiInterface;
    SharedPreferences sharedPreferences;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        mApiInterface=ApiClient.getClient().create(ApiInterface.class);
        email=findViewById(R.id.l_email);
        pass=findViewById(R.id.l_pass);
        sharedPreferences=login.this.getSharedPreferences("remember",Context.MODE_PRIVATE);
        btn_daftar= findViewById(R.id.btDaftar);
        btn_daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(),DaftarActivity.class);
                startActivity(intent);
            }
        });

        btn_login=findViewById(R.id.btInserting);
        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                progressDialog = new ProgressDialog(login.this);
                progressDialog.setMessage("Loading ...");
                progressDialog.setCancelable(false);
                progressDialog.show();

                Call<PostPutDelLogin> postKontakCall = mApiInterface.postLogin(email.getText().toString(), pass.getText().toString());
                postKontakCall.enqueue(new Callback<PostPutDelLogin>() {
                    @Override
                    public void onResponse(Call<PostPutDelLogin> call, retrofit2.Response<PostPutDelLogin> response) {
                        progressDialog.dismiss();
                        String id = response.body().getId();
                        String namablkng = response.body().getNamablkng();
                        String namadpn = response.body().getNamadpn();
                        Log.e("Berhasil Login", "Berhasil " + id);
                        if (TextUtils.isEmpty(id)) {
                            Toast.makeText(login.this, "Username atau Password Salah", Toast.LENGTH_SHORT).show();
                        } else {

                            Toast.makeText(login.this, "Berhasil Login", Toast.LENGTH_LONG).show();
                            Intent intent = new Intent(login.this, MainActivity.class);
                            SharedPreferences.Editor editor = sharedPreferences.edit();
                            editor.putString("id", id);
                            editor.putString("namadpn", namadpn);
                            editor.putString("namablkng", namablkng);
                            editor.commit();
                            startActivity(intent);
                            Log.e("Berhasil Login", "Berhasil " + id);
                        }


                    }

                    @Override
                    public void onFailure(Call<PostPutDelLogin> call, Throwable t) {
                        progressDialog.dismiss();
                        Log.e("Gagal Login", "Gagal " + t);
                        Toast.makeText(login.this, "Error", Toast.LENGTH_LONG).show();


                    }
                });
            }
        });

    }
}

