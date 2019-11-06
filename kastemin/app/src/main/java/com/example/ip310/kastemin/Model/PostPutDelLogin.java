package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

public class PostPutDelLogin {
    @SerializedName("status")
    String status;

    @SerializedName("id")
    String id;

    @SerializedName("namadpn")
    String namadpn;

    @SerializedName("namablkng")
    String namablkng;

    @SerializedName("email")
    String email;


    @SerializedName("message")
    String message;


    public String getNamadpn() {
        return namadpn;
    }

    public void setNamadpn(String namadpn) {
        this.namadpn = namadpn;
    }

    public String getNamablkng() {
        return namablkng;
    }

    public void setNamablkng(String namablkng) {
        this.namablkng = namablkng;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

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

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

}

