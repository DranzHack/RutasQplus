
//Variables para el maping ALV Modificado en EL Juindos
var infoWindow = null;
var map =null;
var markersArray=[];

//DETERMINACION DE LAS BASES (GEO-CERCA) ASI COMO SU UBICACION FISICA Y EL TAMAÑO DEL MISMO (POPULATION)
var bases1= {
  base:{
    center: {lat: 19.061122, lng: -98.208147},
    population: 22
  }

};

var bases2={
  base:
  {
    center:{lat: 19.053017, lng: -98.220594},
    population:22
  }
}

var bases3={
  base:
  {
    center:{lat: 19.048232, lng: -98.217769},
    population:22
  }
}

var bases4={
  base:
  {
    center:{lat: 19.035880, lng: -98.213817},
    population:22
  }
}

var bases5={
  base:
  {
    center:{lat: 19.028021, lng: -98.208911},
    population:22
  }
}

var bases6={
  base:
  {
    center:{lat: 19.022658, lng: -98.204542},
    population:22
  }
}

var bases7={
  base:
  {
    center:{lat: 19.020913,lng: -98.201270},
    population:22
  }
}

var bases8={
  base:
  {
    center:{lat: 19.029142, lng: -98.192355},
    population:22
  }
}

var bases9={
  base:
  {
    center:{lat: 19.037853, lng: -98.186384},
    population:22
  }
}

var bases10={
  base:
  {
    center:{lat: 19.047325,lng: -98.183318},
    population:22
  }
}

var bases11={
  base:
  {
    center:{lat: 19.058990, lng: -98.187929},
    population:22
  }
}

var bases12={
  base:
  {
    center:{lat:19.067331,lng: -98.177148},
    population:22
  }
}

var bases13={
  base:
  {
    center:{lat: 19.072988, lng: -98.172411},
    population:22
  }
}
   
var bases14={
  base:
  {
    center:{lat:19.072883,lng: -98.177294},
    population:22
  }
}

var basesEND=
{
  base:
  {
    center:{lat:19.070384, lng:-98.176515},
    population:22
  }
}

var basesINIT=
{
  base:
  {
    center:{lat:19.069927,lng: -98.176945},
    population:22
  }
}
 var Estado = false;


//FIN DE DECLARACION DE VARIABLES GLOBALES 


/*EN ESTA PARTE SE INICIALIZA EL MAPA COMO LO SON COORDENADAS CENTRALES O EN QUE POSICION SE CENTRARA
  Y LOS MARCADORES A MOSTRAR COMO LO SON LAS UNIDADES 
*/
function initMap() {
  
  var MiCentro=new google.maps.LatLng(19.0583202, -98.2122048);
  var Optionss={
      zoom: 14,
      center: MiCentro,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  }

      map = new google.maps.Map(document.getElementById("map"),Optionss)
      infoWindow = new google.maps.InfoWindow;
/*
       var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
*/

    //CelMorado();
    //window.setInterval(CelMorado,10000);
    Unidad01();
    window.setInterval(Unidad01,10000);

    Unidad02();
    window.setInterval(Unidad02,10000);

    Unidad03();
    window.setInterval(Unidad03,10000);

    Unidad04();
    window.setInterval(Unidad04,10000);

    Unidad05();
    window.setInterval(Unidad05,10000);

    Unidad06();
    window.setInterval(Unidad06,10000);

    Unidad07();
    window.setInterval(Unidad07,10000);

    //Unidad3();
    //window.setInterval(Unidad3,10000);
    //Inicio de la funcion para obtener la ubicacion
//y el checkeo virtual de la unidad 1
function Unidad01()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = '../../XML/Combi1.php?t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status");
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Ub=marker.attr("Direccion");
          var Date=Fecha+" "+Hora;
          //var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          var html="<b>Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<br> Ubicación:"+Ub+ "<br> Fecha: "+Fecha+" Hora: "+Hora+ " </b>";
          var Imagen='../../img/20.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/

//Metodos para insertar un registro del Virtual Check
          DentroFueraBase1();
          DentroFueraBase2();
          DentroFueraBase3();
          DentroFueraBase4();
          DentroFueraBase5();
          DentroFueraBase6();
          DentroFueraBase7();
          DentroFueraBase8();
          DentroFueraBase9();
          DentroFueraBase10();
          DentroFueraBase11();
          DentroFueraBase12();
          DentroFueraBase13();
          DentroFueraBase14();
          DentroFueraBaseEnd();
          DentroFueraBaseInit();
          //alert(IdEnroler);



/*AKI SE PONEN TODOS LAS INSERSIONES DE CHEKING VIRTUAL ALV*/
          function CheckingBase1()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase1.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        alert(data);
                    }
                });

          }

          function CheckingBase2()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase2.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase3()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase3.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase4()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase4.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase5()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase5.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }


          function CheckingBase6()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase6.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase7()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase7.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase8()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase8.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase9()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase9.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase10()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase10.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase11()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase11.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase12()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase12.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase13()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase13.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });
          }

          function CheckingBase14()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase14.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingEnd()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseFin.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            });

          }

          function CheckingInit()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseInicio.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            })
          }
/*FIN FUNCIONES DE CHEKEO VIRTUAL*/

