package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

public class Detail_barang {
    @SerializedName("id")
    private String id;
    @SerializedName("nama")
    private String nama;
    @SerializedName("deskripsi")
    private String deskripsi;
    @SerializedName("foto")
    private String foto;

    public Detail_barang(String id, String nama, String deskripsi, String foto) {
        this.id = id;
        this.nama = nama;
        this.deskripsi = deskripsi;
        this.foto = foto;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public String getFoto() {
        return foto;
    }

    public void setFoto(String foto) {
        this.foto = foto;
    }
}
