package com.example.ip310.kastemin.Rest;

/**
 * Created by root on 2/3/17.
 */

import com.example.ip310.kastemin.Model.GetDaftar;
import com.example.ip310.kastemin.Model.Getdetail_barang;
import com.example.ip310.kastemin.Model.PostPutDelDaftar;
import com.example.ip310.kastemin.Model.PostPutDelLogin;
import com.example.ip310.kastemin.Model.PostPutDelPesan;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface ApiInterface {
    @GET("R_user")
    Call<GetDaftar> getDaftar();
    @FormUrlEncoded
    @POST("R_user")
    Call<PostPutDelDaftar> postDaftar(@Field("namadpn") String namadpn,
                                      @Field("namablkng") String namablkng,
                                      @Field("email") String email,
                                      @Field("pass") String pass,
                                      @Field("jk") String jk,
                                      @Field("no_hp") String no_hp,
                                      @Field("province") String province,
                                      @Field("city") String city,
                                      @Field("kode_pos") String kode_pos,
                                      @Field("alamat") String alamat);
    /*@FormUrlEncoded
    @PUT("Daftar")
    Call<PostPutDelDaftar> putKontak(@Field("id") String id,
                                     @Field("nama") String nama,
                                     @Field("nomor") String nomor);*/

    @FormUrlEncoded
    @POST("loginhp")
    Call<PostPutDelLogin> postLogin(
            @Field("email") String email,
            @Field("pass") String pass);
   /* @FormUrlEncoded
    @HTTP(method = "DELETE", path = "kontak", hasBody = true)
    Call<PostPutDelKontak> deleteKontak(@Field("id") String id);*/

    @GET("detail_brng")
    Call<Getdetail_barang> getBarang();

    @FormUrlEncoded
    @POST("Pesan_brng")
    Call<PostPutDelPesan> postPesan (@Field("jenis_kain") String namadpn,
                                     @Field("jumlah") String jumlah,
                                     @Field("ukuran") String ukuran,
                                     @Field("file") String file,
                                     @Field("catatan") String catatan);


}