/*ESFICIFICACION DE LOS METODOS DE ENTRADA Y SALIDA DE UNA GEO-CERCA*/
       function DentroFueraBase1()
          {
            var Algo = false;
            if( CircleBase1.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 1");
                   CheckingBase1();
                }else{
                   console.log("Fuera base 1");

                }
          }

          function DentroFueraBase2()
          {
            var Algo = false;
            if( CircleBase2.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 2");
                   CheckingBase2();
                }else{
                   console.log("Fuera Base 2");

                }
          }

          function DentroFueraBase3()
          {
            var Algo = false;
            if( CircleBase3.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base3 ");
                   CheckingBase3();
                }else{
                   console.log("Fuera base 3");

                }
          }

          function DentroFueraBase4()
          {
            var Algo = false;
            if( CircleBase4.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 4");
                   CheckingBase4();
                }else{
                   console.log("Fuera base 4");

                }
          }

          function DentroFueraBase5()
          {
            var Algo = false;
            if( CircleBase5.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 5");
                   CheckingBase5();
                }else{
                   console.log("Fuera base 5");

                }
          }

          function DentroFueraBase6()
          {
            var Algo = false;
            if( CircleBase6.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 6");
                    CheckingBase6();
                }else{
                   console.log("Fuera base 6");

                }
          }

          function DentroFueraBase7()
          {
            var Algo = false;
            if( CircleBase7.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 7");
                    CheckingBase7();
                }else{
                   console.log("Fuera base 7");

                }
          }

          function DentroFueraBase8()
          {
            var Algo = false;
            if( CircleBase8.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 8");
                    CheckingBase8();
                }else{
                   console.log("Fuera base 8");

                }
          }

          function DentroFueraBase9()
          {
            var Algo = false;
            if( CircleBase9.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 9");
                    CheckingBase9();
                }else{
                   console.log("Fuera base 9");

                }
          }

          function DentroFueraBase10()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 10");
                    CheckingBase10();
                }else{
                   console.log("Fuera base 10");

                }
          }

          function DentroFueraBase11()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 11");
                    CheckingBase11();
                }else{
                   console.log("Fuera base 11");

                }
          }

          function DentroFueraBase12()
          {
            var Algo=false;
            if(CircleBase12.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 12");
              CheckingBase12();
            }
            else
            {
                console.log("Fuera Base 12");
            }
          }

          function DentroFueraBase13()
          {
            var Algo=false;
            if(CircleBase13.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 13");
              CheckingBase13();
            }
            else
            {
                console.log("Fuera Base 13");
            }
          }

          function DentroFueraBase14()
          {
            var Algo=false;
            if(CircleBase14.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 14");
              CheckingBase14();
            }
            else
            {
                console.log("Fuera Base 14");
            }
          }

          function DentroFueraBaseEnd()
          {
            var Algo=false;
            if(CircleBasesEnd.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Final");
              CheckingEnd();
              //CheckingBase
            }
            else
            {
                console.log("Fuera de Base Final");
                
            }
          }

          function DentroFueraBaseInit()
          {
            var Algo=false;
            if(CircleBasesInit.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Inicial");
              CheckingInit();
            }
            else {
              {
                console.log("Fuera de Base Inicial")
              }
            }
          }

          /*==============================FINALIZA LOS METODOS DE ENTRADA Y SALIDA DE GEO-CERCA===============================*/

      });
  });
}
/*===================================FIN DE LAS FUIONCES DE LOCALIZACION Y CHECKEO VIRTUAL DE UNIDAD 1====================================================*/





function Unidad02()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = '../../XML/Combi2.php?t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status");
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Ub=marker.attr("Direccion");
          //var Date=Fecha+" "+Hora;
          //var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          //var html="<b>Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<br> Ubicación:"+Ub+ "<br> Fecha: "+Fecha+" Hora: "+Hora+ " </b>";
          var Date=Fecha+" "+Hora;
          var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<br> Ubicacion: "+Ub+"<br> Fecha: "+Fecha+" Hora: "+Hora+"<b>";
          var Imagen='../../img/08.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/

//Metodos para insertar un registro del Virtual Check
          DentroFueraBase1();
          DentroFueraBase2();
          DentroFueraBase3();
          DentroFueraBase4();
          DentroFueraBase5();
          DentroFueraBase6();
          DentroFueraBase7();
          DentroFueraBase8();
          DentroFueraBase9();
          DentroFueraBase10();
          DentroFueraBase11();
          DentroFueraBase12();
          DentroFueraBase13();
          DentroFueraBase14();
          //DentroFueraBaseEnd();
          //DentroFueraBaseInit();
          //alert(IdEnroler);



/*AKI SE PONEN TODOS LAS INSERSIONES DE CHEKING VIRTUAL ALV*/
          function CheckingBase1()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase1.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase2()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase2.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase3()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase3.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase4()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase4.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase5()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase5.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }


          function CheckingBase6()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase6.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase7()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase7.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase8()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase8.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase9()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase9.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase10()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase10.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          
          function CheckingBase11()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase11.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase12()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase12.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase13()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase13.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase14()
          {
                var Who=Ruta;
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase14.php",
                    method: "POST",
                    data: {id: id,Who:Who,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingEnd()
          {
            var Who=Ruta;
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseFin.php',
              method: 'POST',
              data: {id: id,Who:Who,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            });

          }

          function CheckingInit()
          {
            var Who=Ruta;
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseInicio.php',
              method: 'POST',
              data: {id: id,Who:Who,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            })
          }
/*FIN FUNCIONES DE CHEKEO VIRTUAL*/

