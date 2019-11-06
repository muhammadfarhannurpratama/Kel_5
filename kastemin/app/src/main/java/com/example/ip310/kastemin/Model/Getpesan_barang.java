package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Getpesan_barang {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Pesan_barang> listDataPesanBarang;
    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public List<Pesan_barang> getListDataPesanBarang() {
        return listDataPesanBarang;
    }

    public void setListDataPesanBarang(List<Pesan_barang> listDataPesanBarang) {
        this.listDataPesanBarang = listDataPesanBarang;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
