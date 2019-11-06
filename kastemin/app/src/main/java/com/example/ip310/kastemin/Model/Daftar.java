package com.example.ip310.kastemin.Model;

import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class Daftar {
    @SerializedName("id")
    private String id;
    @SerializedName("email")
    private String email;
    @SerializedName("namadpn")
    private String namadpn;
    @SerializedName("namablkng")
    private String namablkng;
    @SerializedName("pass")
    private String pass;
    @SerializedName("jk")
    private String jk;
    @SerializedName("no_hp")
    private String no_hp;
    @SerializedName("province")
    private String province;
    @SerializedName("city")
    private String city;
    @SerializedName("kode_pos")
    private String kode_pos;
    @SerializedName("alamat")
    private String alamat;
    @SerializedName("foto")
    private String foto;


    public Daftar(String id, String email, String namadpn,
                  String namablkng, String pass, String jk,
                  String no_hp, String province, String city,
                  String kode_pos, String alamat, String foto ) {
        this.id = id;
        this.email = email;
        this.namadpn = namadpn;
        this.namablkng = namablkng;
        this.pass = pass;
        this.jk = jk;
        this.no_hp = no_hp;
        this.province = province;
        this.city = city;
        this.kode_pos = kode_pos;
        this.alamat = alamat;
        this.foto = foto;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

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

    public String getPass() {
        return pass;
    }

    public void setPass(String pass) {
        this.pass = pass;
    }

    public String getJk() {
        return jk;
    }

    public void setJk(String jk) {
        this.jk = jk;
    }

    public String getNo_hp() {
        return no_hp;
    }

    public void setNo_hp(String no_hp) {
        this.no_hp = no_hp;
    }

    public String getProvince() {
        return province;
    }

    public void setProvince(String province) {
        this.province = province;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public String getKode_pos() {
        return kode_pos;
    }

    public void setKode_pos(String kode_pos) {
        this.kode_pos = kode_pos;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }


}