/*ESFICIFICACION DE LOS METODOS DE ENTRADA Y SALIDA DE UNA GEO-CERCA*/
       function DentroFueraBase1()
          {
            var Algo = false;
            if( CircleBase1.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 1");
                   CheckingBase1();
                }else{
                   console.log("Fuera base 1");

                }
          }

          function DentroFueraBase2()
          {
            var Algo = false;
            if( CircleBase2.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 2");
                   CheckingBase2();
                }else{
                   console.log("Fuera Base 2");

                }
          }

          function DentroFueraBase3()
          {
            var Algo = false;
            if( CircleBase3.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base3 ");
                   CheckingBase3();
                }else{
                   console.log("Fuera base 3");

                }
          }

          function DentroFueraBase4()
          {
            var Algo = false;
            if( CircleBase4.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 4");
                   CheckingBase4();
                }else{
                   console.log("Fuera base 4");

                }
          }

          function DentroFueraBase5()
          {
            var Algo = false;
            if( CircleBase5.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 5");
                   CheckingBase5();
                }else{
                   console.log("Fuera base 5");

                }
          }

          function DentroFueraBase6()
          {
            var Algo = false;
            if( CircleBase6.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 6");
                    CheckingBase6();
                }else{
                   console.log("Fuera base 6");

                }
          }

          function DentroFueraBase7()
          {
            var Algo = false;
            if( CircleBase7.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 7");
                    CheckingBase7();
                }else{
                   console.log("Fuera base 7");

                }
          }

          function DentroFueraBase8()
          {
            var Algo = false;
            if( CircleBase8.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 8");
                    CheckingBase8();
                }else{
                   console.log("Fuera base 8");

                }
          }

          function DentroFueraBase9()
          {
            var Algo = false;
            if( CircleBase9.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 9");
                    CheckingBase9();
                }else{
                   console.log("Fuera base 9");

                }
          }

          function DentroFueraBase10()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 10");
                    CheckingBase10();
                }else{
                   console.log("Fuera base 10");

                }
          }

          function DentroFueraBase11()
          {
            var Algo = false;
            if( CircleBase11.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 11");
                    CheckingBase11();
                }else{
                   console.log("Fuera base 11");

                }
          }

          function DentroFueraBase12()
          {
            var Algo=false;
            if(CircleBase12.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 12");
              CheckingBase12();
            }
            else
            {
                console.log("Fuera Base 12");
            }
          }

          function DentroFueraBase13()
          {
            var Algo=false;
            if(CircleBase13.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 13");
              CheckingBase13();
            }
            else
            {
                console.log("Fuera Base 13");
            }
          }

          function DentroFueraBase14()
          {
            var Algo=false;
            if(CircleBase14.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 14");
              CheckingBase14();
            }
            else
            {
                console.log("Fuera Base 14");
            }
          }

          function DentroFueraBaseEnd()
          {
            var Algo=false;
            if(CircleBasesEnd.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Final");
              CheckingEnd();
            }
            else
            {
                console.log("Fuera de Base Final");
                
            }
          }

          function DentroFueraBaseInit()
          {
            var Algo=false;
            if(CircleBasesInit.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Inicial");
              CheckingInit();
            }
            else {
              {
                console.log("Fuera de Base Inicial")
              }
            }
          }

          /*==============================FINALIZA LOS METODOS DE ENTRADA Y SALIDA DE GEO-CERCA===============================*/

      });
  });
}
/*===================================FIN DE LAS FUIONCES DE LOCALIZACION Y CHECKEO VIRTUAL DE UNIDAD 1====================================================*/








//Empieza unidad 2
function Unidad03()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = '../../XML/Combi3.php?t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status");
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Date=Fecha+" "+Hora;
          var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          var Imagen='../../img/15.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/

//Metodos para insertar un registro del Virtual Check
          DentroFueraBase1();
          DentroFueraBase2();
          DentroFueraBase3();
          DentroFueraBase4();
          DentroFueraBase5();
          DentroFueraBase6();
          DentroFueraBase7();
          DentroFueraBase8();
          DentroFueraBase9();
          DentroFueraBase10();
          DentroFueraBase11();
          DentroFueraBase12();
          DentroFueraBase13();
          DentroFueraBase14();
          DentroFueraBaseEnd();
          DentroFueraBaseInit();
          //alert(IdEnroler);



/*AKI SE PONEN TODOS LAS INSERSIONES DE CHEKING VIRTUAL ALV*/
          function CheckingBase1()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase1.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase2()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase2.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase3()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase3.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase4()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase4.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase5()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase5.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }


          function CheckingBase6()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase6.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase7()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase7.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase8()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase8.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase9()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase9.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase10()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase10.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase11()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase11.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase12()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase12.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase13()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase13.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase14()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase14.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingEnd()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseFin.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            });

          }

          function CheckingInit()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseInicio.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            })
          }
/*FIN FUNCIONES DE CHEKEO VIRTUAL*/

