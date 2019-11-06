
$(document).ready(function(){

    /* like */
                    $("a.suka").click(function(e){
                        e.preventDefault();
                            var id = $(this).data("id");
                                var aClass = $('a.suka[data-id="'+id+'"]');
                                var session = $(this).data("session");
                                if(session.length==0)
                                {
                                alert('Login Dulu Mas');
                                }
                                else{
                                $.ajax({
                                    type : "GET",
                                    url : $(this).attr("href"),
                                    data : {id:id,method:"ajax"},
                                    success : function(data){
                                        var json_data = jQuery.parseJSON(data);
                                        var session = json_data.session;
                                                aClass.html(json_data.span);
                                            var jmlh;
                                            if(json_data.jmllike[0].likes != null){
                                                jmlh = json_data.jmllike[0].likes;
                                            }else{
                                                jmlh = 0;
                                            }
                                            $('.jml-suka[data-id="'+id+'"] .replace').html('<span class="glyphicon glyphicon-thumbs-up"></span> ' +jmlh) ;
                                                aClass.toggleClass("batal-suka");

                                                        if(aClass.hasClass("batal-suka")){
                                                    aClass.attr('href', 'http://localhost/jersey/Pages/Batalsuka/'+id);
                                                        }
                                                            else{
                                                    aClass.attr('href', 'http://localhost/jersey/Pages/Suka/'+id);

                                                    }
                                    }
                                });
                              }
                    });

    /* filter without refresh */

        $("button.filter").click(function(e){
            e.preventDefault();

            var liga = $("#changeliga").val();
            var klub = $("#klub").val();
            var tipe = $("#tipe").val();
            var url = $("form#filter").data("action")

            $.ajax({
                type : "POST",
                url : url,
                data : {kat:liga,subkat:klub,tipe:tipe},
                success : function(data){
                    document.querySelector("#filterAjax").innerHTML = data;
                }
            });
        });

          $(document).on("click", "button#update", function(e){
            e.preventDefault();

            var url = $(this).data("url");
            var direct = $(this).data("direct");
            var namadpn = $("input#namadpn").val();
            var namablkng = $("input#namablkng").val();
            var pass = $("input#pass").val();
            var repass = $("input#repass").val();
            var no_hp = $("input#no_hp").val();
            var jk = $("select#jk").val();
            var kode_pos = $("input#kode_pos").val();
            var foto = $("input#foto").val();
            var alamat = $("textarea#alamat").val();


            $.ajax({
              type : "POST",
              url : url,
              data : {
                method : "ajax",
                namadpn : namadpn,
                namablkng : namablkng,
                pass : pass,
                repass : repass,
                no_hp : no_hp,
                jk : jk,
                kode_pos : kode_pos,
                alamat : alamat,
              },
                success : function(data){
                  document.querySelector("p#error_namadpn").innerHTML = data['error_namadpn'];
                  document.querySelector("p#error_namablkng").innerHTML = data['error_namablkng'];
                  document.querySelector("p#error_pass").innerHTML = data['error_pass'];
                  document.querySelector("p#error_passrepass").innerHTML = data['error_passrepass'];
                  document.querySelector("p#error_nohp").innerHTML = data['error_nohp'];
                  document.querySelector("p#error_kode_pos").innerHTML = data['error_kode_pos'];
                  document.querySelector("p#error_alamat").innerHTML = data['error_alamat'];

                  if(data['update']=='gagal')
                  {
                    alert('gagal');
                  }
                  else
                  {
                    window.location=direct+"?msg=success";
                  }
              }
            });
          });

      $(document).on("click", "button#register", function(e){
        e.preventDefault();
        var namadpn = $("input#namadpn").val();
        var namablkng = $("input#namablkng").val();
        var pass = $("input#pass").val();
        var repass = $("input#repass").val();
        var email = $("input#email").val();
        var no_hp = $("input#no_hp").val();
        var jk = $("select#jk").val();
        var kode_pos = $("input#kode_pos").val();
        var alamat = $("textarea#alamat").val();
        var url = $(this).data("url");
        var province = $("select#select-province").val();
        var city = $("select#city-select").val();

        $.ajax({
          type : "POST",
          url : url,
          data : {
            namadpn : namadpn,
            namablkng : namablkng,
            pass : pass,
            repass : repass,
            email : email,
            no_hp : no_hp,
            jk : jk,
            kode_pos : kode_pos,
            alamat : alamat,
            province : province,
            city : city,
          },
          success : function(data){
            document.querySelector("p#error_namadpn").innerHTML = data['error_namadpn'];
            document.querySelector("p#error_namablkng").innerHTML = data['error_namablkng'];
            document.querySelector("p#error_pass").innerHTML = data['error_pass'];
            document.querySelector("p#error_passrepass").innerHTML = data['error_passrepass'];
            document.querySelector("p#error_email").innerHTML = data['error_email'];
            document.querySelector("p#error_nohp").innerHTML = data['error_nohp'];
            document.querySelector("p#error_kode_pos").innerHTML = data['error_kode_pos'];
            document.querySelector("p#error_alamat").innerHTML = data['error_alamat'];
            if(data['registrasi']=='gagal')
            {

            }
            else
            {
                window.location="?msg=success";
            }
            }
        });
      });

    $(document).on("click", "select#ukuran", function(){
        var ukuran = $("#ukuran").val();

        var url_barang = $(this).data("urlbarang");

        var controller = $(this).data("controller");

        $.ajax({
          url : controller,
          type : "POST",
          data : {ukuran:ukuran, url_barang : url_barang },
          success : function(data){
            document.querySelector("tr#qty").innerHTML = data;
          }
        });

    });



    $(document).on("click", "button.komentar", function(e){
        e.preventDefault();
        var url = $(this).data("url");
        var url_barang = $(this).data("urlbarang");
        var komentar = $("input#komentar").val();

        if(komentar.length==0){
          document.querySelector("p#notif").innerHTML = "Tolong Isi Kolom Komentar Jika Ingin Berkomentar";
        }
        else{
        $.ajax({
          type : "POST",
          url : url,
          data : {url_barang : url_barang, komentar:komentar},
          success : function(data){
            document.querySelector("p#notif").innerHTML = "Komentar Berhasil! Tunggu Persetujuan Admin";
            $("#komentarform")[0].reset();
          }
        });
      }
    });
    /* filter jersey di list jersey */

    $(document).on('click',"select#filter-jersey",function(){

        var filter = $("select#filter-jersey").val();
        //alert(filter);
        var url = $("select#filter-jersey").data("url");
        $.ajax({
          type : "POST",
          url : url,
          data : {filter : filter},
          success : function(data)
          {
            document.querySelector(".filter-place").innerHTML = data;
          }
        });
    });


        $(document).on('click',".filter-place > ul > li a",function(e){
            var filter = $("select#filter-jersey").val();
            var url = $(this).attr("href");

            $.ajax({
              type : "POST",
              url : url,
              data : {filter : filter},
              success : function(data)
              {
                //alert(data)
                document.querySelector(".filter-place").innerHTML = data;
              }
            });
            e.preventDefault();
        });

    $(document).on("click", "button#kritik-saran", function(e){
      e.preventDefault();

      var kritik_saran = $("input#kritik-saran").val();

      var url = $(this).data("url");

      $.ajax({
        type : "POST",
        url : url,
        data : {kritik_saran : kritik_saran},
        success : function(data){
          $("form#kritik-saran")[0].reset();
          document.querySelector("p#msg").innerHTML = data['msg'];
        }
      });
    })

});


/* onchange liga */
    function func(selectedValue)
    {
        var url = $("select#changeliga").data("url");
        $.ajax({
            url : url,
            type : "POST",
            data : {option : selectedValue},
            success : function(data)
            {

                var liga = selectedValue;
                document.querySelector("#klub").innerHTML = data;
            }
        });
    }
