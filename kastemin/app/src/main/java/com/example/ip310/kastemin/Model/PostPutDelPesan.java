package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

public class PostPutDelPesan {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    Daftar mPesan;
    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Daftar getmPesan() {
        return mPesan;
    }

    public void setmPesan(Daftar mPesan) {
        this.mPesan = mPesan;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