/*ESFICIFICACION DE LOS METODOS DE ENTRADA Y SALIDA DE UNA GEO-CERCA*/
       function DentroFueraBase1()
          {
            var Algo = false;
            if( CircleBase1.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 1");
                   CheckingBase1();
                }else{
                   console.log("Fuera base 1");

                }
          }

          function DentroFueraBase2()
          {
            var Algo = false;
            if( CircleBase2.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 2");
                   CheckingBase2();
                }else{
                   console.log("Fuera Base 2");

                }
          }

          function DentroFueraBase3()
          {
            var Algo = false;
            if( CircleBase3.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base3 ");
                   CheckingBase3();
                }else{
                   console.log("Fuera base 3");

                }
          }

          function DentroFueraBase4()
          {
            var Algo = false;
            if( CircleBase4.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 4");
                   CheckingBase4();
                }else{
                   console.log("Fuera base 4");

                }
          }

          function DentroFueraBase5()
          {
            var Algo = false;
            if( CircleBase5.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 5");
                   CheckingBase5();
                }else{
                   console.log("Fuera base 5");

                }
          }

          function DentroFueraBase6()
          {
            var Algo = false;
            if( CircleBase6.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 6");
                    CheckingBase6();
                }else{
                   console.log("Fuera base 6");

                }
          }

          function DentroFueraBase7()
          {
            var Algo = false;
            if( CircleBase7.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 7");
                    CheckingBase7();
                }else{
                   console.log("Fuera base 7");

                }
          }

          function DentroFueraBase8()
          {
            var Algo = false;
            if( CircleBase8.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 8");
                    CheckingBase8();
                }else{
                   console.log("Fuera base 8");

                }
          }

          function DentroFueraBase9()
          {
            var Algo = false;
            if( CircleBase9.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 9");
                    CheckingBase9();
                }else{
                   console.log("Fuera base 9");

                }
          }

          function DentroFueraBase10()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 10");
                    CheckingBase10();
                }else{
                   console.log("Fuera base 10");

                }
          }

          function DentroFueraBase11()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 11");
                    CheckingBase11();
                }else{
                   console.log("Fuera base 11");

                }
          }

          function DentroFueraBase12()
          {
            var Algo=false;
            if(CircleBase12.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 12");
              CheckingBase12();
            }
            else
            {
                console.log("Fuera Base 12");
            }
          }

          function DentroFueraBase13()
          {
            var Algo=false;
            if(CircleBase13.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 13");
              CheckingBase13();
            }
            else
            {
                console.log("Fuera Base 13");
            }
          }

          function DentroFueraBase14()
          {
            var Algo=false;
            if(CircleBase14.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 14");
              CheckingBase14();
            }
            else
            {
                console.log("Fuera Base 14");
            }
          }

          function DentroFueraBaseEnd()
          {
            var Algo=false;
            if(CircleBasesEnd.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Final");
              CheckingEnd();
            }
            else
            {
                console.log("Fuera de Base Final");
                
            }
          }

          function DentroFueraBaseInit()
          {
            var Algo=false;
            if(CircleBasesInit.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Inicial");
              CheckingInit();
            }
            else {
              {
                console.log("Fuera de Base Inicial")
              }
            }
          }

          /*==============================FINALIZA LOS METODOS DE ENTRADA Y SALIDA DE GEO-CERCA===============================*/

      });
  });
}
/*================================ TERMINO DE FUNCIONES PARA LA LOCALIZACION DE UNIDAD 2 ============================================*/







//Empieza unidad 2
function Unidad04()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = '../../XML/Combi4.php?t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status");
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Date=Fecha+" "+Hora;
          var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          var Imagen='../../img/banderin.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/

//Metodos para insertar un registro del Virtual Check
          DentroFueraBase1();
          DentroFueraBase2();
          DentroFueraBase3();
          DentroFueraBase4();
          DentroFueraBase5();
          DentroFueraBase6();
          DentroFueraBase7();
          DentroFueraBase8();
          DentroFueraBase9();
          DentroFueraBase10();
          DentroFueraBase11();
          DentroFueraBase12();
          DentroFueraBase13();
          DentroFueraBase14();
          DentroFueraBaseEnd();
          DentroFueraBaseInit();
          //alert(IdEnroler);



/*AKI SE PONEN TODOS LAS INSERSIONES DE CHEKING VIRTUAL ALV*/
          function CheckingBase1()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase1.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase2()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase2.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase3()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase3.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase4()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase4.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase5()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase5.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }


          function CheckingBase6()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase6.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase7()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase7.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase8()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase8.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase9()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase9.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase10()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase10.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase11()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase11.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase12()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase12.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase13()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase13.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase14()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase14.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingEnd()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseFin.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            });

          }

          function CheckingInit()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseInicio.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            })
          }
/*FIN FUNCIONES DE CHEKEO VIRTUAL*/

/*ESFICIFICACION DE LOS METODOS DE ENTRADA Y SALIDA DE UNA GEO-CERCA*/
       function DentroFueraBase1()
          {
            var Algo = false;
            if( CircleBase1.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 1");
                   CheckingBase1();
                }else{
                   console.log("Fuera base 1");

                }
          }

          function DentroFueraBase2()
          {
            var Algo = false;
            if( CircleBase2.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 2");
                   CheckingBase2();
                }else{
                   console.log("Fuera Base 2");

                }
          }

          function DentroFueraBase3()
          {
            var Algo = false;
            if( CircleBase3.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base3 ");
                   CheckingBase3();
                }else{
                   console.log("Fuera base 3");

                }
          }

          function DentroFueraBase4()
          {
            var Algo = false;
            if( CircleBase4.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 4");
                   CheckingBase4();
                }else{
                   console.log("Fuera base 4");

                }
          }

          function DentroFueraBase5()
          {
            var Algo = false;
            if( CircleBase5.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 5");
                   CheckingBase5();
                }else{
                   console.log("Fuera base 5");

                }
          }

          function DentroFueraBase6()
          {
            var Algo = false;
            if( CircleBase6.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 6");
                    CheckingBase6();
                }else{
                   console.log("Fuera base 6");

                }
          }

          function DentroFueraBase7()
          {
            var Algo = false;
            if( CircleBase7.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 7");
                    CheckingBase7();
                }else{
                   console.log("Fuera base 7");

                }
          }

          function DentroFueraBase8()
          {
            var Algo = false;
            if( CircleBase8.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 8");
                    CheckingBase8();
                }else{
                   console.log("Fuera base 8");

                }
          }

          function DentroFueraBase9()
          {
            var Algo = false;
            if( CircleBase9.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 9");
                    CheckingBase9();
                }else{
                   console.log("Fuera base 9");

                }
          }

          function DentroFueraBase10()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 10");
                    CheckingBase10();
                }else{
                   console.log("Fuera base 10");

                }
          }

          function DentroFueraBase11()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 11");
                    CheckingBase11();
                }else{
                   console.log("Fuera base 11");

                }
          }

          function DentroFueraBase12()
          {
            var Algo=false;
            if(CircleBase12.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 12");
              CheckingBase12();
            }
            else
            {
                console.log("Fuera Base 12");
            }
          }

          function DentroFueraBase13()
          {
            var Algo=false;
            if(CircleBase13.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 13");
              CheckingBase13();
            }
            else
            {
                console.log("Fuera Base 13");
            }
          }

          function DentroFueraBase14()
          {
            var Algo=false;
            if(CircleBase14.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 14");
              CheckingBase14();
            }
            else
            {
                console.log("Fuera Base 14");
            }
          }

          function DentroFueraBaseEnd()
          {
            var Algo=false;
            if(CircleBasesEnd.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Final");
              CheckingEnd();
            }
            else
            {
                console.log("Fuera de Base Final");
                
            }
          }

          function DentroFueraBaseInit()
          {
            var Algo=false;
            if(CircleBasesInit.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Inicial");
              CheckingInit();
            }
            else {
              {
                console.log("Fuera de Base Inicial")
              }
            }
          }

          /*==============================FINALIZA LOS METODOS DE ENTRADA Y SALIDA DE GEO-CERCA===============================*/

      });
  });
}
/*================================ TERMINO DE FUNCIONES PARA LA LOCALIZACION DE UNIDAD 2 ============================================*/






