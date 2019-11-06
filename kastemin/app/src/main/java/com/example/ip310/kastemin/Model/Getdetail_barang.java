package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Getdetail_barang {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Detail_barang> listDataBarang;
    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public List<Detail_barang> getListDataBarang() {
        return listDataBarang;
    }

    public void setListDataBarang(List<Detail_barang> listDataBarang) {
        this.listDataBarang = listDataBarang;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
