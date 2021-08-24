<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; 2018 Ela Admin
            </div>
            <div class="col-sm-6 text-right">
                Designed by <a href="https://colorlib.com">Colorlib</a>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="assets/js/jquery-3.4.1.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="assets/js/init/fullcalendar-init.js"></script>

<!--Local Stuff-->
<script>
    jQuery(document).ready(function($) {
        "use strict";

        // Pie chart flotPie1
        var piedata = [
            { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
            { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
            { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
        ];

        $.plot('#flotPie1', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.65,
                    label: {
                        show: true,
                        radius: 2/3,
                        threshold: 1
                    },
                    stroke: {
                        width: 0
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
        // Pie chart flotPie1  End
        // cellPaiChart
        var cellPaiChart = [
            { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
            { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
        ];
        $.plot('#cellPaiChart', cellPaiChart, {
            series: {
                pie: {
                    show: true,
                    stroke: {
                        width: 0
                    }
                }
            },
            legend: {
                show: false
            },grid: {
                hoverable: true,
                clickable: true
            }

        });
        // cellPaiChart End
        // Line Chart  #flotLine5
        var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

        var plot = $.plot($('#flotLine5'),[{
            data: newCust,
            label: 'New Data Flow',
            color: '#fff'
        }],
        {
            series: {
                lines: {
                    show: true,
                    lineColor: '#fff',
                    lineWidth: 2
                },
                points: {
                    show: true,
                    fill: true,
                    fillColor: "#ffffff",
                    symbol: "circle",
                    radius: 3
                },
                shadowSize: 0
            },
            points: {
                show: true,
            },
            legend: {
                show: false
            },
            grid: {
                show: false
            }
        });
        // Line Chart  #flotLine5 End
        // Traffic Chart using chartist
        if ($('#traffic-chart').length) {
            var chart = new Chartist.Line('#traffic-chart', {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
              series: [
              [0, 18000, 35000,  25000,  22000,  0],
              [0, 33000, 15000,  20000,  15000,  300],
              [0, 15000, 28000,  15000,  30000,  5000]
              ]
          }, {
              low: 0,
              showArea: true,
              showLine: false,
              showPoint: false,
              fullWidth: true,
              axisX: {
                showGrid: true
            }
        });

            chart.on('draw', function(data) {
                if(data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 2000 * data.index,
                            dur: 2000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });
        }
        // Traffic Chart using chartist End
        //Traffic chart chart-js
        if ($('#TrafficChart').length) {
            var ctx = document.getElementById( "TrafficChart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                    datasets: [
                    {
                        label: "Visit",
                        borderColor: "rgba(4, 73, 203,.09)",
                        borderWidth: "1",
                        backgroundColor: "rgba(4, 73, 203,.5)",
                        data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                    },
                    {
                        label: "Bounce",
                        borderColor: "rgba(245, 23, 66, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(245, 23, 66,.5)",
                        pointHighlightStroke: "rgba(245, 23, 66,.5)",
                        data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                    },
                    {
                        label: "Targeted",
                        borderColor: "rgba(40, 169, 46, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(40, 169, 46, .5)",
                        pointHighlightStroke: "rgba(40, 169, 46,.5)",
                        data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                    }
                    ]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    }

                }
            } );
        }
        //Traffic chart chart-js  End
        // Bar Chart #flotBarChart
        $.plot("#flotBarChart", [{
            data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
            bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#ffffff8a'
            }
        }], {
            grid: {
                show: false
            }
        });
        // Bar Chart #flotBarChart End
    });
</script>


          <script type="text/javascript">

         // add admin modal
         $(document).on('click','.sendadmin',function(event){
           event.preventDefault();

           var username = $('.username').val();
           var email    = $('.email').val();
           var password = $('.password').val();
           var position = $('.position').val();
           var phone    = $('.phone').val();

           var gender   = $('.gender').prop('checked');  // this [get] the radion choice
           var ismale   = gender ? 0 : 1 ;

           $.post('function/addadmin.php',{username:username,email:email,password:password,position:position,phone:phone,ismale:ismale},function(data){

             $('.errorshow').html(data);
           })
         });
          </script>
          <script type="text/javascript">



               // to check the session
               setInterval(function(){
                 $.post('function/check.php')
               },5000);



              // for delete company  modal
              var id_com ;  // to make this var  [global]
              var name_com;
             $(document).on('click','.bu_del_com',function(e){
               e.preventDefault();
               id_com = $(this).attr('data-id'); // to add value to the var id  in the global scope to reuse it in the next code
               name_com = $(this).attr('data-name');
               $('.del_message2').html(' Are You Sure You want to Delete<span class="text-danger"> ' + name_com + '</span> Company ?');
             })

             $(document).on('click','.btn_cnf_del',function(ev){   // delete confirmation button code
               ev.preventDefault();
               $.post('function/deletecompany.php',{id_com:id_com},function(data){
                   if(data == 10){
                     $('.tablerow'+id_com).remove();
                     $('.error_message2').show().html('<span style="color:green;" > Company successfully Deleted</span>').fadeOut(4000);
                   }

               })

             });

             // add company modal
             $(document).on('click','.sendcompany',function(evnt){
               evnt.preventDefault();

               var name     = $('.name').val();
               var location = $('.location').val();
               var email    = $('.email2').val();
               var type     = $('.type').val();
               var phone    = $('.phone2').val();


               $.post('function/addcompany.php',{name:name,location:location,email:email,type:type,phone:phone},function(data){

                 $('.errorshow2').html(data);

               })
             });

             // for approve company  modal

              $(document).on('click','.bu_approv_com',function(e){
                e.preventDefault();
                id_com = $(this).attr('data-app'); // to add value to the var id  in the global scope to reuse it in the next code
                name_com = $(this).attr('data-app-name');
                $('.approv_message').html(' Are You Sure You want to approve <br> <span class="text-danger">' + name_com + '</span> Company ?');
              })

              $(document).on('click','.btn_approve_confirm',function(ev){   // approve confirmation button code
                ev.preventDefault();

                $.post('function/confirmapprove.php',{id_com:id_com},function(data){
                    if(data == 2){
                      $('.approvC'+id_com).html('<h2 style="color: #27ae60;border: 1px solid #27ae60;padding: 7px;font-size: 14px;display: inline-block; border-radius: 5px;font-weight: 600;">Approved</h2> <button type="button" class="btn btn-secondary btn-sm bu_disapprov_com" data-toggle="modal" data-target="#disapprovemodal" data-app="' + id_com + '" data-app-name="' + name_com + '">Disapprove</button>');
                      $('.error_message2').show().html('<span style="color:green;" > Company successfully approved</span>').fadeOut(4000);
                    }

                })

              });

            // for disapprove company  modal

          $(document).on('click','.bu_disapprov_com',function(e){
            e.preventDefault();
            id_com = $(this).attr('data-app'); // to add value to the var id  in the global scope to reuse it in the next code
            name_com = $(this).attr('data-app-name');

            $('.disapprov_message').html(' Are You Sure You want to disapprove <br> <span class="text-danger">' + name_com + '</span> Company ?');
          })

          $(document).on('click','.btn_disapprove_confirm',function(ev){   // approve confirmation button code
            ev.preventDefault();

            $.post('function/confirmdisapprove.php',{id_com:id_com},function(data){
                if(data == 3){
                  $('.approvC'+id_com).html('<h2 style="color: red;border: 1px solid red;padding: 7px;font-size: 14px;display: inline-block; border-radius: 5px;font-weight: 600;">Disapproved</h2> <button type="button" class="btn btn-secondary btn-sm bu_approv_com" data-toggle="modal" data-target="#approvemodal" data-app="' + id_com + '" data-app-name="' + name_com + '">approve</button>');
                  $('.error_message2').show().html('<span style="color:green;" > Company successfully disapproved</span>').fadeOut(4000);
                }

            })

          });




          </script>

          <script type="text/javascript">
          // for delete admin modal
          var id ;
          var name ;
         $(document).on('click','.bu_del_admin',function(events){
           events.preventDefault();
           id = $(this).attr('data-id');
           name = $(this).attr('data-name');

           console.log(id);
           console.log(name);

           $('.del_message').html('Are You Sure You want to Delete<span class="text-danger"> ' + name + '</span> Membership');
         });

         $(document).on('click','.btn_confirm',function(evs){
           evs.preventDefault();
           $.post('function/deleteadmin.php',{id:id},function(data){
               if(data == 1){
                 $('.tablerow'+id).remove();
                 $('.error_message').show().html('<span style="color:green;" >Membership successfully Deleted</span>').fadeOut(4000);
               }else {
                 $('.error_message').show().html(data).fadeOut(4000);
               };

           })

         });

          </script>

          <script type="text/javascript">
          // for delete user modal

         $(document).on('click','.bu_del_user',function(events){
           events.preventDefault();
           id = $(this).attr('data-id');
           name = $(this).attr('data-name');

           console.log(id);
           console.log(name);

           $('.del_user_message').html('Are You Sure You want to Delete<span class="text-danger"> ' + name + '</span> account');
         });

         $(document).on('click','.btn_user_confirm',function(evs){
           evs.preventDefault();
           $.post('function/deleteuser.php',{id:id},function(data){
               if(data == 20){
                 $('.tablerow'+id).remove();
                 $('.error_message').show().html('<span style="color:green;" >Account successfully Deleted</span>').fadeOut(4000);
               }else {
                 $('.error_message').show().html(data).fadeOut(4000);
               };

           })

         });
          </script>

</body>
</html>