//Empieza unidad 2
function Unidad05()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = '../../XML/Combi6.php?t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status");
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Date=Fecha+" "+Hora;
          var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          var Imagen='../../img/18.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/

//Metodos para insertar un registro del Virtual Check
          DentroFueraBase1();
          DentroFueraBase2();
          DentroFueraBase3();
          DentroFueraBase4();
          DentroFueraBase5();
          DentroFueraBase6();
          DentroFueraBase7();
          DentroFueraBase8();
          DentroFueraBase9();
          DentroFueraBase10();
          DentroFueraBase11();
          DentroFueraBase12();
          DentroFueraBase13();
          DentroFueraBase14();
          DentroFueraBaseEnd();
          DentroFueraBaseInit();
          //alert(IdEnroler);



/*AKI SE PONEN TODOS LAS INSERSIONES DE CHEKING VIRTUAL ALV*/
          function CheckingBase1()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase1.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase2()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase2.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase3()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase3.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase4()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase4.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase5()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase5.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }


          function CheckingBase6()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase6.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase7()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase7.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase8()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase8.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase9()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase9.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase10()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase10.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase11()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase11.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase12()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase12.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase13()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase13.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase14()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase14.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingEnd()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseFin.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            });

          }

          function CheckingInit()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseInicio.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            })
          }
/*FIN FUNCIONES DE CHEKEO VIRTUAL*/

/*ESFICIFICACION DE LOS METODOS DE ENTRADA Y SALIDA DE UNA GEO-CERCA*/
       function DentroFueraBase1()
          {
            var Algo = false;
            if( CircleBase1.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 1");
                   CheckingBase1();
                }else{
                   console.log("Fuera base 1");

                }
          }

          function DentroFueraBase2()
          {
            var Algo = false;
            if( CircleBase2.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 2");
                   CheckingBase2();
                }else{
                   console.log("Fuera Base 2");

                }
          }

          function DentroFueraBase3()
          {
            var Algo = false;
            if( CircleBase3.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base3 ");
                   CheckingBase3();
                }else{
                   console.log("Fuera base 3");

                }
          }

          function DentroFueraBase4()
          {
            var Algo = false;
            if( CircleBase4.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 4");
                   CheckingBase4();
                }else{
                   console.log("Fuera base 4");

                }
          }

          function DentroFueraBase5()
          {
            var Algo = false;
            if( CircleBase5.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 5");
                   CheckingBase5();
                }else{
                   console.log("Fuera base 5");

                }
          }

          function DentroFueraBase6()
          {
            var Algo = false;
            if( CircleBase6.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 6");
                    CheckingBase6();
                }else{
                   console.log("Fuera base 6");

                }
          }

          function DentroFueraBase7()
          {
            var Algo = false;
            if( CircleBase7.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 7");
                    CheckingBase7();
                }else{
                   console.log("Fuera base 7");

                }
          }

          function DentroFueraBase8()
          {
            var Algo = false;
            if( CircleBase8.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 8");
                    CheckingBase8();
                }else{
                   console.log("Fuera base 8");

                }
          }

          function DentroFueraBase9()
          {
            var Algo = false;
            if( CircleBase9.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 9");
                    CheckingBase9();
                }else{
                   console.log("Fuera base 9");

                }
          }

          function DentroFueraBase10()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 10");
                    CheckingBase10();
                }else{
                   console.log("Fuera base 10");

                }
          }

          function DentroFueraBase11()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 11");
                    CheckingBase11();
                }else{
                   console.log("Fuera base 11");

                }
          }

          function DentroFueraBase12()
          {
            var Algo=false;
            if(CircleBase12.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 12");
              CheckingBase12();
            }
            else
            {
                console.log("Fuera Base 12");
            }
          }

          function DentroFueraBase13()
          {
            var Algo=false;
            if(CircleBase13.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 13");
              CheckingBase13();
            }
            else
            {
                console.log("Fuera Base 13");
            }
          }

          function DentroFueraBase14()
          {
            var Algo=false;
            if(CircleBase14.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 14");
              CheckingBase14();
            }
            else
            {
                console.log("Fuera Base 14");
            }
          }

          function DentroFueraBaseEnd()
          {
            var Algo=false;
            if(CircleBasesEnd.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Final");
              CheckingEnd();
            }
            else
            {
                console.log("Fuera de Base Final");
                
            }
          }

          function DentroFueraBaseInit()
          {
            var Algo=false;
            if(CircleBasesInit.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Inicial");
              CheckingInit();
            }
            else {
              {
                console.log("Fuera de Base Inicial")
              }
            }
          }

          /*==============================FINALIZA LOS METODOS DE ENTRADA Y SALIDA DE GEO-CERCA===============================*/

      });
  });
}
/*================================ TERMINO DE FUNCIONES PARA LA LOCALIZACION DE UNIDAD 2 ============================================*/



