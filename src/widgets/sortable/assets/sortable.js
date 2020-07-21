$( function(){
    $( ".sortable" ).sortable({

        update: function(event, ui){
            
            var data = []

            $(".sorting").each(function(i, elem){
                
                //get index
                var index = $(".sorting").index(elem)

                //create array index => id
                data[index] = elem.getAttribute('data-id')
                    
            })
            
            $.ajax({
                dataType: "json",
                url: "/admin/img/image/sort",
                type: "POST",
                data: {data: data},
                success: function(res){
                    
                }
            });
        }
    });
    $( ".sortable" ).disableSelection();

    //delete image
    $(".sortable").on("click", ".glyphicon-trash", function(e){

        var id = $(this).data('id')
        var model = this

        $.ajax({
            url: "/admin/img/image/remove",
            type: "POST",
            data: {id: id},
            success: function(res){
                $(model).parent().parent('li').remove();
            },
        });
    })
});
