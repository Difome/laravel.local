   $('#country').change(function(){
        var cid = $(this).val();
        if(cid){
        $.ajax({
           type:"get",
           url:"/api/v1/getRegions/"+cid,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
           success:function(res)
           {       
                if(res)
                {
                    $("#region").empty();
                    $("#city").empty();
                    //$("#region").append('<option>{{ __('Выберите свою область') }}</option>');
                    $.each(res,function(key,value){
                        $("#region").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    });
    $('#region').change(function(){
        var sid = $(this).val();
        if(sid){
        $.ajax({
           type:"get",
           url:"/api/v1/getCities/"+sid, 
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
           success:function(res)
           {       
                if(res)
                {
                    $("#city").empty();
                    //$("#city").append('<option>{{ __('Выберите свой город') }}</option>');
                    $.each(res,function(key,value){
                        $("#city").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    }); 