//Empieza unidad 2
function Unidad06()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = '../../XML/Combi6.php?t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status");
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Date=Fecha+" "+Hora;
          var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          var Imagen='../../img/07.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/

//Metodos para insertar un registro del Virtual Check
          DentroFueraBase1();
          DentroFueraBase2();
          DentroFueraBase3();
          DentroFueraBase4();
          DentroFueraBase5();
          DentroFueraBase6();
          DentroFueraBase7();
          DentroFueraBase8();
          DentroFueraBase9();
          DentroFueraBase10();
          DentroFueraBase11();
          DentroFueraBase12();
          DentroFueraBase13();
          DentroFueraBase14();
          DentroFueraBaseEnd();
          DentroFueraBaseInit();
          //alert(IdEnroler);



/*AKI SE PONEN TODOS LAS INSERSIONES DE CHEKING VIRTUAL ALV*/
          function CheckingBase1()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase1.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase2()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase2.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase3()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase3.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase4()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase4.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase5()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase5.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }


          function CheckingBase6()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase6.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase7()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase7.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase8()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase8.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase9()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase9.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase10()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase10.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase11()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase11.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase12()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase12.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase13()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase13.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase14()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase14.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingEnd()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseFin.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            });

          }

          function CheckingInit()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseInicio.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            })
          }
/*FIN FUNCIONES DE CHEKEO VIRTUAL*/

/*ESFICIFICACION DE LOS METODOS DE ENTRADA Y SALIDA DE UNA GEO-CERCA*/
       function DentroFueraBase1()
          {
            var Algo = false;
            if( CircleBase1.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 1");
                   CheckingBase1();
                }else{
                   console.log("Fuera base 1");

                }
          }

          function DentroFueraBase2()
          {
            var Algo = false;
            if( CircleBase2.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 2");
                   CheckingBase2();
                }else{
                   console.log("Fuera Base 2");

                }
          }

          function DentroFueraBase3()
          {
            var Algo = false;
            if( CircleBase3.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base3 ");
                   CheckingBase3();
                }else{
                   console.log("Fuera base 3");

                }
          }

          function DentroFueraBase4()
          {
            var Algo = false;
            if( CircleBase4.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 4");
                   CheckingBase4();
                }else{
                   console.log("Fuera base 4");

                }
          }

          function DentroFueraBase5()
          {
            var Algo = false;
            if( CircleBase5.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 5");
                   CheckingBase5();
                }else{
                   console.log("Fuera base 5");

                }
          }

          function DentroFueraBase6()
          {
            var Algo = false;
            if( CircleBase6.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 6");
                    CheckingBase6();
                }else{
                   console.log("Fuera base 6");

                }
          }

          function DentroFueraBase7()
          {
            var Algo = false;
            if( CircleBase7.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 7");
                    CheckingBase7();
                }else{
                   console.log("Fuera base 7");

                }
          }

          function DentroFueraBase8()
          {
            var Algo = false;
            if( CircleBase8.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 8");
                    CheckingBase8();
                }else{
                   console.log("Fuera base 8");

                }
          }

          function DentroFueraBase9()
          {
            var Algo = false;
            if( CircleBase9.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 9");
                    CheckingBase9();
                }else{
                   console.log("Fuera base 9");

                }
          }

          function DentroFueraBase10()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 10");
                    CheckingBase10();
                }else{
                   console.log("Fuera base 10");

                }
          }

          function DentroFueraBase11()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 11");
                    CheckingBase11();
                }else{
                   console.log("Fuera base 11");

                }
          }

          function DentroFueraBase12()
          {
            var Algo=false;
            if(CircleBase12.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 12");
              CheckingBase12();
            }
            else
            {
                console.log("Fuera Base 12");
            }
          }

          function DentroFueraBase13()
          {
            var Algo=false;
            if(CircleBase13.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 13");
              CheckingBase13();
            }
            else
            {
                console.log("Fuera Base 13");
            }
          }

          function DentroFueraBase14()
          {
            var Algo=false;
            if(CircleBase14.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 14");
              CheckingBase14();
            }
            else
            {
                console.log("Fuera Base 14");
            }
          }

          function DentroFueraBaseEnd()
          {
            var Algo=false;
            if(CircleBasesEnd.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Final");
              CheckingEnd();
            }
            else
            {
                console.log("Fuera de Base Final");
                
            }
          }

          function DentroFueraBaseInit()
          {
            var Algo=false;
            if(CircleBasesInit.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Inicial");
              CheckingInit();
            }
            else {
              {
                console.log("Fuera de Base Inicial")
              }
            }
          }

          /*==============================FINALIZA LOS METODOS DE ENTRADA Y SALIDA DE GEO-CERCA===============================*/

      });
  });
}
/*================================ TERMINO DE FUNCIONES PARA LA LOCALIZACION DE UNIDAD 2 ============================================*/







