<img src="{{asset("images/portfolio/" . $portfolio->image)}}"
    style="height: 80px;width: 80px;margin-left: 11px;border-radius: 40%;">

<a href="" style="padding: 10px">{{$portfolio->name }}</a>

<br>
<div class="btn_action">
    <a href="{{ route('portfolio.edit',['id' => $portfolio->id]) }}" class="text-primary">Edit</a>
    <a href="javascript:void(0);" class="text-danger btndelete"
        onclick="return delete_portfoilio('{{$portfolio->name}}' , '{{$portfolio->id}}');">Delete</a>
    <a href="{{ route('portfolio.show' , ['id' => $portfolio->id]) }}" class="text-warring">Show details</a>
</div>


<script>

</script>


<script>
    var SITEURL = '{{URL::to('')}}';

    function delete_portfoilio(portfolio_name,portfolio_id) {
        swal({
                    title: "Are You Sure",
                    text: "Are You Sure Delete ! " + portfolio_name + " Project",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes Delete',
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    cancelButtonText: "Not Now"
                },
                function () {
                    $.ajax({
                        type: "get",
                        url: SITEURL + "/admin/portfolio/delete/" + portfolio_id,
                        success: function (data) {
                            swal({
                                title: " Project Deleted!",
                                text: "Project Deleted Successfully",
                                type: "success",
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: "Done "
                            });
                            var oTable = $('#portfolio').dataTable();
                            oTable.fnDraw(false);
                        },
                        error: function (data) {
                            swal({
                                title: "Error!",
                                text: "Project Deleted Successfully!",
                                type: "error",
                                confirmButtonClass: 'btn-danger',
                                confirmButtonText: "Ok"
                            });
                        }
                    });
                });
    }

</script>