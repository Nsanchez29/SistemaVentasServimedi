<div class="content-wrapper">
  <section class="content">

    <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1EthDYGbWFoOH7" width="300" height="500" frameborder="0" allowtransparency="true" allow="encrypted-media" style="border-radius:10px"></iframe>

    <div class="row">
      <div class="col-lg-12" >
        <input type="text" class="txtbTDL" placeholder="Agregar tarea">
        <div class="notcomp">
          <h4>No completado</h4>
        </div>
        <div class="comp">
          <h4>Completado</h4>
        </div>
        <script type="text/javascript">
          $(".txtbTDL").on("keyup",function(e){
            if(e.keyCode == 13 && $(".txtbTDL").val() != ""){
              var task = $("<div class='task'></div>").text($(".txtbTDL").val());
              var del = $("<i class='fa fa-trash'></i>").click(function(){
                var p = $(this).parent();
                p.fadeOut(function(){
                  p.remove();
                });
              });
              var check = $("<i class='fa fa-check'></i>").click(function(){
                var p = $(this).parent();
                p.fadeOut(function(){
                  $(".comp").append(p);
                  p.fadeIn();
                });
                $(this).remove();
              });
              task.append(del,check);
              $(".notcomp").append(task);
              $(".txtb").val("");
            }
          });
        </script>
      </div>
    </div>

  </section>
</div>