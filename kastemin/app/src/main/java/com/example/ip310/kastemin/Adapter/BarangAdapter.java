package com.example.ip310.kastemin.Adapter;


import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.ip310.kastemin.DaftarActivity;
import com.example.ip310.kastemin.PesanBarangActivity;
import com.example.ip310.kastemin.PesanBarangActivity;
import com.example.ip310.kastemin.R;
import com.example.ip310.kastemin.MainActivity;
import com.example.ip310.kastemin.Model.Detail_barang;
import com.squareup.picasso.Picasso;

import java.util.List;

public class BarangAdapter extends RecyclerView.Adapter<BarangAdapter.MyViewHolder>{
    List<Detail_barang> mBarangList;
    Context context;

    public BarangAdapter(List <Detail_barang> BarangList,Context context) {
        mBarangList = BarangList;
        this.context=context;
    }

    @Override
    public MyViewHolder onCreateViewHolder (ViewGroup parent, int viewType){
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.grid_view, parent, false);
        MyViewHolder mViewHolder = new MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder (MyViewHolder holder,final int position){
        holder.mTextViewNama.setText("Nama = " + mBarangList.get(position).getNama());
        holder.mTextViewdeskripsi.setText("Deskripsi = " + mBarangList.get(position).getDeskripsi());
        final String urlFoto = "http://192.168.1.6/kastemin/foto/" + mBarangList.get(position).getFoto();
        Picasso.with(context).load(urlFoto).into(holder.mViewFoto);
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent mIntent = new Intent(v.getContext(), PesanBarangActivity.class);
                //mIntent.putExtra("Nama", mBarangList.get(position).getNama());
                mIntent.putExtra("Foto", mBarangList.get(position).getFoto());
               // mIntent.putExtra("Deskripsi", mBarangList.get(position).getDeskripsi());
                v.getContext().startActivity(mIntent);
            }
        });
    }

    @Override
    public int getItemCount () {
        return mBarangList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewNama, mTextViewdeskripsi;
        public ImageView mViewFoto;


        public MyViewHolder(View itemView) {
            super(itemView);
            mTextViewNama = (TextView) itemView.findViewById(R.id.status);
            mViewFoto = (ImageView) itemView.findViewById(R.id.brng);
            mTextViewdeskripsi = (TextView) itemView.findViewById(R.id.ukuran);
        }
    }
}
