package com.example.ip310.kastemin.Fragment;

import android.content.Context;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.ip310.kastemin.Adapter.BarangAdapter;
import com.example.ip310.kastemin.Model.Detail_barang;
import com.example.ip310.kastemin.Model.Getdetail_barang;
import com.example.ip310.kastemin.R;
import com.example.ip310.kastemin.Rest.ApiClient;
import com.example.ip310.kastemin.Rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class HomeFragment extends Fragment {
    ApiInterface mApiInterface;
    private RecyclerView mRecyclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static HomeFragment ma;
    public HomeFragment() {
        // Required empty public constructor
    }



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        getActivity().setTitle("AyoCustom");
        View rootView=inflater.inflate(R.layout.fragment_home, container, false);
        mRecyclerView = (RecyclerView) rootView.findViewById(R.id.recycleView);
        mLayoutManager = new LinearLayoutManager(getActivity());
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        ma=this;
        refresh();
        return rootView;
    }
    public void refresh() {
        Call<Getdetail_barang> kontakCall = mApiInterface.getBarang();
        kontakCall.enqueue(new Callback<Getdetail_barang>() {
            @Override
            public void onResponse(Call<Getdetail_barang> call, Response<Getdetail_barang>
                    response) {
                List<Detail_barang> BarangkList = response.body().getListDataBarang();
                Log.d("Retrofit Get", "Jumlah data Kontak: " +
                        String.valueOf(BarangkList.size()));
                mAdapter = new BarangAdapter(BarangkList,getContext());
                mRecyclerView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<Getdetail_barang> call, Throwable t) {
                Log.e("Retrofit Get", t.toString());
            }
        });
    }

}
