<?php
    session_start();

    if(isset($_SESSION['Usuario']))
    {
        if($_SESSION['privilegio']=='Administrador')
        {
            
        }
        else
        {
            session_destroy();
            header('location: ../../');
        }
    }else{
        session_destroy();
        header('location: ../../'); 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Wialon Playground - Create report template</title>
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="//hst-api.wialon.com/wsdk/script/wialon.js"></script>
    <style media="screen">
    td{ border: 1px solid #c6c6c6; }
ul{ list-style: none; margin:0px; padding:0px;}
label{ cursor:pointer; }

    </style>
</head>
<body>

<table>
    <tr><td colspan="2" style="text-align:center;"><b>Create unit trips report</b></td></tr>
    <tr><td>Select resource:</td><td><select id="res"></select></td></tr>
    <tr><td>Report name:</td><td><input type="text" id="r_name"/></td></tr>
    <tr><td>Stats:</td>
        <td><ul>
            <li><input class="rep_col" type="checkbox" id="duration"/><label for="duration">Move time</label></li>
            <li><input class="rep_col" type="checkbox" id="mileage"/><label for="mileage">Mileage in trips</label></li>
            <li><input class="rep_col" type="checkbox" id="avg_speed"/><label for="avg_speed">Average speed in trips</label></li>
            <li><input class="rep_col" type="checkbox" id="max_speed"/><label for="max_speed">Max speed in trips</label></li>
            <li><input class="rep_col" type="checkbox" id="trips_count"/><label for="trips_count">Trips count</label></li>
        </ul></td>
    </tr>
    <tr><td colspan="2" style="text-align:center;">
        <input type="button" value="Create report" id="create_btn"/>
    </td></tr>
</table>
<div id="log"></div>


<script type="text/javascript">
var report_result = null; // global variable

// Print message to log
function msg(text) { $("#log").prepend(text + "<br/>"); }

function init() { // Execute after login succeed
  var sess = wialon.core.Session.getInstance(); // get instance of current Session
  // specify what kind of data should be returned
  var flags = wialon.item.Item.dataFlag.base;

  sess.loadLibrary("resourceReports"); // load Reports Library
  sess.updateDataFlags( // load items to current session
      [{type: "type", data: "avl_resource", flags:flags , mode: 0}], // Items specification
      function (code) { // updateDataFlags callback
          if (code) { msg(wialon.core.Errors.getErrorText(code)); return; } // exit if error code
          // get loaded 'avl_resource's items with edit reports access
          var res = wialon.util.Helper.filterItems(sess.getItems("avl_resource"),
              wialon.item.Resource.accessFlag.editReports);
          if (!res || !res.length){ msg("Resources not found"); return; } // check if resources found
          for (var i = 0; i< res.length; i++) // construct Select object using found resources
              $("#res").append("<option value='"+ res[i].getId() +"'>"+ res[i].getName() +"</option>");
  });
}

function createReport(){ // create 'unit_trips' report in selected resource
  var res_id = $("#res").val(); // get resource id
  var n = $("#r_name").val(); // get resource name
  var stats = $("ul li .rep_col:checked"); // get stats, that need to be in a report
  var s="", sl=""; // stats and statsLabels variables

  if(!res_id) { msg("Select resource"); return; } // exit if resource not selected
  if(!n) { msg("Enter name"); return; } // exit if report name not entered
  if(!stats || !stats.length) { msg("Select stats for report"); return; } // exit if stats not checked
  for(var i=0; i< stats.length; i++){ // cycle to generate stats and stateLabels
      s += (s==""?"":",") + stats[i].id;
      sl += (sl==""?"":",") + stats[i].nextSibling.innerText;
  }

  var res = wialon.core.Session.getInstance().getItem( res_id ); // get resource by id
  // create Report object with default values
  var obj = {"ct":"avl_unit", "p":"",
      "tbl": [{"n":"unit_trips", "l":"Поездки", "f":0,"c" :"","cl":"","p":"",
      "sch":{"y":0,"m":0,"w":0,"f1":0,"f2":0,"t1":0,"t2":0}}]};
  obj.n = n; // set report name
  obj.tbl[0].sl = sl; // set report stat labels
  obj.tbl[0].s = s; // set report stats

  res.createReport(obj, // create report
      function(code){ // create report callback
          if (code) { msg(wialon.core.Errors.getErrorText(code)); return; } // exit if error code
          msg("<b>'"+ n +"'</b> report created successfully"); // print create succeed message
          $("ul li .rep_col:checked").prop("checked", false); // uncheck stats
          $("#r_name").val(""); // clear report name field
  });
}

// execute when DOM ready
$(document).ready(function () {
  $("#create_btn").click( createReport ); // bind action to button click

  wialon.core.Session.getInstance().initSession("https://hst-api.wialon.com"); // init session
  // For more info about how to generate token check
  // http://sdk.wialon.com/playground/demo/app_auth_token
      wialon.core.Session.getInstance().loginToken("0a3d0cf7d298551e896f25cc42f158ae8A139C7B7E54AC9C080479172B7231F03C9AFF72", "", // try to login
  function (code) { // login callback
      // if error code - print error message
    if (code){ msg(wialon.core.Errors.getErrorText(code)); return; }
    msg("Logged successfully"); init(); // when login suceed then run init() function
});
});
</script>
</body>
</html>
