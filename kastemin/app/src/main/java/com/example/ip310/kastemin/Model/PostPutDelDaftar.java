package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class PostPutDelDaftar {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    Daftar mDaftar;
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
    public Daftar getDaftar() {
        return mDaftar;
    }
    public void setKontak(Daftar Daftar) {
        mDaftar = Daftar;
    }

}