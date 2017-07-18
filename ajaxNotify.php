    <script>
        $(function success(){
          $(".btn").on("click",function(){
            $.notify({
              title: '<strong>Success!</strong>',
              icon: 'fa fa-check-circle',
              message: "You have successfully added a company. <a href='company.php'><span class='fa fa-arrow-circle-left'></span> Go back to the list of companies.</a>"
            },{
              type: 'success',
              animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutRight'
              },
              placement: {
                from: "top",
                align: "right"
              },
              offset: {
                    x: 20,
                    y: 150
               },
              mouse_over: "pause",
              spacing: 10,
              z_index: 1031,
            });
          });
        });
    </script>

    <script>
        $(function error(){
          $(".btn").on("click",function(){
            $.notify({
              icon: 'fa fa-exclamation-circle',
              message: "The company you are adding <strong> already exists in the database.</a>"
            },{
              type: 'danger',
              animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutRight'
              },
              placement: {
                from: "top",
                align: "right"
              },
              offset: {
                    x: 20,
                    y: 150
               },
              mouse_over: "pause",
              spacing: 10,
              z_index: 1031,
            });
          });
        });
    </script>