//Empieza unidad 2
function Unidad07()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = '../../XML/Combi7.php?t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status");
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Date=Fecha+" "+Hora;
          var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          var Imagen='../../img/BPH.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/

//Metodos para insertar un registro del Virtual Check
          DentroFueraBase1();
          DentroFueraBase2();
          DentroFueraBase3();
          DentroFueraBase4();
          DentroFueraBase5();
          DentroFueraBase6();
          DentroFueraBase7();
          DentroFueraBase8();
          DentroFueraBase9();
          DentroFueraBase10();
          DentroFueraBase11();
          DentroFueraBase12();
          DentroFueraBase13();
          DentroFueraBase14();
          DentroFueraBaseEnd();
          DentroFueraBaseInit();
          //alert(IdEnroler);



/*AKI SE PONEN TODOS LAS INSERSIONES DE CHEKING VIRTUAL ALV*/
          function CheckingBase1()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase1.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase2()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase2.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase3()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase3.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase4()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase4.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase5()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase5.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }


          function CheckingBase6()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase6.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase7()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase7.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase8()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase8.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase9()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase9.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }
          function CheckingBase10()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase10.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase11()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase11.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase12()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase12.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase13()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase13.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingBase14()
          {
                var id=Id;
                //alert(id);
                $.ajax({
                    url: "../../controlador/CheckingBase14.php",
                    method: "POST",
                    data: {id: id,},
                    success: function(data){
                        var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
                    }
                });

          }

          function CheckingEnd()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseFin.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            });

          }

          function CheckingInit()
          {
            var id=Id;
            $.ajax({
              url: '../../controlador/CheckingBaseInicio.php',
              method: 'POST',
              data: {id: id,},
              success: function(data)
              {
                var nota = alertify.notify(data,'success',5,function(){console.log('Spiderman');});
              }
            })
          }
/*FIN FUNCIONES DE CHEKEO VIRTUAL*/

/*ESFICIFICACION DE LOS METODOS DE ENTRADA Y SALIDA DE UNA GEO-CERCA*/
       function DentroFueraBase1()
          {
            var Algo = false;
            if( CircleBase1.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 1");
                   CheckingBase1();
                }else{
                   console.log("Fuera base 1");

                }
          }

          function DentroFueraBase2()
          {
            var Algo = false;
            if( CircleBase2.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 2");
                   CheckingBase2();
                }else{
                   console.log("Fuera Base 2");

                }
          }

          function DentroFueraBase3()
          {
            var Algo = false;
            if( CircleBase3.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base3 ");
                   CheckingBase3();
                }else{
                   console.log("Fuera base 3");

                }
          }

          function DentroFueraBase4()
          {
            var Algo = false;
            if( CircleBase4.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 4");
                   CheckingBase4();
                }else{
                   console.log("Fuera base 4");

                }
          }

          function DentroFueraBase5()
          {
            var Algo = false;
            if( CircleBase5.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 5");
                   CheckingBase5();
                }else{
                   console.log("Fuera base 5");

                }
          }

          function DentroFueraBase6()
          {
            var Algo = false;
            if( CircleBase6.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 6");
                    CheckingBase6();
                }else{
                   console.log("Fuera base 6");

                }
          }

          function DentroFueraBase7()
          {
            var Algo = false;
            if( CircleBase7.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 7");
                    CheckingBase7();
                }else{
                   console.log("Fuera base 7");

                }
          }

          function DentroFueraBase8()
          {
            var Algo = false;
            if( CircleBase8.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 8");
                    CheckingBase8();
                }else{
                   console.log("Fuera base 8");

                }
          }

          function DentroFueraBase9()
          {
            var Algo = false;
            if( CircleBase9.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 9");
                    CheckingBase9();
                }else{
                   console.log("Fuera base 9");

                }
          }

          function DentroFueraBase10()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 10");
                    CheckingBase10();
                }else{
                   console.log("Fuera base 10");

                }
          }

          function DentroFueraBase11()
          {
            var Algo = false;
            if( CircleBase10.getBounds().contains(marker.getPosition()) == true ){
                  console.log("Dentro Base 11");
                    CheckingBase11();
                }else{
                   console.log("Fuera base 11");

                }
          }

          function DentroFueraBase12()
          {
            var Algo=false;
            if(CircleBase12.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 12");
              CheckingBase12();
            }
            else
            {
                console.log("Fuera Base 12");
            }
          }

          function DentroFueraBase13()
          {
            var Algo=false;
            if(CircleBase13.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 13");
              CheckingBase13();
            }
            else
            {
                console.log("Fuera Base 13");
            }
          }

          function DentroFueraBase14()
          {
            var Algo=false;
            if(CircleBase14.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro Base 14");
              CheckingBase14();
            }
            else
            {
                console.log("Fuera Base 14");
            }
          }

          function DentroFueraBaseEnd()
          {
            var Algo=false;
            if(CircleBasesEnd.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Final");
              CheckingEnd();
            }
            else
            {
                console.log("Fuera de Base Final");
                
            }
          }

          function DentroFueraBaseInit()
          {
            var Algo=false;
            if(CircleBasesInit.getBounds().contains(marker.getPosition())==true)
            {
              console.log("Dentro de Base Inicial");
              CheckingInit();
            }
            else {
              {
                console.log("Fuera de Base Inicial")
              }
            }
          }

          /*==============================FINALIZA LOS METODOS DE ENTRADA Y SALIDA DE GEO-CERCA===============================*/

      });
  });
}
/*================================ TERMINO DE FUNCIONES PARA LA LOCALIZACION DE UNIDAD 2 ============================================*/












