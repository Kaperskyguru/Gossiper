            $(document).ready(function()
            {      
                // function to get all records from table
                getAll();
                

                // function to get all records from table
                function getAll(){
                    
                    $.ajax
                    ({
                        url: 'getproducts.php',
                        data: 'action=showAll',
                        cache: false,
                        success: function(r)
                        {
                            $("#display").html(r);
                        }
                    });         
                }
                
                
                // code to get all records from table via select box
                $("#getProducts").change(function()
                {               
                    var id = $(this).find(":selected").val();

                    var dataString = 'action='+ id;
                            
                    $.ajax
                    ({
                        url: 'getproducts.php',
                        data: dataString,
                        cache: false,
                        success: function(r)
                        {
                            $("#display").html(r);
                        } 
                    });
                })

                // Update like button on Click
                $("body").delegate("#post_like_id","click",function(event)
                {
                    //event.preventDefualt();      
                    var setLike;
                    var post_id = $(this).attr('pid');
                    $.ajax
                    ({
                        url: 'actions.php',
                        method:"POST",
                        data: {setLike:1, post_id},
                        cache: false,
                        success: function(r)
                        {
                            $("#like_span"+post_id).html(r);
                        } 
                    });
                })

                // Update dislike button on Click
                $("body").delegate("#post_dislike_id","click",function(event)
                {
                    //event.preventDefualt();      
                    var setDislike;
                    var post_id = $(this).attr('pid');
                    $.ajax
                    ({
                        url: 'actions.php',
                        method:"POST",
                        data: {setDislike:1, post_id},
                        cache: false,
                        success: function(r)
                        {
                            $("#dislike_span"+post_id).html(r);
                        } 
                    });
                })

                // Update Heart button on Click
                $("body").delegate("#post_heart_id","click",function(event)
                {
                    //event.preventDefualt();      
                    var setHeart;
                    var post_id = $(this).attr('pid');
                    $.ajax
                    ({
                        url: 'actions.php',
                        method:"POST",
                        data: {setHeart:1, post_id},
                        cache: false,
                        success: function(r)
                        {
                            $("#heart_span"+post_id).html(r);
                        } 
                    });
                })




            });