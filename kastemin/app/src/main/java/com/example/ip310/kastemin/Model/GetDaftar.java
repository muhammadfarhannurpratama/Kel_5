package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class GetDaftar {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Daftar> listDataKontak;
    @SerializedName("message")
    String message;
    public String getStatus() {
        return status;
    }
    public void setStatus(String status) {
        this.status = status;
    }
    public String getMessage() {
        return message;
    }
    public void setMessage(String message) {
        this.message = message;
    }
    public List<Daftar> getListDataKontak() {
        return listDataKontak;
    }
    public void setListDataKontak(List<Daftar> listDataKontak) {
        this.listDataKontak = listDataKontak;
    }
}