/*ESTOS FOR HACEN LA CREACION DE LAS GEOCERCAS DEFINIENDO COLOR OPACIDAD Y GROSOR DE BORDER*/
/*POSDATE LAS GEOCERCAS SE PUEDEN CREAR EN UN MISMO FOR PERO NO ES FACTIBLE POR QUE NO SERVIRIAN LOS CHECKINGS VIRTUALES*/
for (var base1 in bases1) {
          // Add the circle for this city to the map.
          var CircleBase1 = new google.maps.Circle({
            strokeColor: '#1DB1B6',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#1DB1B6',
            fillOpacity: 0.35,
            map: map,
            center: bases1[base1].center,
            radius: Math.sqrt(bases1[base1].population) * 5
          });
        }

      for(var base2 in bases2)
      {
        // Add the circle for this city to the map.
              var CircleBase2 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases2[base2].center,
                radius: Math.sqrt(bases2[base2].population) * 5
              });
      }

      for(var base3 in bases3)
      {
        // Add the circle for this city to the map.
              var CircleBase3 = new google.maps.Circle({
                strokeColor:'#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases3[base3].center,
                radius: Math.sqrt(bases3[base3].population) * 5
              });
      }

      for(var base4 in bases4)
      {
        // Add the circle for this city to the map.
              var CircleBase4 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases4[base4].center,
                radius: Math.sqrt(bases4[base4].population) * 5
              });
      }

      for(var base5 in bases5)
      {
        // Add the circle for this city to the map.
              var CircleBase5 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases5[base5].center,
                radius: Math.sqrt(bases5[base5].population) * 5
              });
      }

      for(var base6 in bases6)
      {
        // Add the circle for this city to the map.
              var CircleBase6 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases6[base6].center,
                radius: Math.sqrt(bases6[base6].population) * 5
              });
      }

      for(var base7 in bases7)
      {
        // Add the circle for this city to the map.
              var CircleBase7 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases7[base7].center,
                radius: Math.sqrt(bases7[base7].population) * 5
              });
      }

      for(var base8 in bases8)
      {
        // Add the circle for this city to the map.
              var CircleBase8 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases8[base8].center,
                radius: Math.sqrt(bases8[base8].population) * 5
              });
      }

      for(var base9 in bases9)
      {
        // Add the circle for this city to the map.
              var CircleBase9 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases9[base9].center,
                radius: Math.sqrt(bases9[base9].population) * 5
              });
      }

      for(var base10 in bases10)
      {
        // Add the circle for this city to the map.
              var CircleBase10 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases10[base10].center,
                radius: Math.sqrt(bases10[base10].population) * 5
              });
      }

      for(var base11 in bases11)
      {
        // Add the circle for this city to the map.
              var CircleBase11 = new google.maps.Circle({
                strokeColor: '#1DB1B6',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1DB1B6',
                fillOpacity: 0.35,
                map: map,
                center: bases11[base11].center,
                radius: Math.sqrt(bases11[base11].population) * 5
              });
      }

      for(var base12 in bases12)
      {
        var CircleBase12 = new google.maps.Circle({
          strokeColor: '#1DB1B6',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#1DB1B6',
          fillOpacity: 0.35,
          map:map,
          center: bases12[base12].center,
          radius: Math.sqrt(bases12[base12].population)*5
        });
      }

      for(var base13 in bases13)
      {
        var CircleBase13 = new google.maps.Circle({
          strokeColor: '#1DB1B6',
          strokeOpacity:0.8,
          strokeWeight:2,
          fillColor:'#1DB1B6',
          fillOpacity:0.35,
          map:map,
          center: bases13[base13].center,
          radius: Math.sqrt(bases13[base13].population)*5
        });
      }

      for(var base14 in bases14)
      {
        var CircleBase14 = new google.maps.Circle({
          strokeColor: '#1DB1B6',
          strokeOpacity:0.8,
          strokeWeight:2,
          fillColor:'#1DB1B6',
          fillOpacity:0.35,
          map:map,
          center: bases14[base14].center,
          radius: Math.sqrt(bases14[base14].population)*5
        });
      }

      for(var baseEnd in basesEND)
      {
        var CircleBasesEnd = new google.maps.Circle({
          strokeColor:'#FF0000',
          strokeOpacity:0.8,
          strokeWeight:2,
          fillColor:'#FF0000',
          map:map,
          center: basesEND[baseEnd].center,
          radius: Math.sqrt(basesEND[baseEnd].population)*5
        });
      }

      for(var baseInit in basesINIT)
      {
        var CircleBasesInit = new google.maps.Circle({
          strokeColor: '#25B63B',
          strokeOpacity:0.8,
          strokeWeight:2,
          fillColor: '#25B63B',
          map:map,
          center: basesINIT[baseInit].center,
          radius: Math.sqrt(basesINIT[baseInit].population)*5
        })
      }
/*======================================================FIN DE CREACION DE GEOCERCAS====================================================*/



  }

/*========================================INICIO DE LAS FUNCIONES PARA RECARGAR LOS MARCADORES=========================================*/
function doNothing() {}
function clearOverLays()
{
  for(var i = 0; i < markersArray.length; i++)
  {
    markersArray[i].setMap(null);
  }
}

/*========================================FIN DE FUNCIONES PARA LA ACTUALIZACION DE LOS MARKERS======================*/


