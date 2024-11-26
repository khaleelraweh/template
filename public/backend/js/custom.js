$(document).ready(function(){

    //  updatePageCategoryStatus Status
    $(document).on("click",".updatePageCategoryStatus",function(){
        var status = $(this).children("i").attr("status");
        var page_category_id = $(this).attr("page_category_id");

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/page-categories/update-page-category-status',
            data:{status:status,page_category_id:page_category_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#page-category-"+page_category_id).html("<i class='fas fa-toggle-off fa-lg text-warning' aria-hidden='true' status='Inactive' />");
                }else if (resp['status'] ==1 ){
                    $("#page-category-"+page_category_id).html("<i class='fas fa-toggle-on fa-lg text-primary' aria-hidden='true' status='Active' />");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

});